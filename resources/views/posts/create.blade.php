<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex justify-center items-center">

<div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-xl">

    <h1 class="text-2xl font-bold mb-4">Create Post</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('posts.store') }}">
        @csrf

        <input
            name="title"
            placeholder="Title"
            value="{{ old('title') }}"
            class="w-full border p-2 mb-3 rounded"
        >

        <textarea
            name="text"
            placeholder="Text"
            class="w-full border p-2 mb-3 rounded"
        >{{ old('text') }}</textarea>

        <label class="font-semibold">Categories</label>

        <div class="mt-2 mb-4">

            @foreach($categories as $category)
                <label class="block">
                    <input type="checkbox"
                           name="categories[]"
                           value="{{ $category->id }}">
                    {{ $category->name }}
                </label>
            @endforeach

        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Save
        </button>

        <a href="{{ route('posts.index') }}"
           class="ml-2 text-gray-600">
            Cancel
        </a>

    </form>

</div>

</body>
</html>