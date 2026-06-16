<!DOCTYPE html>
<html lang="en" class="h-full bg-black text-white antialiased">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="iPhone Vault - Premium Pre-Owned iPhones Marketplace in Thiruvananthapuram. Browse verified devices across 10 locations.">
    <title>@yield('title', 'iPhone Vault | Premium Pre-Owned iPhones')</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Vite Assets (Bundling AOS, Swiper, GSAP, Vanilla-tilt, CountUp) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine.js CDN -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="flex min-h-full flex-col bg-black font-sans selection:bg-brand-blue selection:text-white">

    <!-- Apple Style Loading Screen (Feature 1) -->
    <div id="loader-screen" class="fixed inset-0 z-[9999] flex flex-col items-center justify-center bg-black">
        <div class="text-center space-y-6">
            <!-- Sleek Apple-style Logo -->
            <div id="loader-logo" class="w-16 h-16 mx-auto flex items-center justify-center text-white select-none">
                <svg class="h-14 w-14 text-brand-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
            </div>
            <div id="loader-text" class="space-y-1">
                <h2 class="text-2xl font-extrabold tracking-wide text-white">iPhone <span class="text-brand-blue">Vault</span></h2>
                <p class="text-[10px] text-neutral-500 font-medium tracking-widest uppercase">Premium Pre-Owned iPhones</p>
            </div>
            <!-- Progress Bar -->
            <div class="w-48 h-[2px] bg-neutral-900 rounded-full mx-auto overflow-hidden relative">
                <div id="loader-progress" class="absolute left-0 top-0 bottom-0 w-0 bg-brand-blue transition-all duration-75"></div>
            </div>
        </div>
    </div>

    <!-- Sticky Frosted Navbar -->
    <header class="sticky top-0 z-50 w-full border-b border-white/5 bg-black/70 backdrop-blur-md">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
            
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="flex items-center space-x-2 text-xl font-bold tracking-tight text-white transition hover:opacity-90">
                <svg class="h-6 w-6 text-brand-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
                <span class="gradient-text font-extrabold tracking-wide">iPhone <span class="text-brand-blue">Vault</span></span>
            </a>

            <!-- Navigation Links -->
            @if(session()->has('user_id'))
            <nav class="hidden md:flex items-center space-x-8 text-sm font-medium text-neutral-400">
                <a href="{{ route('home') }}" class="hover:text-white transition">Home</a>
                <a href="{{ route('home') }}#models" class="hover:text-white transition">Models</a>
                <a href="{{ route('home') }}#stores" class="hover:text-white transition">Stores</a>
                <a href="#contact" class="hover:text-white transition">Contact</a>
            </nav>
            @endif

            <!-- Auth Actions / Profile -->
            <div class="flex items-center space-x-4">
                @if(session()->has('user_id'))
                    <div class="hidden sm:flex flex-col text-right">
                        <span class="text-xs text-neutral-500">Logged in as</span>
                        <span class="text-sm font-semibold text-white">{{ session('user_name') }}</span>
                    </div>
                    <a href="{{ route('logout') }}" class="inline-flex items-center justify-center rounded-full bg-white/10 px-4 py-2 text-xs font-semibold text-white backdrop-blur-md border border-white/10 hover:bg-white hover:text-black transition duration-300">
                        Logout
                    </a>
                @else
                    <span class="text-xs text-neutral-400 border border-neutral-800 rounded-full px-3 py-1 bg-neutral-900/50">Demo Version</span>
                @endif
            </div>
        </div>
    </header>

    <!-- Success & Error Alert Banner / Toast -->
    <div class="fixed top-24 right-6 z-50 max-w-sm w-full space-y-2 pointer-events-none" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)">
        @if(session('success'))
            <div class="pointer-events-auto flex items-center justify-between p-4 rounded-xl glass-panel border border-green-500/20 bg-green-500/5 text-green-400 shadow-2xl">
                <div class="flex items-center space-x-3">
                    <svg class="h-5 w-5 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-sm font-medium">{{ session('success') }}</span>
                </div>
                <button @click="show = false" class="text-green-400 hover:text-green-200 transition">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        @endif

        @if(session('error') || $errors->any())
            <div class="pointer-events-auto flex items-center justify-between p-4 rounded-xl glass-panel border border-red-500/20 bg-red-500/5 text-red-400 shadow-2xl">
                <div class="flex items-center space-x-3">
                    <svg class="h-5 w-5 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <span class="text-sm font-medium">
                        {{ session('error') ?? $errors->first() }}
                    </span>
                </div>
                <button @click="show = false" class="text-red-400 hover:text-red-200 transition">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        @endif
    </div>

    <!-- Main Content Area -->
    <main class="flex-grow opacity-0">
        @yield('content')
    </main>

    <!-- Upgraded Premium Footer (Feature 24) -->
    <footer id="contact" class="mt-auto border-t border-white/5 bg-[#080808] text-neutral-400 relative overflow-hidden">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-96 h-96 bg-brand-blue/5 rounded-full blur-3xl pointer-events-none"></div>
        <div class="mx-auto max-w-7xl px-6 py-16 grid grid-cols-1 md:grid-cols-12 gap-8 items-start relative z-10">
            <!-- Brand Column -->
            <div class="md:col-span-5 space-y-4">
                <div class="flex items-center space-x-2 text-white">
                    <svg class="h-6 w-6 text-brand-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    <span class="text-lg font-bold tracking-tight text-white">iPhone <span class="text-brand-blue">Vault</span></span>
                </div>
                <p class="text-xs max-w-sm leading-relaxed text-neutral-500">
                    Premium Pre-Owned iPhones. 100% verified, 40+ points diagnostic check, and warranty-backed devices available across 10 locations in Thiruvananthapuram.
                </p>
                <p class="text-xs text-neutral-600">&copy; {{ date('Y') }} iPhone Vault. All rights reserved. Demo Version.</p>
            </div>
            
            <!-- Quick Links -->
            <div class="md:col-span-4 space-y-4">
                <h3 class="text-xs font-bold uppercase tracking-wider text-white">Explore Marketplace</h3>
                <div class="grid grid-cols-2 gap-y-2 text-xs font-semibold">
                    <a href="{{ route('home') }}" class="hover:text-white hover:shadow-[0_0_8px_rgba(255,255,255,0.2)] transition duration-200">Home</a>
                    <a href="{{ route('home') }}#models" class="hover:text-white hover:shadow-[0_0_8px_rgba(255,255,255,0.2)] transition duration-200">Models</a>
                    <a href="{{ route('home') }}#stores" class="hover:text-white hover:shadow-[0_0_8px_rgba(255,255,255,0.2)] transition duration-200">Stores</a>
                    <a href="#contact" class="hover:text-white hover:shadow-[0_0_8px_rgba(255,255,255,0.2)] transition duration-200">Contact</a>
                    <a href="#" class="hover:text-white hover:shadow-[0_0_8px_rgba(255,255,255,0.2)] transition duration-200">Privacy Policy</a>
                    <a href="#" class="hover:text-white hover:shadow-[0_0_8px_rgba(255,255,255,0.2)] transition duration-200">Terms of Use</a>
                </div>
            </div>

            <!-- Contact & Socials -->
            <div class="md:col-span-3 space-y-4">
                <h3 class="text-xs font-bold uppercase tracking-wider text-white">Connect with Us</h3>
                <p class="text-xs text-neutral-500 leading-relaxed">
                    Customer Care Hotline:<br>
                    <span class="text-white font-bold">+91 98765 43210</span>
                </p>
                <!-- Social Icons -->
                <div class="flex space-x-4">
                    <!-- Facebook -->
                    <a href="#" class="w-8 h-8 rounded-full border border-white/5 bg-white/5 flex items-center justify-center text-neutral-400 hover:text-white hover:border-brand-blue hover:shadow-[0_0_12px_rgba(0,113,227,0.4)] hover:scale-110 transition duration-300">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                    </a>
                    <!-- Instagram -->
                    <a href="#" class="w-8 h-8 rounded-full border border-white/5 bg-white/5 flex items-center justify-center text-neutral-400 hover:text-white hover:border-pink-500 hover:shadow-[0_0_12px_rgba(236,72,153,0.4)] hover:scale-110 transition duration-300">
                        <span class="sr-only">Instagram</span>
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.008 3.752.052 2.73.124 4.093 1.503 4.218 4.218.044.968.052 1.324.052 3.752 0 2.43-.008 2.784-.052 3.752-.124 2.73-1.502 4.093-4.218 4.218-.968.044-1.324.052-3.752.052-2.43 0-2.784-.008-3.752-.052-2.73-.124-4.093-1.502-4.218-4.218-.044-.968-.052-1.324-.052-3.752 0-2.43 0.008-2.784.052-3.752.124-2.73 1.502-4.093 4.218-4.218.968-.044 1.324-.052 3.752-.052zM12 5.754a6.246 6.246 0 100 12.492 6.246 6.246 0 000-12.492zM18.406 5.594a1.5 1.5 0 100 3 1.5 1.5 0 000-3zM12 7.728a4.272 4.272 0 110 8.544 4.272 4.272 0 010-8.544z" clip-rule="evenodd" /></svg>
                    </a>
                    <!-- WhatsApp -->
                    <a href="https://wa.me/919876543210" target="_blank" class="w-8 h-8 rounded-full border border-white/5 bg-white/5 flex items-center justify-center text-neutral-400 hover:text-white hover:border-green-500 hover:shadow-[0_0_12px_rgba(74,222,128,0.4)] hover:scale-110 transition duration-300">
                        <span class="sr-only">WhatsApp</span>
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.502-5.724-1.458L0 24zm6.59-4.846c1.6.95 3.167 1.456 4.747 1.457 5.429 0 9.847-4.41 9.851-9.836.002-2.628-1.02-5.1-2.877-6.96C16.467 1.966 13.99 1.025 11.36 1.025c-5.438 0-9.859 4.41-9.863 9.835-.001 1.765.487 3.49 1.415 5.021l-.993 3.627 3.728-.977zm11.312-7.7c-.287-.144-1.7-.84-1.962-.936-.263-.096-.456-.144-.648.144-.192.288-.744.936-.912 1.128-.168.192-.336.216-.624.072-1.359-.684-2.28-1.077-3.204-2.658-.24-.411.24-.381.687-1.272.072-.144.036-.27-.018-.378-.054-.108-.456-1.104-.624-1.512-.165-.399-.333-.344-.456-.35-.117-.006-.252-.007-.387-.007-.135 0-.354.051-.54.255-.186.204-.708.693-.708 1.69s.726 1.96.828 2.096c.102.136 1.43 2.184 3.465 3.063.483.209.86.335 1.154.428.486.155.928.133 1.278.08.39-.059 1.7-.695 1.94-1.367.24-.672.24-1.248.168-1.367-.072-.12-.264-.192-.552-.336z"/></svg>
                    </a>
                    <!-- YouTube -->
                    <a href="#" class="w-8 h-8 rounded-full border border-white/5 bg-white/5 flex items-center justify-center text-neutral-400 hover:text-white hover:border-red-600 hover:shadow-[0_0_12px_rgba(220,38,38,0.4)] hover:scale-110 transition duration-300">
                        <span class="sr-only">YouTube</span>
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.498 6.163a3.003 3.003 0 00-2.11-2.11C19.518 3.545 12 3.545 12 3.545s-7.518 0-9.388.508a3.003 3.003 0 00-2.11 2.11C0 8.033 0 12 0 12s0 3.967.502 5.837a3.003 3.003 0 002.11 2.11c1.87.508 9.388.508 9.388.508s7.518 0 9.388-.508a3.003 3.003 0 002.11-2.11C24 15.967 24 12 24 12s0-3.967-.502-5.837zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp Button (Feature 10) -->
    <a 
        href="https://wa.me/919876543210?text=Hi!%20I'm%20inquiring%20about%20pre-owned%20iPhones%20available%20at%20iPhone%20Vault." 
        target="_blank"
        class="fixed bottom-6 right-6 z-[99] flex items-center justify-center w-14 h-14 rounded-full bg-[#25d366] text-black shadow-[0_4px_20px_rgba(37,211,102,0.4)] border border-[#25d366]/20 transition-transform duration-300 hover:scale-110 active:scale-95 animate-pulse-glow"
        id="whatsapp-widget"
        x-data="{
            bounce() {
                setInterval(() => {
                    const el = document.getElementById('whatsapp-widget');
                    if (el) {
                        el.classList.add('-translate-y-3');
                        setTimeout(() => el.classList.remove('-translate-y-3'), 300);
                        setTimeout(() => {
                            el.classList.add('-translate-y-1.5');
                            setTimeout(() => el.classList.remove('-translate-y-1.5'), 200);
                        }, 400);
                    }
                }, 8000);
            }
        }"
        x-init="bounce()"
    >
        <span class="sr-only">Inquire on WhatsApp</span>
        <svg class="h-7 w-7 fill-current" viewBox="0 0 24 24">
            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.502-5.724-1.458L0 24zm6.59-4.846c1.6.95 3.167 1.456 4.747 1.457 5.429 0 9.847-4.41 9.851-9.836.002-2.628-1.02-5.1-2.877-6.96C16.467 1.966 13.99 1.025 11.36 1.025c-5.438 0-9.859 4.41-9.863 9.835-.001 1.765.487 3.49 1.415 5.021l-.993 3.627 3.728-.977zm11.312-7.7c-.287-.144-1.7-.84-1.962-.936-.263-.096-.456-.144-.648.144-.192.288-.744.936-.912 1.128-.168.192-.336.216-.624.072-1.359-.684-2.28-1.077-3.204-2.658-.24-.411.24-.381.687-1.272.072-.144.036-.27-.018-.378-.054-.108-.456-1.104-.624-1.512-.165-.399-.333-.344-.456-.35-.117-.006-.252-.007-.387-.007-.135 0-.354.051-.54.255-.186.204-.708.693-.708 1.69s.726 1.96.828 2.096c.102.136 1.43 2.184 3.465 3.063.483.209.86.335 1.154.428.486.155.928.133 1.278.08.39-.059 1.7-.695 1.94-1.367.24-.672.24-1.248.168-1.367-.072-.12-.264-.192-.552-.336z"/>
        </svg>
    </a>

    <!-- Global Alpine.js Store for Wishlist and Comparison (Features 20 & 21) -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('wishlist', {
                items: JSON.parse(localStorage.getItem('wishlist') || '[]'),
                toggle(phoneId) {
                    const id = parseInt(phoneId, 10);
                    const index = this.items.indexOf(id);
                    if (index > -1) {
                        this.items.splice(index, 1);
                    } else {
                        this.items.push(id);
                    }
                    localStorage.setItem('wishlist', JSON.stringify(this.items));
                    
                    // Sync with Laravel Session via fetch
                    fetch(`/wishlist/toggle/${id}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Wishlist updated in session:', data.wishlist);
                    })
                    .catch(err => console.error('Wishlist sync error:', err));
                },
                has(phoneId) {
                    return this.items.includes(parseInt(phoneId, 10));
                }
            });

            Alpine.store('compare', {
                items: JSON.parse(localStorage.getItem('compare_items') || '[]'),
                add(device) {
                    if (this.items.find(item => item.id === device.id)) {
                        return;
                    }
                    if (this.items.length >= 3) {
                        alert("You can compare up to 3 models at a time.");
                        return;
                    }
                    this.items.push(device);
                    localStorage.setItem('compare_items', JSON.stringify(this.items));
                },
                remove(deviceId) {
                    this.items = this.items.filter(item => item.id !== deviceId);
                    localStorage.setItem('compare_items', JSON.stringify(this.items));
                },
                clear() {
                    this.items = [];
                    localStorage.removeItem('compare_items');
                },
                has(deviceId) {
                    return this.items.some(item => item.id === deviceId);
                }
            });
        });
    </script>

    <!-- GSAP Animations for Loader and Page Transitions (Feature 1 & 23) -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Check if GSAP is loaded
            if (typeof gsap !== 'undefined') {
                const tl = gsap.timeline({
                    onComplete: function() {
                        const loader = document.getElementById('loader-screen');
                        if (loader) loader.remove();
                    }
                });

                // Animate progress bar from 0 to 100
                tl.to('#loader-progress', {
                    width: '100%',
                    duration: 1.2,
                    ease: 'power2.inOut'
                });

                // Logo scale and text fade in
                tl.fromTo('#loader-logo', 
                    { scale: 0.8, opacity: 0.5 }, 
                    { scale: 1.1, opacity: 1, duration: 0.6, ease: 'back.out(1.7)' },
                    '-=1.2'
                );

                // Fade out the entire loader screen
                tl.to('#loader-screen', {
                    opacity: 0,
                    y: -50,
                    duration: 0.4,
                    ease: 'power3.in'
                });

                // Page Entrance transition
                tl.fromTo('main', 
                    { opacity: 0, y: 20 }, 
                    { opacity: 1, y: 0, duration: 0.8, ease: 'power3.out' },
                    '-=0.2'
                );
            } else {
                // Fallback if GSAP is not yet loaded
                const loader = document.getElementById('loader-screen');
                if (loader) loader.style.display = 'none';
                document.querySelector('main').style.opacity = '1';
            }
        });
    </script>
</body>
</html>
