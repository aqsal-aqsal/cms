@extends('layouts.app')

@section('title', 'Pengguna & Role')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-slate-900">Pengguna & Role</h1>
        <p class="mt-1 text-sm text-slate-500">
            Atur role pengguna yang dapat mengakses CMS.
        </p>
    </div>

    <div class="bg-white border border-slate-200 rounded-lg shadow-sm overflow-hidden">
        <table class="min-w-full text-sm">
            <thead class="bg-slate-50 text-slate-600">
                <tr>
                    <th class="px-4 py-3 text-left font-medium">Nama</th>
                    <th class="px-4 py-3 text-left font-medium">Email</th>
                    <th class="px-4 py-3 text-left font-medium">Role</th>
                    <th class="px-4 py-3 text-right font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($users as $user)
                    <tr>
                        <td class="px-4 py-3 text-slate-900">
                            {{ $user->name }}
                        </td>
                        <td class="px-4 py-3 text-slate-700">
                            {{ $user->email }}
                        </td>
                        <td class="px-4 py-3 text-slate-700">
                            <form method="POST" action="{{ route('admin.users.update', $user) }}" class="inline-flex items-center gap-2">
                                @csrf
                                @method('PUT')
                                <select
                                    name="role_id"
                                    class="rounded-md border border-slate-300 px-2 py-1 text-xs shadow-sm focus:border-sky-500 focus:ring-sky-500"
                                    onchange="this.form.submit()"
                                >
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" @selected($user->role_id === $role->id)>
                                            {{ ucfirst($role->name) }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                        </td>
                        <td class="px-4 py-3 text-right text-xs text-slate-400">
                            ID: {{ $user->id }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-sm text-slate-500">
                            Belum ada pengguna.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

