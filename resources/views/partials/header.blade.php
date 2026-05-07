<nav class="bg-stone-50/80 dark:bg-stone-950/80 backdrop-blur-xl sticky top-0 z-50 shadow-sm">
    <div class="flex justify-between items-center w-full px-6 py-4 max-w-screen-2xl mx-auto">

        <!-- Logo -->
        <div class="flex items-center gap-3">
            <img src="{{asset('storage/' . $business->image)}}"
                class="h-12 w-auto">
            <span class="text-xl md:text-2xl font-serif font-bold text-yellow-800 dark:text-yellow-500">
                Mayan Store
            </span>
        </div>

        <!-- Desktop Menu -->
        <div class="hidden md:flex items-center gap-8 font-serif">
            <a href="{{ route('home') }}" class="nav-link">Inicio</a>
            <a href="{{ route('tienda') }}" class="nav-link">Tienda</a>
            <a href="{{ route('about') }}" class="nav-link">Nosotros</a>
            <a href="{{ route('contactanos') }}" class="nav-link">Contáctanos</a>
        </div>

        <!-- Right Section -->
        <div class="flex items-center gap-4">

            <div class="relative cursor-pointer" onclick="openCart()">
                <i class="fa-solid fa-bag-shopping text-xl text-primary-700"></i>

                <!-- Badge -->
                <span id="cartCount"
                    class="absolute -top-2 -right-2 bg-blue-500 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full">
                    {{ Cart::count() }}
                </span>
            </div>

            <!-- Hamburger -->
            <button id="menuBtn" class="md:hidden text-stone-700">
                <span class="material-symbols-outlined text-3xl">menu</span>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden md:hidden px-6 pb-4">
        <div class="flex flex-col gap-4 font-serif">
            <a href="{{ route('home') }}" class="mobile-link">Inicio</a>
            <a href="{{ route('tienda') }}" class="mobile-link">Tienda</a>
            <a href="{{ route('about') }}" class="mobile-link">Nosotros</a>
            <a href="{{ route('contactanos') }}" class="mobile-link">Contáctanos</a>
            <button class="text-left text-xs uppercase tracking-widest font-bold text-stone-600">
                Login
            </button>
        </div>
    </div>
</nav>


<div id="cartDrawer"
    class="fixed top-0 right-0 w-full sm:w-[420px] h-full bg-white shadow-2xl z-50 transform translate-x-full transition-transform duration-300 flex flex-col">



    <!-- Header -->
    <div class="flex items-center justify-between p-5 border-b">
        <h2 class="text-lg font-bold">Tu carrito</h2>
        <button onclick="closeCart()" class="text-gray-500 hover:text-black">
            <i class="fa-solid fa-xmark text-xl"></i>
        </button>
    </div>

    <!-- Content -->
    <div id="cartItems" class="flex-1 overflow-y-auto p-5 space-y-4">
        <!-- Productos dinámicos -->
    </div>

    <!-- Footer -->
    <div class="p-5 border-t space-y-4">
        <div class="flex justify-between font-bold">
            <span>Total</span>
            <span id="cartTotal">S/. 0.00</span>
        </div>

        <button onclick="window.location='{{ route('cart.index') }}'" class="w-full bg-black text-white py-3 rounded-lg hover:opacity-90">
            Finalizar compra
        </button>
    </div>
</div>

<!-- Overlay -->
<div id="cartOverlay"
    onclick="closeCart()"
    class="fixed inset-0 bg-black/40 z-40 hidden"></div>


