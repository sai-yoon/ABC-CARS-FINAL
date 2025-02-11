@extends('layouts.app')
@section('content')
<section class="py-16" style="background-color: var(--bg-200);">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold text-center text-white text-primary-100 mb-12">Contact Us</h1>
            <div class="flex flex-col md:flex-row gap-16 max-w-7xl mx-auto">
                <div class="md:w-1/2">
                    <h2 class="text-2xl font-bold text-white text-primary-200 mb-6">Get in Touch</h2>
                    <p class="text-white mb-8">Have questions about our vehicles, financing options, or anything else? 
                        We're here to help! Fill out the form below, and a member of our team will be in touch shortly.</p>

                    <form action="#" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="name" class="block text-white font-bold mb-2">Your Name</label>
                            <input type="text" name="name" id="name" class="w-full p-3 rounded-md border border-accent-200" required>
                        </div>
                        <div>
                            <label for="email" class="block text-white font-bold mb-2">Your Email</label>
                            <input type="email" name="email" id="email" class="w-full p-3 rounded-md border border-accent-200" required>
                        </div>
                        <div>
                            <label for="message" class="block text-white font-bold mb-2">Your Message</label>
                            <textarea name="message" id="message" rows="5" class="w-full p-3 rounded-md border border-accent-200" required></textarea>
                        </div>
                        <button type="submit" class="bg-[#6c35de] text-white px-6 py-3 rounded-md hover:bg-[#a364ff]">Send Message</button>
                    </form> 
                </div>

                <div class="md:w-1/2">
                    <h2 class="text-2xl font-bold text-white text-primary-200 mb-6">Visit Us</h2>
                    <div class="bg-bg-300 p-6 rounded-lg shadow-md"> 
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.9529121035656!2d3.375299814770752!3d6.524379395245159!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b8b2ae68280c9%3A0xdc9e87a367c3d9cb!2sComputer%20Village%2C%20Ikeja!5e0!3m2!1sen!2sng!4v1700438876291!5m2!1sen!2sng"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-full h-64 rounded-md">
                        </iframe>
                        <div class="mt-6">
                            <h3 class="text-xl font-semibold text-white mb-2">ABC Cars Dealership</h3>
                            <ul class="text-white">
                                <li>123 Main Street</li>
                                <li>Anytown, CA 12345</li> 
                                <li>Phone: (555) 555-5555</li>
                                <li>Email: info@abccars.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </section>
@endsection