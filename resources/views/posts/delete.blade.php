<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex justify-center items-center">

<div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md text-center">

    <h2 class="text-xl font-bold mb-4">
        Delete Post
    </h2>

    <p class="mb-6">
        Are you sure you want to delete
        <strong>{{ $post->title }}</strong> ?
    </p>

    <form method="POST" action="{{ route('posts.destroy', $post) }}">
        @csrf
        @method('DELETE')

        <button class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
            Yes, delete
        </button>
    </form>

    <a href="{{ route('posts.index') }}"
       class="block mt-4 text-gray-600">
        Cancel
    </a>

</div>

</body>
</html>