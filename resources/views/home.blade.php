@extends('layouts.app')

@section('content')

<!-- Main Rotating Banner / Hero Section -->
<section class="relative w-full overflow-hidden flex items-center bg-stone-100">
    <div class="absolute inset-0 z-0">
        <img class="w-full h-full object-cover brightness-[0.85]"
            data-alt="high-end luxury jewelry editorial photography featuring a gold necklace on a stone pedestal with dramatic sunlight and deep shadows"
            src="https://lh3.googleusercontent.com/aida-public/AB6AXuAKBCHO2sJ4dpOmSSx_Hu_qSR10GTELqh7uJ4yy8g5uYTvK0zizK2FDaq_lH-XrQuEQqU7j299tYanYrVlSfMk8ACWSV68qVSHO0Ig6Xybc0Mikyla5_eTKWYsrMmH51oTaPAX_iBTNcPqNKgwwYtOQUz3m62wTfqWDHC_JcX_1_aDbCW0-x6Q36atQg3WD7vC2ozl2K5q4Qk0xBmgqv6zqEaYklDx0ypzK9pqW_N7DM2Wh7DVOpxbvOUJeW7PFjYcY1yD16ljpYHqX" />
    </div>
    <div class="relative z-10 max-w-screen-2xl mx-auto px-8 w-full">
        <div class="max-w-2xl bg-surface/10 backdrop-blur-md p-12 border-l-4 border-primary">
            <h1 class="text-6xl md:text-8xl font-serif text-on-surface leading-none mb-6 text-white">The Eternal
                <br /><span class="italic text-primary-container">Collection</span>
            </h1>
            <p class="text-lg font-body text-on-surface/80 max-w-md mb-10 leading-relaxed text-white">Artisanally crafted
                pieces inspired by ancient Mayan geometry, reimagined for the modern aesthetic.</p>
            <button
                class="primary-gradient text-on-primary px-10 py-4 text-xs font-bold uppercase tracking-[0.2em] rounded shadow-lg hover:opacity-90 transition-all flex items-center gap-4 group">
                Explore Collection
                <span
                    class="material-symbols-outlined text-sm group-hover:translate-x-2 transition-transform">arrow_forward</span>
            </button>
        </div>
    </div>
    <!-- Decorative Asymmetry -->
    <div class="absolute bottom-12 right-12 hidden lg:block">
        <div
            class="bg-surface-container-lowest/80 backdrop-blur-xl p-6 rounded-xl shadow-2xl flex items-center gap-6">
            <div class="w-16 h-16 rounded-full overflow-hidden border border-primary/20">
                <img class="object-cover w-full h-full"
                    data-alt="close-up of a handcrafted gold ring with intricate tribal engravings"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDaQOjyC3DVILZ3nuB58CUziyMUpnMp1uHciadWJBIS8qyzSJGmmrlnvbDypxdgL9kvxbd_3H0KFpGc2mae3q9_zy_gOIDEohpZWO2SR0xKXqjK7s6tWesla5NaCMmhAc0kpzkZOPCpWYhWUbtv-tQ3VFCXoKfDNu9PX_aYLyzpn8D2Lbo0TMnbuXssdvN_w_OyhfZE0MVCcoTp_Rbb2b7WYc9MxkPQHP4tsgpYB1qefwPFwL2b4q1cAclIBhygNXYDp_9ZGPxmDKbr" />
            </div>
            <div>
                <p class="text-[10px] uppercase tracking-widest text-secondary font-bold">New Arrival</p>
                <p class="font-serif text-lg">Solaris Signet Ring</p>
            </div>
        </div>
    </div>
</section>
<!-- Featured Products Section -->
<section class="max-w-screen-2xl mx-auto px-8">
    <div class="flex flex-col md:flex-row justify-between items-end mb-20 gap-8">
        <div>
            <h2 class="text-4xl md:text-5xl font-serif text-on-surface mb-4">Colección del momento</h2>
            <p class="text-secondary max-w-xs uppercase tracking-widest text-[11px] font-bold">Acabado a mano en nuestro taller con oro ético.</p>
        </div>
        <div class="flex gap-4">
            <button
                class="p-3 bg-surface-container-low rounded-full hover:bg-surface-container-high transition-colors">
                <span class="material-symbols-outlined">chevron_left</span>
            </button>
            <button
                class="p-3 bg-surface-container-low rounded-full hover:bg-surface-container-high transition-colors">
                <span class="material-symbols-outlined">chevron_right</span>
            </button>
        </div>
    </div>
    <!-- 2x3 Grid (3 columns x 2 rows for desktop) -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-y-20 gap-x-10">
        @foreach($products_destacados as $producto)
        <div class="group relative space-y-5 opacity-0 translate-y-10 animate-fadeIn">
            <!-- Imagen -->
            <div class="aspect-[4/5] bg-stone-100 overflow-hidden rounded-xl relative">
                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBT1KYNrbz-tB3_otTy0_u7mikhCvihPGKdz7flAyHuQNCNvfo1LjbTxq4sDE-7aTdqUOeBAOVYBOfcC1KAnMORP6NE2nuAEoDit80FNfJyk7ldSS-23oteYjBHkpWvDjwBXpr6GU1pjCNKWJxsDYNIFgFeIBbxLPOmTYjkrU50B4ajnQfuFiS3xFPLvyxTrL87OcfWe8bRUpDGyglWAIXP1it3PHqFPtu9aynSaHeJZhwSmoq_qvTzlgER-vAbRrY5ApMqDxoUx3OS"
                    class="w-full h-full object-cover group-hover:scale-110 transition duration-700 ease-out">

                <!-- Badge -->
                <!-- if($producto->destacado) -->
                <div class="absolute top-4 left-4 bg-black text-white px-3 py-1 text-[10px] uppercase tracking-widest rounded">
                    Destacado
                </div>
                <!-- endif -->

                <!-- Botón carrito (hover) -->
                <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                    <button onclick="addToCart('1')"
                        class="bg-white text-black px-6 py-3 text-xs uppercase tracking-widest font-bold rounded-full shadow-lg hover:scale-105 transition">
                        Ver detalle
                    </button>
                </div>
            </div>

            <!-- Info -->
            <div class="flex justify-between items-start">
                <div>
                    <h3 class="font-serif text-xl group-hover:text-yellow-700 transition">
                        {{$producto->name}}
                    </h3>
                    <p class="text-gray-500 text-sm mt-1">
                        {{$producto->brand->name}}
                    </p>
                </div>

                <p class="font-bold text-yellow-700 text-xl whitespace-nowrap">
                    S/. {{ number_format($producto->price, 2) }}
                </p>
            </div>

        </div>   
        @endforeach     
    </div>
    <div class="mt-24 text-center">
        <a class="inline-block border-b-2 border-primary-container pb-1 font-bold uppercase text-[10px] tracking-widest hover:text-primary transition-colors"
            href="{{ route('tienda') }}">Ver toda la coleccion</a>
    </div>
</section>
<!-- Signature Brand Section -->
<section class="bg-surface-container-low py-32 px-8 overflow-hidden">
    <div class="max-w-screen-2xl mx-auto flex flex-col md:flex-row items-center gap-20">
        <div class="w-full md:w-1/2 relative">
            <div class="aspect-[3/4] relative z-10">
                <img class="w-full h-full object-cover rounded-sm shadow-2xl"
                    data-alt="artisan hands carefully polishing a gold jewelry piece in a sunlit workshop"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuD6_uABuTPCDIdmcmbfHRy-ErMtKya8fSls4RcMNjaXSF-GYHauzeSGmTnw0qYa0EnfIO7EJSpkKquiH3zjeMRcgsQTTkC7AJ_AoQfxGMUcYphWPk0j4caVkUmQd0tW5u7SvsnqSlu7tpfsz_JjxV3FJMIR5cPdS_5N6XIDbf3GjKz6sDpTD8iGlgjys2sLE0KVgBepKlZKYIW9pOiOWauK8peXWaZHfGkxdQivV4hJzj_1QcH0tkRhg4wKZNtcSVJw-wQJeqx1MCKx" />
            </div>
            <div class="absolute -bottom-10 -right-10 w-64 h-80 bg-primary-container/20 -z-0"></div>
        </div>
        <div class="w-full md:w-1/2 space-y-8">
            <span class="text-primary font-bold uppercase tracking-[0.3em] text-xs">The Digital Atelier</span>
            <h2 class="text-5xl md:text-6xl font-serif leading-tight">Preserving History, <br /><span
                    class="italic">Creating Legacy</span></h2>
            <p class="text-on-surface-variant leading-relaxed text-lg font-light italic">"Every piece tells a
                story of the stars, the earth, and the hands that shaped it. We don't just make jewelry; we
                curate artifacts for the modern soul."</p>
            <div class="pt-6">
                <button
                    class="bg-on-surface text-surface px-12 py-5 rounded-full text-xs font-bold uppercase tracking-widest hover:opacity-80 transition-all">Learn
                    Our Craft</button>
            </div>
        </div>
    </div>
</section>


<script>
    function addToCart(id) {
        fetch('/cart/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    producto_id: id
                })
            })
            .then(res => res.json())
            .then(data => {
                alert('Producto agregado al carrito 🛒');
            })
            .catch(err => console.error(err));
    }
</script>

@endsection