@extends('layouts.app')

@section('content')

<div class="bg-[#f8f6f2] text-[#1a1a1a] overflow-hidden" style="padding-top: 130px;">

    <!-- HERO CAROUSEL -->
    <section class="relative overflow-hidden h-[250px] md:h-[320px] lg:h-[420px] xl:h-[600px]">

        <!-- SLIDES -->
        <div id="heroSlider" class="relative w-full h-full">

            <!-- SLIDE 1 -->
             @foreach($banners as $banner)

            <div class="hero-slide absolute inset-0 opacity-100 transition-all duration-1000 z-10 overflow-hidden">

                <!-- IMAGE -->
                <img
                    class="absolute inset-0 w-full h-full object-cover object-center"
                    src="{{ asset('storage/' . $banner->image) }}"
                    alt="Banner">

                <!-- OVERLAY -->
                <!-- <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/40 to-black/60"></div> -->

                <!-- CONTENT -->
                <div class="absolute inset-0 flex items-end pb-10 md:pb-14 lg:pb-20">

                    <div class="max-w-screen-2xl mx-auto px-6 lg:px-10 w-full">

                        <div class="max-w-3xl">

                            <p class="text-[#111111] text-lg md:text-3xl leading-[1.8] tracking-[0.01em] max-w-2xl mb-10 font-bold drop-shadow-[0_2px_4px_rgba(255,255,255,0.45)]"
                            style="font-family: 'Cormorant Garamond', serif;">
                                
                                {{$banner->descripcion}}
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

                </div>

            </div>

            @endforeach

        </div>

        <!-- BUTTONS -->
        <button onclick="prevSlide()"
            class="absolute left-6 lg:left-10 top-1/2 -translate-y-1/2 z-30 w-14 h-14 rounded-full bg-white/10 backdrop-blur-xl border border-white/20 text-white hover:bg-[#d4b178] transition-all duration-500 flex items-center justify-center">

            <span class="material-symbols-outlined">
                west
            </span>

        </button>

        <button onclick="nextSlide()"
            class="absolute right-6 lg:right-10 top-1/2 -translate-y-1/2 z-30 w-14 h-14 rounded-full bg-white/10 backdrop-blur-xl border border-white/20 text-white hover:bg-[#d4b178] transition-all duration-500 flex items-center justify-center">

            <span class="material-symbols-outlined">
                east
            </span>

        </button>

        <!-- INDICATORS -->
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 z-30 flex items-center gap-4">

            <button onclick="goToSlide(0)"
                class="indicator w-10 h-[2px] bg-white transition-all duration-500">
            </button>

            <button onclick="goToSlide(1)"
                class="indicator w-10 h-[2px] bg-white/40 transition-all duration-500">
            </button>

            <button onclick="goToSlide(2)"
                class="indicator w-10 h-[2px] bg-white/40 transition-all duration-500">
            </button>

        </div>

    </section>

    <!-- FEATURED -->
     @if($products_destacados->count() > 0)
    <section class="max-w-screen-2xl mx-auto px-6 lg:px-10 py-32">

        <!-- TOP -->
        <div class="flex flex-col lg:flex-row justify-between items-end gap-10 mb-24">

            <div>

                <p class="uppercase tracking-[0.35em] text-[#c8a96b] text-xs mb-5">
                    Productos destacados
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
                        Imagen referencial
                    </div>

                    <img
                        class="w-full h-[500px] object-cover transition duration-700 group-hover:scale-110 group-hover:rotate-1"
                        src="{{ $firstImage ?? asset('images/product-default.png') }}"
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
    @endif

    <!-- BRAND SECTION -->
    <section class="py-32 bg-white">

        <div class="max-w-screen-2xl mx-auto px-6 lg:px-10 grid lg:grid-cols-2 gap-20 items-center">

            <!-- IMAGE -->
            <div class="relative">

                <div class="overflow-hidden rounded-[40px]">

                    <img
                        class="w-full h-[750px] object-cover"
                        src="{{ asset('images/product-default.png') }}"
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
                    <!-- LEFT -->
                    <div class="lg:col-span-7">

                        <!-- MAIN IMAGE -->
                        <div class="relative overflow-hidden rounded-[32px] bg-white border border-[#eee]">

                            <img id="modalImage"
                                class="w-full h-[700px] object-cover transition-all duration-500"
                                src="{{ asset('images/product-default.png') }}"
                                alt="Producto">

                            <div class="absolute top-6 left-6 px-5 py-2 rounded-full bg-white/80 backdrop-blur-xl text-[10px] tracking-[0.3em] uppercase">
                                Imagen referencial
                            </div>

                        </div>

                        <!-- THUMBNAILS -->
                        <div id="modalThumbnails"
                            class="grid grid-cols-4 gap-4 mt-5">
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
    const fallbackImage = @json(asset('images/product-default.png'));
</script>

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

            // DATA
            document.getElementById('modalName').innerText = product.name;

            document.getElementById('modalPrice').innerText =
                'S/. ' + parseFloat(product.price).toFixed(2);

            document.getElementById('modalDescription').innerText =
                product.description ?? 'Sin descripción disponible.';

            document.getElementById('stock').innerText =
                `Stock disponible (${product.stock} unidades)`;


            // IMAGES
            let images = [];

            try {

                if (product.images) {

                    images = JSON.parse(product.images);

                }

            } catch (e) {

                console.error('Error parseando imágenes');

            }

            // MAIN IMAGE
            if (
                images &&
                images.length > 0 &&
                images[0]['url_imagen']
            ) {

                document.getElementById('modalImage').src =
                    images[0]['url_imagen'];

            } else {

                document.getElementById('modalImage').src =
                    fallbackImage;

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

    function changeMainImage(src) {

        document.getElementById('modalImage').src = src;

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

<script>

    const slides = document.querySelectorAll('.hero-slide');
    const indicators = document.querySelectorAll('.indicator');

    let currentSlide = 0;

    function showSlide(index) {

        slides.forEach((slide, i) => {

            slide.classList.remove('opacity-100', 'z-10');
            slide.classList.add('opacity-0');

            indicators[i].classList.remove('bg-white');
            indicators[i].classList.add('bg-white/40');

        });

        slides[index].classList.remove('opacity-0');
        slides[index].classList.add('opacity-100', 'z-10');

        indicators[index].classList.remove('bg-white/40');
        indicators[index].classList.add('bg-white');

    }

    function nextSlide() {

        currentSlide++;

        if(currentSlide >= slides.length){

            currentSlide = 0;

        }

        showSlide(currentSlide);

    }

    function prevSlide() {

        currentSlide--;

        if(currentSlide < 0){

            currentSlide = slides.length - 1;

        }

        showSlide(currentSlide);

    }

    function goToSlide(index) {

        currentSlide = index;

        showSlide(currentSlide);

    }

    // AUTO PLAY
    setInterval(() => {

        nextSlide();

    }, 6000);

</script>

@endsection