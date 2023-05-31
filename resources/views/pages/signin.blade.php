<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In</title>
    <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter">
        <script type="module">
            import heroicons from 'https://cdn.jsdelivr.net/npm/heroicons@2.0.16/+esm'
        </script>
</head>
<body class="bg-black">
    <div class="py-6 sm:py-40 lg:py-40">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <h2 class="mb-4 text-center text-2xl font-bold text-white md:mb-8 lg:text-3xl">Login</h2>
            <form class="mx-auto max-w-lg rounded-lg border">
                <div class="flex flex-col gap-4 p-4 md:p-8">
                    <div>
                        <label for="email" class="mb-2 inline-block text-sm text-white sm:text-base">Email</label>
                        <input name="email"
                            class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                    </div>
                    <div>
                        <label for="password" class="mb-2 inline-block text-sm text-white sm:text-base">Password</label>
                        <input name="password"
                            class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                    </div>
                    <button class="block rounded-lg bg-gray-800 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-gray-300 transition duration-100 hover:bg-gray-700 focus-visible:ring active:bg-gray-600 md:text-base">Login</button>
                    <a href="" class="block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-gray-300 transition duration-100 hover:bg-indigo-700 focus-visible:ring active:bg-indigo-700 md:text-base">Admin Login</a>
                </div>
                <div class="flex items-center justify-center bg-gray-100 p-4">
                    <p class="text-center text-sm text-gray-500">Don't have an account? <a href="{{ route('register') }}" class="text-indigo-500 transition duration-100 hover:text-indigo-600 active:text-indigo-700">Register</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>


