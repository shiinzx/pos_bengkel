Langkah-langkah Setup Proyek & Autentikasi (Branch Auth Only)
============================================================

1. Persiapan Awal
   1.1. Pastikan Node.js >= 18, npm, dan MongoDB (lokal atau layanan hosted) tersedia.
   1.2. Buat folder proyek (jika mulai dari nol): `mkdir ku-money && cd ku-money`.
   1.3. Inisialisasi git (opsional) dan proyek Node: `git init`, lalu `npm init -y`.
   1.4. Set `"type": "module"` di `package.json` agar kompatibel dengan import ES module.

2. Instalasi Dependensi (sesuai branch auth-only)
   - Server & middleware dasar: `npm install express cors dotenv`
   - Autentikasi & keamanan: `npm install bcrypt jsonwebtoken`
   - Validasi request: `npm install joi`
   - Database MongoDB: `npm install mongoose`
   - Email verifikasi: `npm install nodemailer`
   - Google OAuth: `npm install google-auth-library`
   - Dependensi pengembangan: `npm install -D nodemon`

3. Struktur Direktori
   src/
   ├─ app.js
   ├─ server.js
   ├─ config/
   │   └─ db.js
   ├─ controllers/
   │   └─ auth/
   │       ├─ auth.controller.js
   │       ├─ googleAuth.controller.js
   │       └─ verifyEmail.controller.js
   ├─ datasource/
   │   ├─ user.datasource.js
   │   └─ userAccess.datasource.js
   ├─ dto/
   │   └─ auth.dto.js
   ├─ middlewares/
   │   ├─ auth/
   │   │   ├─ auth.middleware.js
   │   │   └─ refreshToken.middleware.js
   │   └─ validator.middleware.js
   ├─ models/
   │   ├─ User.model.js
   │   └─ UserAccess.model.js
   ├─ routes/
   │   └─ auth.routes.js
   ├─ services/
   │   ├─ email.service.js
   │   └─ emailTemplates.js
   └─ utils/
       └─ token.js

4. Konfigurasi Environment (.env)
   - PORT=3000
   - MONGO_URI=mongodb://user:pass@host:port/ku-money
   - JWT_SECRET=<random-string>              # secret access token & email token
   - JWT_REFRESH=<random-string>             # secret refresh token
   - EMAIL_USER=<akun Gmail / SMTP>
   - EMAIL_PASS=<app password SMTP>
   - CLIENT_URL=https://app.example.com
   - GOOGLE_CLIENT_ID=<OAuth client id>

5. Koneksi Database & Model
   - `src/config/db.js` memanggil `mongoose.connect` menggunakan `MONGO_URI`.
   - Struktur model yang digunakan:
     * `User` (`User.model.js`)
       - `email`: string, unique, lowercase, required
       - `name`: string, required
       - `status`: enum `['free', 'pro', 'unlimited']`, default `free`
       - `password`: string (nullable untuk user OAuth)
       - `verified`: boolean, default `false`
       - `lastVerificationEmailSent`: date, default `null`
       - `createdAt` / `updatedAt`: otomatis dari mongoose timestamps
     * `UserAccess` (`UserAccess.model.js`)
       - `user._id`: ObjectId referensi `User`
       - `user.email`: string (snapshot email user)
       - `refreshToken`: string, unique
       - `createdAt` / `updatedAt`: timestamps
   - Relasi: satu user dapat memiliki satu entri `UserAccess` (refresh token aktif).

6. Setup Express App (`src/app.js`)
   - Jalankan `dotenv.config()` untuk memuat environment.
   - Pasang middleware `cors` dengan opsi `{ origin: CLIENT_URL, credentials: true }`.
   - Aktifkan `express.json()` untuk parsing body.
   - Daftarkan router: `app.use('/api/auth', authRoutes);`

7. Entry Server (`src/server.js`)
   - Import `connectDB` dan panggil sebelum `app.listen`.
   - Jalankan server pada `process.env.PORT || 5000`.

