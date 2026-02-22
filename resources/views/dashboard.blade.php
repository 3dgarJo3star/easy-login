<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-10 rounded-xl shadow-lg text-center w-full max-w-md">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">
            Welcome 👋
        </h1>

        <p class="text-gray-600 mb-8">
            You are successfully logged in.
        </p>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button
                class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 transition">
                Log out
            </button>
        </form>
    </div>

</body>
</html>
