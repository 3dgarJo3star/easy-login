@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="flex items-center justify-center py-10">
        <x-card shadow="lg" class="w-full max-w-md">
            <div class="text-center space-y-6">
                <h1 class="text-3xl font-bold text-gray-800">
                    Welcome 👋
                </h1>

                <p class="text-gray-600">
                    You are successfully logged in.
                </p>

                <x-button variant="primary" href="{{ route('posts.index') }}" fullWidth>
                    Go to Posts
                </x-button>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-button variant="danger" type="submit" fullWidth>
                        Log out
                    </x-button>
                </form>
            </div>
        </x-card>
    </div>
@endsection