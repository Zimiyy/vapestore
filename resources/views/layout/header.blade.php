    <!-- hero - start -->
<div class="bg-black">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
        <header class="pb-8 flex items-center justify-between py-4 md:pb-12 md:py-8 xl:pb-16">
            <!-- logo - start -->
            <a href="/" class="text-white inline-flex items-center gap-2.5 text-2xl font-bold md:text-3xl" aria-label="logo">
            <svg width="95" height="94" viewBox="0 0 95 94" class="h-auto w-6 text-indigo-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M96 0V47L48 94H0V47L48 0H96Z" />
            </svg>

            VAPESTORE
            </a>
            <!-- logo - end -->

            <!-- nav - start -->
            <nav class="hidden gap-12 lg:flex 2xl:ml-16">
                <a href="{{ route('landing') }}" class="text-lg font-semibold @if(is_active('landing')) text-indigo-500 @else text-white transition duration-100 hover:text-indigo-500 active:text-indigo-700 @endif">Home</a>
                <a href="{{ route('product.index') }}" class="text-lg @if(is_active('product.*')) text-indigo-500 @else text-white transition duration-100 hover:text-indigo-500 active:text-indigo-700 @endif">All Products</a>
                <a href="{{ route('contact') }}" class="text-lg @if(is_active('contact')) text-indigo-500 @else text-white transition duration-100 hover:text-indigo-500 active:text-indigo-700 @endif">Contact</a>
                <a href="{{ route('landing').'#about' }}" class="text-lg @if(is_active('login')) text-indigo-500 @else text-white transition duration-100 hover:text-indigo-500 active:text-indigo-700 @endif">About</a>
              </nav>
              <!-- nav - end -->

              <!-- buttons - start -->
              <div class="flex divide-x border-r sm:border-l">
                <a href="{{ route('product.wishlist') }}" class="hidden h-12 w-12 flex-col items-center justify-center gap-1.5 transition text-white duration-100 hover:text-indigo-500 active:text-indigo-500 sm:flex sm:h-20 sm:w-20 md:h-24 md:w-24">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                  </svg>

                  <span class="hidden text-xs font-semibold sm:block @if(is_active('product.wishlist')) text-indigo-500 @else text-white transition duration-100 hover:text-indigo-500 active:text-indigo-700 @endif">Wishlist</span>
                </a>
                @if(user())
                <a href="{{ route('signout') }}" class="flex h-12 w-12 flex-col items-center justify-center gap-1.5 transition text-white duration-100 hover:text-indigo-500 active:text-indigo-500 sm:h-20 sm:w-20 md:h-24 md:w-24">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M12,9.75c-.41,0-.75-.34-.75-.75V4c0-.41,.34-.75,.75-.75s.75,.34,.75,.75v5c0,.41-.34,.75-.75,.75Z"></path><path d="M12,21.75c-4.55,0-8.25-3.7-8.25-8.25,0-3.49,2.21-6.61,5.5-7.77,.39-.14,.82,.07,.96,.46,.14,.39-.07,.82-.46,.96-2.69,.94-4.5,3.5-4.5,6.35,0,3.72,3.03,6.75,6.75,6.75s6.75-3.03,6.75-6.75c0-2.86-1.81-5.41-4.5-6.35-.39-.14-.6-.57-.46-.96,.14-.39,.56-.6,.96-.46,3.29,1.15,5.5,4.28,5.5,7.77,0,4.55-3.7,8.25-8.25,8.25Z"></path>
                    </svg>
                    <span class="hidden text-xs font-semibold sm:block">Log Out</span>
                </a>
                @else
                <a href="{{ route('signin') }}" class="flex h-12 w-12 flex-col items-center justify-center gap-1.5 transition text-white duration-100 hover:text-indigo-500 active:text-indigo-500 sm:h-20 sm:w-20 md:h-24 md:w-24">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                  </svg>

                  <span class="hidden text-xs font-semibold sm:block">Log In</span>
                </a>
                @endif
                {{-- <a href="{{ route('signin') }}" class="flex h-12 w-12 flex-col items-center justify-center gap-1.5 transition text-white duration-100 hover:text-indigo-500 active:text-indigo-500 sm:h-20 sm:w-20 md:h-24 md:w-24">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M12,9.75c-.41,0-.75-.34-.75-.75V4c0-.41,.34-.75,.75-.75s.75,.34,.75,.75v5c0,.41-.34,.75-.75,.75Z"></path><path d="M12,21.75c-4.55,0-8.25-3.7-8.25-8.25,0-3.49,2.21-6.61,5.5-7.77,.39-.14,.82,.07,.96,.46,.14,.39-.07,.82-.46,.96-2.69,.94-4.5,3.5-4.5,6.35,0,3.72,3.03,6.75,6.75,6.75s6.75-3.03,6.75-6.75c0-2.86-1.81-5.41-4.5-6.35-.39-.14-.6-.57-.46-.96,.14-.39,.56-.6,.96-.46,3.29,1.15,5.5,4.28,5.5,7.77,0,4.55-3.7,8.25-8.25,8.25Z"></path>
                    </svg>
                    <span class="hidden text-xs font-semibold sm:block">Log Out</span>
                </a> --}}
                <a href="#" class="flex h-12 w-12 flex-col items-center justify-center gap-1.5 transition text-white duration-100 hover:text-indigo-500 active:text-indigo-500 sm:h-20 sm:w-20 md:h-24 md:w-24">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                  </svg>

                  <span class="hidden text-xs font-semibold sm:block">Cart</span>
                </a>
              </div>
              <!-- buttons - end -->
            </div>
          </header>
    </div>
</div>
