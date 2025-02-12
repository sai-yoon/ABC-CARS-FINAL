<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'ABC Cars') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#241b35] min-h-screen w-full m-0 p-0">
    
<!-- Navigation Bar -->
<nav class="bg-[#342a45] p-4 text-[#ffffff] fixed w-full top-0 left-0 z-50 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex items-center">
        <img src="{{ asset('images/abccarslogo.png') }}" class="w-20 h-20" alt="ABC Cars Logo"/> 
            <span class="text-2xl font-bold text-[#ffffff]">ABC Cars</span>
        </a>

        <ul class="flex items-center space-x-6">
            <li><a href="{{ route('cars.index') }}" class="hover:text-[#6c35de] transition duration-200">Browse Cars</a></li>
            <li><a href="{{ route('about') }}" class="hover:text-[#6c35de] transition duration-200">About</a></li>
            <li><a href="{{ route('contact') }}" class="hover:text-[#6c35de] transition duration-200">Contact</a></li>

            @auth
                @if(Auth::user()->role !== 'admin') 
                    <li><a href="{{ route('dashboard') }}" class="hover:text-[#6c35de] transition duration-200">Dashboard</a></li>
                @else
                    <li><a href="{{ route('admin.dashboard') }}" class="hover:text-[#6c35de] transition duration-200">Admin Panel</a></li>
                @endif

                <li>
                    <a href="{{ route('profile.edit') }}" class="flex items-center space-x-2">
                        <img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('images/default-avatar.png') }}" 
                             alt="Profile" class="w-10 h-10 rounded-full border-2 border-[#ffffff]">
                    </a>
                </li>

                <li>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-[#6c35de] text-white px-4 py-2 rounded hover:bg-[#a364ff] transition duration-200">Logout</button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('login') }}" class="bg-[#6c35de] text-white px-4 py-2 rounded hover:bg-[#a364ff] transition duration-200">Login</a></li>
                <li><a href="{{ route('register') }}" class="bg-[#6c35de] text-white px-4 py-2 rounded hover:bg-[#a364ff] transition duration-200">Register</a></li>
            @endauth
        </ul>
    </div>
</nav>

<br>
<br>
<br>
    

    
    <!-- Main Content -->
    <main class="container mx-auto py-6">
        @yield('content')
    </main>
    
    <footer class="bg-[#4d425f] text-[#ffffff] py-12">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-8">
                <div>
                    <h3 class="text-xl font-semibold mb-4">ABC Cars</h3>
                    <p class="text-[#e0e0e0]">Your trusted destination for quality vehicles and exceptional service.</p>
                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-4">Contact Info</h3>
                    <ul class="space-y-2 text-[#e0e0e0]">
                        <li>Phone: (555) 555-5555</li>
                        <li>Email: info@abccars.com</li> 
                        <li>Address: 123 Main Street</li>
                    </ul>
                </div> 
            </div>
            <div class="border-t border-[#373737] mt-8 pt-8 text-center text-[#e0e0e0]">
                <p>&copy; {{ date('Y') }} ABC Cars. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <script>
    let lastScrollTop = 0;
    let navbar = document.querySelector("nav");

    // Add transition to make the movement smooth
    navbar.style.transition = "top 0.3s ease-in-out";

    window.addEventListener("scroll", function () {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        if (scrollTop > lastScrollTop) {
            navbar.style.top = "-110px"; // Hide Navbar
        } else {
            navbar.style.top = "0"; // Show Navbar
        }
        lastScrollTop = scrollTop;
    });
</script>

</body>
</html>