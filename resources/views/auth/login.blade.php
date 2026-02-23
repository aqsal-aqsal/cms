@extends('layouts.app')

@section('title', 'Login Admin')

@section('content')
    <div class="min-h-[60vh] flex items-center justify-center">
        <div class="w-full max-w-md bg-white shadow-sm rounded-lg border border-slate-200 p-6">
            <h1 class="text-lg font-semibold mb-1 text-slate-900">Masuk ke CMS</h1>
            <p class="text-sm text-slate-500 mb-5">
                Silakan masuk menggunakan akun yang sudah terdaftar.
            </p>

            @if ($errors->any())
                <div class="mb-4 rounded-md border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.attempt') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        class="block w-full rounded-md border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:ring-sky-500"
                    >
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-slate-700 mb-1">Password</label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        class="block w-full rounded-md border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:ring-sky-500"
                    >
                </div>

                <div class="pt-2">
                    <button
                        type="submit"
                        class="w-full inline-flex items-center justify-center rounded-md bg-sky-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-1"
                    >
                        Masuk
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

