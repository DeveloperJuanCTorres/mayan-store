@extends('layouts.app')
@php
    $hideHeader = true;
@endphp
@section('content')

<div class="min-h-screen bg-[radial-gradient(circle_at_top,rgba(212,175,55,0.15),transparent_40%),linear-gradient(135deg,#fafaf9,#d6d3d1)]">
    <div class="flex-grow flex flex-col items-center justify-center px-gutter pt-12 pb-20 max-w-2xl mx-auto w-full">
        <!-- Hero Visual (Subtle Image) -->
        <div class="w-48 h-48 mb-8 rounded-full overflow-hidden border border-neutral-200">
            <img class="w-full h-full object-cover" 
                src="{{asset('storage/' . $business->image)}}" />
        </div>
        <div class="text-center mb-8 space-y-4">
            <p class="font-label-caps text-label-caps text-on-surface-variant brand-name">{{$business->name}}</p>
            <h2 class="font-display-lg text-display-lg text-primary">Joyería Xuping</h2>
        </div>
        <!-- Links Container -->
        <div class="w-full space-y-4">
            <!-- CTA: Primary -->
            <a class="group relative flex items-center justify-between w-full p-8 bg-gradient-to-r from-primary to-neutral-800 text-on-primary liquid-transition hover:scale-[1.02] hover:shadow-xl hover:shadow-primary/10 overflow-hidden" 
                href="{{ route('home') }}">
                <div class="flex items-center gap-6">
                    <span class="material-symbols-outlined text-xl" data-icon="storefront">storefront</span>
                    <span class="font-label-caps text-label-caps uppercase tracking-[0.25em]">Tienda virtual</span>                    
                </div>
                <span class="material-symbols-outlined transform group-hover:translate-x-2 liquid-transition" data-icon="arrow_right_alt">arrow_right_alt</span>
                <div class="absolute inset-0 bg-white/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            </a>
            @foreach($links as $link)
            <a class="group flex items-center justify-between w-full p-6 border border-neutral-900/5 bg-white/40 backdrop-blur-md liquid-transition hover:bg-secondary-container/30 hover:border-secondary-fixed hover:scale-[1.01]" 
                href="{{ $link->link }}" target="_blank">
                <div class="flex items-center gap-6">
                    <img src="{{asset('storage/' . $link->icono)}}" style="width: 24px; height: 24px;" alt="" class="text-xl text-secondary" data-icon="chat_bubble">
                    <span class="font-label-caps text-label-caps uppercase tracking-[0.2em] text-primary">{{ $link->name }}</span>
                    <h2 class="font-display-lg text-display-lg text-primary">{{ $link->description }}</h2>
                </div>
                <span class="material-symbols-outlined text-secondary transform translate-x-4 opacity-0 group-hover:translate-x-0 group-hover:opacity-100 liquid-transition" data-icon="chevron_right">chevron_right</span>
            </a>
            @endforeach
        </div>
        
        <!-- Featured Collection Preview (Editorial Element) -->
        
    </div>
</div>



@endsection