@extends('layouts.app')

@section('content')

<div class="pt-12 pb-24 px-6 max-w-5xl mx-auto">

    @if(session('success'))
    <div class="mb-8 p-4 rounded-xl bg-green-500/10 border border-green-500/20 text-green-500">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="mb-8 p-4 rounded-xl bg-red-500/10 border border-red-500/20 text-red-500">
        {{ session('error') }}
    </div>
    @endif

    <div class="mb-16 text-center">
        <h1 class="font-headline text-4xl lg:text-5xl text-on-surface mb-2">
            Datos de Envío
        </h1>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">

        <!-- FORM -->
        <div class="lg:col-span-7">

            <form
                id="checkoutForm"
                action="{{ route('checkout.pedido') }}"
                method="POST"
                class="space-y-12"
            >
                @csrf

                <!-- PERSONAL -->
                <section>

                    <h2 class="font-headline text-xl mb-8 flex items-center gap-4">
                        Información Personal
                        <span class="h-[1px] flex-grow bg-outline-variant opacity-20"></span>
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        <div class="flex flex-col gap-2">
                            <label class="font-label text-[10px] uppercase tracking-widest text-secondary">
                                Nombre Completo
                            </label>

                            <input
                                type="text"
                                name="nombre"
                                value="{{ old('nombre') }}"
                                required
                                class="bg-transparent border-b border-outline-variant/30 focus:border-primary px-0 py-2 outline-none"
                                placeholder="Ingrese su nombre"
                            >
                            
                        </div>

                        <div class="flex flex-col gap-2">
                            <label class="font-label text-[10px] uppercase tracking-widest text-secondary">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                class="bg-transparent border-b border-outline-variant/30 focus:border-primary px-0 py-2 outline-none"
                                placeholder="correo@email.com"
                            >
                        </div>

                        <div class="flex flex-col gap-2 md:col-span-2">

                            <label class="font-label text-[10px] uppercase tracking-widest text-secondary">
                                Teléfono
                            </label>

                            @include('partials.phone')
                        </div>

                    </div>

                </section>

                <!-- DIRECCION -->
                <section>

                    <h2 class="font-headline text-xl mb-8 flex items-center gap-4">
                        Dirección de Entrega
                        <span class="h-[1px] flex-grow bg-outline-variant opacity-20"></span>
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-6 gap-8">

                        <div class="flex flex-col gap-2 md:col-span-6">

                            <label class="font-label text-[10px] uppercase tracking-widest text-secondary">
                                Dirección
                            </label>

                            <input
                                type="text"
                                name="direccion"
                                value="{{ old('direccion') }}"
                                required
                                class="bg-transparent border-b border-outline-variant/30 focus:border-primary px-0 py-2 outline-none"
                                placeholder="Ingrese dirección"
                            >
                        </div>

                        <div class="flex flex-col gap-2 md:col-span-3">

                            <label class="font-label text-[10px] uppercase tracking-widest text-secondary">
                                Departamento
                            </label>

                            <input
                                type="text"
                                name="departamento"
                                value="{{ old('departamento') }}"
                                required
                                class="bg-transparent border-b border-outline-variant/30 focus:border-primary px-0 py-2 outline-none"
                                placeholder="Lima"
                            >
                        </div>

                        <div class="flex flex-col gap-2 md:col-span-3">

                            <label class="font-label text-[10px] uppercase tracking-widest text-secondary">
                                Distrito
                            </label>

                            <input
                                type="text"
                                name="distrito"
                                value="{{ old('distrito') }}"
                                required
                                class="bg-transparent border-b border-outline-variant/30 focus:border-primary px-0 py-2 outline-none"
                                placeholder="Miraflores"
                            >
                        </div>

                        <div class="flex flex-col gap-2 md:col-span-6">

                            <label class="font-label text-[10px] uppercase tracking-widest text-secondary">
                                Referencia
                            </label>

                            <textarea
                                name="referencia"
                                rows="3"
                                class="bg-transparent border border-outline-variant/30 rounded-xl p-4 outline-none focus:border-primary"
                                placeholder="Referencia adicional"
                            >{{ old('referencia') }}</textarea>

                        </div>

                    </div>

                </section>

                <!-- BOTONES -->
                <div class="flex flex-col sm:flex-row items-center justify-between gap-6 pt-12 border-t border-outline-variant/10">

                    <a
                        href="{{ route('cart.index') }}"
                        class="font-label text-[10px] uppercase tracking-[0.2em] text-secondary flex items-center gap-2 group"
                    >
                        <span class="material-symbols-outlined text-sm group-hover:-translate-x-1 transition-transform">
                            arrow_back
                        </span>

                        Volver al Carrito
                    </a>

                    <button
                        id="btnEnviarPedido"
                        type="submit"
                        class="w-full sm:w-auto px-12 py-5 bg-gold-gradient text-white rounded-full font-label text-[10px] uppercase tracking-[0.2em] font-bold shadow-lg shadow-primary/20 hover:scale-[1.02] transition-all"
                    >
                        Enviar Pedido
                    </button>

                </div>

            </form>

        </div>

        <!-- RESUMEN -->
        <div class="lg:col-span-5">

            <div class="sticky top-32 p-8 bg-surface-container-low rounded-xl border border-outline-variant/10">

                <h3 class="font-headline text-2xl mb-8 italic">
                    Su Colección
                </h3>

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

                <div class="space-y-6 mb-8">

                    <div class="flex gap-4">

                        <div class="w-20 h-24 bg-surface-container overflow-hidden rounded">

                            <img
                                class="w-full h-full object-cover"
                                src="{{ $image }}"
                            >

                        </div>

                        <div class="flex-grow py-1">

                            <p class="font-headline text-sm mb-1">
                                {{ $item->name }}
                            </p>

                            <p class="font-label text-[10px] text-secondary uppercase tracking-widest mb-2">
                                {{ $item->qty }} UNIDADES X
                                S/. {{ number_format($item->price, 2) }}
                            </p>

                            <p class="font-body text-sm font-bold">
                                S/. {{ number_format($item->price * $item->qty, 2) }}
                            </p>

                        </div>

                    </div>

                </div>

                @endforeach

                <div class="space-y-4 pt-6 border-t border-outline-variant/20">

                    <div class="flex justify-between items-center pt-6">

                        <span class="font-headline text-lg">
                            Total
                        </span>

                        <span class="font-headline text-xl text-primary font-bold">
                            S/. {{ number_format($total, 2) }}
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>



<script>

    document.addEventListener('DOMContentLoaded', function () {

        const form = document.getElementById('checkoutForm');
        const btn = document.getElementById('btnEnviarPedido');

        form.addEventListener('submit', function () {

            btn.disabled = true;

            btn.innerHTML = `
                <div class="flex items-center justify-center gap-3">
                    <svg class="animate-spin h-5 w-5 text-white"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24">

                        <circle
                            class="opacity-25"
                            cx="12"
                            cy="12"
                            r="10"
                            stroke="currentColor"
                            stroke-width="4">
                        </circle>

                        <path
                            class="opacity-75"
                            fill="currentColor"
                            d="M4 12a8 8 0 018-8v8z">
                        </path>

                    </svg>

                    Procesando...
                </div>
            `;

            Swal.fire({
                title: 'Procesando pedido',
                text: 'Espere un momento por favor...',
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

        });

    });
    
</script>

@endsection