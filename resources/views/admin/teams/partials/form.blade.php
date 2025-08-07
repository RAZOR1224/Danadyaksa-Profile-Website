@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
        <strong class="font-bold">Oops!</strong> <span class="block sm:inline">There were some problems with your input.</span>
        <ul class="mt-3 list-disc list-inside">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
@endif

<div class="mb-6">
    <label for="full_name" class="block text-sm font-medium text-gray-700">Full Name</label>
    <input type="text" name="full_name" id="full_name" value="{{ old('full_name', $team->full_name ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
</div>

<div class="mb-6">
    <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
    <input type="text" name="position" id="position" value="{{ old('position', $team->position ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
</div>

<div class="mb-6">
    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
    <textarea name="description" id="description" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('description', $team->description ?? '') }}</textarea>
</div>

<div class="mb-6">
    <label for="image" class="block text-sm font-medium text-gray-700">Photo</label>
    <input type="file" name="image" id="image" class="mt-2 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100">
    @if (isset($team) && $team->image)
        <div class="mt-4">
            <p class="text-sm text-gray-500">Current Photo:</p>
            <img src="{{ asset('storage/' . $team->image) }}" alt="{{ $team->full_name }}" class="h-20 w-20 rounded-full object-cover mt-2">
        </div>
    @endif
</div>

<div class="flex items-center justify-end mt-8 gap-4">
    <a href="{{ route('admin.teams.index') }}" class="text-gray-600 underline">Cancel</a>
    <button type="submit" class="bg-[#283593] hover:bg-[#1A237E] text-white font-bold py-2 px-6 rounded-lg">
        {{ isset($team) ? 'Update Member' : 'Save Member' }}
    </button>
</div>