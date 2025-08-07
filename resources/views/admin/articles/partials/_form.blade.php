{{-- Menampilkan error validasi jika ada --}}
@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
        <strong class="font-bold">Oops!</strong>
        <span class="block sm:inline">There were some problems with your input.</span>
        <ul class="mt-3 list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Input Judul --}}
<div class="mb-6">
    <label for="title" class="block text-sm font-medium text-gray-700">{{ __('admin.form_title') }}</label>
    <input type="text" name="title" id="title" value="{{ old('title', $article->title ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
</div>

{{-- Input Konten --}}
<div class="mb-6">
    <label for="content" class="block text-sm font-medium text-gray-700">{{ __('admin.form_content') }}</label>
    <textarea name="content" id="content" rows="10" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>{{ old('content', $article->content ?? '') }}</textarea>
</div>

{{-- Input Gambar --}}
<div class="mb-6">
    <label for="image" class="block text-sm font-medium text-gray-700">{{ isset($article) ? __('admin.form_image_change') : __('admin.form_image') }}</label>
    <input type="file" name="image" id="image" class="mt-2 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100">
    @if (isset($article) && $article->image)
        <div class="mt-4">
            <p class="text-sm text-gray-500">{{ __('admin.form_image_current') }}</p>
            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="h-20 w-auto rounded mt-2">
        </div>
    @endif
</div>

{{-- Tombol Aksi --}}
<div class="flex items-center justify-end mt-8 gap-4">
    <a href="{{ route('admin.articles.index') }}" class="text-gray-600 underline">{{ __('admin.action_cancel') }}</a>
    <button type="submit" class="bg-[#283593] hover:bg-[#1A237E] text-white font-bold py-2 px-6 rounded-lg">
        {{ isset($article) ? __('admin.btn_update') : __('admin.btn_save') }}
    </button>
</div>