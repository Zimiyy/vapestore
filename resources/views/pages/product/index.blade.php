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
                    @foreach ($products as $product)
                    <!-- product - start -->
                    <div>
                        <a href="{{ route('product.details', $product->id) }}" class="group relative block h-96 overflow-hidden rounded-t-lg bg-gray-100">
                            <img src="{{ asset('storage/'.$product->product_image) }}"
                                loading="lazy" alt="Photo by Austin Wade"
                                class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />

                            @if($product->discount_tag)
                            <span class="absolute left-0 top-3 rounded-r-lg bg-red-500 px-3 py-1.5 text-sm font-semibold uppercase tracking-wider text-white">-{{ $product->discount }}%</span>
                            @endif
                        </a>

                        <div class="flex items-start justify-between gap-2 rounded-b-lg bg-gray-100 p-4">
                            <div class="flex flex-col">
                                <a href="#"
                                    class="font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-lg">{{ $product->name }}</a>
                                @if(count($product->storage_model ?? 0) > 1)
                                <span class="text-sm text-gray-500 lg:text-base">{{ $product->storage_model[0]->label }} - {{ $product->storage_model[count($product->storage_model)-1]->label }}</span>
                                @else
                                <span class="text-sm text-gray-500 lg:text-base">{{ $product->storage_model[0]->label }}</span>
                                @endif
                            </div>

                            <div class="flex flex-col items-end">
                                @if($product->discount_tag)
                                <span class="font-bold text-gray-600 lg:text-lg">RM{{ number_format($product->discount_price, 2, ',') }}</span>
                                <span class="text-sm text-red-500 line-through">RM{{ number_format($product->price, 2, ',') }}</span>
                                @else
                                <span class="font-bold text-gray-600 lg:text-lg">RM{{ number_format($product->price, 2, ',') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- product - end -->
                    @endforeach
                </div>
            </div>
        </div>
    @endslot
@endcomponent
