@extends('layouts.app')
@section('title', 'Create Post')
@section('content')
    <div class="flex justify-center items-center py-10">
        <x-card class="w-full max-w-xl">
            <h1 class="text-2xl font-bold mb-4">Create Post</h1>

            @if ($errors->any())
                <x-alert type="error" dismissible class="mb-4">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </x-alert>
            @endif

            <form method="POST" action="{{ route('posts.store') }}">
                @csrf

                <!-- Title Input -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                    <input
                        name="title"
                        placeholder="Enter post title"
                        value="{{ old('title') }}"
                        class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        required
                    >
                </div>

                <!-- Text Area -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Content</label>
                    <textarea
                        name="text"
                        placeholder="Write your post content..."
                        rows="6"
                        class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        required
                    >{{ old('text') }}</textarea>
                </div>

                <!-- New Category -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">New Category</label>
                    <input
                        type="text"
                        name="new_category"
                        value="{{ old('new_category') }}"
                        placeholder="Create a new category..."
                        class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    >
                </div>

                <!-- Category Selector -->
                <div class="mb-6" x-data="categorySelector()">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Categories</label>

                    <!-- Selected Categories -->
                    <div class="flex flex-wrap gap-2 border border-gray-300 rounded-lg p-3 mb-2 min-h-[60px] bg-gray-50">
                        <template x-for="category in selected" :key="category.id">
                            <div class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full flex items-center gap-2 text-sm">
                                <span x-text="category.name"></span>
                                <button type="button" @click="removeCategory(category.id)" class="text-blue-900 font-bold hover:text-blue-700">
                                    ×
                                </button>
                            </div>
                        </template>
                    </div>

                    <!-- Search -->
                    <input
                        type="text"
                        x-model="search"
                        @input="filterCategories"
                        placeholder="Search categories..."
                        class="w-full border border-gray-300 p-3 rounded-lg mb-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    >

                    <!-- Category List -->
                    <div class="border border-gray-300 rounded-lg max-h-40 overflow-y-auto p-2 bg-white">
                        <template x-for="category in filteredCategories" :key="category.id">
                            <div
                                @click="addCategory(category)"
                                class="cursor-pointer hover:bg-gray-100 p-2 rounded"
                                :class="{'bg-gray-50': isSelected(category.id)}"
                            >
                                <span x-text="category.name"></span>
                            </div>
                        </template>
                    </div>

                    <!-- Hidden Inputs -->
                    <template x-for="category in selected" :key="category.id">
                        <input type="hidden" name="categories[]" :value="category.id">
                    </template>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center space-x-3">
                    <x-button variant="primary" type="submit">
                        Save Post
                    </x-button>
                    <x-button variant="outline" href="{{ route('posts.index') }}">
                        Cancel
                    </x-button>
                </div>
            </form>
        </x-card>
    </div>

    @push('scripts')
    <script>
        function categorySelector() {
            return {
                search: '',
                selected: [],
                categories: @json($categories),
                
                get filteredCategories() {
                    if (!this.search) return this.categories;
                    return this.categories.filter(cat => 
                        cat.name.toLowerCase().includes(this.search.toLowerCase())
                    );
                },
                
                addCategory(category) {
                    if (!this.isSelected(category.id)) {
                        this.selected.push(category);
                    }
                },
                
                removeCategory(id) {
                    this.selected = this.selected.filter(cat => cat.id !== id);
                },
                
                isSelected(id) {
                    return this.selected.some(cat => cat.id === id);
                },
                
                filterCategories() {
                    // This is handled by the computed property
                }
            }
        }
    </script>
    @endpush
@endsection