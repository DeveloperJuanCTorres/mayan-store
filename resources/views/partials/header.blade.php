<!-- HEADER -->
<header class="fixed top-0 left-0 w-full z-50">

    <!-- TOP BAR -->
    <div class="bg-[#111111] text-white text-[11px] tracking-[0.25em] uppercase hidden lg:block">

        <div class="max-w-screen-2xl mx-auto px-6 lg:px-10 h-10 flex items-center justify-between">

            <div class="flex items-center gap-8">

                <div class="flex items-center gap-2 text-white/70">
                    <i class="fa-solid fa-location-dot text-[#c8a96b]"></i>
                    <span>Lima, Perú</span>
                </div>

                <div class="flex items-center gap-2 text-white/70">
                    <i class="fa-solid fa-truck-fast text-[#c8a96b]"></i>
                    <span>Envíos Premium a todo el Perú</span>
                </div>

            </div>

            <div class="flex items-center gap-6">

                <a href="#" class="hover:text-[#c8a96b] transition">
                    <i class="fa-brands fa-instagram"></i>
                </a>

                <a href="#" class="hover:text-[#c8a96b] transition">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>

                <a href="#" class="hover:text-[#c8a96b] transition">
                    <i class="fa-brands fa-tiktok"></i>
                </a>

            </div>

        </div>

    </div>

    <!-- MAIN NAV -->
    <nav class="bg-white/80 backdrop-blur-2xl border-b border-[#ece7df]/80">

        <div class="max-w-screen-2xl mx-auto px-6 lg:px-10">

            <div class="h-24 flex items-center justify-between">

                <!-- LOGO -->
                <a href="{{ route('home') }}"
                class="flex items-center gap-4 group">

                    <div class="relative">

                        <img
                            src="{{ asset('storage/' . $business->image) }}"
                            class="h-20 w-auto transition duration-500 group-hover:scale-105">

                        <div class="absolute -inset-2 bg-[#c8a96b]/10 blur-2xl rounded-full opacity-0 group-hover:opacity-100 transition duration-500"></div>

                    </div>

                </a>

                <!-- DESKTOP MENU -->
                <div class="hidden lg:flex items-center gap-12">

                    <a href="{{ route('home') }}"
                    class="relative text-[13px] uppercase tracking-[0.25em] transition group
                    {{ request()->routeIs('home') 
                        ? 'text-[#c8a96b]' 
                        : 'text-[#444] hover:text-[#c8a96b]' }}">

                        Inicio

                        <span class="absolute -bottom-2 left-0 h-[1px] bg-[#c8a96b] transition-all duration-500
                        {{ request()->routeIs('home') ? 'w-full' : 'w-0 group-hover:w-full' }}">
                        </span>

                    </a>

                    <a href="{{ route('tienda') }}"
                    class="relative text-[13px] uppercase tracking-[0.25em] transition group
                    {{ request()->routeIs('tienda') 
                        ? 'text-[#c8a96b]' 
                        : 'text-[#444] hover:text-[#c8a96b]' }}">

                        Tienda

                        <span class="absolute -bottom-2 left-0 h-[1px] bg-[#c8a96b] transition-all duration-500
                        {{ request()->routeIs('tienda') ? 'w-full' : 'w-0 group-hover:w-full' }}">
                        </span>

                    </a>

                    <a href="{{ route('about') }}"
                    class="relative text-[13px] uppercase tracking-[0.25em] transition group
                    {{ request()->routeIs('about') 
                        ? 'text-[#c8a96b]' 
                        : 'text-[#444] hover:text-[#c8a96b]' }}">

                        Nosotros

                        <span class="absolute -bottom-2 left-0 h-[1px] bg-[#c8a96b] transition-all duration-500
                        {{ request()->routeIs('about') ? 'w-full' : 'w-0 group-hover:w-full' }}">
                        </span>

                    </a>

                    <a href="{{ route('contactanos') }}"
                    class="relative text-[13px] uppercase tracking-[0.25em] transition group
                    {{ request()->routeIs('contactanos') 
                        ? 'text-[#c8a96b]' 
                        : 'text-[#444] hover:text-[#c8a96b]' }}">

                        Contacto

                        <span class="absolute -bottom-2 left-0 h-[1px] bg-[#c8a96b] transition-all duration-500
                        {{ request()->routeIs('contactanos') ? 'w-full' : 'w-0 group-hover:w-full' }}">
                        </span>

                    </a>

                </div>

                <!-- RIGHT -->
                <div class="flex items-center gap-4 lg:gap-6">

                    <!-- SEARCH -->
                    <form action="{{ route('tienda') }}" method="GET"
                        class="hidden md:flex items-center">

                        <div class="flex items-center bg-white border border-[#ece7df] rounded-full overflow-hidden hover:border-[#c8a96b] transition-all duration-500">

                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                placeholder="Buscar productos..."
                                class="w-[220px] px-5 py-3 bg-transparent border-none outline-none focus:outline-none focus:ring-0 focus:border-none text-sm text-[#222] placeholder:text-[#999]">

                            <button type="submit"
                                class="w-12 h-12 flex items-center justify-center hover:bg-[#c8a96b] hover:text-white transition-all duration-500">

                                <i class="fa-solid fa-magnifying-glass text-sm"></i>

                            </button>

                        </div>

                    </form>

                    <!-- ACCOUNT -->
                    <!-- <button
                        class="hidden md:flex w-12 h-12 rounded-full border border-[#ece7df] items-center justify-center hover:bg-[#c8a96b] hover:text-white hover:border-[#c8a96b] transition-all duration-500">

                        <i class="fa-regular fa-user text-sm"></i>

                    </button> -->

                    <!-- CART -->
                    <button
                        onclick="openCart()"
                        class="relative w-12 h-12 rounded-full bg-[#1a1a1a] text-white flex items-center justify-center hover:bg-[#c8a96b] transition-all duration-500 shadow-xl">

                        <i class="fa-solid fa-bag-shopping text-sm"></i>

                        <!-- COUNT -->
                        <span id="cartCount"
                            class="absolute -top-1 -right-1 min-w-[22px] h-[22px] px-1 rounded-full bg-[#c8a96b] text-white text-[10px] font-bold flex items-center justify-center border-2 border-white">

                            {{ Cart::count() }}

                        </span>

                    </button>

                    <!-- MOBILE BUTTON -->
                    <button id="menuBtn"
                        class="lg:hidden w-12 h-12 rounded-full border border-[#ece7df] flex items-center justify-center">

                        <i class="fa-solid fa-bars text-lg"></i>

                    </button>

                </div>

            </div>

        </div>

    </nav>

