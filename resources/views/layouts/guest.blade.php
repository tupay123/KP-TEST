<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? 'Mie Jebew Bude' }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700;900&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Custom Login CSS -->
        <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    </head>
    <body class="antialiased">
        <div class="min-h-screen flex flex-col justify-center items-center bg-login-image py-12">
            <div class="logo-container mb-6">
                <div class="logo-bg"></div>
                <div class="w-full h-full rounded-full border-2 gold-border flex items-center justify-center overflow-hidden relative gold-glow">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="url(#goldGradient)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-16 h-16">
                        <defs>
                            <linearGradient id="goldGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#d4af37" />
                                <stop offset="50%" stop-color="#f9d776" />
                                <stop offset="100%" stop-color="#d4af37" />
                            </linearGradient>
                        </defs>
                        <path d="M4 11v3a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-3"/>
                        <path d="M12 19H4a1 1 0 0 1-1-1v-2a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-3.83"/>
                        <path d="M4 7V5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2"/>
                        <path d="M6 15c.7-1.2 1.5-2 3-2"/>
                        <path d="M18 15c-.7-1.2-1.5-2-3-2"/>
                        <path d="M12 13c1.5 0 2.3.8 3 2"/>
                        <path d="M12 13c-1.5 0-2.3.8-3 2"/>
                        <path d="M16 6l-4 4-4-4"/>
                    </svg>
                </div>
            </div>
            
            <h1 class="font-cinzel text-4xl font-bold gold-gradient-text mb-1 tracking-wider">MIE JEBEW BUDE</h1>
            <p class="text-gray-400 text-sm mb-8">Premium Noodle Experience</p>

            <div class="w-full sm:max-w-md px-8 py-8 login-card rounded-lg overflow-hidden shadow-2xl">
                {{ $slot }}
            </div>
            
            <div class="mt-8 text-gray-400 text-xs flex flex-col items-center">
                <div class="noodle-line w-32"></div>
                <p>© {{ date('Y') }} Mie Jebew Bude. All rights reserved.</p>
            </div>
        </div>
    </body>
</html>
