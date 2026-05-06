@extends('layouts.app')

@section('content')

<div class="pt-32 pb-24 px-6 md:px-12 max-w-screen-2xl mx-auto">
    <!-- Hero Section -->
    <header class="mb-24">
        <h1 class="font-headline text-5xl md:text-7xl lg:text-8xl tracking-tighter mb-8 leading-none">
            Begin a <br /> <span class="italic text-primary">Dialogue</span>
        </h1>
        <p class="font-body text-secondary max-w-xl text-lg leading-relaxed ml-auto md:mr-24 text-right">
            Our artisans are ready to assist you in selecting or crafting a piece that transcends time. Reach out
            for private viewings or bespoke inquiries.
        </p>
    </header>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-20 lg:gap-32">
        <!-- Left Section: Contact Form -->
        <section class="flex flex-col">
            <div class="mb-12">
                <h2 class="font-headline text-2xl mb-2">Inquiry Form</h2>
                <div class="h-px w-12 bg-primary"></div>
            </div>
            <form class="space-y-10">
                <div class="relative">
                    <label class="block text-xs font-label uppercase tracking-widest text-secondary mb-2"
                        for="name">Name</label>
                    <input
                        class="w-full bg-transparent border-0 border-b border-outline-variant/20 focus:ring-0 focus:border-primary px-0 py-3 transition-colors duration-300 placeholder-surface-dim"
                        id="name" name="name" placeholder="Your full name" type="text" />
                </div>
                <div class="relative">
                    <label class="block text-xs font-label uppercase tracking-widest text-secondary mb-2"
                        for="email">Email</label>
                    <input
                        class="w-full bg-transparent border-0 border-b border-outline-variant/20 focus:ring-0 focus:border-primary px-0 py-3 transition-colors duration-300 placeholder-surface-dim"
                        id="email" name="email" placeholder="email@example.com" type="email" />
                </div>
                <div class="relative">
                    <label class="block text-xs font-label uppercase tracking-widest text-secondary mb-2"
                        for="subject">Subject</label>
                    <select
                        class="w-full bg-transparent border-0 border-b border-outline-variant/20 focus:ring-0 focus:border-primary px-0 py-3 transition-colors duration-300 text-on-surface"
                        id="subject" name="subject">
                        <option value="bespoke">Bespoke Commission</option>
                        <option value="viewing">Private Viewing</option>
                        <option value="support">Service &amp; Care</option>
                        <option value="other">General Inquiry</option>
                    </select>
                </div>
                <div class="relative">
                    <label class="block text-xs font-label uppercase tracking-widest text-secondary mb-2"
                        for="message">Message</label>
                    <textarea
                        class="w-full bg-transparent border-0 border-b border-outline-variant/20 focus:ring-0 focus:border-primary px-0 py-3 transition-colors duration-300 placeholder-surface-dim resize-none"
                        id="message" name="message" placeholder="Tell us about your requirements..."
                        rows="4"></textarea>
                </div>
                <div class="pt-6">
                    <button
                        class="gold-gradient text-on-primary px-12 py-4 text-xs font-label uppercase tracking-[0.2em] shadow-lg hover:brightness-110 active:scale-95 transition-all w-full md:w-auto"
                        type="submit">
                        Enviar
                    </button>
                </div>
            </form>
        </section>
        <!-- Right Section: Contact Information -->
        <section class="space-y-16">
            <!-- Info Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                <div class="p-8 bg-surface-container-low rounded-xl border border-outline-variant/5">
                    <span class="material-symbols-outlined text-primary mb-4" data-icon="chat">chat</span>
                    <h3 class="font-headline text-lg mb-2">Concierge</h3>
                    <a class="font-body text-secondary hover:text-primary transition-colors"
                        href="https://wa.me/1234567890">+1 (234) 567-890</a>
                </div>
                <div class="p-8 bg-surface-container-low rounded-xl border border-outline-variant/5">
                    <span class="material-symbols-outlined text-primary mb-4" data-icon="mail">mail</span>
                    <h3 class="font-headline text-lg mb-2">Correspondence</h3>
                    <a class="font-body text-secondary hover:text-primary transition-colors"
                        href="mailto:atelier@gildedcurator.com">atelier@gildedcurator.com</a>
                </div>
            </div>
            <!-- Business Hours -->
            <div class="bg-surface-container-high/30 p-8 rounded-xl">
                <h3 class="font-headline text-xl mb-6">Atelier Hours</h3>
                <ul class="space-y-4 font-body text-sm">
                    <li class="flex justify-between border-b border-outline-variant/10 pb-2">
                        <span class="text-secondary">Monday — Friday</span>
                        <span class="font-semibold italic">10:00 — 19:00</span>
                    </li>
                    <li class="flex justify-between border-b border-outline-variant/10 pb-2">
                        <span class="text-secondary">Saturday</span>
                        <span class="font-semibold italic">11:00 — 17:00</span>
                    </li>
                    <li class="flex justify-between">
                        <span class="text-secondary">Sunday</span>
                        <span class="italic text-outline">By Appointment Only</span>
                    </li>
                </ul>
            </div>
            <!-- Map Integration -->
            <div class="relative group">
                <div
                    class="absolute -inset-4 bg-primary/5 rounded-2xl group-hover:bg-primary/10 transition-colors duration-500">
                </div>
                <div class="relative h-64 w-full bg-stone-200 rounded-lg overflow-hidden">
                    <img class="w-full h-full object-cover grayscale opacity-80"
                        data-alt="Stylized map showing luxury boutique location in Paris Place Vendôme with minimalist gold markers and muted gray tones"
                        data-location="Paris"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuB5K9G5JR5uXp_Yl-a_EbSavYjJuqoTMYyzTy_YL6dC-bQ6VHvNoLYGzoq6AE0IhjvIfnM7BCj6vbXR7IkTzdTDhsF2KL1cMwRFl2_2POv9IbF4MCV5MajhCJsaXl97d0xY7L4JK4r1OneCqmXcE-mEk2g0CeTNNjQfS7-qzdhjucU4v0BYCXLAIFE7SI7p-_2txa7iGOrlaU7lCeyaVBwPWxBh58wPHOS2u2oGeGZyNOLbgVbGqFBDkSKa0GLXsCgdrPpSfnHsYo0p" />
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="glass-panel px-6 py-4 rounded shadow-xl border border-white/20">
                            <p class="font-headline text-sm tracking-tight">12 Place Vendôme, Paris</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Socials -->
            <div class="flex items-center space-x-12 pt-4">
                <a class="group flex items-center space-x-3" href="#">
                    <span
                        class="w-10 h-10 rounded-full border border-outline-variant/30 flex items-center justify-center group-hover:bg-primary/5 transition-all">
                        <span class="material-symbols-outlined text-xl"
                            data-icon="video_library">video_library</span>
                    </span>
                    <span
                        class="font-label text-xs uppercase tracking-widest text-secondary group-hover:text-primary transition-colors">TikTok</span>
                </a>
                <a class="group flex items-center space-x-3" href="#">
                    <span
                        class="w-10 h-10 rounded-full border border-outline-variant/30 flex items-center justify-center group-hover:bg-primary/5 transition-all">
                        <span class="material-symbols-outlined text-xl" data-icon="photo_camera">photo_camera</span>
                    </span>
                    <span
                        class="font-label text-xs uppercase tracking-widest text-secondary group-hover:text-primary transition-colors">Instagram</span>
                </a>
            </div>
        </section>
    </div>
</div>

@endsection