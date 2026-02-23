@extends('layouts.app')
@section('title', $post->title)
@section('content')
    <div class="flex justify-center py-10">
        <x-card class="w-full max-w-2xl">
            <h1 class="text-2xl font-bold mb-2">
                {{ $post->title }}
            </h1>

            <p class="text-gray-600 mb-4">
                {{ $post->text }}
            </p>

            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center space-x-2 text-sm text-gray-500">
                    <div class="h-6 w-6 rounded-full bg-gray-300 flex items-center justify-center text-xs font-semibold">
                        {{ strtoupper(substr($post->user->username, 0, 1)) }}
                    </div>
                    <span>{{ $post->user->username }}</span>
                    <span>•</span>
                    <span>{{ $post->created_at->format('d M Y') }}</span>
                </div>
            </div>

            @if($post->categories->isNotEmpty())
                <div class="flex flex-wrap gap-2 mb-6">
                    @foreach($post->categories as $category)
                        <x-badge variant="secondary">
                            {{ $category->name }}
                        </x-badge>
                    @endforeach
                </div>
            @endif

            <x-button variant="outline" href="{{ route('posts.index') }}">
                ← Back to Posts
            </x-button>
        </x-card>
    </div>
@endsection