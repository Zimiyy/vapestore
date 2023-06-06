@component('layout.app')
    @slot('content')
        <div class="py-6 sm:py-8 lg:py-12">
            <div class="mx-auto max-w-screen-xl px-4 md:px-8">
                <div class="grid gap-8 md:grid-cols-2">
                    <!-- images - start -->
                    <div class="grid gap-4 lg:grid-cols-5">
                        <div class="order-last flex gap-4 lg:order-none lg:flex-col">
                            @foreach ($product->extra_image as $img)
                            <div class="overflow-hidden rounded-lg bg-gray-100">
                                <img src="{{ asset('storage/'.$img) }}"
                                    loading="lazy" alt="Photo by Himanshu Dewangan"
                                    class="h-full w-full object-cover object-center" />
                            </div>
                            @endforeach
                        </div>

                        <div class="relative overflow-hidden rounded-lg bg-gray-100 lg:col-span-4">
                            <img src="{{ asset('storage/'.$product->product_image) }}"
                                loading="lazy" alt="Photo by Himanshu Dewangan"
                                class="h-full w-full object-cover object-center" />

                            @if($product->discount_tag)<span class="absolute left-0 top-0 rounded-br-lg bg-red-500 px-3 py-1.5 text-sm uppercase tracking-wider text-white">-{{$product->discount}}%</span>@endif

                            <a href="#"
                                class="absolute right-4 top-4 inline-block rounded-lg border bg-white px-3.5 py-3 text-center text-sm font-semibold text-gray-500 outline-none ring-indigo-300 transition duration-100 hover:bg-gray-100 focus-visible:ring active:text-gray-700 md:text-base">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <!-- images - end -->

                    <!-- content - start -->
                    <div class="md:py-8">
                        <!-- name - start -->
                        <div class="mb-2 md:mb-3">
                            <h2 class="text-2xl font-bold text-white lg:text-3xl">{{$product->name}}</h2>
                        </div>
                        <!-- name - end -->

                        <!-- rating - start -->
                        <div class="mb-6 flex items-center gap-3 md:mb-10">
                            <div class="flex h-7 items-center gap-1 rounded-full bg-indigo-500 px-2 text-white">
                                <span class="text-sm">4.2</span>

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </div>

                            <span class="text-sm text-gray-500 transition duration-100">56 ratings</span>
                        </div>
                        <!-- rating - end -->

                        <!-- color - start -->
                        <div class="mb-4 md:mb-6">
                            <span class="mb-3 inline-block text-sm font-semibold text-gray-500 md:text-base">Color</span>

                            <div class="flex flex-wrap gap-2">
                                <input type="hidden" id="color" name="color" value="">
                                @foreach ($product->color_model as $color)
                                <button type="button" onclick="setColor($(this))" value="{{$color->id}}" class="color-button h-8 w-8 rounded-full border bg-[{{ $color->code }}] ring-2 ring-transparent ring-offset-1 transition duration-100 hover:ring-gray-200"></button>
                                @endforeach
                            </div>
                        </div>
                        <!-- color - end -->

                        <!-- size - start -->
                        <div class="mb-8 md:mb-10">
                            <span class="mb-3 inline-block text-sm font-semibold text-gray-500 md:text-base">Storage Size</span>
                            <input type="hidden" id="size" name="size" value="">
                            <div class="flex flex-wrap gap-3">
                                @foreach ($product->storage_model as $size)
                                <button type="button" onclick="setSize($(this))" value="{{$size->id}}" class="size-button flex h-8 w-20 items-center justify-center rounded-md border bg-white text-center text-sm font-semibold text-gray-800 transition duration-100 hover:bg-gray-100 active:bg-gray-200">{{ $size->label }}</button>
                                @endforeach
                                {{-- <button type="button" class="flex h-8 w-20 items-center justify-center rounded-md border bg-white text-center text-sm font-semibold text-gray-800 transition duration-100 hover:bg-gray-100 active:bg-gray-200">128 GB</button>
                                <button type="button" class="flex h-8 w-20 items-center justify-center rounded-md border bg-white text-center text-sm font-semibold text-gray-800 transition duration-100 hover:bg-gray-100 active:bg-gray-200">256 GB</button>
                                <button typ class="flex h-8 w-20 cursor-default items-center justify-center rounded-md border border-indigo-500 bg-indigo-500 text-center text-sm font-semibold text-white">512 GB</span>
                                <button type="button" class="flex h-8 w-20 items-center justify-center rounded-md border bg-white text-center text-sm font-semibold text-gray-800 transition duration-100 hover:bg-gray-100 active:bg-gray-200">1 TB</button> --}}
                            </div>
                        </div>
                        <!-- size - end -->

                        <!-- price - start -->
                        <div class="mb-4">
                            <div class="flex items-end gap-2">
                                @if($product->discount_tag)
                                <span class="text-xl font-bold text-white md:text-2xl">RM{{ number_format($product->discount_price, 2, '.') }}</span>
                                <span class="mb-0.5 text-red-500 line-through">RM{{ number_format($product->price, 2, '.') }}</span>
                                @else
                                <span class="text-xl font-bold text-white md:text-2xl">RM{{ number_format($product->price, 2, '.') }}</span>
                                @endif
                            </div>

                            <span class="text-sm text-gray-500">incl. VAT plus shipping</span>
                        </div>
                        <!-- price - end -->

                        <!-- shipping notice - start -->
                        <div class="mb-6 flex items-center gap-2 text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                            </svg>

                            <span class="text-sm">2-4 day shipping</span>
                        </div>
                        <!-- shipping notice - end -->

                        <!-- buttons - start -->
                        <div class="flex gap-2.5">
                            @if(user())
                            <button onclick="addItem($(this))"
                            class="inline-block flex-1 rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 sm:flex-none md:text-base">Add
                            to cart</button>
                            @else
                            <a href="{{ route('signin', ['product_id'=>$product->id]) }}"
                            class="inline-block flex-1 rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 sm:flex-none md:text-base">Add
                            to cart</a>
                            @endif
                            <button onclick="buyNow($(this))"
                                class="inline-block rounded-lg bg-gray-200 px-8 py-3 text-center text-sm font-semibold text-gray-500 outline-none ring-indigo-300 transition duration-100 hover:bg-gray-300 focus-visible:ring active:text-gray-700 md:text-base">Buy
                                now</button>
                            @if(user())
                            @else
                            <a href="{{ route('signin', ['product_id'=>$product->id]) }}"
                                class="inline-block rounded-lg bg-gray-200 px-8 py-3 text-center text-sm font-semibold text-gray-500 outline-none ring-indigo-300 transition duration-100 hover:bg-gray-300 focus-visible:ring active:text-gray-700 md:text-base">Buy
                                now</a>
                            @endif
                        </div>
                        <!-- buttons - end -->
                    </div>
                    <!-- content - end -->
                </div>
            </div>
        </div>
        @include('pages.product.add_item')
        <script>
            function setColor(that) {
                $('#color').val(that.val());
                $('.color-button').removeClass('ring-gray-200');
                that.addClass('ring-gray-200');
            }

            function setSize(that) {
                $('#size').val(that.val());
                $('.size-button').addClass('bg-white');
                $('.size-button').removeClass('border border-indigo-500 bg-indigo-500 text-white');
                that.addClass('border border-indigo-500 bg-indigo-500 text-white');
                that.removeClass('bg-white');
            }
        </script>
    @endslot
@endcomponent
