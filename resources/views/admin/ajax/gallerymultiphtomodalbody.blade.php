<div class="px-4">
    <ul class="grid w-full gap-4 md:grid-cols-4" id="imageGalleryList">
        @forelse ($thumbnails as $gallery)
            <li>
                <input type="checkbox" name="images" id="gallaryMultiPhoto-{{ $gallery->id }}" value="{{ $gallery->name }}"
                    class="hidden peer">
                <label for="gallaryMultiPhoto-{{ $gallery->id }}"
                    class="inline-flex items-center justify-between w-full p-2 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <div class="block">
                        <img class="w-full rounded-lg max-h-72" src="{{ asset('uploads/galleries/' . $gallery->name) }}"
                            alt="">
                    </div>
                </label>
            </li>
        @empty
            <span class="text-center">No Image found</span>
        @endforelse
    </ul>
    <div class="py-4 multiPhotoPagination">
        {{ $thumbnails->links() }}
    </div>
</div>
