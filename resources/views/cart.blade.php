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

            <div class="flex flex-col md:flex-row gap-8 pb-12 group">

                {{-- IMAGEN --}}
                <div
                    class="w-full md:w-48 aspect-[3/4] bg-surface-container-low overflow-hidden rounded-xl">

                    <img
                        src="{{ asset('storage/' . $item->options->image) }}"
                        alt="{{ $item->name }}"
                        class="w-full h-full object-cover grayscale-[20%] group-hover:scale-105 transition-transform duration-700"
                    />

                </div>

                <div class="flex-1 flex flex-col justify-between">

                    <div>

                        {{-- NOMBRE + PRECIO --}}
                        <div class="flex justify-between items-start mb-2">

                            <h2 class="text-2xl font-headline text-on-surface">
                                {{ $item->name }}
                            </h2>

                            <p class="text-xl font-body font-medium text-on-surface">
                                S/ {{ number_format($item->price, 2) }}
                            </p>

                        </div>

                        {{-- SUBTOTAL --}}
                        <div
                            class="flex flex-wrap gap-x-6 gap-y-2 mt-4 text-sm text-secondary font-body tracking-wide uppercase">

                            <span class="flex items-center gap-1">
                                Cantidad:
                                <strong class="text-on-surface">
                                    {{ $item->qty }}
                                </strong>
                            </span>

                            <span class="flex items-center gap-1">
                                Subtotal:
                                <strong class="text-on-surface">
                                    S/ {{ number_format($item->price * $item->qty, 2) }}
                                </strong>
                            </span>

                        </div>

                    </div>

                    <div class="flex justify-between items-end mt-8">

                        {{-- ACTUALIZAR CANTIDAD --}}
                        <form
                            action="{{ route('cart.update') }}"
                            method="POST"
                            class="flex items-center gap-4 bg-surface-container-high/50 p-1 px-3 rounded-full border border-outline-variant/10"
                        >
                            @csrf

                            <input type="hidden" name="rowId" value="{{ $item->rowId }}">

                            <button
                                type="button"
                                onclick="decreaseQty(this)"
                                class="w-8 h-8 flex items-center justify-center text-on-surface-variant hover:text-primary transition-colors"
                            >
                                <span class="material-symbols-outlined text-lg">remove</span>
                            </button>

                            <input
                                type="text"
                                name="qty"
                                value="{{ $item->qty }}"
                                min="1"
                                class="w-10 bg-transparent text-center outline-none text-sm font-medium"
                            >

                            <button
                                type="button"
                                onclick="increaseQty(this)"
                                class="w-8 h-8 flex items-center justify-center text-on-surface-variant hover:text-primary transition-colors"
                            >
                                <span class="material-symbols-outlined text-lg">add</span>
                            </button>

                            <button type="submit" class="hidden update-cart-btn">
                                actualizar
                            </button>

                        </form>

                        {{-- ELIMINAR --}}
                        <form action="{{ route('cart.remove') }}" method="POST">
                            @csrf

                            <input type="hidden" name="rowId" value="{{ $item->rowId }}">

                            <button
                                class="flex items-center gap-2 text-xs uppercase tracking-widest text-on-surface-variant hover:text-error transition-colors group/del">

                                <span class="material-symbols-outlined text-lg group-hover/del:fill-[1]">
                                    delete
                                </span>

                                <span>Eliminar</span>

                            </button>

                        </form>

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