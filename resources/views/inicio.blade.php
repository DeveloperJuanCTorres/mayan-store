@extends('layouts.app')

@php
    $hideHeader = true;
@endphp

@section('content')

<div class="relative min-h-screen overflow-hidden bg-[#0b0b0b] text-white">

    <!-- BACKGROUND -->
    <div class="absolute inset-0">
        <img src="{{ asset('storage/' . $business->image) }}"
             class="w-full h-full object-cover scale-105 opacity-20"
             alt="">
        <div class="absolute inset-0 bg-black/80"></div>

        <!-- GOLD EFFECT -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[700px] h-[700px] bg-[#d4af37]/20 blur-3xl rounded-full"></div>
        <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-[#d4af37]/10 blur-3xl rounded-full"></div>
    </div>

    <!-- CONTENT -->
    <div class="relative z-10 min-h-screen flex items-center justify-center px-6 py-16">

        <div class="w-full max-w-xl">

            <!-- BRAND -->
            <div class="text-center mb-14">

                <!-- LOGO / IMAGE -->
                <div class="relative mx-auto mb-8 overflow-hidden ">
                    <img src="{{ asset('storage/' . $business->image) }}"
                         class="w-full h-full object-cover"
                         alt="">
                </div>

                <h3 class="text-2xl md:text-3xl font-black tracking-tight mb-5 leading-none">
                    JOYERÍA
                    <span class="text-[#d4af37]">
                        XUPING
                    </span>
                </h3>

                <p class="text-white/60 text-sm md:text-base max-w-md mx-auto leading-relaxed">
                    Descubre piezas elegantes, exclusivas y modernas.
                    Diseñado para mujeres que quieren destacar con estilo.
                </p>

            </div>

            <!-- MAIN CTA -->
            <a href="{{ route('home') }}"
               class="group relative flex items-center justify-between overflow-hidden rounded-3xl border border-[#d4af37]/30 bg-gradient-to-r from-[#d4af37] to-[#8a6a16] px-8 py-7 shadow-2xl transition-all duration-500 hover:scale-[1.03] hover:shadow-[0_20px_60px_rgba(212,175,55,0.35)]">

                <div class="flex items-center gap-5">

                    <div class="w-14 h-14 rounded-2xl bg-white/15 flex items-center justify-center backdrop-blur-md">
                        <span class="material-symbols-outlined text-white text-3xl">
                            storefront
                        </span>
                    </div>

                    <div>
                        <p class="text-xs uppercase tracking-[0.3em] text-white/70 mb-1">
                            Explorar
                        </p>

                        <h2 class="text-xl font-bold">
                            Tienda Virtual
                        </h2>
                    </div>

                </div>

                <div class="w-14 h-14 rounded-full bg-white/10 flex items-center justify-center transition-all duration-500 group-hover:translate-x-2">
                    <span class="material-symbols-outlined text-white text-3xl">
                        arrow_forward
                    </span>
                </div>

                <!-- shine -->
                <div class="absolute inset-0 -translate-x-full bg-gradient-to-r from-transparent via-white/10 to-transparent group-hover:translate-x-full transition-all duration-1000"></div>

            </a>

            <!-- SOCIAL / LINKS -->
            <div class="mt-8 space-y-5">

                @foreach($links as $link)

                <a href="{{ $link->link }}"
                   target="_blank"
                   class="group relative flex items-center justify-between rounded-3xl border border-white/10 bg-white/5 backdrop-blur-xl px-6 py-5 transition-all duration-500 hover:border-[#d4af37]/40 hover:bg-white/[0.08] hover:scale-[1.02]">

                    <div class="flex items-center gap-5">

                        <div class="w-14 h-14 rounded-2xl bg-black/30 border border-white/10 flex items-center justify-center overflow-hidden">
                            <img src="{{ asset('storage/' . $link->icono) }}"
                                 class="w-7 h-7 object-contain"
                                 alt="">
                        </div>

                        <div>

                            <p class="text-xs uppercase tracking-[0.25em] text-[#d4af37] mb-1">
                                {{ $link->name }}
                            </p>

                            <h3 class="text-lg font-semibold text-white">
                                {{ $link->description }}
                            </h3>

                        </div>

                    </div>

                    <div class="transition-all duration-500 opacity-40 group-hover:opacity-100 group-hover:translate-x-1">
                        <span class="material-symbols-outlined text-3xl text-[#d4af37]">
                            north_east
                        </span>
                    </div>

                </a>

                @endforeach

            </div>

            <!-- FOOTER -->
            <div class="mt-14 text-center">

                <div class="inline-flex items-center gap-3 px-5 py-3 rounded-full border border-white/10 bg-white/5 backdrop-blur-xl">
                    <div class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></div>

                    <span class="text-sm tracking-[0.2em] uppercase text-white/60">
                        Atención disponible 24/7
                    </span>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection