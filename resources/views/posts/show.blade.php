<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex justify-center py-10">

<div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-2xl">

    <h1 class="text-2xl font-bold mb-2">
        {{ $post->title }}
    </h1>

    <p class="text-gray-600 mb-4">
        {{ $post->text }}
    </p>

    <p class="text-sm text-gray-400">
        By {{ $post->user->username }} • {{ $post->created_at->format('d M Y') }}
    </p>

    <div class="mt-4 flex flex-wrap gap-2">

        @foreach($post->categories as $category)
            <span class="bg-gray-200 px-2 py-1 rounded text-sm">
                {{ $category->name }}
            </span>
        @endforeach

    </div>

    <a href="{{ route('posts.index') }}"
       class="inline-block mt-6 text-blue-600">
        ← Back
    </a>

</div>

</body>
</html>