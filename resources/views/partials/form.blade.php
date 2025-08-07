@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
        <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
@endif

<div class="mb-4">
    <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
    <input type="text" name="title" id="title" value="{{ old('title', $article->title ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
</div>

<div class="mb-4">
    <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Content</label>
    <textarea name="content" id="content" rows="10" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>{{ old('content', $article->content ?? '') }}</textarea>
</div>

<div class="mb-4">
    <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Image</label>
    <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 dark:file:bg-gray-700 file:text-violet-700 dark:file:text-gray-200 hover:file:bg-violet-100">
    @if (isset($article) && $article->image)
        <div class="mt-4">
            <p class="text-sm text-gray-500">Current Image:</p>
            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="h-20 w-auto rounded mt-2">
        </div>
    @endif
</div>

<div class="flex items-center justify-end mt-4">
    <a href="{{ route('admin.articles.index') }}" class="text-gray-600 dark:text-gray-400 underline mr-4">Cancel</a>
    <button type="submit" class="bg-[#283593] hover:bg-[#1A237E] text-white font-bold py-2 px-4 rounded-lg">
        {{ isset($article) ? 'Update Article' : 'Save Article' }}
    </button>
</div>