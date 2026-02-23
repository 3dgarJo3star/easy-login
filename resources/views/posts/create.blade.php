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

        <!-- TITLE -->
        <input
            name="title"
            placeholder="Title"
            value="{{ old('title') }}"
            class="w-full border p-2 mb-3 rounded"
        >

        <!-- TEXT -->
        <textarea
            name="text"
            placeholder="Text"
            class="w-full border p-2 mb-3 rounded"
        >{{ old('text') }}</textarea>

        <!-- NEW CATEGORY -->
        <label class="font-semibold">New Category</label>

        <input
            type="text"
            name="new_category"
            value="{{ old('new_category') }}"
            placeholder="Write a new category..."
            class="w-full border p-2 mb-4 rounded"
        >

        <!-- CATEGORY SELECTOR -->
        <label class="font-semibold">Categories</label>

        <!-- Selected Chips -->
        <div id="selectedCategories"
             class="flex flex-wrap gap-2 border rounded p-2 mb-2 min-h-[50px]">
        </div>

        <!-- Search -->
        <input
            type="text"
            id="categorySearch"
            placeholder="Search categories..."
            class="w-full border p-2 rounded mb-2"
        >

        <!-- Dropdown -->
        <div id="categoryList"
             class="border rounded max-h-40 overflow-y-auto p-2 bg-white">

            @foreach($categories as $category)
                <div
                    class="category-item cursor-pointer hover:bg-gray-100 p-1 rounded"
                    data-id="{{ $category->id }}"
                    data-name="{{ $category->name }}"
                >
                    {{ $category->name }}
                </div>
            @endforeach

        </div>

        <!-- Hidden Inputs -->
        <div id="hiddenInputs"></div>

        <!-- BUTTONS -->
        <div class="flex items-center mt-4">

            <button
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Save
            </button>

            <a href="{{ route('posts.index') }}"
               class="ml-3 text-gray-600">
                Cancel
            </a>

        </div>

    </form>

</div>

<script>

const selectedContainer = document.getElementById('selectedCategories');
const hiddenInputs = document.getElementById('hiddenInputs');
const items = document.querySelectorAll('.category-item');
const search = document.getElementById('categorySearch');

let selected = new Set();

items.forEach(item => {

    item.addEventListener('click', () => {

        const id = item.dataset.id;
        const name = item.dataset.name;

        if (selected.has(id)) return;

        selected.add(id);

        // chip
        const chip = document.createElement('div');
        chip.className =
            "bg-blue-100 text-blue-700 px-3 py-1 rounded-full flex items-center gap-2 text-sm";

        chip.innerHTML = `
            ${name}
            <button type="button"
                class="text-blue-900 font-bold"
                onclick="removeCategory('${id}', this)">
                ×
            </button>
        `;

        selectedContainer.appendChild(chip);

        // hidden input
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'categories[]';
        input.value = id;
        input.id = 'input-' + id;

        hiddenInputs.appendChild(input);
    });

});


function removeCategory(id, btn) {

    selected.delete(id);

    document.getElementById('input-' + id)?.remove();
    btn.parentElement.remove();

}


// search filter
search.addEventListener('input', () => {

    const term = search.value.toLowerCase();

    items.forEach(item => {

        const name = item.dataset.name.toLowerCase();

        item.style.display =
            name.includes(term) ? 'block' : 'none';

    });

});

</script>

</body>
</html>