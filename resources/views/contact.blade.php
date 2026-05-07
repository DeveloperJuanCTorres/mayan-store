@extends('layouts.app')

@section('content')

<div class="bg-[#f8f6f2] text-[#1a1a1a] min-h-screen">

    <!-- HERO -->
    <section class="relative pt-12 pb-24 overflow-hidden">

        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-[#c8a96b]/10 rounded-full blur-3xl"></div>

        <div class="max-w-screen-2xl mx-auto px-6 lg:px-10 relative z-10">

            <div class="grid lg:grid-cols-2 gap-20 items-end">

                <div>

                    <p class="uppercase tracking-[0.45em] text-[#c8a96b] text-xs mb-8">
                        Joyería de lujo
                    </p>

                    <h1 class="text-6xl md:text-8xl font-serif font-light leading-[0.95] tracking-tight mb-10">

                        Iniciar un <br>

                        <span class="italic text-[#c8a96b]">
                            Dialogo
                        </span>

                    </h1>

                </div>

                <div class="lg:pb-8">

                    <p class="text-[#666] text-lg leading-relaxed max-w-xl">
                        Nuestros especialistas están disponibles para ayudarte a seleccionar una pieza exclusiva
                        o crear una joya personalizada diseñada para trascender el tiempo.
                    </p>

                </div>

            </div>

        </div>

    </section>

    <!-- CONTENT -->
    <section class="pb-32">

        <div class="max-w-screen-2xl mx-auto px-6 lg:px-10">

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-20">

                <!-- FORM -->
                <div class="lg:col-span-7">

                    <div class="bg-white rounded-[40px] p-8 lg:p-14 shadow-sm border border-[#eee]">

                        <div class="mb-14">

                            <p class="uppercase tracking-[0.35em] text-[#c8a96b] text-xs mb-4">
                                Private Inquiry
                            </p>

                            <h2 class="text-4xl lg:text-5xl font-serif font-light">
                                Contacto Exclusivo
                            </h2>

                        </div>

                        <form class="space-y-12">

                            <!-- NAME -->
                            <div>

                                <label class="block uppercase tracking-[0.25em] text-[11px] text-[#999] mb-5">
                                    Nombre
                                </label>

                                <input
                                    type="text"
                                    placeholder="Tu nombre completo"
                                    class="w-full bg-transparent border-0 border-b border-[#e5e5e5] px-0 py-4 focus:ring-0 focus:border-[#c8a96b] text-lg placeholder:text-[#bbb]"
                                >

                            </div>

                            <!-- EMAIL -->
                            <div>

                                <label class="block uppercase tracking-[0.25em] text-[11px] text-[#999] mb-5">
                                    Correo Electrónico
                                </label>

                                <input
                                    type="email"
                                    placeholder="correo@ejemplo.com"
                                    class="w-full bg-transparent border-0 border-b border-[#e5e5e5] px-0 py-4 focus:ring-0 focus:border-[#c8a96b] text-lg placeholder:text-[#bbb]"
                                >

                            </div>

                            <!-- SUBJECT -->
                            <div>

                                <label class="block uppercase tracking-[0.25em] text-[11px] text-[#999] mb-5">
                                    Tipo de Consulta
                                </label>

                                <select
                                    class="w-full bg-transparent border-0 border-b border-[#e5e5e5] px-0 py-4 focus:ring-0 focus:border-[#c8a96b] text-lg text-[#444]"
                                >

                                    <option>
                                        Joya Personalizada
                                    </option>

                                    <option>
                                        Compra Exclusiva
                                    </option>

                                    <option>
                                        Atención Premium
                                    </option>

                                    <option>
                                        Consulta General
                                    </option>

                                </select>

                            </div>

                            <!-- MESSAGE -->
                            <div>

                                <label class="block uppercase tracking-[0.25em] text-[11px] text-[#999] mb-5">
                                    Mensaje
                                </label>

                                <textarea
                                    rows="5"
                                    placeholder="Cuéntanos sobre tu requerimiento..."
                                    class="w-full bg-transparent border-0 border-b border-[#e5e5e5] px-0 py-4 focus:ring-0 focus:border-[#c8a96b] text-lg placeholder:text-[#bbb] resize-none"
                                ></textarea>

                            </div>

                            <!-- BUTTON -->
                            <div class="pt-4">

                                <button
                                    type="submit"
                                    class="px-12 py-5 bg-[#1a1a1a] text-white rounded-full uppercase tracking-[0.3em] text-xs hover:bg-[#c8a96b] transition-all duration-500 hover:shadow-[0_10px_40px_rgba(200,169,107,0.35)]">

                                    Enviar Consulta

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

                <!-- INFO -->
                <div class="lg:col-span-5 space-y-10">

                    <!-- CARD -->
                    <div class="bg-white rounded-[40px] p-10 border border-[#eee] shadow-sm">

                        <p class="uppercase tracking-[0.35em] text-[#c8a96b] text-xs mb-8">
                            Concierge
                        </p>

                        <div class="space-y-10">

                            <!-- PHONE -->
                            <div>

                                <p class="text-xs uppercase tracking-[0.25em] text-[#999] mb-3">
                                    WhatsApp
                                </p>

                                <a href="#"
                                   class="text-2xl font-light hover:text-[#c8a96b] transition">
                                    +51 999 999 999
                                </a>

                            </div>

                            <!-- EMAIL -->
                            <div>

                                <p class="text-xs uppercase tracking-[0.25em] text-[#999] mb-3">
                                    Correo
                                </p>

                                <a href="#"
                                   class="text-xl font-light hover:text-[#c8a96b] transition break-all">
                                    atelier@luxuryjewelry.com
                                </a>

                            </div>

                            <!-- HOURS -->
                            <div>

                                <p class="text-xs uppercase tracking-[0.25em] text-[#999] mb-5">
                                    Horarios
                                </p>

                                <div class="space-y-4 text-[#555]">

                                    <div class="flex justify-between border-b border-[#eee] pb-3">
                                        <span>Lunes — Viernes</span>
                                        <span>10:00 — 19:00</span>
                                    </div>

                                    <div class="flex justify-between border-b border-[#eee] pb-3">
                                        <span>Sábado</span>
                                        <span>11:00 — 17:00</span>
                                    </div>

                                    <div class="flex justify-between">
                                        <span>Domingo</span>
                                        <span class="italic text-[#999]">
                                            Solo citas privadas
                                        </span>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- MAP -->
                    <div class="relative overflow-hidden rounded-[40px] h-[500px]">

                        <img
                            class="w-full h-full object-cover"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuB5K9G5JR5uXp_Yl-a_EbSavYjJuqoTMYyzTy_YL6dC-bQ6VHvNoLYGzoq6AE0IhjvIfnM7BCj6vbXR7IkTzdTDhsF2KL1cMwRFl2_2POv9IbF4MCV5MajhCJsaXl97d0xY7L4JK4r1OneCqmXcE-mEk2g0CeTNNjQfS7-qzdhjucU4v0BYCXLAIFE7SI7p-_2txa7iGOrlaU7lCeyaVBwPWxBh58wPHOS2u2oGeGZyNOLbgVbGqFBDkSKa0GLXsCgdrPpSfnHsYo0p"
                            alt="Map">

                        <div class="absolute inset-0 bg-black/25"></div>

                        <!-- LOCATION -->
                        <div class="absolute bottom-8 left-8 right-8">

                            <div class="bg-white/90 backdrop-blur-xl rounded-3xl p-6 shadow-2xl">

                                <p class="uppercase tracking-[0.25em] text-[#c8a96b] text-[10px] mb-3">
                                    Luxury Atelier
                                </p>

                                <h3 class="text-2xl font-serif mb-2">
                                    Lima, Perú
                                </h3>

                                <p class="text-[#666] leading-relaxed">
                                    Atención personalizada para clientes exclusivos y citas privadas.
                                </p>

                            </div>

                        </div>

                    </div>

                    <!-- SOCIAL -->
                    <div class="flex items-center gap-6">

                        <a href="#"
                           class="w-16 h-16 rounded-full border border-[#ddd] flex items-center justify-center hover:bg-[#c8a96b] hover:text-white hover:border-[#c8a96b] transition-all duration-500">

                            <span class="material-symbols-outlined">
                                photo_camera
                            </span>

                        </a>

                        <a href="#"
                           class="w-16 h-16 rounded-full border border-[#ddd] flex items-center justify-center hover:bg-[#c8a96b] hover:text-white hover:border-[#c8a96b] transition-all duration-500">

                            <span class="material-symbols-outlined">
                                video_library
                            </span>

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection