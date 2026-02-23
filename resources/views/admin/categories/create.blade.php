@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-slate-900">Tambah Kategori</h1>
        <p class="mt-1 text-sm text-slate-500">Buat kategori baru untuk postingan.</p>
    </div>

    <div class="bg-white border border-slate-200 rounded-lg shadow-sm p-5">
        @if ($errors->any())
            <div class="mb-4 rounded-md border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.categories.store') }}" class="space-y-4">
            @include('admin.categories._form', ['category' => null])
        </form>
    </div>
@endsection

