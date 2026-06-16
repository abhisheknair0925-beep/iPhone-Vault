@extends('layouts.app')

@section('title', 'iPhone Vault | Find Your Perfect iPhone')

@section('content')
<div class="relative overflow-hidden bg-black text-white">
    <!-- Glowing Orbs -->
    <div class="glow-orb glow-blue"></div>
    <div class="glow-orb glow-purple" style="bottom: 15%"></div>

    <!-- Hero Section (Feature 2) -->
    <section class="relative z-10 mx-auto max-w-7xl px-6 pt-12 pb-20 lg:pt-20 lg:pb-28 grid lg:grid-cols-12 gap-12 items-center">
        <!-- Hero Text -->
        <div class="lg:col-span-7 space-y-8 text-left" data-aos="fade-up">
            <span class="inline-flex items-center rounded-full bg-brand-blue/10 px-4 py-1.5 text-xs font-semibold text-brand-blue border border-brand-blue/20">
                Thiruvananthapuram's Premium Outlet
            </span>
            <h1 class="text-5xl sm:text-7xl font-extrabold tracking-tight text-white leading-tight">
                Find Your Perfect <br>
                <span class="gradient-text">iPhone.</span>
            </h1>
            <p class="text-neutral-400 text-lg sm:text-xl max-w-xl font-normal leading-relaxed">
                Verified Pre-Owned Devices Across 10 Stores. Inspect battery health, physical condition, and real-time retail stock availability instantly.
            </p>
            <div class="flex flex-wrap gap-4 pt-2">
                <a href="#models" class="rounded-full bg-brand-blue px-6 py-3.5 text-sm font-semibold text-white shadow-lg hover:bg-brand-blue-hover hover:shadow-[0_4px_20px_rgba(0,113,227,0.4)] hover:scale-105 active:scale-98 transition duration-300">
                    Browse Models
                </a>
                <a href="#deals" class="rounded-full bg-white/10 border border-white/10 px-6 py-3.5 text-sm font-semibold text-white backdrop-blur-md hover:bg-white hover:text-black hover:scale-105 active:scale-98 transition duration-300">
                    Latest Deals
                </a>
            </div>
            
            <!-- Statistics Counters (Feature 3) -->
            <div id="stats-section" class="grid grid-cols-4 gap-4 pt-10 border-t border-white/5">
                <div class="space-y-1">
                    <div class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                        <span id="stat-stores">0</span>
                    </div>
                    <div class="text-[10px] sm:text-xs text-neutral-500 font-bold uppercase tracking-wider">Stores</div>
                </div>
                <div class="space-y-1">
                    <div class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                        <span id="stat-devices">0</span>+
                    </div>
                    <div class="text-[10px] sm:text-xs text-neutral-500 font-bold uppercase tracking-wider">Devices</div>
                </div>
                <div class="space-y-1">
                    <div class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                        <span id="stat-customers">0</span>+
                    </div>
                    <div class="text-[10px] sm:text-xs text-neutral-500 font-bold uppercase tracking-wider">Customers</div>
                </div>
                <div class="space-y-1">
                    <div class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                        <span id="stat-battery">0</span>%
                    </div>
                    <div class="text-[10px] sm:text-xs text-neutral-500 font-bold uppercase tracking-wider">Min Battery</div>
                </div>
            </div>
        </div>

        <!-- Floating Hero iPhone Graphic (Feature 2) -->
        <div class="lg:col-span-5 flex justify-center lg:justify-end relative" data-aos="fade-left" data-aos-delay="200">
            <!-- 3D Tilt Card Container -->
            <div 
                class="relative w-72 sm:w-80 h-[500px] rounded-[48px] bg-neutral-900/30 border border-white/10 p-3 shadow-2xl overflow-hidden cursor-grab active:cursor-grabbing"
                data-tilt
                data-tilt-max="15"
                data-tilt-speed="400"
                data-tilt-glare="true"
                data-tilt-max-glare="0.4"
            >
                <!-- Outer Reflection layer -->
                <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/5 to-transparent z-10 pointer-events-none"></div>
                
                <div class="w-full h-full rounded-[38px] bg-gradient-to-b from-[#161617] to-black p-5 flex flex-col justify-between relative overflow-hidden border border-white/5">
                    <!-- Dynamic Island Mock -->
                    <div class="absolute top-4 left-1/2 -translate-x-1/2 w-28 h-7 bg-black rounded-full z-20 flex items-center justify-end px-3">
                        <div class="w-3 h-3 bg-neutral-900 rounded-full border border-neutral-800"></div>
                    </div>
                    
                    <!-- Top Section -->
                    <div class="mt-8 text-center space-y-1 z-10">
                        <div class="text-[10px] uppercase font-bold tracking-widest text-brand-blue">iPhone Vault</div>
                        <div class="text-sm font-extrabold text-white tracking-tight">Thiruvananthapuram</div>
                    </div>

                    <!-- Visual mockup image floating -->
                    <div class="my-auto relative flex items-center justify-center h-64 overflow-hidden rounded-3xl bg-neutral-950/40 p-4 border border-white/5">
                        <img 
                            src="https://images.unsplash.com/photo-1727375053069-42b781615d8f?w=600&q=80" 
                            alt="Floating Hero iPhone"
                            class="max-h-full object-contain drop-shadow-[0_15px_30px_rgba(0,113,227,0.3)] animate-float"
                        >
                    </div>

                    <!-- Card footer details -->
                    <div class="text-center space-y-1.5 z-10">
                        <div class="text-[10px] text-neutral-500 font-semibold uppercase tracking-wider">Premium Standard Certification</div>
                        <div class="flex justify-center space-x-2 text-xs text-brand-blue font-bold">
                            <span>★ IMEI Verified</span>
                            <span>•</span>
                            <span>★ Tested Battery</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trust Indicators (Feature 7) -->
    <section class="relative z-10 border-t border-white/5 bg-neutral-950/40 py-16">
        <div class="mx-auto max-w-7xl px-6 grid grid-cols-2 md:grid-cols-5 gap-8">
            <!-- IMEI Verified -->
            <div class="text-center space-y-3 group" data-aos="fade-up" data-aos-delay="0">
                <div class="w-12 h-12 rounded-2xl bg-white/5 mx-auto flex items-center justify-center text-brand-blue border border-white/5 group-hover:border-brand-blue group-hover:shadow-[0_0_15px_rgba(0,113,227,0.3)] group-hover:scale-110 transition duration-300">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h3 class="text-xs font-bold text-white uppercase tracking-wider">IMEI Verified</h3>
                <p class="text-[10px] text-neutral-500">100% genuine registry</p>
            </div>
            <!-- Battery Tested -->
            <div class="text-center space-y-3 group" data-aos="fade-up" data-aos-delay="50">
                <div class="w-12 h-12 rounded-2xl bg-white/5 mx-auto flex items-center justify-center text-brand-blue border border-white/5 group-hover:border-brand-blue group-hover:shadow-[0_0_15px_rgba(0,113,227,0.3)] group-hover:scale-110 transition duration-300">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xs font-bold text-white uppercase tracking-wider">Battery Tested</h3>
                <p class="text-[10px] text-neutral-500">Diagnostics verified</p>
            </div>
            <!-- Warranty Available -->
            <div class="text-center space-y-3 group" data-aos="fade-up" data-aos-delay="100">
                <div class="w-12 h-12 rounded-2xl bg-white/5 mx-auto flex items-center justify-center text-brand-blue border border-white/5 group-hover:border-brand-blue group-hover:shadow-[0_0_15px_rgba(0,113,227,0.3)] group-hover:scale-110 transition duration-300">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xs font-bold text-white uppercase tracking-wider">Store Warranty</h3>
                <p class="text-[10px] text-neutral-500">30-day coverage standard</p>
            </div>
            <!-- Genuine Parts -->
            <div class="text-center space-y-3 group" data-aos="fade-up" data-aos-delay="150">
                <div class="w-12 h-12 rounded-2xl bg-white/5 mx-auto flex items-center justify-center text-brand-blue border border-white/5 group-hover:border-brand-blue group-hover:shadow-[0_0_15px_rgba(0,113,227,0.3)] group-hover:scale-110 transition duration-300">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                    </svg>
                </div>
                <h3 class="text-xs font-bold text-white uppercase tracking-wider">Genuine Parts</h3>
                <p class="text-[10px] text-neutral-500">No cheap components</p>
            </div>
            <!-- Secure Purchase -->
            <div class="text-center space-y-3 group md:col-span-1 col-span-2" data-aos="fade-up" data-aos-delay="200">
                <div class="w-12 h-12 rounded-2xl bg-white/5 mx-auto flex items-center justify-center text-brand-blue border border-white/5 group-hover:border-brand-blue group-hover:shadow-[0_0_15px_rgba(0,113,227,0.3)] group-hover:scale-110 transition duration-300">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <h3 class="text-xs font-bold text-white uppercase tracking-wider">Secure Purchase</h3>
                <p class="text-[10px] text-neutral-500">Pay in store post verification</p>
            </div>
        </div>
    </section>

    <!-- Swiper Model Carousel Section (Feature 4) -->
    <section id="models" class="relative z-10 border-t border-white/5 bg-black py-24">
        <div class="mx-auto max-w-7xl px-6">
            <div class="text-center space-y-4 mb-12" data-aos="fade-up">
                <span class="text-xs uppercase tracking-widest text-brand-blue font-bold">Catalogue</span>
                <h2 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight">
                    Browse by iPhone Generation
                </h2>
                <p class="text-neutral-400 max-w-xl mx-auto text-sm sm:text-base">
                    Swipe through the catalog. Select a generation to explore live, verified retail stocks.
                </p>
            </div>

            <!-- Swiper Carousel (Coverflow, Scale, Blur effect) -->
            <div class="swiper models-swiper py-12" data-aos="zoom-in">
                <div class="swiper-wrapper">
                    @foreach($models as $model)
                        <div class="swiper-slide w-80 sm:w-96 p-4">
                            <a 
                                href="{{ route('model.show', $model->id) }}" 
                                class="block bg-neutral-900/60 border border-white/5 rounded-3xl p-6 relative overflow-hidden group hover:border-brand-blue hover:shadow-[0_8px_30px_rgba(0,113,227,0.2)] transition-all duration-300"
                            >
                                <div class="flex justify-between items-start mb-6">
                                    <div>
                                        <h3 class="text-xl font-bold text-white tracking-tight group-hover:text-brand-blue transition duration-200">
                                            {{ $model->name }}
                                        </h3>
                                        <div class="text-xs mt-1">
                                            @if($model->stock > 0)
                                                <span class="text-green-400 font-semibold">{{ $model->stock }} units in stock</span>
                                            @else
                                                <span class="text-red-500">Out of stock</span>
                                            @endif
                                        </div>
                                    </div>
                                    <span class="text-xs bg-white/5 border border-white/5 rounded-full px-3 py-1.5 text-neutral-400 font-semibold group-hover:bg-brand-blue group-hover:text-white transition duration-300">
                                        View All
                                    </span>
                                </div>

                                <div class="relative my-4 flex items-center justify-center h-48 overflow-hidden rounded-2xl bg-neutral-950/50 border border-white/5 p-6">
                                    <img 
                                        src="{{ $model->image }}" 
                                        alt="{{ $model->name }}" 
                                        class="max-h-full object-contain group-hover:scale-105 transition duration-500"
                                        loading="lazy"
                                        onerror="this.src='https://images.unsplash.com/photo-1616348436168-de43ad0db179?w=600&q=80'"
                                    >
                                </div>

                                <div class="mt-4 border-t border-white/5 pt-4 flex justify-between items-baseline">
                                    <span class="text-xs text-neutral-500 font-medium">Starting from</span>
                                    <span class="text-xl font-black text-white">₹{{ number_format($model->starting_price) }}</span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <!-- Pagination -->
                <div class="swiper-pagination mt-8 relative z-20"></div>
            </div>
        </div>
    </section>

    <!-- Latest Arrivals Marquee (Feature 5) -->
    <section class="relative z-10 border-t border-white/5 bg-[#050505] py-20 overflow-hidden">
        <div class="text-center space-y-4 mb-12 px-6" data-aos="fade-up">
            <span class="text-xs uppercase tracking-widest text-brand-blue font-bold font-mono">Live Feeds</span>
            <h2 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight">Latest Arrivals</h2>
            <p class="text-neutral-400 max-w-xl mx-auto text-sm">Real-time updates of devices arriving in our retail stores today.</p>
        </div>

        <div class="marquee-container py-6">
            <div class="marquee-content gap-8">
                <!-- Double the list for seamless continuous horizontal loop -->
                @foreach($latestArrivals->concat($latestArrivals) as $phone)
                    <a 
                        href="{{ route('phone.show', $phone->id) }}" 
                        class="block w-80 shrink-0 bg-neutral-900/60 border border-white/5 rounded-3xl p-5 hover:-translate-y-2 hover:border-brand-blue hover:shadow-[0_8px_30px_rgba(0,113,227,0.2)] transition-all duration-300"
                    >
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-[9px] font-bold uppercase px-2 py-0.5 rounded bg-brand-blue/15 text-brand-blue tracking-wider">
                                {{ $phone->storage }}
                            </span>
                            <span class="text-[9px] font-bold px-2 py-0.5 rounded-full bg-green-500/10 text-green-400 border border-green-500/20">
                                BH {{ $phone->battery_health }}%
                            </span>
                        </div>
                        <div class="h-32 flex items-center justify-center bg-neutral-950/40 rounded-xl p-3 border border-white/5">
                            <img 
                                src="{{ $phone->images->first()->image ?? $phone->model->image }}" 
                                alt="{{ $phone->model->name }}"
                                class="max-h-full object-contain"
                                onerror="this.src='https://images.unsplash.com/photo-1616348436168-de43ad0db179?w=600&q=80'"
                            >
                        </div>
                        <div class="mt-4 text-left space-y-1">
                            <h4 class="text-sm font-bold text-white tracking-tight">{{ $phone->model->name }}</h4>
                            <div class="flex justify-between items-center text-xs">
                                <span class="text-neutral-500 font-semibold truncate max-w-[120px]">{{ str_replace('iPhone Vault - ', '', $phone->shop->name) }}</span>
                                <span class="text-sm font-black text-white">₹{{ number_format($phone->price) }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Deal of the Day Section (Feature 6) -->
    @if($dealPhone)
    <section id="deals" class="relative z-10 border-t border-white/5 bg-black py-24">
        <div class="mx-auto max-w-7xl px-6">
            <div class="glass-panel border border-white/10 rounded-[40px] p-8 md:p-12 relative overflow-hidden bg-gradient-to-br from-neutral-950 via-neutral-900 to-brand-blue/10">
                <!-- Glowing corner -->
                <div class="absolute -bottom-24 -right-24 w-80 h-80 bg-brand-blue/20 rounded-full blur-3xl pointer-events-none"></div>

                <div class="grid md:grid-cols-12 gap-8 items-center relative z-10">
                    <!-- Text / Countdown -->
                    <div class="md:col-span-7 space-y-6 text-left" data-aos="fade-right">
                        <span class="inline-flex items-center rounded-full bg-red-500/10 border border-red-500/20 px-3 py-1 text-xs font-bold text-red-400 animate-pulse">
                            🔥 Deal of the Day
                        </span>
                        
                        <h2 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight">
                            {{ $dealPhone->model->name }}
                        </h2>
                        
                        <p class="text-sm text-neutral-400 max-w-md">
                            Excellent condition pre-owned unit. Pick up directly at our {{ str_replace('iPhone Vault - ', '', $dealPhone->shop->name) }} store. Expires in:
                        </p>

                        <!-- Countdown Timer Display -->
                        <div class="flex space-x-4">
                            <div class="bg-white/5 border border-white/5 rounded-2xl px-5 py-3 text-center">
                                <span id="deal-timer" class="text-3xl font-black text-brand-blue tracking-widest font-mono">00:00:00</span>
                            </div>
                        </div>

                        <!-- Price summary -->
                        <div class="flex items-baseline space-x-4 pt-2">
                            <span class="text-3xl font-black text-white">₹{{ number_format($dealPhone->price) }}</span>
                            <span class="text-sm text-neutral-500 line-through">₹{{ number_format(round($dealPhone->price * 1.15 / 500) * 500) }}</span>
                            <span class="text-xs text-green-400 font-bold bg-green-500/10 border border-green-500/20 rounded-md px-2 py-0.5">Save 15%</span>
                        </div>

                        <div class="pt-4">
                            <a 
                                href="{{ route('phone.show', $dealPhone->id) }}" 
                                class="inline-block rounded-full bg-brand-blue px-6 py-3 text-sm font-semibold text-white hover:bg-brand-blue-hover transition duration-300"
                            >
                                Claim Offer Now
                            </a>
                        </div>
                    </div>

                    <!-- Visual image -->
                    <div class="md:col-span-5 flex justify-center" data-aos="fade-left">
                        <div class="relative w-64 h-64 flex items-center justify-center bg-neutral-950/40 rounded-3xl p-6 border border-white/5">
                            <img 
                                src="{{ $dealPhone->images->first()->image ?? $dealPhone->model->image }}" 
                                alt="Deal of the day iPhone" 
                                class="max-h-full object-contain drop-shadow-[0_10px_25px_rgba(0,113,227,0.25)] hover:scale-105 transition duration-300"
                                onerror="this.src='https://images.unsplash.com/photo-1616348436168-de43ad0db179?w=600&q=80'"
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Interactive Store Locator Section (Feature 8) -->
    <section id="stores" class="relative z-10 border-t border-white/5 bg-[#050505] py-24">
        <div class="mx-auto max-w-7xl px-6">
            <div class="text-center space-y-4 mb-16" data-aos="fade-up">
                <span class="text-xs uppercase tracking-widest text-brand-blue font-bold">Outlets</span>
                <h2 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight">Our Retail Network</h2>
                <p class="text-neutral-400 max-w-xl mx-auto text-sm sm:text-base">Find address details and check active pre-owned stock counts in 10 outlets across the city.</p>
            </div>

            <!-- Store Locator interactive layout -->
            <div class="grid lg:grid-cols-12 gap-8 items-stretch" x-data="{ activeShopId: {{ $shops->first()->id ?? 1 }} }">
                
                <!-- Left panel: list of stores -->
                <div class="lg:col-span-5 space-y-4 overflow-y-auto max-h-[500px] pr-2 scrollbar-thin scrollbar-thumb-neutral-800" data-aos="fade-right">
                    @foreach($shops as $shop)
                        <button 
                            @click="activeShopId = {{ $shop->id }}" 
                            class="w-full text-left glass-panel border rounded-3xl p-5 block transition-all duration-300"
                            :class="activeShopId === {{ $shop->id }} ? 'border-brand-blue bg-white/5 shadow-[0_0_15px_rgba(0,113,227,0.1)]' : 'border-white/5 hover:border-white/10'"
                        >
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center space-x-2">
                                    <div class="w-2 h-2 rounded-full bg-green-400 shadow-[0_0_6px_rgba(74,222,128,0.5)]"></div>
                                    <h3 class="text-sm font-bold text-white tracking-tight">{{ $shop->name }}</h3>
                                </div>
                                <span class="text-[10px] font-bold bg-brand-blue/15 text-brand-blue px-2 py-0.5 rounded-full border border-brand-blue/10">
                                    {{ $shop->phones_count }} available
                                </span>
                            </div>
                            <p class="text-xs text-neutral-400 line-clamp-2 leading-relaxed">
                                {{ $shop->address }}
                            </p>
                        </button>
                    @endforeach
                </div>

                <!-- Right panel: Interactive map placeholder -->
                <div class="lg:col-span-7 glass-panel border border-white/5 rounded-3xl p-6 flex flex-col justify-between" data-aos="fade-left">
                    <div class="flex-grow flex flex-col items-center justify-center min-h-[300px] relative bg-neutral-950/40 rounded-2xl border border-white/5 overflow-hidden">
                        
                        <!-- Map abstract drawing with pulsing pins -->
                        <div class="absolute inset-0 opacity-10 flex items-center justify-center">
                            <!-- SVG Abstract grid map -->
                            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                                <path d="M10,20 Q30,40 50,20 T90,20 M20,50 Q40,30 60,70 T100,50 M0,80 Q20,90 50,70 T90,90" stroke="white" stroke-width="0.5" fill="none"/>
                                <path d="M30,0 Q50,40 20,80 M70,0 Q80,50 60,100" stroke="white" stroke-width="0.5" fill="none"/>
                            </svg>
                        </div>

                        <!-- Pins -->
                        @foreach($shops as $shop)
                            <!-- Absolute positions based on index to distribute pins -->
                            @php
                                $x = 10 + ($loop->index * 8.5) % 80;
                                $y = 20 + ($loop->index * 7.5) % 65;
                            @endphp
                            <div 
                                class="absolute cursor-pointer transition-transform duration-300"
                                style="left: {{ $x }}%; top: {{ $y }}%;"
                                @click="activeShopId = {{ $shop->id }}"
                                :class="activeShopId === {{ $shop->id }} ? 'scale-125 z-20' : 'scale-100 z-10'"
                            >
                                <div class="relative flex items-center justify-center">
                                    <div 
                                        class="w-3 h-3 rounded-full border transition-all duration-300"
                                        :class="activeShopId === {{ $shop->id }} ? 'bg-brand-blue border-white shadow-[0_0_12px_#0071e3]' : 'bg-neutral-600 border-neutral-800'"
                                    ></div>
                                    <div 
                                        class="absolute w-8 h-8 rounded-full border border-brand-blue/30 animate-ping pointer-events-none"
                                        x-show="activeShopId === {{ $shop->id }}"
                                    ></div>
                                </div>
                            </div>
                        @endforeach

                        <div class="absolute bottom-4 left-4 z-10 text-left bg-black/80 backdrop-blur-sm rounded-xl p-3 border border-white/10 text-xs">
                            <span class="text-neutral-500 font-semibold font-mono">MAP VIEW</span>
                            <div class="text-white font-bold">Thiruvananthapuram Retail Network</div>
                        </div>
                    </div>

                    <!-- Selected store details footer -->
                    @foreach($shops as $shop)
                        <div x-show="activeShopId === {{ $shop->id }}" x-transition.opacity.duration.300ms class="mt-6 text-left space-y-4 pt-4 border-t border-white/5">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                                <div class="space-y-1">
                                    <h4 class="text-base font-bold text-white">{{ $shop->name }}</h4>
                                    <p class="text-xs text-neutral-400">{{ $shop->address }}</p>
                                </div>
                                <div class="flex gap-2 shrink-0">
                                    <a 
                                        href="{{ $shop->location }}" 
                                        target="_blank" 
                                        class="rounded-xl bg-white/5 border border-white/10 px-4 py-2.5 text-xs font-semibold text-white hover:bg-white hover:text-black transition duration-200"
                                    >
                                        Get Directions
                                    </a>
                                    <a 
                                        href="tel:{{ str_replace(' ', '', $shop->phone) }}" 
                                        class="rounded-xl bg-brand-blue/10 border border-brand-blue/20 px-4 py-2.5 text-xs font-semibold text-brand-blue hover:bg-brand-blue hover:text-white transition duration-200"
                                    >
                                        Call Store
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section (Feature 9) -->
    <section class="relative z-10 border-t border-white/5 bg-black py-24">
        <div class="mx-auto max-w-7xl px-6">
            <div class="text-center space-y-4 mb-16" data-aos="fade-up">
                <span class="text-xs uppercase tracking-widest text-brand-blue font-bold font-mono">Reviews</span>
                <h2 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight">What Customers Say</h2>
                <p class="text-neutral-400 max-w-xl mx-auto text-sm sm:text-base">Read authenticated experiences from pre-owned iPhone buyers in Thiruvananthapuram.</p>
            </div>

            <!-- Swiper Testimonials Carousel -->
            <div class="swiper testimonials-swiper py-6" data-aos="fade-up">
                <div class="swiper-wrapper">
                    <!-- Review 1 -->
                    <div class="swiper-slide w-80 sm:w-96 p-4">
                        <div class="bg-neutral-900/60 border border-white/5 rounded-3xl p-6 text-left space-y-4 relative overflow-hidden h-64 flex flex-col justify-between">
                            <div class="space-y-2">
                                <div class="flex text-yellow-500 space-x-0.5 text-xs">
                                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                </div>
                                <p class="text-xs sm:text-sm text-neutral-300 leading-relaxed italic">
                                    "Extremely satisfied with my iPhone 14 Pro. The battery health was exactly 91% as shown on the website, and the purchase experience at the Technopark outlet was transparent."
                                </p>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 rounded-full bg-neutral-800 flex items-center justify-center text-xs font-bold text-brand-blue">
                                    AM
                                </div>
                                <div class="text-xs">
                                    <div class="font-bold text-white">Ananthu Mohanan</div>
                                    <div class="text-neutral-500">Software Engineer, Trivandrum</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Review 2 -->
                    <div class="swiper-slide w-80 sm:w-96 p-4">
                        <div class="bg-neutral-900/60 border border-white/5 rounded-3xl p-6 text-left space-y-4 relative overflow-hidden h-64 flex flex-col justify-between">
                            <div class="space-y-2">
                                <div class="flex text-yellow-500 space-x-0.5 text-xs">
                                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                </div>
                                <p class="text-xs sm:text-sm text-neutral-300 leading-relaxed italic">
                                    "I was skeptical about buying pre-owned, but the 40-point check and IMEI transparency at iPhone Vault won me over. Visited Kazhakkoottam branch and got a clean iPhone 13."
                                </p>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 rounded-full bg-neutral-800 flex items-center justify-center text-xs font-bold text-brand-blue">
                                    SR
                                </div>
                                <div class="text-xs">
                                    <div class="font-bold text-white">Sneha Rajan</div>
                                    <div class="text-neutral-500">College Student, Varkala</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Review 3 -->
                    <div class="swiper-slide w-80 sm:w-96 p-4">
                        <div class="bg-neutral-900/60 border border-white/5 rounded-3xl p-6 text-left space-y-4 relative overflow-hidden h-64 flex flex-col justify-between">
                            <div class="space-y-2">
                                <div class="flex text-yellow-500 space-x-0.5 text-xs">
                                    <span>★</span><span>★</span><span>★</span><span>★</span><span>☆</span>
                                </div>
                                <p class="text-xs sm:text-sm text-neutral-300 leading-relaxed italic">
                                    "Excellent pricing and great customer care. I could compare battery health and check conditions online before walking in. Highly recommend checking their site before buying."
                                </p>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 rounded-full bg-neutral-800 flex items-center justify-center text-xs font-bold text-brand-blue">
                                    NK
                                </div>
                                <div class="text-xs">
                                    <div class="font-bold text-white">Nandu Krishnan</div>
                                    <div class="text-neutral-500">Business Owner, Pattom</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Review 4 -->
                    <div class="swiper-slide w-80 sm:w-96 p-4">
                        <div class="bg-neutral-900/60 border border-white/5 rounded-3xl p-6 text-left space-y-4 relative overflow-hidden h-64 flex flex-col justify-between">
                            <div class="space-y-2">
                                <div class="flex text-yellow-500 space-x-0.5 text-xs">
                                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                </div>
                                <p class="text-xs sm:text-sm text-neutral-300 leading-relaxed italic">
                                    "Amazing collection of titanium models. Got an iPhone 15 Pro Max at East Fort store. The color titanium is stunning and condition was practically brand new. 5 stars."
                                </p>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 rounded-full bg-neutral-800 flex items-center justify-center text-xs font-bold text-brand-blue">
                                    DJ
                                </div>
                                <div class="text-xs">
                                    <div class="font-bold text-white">Deepak Joseph</div>
                                    <div class="text-neutral-500">Designer, Kowdiar</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pagination -->
                <div class="swiper-pagination mt-8 relative z-20"></div>
            </div>
        </div>
    </section>
</div>

<!-- Inline Initializations for Swiper and CountUp (Features 3, 4, 9) -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Swiper for Models Carousel (Feature 4)
        if (typeof Swiper !== 'undefined') {
            new Swiper('.models-swiper', {
                modules: [window.SwiperModules.EffectCoverflow, window.SwiperModules.Autoplay, window.SwiperModules.Pagination],
                effect: 'coverflow',
                grabCursor: true,
                centeredSlides: true,
                slidesPerView: 'auto',
                coverflowEffect: {
                    rotate: 15,
                    stretch: 0,
                    depth: 80,
                    modifier: 1,
                    slideShadows: false,
                },
                autoplay: {
                    delay: 3500,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });

            // Initialize Swiper for Testimonials Slider (Feature 9)
            new Swiper('.testimonials-swiper', {
                modules: [window.SwiperModules.Autoplay, window.SwiperModules.Pagination],
                grabCursor: true,
                centeredSlides: false,
                slidesPerView: 'auto',
                spaceBetween: 20,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });
        }

        // Initialize CountUp Stats (Feature 3)
        // Wait until loader finishes, then trigger
        setTimeout(() => {
            const options = {
                duration: 2.5,
                useEasing: true,
                useGrouping: true,
            };

            const countUpStores = new CountUp('stat-stores', {{ $storesCount }}, options);
            const countUpDevices = new CountUp('stat-devices', {{ $devicesCount }}, options);
            const countUpCustomers = new CountUp('stat-customers', {{ $happyCustomers }}, options);
            const countUpBattery = new CountUp('stat-battery', 95, options); // Static min battery health index

            // Setup intersection observer to trigger counters when visible
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        countUpStores.start();
                        countUpDevices.start();
                        countUpCustomers.start();
                        countUpBattery.start();
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 });

            const statsSection = document.getElementById('stats-section');
            if (statsSection) {
                observer.observe(statsSection);
            }
        }, 1500);

        // Start Countdown Timer (Feature 6)
        startCountdown();

        function startCountdown() {
            const now = new Date();
            const midnight = new Date(now.getFullYear(), now.getMonth(), now.getDate() + 1, 0, 0, 0);
            let diff = Math.floor((midnight - now) / 1000);
            
            const timerEl = document.getElementById('deal-timer');
            if (!timerEl) return;

            function update() {
                if (diff <= 0) {
                    diff = 86400; // Reset
                }
                const h = Math.floor(diff / 3600).toString().padStart(2, '0');
                const m = Math.floor((diff % 3600) / 60).toString().padStart(2, '0');
                const s = (diff % 60).toString().padStart(2, '0');
                timerEl.innerText = `${h}:${m}:${s}`;
                diff--;
            }
            update();
            setInterval(update, 1000);
        }
    });
</script>
@endsection
