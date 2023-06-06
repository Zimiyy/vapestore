@component('layout.app')
    @slot('content')
        <div class="py-6 sm:py-8 lg:py-12">
            <div class="mx-auto max-w-screen-lg px-4 md:px-8">
                <div class="mb-6 sm:mb-10 lg:mb-16">
                    <h2 class="mb-4 text-center text-2xl font-bold text-white md:mb-6 lg:text-3xl">Your Cart</h2>
                </div>

                <div class="mb-6 flex flex-col gap-4 sm:mb-8 md:gap-6">
                    @foreach ($carts as $cart)
                    <!-- product - start -->
                    <div class="flex flex-wrap bg-gray-100 gap-x-4 overflow-hidden rounded-lg border sm:gap-y-4 lg:gap-6">
                        <a href="#" class="group relative block h-48 w-32 overflow-hidden bg-gray-100 sm:h-56 sm:w-40">
                            <img src="{{ asset('storage/'.$cart->product->product_image) }}"
                                loading="lazy" alt="Photo by Thái An"
                                class="h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                        </a>

                        <div class="flex flex-1 flex-col justify-between py-4">
                            <div>
                                <a href="#"
                                    class="mb-1 inline-block text-lg font-bold text-gray-800 transition duration-100 hover:text-gray-500 lg:text-xl">{{$cart->product->name}}</a>

                                <span class="block text-gray-500">Storage: {{$cart->storage->label}}</span>
                                <span class="mt-3 block text-gray-500 align-middle">Color: 
                                    <button
                                    class="align-middle color-button h-8 w-8 rounded-full border bg-[{{ $cart->color->code }}] ring-2 ring-transparent ring-offset-1 transition duration-100 hover:ring-gray-200">
                                    </button>
                                </span>
                            </div>

                            <div>
                                <span class="mb-1 block font-bold text-gray-800 md:text-lg">RM{{ $cart->product->discount_tag ? number_format($cart->product->discount_price, 2, '.') : number_format($cart->product->price, 2, '.') }}</span>

                                <span class="flex items-center gap-1 text-sm text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>

                                    {{getProductStock($cart->product_id) - $cart->count}} in stock
                                </span>
                            </div>
                        </div>
                        <div class="flex w-full justify-between border-t p-4 sm:w-auto sm:border-none sm:pl-0 lg:p-6 lg:pl-0">
                            <div class="flex flex-col items-start gap-2">
                                <div class="flex h-12 w-20 overflow-hidden rounded border">
                                    <input type="text" value="{{ $cart->count }}" readonly
                                        class="w-full px-4 py-2 outline-none ring-inset ring-indigo-300 transition duration-100 focus:ring" />

                                    <div class="flex flex-col divide-y border-l">
                                        <a @if(getProductStock($cart->product_id) - $cart->count < 1)disabled @endif href="{{ route('product.cart.increase', $cart->id) }}"
                                            class="flex w-6 flex-1 select-none items-center justify-center bg-white leading-none transition duration-100 hover:bg-gray-100 active:bg-gray-200 disabled:opacity-25">+</a>
                                        <a href="{{ route('product.cart.decrease', $cart->id) }}"
                                            class="flex w-6 flex-1 select-none items-center justify-center bg-white leading-none transition duration-100 hover:bg-gray-100 active:bg-gray-200 disabled:opacity-25">-</a>
                                    </div>
                                </div>

                                <a href="{{ route('product.cart.delete-all', $cart->id) }}"
                                    class="select-none text-sm font-semibold text-indigo-500 transition duration-100 hover:text-indigo-600 active:text-indigo-700">Delete</a>
                            </div>

                            <div class="ml-4 pt-3 md:ml-8 md:pt-2 lg:ml-16">
                                <span class="block font-bold text-gray-800 md:text-lg">RM{{ $cart->product->discount_tag ? number_format($cart->product->discount_price*$cart->count, 2, '.') : number_format($cart->product->price*$cart->count, 2, '.') }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- product - end -->
                    @endforeach
                </div>

                <!-- totals - start -->
                @if(count($carts)> 0)
                <div class="flex flex-col items-end gap-4">
                    <div class="w-full rounded-lg bg-gray-100 p-4 sm:max-w-xs">
                        <div class="space-y-1">
                            <div class="flex justify-between gap-4 text-gray-500">
                                <span>Subtotal</span>
                                <span>RM{{ number_format($subtotal, 2, '.') }}</span>
                            </div>

                            <div class="flex justify-between gap-4 text-gray-500">
                                <span>Shipping</span>
                                <span>RM{{ number_format($shipping, 2, '.') }}</span>
                            </div>
                        </div>

                        <div class="mt-4 border-t pt-4">
                            <div class="flex items-start justify-between gap-4 text-gray-800">
                                <span class="text-lg font-bold">Total</span>

                                <span class="flex flex-col items-end">
                                    <span class="text-lg font-bold">RM{{ number_format($total, 2, '.') }}</span>
                                    <span class="text-sm text-gray-500">including VAT</span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('product.payment') }}"
                        class="inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">Check
                        out</a>
                </div>
                @endif
                <!-- totals - end -->
            </div>
        </div>
    @endslot
@endcomponent
