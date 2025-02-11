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
<nav class="bg-[#342a45] p-4 text-[#ffffff]">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-2xl font-bold text-[#ffffff]">ABC Cars</a>
        <ul class="flex items-center space-x-6">
            <!-- Visible to Everyone -->
            <li><a href="{{ route('cars.index') }}" style="color: #ffffff; transition: color 0.2s ease-in;" onmouseover="this.style.color='#6c35de'" onmouseout="this.style.color='#ffffff'">Browse Cars</a></li>
<li><a href="{{ route('about') }}" style="color: #ffffff; transition: color 0.2s ease-in;" onmouseover="this.style.color='#6c35de'" onmouseout="this.style.color='#ffffff'">About</a></li>
<li><a href="{{ route('contact') }}" style="color: #ffffff; transition: color 0.2s ease-in;" onmouseover="this.style.color='#6c35de'" onmouseout="this.style.color='#ffffff'">Contact</a></li>

@auth
    <!-- Regular User Dashboard -->
    @if(Auth::user()->role !== 'admin') 
        <li><a href="{{ route('dashboard') }}" style="color: #ffffff; transition: color 0.2s ease-in;" onmouseover="this.style.color='#6c35de'" onmouseout="this.style.color='#ffffff'">Dashboard</a></li>
    @else
        <!-- Admin Dashboard -->
        <li><a href="{{ route('admin.dashboard') }}" style="color: #ffffff; transition: color 0.2s ease-in;" onmouseover="this.style.color='#6c35de'" onmouseout="this.style.color='#ffffff'">Admin Panel</a></li>
                @endif

                <!-- Profile Picture -->
                <li>
                    <a href="{{ route('profile.edit') }}" class="flex items-center space-x-2">
                        <img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('images/default-avatar.png') }}" 
                             alt="Profile" class="w-10 h-10 rounded-full border-2 border-[#ffffff]">
                    </a>
                </li>

                <!-- Logout Button -->
                <li>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" style="background-color: #6c35de; color: #ffffff; padding: 0.5rem 1rem; border-radius: 0.5rem; border: none; cursor: pointer; transition: background-color 0.2s ease-in;" onmouseover="this.style.background='#a364ff'" onmouseout="this.style.background='#6c35de'">Logout</button>
                    </form>
                </li>
            @else
                <!-- Guest Links -->
                <li><button type="submit" style="background-color: #6c35de; color: #ffffff; padding: 0.5rem 1rem; border-radius: 0.5rem; border: none; cursor: pointer; transition: background-color 0.2s ease-in;" onmouseover="this.style.background='#a364ff'" onmouseout="this.style.background='#6c35de'"><a href="{{ route('login') }}">Login</a></button></li>
<li><button type="submit" style="background-color: #6c35de; color: #ffffff; padding: 0.5rem 1rem; border-radius: 0.5rem; border: none; cursor: pointer; transition: background-color 0.2s ease-in;" onmouseover="this.style.background='#a364ff'" onmouseout="this.style.background='#6c35de'"><a href="{{ route('register') }}">Register</a></button></li>
            @endauth
        </ul>
    </div>
</nav>

    

    
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
    
</body>
</html>