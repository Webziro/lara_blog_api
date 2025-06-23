<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Our Services') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Hero Section -->
            <div class="bg-blue-600 text-white py-16 mb-12 rounded-lg">
                <div class="container mx-auto px-4">
                    <div class="max-w-3xl mx-auto text-center">
                        <h1 class="text-4xl font-bold mb-4">Our Services</h1>
                        <p class="text-xl">Discover how we can help your business grow and succeed</p>
                    </div>
                </div>
            </div>

            <!-- Services Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-blue-600 text-4xl mb-4">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Web Development</h3>
                        <p class="text-gray-600">Custom website development tailored to your business needs, using the latest technologies and best practices.</p>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-blue-600 text-4xl mb-4">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Mobile Apps</h3>
                        <p class="text-gray-600">Native and cross-platform mobile applications that provide seamless user experiences across all devices.</p>
                    </div>
                </div>

                <!-- Service 3 -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-blue-600 text-4xl mb-4">
                            <i class="fas fa-search"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">SEO Optimization</h3>
                        <p class="text-gray-600">Improve your website's visibility and ranking in search engines with our comprehensive SEO services.</p>
                    </div>
                </div>

                <!-- Service 4 -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-blue-600 text-4xl mb-4">
                            <i class="fas fa-paint-brush"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">UI/UX Design</h3>
                        <p class="text-gray-600">Create beautiful, intuitive user interfaces that enhance user experience and drive engagement.</p>
                    </div>
                </div>

                <!-- Service 5 -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-blue-600 text-4xl mb-4">
                            <i class="fas fa-server"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Cloud Solutions</h3>
                        <p class="text-gray-600">Scalable cloud infrastructure and services to support your business growth and digital transformation.</p>
                    </div>
                </div>

                <!-- Service 6 -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-blue-600 text-4xl mb-4">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">24/7 Support</h3>
                        <p class="text-gray-600">Round-the-clock technical support and maintenance to ensure your systems run smoothly.</p>
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="mt-12 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-center">
                    <h2 class="text-3xl font-bold mb-4">Ready to Get Started?</h2>
                    <p class="text-gray-600 mb-8">Contact us today to discuss how we can help your business grow</p>
                    <a href="/contact" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 