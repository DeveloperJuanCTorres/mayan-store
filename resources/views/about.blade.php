@extends('layouts.app')

@section('content')

<div class="bg-[#f8f6f2] text-[#1a1a1a] overflow-hidden">

    <!-- HERO -->
    <section class="relative min-h-screen flex items-center">

        <!-- BG -->
        <div class="absolute inset-0">

            <img
                class="w-full h-full object-cover"
                src="https://images.unsplash.com/photo-1617038220319-276d3cfab638?q=80&w=2070&auto=format&fit=crop"
                alt="Joyería de lujo">

            <div class="absolute inset-0 bg-black/55"></div>

        </div>

        <!-- CONTENT -->
        <div class="relative z-10 max-w-screen-2xl mx-auto px-6 lg:px-10 w-full">

            <div class="max-w-4xl">

                <p class="uppercase tracking-[0.45em] text-[#d4b178] text-xs mb-8">
                    Nuestra Casa
                </p>

                <h1 class="text-6xl md:text-8xl font-serif leading-[0.9] text-white font-light mb-10">

                    Creando <br>

                    <span class="italic text-[#d4b178]">
                        Lujo Atemporal
                    </span>

                </h1>

                <p class="text-white/80 text-lg leading-relaxed max-w-2xl">
                    Diseñamos joyas exclusivas que combinan elegancia, sofisticación y arte artesanal,
                    creando piezas únicas que trascienden generaciones.
                </p>

            </div>

        </div>

    </section>

    <!-- HISTORIA -->
    <section class="py-32">

        <div class="max-w-screen-2xl mx-auto px-6 lg:px-10">

            <div class="grid lg:grid-cols-2 gap-24 items-center">

                <!-- IMAGE -->
                <div class="relative">

                    <div class="overflow-hidden rounded-[40px]">

                        <img
                            class="w-full h-[750px] object-cover"
                            src="https://images.unsplash.com/photo-1617038220319-276d3cfab638?q=80&w=2070&auto=format&fit=crop"
                            alt="Joyería exclusiva">

                    </div>

                    <div class="absolute -bottom-10 -right-10 w-64 h-64 rounded-full bg-[#c8a96b]/10 blur-3xl"></div>

                </div>

                <!-- TEXT -->
                <div>

                    <p class="uppercase tracking-[0.35em] text-[#c8a96b] text-xs mb-6">
                        Nuestra Historia
                    </p>

                    <h2 class="text-5xl lg:text-7xl font-serif font-light leading-tight mb-10">

                        Elegancia <br>

                        <span class="italic text-[#c8a96b]">
                            Que Trasciende
                        </span>

                    </h2>

                    <p class="text-[#666] text-lg leading-relaxed mb-8">
                        Nuestra marca nace de la pasión por la alta joyería y el deseo de crear piezas
                        que representen lujo, exclusividad y personalidad.
                    </p>

                    <p class="text-[#666] text-lg leading-relaxed mb-12">
                        Cada joya es elaborada cuidadosamente utilizando materiales premium y acabados
                        de excelencia inspirados en las grandes casas de lujo internacionales.
                    </p>

                    <div class="grid grid-cols-2 gap-8">

                        <div>

                            <h3 class="text-5xl font-serif text-[#c8a96b] mb-2">
                                10+
                            </h3>

                            <p class="uppercase tracking-[0.25em] text-xs text-[#777]">
                                Años de experiencia
                            </p>

                        </div>

                        <div>

                            <h3 class="text-5xl font-serif text-[#c8a96b] mb-2">
                                5K+
                            </h3>

                            <p class="uppercase tracking-[0.25em] text-xs text-[#777]">
                                Clientes satisfechos
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- VALORES -->
    <section class="py-32 bg-white">

        <div class="max-w-screen-2xl mx-auto px-6 lg:px-10">

            <!-- TOP -->
            <div class="max-w-4xl mb-24">

                <p class="uppercase tracking-[0.35em] text-[#c8a96b] text-xs mb-6">
                    Nuestra Filosofía
                </p>

                <h2 class="text-5xl lg:text-7xl font-serif font-light leading-tight mb-10">

                    Diseñado Para <br>

                    <span class="italic text-[#c8a96b]">
                        Personas Exclusivas
                    </span>

                </h2>

                <p class="text-[#666] text-lg leading-relaxed max-w-2xl">
                    Creamos joyas sofisticadas y modernas que reflejan lujo auténtico,
                    elegancia minimalista y diseño atemporal.
                </p>

            </div>

            <!-- GRID -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

                <!-- CARD -->
                <div class="bg-[#f8f6f2] rounded-[40px] p-10 transition-all duration-500 hover:-translate-y-2">

                    <div class="w-16 h-16 rounded-full bg-[#c8a96b]/10 flex items-center justify-center mb-8">

                        <span class="material-symbols-outlined text-[#c8a96b] text-3xl">
                            diamond
                        </span>

                    </div>

                    <h3 class="text-3xl font-serif mb-6">
                        Exclusividad
                    </h3>

                    <p class="text-[#666] leading-relaxed">
                        Diseños únicos creados para personas que buscan piezas sofisticadas y diferentes.
                    </p>

                </div>

                <!-- CARD -->
                <div class="bg-[#f8f6f2] rounded-[40px] p-10 transition-all duration-500 hover:-translate-y-2">

                    <div class="w-16 h-16 rounded-full bg-[#c8a96b]/10 flex items-center justify-center mb-8">

                        <span class="material-symbols-outlined text-[#c8a96b] text-3xl">
                            workspace_premium
                        </span>

                    </div>

                    <h3 class="text-3xl font-serif mb-6">
                        Calidad Premium
                    </h3>

                    <p class="text-[#666] leading-relaxed">
                        Utilizamos materiales cuidadosamente seleccionados y acabados de alta calidad.
                    </p>

                </div>

                <!-- CARD -->
                <div class="bg-[#f8f6f2] rounded-[40px] p-10 transition-all duration-500 hover:-translate-y-2">

                    <div class="w-16 h-16 rounded-full bg-[#c8a96b]/10 flex items-center justify-center mb-8">

                        <span class="material-symbols-outlined text-[#c8a96b] text-3xl">
                            auto_awesome
                        </span>

                    </div>

                    <h3 class="text-3xl font-serif mb-6">
                        Diseño Atemporal
                    </h3>

                    <p class="text-[#666] leading-relaxed">
                        Piezas elegantes diseñadas para mantenerse vigentes y sofisticadas con el tiempo.
                    </p>

                </div>

            </div>

        </div>

    </section>

    <!-- PROCESO -->
    <section class="py-32">

        <div class="max-w-screen-2xl mx-auto px-6 lg:px-10">

            <div class="grid lg:grid-cols-2 gap-24 items-center">

                <!-- TEXT -->
                <div>

                    <p class="uppercase tracking-[0.35em] text-[#c8a96b] text-xs mb-6">
                        Nuestro Proceso
                    </p>

                    <h2 class="text-5xl lg:text-7xl font-serif font-light leading-tight mb-10">

                        El Arte de la <br>

                        <span class="italic text-[#c8a96b]">
                            Perfección
                        </span>

                    </h2>

                    <div class="space-y-10">

                        <!-- ITEM -->
                        <div class="flex gap-6">

                            <div class="text-[#c8a96b] font-serif text-3xl">
                                01
                            </div>

                            <div>

                                <h3 class="text-2xl font-serif mb-3">
                                    Selección
                                </h3>

                                <p class="text-[#666] leading-relaxed">
                                    Elegimos materiales premium para garantizar máxima calidad y exclusividad.
                                </p>

                            </div>

                        </div>

                        <!-- ITEM -->
                        <div class="flex gap-6">

                            <div class="text-[#c8a96b] font-serif text-3xl">
                                02
                            </div>

                            <div>

                                <h3 class="text-2xl font-serif mb-3">
                                    Diseño
                                </h3>

                                <p class="text-[#666] leading-relaxed">
                                    Creamos piezas sofisticadas inspiradas en la elegancia contemporánea.
                                </p>

                            </div>

                        </div>

                        <!-- ITEM -->
                        <div class="flex gap-6">

                            <div class="text-[#c8a96b] font-serif text-3xl">
                                03
                            </div>

                            <div>

                                <h3 class="text-2xl font-serif mb-3">
                                    Acabado
                                </h3>

                                <p class="text-[#666] leading-relaxed">
                                    Cada joya recibe acabados artesanales de precisión para lograr perfección visual.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- IMAGE -->
                <div class="relative">

                    <div class="overflow-hidden rounded-[40px]">

                        <img
                            class="w-full h-[800px] object-cover"
                            src="https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?q=80&w=1974&auto=format&fit=crop"
                            alt="Proceso artesanal">

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- CTA -->
    <section class="py-32 bg-[#1a1a1a] text-white relative overflow-hidden">

        <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-[#c8a96b]/10 rounded-full blur-3xl"></div>

        <div class="max-w-5xl mx-auto px-6 lg:px-10 text-center relative z-10">

            <p class="uppercase tracking-[0.35em] text-[#c8a96b] text-xs mb-8">
                Experiencia Exclusiva
            </p>

            <h2 class="text-5xl lg:text-7xl font-serif font-light leading-tight mb-10">

                Descubre Tu <br>

                <span class="italic text-[#c8a96b]">
                    Próxima Joya
                </span>

            </h2>

            <p class="text-white/70 text-lg leading-relaxed max-w-2xl mx-auto mb-14">
                Explora nuestras colecciones exclusivas y encuentra una pieza diseñada para trascender generaciones.
            </p>

            <a href="{{ route('tienda') }}"
               class="inline-flex items-center gap-4 bg-white text-black px-12 py-5 rounded-full uppercase tracking-[0.25em] text-xs hover:bg-[#c8a96b] hover:text-white transition-all duration-500">

                Explorar Colección

            </a>

        </div>

    </section>

</div>

@endsection