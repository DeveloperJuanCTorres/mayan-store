@extends('layouts.app')

@section('content')

<div class="bg-[#f8f6f2] text-[#1a1a1a] overflow-hidden">

    <!-- HERO -->
    <section class="relative min-h-screen flex items-center">

        <!-- BG -->
        <div class="absolute inset-0">

            <img
                class="w-full h-full object-cover"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAKBCHO2sJ4dpOmSSx_Hu_qSR10GTELqh7uJ4yy8g5uYTvK0zizK2FDaq_lH-XrQuEQqU7j299tYanYrVlSfMk8ACWSV68qVSHO0Ig6Xybc0Mikyla5_eTKWYsrMmH51oTaPAX_iBTNcPqNKgwwYtOQUz3m62wTfqWDHC_JcX_1_aDbCW0-x6Q36atQg3WD7vC2ozl2K5q4Qk0xBmgqv6zqEaYklDx0ypzK9pqW_N7DM2Wh7DVOpxbvOUJeW7PFjYcY1yD16ljpYHqX"
                alt="Hero">

            <div class="absolute inset-0 bg-black/45"></div>

        </div>

        <!-- CONTENT -->
        <div class="relative z-10 max-w-screen-2xl mx-auto px-6 lg:px-10 w-full">

            <div class="max-w-3xl">

                <p class="uppercase tracking-[0.45em] text-[#d4b178] text-xs mb-8">
                    Luxury Jewelry Collection
                </p>

                <h1 class="text-6xl md:text-8xl font-serif leading-[0.9] text-white font-light mb-10">
                    Eternal <br>
                    <span class="italic text-[#d4b178]">
                        Elegance
                    </span>
                </h1>

                <p class="text-white/80 text-lg leading-relaxed max-w-2xl mb-12">
                    Piezas exclusivas inspiradas en la precisión ancestral y diseñadas para quienes entienden
                    el verdadero significado del lujo.
                </p>

                <a href="{{ route('tienda') }}"
                   class="inline-flex items-center gap-4 bg-white text-black px-10 py-5 rounded-full uppercase tracking-[0.25em] text-xs font-semibold hover:bg-[#d4b178] hover:text-white transition-all duration-500">

                    Explorar Colección

                    <span class="material-symbols-outlined text-sm">
                        arrow_forward
                    </span>

                </a>

            </div>

        </div>

    </section>

    <!-- FEATURED -->
    <section class="max-w-screen-2xl mx-auto px-6 lg:px-10 py-32">

        <!-- TOP -->
        <div class="flex flex-col lg:flex-row justify-between items-end gap-10 mb-24">

            <div>

                <p class="uppercase tracking-[0.35em] text-[#c8a96b] text-xs mb-5">
                    Curated Selection
                </p>

                <h2 class="text-5xl lg:text-6xl font-serif font-light leading-tight">
                    Colección del <br>
                    <span class="italic text-[#c8a96b]">
                        momento
                    </span>
                </h2>

            </div>

            <p class="max-w-md text-[#666] leading-relaxed">
                Diseños exclusivos elaborados artesanalmente con acabados premium y detalles únicos.
            </p>

        </div>

        <!-- PRODUCTS -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-x-8 gap-y-24">

            @foreach($products_destacados as $producto)

            @php
                $images = json_decode($producto->images, true);
                $firstImage = $images[0]['url_imagen'] ?? null;
            @endphp

            <div class="group relative transition-all duration-500 hover:-translate-y-2">

                <!-- IMAGE -->
                <div class="relative overflow-hidden rounded-[30px] bg-white shadow-sm">

                    <!-- badge -->
                    <div class="absolute top-5 left-5 z-20 px-4 py-2 rounded-full bg-white/80 backdrop-blur-xl text-[10px] tracking-[0.3em] uppercase text-[#1a1a1a]">
                        Featured
                    </div>

                    <img
                        class="w-full h-[500px] object-cover transition duration-700 group-hover:scale-110 group-hover:rotate-1"
                        src="{{ $firstImage ?? asset('storage/' . $business->image) }}"
                        alt="{{ $producto->name }}"
                    >

                    <!-- overlay -->
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition duration-500"></div>

                    <!-- button -->
                    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition duration-500 flex items-center justify-center">

                        <button
                            onclick="openProductModal({{ $producto->id }})"
                            class="bg-white text-black px-8 py-4 rounded-full uppercase tracking-[0.25em] text-xs shadow-2xl hover:bg-[#c8a96b] hover:text-white transition-all duration-500">

                            Ver Detalles

                        </button>

                    </div>

                </div>

                <!-- INFO -->
                <div class="pt-6 space-y-4">

                    <div>

                        <p class="uppercase tracking-[0.3em] text-[#c8a96b] text-[10px] mb-2">
                            Exclusive Design
                        </p>

                        <h3 class="text-2xl font-serif leading-snug">
                            {{ $producto->name }}
                        </h3>

                        <p class="text-sm text-[#777] mt-2">
                            {{ $producto->brand->name ?? 'Luxury Brand' }}
                        </p>

                    </div>

                    <p class="text-2xl font-light tracking-wide text-[#1a1a1a]">
                        S/. {{ number_format($producto->price, 2) }}
                    </p>

                </div>

            </div>

            @endforeach

        </div>

        <!-- BUTTON -->
        <div class="mt-28 text-center">

            <a href="{{ route('tienda') }}"
               class="inline-flex items-center gap-4 border border-[#c8a96b] px-10 py-5 rounded-full uppercase tracking-[0.25em] text-xs hover:bg-[#c8a96b] hover:text-white transition-all duration-500">

                Ver Toda la Colección

            </a>

        </div>

    </section>

    <!-- BRAND SECTION -->
    <section class="py-32 bg-white">

        <div class="max-w-screen-2xl mx-auto px-6 lg:px-10 grid lg:grid-cols-2 gap-20 items-center">

            <!-- IMAGE -->
            <div class="relative">

                <div class="overflow-hidden rounded-[40px]">

                    <img
                        class="w-full h-[750px] object-cover"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuD6_uABuTPCDIdmcmbfHRy-ErMtKya8fSls4RcMNjaXSF-GYHauzeSGmTnw0qYa0EnfIO7EJSpkKquiH3zjeMRcgsQTTkC7AJ_AoQfxGMUcYphWPk0j4caVkUmQd0tW5u7SvsnqSlu7tpfsz_JjxV3FJMIR5cPdS_5N6XIDbf3GjKz6sDpTD8iGlgjys2sLE0KVgBepKlZKYIW9pOiOWauK8peXWaZHfGkxdQivV4hJzj_1QcH0tkRhg4wKZNtcSVJw-wQJeqx1MCKx"
                        alt="Luxury">

                </div>

                <div class="absolute -bottom-10 -right-10 w-64 h-64 rounded-full bg-[#c8a96b]/10 blur-3xl"></div>

            </div>

            <!-- TEXT -->
            <div>

                <p class="uppercase tracking-[0.35em] text-[#c8a96b] text-xs mb-6">
                    The Atelier
                </p>

                <h2 class="text-5xl lg:text-7xl font-serif font-light leading-tight mb-10">

                    Preserving <br>

                    <span class="italic text-[#c8a96b]">
                        Legacy
                    </span>

                </h2>

                <p class="text-[#666] text-lg leading-relaxed mb-10">
                    Cada joya representa un equilibrio entre arte, historia y sofisticación moderna.
                    Creamos piezas atemporales para quienes buscan exclusividad auténtica.
                </p>

                <button
                    class="px-10 py-5 bg-[#1a1a1a] text-white rounded-full uppercase tracking-[0.25em] text-xs hover:bg-[#c8a96b] transition-all duration-500">

                    Descubrir Más

                </button>

            </div>

        </div>

    </section>
    <!-- MODAL -->
    <div id="productModal"
        class="fixed inset-0 z-50 hidden bg-black/70 backdrop-blur-2xl overflow-y-auto">

        <div class="min-h-screen flex items-start justify-center p-6 lg:p-10">

            <div id="modalContent"
                class="w-full max-w-7xl bg-[#fdfbf8] rounded-[40px] p-8 lg:p-12 relative scale-95 opacity-0 transition-all duration-300">

                <!-- CLOSE -->
                <button onclick="closeProductModal()"
                        class="absolute top-8 right-8 text-[#777] hover:text-black text-xl transition">
                    ✕
                </button>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-14 items-start">

                    <!-- IMAGE -->
                    <div class="lg:col-span-7">

                        <div class="relative overflow-hidden rounded-[32px] bg-white">

                            <img id="modalImage"
                                class="w-full h-[700px] object-cover"
                                src=""
                                alt="">

                            <div class="absolute top-6 left-6 px-5 py-2 rounded-full bg-white/80 backdrop-blur-xl text-[10px] tracking-[0.3em] uppercase">
                                Luxury Edition
                            </div>

                        </div>

                    </div>

                    <!-- INFO -->
                    <div class="lg:col-span-5 lg:sticky top-24">

                        <p class="uppercase tracking-[0.4em] text-[#c8a96b] text-xs mb-5">
                            Exclusive Collection
                        </p>

                        <h1 id="modalName"
                            class="text-5xl lg:text-6xl font-serif font-light leading-tight mb-6">
                        </h1>

                        <p id="modalPrice"
                        class="text-3xl font-light mb-8">
                        </p>

                        <p id="modalDescription"
                        class="text-[#666] leading-8 text-lg mb-10">
                        </p>

                        <div class="flex items-center gap-3 mb-10">

                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>

                            <span id="stock" class="text-sm text-[#555]"></span>

                        </div>

                        <!-- QTY -->
                        <div class="flex items-center justify-between p-2 bg-white rounded-full border border-[#eee] w-40 mb-10">

                            <button onclick="decreaseQty()"
                                    class="w-10 h-10 flex items-center justify-center hover:text-[#c8a96b]">
                                −
                            </button>

                            <span id="quantity" class="text-sm font-medium">
                                1
                            </span>

                            <button onclick="increaseQty()"
                                    class="w-10 h-10 flex items-center justify-center hover:text-[#c8a96b]">
                                +
                            </button>

                        </div>

                        <!-- BTN -->
                        <button onclick="addToCart()"
                                class="w-full py-5 rounded-full bg-[#1a1a1a] text-white uppercase tracking-[0.25em] text-xs transition-all duration-500 hover:bg-[#c8a96b] hover:shadow-[0_10px_40px_rgba(200,169,107,0.35)]">

                            Agregar al Carrito

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>



<script>

    let currentQty = 1;
    let maxStock = 1;
    let currentProductId = null;

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

            document.getElementById('modalName').innerText = product.name;

            document.getElementById('modalPrice').innerText =
                'S/. ' + parseFloat(product.price).toFixed(2);

            document.getElementById('modalDescription').innerText =
                product.description ?? '';

            document.getElementById('stock').innerText =
                `Stock disponible (${product.stock} unidades)`;

            if(product.image){

                document.getElementById('modalImage').src =
                    '/storage/' + product.image;

            }

        } catch(error){

            console.error(error);

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

    function increaseQty() {

        if(currentQty < maxStock){

            currentQty++;

            document.getElementById('quantity').innerText = currentQty;

        }

    }

    function decreaseQty() {

        if(currentQty > 1){

            currentQty--;

            document.getElementById('quantity').innerText = currentQty;

        }

    }

    async function addToCart() {

        if(currentQty > maxStock){

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

        if(data.success){

            if(document.getElementById('cartCount')){

                document.getElementById('cartCount').innerText = data.count;

            }

            alert('Producto agregado correctamente');

        }

    }

</script>

@endsection