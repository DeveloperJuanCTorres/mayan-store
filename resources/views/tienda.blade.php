@extends('layouts.app')

@section('content')
<div class="max-w-screen-2xl mx-auto px-8 py-12">
    <header class="mb-16">
        <h1 class="text-5xl md:text-7xl font-serif text-on-surface leading-tight mb-4">La mejor <br /><span
                class="italic font-light">Colección</span></h1>
        <p class="text-secondary font-body max-w-xl text-lg leading-relaxed">Legados artesanales inspirados en los patrones celestiales y la precisión arquitectónica de la herencia maya. Cada pieza es un diálogo único entre el oro y el alma.</p>
    </header>
    <div class="flex flex-col md:flex-row gap-12">
        <!-- Sidebar Filters -->
        <aside class="w-full md:w-64 space-y-12">
            <div>
                <h3 class="font-headline text-lg mb-6 border-b border-outline-variant/20 pb-2">Categorías</h3>
                <ul class="space-y-4 font-body text-sm text-secondary">
                    @foreach($categories as $category)
                    <li>
                        <a href="{{ route('tienda', ['category' => $category->id]) }}"
                        class="flex items-center justify-between hover:text-primary">
                            <span>{{ $category->name }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h3 class="font-headline text-lg mb-6 border-b border-outline-variant/20 pb-2">Price Range</h3>
                <div class="space-y-4">
                    <input
                        class="w-full accent-primary h-1 bg-surface-container-high rounded-lg appearance-none cursor-pointer"
                        type="range" />
                    <div
                        class="flex justify-between font-label text-xs uppercase tracking-widest text-on-surface-variant">
                        <span>$250</span>
                        <span>$5,000+</span>
                    </div>
                </div>
            </div>
        </aside>
        <!-- Product Grid -->
        <section class="flex-1">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-16">
                @foreach($products as $product)
                <div class="group">
                    <div class="relative overflow-hidden aspect-[3/4] mb-4 bg-surface-container-low rounded-xl">
                        <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                            data-alt="Close-up of a handcrafted gold pendant necklace with intricate Mayan-inspired geometric engravings on a minimalist grey background"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuBB6gbdaGDI4WRLIbTVUfYEstXmfiXmEZbR5TgRF5vuudYGnC6byK4kPV7NtLUnOw0yAe_o55xRFPqdvRUSZQg2GAYY4lOp7oyTtPYG7znqNxbnfx9_zFVEhXdkVA0UgCoXn60V26g_8XhDMWM2P-dDtGW3ZxdOXtHsiEuXUOa6n_LHwNOIaC3QhvBKBRM0M_7SZaEzx_zYNXnHLFdbLuZvyfh2Km00F_Y9lvCkehOVgBd18x__H4rBQCd6kZcZ67QcDY6-BWs_iVxv" />
                        <div class="absolute top-4 left-4 bg-surface-container-lowest/80 backdrop-blur-md px-3 py-1 rounded-full shadow-sm">
                            <span class="text-[10px] font-label uppercase tracking-widest text-primary font-bold">
                                Nuevo
                            </span>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <h4 class="font-headline text-lg text-on-surface">{{ $product->name }}</h4>
                        <div class="flex items-center gap-2 mb-2">
                            <div class="flex text-primary">
                                <span class="material-symbols-outlined text-sm"
                                    style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="material-symbols-outlined text-sm"
                                    style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="material-symbols-outlined text-sm"
                                    style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="material-symbols-outlined text-sm"
                                    style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="material-symbols-outlined text-sm">star_half</span>
                            </div>
                            <span class="text-[10px] text-secondary font-label uppercase">12 Reviews</span>
                        </div>
                        <p class="text-on-surface-variant font-label text-sm tracking-wide font-bold">S/. {{ number_format($product->price, 2) }}</p>
                        <button onclick="openProductModal({{ $product->id }})"
                            class="w-full mt-4 py-3 border border-outline-variant/20 text-[10px] text-white bg-black uppercase tracking-[0.2em] font-label hover:bg-on-primary hover:text-primary transition-all duration-300">
                            Ver Detalles
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Pagination -->
            <div class="mt-24 flex items-center justify-center gap-4">
                {{ $products->links() }}
            </div>
        </section>
    </div>

    <!-- MODAL -->
    <div id="productModal"
        class="fixed inset-0 z-50 hidden bg-black/80 backdrop-blur-md overflow-y-auto">

        <!-- WRAPPER (scroll aquí) -->
        <div class="min-h-screen flex items-start justify-center p-6">
            <!-- Contenedor -->
            <div id="modalContent"
                class="w-full max-w-7xl bg-surface-container rounded-3xl shadow-2xl p-6 relative transform scale-95 opacity-0 transition-all duration-300">

                <!-- Botón cerrar -->
                <button onclick="closeProductModal()"
                    class="absolute top-5 right-5 text-slate-400 hover:text-white text-xl">
                    X
                </button>

                <!-- CONTENIDO (TU DISEÑO) -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-start py-5">
                    <!-- Left Column: Image Carousel Style -->
                    <div class="lg:col-span-7 flex flex-col gap-6">
                        <div class="relative bg-surface-container overflow-hidden rounded-xl">
                            <img id="modalImage" alt="Eternal Solaris Ring" class="w-full object-cover" style="height: 550px;"
                                data-alt="Close-up of a high-end gold ring with a large center diamond, cinematic lighting, shallow depth of field, minimalist stone background"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAm304nmesn45uUx66uaFLz_l_Akn6hrytMabQmHrFY5v3MhISMV0WkSnKcMj4zkYteJiFEOe3qGRVda5eqLsN9vgr13kdT37-FeGSUkmcEDArQ7eqqiKvrUkOtfPpnki76DIC2jS-v2kQuK9xJcZC2blnX8_Ty-wE5YdeQeov7s6sK9unnu1Rl_tZCi6GzbtxFnMDkJEFRzZN3m_-x2G_qxjQ3CP3I-P70rz5UZU_3CrmAn-Njn7sR6BnEDwBcD5H__e1eKUICY5KE" />
                            <!-- Signature Component: The Curated Detail -->
                            <!-- <div
                                class="absolute bottom-8 left-8 glass-panel px-6 py-4 rounded-xl border border-outline-variant/20">
                                <p class="text-[10px] uppercase tracking-[0.2em] text-secondary mb-1">Craftsmanship</p>
                                <p class="font-serif text-sm italic text-on-surface">18K Certified Mayan Gold</p>
                            </div> -->
                        </div>
                        <div class="grid grid-cols-4 gap-4">
                            <div
                                class="aspect-square bg-surface-container-high rounded-lg overflow-hidden border-2 border-primary">
                                <img alt="Ring thumb 1" class="w-full h-full object-cover"
                                    data-alt="Macro detail of gold ring texture and diamond setting under soft studio lighting"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCGdmaqtnKjuC89R4u8oSdqMn2hsX9l1dAQjwLG6gwcn9ENlGBJSY2PEz45l-lqY6fr6OWUfHdC1WyiGkQ1JTu3pRtZ_637j1esCfP42xVEbUGZrPLoacs921y__2Xswo42fh5GEoMuYrXM4cDVp7BIiGJky71A-4o-t1jrJUY5FqB_IZmwlk-hdfyjesI0yg4IITg-FQIyoi_fvhLV9oI8Zizid34mgQqUmQ6d2gqj3ZYZSIUlPZy-3xxNheR9vJAi9iZl6BeQlWZj" />
                            </div>
                            <div
                                class="aspect-square bg-surface-container-high rounded-lg overflow-hidden opacity-60 hover:opacity-100 transition-opacity">
                                <img alt="Ring thumb 2" class="w-full h-full object-cover"
                                    data-alt="Side profile view of an elegant gold ring showing the height of the diamond setting"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBH5aDCfqxD-LjAnzhRxrKVj0ThPGLpBwK59xjzaak7LSfL7s5injOzMhO2jMQdyFirEYDUh-ikCdqU8ZkrAPSLHpkhdgasXISEfT6UBmQagOv_XYZ7UF-G9B4IMZardDGLowQeiiD_cKVxH_WqxTtr6Bwm60jXPalR05eROsuPXXdg-01K1Ti6ekQArJgEB3L220p0fABqoyRR6GHdFa0KUOEHiIcI3TV_AX3gGZYtoWFlTCI1pchxVxFgxjXSir-f8As4gCYzh_PM" />
                            </div>
                            <div
                                class="aspect-square bg-surface-container-high rounded-lg overflow-hidden opacity-60 hover:opacity-100 transition-opacity">
                                <img alt="Ring thumb 3" class="w-full h-full object-cover"
                                    data-alt="Jewelry worn on a model's hand holding a delicate silk fabric"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuC6PrbBTNkXD6FsS56S1MB5CD_OqPrm5lTbrKboxM7m134EN6vL-Abp0_hljFxdEmgUg3cHT-BDZWgWguF92fOZgsmPMI0BqYpPbFcJWPQyDpbdw1b2WM7U0uhJJEySOXSyEGLTMf7WCpfp4QNK2zdKYt7-9rgGqF6QVBa-sCOYbrpdnWs0_OJjfWF5WjgRc6zraS6qzazAq6Oq0QjO6LFNnw4kaOR77BkDhN5zASdoZNz2qL4nHlCy54_zZbSTuc42AN-DtubZ35ar" />
                            </div>
                            <div
                                class="aspect-square bg-surface-container-high rounded-lg overflow-hidden opacity-60 hover:opacity-100 transition-opacity">
                                <img alt="Ring thumb 4" class="w-full h-full object-cover"
                                    data-alt="The luxury packaging and velvet box for the gold ring"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCug-bpnHHJDNvYRN9dz1VxBBLuYIbSAyv9k3D2Xu0LbMp1KxdDaySozwG6WN2bxZ1fKpDl2C1zCl-X9fpXJZJ3A1rR1ZJ7kuF4bafScmjqLTXLjweFhyvQ6mEHf0W1ORQ1sbWIfK0CRrzVWw3sgZFTppC8zuNip8xHTeDRU-5hnUEt0SAlFZhLhDc1LsFxnEvxCyN6JBKQBRaN4LEwXdcO3MKHruCQm6eQrYnAApwqgiKVjPI4p4Oj8Ahpfex_joyyB2lmTl4rhS9w" />
                            </div>
                        </div>
                    </div>
                    <!-- Right Column: Product Info -->
                    <div class="lg:col-span-5 sticky top-28 space-y-10">
                        <section>
                            <p class="text-xs uppercase tracking-[0.3em] text-primary mb-3">Colección limitada</p>
                            <h1 id="modalName" class="text-5xl font-serif text-on-surface leading-tight mb-4">Eternal Solaris Ring</h1>
                            <div class="flex items-baseline space-x-4">
                                <span id="modalPrice" class="text-3xl font-body font-light text-on-surface">$4,250.00</span>
                                <!-- <span class="text-sm text-secondary line-through">$5,100.00</span> -->
                            </div>
                        </section>
                        <section class="space-y-4">
                            <p id="modalDescription" class="text-on-surface-variant leading-relaxed max-w-md">
                                A celestial masterpiece featuring a hand-selected 2-carat diamond set in recycled 18k gold. The
                                Eternal Solaris captures the warmth of the Yucatán sun, reflecting light with unparalleled
                                brilliance.
                            </p>
                            <div class="flex items-center space-x-2 text-xs font-medium">
                                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                <span id="stock" class="text-on-surface-variant">Stock -> ({{ $product->stock }} Unidades)</span>
                            </div>
                        </section>
                        <!-- Configuration -->
                        <div class="space-y-8">
                            <!-- Quantity & Actions -->
                            <div class="space-y-6">
                                <div class="flex items-center justify-between p-1 bg-surface-container-low rounded-lg w-32 border border-outline-variant/10">
                                    <button onclick="decreaseQty()" class="w-8 h-8 flex items-center justify-center hover:text-primary">
                                        <span class="material-symbols-outlined">remove</span>
                                    </button>

                                    <span id="quantity" class="text-sm font-medium">1</span>

                                    <button onclick="increaseQty()" class="w-8 h-8 flex items-center justify-center hover:text-primary">
                                        <span class="material-symbols-outlined">add</span>
                                    </button>
                                </div>
                                <div class="flex gap-4">
                                    <button onclick="addToCart()"
                                        class="flex-1 bg-gradient-to-r from-primary to-primary-container text-on-primary py-5 rounded-sm label-md uppercase tracking-widest font-bold shadow-lg shadow-primary/20 hover:opacity-90 transition-all flex items-center justify-center gap-2">
                                        <span class="material-symbols-outlined text-xl"
                                            data-icon="shopping_bag">shopping_bag</span>
                                        Agregar al Carrito
                                    </button>
                                    <!-- <button
                                        class="w-16 h-16 flex items-center justify-center border border-outline-variant/30 rounded-sm hover:bg-surface-container-low transition-colors group">
                                        <span
                                            class="material-symbols-outlined text-secondary group-hover:text-error transition-colors"
                                            data-icon="favorite">favorite</span>
                                    </button> -->
                                </div>
                            </div>
                        </div>
                        <!-- Product Features Mini Grid -->
                        <div class="pt-8 grid grid-cols-2 gap-6 border-t border-outline-variant/10">
                            <div class="flex items-center space-x-3">
                                <span class="material-symbols-outlined text-primary-container"
                                    data-icon="local_shipping">local_shipping</span>
                                <span class="text-xs text-on-surface-variant">Global Express Delivery</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="material-symbols-outlined text-primary-container"
                                    data-icon="verified">verified</span>
                                <span class="text-xs text-on-surface-variant">Lifetime Authenticity</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<script>
    async function openProductModal(id) {
        const modal = document.getElementById('productModal');
        const content = document.getElementById('modalContent');

        modal.classList.remove('hidden');

        try {
            const res = await fetch(`/product/${id}`);
            const product = await res.json();

            currentProductId = product.id;

            // reset cantidad
            currentQty = 1;
            maxStock = product.stock;
            document.getElementById('quantity').innerText = currentQty;

            // data
            document.getElementById('modalName').innerText = product.name;
            document.getElementById('modalPrice').innerText = 'S/. ' + parseFloat(product.price).toFixed(2);
            document.getElementById('modalDescription').innerText = product.description ?? '';
            document.getElementById('stock').innerText = `Stock -> (${product.stock} Unidades)`;

            if(product.image){
                document.getElementById('modalImage').src = '/storage/' + product.image;
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

    
</script>

<script>
    let currentQty = 1;
    let maxStock = 1;
    let currentProductId = null;

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
</script>
@endsection