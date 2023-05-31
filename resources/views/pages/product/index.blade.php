@component('layout.app')
    @slot('content')
        <div class="py-6 sm:py-8 lg:py-12">
            <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                <!-- text - start -->
                <div class="mb-10 md:mb-16">
                    <h2 class="mb-4 text-center text-2xl font-bold text-white md:mb-6 lg:text-3xl">All Products</h2>

                    <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">Shop the latest iPhone models and accessories, and enjoy free shipping. View our shopping guides or get online help from an iPhone Specialist today.</p>
                </div>
                <!-- text - end -->

                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    <!-- product - start -->
                    <div>
                        <a href="{{ route('product.details') }}" class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100">
                            <img src="https://images.unsplash.com/photo-1552374196-1ab2a1c593e8?auto=format&q=75&fit=crop&crop=top&w=600&h=700"
                                loading="lazy" alt="Photo by Austin Wade"
                                class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />

                            <span class="absolute left-0 top-3 rounded-r-lg bg-red-500 px-3 py-1.5 text-sm font-semibold uppercase tracking-wider text-white">-50%</span>
                        </a>

                        <div class="flex items-start justify-between gap-2 rounded-b-lg bg-gray-100 p-4">
                            <div class="flex flex-col">
                                <a href="#"
                                    class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg">iPhone 13 Pro Max</a>
                                <span class="text-sm text-gray-500 lg:text-base">256 GB</span>
                            </div>

                            <div class="flex flex-col items-end">
                                <span class="font-bold text-gray-600 lg:text-lg">$1500.99</span>
                                <span class="text-sm text-red-500 line-through">$2000.99</span>
                            </div>
                        </div>
                    </div>
                    <!-- product - end -->

                    <!-- product - start -->
                    <div>
                        <a href="#" class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100">
                            <img src="https://images.unsplash.com/photo-1523359346063-d879354c0ea5?auto=format&q=75&fit=crop&crop=top&w=600&h=700"
                                loading="lazy" alt="Photo by Nick Karvounis"
                                class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                        </a>

                        <div class="flex items-start justify-between gap-2 rounded-b-lg bg-gray-100 p-4">
                            <div class="flex flex-col">
                                <a href="#"
                                    class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg">Cool
                                    Outfit</a>
                                <span class="text-sm text-gray-500 lg:text-base">by Cool Brand</span>
                            </div>

                            <div class="flex flex-col items-end">
                                <span class="font-bold text-gray-600 lg:text-lg">$29.99</span>
                            </div>
                        </div>
                    </div>
                    <!-- product - end -->

                    <!-- product - start -->
                    <div>
                        <a href="#" class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100">
                            <img src="https://images.unsplash.com/photo-1548286978-f218023f8d18?auto=format&q=75&fit=crop&crop=top&w=600&h=700"
                                loading="lazy" alt="Photo by Austin Wade"
                                class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                        </a>

                        <div class="flex items-start justify-between gap-2 rounded-b-lg bg-gray-100 p-4">
                            <div class="flex flex-col">
                                <a href="#"
                                    class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg">Nice
                                    Outfit</a>
                                <span class="text-sm text-gray-500 lg:text-base">by Nice Brand</span>
                            </div>

                            <div class="flex flex-col items-end">
                                <span class="font-bold text-gray-600 lg:text-lg">$35.00</span>
                            </div>
                        </div>
                    </div>
                    <!-- product - end -->

                    <!-- product - start -->
                    <div>
                        <a href="#" class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100">
                            <img src="https://images.unsplash.com/photo-1566207274740-0f8cf6b7d5a5?auto=format&q=75&fit=crop&crop=top&w=600&h=700"
                                loading="lazy" alt="Photo by Vladimir Fedotov"
                                class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                        </a>

                        <div class="flex items-start justify-between gap-2 rounded-b-lg bg-gray-100 p-4">
                            <div class="flex flex-col">
                                <a href="#"
                                    class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg">Lavish
                                    Outfit</a>
                                <span class="text-sm text-gray-500 lg:text-base">by Lavish Brand</span>
                            </div>

                            <div class="flex flex-col items-end">
                                <span class="font-bold text-gray-600 lg:text-lg">$49.99</span>
                            </div>
                        </div>
                    </div>
                    <!-- product - end -->
                </div>
            </div>
        </div>
    @endslot
@endcomponent
