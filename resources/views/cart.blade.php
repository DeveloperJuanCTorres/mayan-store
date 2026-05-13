@extends('layouts.app')

@section('content')
<div class="max-w-screen-2xl mx-auto px-8 py-12">

    <header class="mb-16">
        <h1 class="text-4xl md:text-6xl font-headline font-light tracking-tight text-on-surface mb-4">
            Tu Selección
        </h1>

        <p class="text-secondary font-body uppercase tracking-[0.2em] text-xs">
            Curaduría de piezas exclusivas
        </p>
    </header>

    @if(Cart::count() > 0)

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-start">

        <!-- Cart Items List -->
        <section class="lg:col-span-8 space-y-12">

            @foreach($items as $item)

                @php
                    $image = '/images/product-default.png';

                    $images = $item->options->image;

                    // si viene JSON string
                    if (is_string($images)) {

                        $decoded = json_decode($images, true);

                        if (
                            json_last_error() === JSON_ERROR_NONE &&
                            isset($decoded[0]['url_imagen'])
                        ) {
                            $image = $decoded[0]['url_imagen'];
                        }

                    }

                    // si viene array
                    elseif (is_array($images)) {

                        if (isset($images[0]['url_imagen'])) {
                            $image = $images[0]['url_imagen'];
                        }

                    }

                @endphp

            <div class="group border-b border-outline-variant/10 py-6">

                <div class="flex items-center gap-5">

                    {{-- IMAGEN --}}
                    <div class="w-24 h-24 rounded-2xl overflow-hidden bg-surface-container-low shrink-0">

                        <img
                            src="{{ $image }}"
                            alt="{{ $item->name }}"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                        >

                    </div>

                    {{-- INFO --}}
                    <div class="flex-1 min-w-0">

                        <div class="flex items-start justify-between gap-6">

                            {{-- LEFT --}}
                            <div class="min-w-0">

                                <h2 class="text-[15px] md:text-base font-medium text-on-surface truncate">
                                    {{ $item->name }}
                                </h2>

                                <div class="flex items-center gap-4 mt-2">

                                    <span class="text-xs uppercase tracking-[0.15em] text-secondary">
                                        Cantidad: {{ $item->qty }}
                                    </span>

                                    <span class="w-1 h-1 rounded-full bg-outline-variant"></span>

                                    <span class="text-xs uppercase tracking-[0.15em] text-secondary">
                                        Subtotal:
                                        S/ {{ number_format($item->price * $item->qty, 2) }}
                                    </span>

                                </div>

                            </div>

                            {{-- RIGHT --}}
                            <div class="flex flex-col items-end shrink-0">

                                <p class="text-lg font-medium text-on-surface">
                                    S/ {{ number_format($item->price, 2) }}
                                </p>

                                @if($item->qty >= 3)

                                    <span class="text-[10px] uppercase tracking-[0.2em] text-green-600 mt-1">
                                        Mayorista
                                    </span>

                                @endif

                            </div>

                        </div>

                        {{-- ACTIONS --}}
                        <div class="flex items-center justify-between mt-5">

                            {{-- QTY --}}
                            <form
                                action="{{ route('cart.update') }}"
                                method="POST"
                                class="flex items-center rounded-full border border-outline-variant/20 overflow-hidden h-10"
                            >
                                @csrf

                                <input type="hidden" name="rowId" value="{{ $item->rowId }}">

                                <button
                                    type="button"
                                    onclick="decreaseQty(this)"
                                    class="w-10 h-10 flex items-center justify-center hover:bg-black hover:text-white transition"
                                >
                                    −
                                </button>

                                <input
                                    type="text"
                                    name="qty"
                                    value="{{ $item->qty }}"
                                    class="w-10 text-center text-sm bg-transparent outline-none"
                                >

                                <button
                                    type="button"
                                    onclick="increaseQty(this)"
                                    class="w-10 h-10 flex items-center justify-center hover:bg-black hover:text-white transition"
                                >
                                    +
                                </button>

                                <button type="submit" class="hidden update-cart-btn">
                                    actualizar
                                </button>

                            </form>

                            {{-- REMOVE --}}
                            <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf

                                <input type="hidden" name="rowId" value="{{ $item->rowId }}">

                                <button
                                    class="inline-flex items-center justify-center gap-2
                                    h-10 px-5 rounded-full
                                    bg-red-50 text-red-600
                                    border border-red-100
                                    hover:bg-red-500 hover:text-white hover:border-red-500
                                    transition-all duration-300
                                    text-[11px] uppercase tracking-[0.2em] font-medium
                                    shadow-sm hover:shadow-lg hover:shadow-red-500/20"
                                >

                                    <span class="material-symbols-outlined text-[16px]">
                                        delete
                                    </span>

                                    <span>
                                        Eliminar
                                    </span>

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

            @endforeach

            <!-- Empty space between items -->
            <div class="h-[1px] bg-outline-variant/10 w-full"></div>

            <div class="pt-4">

                <a
                    href="{{ route('tienda') }}"
                    class="flex items-center gap-4 text-secondary hover:text-primary transition-all duration-300 group"
                >
                    <span
                        class="material-symbols-outlined group-hover:-translate-x-1 transition-transform">
                        arrow_back
                    </span>

                    <span class="text-xs uppercase tracking-[0.2em]">
                        Continuar Comprando
                    </span>

                </a>

            </div>

        </section>

        <!-- Order Summary Sidebar -->
        <aside class="lg:col-span-4 sticky top-32">

            <div class="bg-surface-container-low p-8 md:p-10 rounded-xl">

                <h3 class="text-xl font-headline mb-8 border-b border-outline-variant/20 pb-4">
                    Resumen de Orden
                </h3>

                <div class="space-y-4 mb-8">

                    <div class="flex justify-between text-sm font-body">

                        <span class="text-secondary tracking-wide">
                            Subtotal
                        </span>

                        <span class="text-on-surface">
                            S/ {{ number_format($total, 2) }}
                        </span>

                    </div>

                    <div class="flex justify-between text-sm font-body">

                        <span class="text-secondary tracking-wide">
                            Envío Estimado
                        </span>

                        <span class="text-primary font-medium">
                            Gratis
                        </span>

                    </div>

                    <div class="flex justify-between text-sm font-body">

                        <span class="text-secondary tracking-wide">
                            Impuestos
                        </span>

                        <span class="text-on-surface">
                            Calculados al pago
                        </span>

                    </div>

                </div>

                <div class="pt-6 border-t border-outline-variant/30 mb-10">

                    <div class="flex justify-between items-baseline">

                        <span class="text-lg font-headline">
                            Total
                        </span>

                        <div class="text-right">

                            <span
                                class="text-3xl font-body font-light text-on-surface tracking-tight">

                                S/ {{ number_format($total, 2) }}

                            </span>

                            <p class="text-[10px] text-secondary mt-1 uppercase tracking-tighter">
                                IGV Incluido
                            </p>

                        </div>

                    </div>

                </div>

                <div class="space-y-4">

                    <button onclick="window.location='{{ route('cart.checkout') }}'"
                        class="w-full py-5 bg-gradient-to-r from-primary to-primary-container text-on-primary font-label text-sm uppercase tracking-[0.2em] shadow-lg shadow-primary/20 hover:shadow-xl hover:scale-[1.02] transition-all duration-300">

                        Datos personales

                    </button>

                    <div class="pt-8 space-y-4">

                        <p class="text-[10px] text-secondary text-center uppercase tracking-widest leading-relaxed">
                            Transacción Segura • Garantía de Autenticidad • Devoluciones 30 días
                        </p>

                        <div class="flex justify-center gap-4 opacity-40 grayscale">

                            <span class="material-symbols-outlined text-2xl">
                                credit_card
                            </span>

                            <span class="material-symbols-outlined text-2xl">
                                account_balance_wallet
                            </span>

                            <span class="material-symbols-outlined text-2xl">
                                lock
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </aside>

    </div>

    @else

    <div class="text-center py-32">

        <h2 class="text-4xl font-headline mb-4">
            Tu carrito está vacío
        </h2>

        <p class="text-secondary mb-8">
            Agrega productos para comenzar tu experiencia.
        </p>

        <a
            href="{{ route('tienda') }}"
            class="inline-flex items-center justify-center px-8 py-4 bg-black text-white rounded-xl hover:opacity-90 transition"
        >
            Ir a la tienda
        </a>

    </div>

    @endif

</div>

<script>
    function increaseQty(button) {
        let input = button.parentElement.querySelector('input[name="qty"]');
        input.value = parseInt(input.value) + 1;

        button.parentElement.querySelector('.update-cart-btn').click();
    }

    function decreaseQty(button) {
        let input = button.parentElement.querySelector('input[name="qty"]');

        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;

            button.parentElement.querySelector('.update-cart-btn').click();
        }
    }
</script>

@endsection