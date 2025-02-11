
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - ABC Cars</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    
    <!-- Admin Navigation -->
    <nav class="bg-gray-900 p-4 text-white">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('admin.dashboard') }}" class="text-lg font-bold">Admin Dashboard</a>
            <ul class="flex space-x-4">
                <li><a href="{{ route('admin.users') }}" class="hover:underline">Manage Users</a></li>
                <li><a href="{{ route('admin.cars') }}" class="hover:underline">Manage Listings</a></li>
                <li><a href="{{ route('admin.transactions') }}" class="hover:underline">Transactions</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="hover:underline">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    
    <!-- Main Admin Content -->
    <main class="container mx-auto py-6">
        @yield('content')
    </main>
    
    <!-- Footer -->
    <footer class="bg-gray-900 text-white text-center p-4 mt-10">
        <p>&copy; {{ date('Y') }} ABC Cars Admin Panel</p>
    </footer>
    
</body>
</html>
