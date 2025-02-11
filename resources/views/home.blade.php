<!-- Home Page -->
@extends('layouts.app')
<style>
    body {
        background-color: #241b35;
    }
</style>
@section('content')

<section class="hero-section min-h-screen flex items-center justify-center text-[#ffffff] relative">
        <div id="hero-image" class="bg-[#241b35]">
            <img src="{{ asset('images/hero-car.jpg') }}" class="w-full h-full object-cover opacity-80" /> 
            <div class="container mx-auto px-6 text-center absolute inset-0 flex flex-col items-center justify-center">
                <h1 class="text-5xl md:text-6xl font-bold mb-4 text-[#ffffff]">Drive Your Dream, Today</h1>
                <p class="text-xl mb-8 text-[#e0e0e0]">Find your perfect ride with ABC Cars - Your trusted source for quality vehicles.</p>
                <div class="flex justify-center gap-4">
                    <a href="#about" class="bg-[#6c35de] text-[#ffffff] px-8 py-3 rounded-md hover:bg-[#a364ff]">Learn More</a> 
                    <a href="{{ route('cars.index') }}" class="bg-[#cb80ff] text-[#373737] px-8 py-3 rounded-md hover:bg-[#ffc7ff]">Browse Cars</a> 
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="py-20 bg-[#241b35]">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-center mb-4 text-[#ffffff]">About ABC Cars</h2>
            <p class="text-xl text-[#e0e0e0] text-center mb-12 max-w-3xl mx-auto">
                Your journey to the perfect car starts here. We're dedicated to providing a seamless and enjoyable car buying experience.
            </p>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center p-6 hover:bg-[#342a45] rounded-lg transition duration-300">
                    <div class="bg-[#4d425f] rounded-full p-6 w-24 h-24 mx-auto mb-6 flex items-center justify-center">
                        <svg class="w-12 h-12 text-[#cb80ff]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"/> 
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4 text-[#ffffff]">Wide Selection</h3>
                    <p class="text-[#e0e0e0]">Browse our extensive inventory of new and used cars from top brands.</p>
                </div>

                <div class="text-center p-6 hover:bg-[#342a45] rounded-lg transition duration-300">
                    <div class="bg-[#4d425f] rounded-full p-6 w-24 h-24 mx-auto mb-6 flex items-center justify-center">
                        <svg class="w-12 h-12 text-[#cb80ff]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4 text-[#ffffff]">Competitive Pricing</h3>
                    <p class="text-[#e0e0e0]">We offer fair and transparent pricing on all our vehicles. Get the best value for your money.</p>
                </div>

                <div class="text-center p-6 hover:bg-[#342a45] rounded-lg transition duration-300">
                    <div class="bg-[#4d425f] rounded-full p-6 w-24 h-24 mx-auto mb-6 flex items-center justify-center">
                        <svg class="w-12 h-12 text-[#cb80ff]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5a2 2 0 004 0v-2.5a2 2 0 00-4 0m0 1l2 1m-2-1h2"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4 text-[#ffffff]">Exceptional Service</h3>
                    <p class="text-[#e0e0e0]">Our friendly and knowledgeable team is here to guide you through every step of the car buying process. </p>
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="py-20 bg-[#342a45]"> 
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12 text-[#ffffff]">Our Services</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 text-center">
                <div class="bg-[#241b35] p-6 rounded-lg shadow-lg transform hover:scale-105 transition duration-300">
                    <div class="text-4xl font-bold text-[#cb80ff] mb-2"> 
                        <svg class="w-16 h-16 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76"/>
                        </svg>
                    </div>
                    <div class="text-[#e0e0e0]">Car Financing</div>
                </div>

                <div class="bg-[#241b35] p-6 rounded-lg shadow-lg transform hover:scale-105 transition duration-300">
                    <div class="text-4xl font-bold text-[#cb80ff] mb-2"> 
                        <svg class="w-16 h-16 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="text-[#e0e0e0]">Vehicle History Reports</div>
                </div>
                <div class="bg-[#241b35] p-6 rounded-lg shadow-lg transform hover:scale-105 transition duration-300">
                    <div class="text-4xl font-bold text-[#cb80ff] mb-2">
                        <svg class="w-16 h-16 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/>
                        </svg>
                    </div>
                    <div class="text-[#e0e0e0]">Trade-In Evaluations</div>
                </div> 
            </div> 
        </div>
    </section> 

    <section class="bg-[#241b35] py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-[#ffffff]">What Our Customers Say</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-[#342a45] p-6 rounded-lg shadow-md">
                    <div class="flex text-[#ffc7ff] mb-3">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                    </div>
                    <p class="text-[#e0e0e0] mb-4">"Found my dream car at ABC Cars! The process was smooth and the staff was very helpful."</p>
                    <div class="flex items-center">
                        <img src="https://randomuser.me/api/portraits/women/17.jpg" alt="Sarah M." class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold text-[#ffffff]">Sarah M.</h4>
                            <p class="text-[#e0e0e0] text-sm">Happy Customer</p>
                        </div>
                    </div>
                </div>

                <div class="bg-[#342a45] p-6 rounded-lg shadow-md">
                    <div class="flex text-[#ffc7ff] mb-3">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                    </div>
                    <p class="text-[#e0e0e0] mb-4">"Great selection of cars and competitive prices. I highly recommend ABC Cars."</p>
                    <div class="flex items-center">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="John D." class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold text-[#ffffff]">John D.</h4>
                            <p class="text-[#e0e0e0] text-sm">Satisfied Buyer</p>
                        </div>
                    </div>
                </div>

                <div class=" bg-[#342a45] bg-white p-6 rounded-lg shadow-md">
                <div class="flex text-[#ffc7ff] mb-3">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                    </div>
                    <p class="text-[#e0e0e0] mb-4">"The team at ABC Cars made buying a car a breeze. I'll definitely be back for my next purchase."</p>
                    <div class="flex items-center">
                        <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Emily R." class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold text-[#ffffff]">Emily R.</h4>
                            <p class="text-[#e0e0e0] text-sm">Repeat Customer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
