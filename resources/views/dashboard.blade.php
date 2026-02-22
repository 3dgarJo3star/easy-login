<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-10 rounded-xl shadow-lg text-center w-full max-w-md space-y-6">
        
        <h1 class="text-3xl font-bold text-gray-800">
            Welcome 👋
        </h1>

        <p class="text-gray-600">
            You are successfully logged in.
        </p>

        <!-- Botón ir a Posts -->
        <a href="{{ route('posts.index') }}"
           class="block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
            Go to Posts
        </a>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button
                class="w-full bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 transition">
                Log out
            </button>
        </form>

    </div>

</body>
</html>