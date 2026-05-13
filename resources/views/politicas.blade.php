@extends('layouts.app')

<style>

    .terminos-content {
        color: #444;
        font-size: 16px;
        line-height: 2;
    }

    .terminos-content h1,
    .terminos-content h2,
    .terminos-content h3,
    .terminos-content h4 {
        font-family: serif;
        color: #1a1a1a;
        font-weight: 300;
        line-height: 1.2;
        margin-top: 4rem;
        margin-bottom: 1.5rem;
    }

    .terminos-content h1 {
        font-size: 3rem;
    }

    .terminos-content h2 {
        font-size: 2.25rem;
        border-bottom: 1px solid #ece7df;
        padding-bottom: 1rem;
    }

    .terminos-content h3 {
        font-size: 1.75rem;
    }

    .terminos-content p {
        margin-bottom: 1.75rem;
        color: #555;
    }

    .terminos-content strong {
        color: #1a1a1a;
        font-weight: 600;
    }

    .terminos-content ul,
    .terminos-content ol {
        margin-top: 1.5rem;
        margin-bottom: 2rem;
        padding-left: 1.5rem;
    }

    .terminos-content li {
        margin-bottom: 1rem;
        color: #555;
    }

    .terminos-content a {
        color: #c8a96b;
        text-decoration: none;
        transition: all .3s ease;
    }

    .terminos-content a:hover {
        opacity: .7;
    }

    .terminos-content blockquote {
        border-left: 2px solid #c8a96b;
        padding-left: 1.5rem;
        margin: 2.5rem 0;
        color: #666;
        font-style: italic;
    }

    .terminos-content table {
        width: 100%;
        border-collapse: collapse;
        margin: 2rem 0;
    }

    .terminos-content table th,
    .terminos-content table td {
        border: 1px solid #ece7df;
        padding: 1rem;
        text-align: left;
    }

    .terminos-content table th {
        background: #faf8f4;
        color: #1a1a1a;
    }

    .terminos-content hr {
        border: none;
        border-top: 1px solid #ece7df;
        margin: 4rem 0;
    }

</style>

@section('content')

<div class="bg-[#f8f6f2] text-[#1a1a1a] min-h-screen overflow-hidden">

    <!-- BACKGROUND DETAILS -->
    <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-[#c8a96b]/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-[#c8a96b]/5 rounded-full blur-3xl"></div>

    <!-- HERO -->
    <section class="relative pt-48 pb-28">

        <div class="max-w-screen-2xl mx-auto px-6 lg:px-10 relative z-10">

            <div class="max-w-5xl">

                <p class="uppercase tracking-[0.45em] text-[#c8a96b] text-xs mb-8">
                    Xuping
                </p>

                <h1 class="text-6xl md:text-8xl font-serif font-light leading-[0.92] tracking-tight mb-12">

                    Políticas de <br>

                    <span class="italic text-[#c8a96b]">
                        Privacidad
                    </span>

                </h1>

                <div class="w-24 h-[1px] bg-[#c8a96b]"></div>

            </div>

        </div>

    </section>

    <!-- CONTENT -->
    <section class="relative pb-32 z-10">

        <div class="max-w-screen-xl mx-auto px-6 lg:px-10">

            <div class="bg-white/90 backdrop-blur-sm border border-[#ece7df] shadow-[0_20px_80px_rgba(0,0,0,0.04)]">

                <!-- HEADER CARD -->
                <div class="border-b border-[#ece7df] px-8 md:px-16 py-10">

                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                        <div>

                            <p class="uppercase tracking-[0.35em] text-[#c8a96b] text-xs mb-4">
                                Información legal
                            </p>

                            <h2 class="text-3xl md:text-4xl font-serif font-light">
                                Condiciones Generales de Uso
                            </h2>

                        </div>

                        <div class="text-sm text-[#777] leading-relaxed max-w-md">
                            Al acceder y utilizar este sitio web, aceptas cumplir con
                            los términos, políticas y condiciones establecidas por nuestra marca.
                        </div>

                    </div>

                </div>

                <!-- BODY -->
                <div class="px-8 md:px-16 py-14">

                    <div class="terminos-content prose prose-neutral max-w-none">
                        
                        @if($politicas)
                        {!! $politicas->descripcion !!}
                        @endif

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection






