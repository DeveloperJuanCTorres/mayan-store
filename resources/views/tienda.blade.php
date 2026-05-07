@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#f8f6f2] text-[#1a1a1a]">

    <div class="max-w-screen-2xl mx-auto px-6 lg:px-10 py-16">

        <!-- HERO -->
        <header class="mb-24 max-w-4xl">
            <p class="uppercase tracking-[0.4em] text-[#c8a96b] text-xs mb-6">
                Luxury Jewelry
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
        </header>

        <div class="flex flex-col lg:flex-row gap-16">

            <!-- SIDEBAR -->
            <aside class="w-full lg:w-72 sticky top-28 h-fit">

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

            </aside>

            <!-- PRODUCTS -->
            <section class="flex-1">

                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-x-8 gap-y-24">

                    @foreach($products as $product)

                    @php
                        $images = json_decode($product->images, true);
                        $firstImage = $images[0]['url_imagen'] ?? null;
                    @endphp

                    <div class="group relative transition-all duration-500 hover:-translate-y-2">

                        <!-- IMAGE -->
                        <div class="relative overflow-hidden rounded-[28px] bg-white shadow-sm">

                            <!-- badge -->
                            <div class="absolute top-5 left-5 z-20 px-4 py-2 rounded-full bg-white/80 backdrop-blur-xl text-[10px] tracking-[0.3em] uppercase text-[#1a1a1a]">
                                Luxury
                            </div>

                            <img
                                class="w-full h-[430px] object-cover transition duration-700 group-hover:scale-110 group-hover:rotate-1"
                                src="{{ $firstImage ?? asset('storage/' . $business->image) }}"
                                alt="{{ $product->name }}"
                            >

                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition duration-500"></div>

                        </div>

                        <!-- INFO -->
                        <div class="pt-6 space-y-4">

                            <div>
                                <p class="uppercase tracking-[0.3em] text-[#c8a96b] text-[10px] mb-2">
                                    Exclusivo
                                </p>

                                <h3 class="text-2xl font-serif leading-snug">
                                    {{ $product->name }}
                                </h3>
                            </div>

                            <p class="text-2xl font-light tracking-wide text-[#1a1a1a]">
                                S/. {{ number_format($product->price, 2) }}
                            </p>

                            <button
                                onclick="openProductModal({{ $product->id }})"
                                class="w-full py-4 rounded-full border border-[#c8a96b] text-[#1a1a1a]
                                hover:bg-[#c8a96b] hover:text-white
                                transition-all duration-500 uppercase tracking-[0.25em] text-xs">

                                Ver Detalles

                            </button>

                        </div>

                    </div>

                    @endforeach

                </div>

                <!-- PAGINATION -->
                <div class="mt-24">
                    {{ $products->links() }}
                </div>

            </section>

        </div>

    </div>

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

                    <!-- IMAGES -->
                    <div class="lg:col-span-7">

                        <div class="relative overflow-hidden rounded-[32px] bg-white">

                            <img id="modalImage"
                                class="w-full h-[700px] object-cover"
                                src=""
                                alt="">

                            <div class="absolute top-6 left-6 px-5 py-2 rounded-full bg-white/80 backdrop-blur-xl text-[10px] tracking-[0.3em] uppercase">
                                Limited Edition
                            </div>

                        </div>

                    </div>

                    <!-- INFO -->
                    <div class="lg:col-span-5 lg:sticky top-24">

                        <p class="uppercase tracking-[0.4em] text-[#c8a96b] text-xs mb-5">
                            Luxury Collection
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

                        <!-- QUANTITY -->
                        <div class="flex items-center justify-between p-2 bg-white rounded-full border border-[#eee] w-40 mb-10">

                            <button onclick="decreaseQty()"
                                    class="w-10 h-10 flex items-center justify-center hover:text-[#c8a96b]">
                                −
                            </button>

                            <span id="quantity"
                                class="text-sm font-medium">
                                1
                            </span>

                            <button onclick="increaseQty()"
                                    class="w-10 h-10 flex items-center justify-center hover:text-[#c8a96b]">
                                +
                            </button>

                        </div>

                        <!-- BUTTON -->
                        <button onclick="addToCart()"
                                class="w-full py-5 rounded-full bg-[#1a1a1a] text-white uppercase tracking-[0.25em] text-xs transition-all duration-500 hover:bg-[#c8a96b] hover:shadow-[0_10px_40px_rgba(200,169,107,0.35)]">

                            Agregar al Carrito

                        </button>

                        <!-- FEATURES -->
                        <div class="grid grid-cols-2 gap-6 mt-14 pt-10 border-t border-[#eee]">

                            <div>
                                <p class="uppercase tracking-[0.2em] text-[10px] text-[#c8a96b] mb-2">
                                    Delivery
                                </p>

                                <p class="text-sm text-[#555]">
                                    Envío Express Premium
                                </p>
                            </div>

                            <div>
                                <p class="uppercase tracking-[0.2em] text-[10px] text-[#c8a96b] mb-2">
                                    Garantía
                                </p>

                                <p class="text-sm text-[#555]">
                                    Autenticidad Garantizada
                                </p>
                            </div>

                        </div>

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

        } catch (error) {
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

            document.getElementById('cartCount').innerText = data.count;

            alert('Producto agregado correctamente');

        }

    }

</script>

@endsection