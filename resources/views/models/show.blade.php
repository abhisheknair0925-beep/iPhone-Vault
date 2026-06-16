@extends('layouts.app')

@section('title', $model->name . ' - Available Stocks | iPhone Vault')

@section('content')
<div class="relative min-h-screen py-12 bg-black text-white" x-data="{ openCompareModal: false }">
    <!-- Orbs -->
    <div class="glow-orb glow-blue" style="top: 10%"></div>

    <div class="relative z-10 mx-auto max-w-7xl px-6">
        
        <!-- Breadcrumbs & Model Header -->
        <div class="mb-10 space-y-4" data-aos="fade-down">
            <nav class="flex items-center space-x-2 text-xs text-neutral-500 font-semibold uppercase tracking-wider">
                <a href="{{ route('home') }}" class="hover:text-white transition">Home</a>
                <span>/</span>
                <span class="text-neutral-300">Models</span>
                <span>/</span>
                <span class="text-white">{{ $model->name }}</span>
            </nav>
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-4xl font-extrabold text-white tracking-tight">
                        {{ $model->name }}
                    </h1>
                    <p class="text-sm text-neutral-400 mt-1">
                        Showing all verified pre-owned stocks across our 10 city outlets.
                    </p>
                </div>
                <!-- Mini Model Meta -->
                <div class="flex items-center space-x-4 bg-white/5 border border-white/5 rounded-2xl px-4 py-2.5 shrink-0 self-start sm:self-auto">
                    <div class="text-left">
                        <div class="text-[10px] text-neutral-500 uppercase font-bold tracking-wider">Starting Price</div>
                        <div class="text-sm font-extrabold text-white">₹{{ number_format($model->starting_price) }}</div>
                    </div>
                    <div class="h-8 w-px bg-white/10"></div>
                    <div class="text-left">
                        <div class="text-[10px] text-neutral-500 uppercase font-bold tracking-wider">Total Available</div>
                        <div class="text-sm font-extrabold text-brand-blue">{{ count($phones) }} units</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Layout Grid: Sidebar Filters + Main Stock -->
        <div class="grid lg:grid-cols-12 gap-8 items-start">
            
            <!-- Premium Filter Sidebar (Feature 11) -->
            <aside class="lg:col-span-3 glass-panel border border-white/5 rounded-3xl p-6 space-y-6" data-aos="fade-right">
                <div class="flex justify-between items-center pb-4 border-b border-white/5">
                    <h2 class="text-sm font-bold text-white uppercase tracking-wider">Filter Items</h2>
                    @if(request()->anyFilled(['storage', 'condition', 'color', 'shop_id', 'max_price', 'min_battery']))
                        <a href="{{ route('model.show', $model->id) }}" class="text-xs text-brand-blue hover:text-brand-blue-hover transition font-semibold">
                            Clear All
                        </a>
                    @endif
                </div>

                <!-- Form for query filters -->
                <form action="{{ route('model.show', $model->id) }}" method="GET" class="space-y-6" id="filter-form">
                    
                    <!-- Storage Filter Accordion -->
                    <div x-data="{ open: true }" class="space-y-3 pb-4 border-b border-white/5">
                        <button type="button" @click="open = !open" class="w-full flex justify-between items-center text-xs font-bold text-neutral-400 uppercase tracking-wider">
                            <span>Storage</span>
                            <svg class="h-3 w-3 transform transition-transform" :class="open ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="open" x-transition class="space-y-2">
                            <select name="storage" onchange="this.form.submit()" class="w-full rounded-xl bg-white/5 border border-white/10 px-3 py-2.5 text-xs text-white focus:outline-none focus:border-brand-blue transition">
                                <option value="" class="bg-neutral-900">All Storages</option>
                                @foreach($availableStorages as $storage)
                                    <option value="{{ $storage }}" {{ request('storage') == $storage ? 'selected' : '' }} class="bg-neutral-900">
                                        {{ $storage }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Condition Filter Accordion -->
                    <div x-data="{ open: true }" class="space-y-3 pb-4 border-b border-white/5">
                        <button type="button" @click="open = !open" class="w-full flex justify-between items-center text-xs font-bold text-neutral-400 uppercase tracking-wider">
                            <span>Condition</span>
                            <svg class="h-3 w-3 transform transition-transform" :class="open ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="open" x-transition class="space-y-2">
                            <select name="condition" onchange="this.form.submit()" class="w-full rounded-xl bg-white/5 border border-white/10 px-3 py-2.5 text-xs text-white focus:outline-none focus:border-brand-blue transition">
                                <option value="" class="bg-neutral-900">All Conditions</option>
                                @foreach($availableConditions as $condition)
                                    <option value="{{ $condition }}" {{ request('condition') == $condition ? 'selected' : '' }} class="bg-neutral-900">
                                        {{ $condition }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Color Filter Accordion -->
                    <div x-data="{ open: true }" class="space-y-3 pb-4 border-b border-white/5">
                        <button type="button" @click="open = !open" class="w-full flex justify-between items-center text-xs font-bold text-neutral-400 uppercase tracking-wider">
                            <span>Color Finish</span>
                            <svg class="h-3 w-3 transform transition-transform" :class="open ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="open" x-transition class="space-y-2">
                            <select name="color" onchange="this.form.submit()" class="w-full rounded-xl bg-white/5 border border-white/10 px-3 py-2.5 text-xs text-white focus:outline-none focus:border-brand-blue transition">
                                <option value="" class="bg-neutral-900">All Colors</option>
                                @foreach($availableColors as $color)
                                    <option value="{{ $color }}" {{ request('color') == $color ? 'selected' : '' }} class="bg-neutral-900">
                                        {{ $color }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Shop Filter Accordion -->
                    <div x-data="{ open: true }" class="space-y-3 pb-4 border-b border-white/5">
                        <button type="button" @click="open = !open" class="w-full flex justify-between items-center text-xs font-bold text-neutral-400 uppercase tracking-wider">
                            <span>Store Location</span>
                            <svg class="h-3 w-3 transform transition-transform" :class="open ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="open" x-transition class="space-y-2">
                            <select name="shop_id" onchange="this.form.submit()" class="w-full rounded-xl bg-white/5 border border-white/10 px-3 py-2.5 text-xs text-white focus:outline-none focus:border-brand-blue transition">
                                <option value="" class="bg-neutral-900">All Stores</option>
                                @foreach($availableShops as $shop)
                                    <option value="{{ $shop->id }}" {{ request('shop_id') == $shop->id ? 'selected' : '' }} class="bg-neutral-900">
                                        {{ str_replace('iPhone Vault - ', '', $shop->name) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Price Filter Accordion -->
                    <div x-data="{ open: true }" class="space-y-3 pb-4 border-b border-white/5">
                        <button type="button" @click="open = !open" class="w-full flex justify-between items-center text-xs font-bold text-neutral-400 uppercase tracking-wider">
                            <span>Max Budget</span>
                            <svg class="h-3 w-3 transform transition-transform" :class="open ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="open" x-transition class="space-y-2">
                            <div class="flex justify-between items-center text-xs">
                                <span class="text-neutral-500 font-semibold">Selected Max:</span>
                                <span class="text-brand-blue font-bold">₹{{ number_format(request('max_price', $model->starting_price * 1.5)) }}</span>
                            </div>
                            <input 
                                type="range" 
                                name="max_price" 
                                id="max_price" 
                                min="{{ $model->starting_price }}" 
                                max="{{ $model->starting_price * 1.5 }}" 
                                step="1000"
                                value="{{ request('max_price', $model->starting_price * 1.5) }}" 
                                onchange="this.form.submit()"
                                class="w-full accent-brand-blue cursor-pointer bg-neutral-800 h-1 rounded-lg"
                            >
                            <div class="flex justify-between text-[10px] text-neutral-500 font-semibold">
                                <span>₹{{ number_format($model->starting_price) }}</span>
                                <span>₹{{ number_format($model->starting_price * 1.5) }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Battery Health Filter Accordion -->
                    <div x-data="{ open: true }" class="space-y-3 pb-4">
                        <button type="button" @click="open = !open" class="w-full flex justify-between items-center text-xs font-bold text-neutral-400 uppercase tracking-wider">
                            <span>Battery Health</span>
                            <svg class="h-3 w-3 transform transition-transform" :class="open ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="open" x-transition class="space-y-2">
                            <select name="min_battery" onchange="this.form.submit()" class="w-full rounded-xl bg-white/5 border border-white/10 px-3 py-2.5 text-xs text-white focus:outline-none focus:border-brand-blue transition">
                                <option value="" class="bg-neutral-900">Any Battery %</option>
                                <option value="95" {{ request('min_battery') == '95' ? 'selected' : '' }} class="bg-neutral-900">95% and above</option>
                                <option value="90" {{ request('min_battery') == '90' ? 'selected' : '' }} class="bg-neutral-900">90% and above</option>
                                <option value="85" {{ request('min_battery') == '85' ? 'selected' : '' }} class="bg-neutral-900">85% and above</option>
                            </select>
                        </div>
                    </div>

                </form>
            </aside>

            <!-- Stock Grid -->
            <main class="lg:col-span-9" data-aos="fade-up">
                @if(count($phones) > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($phones as $phone)
                            <div class="glass-card rounded-3xl p-5 flex flex-col justify-between relative overflow-hidden group">
                                
                                <!-- Wishlist Heart Button (Feature 21) -->
                                <button 
                                    @click.prevent="$store.wishlist.toggle({{ $phone->id }})" 
                                    class="absolute top-4 right-4 z-10 w-8 h-8 rounded-full bg-black/40 backdrop-blur-md flex items-center justify-center text-neutral-400 hover:text-red-500 transition active:scale-125"
                                >
                                    <svg class="h-4.5 w-4.5 transition duration-300" :class="$store.wishlist.has({{ $phone->id }}) ? 'fill-red-500 stroke-red-500 scale-110' : 'fill-none stroke-current'" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </button>

                                <!-- Top Badges -->
                                <div class="flex justify-between items-center mb-4">
                                    <span class="text-[10px] uppercase tracking-wider font-extrabold px-2.5 py-1 rounded-md bg-white/5 border border-white/5 text-neutral-300">
                                        {{ $phone->storage }}
                                    </span>
                                    
                                    <!-- Condition Badge -->
                                    <span class="text-[10px] font-bold px-2.5 py-1 rounded-full border {{ 
                                        $phone->condition_grade === 'Excellent' ? 'bg-green-500/10 text-green-400 border-green-500/20' : 
                                        ($phone->condition_grade === 'Very Good' ? 'bg-blue-500/10 text-blue-400 border-blue-500/20' : 
                                        'bg-yellow-500/10 text-yellow-400 border-yellow-500/20') 
                                    }}">
                                        {{ $phone->condition_grade }}
                                    </span>
                                </div>

                                <!-- Device Photo (Feature 12 Image Zoom) -->
                                <div class="relative my-4 flex items-center justify-center h-44 overflow-hidden rounded-2xl bg-neutral-900/40 p-4 border border-white/5">
                                    <img 
                                        src="{{ $phone->images->first()->image ?? $model->image }}" 
                                        alt="{{ $model->name }}" 
                                        class="max-h-full object-contain group-hover:scale-110 transition duration-500"
                                        onerror="this.src='https://images.unsplash.com/photo-1616348436168-de43ad0db179?w=600&q=80'"
                                    >
                                </div>

                                <!-- Details -->
                                <div class="space-y-4">
                                    <div class="text-left space-y-2">
                                        <h3 class="text-base font-extrabold text-white tracking-tight">
                                            {{ $model->name }} <span class="text-xs font-normal text-neutral-400">({{ $phone->color }})</span>
                                        </h3>
                                        
                                        <!-- Battery, Shop & Availability Indicators (Feature 13) -->
                                        <div class="flex flex-col gap-1.5 text-xs text-neutral-400">
                                            <div class="flex items-center justify-between">
                                                <!-- Battery -->
                                                <span class="flex items-center">
                                                    <svg class="h-3.5 w-3.5 mr-1 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                                    BH: <span class="ml-1 font-bold text-white">{{ $phone->battery_health }}%</span>
                                                </span>
                                                <!-- Availability Glow indicator -->
                                                <div class="flex items-center space-x-1">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-green-400 shadow-[0_0_8px_rgba(74,222,128,0.8)] animate-pulse"></span>
                                                    <span class="text-[10px] font-bold text-green-400">Available Now</span>
                                                </div>
                                            </div>
                                            <!-- Outlet location -->
                                            <span class="flex items-center truncate">
                                                <svg class="h-3.5 w-3.5 mr-1 text-brand-blue shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                                {{ str_replace('iPhone Vault - ', '', $phone->shop->name) }}
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Price tag, Compare & CTA -->
                                    <div class="border-t border-white/5 pt-4 flex flex-col gap-3">
                                        <div class="flex items-center justify-between">
                                            <span class="text-xl font-black text-white">₹{{ number_format($phone->price) }}</span>
                                            <!-- Compare Button checkbox wrapper -->
                                            <button 
                                                @click.prevent="
                                                    if ($store.compare.has({{ $phone->id }})) {
                                                        $store.compare.remove({{ $phone->id }});
                                                    } else {
                                                        $store.compare.add({
                                                            id: {{ $phone->id }},
                                                            name: '{{ $model->name }}',
                                                            color: '{{ $phone->color }}',
                                                            image: '{{ $phone->images->first()->image ?? $model->image }}',
                                                            price: '₹{{ number_format($phone->price) }}',
                                                            storage: '{{ $phone->storage }}',
                                                            battery: '{{ $phone->battery_health }}%',
                                                            condition: '{{ $phone->condition_grade }}',
                                                            processor: '{{ str_contains($model->name, '16') ? 'Apple A18' : (str_contains($model->name, '15') ? 'Apple A17' : 'Apple Bionic') }}',
                                                            camera: '{{ str_contains($model->name, 'Pro') ? '48MP Triple Camera' : '12MP Dual Camera' }}'
                                                        });
                                                    }
                                                "
                                                class="rounded-xl border border-white/10 px-3 py-1.5 text-[10px] font-bold transition flex items-center space-x-1.5"
                                                :class="$store.compare.has({{ $phone->id }}) ? 'border-brand-blue bg-brand-blue/10 text-brand-blue' : 'text-neutral-400 hover:text-white hover:border-white/20'"
                                            >
                                                <span x-text="$store.compare.has({{ $phone->id }}) ? '✓ Compared' : '+ Compare'"></span>
                                            </button>
                                        </div>
                                        <a 
                                            href="{{ route('phone.show', $phone->id) }}" 
                                            class="w-full text-center rounded-xl bg-brand-blue py-2.5 text-xs font-semibold text-white hover:bg-brand-blue-hover hover:shadow-[0_4px_12px_rgba(0,113,227,0.3)] transition duration-200"
                                        >
                                            View Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <!-- No listings found -->
                    <div class="glass-panel border border-white/5 rounded-3xl p-16 text-center space-y-6">
                        <div class="text-5xl">📱❌</div>
                        <div class="space-y-2">
                            <h3 class="text-lg font-bold text-white">No iPhones Found</h3>
                            <p class="text-sm text-neutral-400 max-w-sm mx-auto">
                                We couldn't find any pre-owned devices matching your active filters. Try resetting the options.
                            </p>
                        </div>
                        <a href="{{ route('model.show', $model->id) }}" class="inline-block rounded-xl bg-white/10 border border-white/10 px-5 py-2.5 text-xs font-semibold text-white hover:bg-white hover:text-black transition duration-200">
                            Reset Filters
                        </a>
                    </div>
                @endif
            </main>

        </div>
    </div>

    <!-- Floating Comparison Bar (Feature 20) -->
    <div 
        class="fixed bottom-6 left-1/2 -translate-x-1/2 z-40 bg-neutral-900/90 border border-white/10 rounded-[30px] px-6 py-4 flex items-center space-x-6 backdrop-blur-md shadow-2xl transition-all duration-300"
        x-show="$store.compare.items.length > 0"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="translate-y-20 opacity-0"
        x-transition:enter-end="translate-y-0 opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="translate-y-0 opacity-100"
        x-transition:leave-end="translate-y-20 opacity-0"
    >
        <div class="text-xs text-neutral-400 font-bold uppercase tracking-wider">
            Compare (<span class="text-brand-blue" x-text="$store.compare.items.length"></span>/3)
        </div>
        <div class="flex space-x-2">
            <template x-for="item in $store.compare.items" :key="item.id">
                <div class="relative w-8 h-8 rounded-lg bg-neutral-950 p-1 border border-white/5 flex items-center justify-center">
                    <img :src="item.image" class="max-h-full object-contain">
                    <button @click="$store.compare.remove(item.id)" class="absolute -top-1.5 -right-1.5 w-4 h-4 bg-red-500 rounded-full flex items-center justify-center text-[8px] font-bold text-white shadow-md">×</button>
                </div>
            </template>
        </div>
        <button @click="openCompareModal = true" class="rounded-full bg-brand-blue px-4 py-2 text-xs font-bold text-white hover:bg-brand-blue-hover hover:shadow-[0_4px_12px_rgba(0,113,227,0.3)] transition">Compare Now</button>
        <button @click="$store.compare.clear()" class="text-xs text-neutral-500 hover:text-neutral-300 transition">Clear</button>

        <!-- Compare Modal overlay container -->
        <div 
            class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-md"
            x-show="openCompareModal"
            x-transition.opacity
            @click.away="openCompareModal = false"
        >
            <div class="bg-neutral-950 border border-white/10 rounded-[32px] max-w-4xl w-full max-h-[85vh] overflow-y-auto p-8 relative flex flex-col" @click.stop>
                <button @click="openCompareModal = false" class="absolute top-6 right-6 text-neutral-400 hover:text-white text-2xl font-bold transition">×</button>
                <h2 class="text-2xl font-black text-white mb-6 tracking-tight text-left">Side-by-Side Comparison</h2>
                
                <div class="grid grid-cols-4 gap-6 text-xs text-left items-stretch overflow-x-auto">
                    <!-- Spec Label Column -->
                    <div class="space-y-4 font-bold text-neutral-500 flex flex-col justify-between pt-28">
                        <div class="py-3 border-b border-white/5">Price</div>
                        <div class="py-3 border-b border-white/5">Storage</div>
                        <div class="py-3 border-b border-white/5">Battery Health</div>
                        <div class="py-3 border-b border-white/5">Condition</div>
                        <div class="py-3 border-b border-white/5">Processor</div>
                        <div class="py-3 border-b border-white/5">Camera Details</div>
                    </div>
                    <!-- Compared Devices Columns -->
                    <template x-for="item in $store.compare.items" :key="item.id">
                        <div class="space-y-4 text-center">
                            <div class="h-24 flex flex-col items-center justify-between">
                                <img :src="item.image" class="w-14 h-14 object-contain">
                                <div>
                                    <div class="font-extrabold text-white truncate w-full" x-text="item.name"></div>
                                    <div class="text-[9px] text-neutral-500" x-text="item.color"></div>
                                </div>
                            </div>
                            <div class="py-3 border-b border-white/5 font-black text-white text-sm" x-text="item.price"></div>
                            <div class="py-3 border-b border-white/5 text-neutral-300 font-semibold" x-text="item.storage"></div>
                            <div class="py-3 border-b border-white/5 text-green-400 font-extrabold" x-text="item.battery"></div>
                            <div class="py-3 border-b border-white/5 text-neutral-300" x-text="item.condition"></div>
                            <div class="py-3 border-b border-white/5 text-neutral-300" x-text="item.processor"></div>
                            <div class="py-3 border-b border-white/5 text-neutral-300" x-text="item.camera"></div>
                        </div>
                    </template>
                    <!-- Empty Slots -->
                    <template x-for="n in (3 - $store.compare.items.length)">
                        <div class="border border-dashed border-white/5 rounded-2xl flex flex-col items-center justify-center text-neutral-600 h-full min-h-[300px] p-6">
                            <span class="text-[10px] font-bold uppercase tracking-wider">Empty Slot</span>
                            <span class="text-[9px] mt-1">Add another device to compare</span>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
