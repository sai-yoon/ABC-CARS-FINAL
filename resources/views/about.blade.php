<!-- About Us Page -->
@extends('layouts.app')
@section('content')
<div class="bg-100"> <!-- Changed to bg-100 (#241b35) -->
    <div class="relative overflow-hidden bg-primary-200 py-24"> <!-- Changed to primary-200 (#a364ff) -->
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center justify-between mt-[80px]">
                <div class="ps-24 md:w-1/2 mb-10 md:mb-0">
                    <img src="/images/story-main.jpg" alt="Our Mission" class="w-96 h-96 rounded-full object-cover border-8 border-white shadow-2xl">
                </div>
                <div class="md:w-1/2">
                    <h1 class="text-4xl font-bold text-[#ffffff] mb-4 "> <!-- Changed to text-100 (#ffffff) -->Our Road to Excellence</h1>
                    <p class="text-xl text-[#e0e0e0]"> <!-- Changed to text-200 (#e0e0e0) -->At ABC Cars, we're driven by a passion for connecting people with their dream cars. Our journey began with a simple vision: to create a car buying experience that's as smooth and enjoyable as the open road ahead.</p>
                </div>
            </div>
        </div>

        <!-- ... -->

        <div class="bg-[#4d425f] pt-32"> <!-- Changed to bg-300 (#4d425f) -->
            <div class="container mx-auto px-8">
                <div class="flex flex-col md:flex-row gap-16 max-w-7xl mx-auto">
                    <div class="md:w-1/2">
                        <img src="{{ asset('images/about1.jpg') }}" alt="Our Story" class="w-full h-[600px] object-cover rounded-lg shadow-xl">
                    </div>
                    <div class="md:w-1/2">
                        <h2 class="text-3xl text-[#ffffff] font-bold mb-12">Our Journey</h2>

                        <div class="flex gap-6 mb-8 bg-[#241b35] p-6 rounded-lg shadow-lg">
                            <img src="{{ asset('images/about2.jpg') }}" alt="Humble Beginnings" class="w-32 h-32 object-cover rounded-lg">
                            <div>
                                <h3 class="text-xl text-[#ffffff] font-semibold mb-2">Humble Beginnings</h3>
                                <p class="text-gray-400 leading-relaxed">ABC Cars started with a passion for automobiles and a commitment to customer satisfaction. We envisioned a place where car buying would be more than just a transaction – it would be the start of an exciting journey.</p>
                            </div>
                        </div>

                        <!-- ... -->

                        <div class="flex gap-6 bg-[#241b35] p-6 rounded-lg shadow-lg">
                            <img src="{{ asset('images/about3.jpg') }}" alt="Building Trust" class="w-32 h-32 object-cover rounded-lg">
                            <div>
                                <h3 class="text-xl text-[#ffffff] font-semibold mb-2">Building Trust</h3>
                                <p class="text-gray-400 leading-relaxed">Over the years, we've built a reputation for honesty, transparency, and a wide selection of quality vehicles. Our dedicated team goes the extra mile to ensure every customer drives away with confidence and a smile.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ... -->

        <div class="bg-[#4d425f] py-32">
            <div class="container mx-auto px-8">
                <h2 class="text-3xl text-[#ffffff] font-bold text-center mb-16">Our Milestones</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                        <div class="bg-[#241b35] p-8 rounded-lg shadow-lg">
                            <p class="text-gray-400 text-sm mb-2">Happy Customers</p>
                            <p class="text-3xl text-[#ffffff] text-primary-200 font-bold">Thousands of satisfied drivers</p> <!-- Changed to primary-200 (#a364ff) -->
                        </div>

                        <div class="bg-[#241b35] p-8 rounded-lg shadow-lg">
                            <p class="text-gray-400 text-sm mb-2">Vehicles Sold</p>
                            <p class="text-3xl text-[#ffffff] text-primary-200 font-bold">Delivering dreams, one car at a time</p> <!-- Changed to primary-200 (#a364ff) -->
                        </div>
                    </div>

                    <div class="md:w-1/2">
                        <div class="bg-[#241b35] p-8 rounded-lg shadow-lg">
                            <p class="text-gray-400 text-sm mb-2">Industry Recognition</p>
                            <p class="text-3xl text-[#ffffff] text-primary-200 font-bold">Top-rated for service and selection</p> <!-- Changed to primary-200 (#a364ff) -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection