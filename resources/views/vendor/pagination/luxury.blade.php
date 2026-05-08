@if ($paginator->hasPages())

<nav class="flex items-center justify-center mt-24">

    <div class="flex items-center gap-3 flex-wrap">

        {{-- PREVIOUS --}}
        @if ($paginator->onFirstPage())

            <span class="w-14 h-14 rounded-full border border-[#e7dfd4] bg-white/60 text-[#bbb] flex items-center justify-center cursor-not-allowed">
                ←
            </span>

        @else

            <a href="{{ $paginator->previousPageUrl() }}"
               class="w-14 h-14 rounded-full border border-[#e7dfd4] bg-white text-[#111]
               hover:bg-[#c8a96b] hover:text-white hover:border-[#c8a96b]
               transition-all duration-500 flex items-center justify-center shadow-sm hover:shadow-xl">

                ←

            </a>

        @endif

        {{-- PAGES --}}
        @foreach ($elements as $element)

            {{-- DOTS --}}
            @if (is_string($element))

                <span class="px-2 text-[#999]">
                    {{ $element }}
                </span>

            @endif

            {{-- LINKS --}}
            @if (is_array($element))

                @foreach ($element as $page => $url)

                    @if ($page == $paginator->currentPage())

                        <span
                            class="w-14 h-14 rounded-full bg-[#1a1a1a] text-white
                            flex items-center justify-center text-sm font-medium shadow-2xl">

                            {{ $page }}

                        </span>

                    @else

                        <a href="{{ $url }}"
                           class="w-14 h-14 rounded-full border border-[#e7dfd4]
                           bg-white text-[#555]
                           hover:bg-[#c8a96b]
                           hover:text-white
                           hover:border-[#c8a96b]
                           transition-all duration-500
                           flex items-center justify-center text-sm shadow-sm hover:shadow-xl">

                            {{ $page }}

                        </a>

                    @endif

                @endforeach

            @endif

        @endforeach

        {{-- NEXT --}}
        @if ($paginator->hasMorePages())

            <a href="{{ $paginator->nextPageUrl() }}"
               class="w-14 h-14 rounded-full border border-[#e7dfd4] bg-white text-[#111]
               hover:bg-[#c8a96b] hover:text-white hover:border-[#c8a96b]
               transition-all duration-500 flex items-center justify-center shadow-sm hover:shadow-xl">

                →

            </a>

        @else

            <span class="w-14 h-14 rounded-full border border-[#e7dfd4] bg-white/60 text-[#bbb] flex items-center justify-center cursor-not-allowed">
                →
            </span>

        @endif

    </div>

</nav>

@endif