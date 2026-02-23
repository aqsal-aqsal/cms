@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-slate-900">Dashboard</h1>
        <p class="mt-1 text-sm text-slate-500">
            Ringkasan singkat aktivitas CMS.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <div class="bg-white border border-slate-200 rounded-lg p-4 shadow-sm">
            <div class="text-xs font-medium text-slate-500 mb-1">Total Postingan</div>
            <div class="text-2xl font-semibold text-slate-900">{{ $postCount }}</div>
        </div>
    </div>

    <div class="bg-white border border-slate-200 rounded-lg p-4 shadow-sm">
        <h2 class="text-sm font-semibold text-slate-900 mb-2">Selamat datang</h2>
        <p class="text-sm text-slate-600">
            Gunakan menu di samping untuk mengelola postingan berita, kategori, dan role pengguna.
        </p>
    </div>
@endsection

