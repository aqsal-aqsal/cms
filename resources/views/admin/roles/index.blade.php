@extends('layouts.app')

@section('title', 'Role')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-slate-900">Role</h1>
            <p class="mt-1 text-sm text-slate-500">
                Kelola role yang dapat diberikan ke pengguna.
            </p>
        </div>
        <a href="{{ route('admin.roles.create') }}" class="inline-flex items-center rounded-md bg-sky-600 px-4 py-2 text-sm font-semibold text-white hover:bg-sky-700">
            Tambah Role
        </a>
    </div>

    <div class="bg-white border border-slate-200 rounded-lg shadow-sm overflow-hidden">
        <table class="min-w-full text-sm">
            <thead class="bg-slate-50 text-slate-600">
                <tr>
                    <th class="px-4 py-3 text-left font-medium">Nama</th>
                    <th class="px-4 py-3 text-right font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($roles as $role)
                    <tr>
                        <td class="px-4 py-3 text-slate-900">
                            {{ $role->name }}
                        </td>
                        <td class="px-4 py-3 text-right space-x-2">
                            <a href="{{ route('admin.roles.edit', $role) }}" class="inline-flex items-center rounded-md border border-slate-200 px-3 py-1.5 text-xs font-medium text-slate-700 hover:bg-slate-50">
                                Edit
                            </a>
                            <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus role ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center rounded-md border border-red-200 px-3 py-1.5 text-xs font-medium text-red-700 hover:bg-red-50">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="px-4 py-6 text-center text-sm text-slate-500">
                            Belum ada role.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