8. Alur Autentikasi
   8.1. Register (`POST /api/auth/register`)
        - Request → `validator.middleware` mem-validasi dengan `registerDto`.
        - Controller hash password (`bcrypt`), simpan user via `user.datasource`.
        - Generate email token (`generateEmailToken`) dan kirim lewat `sendVerificationEmail`.
        - Generate access & refresh token, simpan refresh token ke `UserAccess`.
        - Response: data user + token.
   8.2. Login (`POST /api/auth/login`)
        - Validasi payload (`loginDto`), cari user berdasarkan email.
        - Jika belum diverifikasi: response 400 dengan pesan untuk verifikasi.
        - Jika password cocok: generate access & refresh token, update/insert `UserAccess`.
        - Response: token + profil user.
   8.3. Logout (`POST /api/auth/logout`)
        - Middleware `authMiddleware` memastikan access token valid.
        - Controller menghapus refresh token di `UserAccess`.
   8.4. Refresh Token (`POST /api/auth/refresh`)
        - `refreshTokenMiddleware` memeriksa refresh token di DB dan inject `req.user`.
        - Controller rotasi access/refresh token lalu update entri `UserAccess`.
   8.5. Get Me (`GET /api/auth/me`)
        - `authMiddleware` memverifikasi access token dan menyediakan `req.user`.
        - Controller mengembalikan profil user terkini dari database.
   8.6. Verify Email (`POST /api/auth/verify`)
        - Menerima token verifikasi, validasi dengan `verifyToken`.
        - Tandai user sebagai `verified = true`, kirim response sukses.
   8.7. Resend Verification Email (`POST /api/auth/resend-verification`)
        - Validasi email, cek rate limit via `lastVerificationEmailSent`.
        - Generate token baru dan kirim ulang email verifikasi.
   8.8. Google OAuth (`POST /api/auth/google`)
        - Terima `idToken`, verifikasi via `google-auth-library`.
        - Buat user baru jika belum terdaftar (password null, verified true).
        - Generate access & refresh token serta sinkronisasi `UserAccess`.
   8.9. Ringkasan flow tinggi:
        - Autentikasi berbasis JWT access token + refresh token tersimpan di Mongo.
        - Semua endpoint proteksi memakai kombinasi middleware validator + auth.
        - Email verifikasi memastikan user mengaktifkan akun sebelum login.

9. Utilitas Token (`src/utils/token.js`)
   - `generateAccessToken(payload)` → menggunakan `JWT_SECRET`, kedaluwarsa 8640 detik.
   - `generateRefreshToken(payload)` → menggunakan `JWT_REFRESH`, kedaluwarsa 30 hari.
   - `generateEmailToken(payload)` → menggunakan `JWT_SECRET`, kedaluwarsa 1 hari.
   - `verifyToken(token, secret)` → helper umum untuk middleware.

10. Email Service
    - `email.service.js` men-setup transporter Gmail SMTP.
    - Template HTML tersedia di `emailTemplates.js` (hanya verifikasi email).

11. Middleware & Validator
    - `auth.middleware.js` membaca header `Authorization: Bearer <token>` dan memverifikasi JWT.
    - `refreshToken.middleware.js` memastikan refresh token valid di database.
    - `validator.middleware.js` mengikat skema Joi ke request body/query.

12. Testing & Deployment
    - Uji endpoint menggunakan Postman/Insomnia: register, login, logout, refresh, me, verify, resend, google.
    - Untuk production, pastikan HTTPS aktif dan environment variable sudah terisi.
    - Jalankan `npm run start` untuk produksi, `npm run dev` (nodemon) untuk pengembangan.

Catatan
- Branch ini hanya memuat logika autentikasi; komponen lain (order, subscription, dsb) dihapus.
- Update dokumen ini jika ada perubahan pada flow atau dependensi.
