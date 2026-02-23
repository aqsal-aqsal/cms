<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name', 'CMS'))</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-100 text-slate-900">
    <div class="min-h-screen flex">
        @auth
            <aside class="w-64 bg-white border-r border-slate-200 hidden md:flex md:flex-col">
                <div class="px-6 py-4 border-b border-slate-200">
                    <span class="block font-semibold text-lg">CMS Berita</span>
                    <span class="block text-xs text-slate-500">Admin Panel</span>
                </div>
                <nav class="flex-1 px-4 py-4 space-y-1 text-sm">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center px-3 py-2 rounded-md hover:bg-slate-100 {{ request()->routeIs('admin.dashboard') ? 'bg-slate-100 font-semibold' : '' }}">
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('admin.posts.index') }}" class="flex items-center px-3 py-2 rounded-md hover:bg-slate-100 {{ request()->routeIs('admin.posts.*') ? 'bg-slate-100 font-semibold' : '' }}">
                        <span>Postingan</span>
                    </a>
                    <a href="{{ route('admin.categories.index') }}" class="flex items-center px-3 py-2 rounded-md hover:bg-slate-100 {{ request()->routeIs('admin.categories.*') ? 'bg-slate-100 font-semibold' : '' }}">
                        <span>Kategori</span>
                    </a>
                    <a href="{{ route('admin.users.index') }}" class="flex items-center px-3 py-2 rounded-md hover:bg-slate-100 {{ request()->routeIs('admin.users.*') ? 'bg-slate-100 font-semibold' : '' }}">
                        <span>Pengguna & Role</span>
                    </a>
                </nav>
                <div class="px-4 py-4 border-t border-slate-200">
                    <div class="mb-3 text-xs text-slate-500">
                        Masuk sebagai<br>
                        <span class="font-medium text-slate-800">{{ auth()->user()->name }}</span>
                        <span class="block capitalize text-slate-500">{{ auth()->user()->role?->name }}</span>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-white bg-red-500 hover:bg-red-600 rounded-md">
                            Keluar
                        </button>
                    </form>
                </div>
            </aside>
        @endauth

        <div class="flex-1 flex flex-col">
            <header class="w-full bg-white border-b border-slate-200 flex items-center justify-between px-4 py-3 md:hidden">
                <div class="font-semibold">CMS Berita</div>
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="inline-flex items-center justify-center px-3 py-1.5 text-xs font-medium text-white bg-red-500 hover:bg-red-600 rounded-md">
                            Keluar
                        </button>
                    </form>
                @endauth
            </header>

            <main class="w-full max-w-6xl mx-auto px-4 py-6 md:py-8">
                @if (session('status'))
                    <div class="mb-4 rounded-md border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
                        {{ session('status') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>

