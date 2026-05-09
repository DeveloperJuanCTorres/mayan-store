<!-- FOOTER -->
<footer class="relative bg-[#0f0f0f] text-white overflow-hidden">

    <!-- DECORATION -->
    <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-[#c8a96b] to-transparent"></div>

    <div class="absolute -top-40 -left-40 w-96 h-96 bg-[#c8a96b]/10 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-40 -right-40 w-96 h-96 bg-[#c8a96b]/10 rounded-full blur-3xl"></div>

    <!-- TOP -->
    <div class="max-w-screen-2xl mx-auto px-6 lg:px-10 py-24 relative z-10">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-16">

            <!-- BRAND -->
            <div>

                <img
                    src="{{ asset('storage/' . $business->image) }}"
                    class="h-20 w-auto transition duration-500 group-hover:scale-105">

                <p class="text-white/60 leading-relaxed text-sm mb-8">
                    {!!$business->description!!}
                </p><br>

                <!-- SOCIAL -->
                <div class="flex items-center gap-4">
                    @if($business->link_facebook)
                    <a href="{{$business->link_facebook}}" target="_blank"
                    class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center hover:bg-[#c8a96b] hover:border-[#c8a96b] transition-all duration-500">

                        <i class="fab fa-facebook-f"></i>

                    </a>
                    @endif

                    @if($business->link_instagram)
                    <a href="{{$business->link_instagram}}" target="_blank"
                    class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center hover:bg-[#c8a96b] hover:border-[#c8a96b] transition-all duration-500">

                        <i class="fab fa-instagram"></i>

                    </a>
                    @endif

                    @if($business->link_tiktok)
                    <a href="{{$business->link_tiktok}}" target="_blank"
                    class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center hover:bg-[#c8a96b] hover:border-[#c8a96b] transition-all duration-500">

                        <i class="fab fa-tiktok"></i>

                    </a>
                    @endif

                    @if($business->link_youtube)
                    <a href="{{$business->link_youtube}}" target="_blank"
                    class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center hover:bg-[#c8a96b] hover:border-[#c8a96b] transition-all duration-500">

                        <i class="fab fa-youtube"></i>

                    </a>
                    @endif

                </div>

            </div>

            <!-- LINKS -->
            <div>

                <h3 class="uppercase tracking-[0.35em] text-xs text-[#c8a96b] mb-8">
                    Navegación
                </h3>

                <ul class="space-y-5 text-sm text-white/60">

                    <li>
                        <a href="{{ route('home') }}"
                        class="hover:text-[#c8a96b] transition-all duration-300 flex items-center gap-3">

                            <i class="fa-solid fa-chevron-right text-[10px]"></i>

                            Inicio

                        </a>
                    </li>

                    <li>
                        <a href="{{ route('tienda') }}"
                        class="hover:text-[#c8a96b] transition-all duration-300 flex items-center gap-3">

                            <i class="fa-solid fa-chevron-right text-[10px]"></i>

                            Tienda

                        </a>
                    </li>

                    <li>
                        <a href="{{ route('about') }}"
                        class="hover:text-[#c8a96b] transition-all duration-300 flex items-center gap-3">

                            <i class="fa-solid fa-chevron-right text-[10px]"></i>

                            Nosotros

                        </a>
                    </li>

                    <li>
                        <a href="{{ route('contactanos') }}"
                        class="hover:text-[#c8a96b] transition-all duration-300 flex items-center gap-3">

                            <i class="fa-solid fa-chevron-right text-[10px]"></i>

                            Contacto

                        </a>
                    </li>

                </ul>

            </div>

            <!-- CONTACT -->
            <div>

                <h3 class="uppercase tracking-[0.35em] text-xs text-[#c8a96b] mb-8">
                    Contacto
                </h3>

                <div class="space-y-6 text-sm text-white/60">

                    <div class="flex items-start gap-4">

                        <div class="w-11 h-11 rounded-full bg-white/5 flex items-center justify-center mt-1">

                            <i class="fa-brands fa-whatsapp text-[#25D366]"></i>

                        </div>

                        <div>

                            <p class="text-white mb-1">
                                WhatsApp
                            </p>

                            <p>
                                +51 {{$business->phone}}
                            </p>

                        </div>

                    </div>

                    <div class="flex items-start gap-4">

                        <div class="w-11 h-11 rounded-full bg-white/5 flex items-center justify-center mt-1">

                            <i class="fa-regular fa-envelope"></i>

                        </div>

                        <div>

                            <p class="text-white mb-1">
                                Correo
                            </p>

                            <p>
                                {{ $business->email }}
                            </p>

                        </div>

                    </div>

                    <div class="flex items-start gap-4">

                        <div class="w-11 h-11 rounded-full bg-white/5 flex items-center justify-center mt-1">

                            <i class="fa-regular fa-clock"></i>

                        </div>

                        <div>

                            <p class="text-white mb-1">
                                Horario
                            </p>

                            <p>
                                Lunes a Sábado · 9AM - 8PM
                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <!-- NEWSLETTER -->
            <div>

                <h3 class="uppercase tracking-[0.35em] text-xs text-[#c8a96b] mb-8">
                    Newsletter
                </h3>

                <p class="text-white/60 text-sm leading-relaxed mb-8">
                    Suscríbete y recibe acceso exclusivo a nuevas colecciones,
                    promociones y lanzamientos premium.
                </p>

                <form class="space-y-4">

                    <input
                        type="email"
                        placeholder="Tu correo electrónico"
                        class="w-full h-14 px-5 rounded-2xl bg-white/5 border border-white/10 text-white placeholder:text-white/30 focus:outline-none focus:border-[#c8a96b] transition-all">

                    <button
                        class="w-full h-14 rounded-2xl bg-[#c8a96b] text-black uppercase tracking-[0.25em] text-xs font-semibold hover:bg-white transition-all duration-500">

                        Suscribirme

                    </button>

                </form>

            </div>

        </div>

    </div>

    <!-- BOTTOM -->
    <div class="border-t border-white/10 relative z-10">

        <div class="max-w-screen-2xl mx-auto px-6 lg:px-10 py-8 flex flex-col lg:flex-row items-center justify-between gap-6">

            <p class="text-white/40 text-xs tracking-[0.2em] uppercase text-center lg:text-left">
                © 2026 {{$business->name}} · Todos los derechos reservados
            </p>

            <div class="flex items-center gap-8 text-xs uppercase tracking-[0.2em] text-white/40">

                <a href="#"
                class="hover:text-[#c8a96b] transition-all">
                    Privacidad
                </a>

                <a href="#"
                class="hover:text-[#c8a96b] transition-all">
                    Términos
                </a>

                <a href="#"
                class="hover:text-[#c8a96b] transition-all">
                    Libro de Reclamaciones
                </a>

            </div>

        </div>

    </div>

</footer>

<!-- WHATSAPP FLOAT -->
<a href="https://wa.me/51999999999"
   target="_blank"
   class="fixed bottom-6 right-6 z-[9999] w-16 h-16 rounded-full bg-[#25D366] shadow-[0_10px_40px_rgba(37,211,102,0.45)] flex items-center justify-center text-white text-3xl hover:scale-110 transition-all duration-500">

    <i class="fab fa-whatsapp"></i>

</a>