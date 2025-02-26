<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emailer Pro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom styles for a more polished look */
        body {
            font-family: 'Inter', sans-serif;
        }
        .nav-gradient {
            background: linear-gradient(135deg, #1a1a1a, #000000);
        }
        .nav-shadow {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .alert-success {
            background-color: #f0fdf4;
            border-color: #86efac;
            color: #15803d;
        }
        .alert-error {
            background-color: #fef2f2;
            border-color: #fecaca;
            color: #dc2626;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation Bar -->
    <nav class="nav-gradient nav-shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-14    items-center">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <h1 class="text-2xl font-bold text-white">Emailer Pro</h1>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto py-8 sm:px-6 lg:px-8">
        <!-- Success Alert -->
        @if(session('success'))
            <div class="alert-success px-6 py-4 rounded-lg mb-6 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <!-- Error Alert -->
        @if(session('error'))
            <div class="alert-error px-6 py-4 rounded-lg mb-6 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                {{ session('error') }}
            </div>
        @endif

        <!-- Page Content -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            @yield('content')
        </div>
    </main>
</body>
</html>