</header>

<!-- MOBILE MENU -->
<div id="mobileMenu"
    class="fixed inset-0 z-[99999] hidden">

    <!-- OVERLAY -->
    <div id="mobileOverlay"
        class="absolute inset-0 bg-black/60 backdrop-blur-sm"></div>

    <!-- PANEL -->
    <div id="mobilePanel"
        class="absolute top-0 right-0 w-[320px] max-w-full h-full bg-white shadow-2xl translate-x-full transition-transform duration-500 flex flex-col z-[100000]">

        <!-- HEADER -->
        <div class="h-24 px-6 border-b border-[#eee] flex items-center justify-between">

            <div>

                <h2 class="font-serif text-2xl">
                    Menú
                </h2>

                <p class="text-[10px] uppercase tracking-[0.3em] text-[#c8a96b] mt-1">
                    Navigation
                </p>

            </div>

            <button id="closeMenu"
                class="w-11 h-11 rounded-full border border-[#eee] flex items-center justify-center hover:bg-[#c8a96b] hover:text-white transition">

                <i class="fa-solid fa-xmark"></i>

            </button>

        </div>

        <!-- LINKS -->
        <div class="flex-1 overflow-y-auto px-6 py-10">

            <div class="space-y-2">

                <a href="{{ route('home') }}"
                    class="flex items-center justify-between px-5 py-5 rounded-2xl transition-all duration-500 group
                    {{ request()->routeIs('home')
                        ? 'bg-[#c8a96b] text-white'
                        : 'bg-[#faf7f2] hover:bg-[#c8a96b] hover:text-white' }}">

                    <div class="flex items-center gap-4">

                        <i class="fa-solid fa-house text-sm"></i>

                        <span class="uppercase tracking-[0.2em] text-xs">
                            Inicio
                        </span>

                    </div>

                    <i class="fa-solid fa-arrow-right text-xs group-hover:translate-x-1 transition"></i>

                </a>

                <a href="{{ route('tienda') }}"
                class="flex items-center justify-between px-5 py-5 rounded-2xl transition-all duration-500 group
                    {{ request()->routeIs('tienda')
                        ? 'bg-[#c8a96b] text-white'
                        : 'bg-[#faf7f2] hover:bg-[#c8a96b] hover:text-white' }}">

                    <div class="flex items-center gap-4">

                        <i class="fa-solid fa-store text-sm"></i>

                        <span class="uppercase tracking-[0.2em] text-xs">
                            Tienda
                        </span>

                    </div>

                    <i class="fa-solid fa-arrow-right text-xs group-hover:translate-x-1 transition"></i>

                </a>

                <a href="{{ route('about') }}"
                class="flex items-center justify-between px-5 py-5 rounded-2xl transition-all duration-500 group
                    {{ request()->routeIs('about')
                        ? 'bg-[#c8a96b] text-white'
                        : 'bg-[#faf7f2] hover:bg-[#c8a96b] hover:text-white' }}">

                    <div class="flex items-center gap-4">

                        <i class="fa-solid fa-gem text-sm"></i>

                        <span class="uppercase tracking-[0.2em] text-xs">
                            Nosotros
                        </span>

                    </div>

                    <i class="fa-solid fa-arrow-right text-xs group-hover:translate-x-1 transition"></i>

                </a>

                <a href="{{ route('contactanos') }}"
                class="flex items-center justify-between px-5 py-5 rounded-2xl transition-all duration-500 group
                    {{ request()->routeIs('contactanos')
                        ? 'bg-[#c8a96b] text-white'
                        : 'bg-[#faf7f2] hover:bg-[#c8a96b] hover:text-white' }}">

                    <div class="flex items-center gap-4">

                        <i class="fa-solid fa-envelope text-sm"></i>

                        <span class="uppercase tracking-[0.2em] text-xs">
                            Contacto
                        </span>

                    </div>

                    <i class="fa-solid fa-arrow-right text-xs group-hover:translate-x-1 transition"></i>

                </a>

            </div>

        </div>

        <!-- FOOT -->
        <div class="p-6 border-t border-[#eee]">

            <a href="https://wa.me/51999999999"
            target="_blank"
            class="flex items-center justify-center gap-3 w-full py-5 rounded-2xl bg-[#25D366] text-white uppercase tracking-[0.2em] text-xs hover:scale-[1.02] transition-all duration-500 shadow-lg">

                <i class="fa-brands fa-whatsapp text-lg"></i>

                WhatsApp

            </a>

        </div>

    </div>

