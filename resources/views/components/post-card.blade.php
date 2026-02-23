@props(['post', 'showActions' => true])

<div class="bg-white border border-gray-200 rounded-lg p-6 mb-4 hover:shadow-md transition-shadow duration-200"
     x-data="{ expanded: false }">
    
    <!-- Header -->
    <div class="flex justify-between items-start mb-4">
        <h2 class="text-xl font-semibold text-gray-900">
            <a href="{{ route('posts.show', $post) }}" 
               class="hover:text-blue-600 transition-colors">
                {{ $post->title }}
            </a>
        </h2>
        
        @if($showActions && $post->user_id === auth()->id())
            <div class="flex space-x-2">
                <x-button variant="warning" size="sm" href="{{ route('posts.edit', $post) }}">
                    Edit
                </x-button>
                <x-button variant="danger" size="sm" href="{{ route('posts.confirmDelete', $post) }}">
                    Delete
                </x-button>
            </div>
        @endif
    </div>

    <!-- Content -->
    <div class="text-gray-600 mb-4" 
         :class="expanded ? '' : 'line-clamp-3'"
         x-text="`{{ $post->text }}`">
    </div>

    <!-- Meta information -->
    <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
        <div class="flex items-center space-x-2">
            <div class="h-6 w-6 rounded-full bg-gray-300 flex items-center justify-center text-xs font-semibold">
                {{ strtoupper(substr($post->user->username, 0, 1)) }}
            </div>
            <span>{{ $post->user->username }}</span>
            <span>•</span>
            <span>{{ $post->created_at->format('d M Y') }}</span>
        </div>
        
        @if(strlen($post->text) > 150)
            <button @click="expanded = !expanded" 
                    class="text-blue-600 hover:text-blue-800 font-medium">
                <span x-show="!expanded">Read more</span>
                <span x-show="expanded">Read less</span>
            </button>
        @endif
    </div>

    <!-- Categories -->
    @if($post->categories->isNotEmpty())
        <div class="flex flex-wrap gap-2">
            @foreach($post->categories as $category)
                <x-badge variant="secondary">
                    {{ $category->name }}
                </x-badge>
            @endforeach
        </div>
    @endif
</div>
