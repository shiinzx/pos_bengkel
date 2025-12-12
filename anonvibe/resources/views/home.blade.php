<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>AnonVibe</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-100 p-8">
  <h1 class="text-3xl font-bold mb-6">💬 AnonVibe</h1>

  <!-- Form Post -->
  <form action="{{ route('post.store') }}" method="POST" class="mb-6">
    @csrf
    <textarea name="content" rows="3" placeholder="Tulis curhatanmu..." class="w-full p-3 rounded text-black"></textarea>
    <button class="bg-pink-600 px-4 py-2 rounded text-white mt-2">Kirim</button>
  </form>

  <!-- Timeline -->
  @foreach ($posts as $post)
  <div class="bg-gray-800 p-4 rounded mb-4">
    <p>{{ $post->content }}</p>
    <div class="flex items-center mt-2">
      <form action="{{ route('post.like', $post) }}" method="POST" class="mr-3">
        @csrf
        <button>❤️ {{ $post->likes }}</button>
      </form>
    </div>

    <!-- Komentar -->
    <form action="{{ route('post.comment', $post) }}" method="POST" class="mt-3">
      @csrf
      <input name="content" placeholder="Tulis komentar..." class="p-2 rounded text-black w-full">
    </form>

    @foreach ($post->comments as $comment)
      <p class="text-sm mt-2 text-gray-300">💬 {{ $comment->content }}</p>
    @endforeach
  </div>
  @endforeach

</body>
</html>
