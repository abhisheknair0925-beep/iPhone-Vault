@extends('layouts.app')

@section('title', $phone->model->name . ' (' . $phone->color . ', ' . $phone->storage . ') | iPhone Vault')

@section('content')
<div class="relative min-h-screen py-12 bg-black text-white">
    <!-- Glow Orb -->
    <div class="glow-orb glow-blue" style="top: 20%"></div>

    <div class="relative z-10 mx-auto max-w-7xl px-6">
        
        <!-- Breadcrumb Navigation -->
        <nav class="flex items-center space-x-2 text-xs text-neutral-500 font-semibold uppercase tracking-wider mb-8" data-aos="fade-down">
            <a href="{{ route('home') }}" class="hover:text-white transition">Home</a>
            <span>/</span>
            <a href="{{ route('model.show', $phone->model->id) }}" class="hover:text-white transition font-bold">Models</a>
            <span>/</span>
            <span class="text-neutral-300">{{ $phone->model->name }}</span>
            <span>/</span>
            <span class="text-white">Unit #{{ $phone->id }}</span>
        </nav>

        <!-- Product Block -->
        <div class="grid lg:grid-cols-12 gap-12 items-start" x-data="{ 
            activeImage: '{{ $phone->images->first()->image ?? $phone->model->image }}',
            activeColor: '{{ $phone->color }}',
            images: [
                @foreach($phone->images as $img)
                    '{{ $img->image }}',
                @endforeach
                'https://images.unsplash.com/photo-1510557880182-3d4d3cba35a5?w=600&q=80',
                'https://images.unsplash.com/photo-1616348436168-de43ad0db179?w=600&q=80'
            ],
            colorMap: {
                'Natural Titanium': 'https://images.unsplash.com/photo-1695048130838-89cde99435b0?w=600&q=80',
                'Blue Titanium': 'https://images.unsplash.com/photo-1695048133142-1a20484d2569?w=600&q=80',
                'White Titanium': 'https://images.unsplash.com/photo-1727375053069-42b781615d8f?w=600&q=80',
                'Black Titanium': 'https://images.unsplash.com/photo-1611791461233-a9330987b8f0?w=600&q=80'
            },
            lightboxOpen: false,
            selectColor(colorName) {
                this.activeColor = colorName;
                if (this.colorMap[colorName]) {
                    this.activeImage = this.colorMap[colorName];
                }
            }
        }">
            
            <!-- Left Column: Image Gallery & Lightbox (Feature 14) -->
            <div class="lg:col-span-5 space-y-6" data-aos="fade-right">
                <!-- Main Preview Box (Trigger Lightbox on click) -->
                <div 
                    @click="lightboxOpen = true" 
                    class="relative cursor-zoom-in aspect-square rounded-[36px] bg-neutral-900/40 border border-white/5 p-8 flex items-center justify-center overflow-hidden hover:border-brand-blue/30 transition duration-300 group"
                >
                    <!-- Pulse Available Badge (Feature 13) -->
                    <div class="absolute top-4 left-4 z-10 flex items-center space-x-1.5 rounded-full bg-green-500/10 border border-green-500/20 px-3 py-1 text-xs font-bold text-green-400">
                        <span class="h-2 w-2 rounded-full bg-green-400 shadow-[0_0_8px_rgba(74,222,128,0.8)] animate-pulse"></span>
                        <span>Available Now</span>
                    </div>

                    <!-- Main Image tag -->
                    <img 
                        :src="activeImage" 
                        alt="{{ $phone->model->name }}" 
                        class="max-h-full max-w-full object-contain transition-transform duration-500 group-hover:scale-102"
                        id="main-phone-img"
                        onerror="this.src='https://images.unsplash.com/photo-1616348436168-de43ad0db179?w=600&q=80'"
                    >
                    
                    <!-- Zoom indicator overlay -->
                    <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 flex items-center justify-center transition duration-300">
                        <span class="rounded-full bg-black/60 p-3 text-white">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7" />
                            </svg>
                        </span>
                    </div>
                </div>

                <!-- Thumbnails Row -->
                <div class="flex gap-4 overflow-x-auto pb-2 scrollbar-none">
                    <template x-for="(image, index) in images" :key="index">
                        <button 
                            @click="activeImage = image" 
                            class="w-20 h-20 rounded-2xl bg-neutral-900/50 border overflow-hidden p-2 shrink-0 transition duration-300"
                            :class="activeImage === image ? 'border-brand-blue ring-1 ring-brand-blue' : 'border-white/5 hover:border-white/20'"
                        >
                            <img :src="image" alt="Thumbnail" class="w-full h-full object-contain" onerror="this.src='https://images.unsplash.com/photo-1616348436168-de43ad0db179?w=600&q=80'">
                        </button>
                    </template>
                </div>

                <!-- Lightbox Preview Modal (Feature 14) -->
                <div 
                    x-show="lightboxOpen" 
                    class="fixed inset-0 z-50 flex items-center justify-center bg-black/95 p-4 backdrop-blur-md" 
                    @click="lightboxOpen = false" 
                    x-transition.opacity
                >
                    <button class="absolute top-6 right-6 text-white text-3xl font-bold transition hover:scale-110">&times;</button>
                    <img :src="activeImage" class="max-h-[90vh] max-w-[90vw] object-contain transition-all duration-300" @click.stop>
                </div>
            </div>

            <!-- Right Column: Specs & Checkout Details -->
            <div class="lg:col-span-7 space-y-8 text-left" data-aos="fade-left">
                
                <!-- Main Header details -->
                <div class="space-y-4 border-b border-white/5 pb-6">
                    <div class="flex flex-wrap items-center gap-3">
                        <span class="rounded-full bg-brand-blue/10 border border-brand-blue/20 px-3.5 py-1 text-xs font-bold text-brand-blue">
                            {{ $phone->storage }}
                        </span>
                        <span class="rounded-full bg-white/5 border border-white/10 px-3.5 py-1 text-xs font-bold text-neutral-300" x-text="activeColor">
                            {{ $phone->color }}
                        </span>
                        <!-- Global Wishlist Button -->
                        <button 
                            @click.prevent="$store.wishlist.toggle({{ $phone->id }})" 
                            class="rounded-full bg-white/5 border border-white/10 px-3.5 py-1 text-xs font-bold text-neutral-400 hover:text-red-500 transition flex items-center space-x-1.5 active:scale-95"
                        >
                            <svg class="h-3.5 w-3.5" :class="$store.wishlist.has({{ $phone->id }}) ? 'fill-red-500 stroke-red-500' : 'fill-none stroke-current'" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                            <span x-text="$store.wishlist.has({{ $phone->id }}) ? 'Wishlisted' : 'Add to Wishlist'"></span>
                        </button>
                    </div>

                    <h1 class="text-4xl font-extrabold text-white tracking-tight">
                        {{ $phone->model->name }}
                    </h1>
                    
                    <!-- Price and WhatsApp Checkout -->
                    <div class="flex items-baseline justify-between gap-4 flex-wrap pt-2">
                        <div class="space-y-1">
                            <span class="text-4xl font-black text-white">₹{{ number_format($phone->price) }}</span>
                            <div class="text-[10px] text-neutral-500 font-bold uppercase">All Inclusive Store Price</div>
                        </div>
                        
                        <a 
                            href="https://wa.me/919876543210?text=Hi,%20I'm%20interested%20in%20buying%20the%20pre-owned%20{{ urlencode($phone->model->name) }}%20({{ urlencode($phone->storage) }}%20-%20{{ urlencode($phone->color) }})%20priced%20at%20Rs.%20{{ number_format($phone->price) }}%20available%20at%20your%20{{ urlencode($phone->shop->name) }}%20store."
                            target="_blank"
                            class="inline-flex items-center space-x-2 rounded-full bg-[#25d366] hover:bg-[#20ba5a] text-black font-extrabold px-6 py-3.5 text-sm transition hover:scale-105 hover:shadow-[0_4px_20px_rgba(37,211,102,0.4)] active:scale-98"
                        >
                            <span>Inquire on WhatsApp</span>
                        </a>
                    </div>
                </div>

                <!-- Color Finish Picker (Feature 15 Color Switcher) -->
                <div class="space-y-3">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-neutral-500">Select Color Finish</h3>
                    <div class="flex space-x-4">
                        <!-- Natural Titanium -->
                        <button 
                            @click="selectColor('Natural Titanium')" 
                            class="w-10 h-10 rounded-full bg-[#a29e95] border-2 transition duration-300 hover:scale-110 relative group"
                            :class="activeColor === 'Natural Titanium' ? 'border-brand-blue ring-1 ring-brand-blue' : 'border-transparent'"
                        >
                            <span class="absolute bottom-full left-1/2 -translate-x-1/2 mb-1.5 hidden group-hover:block bg-neutral-900 border border-white/5 rounded text-[8px] font-bold px-1 py-0.5 text-white whitespace-nowrap">Natural Titanium</span>
                        </button>
                        <!-- Blue Titanium -->
                        <button 
                            @click="selectColor('Blue Titanium')" 
                            class="w-10 h-10 rounded-full bg-[#2f4452] border-2 transition duration-300 hover:scale-110 relative group"
                            :class="activeColor === 'Blue Titanium' ? 'border-brand-blue ring-1 ring-brand-blue' : 'border-transparent'"
                        >
                            <span class="absolute bottom-full left-1/2 -translate-x-1/2 mb-1.5 hidden group-hover:block bg-neutral-900 border border-white/5 rounded text-[8px] font-bold px-1 py-0.5 text-white whitespace-nowrap">Blue Titanium</span>
                        </button>
                        <!-- White Titanium -->
                        <button 
                            @click="selectColor('White Titanium')" 
                            class="w-10 h-10 rounded-full bg-[#f2f1ed] border-2 transition duration-300 hover:scale-110 relative group"
                            :class="activeColor === 'White Titanium' ? 'border-brand-blue ring-1 ring-brand-blue' : 'border-transparent'"
                        >
                            <span class="absolute bottom-full left-1/2 -translate-x-1/2 mb-1.5 hidden group-hover:block bg-neutral-900 border border-white/5 rounded text-[8px] font-bold px-1 py-0.5 text-white whitespace-nowrap">White Titanium</span>
                        </button>
                        <!-- Black Titanium -->
                        <button 
                            @click="selectColor('Black Titanium')" 
                            class="w-10 h-10 rounded-full bg-[#232426] border-2 transition duration-300 hover:scale-110 relative group"
                            :class="activeColor === 'Black Titanium' ? 'border-brand-blue ring-1 ring-brand-blue' : 'border-transparent'"
                        >
                            <span class="absolute bottom-full left-1/2 -translate-x-1/2 mb-1.5 hidden group-hover:block bg-neutral-900 border border-white/5 rounded text-[8px] font-bold px-1 py-0.5 text-white whitespace-nowrap">Black Titanium</span>
                        </button>
                    </div>
                </div>

                <!-- Animated Quality Metrics Grid (Battery Meter Feature 16 & Grade Feature 17) -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 pt-4">
                    <!-- Circular Battery Progress (Feature 16) -->
                    <div 
                        class="bg-neutral-900/60 border border-white/5 rounded-3xl p-6 flex flex-col items-center justify-center text-center space-y-4"
                        x-data="{ 
                            percent: 0,
                            init() {
                                setTimeout(() => {
                                    this.percent = {{ $phone->battery_health }};
                                }, 300);
                            }
                        }"
                    >
                        <h3 class="text-[10px] font-bold uppercase tracking-wider text-neutral-500">Battery Health</h3>
                        <div class="relative w-24 h-24 flex items-center justify-center">
                            <svg class="w-full h-full transform -rotate-90">
                                <circle cx="48" cy="48" r="40" class="circle-progress-bg"/>
                                <circle 
                                    cx="48" 
                                    cy="48" 
                                    r="40" 
                                    class="circle-progress-bar"
                                    :stroke="percent >= 90 ? '#22c55e' : (percent >= 80 ? '#f59e0b' : '#ef4444')"
                                    stroke-dasharray="251.2"
                                    :stroke-dashoffset="251.2 - (251.2 * percent / 100)"
                                />
                            </svg>
                            <span class="absolute text-base font-black text-white" x-text="percent + '%'">0%</span>
                        </div>
                        <span class="text-xs font-bold" :class="percent >= 90 ? 'text-green-400' : (percent >= 80 ? 'text-yellow-500' : 'text-red-500')" x-text="percent >= 90 ? 'Excellent' : 'Good'"></span>
                    </div>

                    <!-- Condition Grade Rating (Feature 17) -->
                    <div 
                        class="bg-neutral-900/60 border border-white/5 rounded-3xl p-6 flex flex-col items-center justify-center text-center space-y-4"
                        x-data="{ 
                            rating: 0,
                            grade: '{{ $phone->condition_grade }}',
                            init() {
                                const target = this.grade === 'Excellent' ? 5 : (this.grade === 'Very Good' ? 4 : 3);
                                setTimeout(() => this.rating = target, 400);
                            }
                        }"
                    >
                        <h3 class="text-[10px] font-bold uppercase tracking-wider text-neutral-500">Physical Grade</h3>
                        <div class="flex space-x-1 py-4">
                            <template x-for="i in 5">
                                <svg 
                                    class="h-5 w-5 transform transition-all duration-500"
                                    :class="i <= rating ? 'text-yellow-500 scale-110' : 'text-neutral-700'"
                                    fill="currentColor" 
                                    viewBox="0 0 20 20"
                                >
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            </template>
                        </div>
                        <span class="text-xs font-bold text-white" x-text="grade"></span>
                    </div>

                    <!-- Warranty Indicator -->
                    <div class="bg-neutral-900/60 border border-white/5 rounded-3xl p-6 flex flex-col items-center justify-center text-center space-y-4">
                        <h3 class="text-[10px] font-bold uppercase tracking-wider text-neutral-500">Store Warranty</h3>
                        <div class="w-12 h-12 rounded-full bg-brand-blue/10 flex items-center justify-center text-brand-blue py-4">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <span class="text-xs font-bold text-white">30 Days Cover</span>
                    </div>
                </div>

                <!-- Certified Inspection Description -->
                <div class="space-y-2">
                    <h2 class="text-xs font-bold text-white uppercase tracking-wider">Certified Inspection Notes</h2>
                    <p class="text-neutral-400 text-sm leading-relaxed">
                        {{ $phone->description }}
                    </p>
                </div>

                <!-- Hardware Specifications (Feature 18 Tech Specs) -->
                <div class="space-y-4" data-aos="fade-up">
                    <h2 class="text-xs font-bold text-white uppercase tracking-wider">Hardware Specifications</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 border border-white/5 rounded-3xl bg-neutral-950/60 p-6 text-sm">
                        @foreach($specs as $key => $value)
                            <div class="flex justify-between py-2.5 border-b border-white/5 last:border-0 sm:odd:pr-4 sm:even:pl-4">
                                <span class="text-neutral-500 font-semibold">{{ $key }}</span>
                                <span class="text-white font-bold text-right">{{ $value }}</span>
                            </div>
                        @endforeach
                        <!-- Inject storage -->
                        <div class="flex justify-between py-2.5 border-b border-white/5 last:border-0 sm:odd:pr-4 sm:even:pl-4">
                            <span class="text-neutral-500 font-semibold">Storage</span>
                            <span class="text-white font-bold text-right">{{ $phone->storage }}</span>
                        </div>
                    </div>
                </div>

                <!-- Shop Availability details with Lift (Feature 19) -->
                <div class="space-y-4" data-aos="fade-up">
                    <h2 class="text-xs font-bold text-white uppercase tracking-wider">Available at Store Outlet</h2>
                    <div class="glass-panel border border-white/5 rounded-[32px] p-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-6 hover:shadow-[0_8px_30px_rgba(0,113,227,0.15)] hover:-translate-y-1 hover:border-brand-blue/30 transition-all duration-300">
                        <div class="space-y-2 text-left">
                            <div class="flex items-center space-x-2">
                                <div class="w-2 h-2 rounded-full bg-green-400 shadow-[0_0_8px_rgba(74,222,128,0.5)]"></div>
                                <h3 class="text-base font-bold text-white tracking-tight">{{ $phone->shop->name }}</h3>
                            </div>
                            <p class="text-xs text-neutral-400 max-w-md">
                                {{ $phone->shop->address }}
                            </p>
                            <div class="flex flex-wrap gap-x-4 gap-y-1 text-xs text-neutral-500 font-semibold">
                                <span class="flex items-center">📞 {{ $phone->shop->phone }}</span>
                                <span>|</span>
                                <span class="flex items-center">⏰ 9:30 AM - 8:30 PM</span>
                            </div>
                        </div>
                        <div class="flex gap-3 w-full sm:w-auto shrink-0">
                            <a 
                                href="{{ $phone->shop->location }}" 
                                target="_blank" 
                                class="flex-grow text-center rounded-xl bg-white/5 border border-white/10 px-4 py-2.5 text-xs font-semibold text-white hover:bg-white hover:text-black transition duration-300"
                            >
                                Get Map Route
                            </a>
                            <a 
                                href="tel:{{ str_replace(' ', '', $phone->shop->phone) }}" 
                                class="flex-grow text-center rounded-xl bg-brand-blue/15 border border-brand-blue/20 px-4 py-2.5 text-xs font-semibold text-brand-blue hover:bg-brand-blue hover:text-white transition duration-300"
                            >
                                Call Store
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
