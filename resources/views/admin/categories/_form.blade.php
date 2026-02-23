@csrf

<div class="space-y-4">
    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1">Nama</label>
        <input
            type="text"
            name="name"
            value="{{ old('name', $category->name ?? '') }}"
            required
            class="block w-full rounded-md border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:ring-sky-500"
        >
    </div>

    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1">
            Slug
            <span class="text-xs text-slate-400">(kosongkan untuk generate otomatis)</span>
        </label>
        <input
            type="text"
            name="slug"
            value="{{ old('slug', $category->slug ?? '') }}"
            class="block w-full rounded-md border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:ring-sky-500"
        >
    </div>
</div>

<div class="mt-6 flex items-center justify-between">
    <a href="{{ route('admin.categories.index') }}" class="inline-flex items-center rounded-md border border-slate-200 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50">
        Batal
    </a>
    <button
        type="submit"
        class="inline-flex items-center rounded-md bg-sky-600 px-4 py-2 text-sm font-semibold text-white hover:bg-sky-700"
    >
        Simpan
    </button>
</div>

