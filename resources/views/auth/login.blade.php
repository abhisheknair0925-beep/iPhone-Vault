@extends('layouts.app')

@section('title', 'Welcome to iPhone Vault | Login')

@section('content')
<div class="relative min-h-[80vh] flex items-center justify-center overflow-hidden px-6 py-12">
    <!-- Glowing Neon Backdrops -->
    <div class="glow-orb glow-blue"></div>
    <div class="glow-orb glow-purple"></div>

    <div class="relative z-10 w-full max-w-5xl grid md:grid-cols-12 gap-12 items-center">
        
        <!-- Left Side: Animated Brand & iPhone Illustration -->
        <div class="md:col-span-6 space-y-8 text-left hidden md:block" data-aos="fade-right">
            <div class="space-y-4">
                <span class="inline-flex items-center rounded-full bg-brand-blue/10 px-3 py-1 text-xs font-semibold text-brand-blue border border-brand-blue/20">
                    Trusted Marketplace
                </span>
                <h1 class="text-4xl lg:text-5xl font-extrabold tracking-tight text-white leading-tight">
                    Welcome to <br>
                    <span class="gradient-text">iPhone Vault</span>
                </h1>
                <p class="text-neutral-400 text-lg max-w-md">
                    Explore Verified Pre-Owned iPhones with verified battery health, certified grades, and store warranties.
                </p>
            </div>

            <!-- Premium Floating Device Mockup -->
            <div class="relative w-64 h-[450px] mx-auto animate-float">
                <!-- Device shadow -->
                <div class="absolute -bottom-6 left-1/2 -translate-x-1/2 w-48 h-6 bg-brand-blue/10 blur-xl rounded-full"></div>
                
                <!-- iPhone Frame -->
                <div class="w-full h-full rounded-[45px] bg-[#1a1a1a] p-3 border-4 border-neutral-800 shadow-[0_25px_50px_-12px_rgba(0,113,227,0.3)] relative overflow-hidden flex flex-col justify-between">
                    <!-- Dynamic Island -->
                    <div class="absolute top-4 left-1/2 -translate-x-1/2 w-24 h-6 bg-black rounded-full z-20 flex items-center justify-end px-3">
                        <div class="w-2.5 h-2.5 bg-neutral-900 rounded-full border border-neutral-800"></div>
                    </div>
                    
                    <!-- Screen Content -->
                    <div class="flex-grow rounded-[35px] bg-gradient-to-tr from-neutral-950 via-neutral-900 to-brand-blue/20 p-6 flex flex-col justify-between relative overflow-hidden">
                        <!-- Abstract Screen Glow -->
                        <div class="absolute -top-12 -right-12 w-32 h-32 bg-brand-blue/20 rounded-full blur-2xl"></div>
                        
                        <!-- Top Text -->
                        <div class="mt-8 text-center space-y-1 z-10">
                            <span class="text-[10px] uppercase font-bold tracking-widest text-brand-blue">Vault Standard</span>
                            <div class="text-xs text-neutral-400">100% Inspected</div>
                        </div>

                        <!-- Main Screen UI Graphics -->
                        <div class="my-auto space-y-3 z-10">
                            <!-- Battery Widget -->
                            <div class="bg-white/5 border border-white/5 rounded-2xl p-3 flex items-center justify-between">
                                <div class="text-[10px] text-neutral-400">Battery Health</div>
                                <div class="flex items-center space-x-1.5">
                                    <span class="text-xs font-bold text-green-400">98%</span>
                                    <div class="w-5 h-2.5 border border-green-400/50 rounded-sm p-0.5 flex items-center">
                                        <div class="h-full w-4 bg-green-400 rounded-2xs"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Condition Grade Widget -->
                            <div class="bg-white/5 border border-white/5 rounded-2xl p-3 flex items-center justify-between">
                                <div class="text-[10px] text-neutral-400">Condition Grade</div>
                                <span class="text-[10px] font-bold bg-blue-500/20 text-blue-400 border border-blue-500/30 px-2 py-0.5 rounded-full">
                                    Excellent
                                </span>
                            </div>
                        </div>

                        <!-- Footer representation -->
                        <div class="text-center text-[10px] text-neutral-500 z-10">
                            Swipe to Unlock
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side: Glassmorphic Form -->
        <div class="md:col-span-6 w-full max-w-md mx-auto" data-aos="fade-left">
            <div class="glass-panel border border-white/10 rounded-3xl p-8 shadow-2xl relative overflow-hidden">
                <!-- Glowing corner -->
                <div class="absolute -top-10 -left-10 w-24 h-24 bg-brand-blue/10 rounded-full blur-xl"></div>
                
                <div class="mb-8 text-center md:text-left">
                    <span class="md:hidden inline-flex items-center rounded-full bg-brand-blue/10 px-3 py-1 text-xs font-semibold text-brand-blue border border-brand-blue/20 mb-3">
                        Demo Version
                    </span>
                    <h2 class="text-2xl font-bold tracking-tight text-white">
                        Explore Verified Pre-Owned iPhones
                    </h2>
                    <p class="text-sm text-neutral-400 mt-2">
                        Sign in using the credentials below to view our stock.
                    </p>
                </div>

                <!-- Form -->
                <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <!-- Email field -->
                    <div class="space-y-2">
                        <label for="email" class="text-xs font-medium text-neutral-400">Email Address</label>
                        <div class="relative rounded-xl border border-white/10 bg-white/5 focus-within:border-brand-blue focus-within:ring-1 focus-within:ring-brand-blue transition duration-200">
                            <input 
                                type="email" 
                                name="email" 
                                id="email" 
                                value="{{ old('email', 'demo@iphonevault.com') }}" 
                                required 
                                class="w-full bg-transparent px-4 py-3 text-sm text-white focus:outline-none placeholder-neutral-600"
                                placeholder="name@example.com"
                            >
                        </div>
                    </div>

                    <!-- Password field -->
                    <div class="space-y-2">
                        <label for="password" class="text-xs font-medium text-neutral-400">Password</label>
                        <div class="relative rounded-xl border border-white/10 bg-white/5 focus-within:border-brand-blue focus-within:ring-1 focus-within:ring-brand-blue transition duration-200">
                            <input 
                                type="password" 
                                name="password" 
                                id="password" 
                                value="password123" 
                                required 
                                class="w-full bg-transparent px-4 py-3 text-sm text-white focus:outline-none placeholder-neutral-600"
                                placeholder="••••••••"
                            >
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button 
                        type="submit" 
                        class="w-full rounded-xl bg-brand-blue px-4 py-3 text-sm font-semibold text-white shadow-lg hover:bg-brand-blue-hover hover:shadow-[0_4px_20px_rgba(0,113,227,0.4)] active:scale-[0.98] transition duration-200"
                    >
                        Sign In
                    </button>
                </form>

                <!-- Demo Credentials Helper Box -->
                <div class="mt-8 border-t border-white/5 pt-6 space-y-3">
                    <div class="text-xs font-semibold text-neutral-400 uppercase tracking-widest text-center">
                        Demo Account Credentials
                    </div>
                    <div class="rounded-xl border border-white/5 bg-white/5 p-4 space-y-2 text-sm">
                        <div class="flex justify-between items-center">
                            <span class="text-neutral-500 text-xs">Username:</span>
                            <code class="text-brand-blue font-mono text-xs select-all">demo@iphonevault.com</code>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-neutral-500 text-xs">Password:</span>
                            <code class="text-brand-blue font-mono text-xs select-all">password123</code>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
