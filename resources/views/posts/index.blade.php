<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Posts</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex justify-center py-10">

<div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-3xl">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Posts</h1>

        <a href="{{ route('posts.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Create Post
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @forelse($posts as $post)

        <div class="border p-4 rounded mb-4">

            <h2 class="text-xl font-semibold">
                <a href="{{ route('posts.show', $post) }}">
                    {{ $post->title }}
                </a>
            </h2>

            <p class="text-gray-600">
                {{ $post->text }}
            </p>

            <p class="text-sm text-gray-400 mt-2">
                By {{ $post->user->name }} • {{ $post->created_at->format('d M Y') }}
            </p>

            <div class="mt-2 flex flex-wrap gap-2">

                @foreach($post->categories as $category)
                    <span class="bg-gray-200 px-2 py-1 rounded text-sm">
                        {{ $category->name }}
                    </span>
                @endforeach

            </div>

            @if($post->user_id === auth()->id())

                <div class="flex gap-2 mt-3">

                    <a href="{{ route('posts.edit', $post) }}"
                       class="bg-yellow-500 text-white px-3 py-1 rounded">
                        Edit
                    </a>

                    <a href="{{ route('posts.confirmDelete', $post) }}"
                       class="bg-red-600 text-white px-3 py-1 rounded">
                        Delete
                    </a>

                </div>

            @endif

        </div>

    @empty

        <p>No posts yet.</p>

    @endforelse

</div>

</body>
</html>