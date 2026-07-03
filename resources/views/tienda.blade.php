@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#f8f6f2] text-[#1a1a1a]">

    <div class="max-w-screen-2xl mx-auto px-6 lg:px-10 py-48">

        <!-- HERO -->
        <!-- <header class="mb-24 max-w-4xl">
            <p class="uppercase tracking-[0.4em] text-[#c8a96b] text-xs mb-6">
                Xuping
            </p>

            <h1 class="text-6xl md:text-8xl leading-[0.95] tracking-tight font-serif font-light mb-8">
                La mejor <br>
                <span class="italic text-[#c8a96b]">
                    Colección
                </span>
            </h1>

            <p class="text-[#6b6b6b] text-lg leading-relaxed max-w-2xl">
                Legados artesanales inspirados en los patrones celestiales y la precisión arquitectónica de la herencia maya.
                Cada pieza es un diálogo único entre el oro y el alma.
            </p>

            <div class="w-24 h-[1px] bg-[#c8a96b] mt-10"></div>
        </header> -->


        @if(request('search'))
            <p class="mb-8 text-sm text-[#777]">
                Resultados para:
                <span class="font-semibold text-black">
                    "{{ request('search') }}"
                </span>
            </p>
        @endif

        <div class="flex flex-col lg:flex-row gap-16">

            

            <!-- SIDEBAR -->
            <!-- MOBILE FILTER BUTTON -->
            <div class="lg:hidden mb-10">

                <button onclick="openFilters()"
                    class="flex items-center gap-3 px-6 py-4 rounded-full bg-white border border-[#e8e3db] shadow-sm uppercase tracking-[0.25em] text-[11px]">

                    <span>Filtros</span>

                    <span>☰</span>

                </button>

            </div>

            <!-- DESKTOP SIDEBAR -->
            <!-- <aside class="hidden lg:block w-full lg:w-72 sticky top-28 h-fit">

                <div class="bg-white rounded-3xl p-8 shadow-sm border border-[#eee]">

                    <h3 class="text-lg font-serif mb-8">
                        Categorías
                    </h3>

                    <ul class="space-y-5">

                        @foreach($categories as $category)

                        <li>
                            <a href="{{ route('tienda', ['category' => $category->id]) }}"
                            class="flex items-center justify-between text-sm tracking-wide text-[#555] hover:text-[#c8a96b] transition-all duration-300">

                                <span>{{ $category->name }}</span>

                                <span>→</span>

                            </a>
                        </li>

                        @endforeach

                    </ul>

                </div>

            </aside> -->

            <!-- SIDEBAR FILTERS -->
            <aside class="hidden lg:block w-full lg:w-[320px]">

                <div class="sticky top-28">

                    <div class="bg-white/80 backdrop-blur-2xl rounded-[36px]
                        border border-white shadow-[0_20px_60px_rgba(0,0,0,0.06)]
                        overflow-hidden">

                        <!-- HEADER -->
                        <div class="p-8 border-b border-[#f1ece5]">

                            <h3 class="text-3xl font-serif font-light text-[#111]">
                                Filtrar Productos
                            </h3>

                        </div>

                        <!-- CONTENT -->
                        <div class="p-8 space-y-10">

                            <!-- CATEGORIES -->
                            <div>

                                <div class="flex items-center justify-between mb-6">

                                    <h4 class="uppercase tracking-[0.25em] text-[11px] text-[#999]">
                                        Categorías
                                    </h4>

                                    <span class="text-xs text-[#bbb]">
                                        {{ count($categories) }}
                                    </span>

                                </div>

                                <!-- scroll area -->
                                <div class="max-h-[320px] overflow-y-auto pr-2 custom-scroll space-y-3">

                                    <!-- all products -->
                                    <a href="{{ route('tienda') }}"
                                    class="group flex items-center justify-between px-5 py-4 rounded-2xl
                                    bg-[#f8f6f2] hover:bg-[#111] transition-all duration-300">

                                        <span class="text-sm text-[#444] group-hover:text-white transition">
                                            Todos los productos
                                        </span>

                                        <span class="text-[#c8a96b] group-hover:text-white transition">
                                            →
                                        </span>

                                    </a>

                                    @foreach($categories as $category)

                                        @php
                                            $isActive = request('category') == $category->id;
                                        @endphp

                                        <a href="{{ route('tienda', ['category' => $category->id]) }}"
                                        class="group flex items-center justify-between px-5 py-4 rounded-2xl transition-all duration-300
                                        {{ $isActive
                                            ? 'bg-[#111] text-white shadow-lg'
                                            : 'bg-[#f8f6f2] hover:bg-[#111]'
                                        }}">
                                            
                                            <span class="text-sm transition
                                            {{ $isActive
                                                ? 'text-white'
                                                : 'text-[#444] group-hover:text-white'
                                            }}">

                                                {{ $category->name }}

                                            </span>

                                            <span class="transition
                                            {{ $isActive
                                                ? 'text-[#c8a96b]'
                                                : 'text-[#c8a96b] group-hover:text-white'
                                            }}">
                                                →
                                            </span>

                                        </a>

                                    @endforeach

                                </div>

                            </div>

                            <!-- PRICE FILTER -->
                            <div>

                                <div class="flex items-center justify-between mb-6">

                                    <h4 class="uppercase tracking-[0.25em] text-[11px] text-[#999]">
                                        Filtrar por Precio
                                    </h4>

                                </div>

                                <form method="GET" action="{{ route('tienda') }}" class="space-y-5">

                                    <!-- preserve category -->
                                    @if(request('category'))
                                        <input type="hidden" name="category" value="{{ request('category') }}">
                                    @endif

                                    <!-- min -->
                                    <div>

                                        <label class="block text-xs uppercase tracking-[0.2em] text-[#999] mb-3">

                                            Precio mínimo

                                        </label>

                                        <div class="relative">

                                            <span class="absolute left-5 top-1/2 -translate-y-1/2 text-[#999] text-sm">
                                                S/.
                                            </span>

                                            <input
                                                type="number"
                                                name="min_price"
                                                value="{{ request('min_price') }}"
                                                placeholder="0"
                                                class="w-full h-14 rounded-2xl bg-[#f8f6f2]
                                                border border-transparent
                                                focus:border-[#c8a96b]
                                                focus:ring-0
                                                pl-14 pr-5 text-sm outline-none transition-all duration-300"
                                            >

                                        </div>

                                    </div>

                                    <!-- max -->
                                    <div>

                                        <label class="block text-xs uppercase tracking-[0.2em] text-[#999] mb-3">

                                            Precio máximo

                                        </label>

                                        <div class="relative">

                                            <span class="absolute left-5 top-1/2 -translate-y-1/2 text-[#999] text-sm">
                                                S/.
                                            </span>

                                            <input
                                                type="number"
                                                name="max_price"
                                                value="{{ request('max_price') }}"
                                                placeholder="500"
                                                class="w-full h-14 rounded-2xl bg-[#f8f6f2]
                                                border border-transparent
                                                focus:border-[#c8a96b]
                                                focus:ring-0
                                                pl-14 pr-5 text-sm outline-none transition-all duration-300"
                                            >

                                        </div>

                                    </div>

                                    <!-- buttons -->
                                    <div class="flex gap-3 pt-2">

                                        <button
                                            type="submit"
                                            class="flex-1 h-14 rounded-2xl bg-[#111]
                                            text-white uppercase tracking-[0.25em] text-[11px]
                                            hover:bg-[#c8a96b]
                                            transition-all duration-500">

                                            Aplicar

                                        </button>

                                        <a href="{{ route('tienda') }}"
                                        class="h-14 px-6 rounded-2xl bg-[#f3efe8]
                                        flex items-center justify-center
                                        text-[#777] hover:bg-[#111] hover:text-white
                                        transition-all duration-500">

                                            <i class="fa-solid fa-rotate-right"></i>

                                        </a>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </aside>

            <!-- PRODUCTS -->
            <!-- PRODUCTS -->
            <section class="flex-1">

                <!-- HEADER -->
                <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-8 mb-16">

                    <div>

                        <p class="uppercase tracking-[0.45em] text-[#c8a96b] text-[10px] mb-4">
                            Xuping
                        </p>

                        <h2 class="text-4xl lg:text-6xl font-serif font-light leading-none text-[#111]">
                            Nuestra Colección
                        </h2>

                    </div>

                    <div class="flex items-center gap-4">

                        <div class="bg-white border border-[#ebe7df] rounded-full px-6 py-4 shadow-sm">

                            <p class="uppercase tracking-[0.25em] text-[10px] text-[#777]">

                                {{ $products->total() }} Productos Disponibles

                            </p>

                        </div>

                    </div>

                </div>

                <!-- GRID -->
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-10">

                    @foreach($products as $product)

                    @php
                        $images = json_decode($product->images, true);
                        $firstImage = $images[0]['url_imagen'] ?? null;
                    @endphp

                    <!-- CARD -->
                    <div class="group">

                        <div class="relative bg-white rounded-[36px] overflow-hidden border border-[#ece7df]
                            hover:shadow-[0_30px_80px_rgba(0,0,0,0.08)]
                            transition-all duration-700">

                            <!-- IMAGE -->
                            <div class="relative overflow-hidden bg-[#f5f1eb]">

                                <!-- badge -->
                                <div class="absolute top-6 left-6 z-20">

                                    <div class="px-5 py-2 rounded-full bg-white/90 backdrop-blur-xl shadow-sm">

                                        <p class="uppercase tracking-[0.3em] text-[9px] text-[#111]">
                                            Xuping
                                        </p>

                                    </div>

                                </div>

                                <!-- actions -->
                                <div class="absolute top-6 right-6 z-20 flex flex-col gap-3 opacity-0 translate-x-10 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-500">

                                    <button
                                        onclick="openProductModal({{ $product->id }})"
                                        class="w-12 h-12 rounded-full bg-white text-[#111]
                                        shadow-xl hover:bg-[#c8a96b] hover:text-white transition-all duration-300">

                                        <i class="fa-solid fa-eye"></i>

                                    </button>

                                    <button
                                        onclick="quickAddToCart({{ $product->id }})"
                                        class="w-12 h-12 rounded-full bg-white text-[#111]
                                        shadow-xl hover:bg-[#111] hover:text-white transition-all duration-300">

                                        <i class="fa-solid fa-bag-shopping"></i>

                                    </button>

                                </div>

                                <!-- image -->
                                <img
                                    src="{{ $firstImage ?? asset('images/product-default.png') }}"
                                    alt="{{ $product->name }}"
                                    class="m-auto w-auto h-[300px] transition-all duration-700 group-hover:scale-105"
                                >

                                <!-- overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500"></div>

                            </div>

                            <!-- INFO -->
                            <div class="p-8">

                                <!-- code -->
                                <p class="uppercase tracking-[0.35em] text-[#c8a96b] text-[9px] mb-4">

                                    {{$product->id_sistema . ' - ' . $product->codigo_producto}}

                                </p>

                                <!-- title -->
                                <h3 class="text-[16px] leading-snug text-[#111] mb-5 min-h-[58px]">

                                    {{ $product->name }}

                                </h3>

                                <!-- divider -->
                                <div class="w-full h-[1px] bg-[#f1ece5] mb-6"></div>

                                <!-- footer -->
                                <div class="flex items-end justify-between gap-5">

                                    <div>

                                        <p class="text-3xl font-light text-[#111] tracking-tight">

                                            S/. {{ number_format($product->price, 2) }}

                                        </p>

                                        @if($product->stock >= 3)

                                        <p class="text-[11px] text-[#888] mt-2 uppercase tracking-[0.15em]">

                                            Mayorista:
                                            S/. {{ number_format($product->price_mayorista, 2) }}

                                        </p>

                                        @else
                                        <!-- stock -->                          

                                        <div class="bottom-6 left-6 mt-2">

                                            <div class="px-4 py-2 rounded-full bg-red-500 text-white shadow-lg">

                                                <p class="uppercase tracking-[0.25em] text-[7px]">
                                                    Últimas unidades
                                                </p>

                                            </div>

                                        </div>


                                        @endif

                                    </div>

                                    <!-- button -->
                                    <button
                                        onclick="quickAddToCart({{ $product->id }})"
                                        class="px-6 py-4 rounded-full bg-[#111] text-white
                                        uppercase tracking-[0.25em] text-[10px]
                                        hover:bg-[#c8a96b]
                                        transition-all duration-500">

                                        Agregar

                                    </button>

                                </div>

                            </div>

                            

                        </div>

                    </div>

                    @endforeach

                </div>

                <!-- PAGINATION -->
                <div class="mt-24 flex justify-center">

                    {{ $products->links('vendor.pagination.luxury') }}

                </div>

            </section>

        </div>

    </div>

    <!-- MODAL -->
    <div id="productModal"
        class="fixed inset-0 z-[9999] hidden bg-black/70 backdrop-blur-2xl overflow-y-auto">

        <div class="w-full min-h-screen flex items-center justify-center p-4 lg:p-10">

            <div id="modalContent"
                class="w-full max-w-7xl bg-[#fdfbf8] rounded-[40px] p-6 lg:p-12 relative scale-95 opacity-0 transition-all duration-300 shadow-2xl">

                <!-- CLOSE -->
                <button onclick="closeProductModal()"
                        class="absolute top-8 right-8 z-50 text-[#777] hover:text-black text-2xl transition">
                    ✕
                </button>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-14 items-start">

                    <!-- LEFT -->
                    <div class="lg:col-span-6">

                        <!-- MAIN IMAGE -->
                        <div class="relative overflow-hidden rounded-[32px] bg-white border border-[#eee]">

                            <img id="modalImage"
                                class="m-auto w-auto h-[500px] transition-all duration-500"
                                src="{{ asset('images/product-default.png') }}"
                                alt="Producto">

                            <div class="mt-5 flex justify-center">
                                <button
                                    onclick="shareCurrentImage()"
                                    class="px-6 py-3 rounded-full bg-[#111]
                                    text-white hover:bg-[#c8a96b]
                                    transition flex items-center gap-3">

                                    <i class="fa-solid fa-share-nodes"></i>
                                    Compartir
                                </button>
                            </div>

                            <div class="absolute top-6 left-6 px-5 py-2 rounded-full bg-white/80 backdrop-blur-xl text-[10px] tracking-[0.3em] uppercase">
                                Imagen referencial
                            </div>

                        </div>

                        <!-- THUMBNAILS -->
                        <div id="modalThumbnails"
                            class="grid grid-cols-4 gap-4 mt-5">
                        </div>

                    </div>

                    <!-- RIGHT -->
                    <div class="lg:col-span-6 lg:sticky top-10">

                        <p class="uppercase tracking-[0.4em] text-[#c8a96b] text-xs mb-5">
                            Xuping
                        </p>

                        <h1 id="modalName"
                            class="text-3xl lg:text-4xl font-serif font-light leading-tight mb-6">
                        </h1>
                        <p id="modalCodigo" class="uppercase tracking-[0.2em] text-[14px] text-[#c8a96b] mb-2">
                            
                        </p>

                        <p id="modalPrice"
                        class="text-3xl font-light mb-8">
                        </p>

                        <p id="modalDescription"
                        class="text-[#666] leading-8 text-lg mb-5">
                        </p>

                        <!-- STOCK -->
                        <div class="flex items-center gap-3 mb-5">

                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>

                            <span id="stock"
                                class="text-sm text-[#555]">
                            </span>

                        </div>

                        <!-- PRECIO MAYORISTA -->
                        <div class="flex items-center gap-3 mb-5">

                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>

                            <span id="price_mayorista"
                                class="text-sm text-[#555]">
                            </span>

                        </div>

                        <!-- QUANTITY -->
                        <div class="flex items-center justify-between p-2 bg-white rounded-full border border-[#eee] w-40 mb-10">

                            <button onclick="decreaseQty()"
                                    class="w-10 h-10 flex items-center justify-center hover:text-[#c8a96b] transition">
                                −
                            </button>

                            <span id="quantity"
                                class="text-sm font-medium">
                                1
                            </span>

                            <button onclick="increaseQty()"
                                    class="w-10 h-10 flex items-center justify-center hover:text-[#c8a96b] transition">
                                +
                            </button>

                        </div>

                        <!-- BUTTON -->
                        <button onclick="addToCart()"
                                class="w-full py-5 rounded-full bg-[#1a1a1a] text-white uppercase tracking-[0.25em] text-xs transition-all duration-500 hover:bg-[#c8a96b] hover:shadow-[0_10px_40px_rgba(200,169,107,0.35)]">

                            Agregar al Carrito

                        </button>                        

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- MOBILE FILTERS -->
    <div id="mobileFilters"
        class="fixed inset-0 z-[9998] hidden">

        <!-- overlay -->
        <div onclick="closeFilters()"
            class="absolute inset-0 bg-black/50 backdrop-blur-sm opacity-0 transition-all duration-300"
            id="filtersOverlay">
        </div>

        <!-- panel -->
        <div id="filtersPanel"
            class="absolute left-0 top-0 h-full w-[85%] max-w-sm bg-[#fdfbf8] shadow-2xl p-8 transform -translate-x-full transition-all duration-500 overflow-y-auto">

            <!-- header -->
            <div class="flex items-center justify-between mb-10">

                <div>

                    <p class="uppercase tracking-[0.3em] text-[#c8a96b] text-[10px] mb-2">
                        Luxury Jewelry
                    </p>

                    <h3 class="text-2xl font-serif">
                        Categorías
                    </h3>

                </div>

                <button onclick="closeFilters()"
                    class="text-2xl text-[#777] hover:text-black">
                    ✕
                </button>

            </div>

            <!-- categories -->
            <ul class="space-y-5">

                @foreach($categories as $category)

                <li>

                    <a href="{{ route('tienda', ['category' => $category->id]) }}"
                    class="flex items-center justify-between py-4 border-b border-[#eee] text-[#444] hover:text-[#c8a96b] transition-all">

                        <span class="text-sm tracking-wide">
                            {{ $category->name }}
                        </span>

                        <span>
                            →
                        </span>

                    </a>

                </li>

                @endforeach

            </ul>

        </div>

    </div>

</div>


<script>
    const fallbackImage = @json(asset('images/product-default.png'));
</script>

<script>

    let currentQty = 1;
    let maxStock = 1;
    let currentProductId = null;

    let currentImage = '';
    let currentProductName = '';

    async function openProductModal(id) {

        const modal = document.getElementById('productModal');
        const content = document.getElementById('modalContent');

        modal.classList.remove('hidden');

        try {

            const res = await fetch(`/product/${id}`);
            const product = await res.json();

            currentProductId = product.id;

            currentQty = 1;
            maxStock = product.stock;

            document.getElementById('quantity').innerText = currentQty;

            // DATA
            currentProductName = product.name;

            document.getElementById('modalName').innerText = product.name;
            document.getElementById('modalPrice').innerText = 'S/. ' + parseFloat(product.price).toFixed(2);
            document.getElementById('modalDescription').innerText = product.description ?? 'Sin descripción disponible.';
            document.getElementById('stock').innerText = `Stock disponible (${product.stock} unidades)`;
            document.getElementById('price_mayorista').innerText = 'Compras mayores o igual a 3 unidades  (S/. ' + parseFloat(product.price_mayorista).toFixed(2) + ')';
            document.getElementById('modalCodigo').innerText = product.id_sistema + ' - ' + product.codigo_producto;

            // IMAGES
            let images = [];

            try {

                if (product.images) {

                    images = JSON.parse(product.images);

                }

            } catch (e) {

                console.error('Error parseando imágenes');

            }

            // const fallbackImage = "{{ asset('storage/' . $business->image) }}";

            // MAIN IMAGE
            if (images.length > 0) {

                currentImage = images[0]['url_imagen'];

                document.getElementById('modalImage').src = currentImage;

            } else {

                currentImage = fallbackImage;

                document.getElementById('modalImage').src = fallbackImage;

            }

            // THUMBNAILS
            const thumbnails = document.getElementById('modalThumbnails');

            thumbnails.innerHTML = '';

            if (images.length > 1) {

                images.forEach((img) => {

                    const imageUrl = img['url_imagen'] ?? fallbackImage;

                    thumbnails.innerHTML += `
                    
                        <button
                            onclick="changeMainImage('${imageUrl}')"
                            class="overflow-hidden rounded-2xl border border-[#eee] hover:border-[#c8a96b] transition group bg-white">

                            <img
                                src="${imageUrl}"
                                class="w-full h-32 object-cover group-hover:scale-105 transition duration-500">

                        </button>

                    `;

                });

            }

        } catch (error) {

            console.error('Error cargando producto:', error);

        }

        setTimeout(() => {

            content.classList.remove('scale-95', 'opacity-0');
            content.classList.add('scale-100', 'opacity-100');

        }, 10);

        document.body.classList.add('overflow-hidden');

    }

    function closeProductModal() {

        const modal = document.getElementById('productModal');
        const content = document.getElementById('modalContent');

        content.classList.add('scale-95', 'opacity-0');

        setTimeout(() => {

            modal.classList.add('hidden');

        }, 200);

        document.body.classList.remove('overflow-hidden');

    }

    function changeMainImage(src) {

        currentImage = src;

        document.getElementById('modalImage').src = src;

    }

    function increaseQty() {

        if (currentQty < maxStock) {

            currentQty++;

            document.getElementById('quantity').innerText = currentQty;

        }

    }

    function decreaseQty() {

        if (currentQty > 1) {

            currentQty--;

            document.getElementById('quantity').innerText = currentQty;

        }

    }

    async function addToCart() {

        if (currentQty > maxStock) {

            alert('Cantidad supera el stock disponible');
            return;

        }

        const res = await fetch('/cart/add', {

            method: 'POST',

            headers: {

                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content

            },

            body: JSON.stringify({

                product_id: currentProductId,
                quantity: currentQty

            })

        });

        const data = await res.json();

        if (data.success) {

            document.getElementById('cartCount').innerText = data.count;

            alert('Producto agregado correctamente');

        }

    }

    async function quickAddToCart(productId) {

        try {

            const res = await fetch('/cart/add', {

                method: 'POST',

                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },

                body: JSON.stringify({
                    product_id: productId,
                    quantity: 1
                })

            });

            const data = await res.json();

            if(data.success){

                // actualizar contador
                if(document.getElementById('cartCount')){

                    document.getElementById('cartCount').innerText = data.count;

                }

                // abrir drawer automáticamente
                openCart();

            }

        } catch(error){

            console.error(error);

        }

    }

    async function shareCurrentImage() {

        try {

            // const response = await fetch(currentImage);
            const proxyUrl =
                '/proxy-image?url=' + encodeURIComponent(currentImage);

            const response = await fetch(proxyUrl);

            const blob = await response.blob();

            const file = new File(
                [blob],
                "producto.jpg",
                { type: blob.type }
            );

            if (navigator.canShare && navigator.canShare({ files: [file] })) {

                await navigator.share({

                    title: currentProductName,

                    text: currentProductName,

                    files: [file]

                });

            } else {

                window.open(
                    'https://wa.me/?text=' +
                    encodeURIComponent(currentProductName + '\n' + currentImage),
                    '_blank'
                );

            }

        } catch (e) {

            console.error(e);

        }

    }

</script>

<script>

    function openFilters() {

        const filters = document.getElementById('mobileFilters');
        const panel = document.getElementById('filtersPanel');
        const overlay = document.getElementById('filtersOverlay');

        filters.classList.remove('hidden');

        setTimeout(() => {

            panel.classList.remove('-translate-x-full');

            overlay.classList.remove('opacity-0');

        }, 10);

        document.body.classList.add('overflow-hidden');

    }

    function closeFilters() {

        const filters = document.getElementById('mobileFilters');
        const panel = document.getElementById('filtersPanel');
        const overlay = document.getElementById('filtersOverlay');

        panel.classList.add('-translate-x-full');

        overlay.classList.add('opacity-0');

        setTimeout(() => {

            filters.classList.add('hidden');

        }, 400);

        document.body.classList.remove('overflow-hidden');

    }

</script>

@endsection