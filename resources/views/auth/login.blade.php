<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-500 to-indigo-600 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">
        <h1 class="text-2xl font-bold text-center mb-6 text-gray-800">
            Login
        </h1>

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700">Username</label>
                <input name="username"
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password"
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200">
            </div>

            <button
                class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition">
                Sign In
            </button>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 p-3 rounded">
                    @foreach ($errors->all() as $error)
                        <p class="text-sm">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </form>

        <p class="text-center text-sm text-gray-600 mt-4">
            Don’t have an account?
            <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">
                Register
            </a>
        </p>
    </div>

</body>
</html>
