<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">

            @if(auth('admin')->user())
                @include('layouts.admin-navigation')
            @elseif(auth()->guest())
                @include('layouts.guest-navigation')
            @else
                @include('layouts.user-navigation')
            @endif

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <!-- Page footer -->
            <footer class="mt-4 bg-white">
                <div class="mx-auto max-w-screen-xl space-y-8 px-4 py-16 sm:px-6 lg:space-y-16 lg:px-8">
                    <div class="sm:flex sm:items-center sm:justify-between">
                        <div class="shrink-0 flex items-center w-40"></div>
                        <a
                            href="https://github.com/dashboard"
                            rel="noreferrer"
                            target="_blank"
                            class="text-gray-700 transition hover:opacity-75"
                        >
                            <span class="sr-only">GitHub</span>
                            <svg class="h-10 w-10" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                fill-rule="evenodd"
                                d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                clip-rule="evenodd"
                            />
                            </svg>
                        </a>
                    </div>
                    <div class="grid grid-cols-1 gap-8 border-t border-gray-100 pt-8 sm:grid-cols-2 lg:grid-cols-4 lg:pt-16">
                    <div>
                        <p class="font-medium text-gray-900">Services</p>
                        <ul class="mt-6 space-y-4 text-sm">
                            <li>
                                <a href="#" class="text-gray-700 transition hover:opacity-75"> 1on1 Coaching </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-700 transition hover:opacity-75"> Company Review </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-700 transition hover:opacity-75"> Accounts Review </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-700 transition hover:opacity-75"> HR Consulting </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-700 transition hover:opacity-75"> SEO Optimisation </a>
                            </li>
                        </ul>
                    </div>
                        <div>
                            <p class="font-medium text-gray-900">Company</p>
                            <ul class="mt-6 space-y-4 text-sm">
                                <li>
                                    <a href="#" class="text-gray-700 transition hover:opacity-75"> About </a>
                                </li>
                                <li>
                                    <a href="#" class="text-gray-700 transition hover:opacity-75"> Meet the Team </a>
                                </li>
                                <li>
                                    <a href="#" class="text-gray-700 transition hover:opacity-75"> Accounts Review </a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <p class="font-medium text-gray-900">Helpful Links</p>
                            <ul class="mt-6 space-y-4 text-sm">
                                <li>
                                    <a href="#" class="text-gray-700 transition hover:opacity-75"> Contact </a>
                                </li>
                                <li>
                                    <a href="#" class="text-gray-700 transition hover:opacity-75"> FAQs </a>
                                </li>
                                <li>
                                    <a href="#" class="text-gray-700 transition hover:opacity-75"> Live Chat </a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <p class="font-medium text-gray-900">Legal</p>
                            <ul class="mt-6 space-y-4 text-sm">
                            <li>
                                <a href="#" class="text-gray-700 transition hover:opacity-75"> Accessibility </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-700 transition hover:opacity-75"> Returns Policy </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-700 transition hover:opacity-75"> Refund Policy </a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-700 transition hover:opacity-75"> Hiring Statistics </a>
                            </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
