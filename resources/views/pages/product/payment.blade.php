@component('layout.app')
    @slot('content')
        <div class="py-20">
            <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                <h2 class="mb-4 text-center text-2xl font-bold text-white md:mb-8 lg:text-3xl">Secure Payment Info</h2>
                <form class="mx-auto max-w-lg rounded-lg border">
                    <div class="flex flex-col gap-4 p-4 md:p-8">
                        <div>
                            <label for="payment_method" class="mb-2 inline-block text-sm text-white sm:text-base">Payment Method</label>
                            <select name="payment_method" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring">
                                <option selected>FPX</option>
                                <option value="US">Debit Card</option>
                            </select>
                        </div>
                        <div>
                            <label for="name" class="mb-2 inline-block text-sm text-white sm:text-base">Full Name on Card</label>
                            <input name="name"
                                class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                        </div>
                        <div>
                            <label for="email" class="mb-2 inline-block text-sm text-white sm:text-base">Email</label>
                            <input name="email"
                                class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                        </div>
                        <div>
                            <label for="address" class="mb-2 inline-block text-sm text-white sm:text-base">Address</label>
                            <input name="address"
                                class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                        </div>
                        <div>
                            <label for="postal_code" class="mb-2 text-sm text-white sm:text-base">Postal Code</label>
                            <input name="postal_code"
                                class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                        </div>
                        <div>
                            <label for="card_no" class="mb-2 inline-block text-sm text-white sm:text-base">Card Number</label>
                            <br /><input name="card_no"
                                class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                        </div>
                        <button
                            class="rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-gray-300 transition duration-100 hover:bg-indigo-700 focus-visible:ring active:bg-indigo-700 md:text-base">
                            PAY NOW</button>
                    </div>
                </form>
            </div>
        </div>
    @endslot
@endcomponent
