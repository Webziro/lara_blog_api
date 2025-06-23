<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About Us') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl font-bold mb-6">About Our Company</h1>
                    
                    <div class="prose max-w-none">
                        <p class="mb-4">
                            Welcome to YourBrand, where innovation meets excellence. We are a team of passionate professionals dedicated to delivering exceptional digital solutions that help businesses thrive in the modern world.
                        </p>

                        <h2 class="text-2xl font-semibold mt-8 mb-4">Our Mission</h2>
                        <p class="mb-4">
                            Our mission is to empower businesses with cutting-edge technology solutions that drive growth, enhance efficiency, and create lasting value for our clients.
                        </p>

                        <h2 class="text-2xl font-semibold mt-8 mb-4">Our Vision</h2>
                        <p class="mb-4">
                            We envision a world where every business, regardless of size, has access to the tools and technology they need to succeed in the digital age.
                        </p>

                        <h2 class="text-2xl font-semibold mt-8 mb-4">Why Choose Us?</h2>
                        <ul class="list-disc pl-6 mb-4">
                            <li class="mb-2">Expert team of professionals</li>
                            <li class="mb-2">Cutting-edge technology solutions</li>
                            <li class="mb-2">Proven track record of success</li>
                            <li class="mb-2">Dedicated customer support</li>
                            <li class="mb-2">Customized solutions for your needs</li>
                        </ul>

                        <div class="mt-8">
                            <a href="{{ route('service') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Explore Our Services
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