</div>

<!-- CART DRAWER -->
<div id="cartDrawer"
    class="fixed top-0 right-0 w-full sm:w-[450px] h-full bg-white z-[9999] translate-x-full transition-transform duration-500 flex flex-col shadow-[0_0_80px_rgba(0,0,0,0.15)]">

    <!-- HEADER -->
    <div class="h-24 px-6 border-b border-[#eee] flex items-center justify-between">

        <div>

            <p class="uppercase tracking-[0.3em] text-[10px] text-[#c8a96b] mb-2">
                Shopping Cart
            </p>

            <h2 class="text-2xl font-serif">
                Tu carrito
            </h2>

        </div>

        <button onclick="closeCart()"
            class="w-11 h-11 rounded-full border border-[#eee] flex items-center justify-center hover:bg-[#c8a96b] hover:text-white transition-all duration-500">

            <i class="fa-solid fa-xmark"></i>

        </button>

    </div>

    <!-- ITEMS -->
    <div id="cartItems"
        class="flex-1 overflow-y-auto p-6 space-y-5 bg-[#fcfaf7]">

    </div>

    <!-- FOOTER -->
    <div class="border-t border-[#eee] p-6 bg-white space-y-6">

        <div class="flex items-center justify-between">

            <span class="uppercase tracking-[0.2em] text-xs text-[#777]">
                Total
            </span>

            <span id="cartTotal"
                class="text-3xl font-serif">
                S/. 0.00
            </span>

        </div>

        <button
            onclick="window.location='{{ route('cart.index') }}'"
            class="w-full py-5 rounded-full bg-[#1a1a1a] text-white uppercase tracking-[0.25em] text-xs hover:bg-[#c8a96b] transition-all duration-500 shadow-xl">

            Finalizar Compra

        </button>

    </div>

</div>

<!-- CART OVERLAY -->
<div id="cartOverlay"
    onclick="closeCart()"
    class="fixed inset-0 bg-black/50 backdrop-blur-sm z-[9998] hidden">
</div>

<script>

    document.addEventListener('DOMContentLoaded', () => {

        // MOBILE MENU
        const menuBtn = document.getElementById('menuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const mobilePanel = document.getElementById('mobilePanel');
        const closeMenu = document.getElementById('closeMenu');
        const mobileOverlay = document.getElementById('mobileOverlay');

        if(menuBtn){

            menuBtn.addEventListener('click', () => {

                mobileMenu.classList.remove('hidden');

                setTimeout(() => {

                    mobilePanel.classList.remove('translate-x-full');

                }, 10);

            });

        }

        function closeMobileMenu() {

            mobilePanel.classList.add('translate-x-full');

            setTimeout(() => {

                mobileMenu.classList.add('hidden');

            }, 300);

        }

        if(closeMenu){
            closeMenu.addEventListener('click', closeMobileMenu);
        }

        if(mobileOverlay){
            mobileOverlay.addEventListener('click', closeMobileMenu);
        }

    });

</script>