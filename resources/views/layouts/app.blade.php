<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emailer Pro - Professional Email Campaigns</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#eef2ff',
                            100: '#e0e7ff',
                            200: '#c7d2fe',
                            300: '#a5b4fc',
                            400: '#818cf8',
                            500: '#6366f1',
                            600: '#4f46e5',
                            700: '#4338ca',
                            800: '#3730a3',
                            900: '#312e81',
                        },
                        accent: {
                            400: '#f472b6',
                            500: '#ec4899',
                            600: '#db2777',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        /* Gradient backgrounds */
        .hero-gradient {
            background: linear-gradient(135deg, #0f0f23 0%, #1a1a3e 50%, #2d1b4e 100%);
        }

        .nav-glass {
            background: rgba(15, 15, 35, 0.85);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .card-glass {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Animated gradient text */
        .gradient-text {
            background: linear-gradient(135deg, #6366f1, #ec4899, #6366f1);
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: gradient-shift 3s ease infinite;
        }

        @keyframes gradient-shift {

            0%,
            100% {
                background-position: 0% center;
            }

            50% {
                background-position: 100% center;
            }
        }

        /* Tagline animation */
        .tagline-container {
            height: 28px;
            overflow: hidden;
        }

        .tagline-slider {
            animation: slide-up 15s ease-in-out infinite;
        }

        @keyframes slide-up {

            0%,
            18% {
                transform: translateY(0);
            }

            20%,
            38% {
                transform: translateY(-28px);
            }

            40%,
            58% {
                transform: translateY(-56px);
            }

            60%,
            78% {
                transform: translateY(-84px);
            }

            80%,
            98% {
                transform: translateY(-112px);
            }

            100% {
                transform: translateY(0);
            }
        }

        /* Button styles */
        .btn-primary {
            background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.5);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(236, 72, 153, 0.4);
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(236, 72, 153, 0.5);
        }

        /* Alert styles */
        .alert-success {
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.1) 0%, rgba(22, 163, 74, 0.1) 100%);
            border: 1px solid rgba(34, 197, 94, 0.3);
            color: #15803d;
        }

        .alert-error {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(220, 38, 38, 0.1) 100%);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #dc2626;
        }

        /* Subtle animations */
        .fade-in {
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Glow effect */
        .glow {
            box-shadow: 0 0 40px rgba(99, 102, 241, 0.15);
        }

        /* Table hover enhancement */
        .table-row-hover:hover {
            background: linear-gradient(90deg, rgba(99, 102, 241, 0.05) 0%, rgba(236, 72, 153, 0.05) 100%);
        }
    </style>
</head>

<body class="hero-gradient min-h-screen">
    <!-- Navigation Bar -->
    <nav class="nav-glass w-full fixed top-0 z-50">
        <div class="w-full px-6 lg:px-12">
            <div class="flex justify-between h-16 items-center">
                <!-- Logo & Brand -->
                <a href="{{ route('email-campaigns.index') }}" class="flex items-center gap-3 group">
                    <div class="relative">
                        <div
                            class="absolute inset-0 bg-primary-500 rounded-xl blur-lg opacity-50 group-hover:opacity-75 transition-opacity">
                        </div>
                        <img src="{{ asset('Emailer-Pro.png') }}" alt="Emailer Pro Logo"
                            class="relative h-10 w-10 object-contain rounded-lg">
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-white tracking-tight">Emailer <span
                                class="gradient-text">Pro</span></h1>
                        <div class="tagline-container">
                            <div class="tagline-slider">
                                <p class="text-xs text-gray-400 h-7 leading-7">Send More Messages in Less Time</p>
                                <p class="text-xs text-gray-400 h-7 leading-7">Power Up Your Communication</p>
                                <p class="text-xs text-gray-400 h-7 leading-7">Send Smarter, Not Harder</p>
                                <p class="text-xs text-gray-400 h-7 leading-7">Simple. Fast. Effective.</p>
                                <p class="text-xs text-gray-400 h-7 leading-7">Take Back Your Time</p>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Nav Links -->
                <div class="flex items-center gap-4">
                    <a href="{{ route('email-campaigns.index') }}"
                        class="text-gray-300 hover:text-white transition-colors text-sm font-medium px-4 py-2 rounded-lg hover:bg-white/10">
                        Campaigns
                    </a>
                    <a href="{{ route('email-campaigns.create') }}"
                        class="btn-primary text-white text-sm font-semibold px-5 py-2.5 rounded-xl">
                        + Make One
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-24 pb-12 px-6 lg:px-12">
        <div class="max-w-7xl mx-auto">
            <!-- Success Alert -->
            @if(session('success'))
                <div class="alert-success px-6 py-4 rounded-xl mb-6 flex items-center fade-in">
                    <div class="flex-shrink-0 w-10 h-10 bg-green-500/20 rounded-full flex items-center justify-center mr-4">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="font-semibold text-green-700">Success!</p>
                        <p class="text-sm text-green-600">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <!-- Error Alert -->
            @if(session('error'))
                <div class="alert-error px-6 py-4 rounded-xl mb-6 flex items-center fade-in">
                    <div class="flex-shrink-0 w-10 h-10 bg-red-500/20 rounded-full flex items-center justify-center mr-4">
                        <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="font-semibold text-red-700">Error</p>
                        <p class="text-sm text-red-600">{{ session('error') }}</p>
                    </div>
                </div>
            @endif

            <!-- Page Content -->
            <div class="card-glass rounded-2xl shadow-xl glow p-8 fade-in">
                @yield('content')
            </div>

            <!-- Footer -->
            <footer class="mt-12 text-center">
                <p class="text-gray-500 text-sm">© {{ date('Y') }} Emailer Pro. Professional Email Campaign Management.
                </p>
                <p class="text-gray-600 text-xs mt-2">Simple. Fast. Effective Email Campaigns.</p>
            </footer>
        </div>
    </main>
</body>

</html>