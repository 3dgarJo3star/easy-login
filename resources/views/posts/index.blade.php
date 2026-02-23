@extends('layouts.app')
@section('title', 'Posts')
@section('content')
    <div class="flex justify-center py-10">
        <x-card class="w-full max-w-3xl">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">Posts</h1>
                <x-button variant="primary" href="{{ route('posts.create') }}">
                    Create Post
                </x-button>
            </div>

            @if(session('success'))
                <x-alert type="success" dismissible autoHide class="mb-4">
                    {{ session('success') }}
                </x-alert>
            @endif

            @forelse($posts as $post)
                <x-post-card :post="$post" />
            @empty
                <div class="text-center py-8 text-gray-500">
                    <p>No posts yet.</p>
                    <x-button variant="primary" href="{{ route('posts.create') }}" class="mt-4">
                        Create your first post
                    </x-button>
                </div>
            @endforelse
        </x-card>
    </div>
@endsection