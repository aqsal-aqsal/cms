@extends('layouts.app')

@section('title', 'Edit Pengguna')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-slate-900">Edit Pengguna</h1>
        <p class="mt-1 text-sm text-slate-500">Perbarui data pengguna dan rolenya.</p>
    </div>

    <div class="bg-white border border-slate-200 rounded-lg shadow-sm p-5">
        @if ($errors->any())
            <div class="mb-4 rounded-md border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.users.update', $user) }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Nama</label>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $user->name) }}"
                    required
                    class="block w-full rounded-md border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:ring-sky-500"
                >
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email', $user->email) }}"
                    required
                    class="block w-full rounded-md border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:ring-sky-500"
                >
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">
                    Password baru
                    <span class="text-xs text-slate-400">(kosongkan jika tidak diubah)</span>
                </label>
                <input
                    type="password"
                    name="password"
                    class="block w-full rounded-md border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:ring-sky-500"
                >
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Role</label>
                <select
                    name="role_id"
                    class="block w-full rounded-md border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:ring-sky-500"
                    required
                >
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" @selected(old('role_id', $user->role_id) == $role->id)>
                            {{ ucfirst($role->name) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mt-6 flex items-center justify-between">
                <a href="{{ route('admin.users.index') }}" class="inline-flex items-center rounded-md border border-slate-200 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50">
                    Batal
                </a>
                <button
                    type="submit"
                    class="inline-flex items-center rounded-md bg-sky-600 px-4 py-2 text-sm font-semibold text-white hover:bg-sky-700"
                >
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection

