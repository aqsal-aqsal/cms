@php
    /** @var \App\Models\Post|null $post */
@endphp

@csrf

<div class="space-y-4">
    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1">Judul</label>
        <input
            type="text"
            name="title"
            value="{{ old('title', $post->title ?? '') }}"
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
            value="{{ old('slug', $post->slug ?? '') }}"
            class="block w-full rounded-md border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:ring-sky-500"
        >
    </div>

    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1">Konten</label>
        <textarea
            name="content"
            rows="8"
            required
            class="block w-full rounded-md border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:ring-sky-500"
        >{{ old('content', $post->content ?? '') }}</textarea>
    </div>

    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1">Status</label>
        <select
            name="status"
            class="block w-full rounded-md border border-slate-300 px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:ring-sky-500"
        >
            @php
                $status = old('status', $post->status ?? 'draft');
            @endphp
            <option value="draft" @selected($status === 'draft')>Draft</option>
            <option value="published" @selected($status === 'published')>Publish</option>
        </select>
    </div>

    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1">Kategori</label>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm">
            @foreach ($categories as $category)
                <label class="flex items-center gap-2">
                    <input
                        type="checkbox"
                        name="categories[]"
                        value="{{ $category->id }}"
                        class="rounded border-slate-300 text-sky-600 focus:ring-sky-500"
                        @checked(in_array($category->id, old('categories', $selectedCategories ?? [])))
                    >
                    <span>{{ $category->name }}</span>
                </label>
            @endforeach
        </div>
    </div>
</div>

<div class="mt-6 flex items-center justify-between">
    <a href="{{ route('admin.posts.index') }}" class="inline-flex items-center rounded-md border border-slate-200 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50">
        Batal
    </a>
    <button
        type="submit"
        class="inline-flex items-center rounded-md bg-sky-600 px-4 py-2 text-sm font-semibold text-white hover:bg-sky-700"
    >
        Simpan
    </button>
</div>

