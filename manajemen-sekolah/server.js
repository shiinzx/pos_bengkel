const express = require('express');
const mysql = require('mysql2');
const path = require('path');
const cors = require('cors');
const app = express();
const port = 3000;
app.use(cors());
app.use(express.json());
app.use(express.static(path.join(__dirname, 'public')));
// Konfigurasi koneksi database
const db = mysql.createConnection({
 host: 'localhost',
 user: 'root', //
 password: '', //
 database: ''
});
db.connect(err => {
 if (err) {
 console.error('Error connecting to the database:', err.stack);
 return;
 }
 console.log('Connected to MySQL as id ' + db.threadId);
});
// --- API CRUD untuk Siswa ---
// READ: Mengambil semua data siswa
app.get('/api/siswa', (req, res) => {
 const sql = 'SELECT * FROM siswa';
 db.query(sql, (err, results) => {
 if (err) { return res.status(500).send(err); }
 res.json(results);
 });
});
// READ: Mengambil satu data siswa berdasarkan NIS
app.get('/api/siswa/:nis', (req, res) => {
 const { nis } = req.params;
 const sql = 'SELECT * FROM siswa WHERE nis = ?';
 db.query(sql, [nis], (err, result) => {
 if (err) { return res.status(500).send(err); }
 res.json(result[0]);
 });
});
// CREATE: Menambah data siswa baru
app.post('/api/siswa', (req, res) => {
 const { nis, nama_siswa, tanggal_lahir, alamat, id_kelas } = req.body;
 const sql = 'INSERT INTO siswa (nis, nama_siswa, tanggal_lahir, alamat, id_kelas) VALUES (?, ?, ?, ?, ?)';
 db.query(sql, [nis, nama_siswa, tanggal_lahir, alamat, id_kelas], (err,
result) => {
 if (err) { return res.status(500).send(err); }
 res.status(201).json({ message: 'Siswa berhasil ditambahkan', id:
result.insertId });
 });
});
// UPDATE: Mengubah data siswa
app.put('/api/siswa/:nis', (req, res) => {
 const { nis } = req.params;
 const { nama_siswa, tanggal_lahir, alamat, id_kelas } = req.body;
 const sql = 'UPDATE siswa SET nama_siswa = ?, tanggal_lahir = ?, alamat = ?, id_kelas = ? WHERE nis = ?'; 
 db.query(sql, [nama_siswa, tanggal_lahir, alamat, id_kelas, nis], (err,
result) => {
 if (err) { return res.status(500).send(err); }
 res.json({ message: 'Siswa berhasil diperbarui' });
 });
});
// DELETE: Menghapus data siswa
app.delete('/api/siswa/:nis', (req, res) => {
 const { nis } = req.params;
 const sql = 'DELETE FROM siswa WHERE nis = ?';
 db.query(sql, [nis], (err, result) => {
 if (err) { return res.status(500).send(err); }
 res.json({ message: 'Siswa berhasil dihapus' });
 });
});
// API untuk mendapatkan daftar kelas (untuk dropdown di form)
app.get('/api/kelas', (req, res) => {
 const sql = 'SELECT id_kelas, nama_kelas FROM kelas';
 db.query(sql, (err, results) => {
 if (err) { return res.status(500).send(err); }
 res.json(results);
 });
});
app.listen(port, () => {
 console.log(`Server berjalan di http://localhost:${port}`);
});