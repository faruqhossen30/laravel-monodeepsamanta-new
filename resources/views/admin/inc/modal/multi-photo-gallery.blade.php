@php
    use App\Models\Admin\GalleryCategory;
    $categories = GalleryCategory::get();
@endphp

<div id="multiPhtoModal" tabindex="-1" aria-hidden="true"
    class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full overflow-y-auto overflow-x-hidden p-4 md:inset-0">
    <div class="relative max-h-full w-full max-w-4xl">
        <!-- Modal content -->
        <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between rounded-t border-b p-5 dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white lg:text-2xl">
                    Multiple Image Gallery
                </h3>
                <button type="button" onclick="hideMultiPhotoModal()"
                    class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="px-2">
                <div class="p-4 flex items-center space-x-5">
                    <label for="gallery_cat_id" class="block text-sm font-medium mb-2 dark:text-white">Category</label>
                    <select id="gallery_cat_id" name="gallery_cat_id"
                        class="py-2 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-gray-500 focus:ring-gray-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                        <option value="">All</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div id="multiPhotoModalBoddy"></div>
                <div>

                </div>
            </div>
            <!-- Modal footer -->
            <div
                class="flex items-center space-x-2 rtl:space-x-reverse rounded-b border-t border-gray-200 p-6 dark:border-gray-600">
                <button type="button" onclick="hideMultiPhotoModal()"
                    class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:border-gray-500 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">
                    Insert
                </button>
            </div>
        </div>
    </div>
</div>
@prepend('script')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        var myMultiModal = document.getElementById("multiPhtoModal");
        const multiPhtoModaloptions = {
            placement: "top-center",
            backdrop: "static",
            backdropClasses: "bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40",
            closable: true,
            onHide: () => {
                $('#multiPhotoModalBoddy').empty();
                console.log('multi modal hide');
            },
            onShow: () => {
                let gallery_cat_id = $('select[name="gallery_cat_id"]').val();
                console.log(gallery_cat_id);
                $.ajax({
                    url: '{{ route('ajax.multiphto.galleries') }}',
                    data: {
                        gallery_cat_id: gallery_cat_id
                    },
                    success: function(res) {
                        // console.log(res);
                        $('#multiPhotoModalBoddy').append(res);
                    }
                })
                console.log("multi modal is shown");
            },
            onToggle: () => {
                console.log("modal has been toggled");
            },
        };

        function showMultiPhotoModal() {
            var myMultiModalObject = new Modal(myMultiModal, multiPhtoModaloptions);
            myMultiModalObject.show();
        }

        function hideMultiPhotoModal() {
            var myMultiModalObject = new Modal(myMultiModal, multiPhtoModaloptions);
            myMultiModalObject.hide();
        }
    </script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('change', 'select[name="gallery_cat_id"]', function(e) {
            let gallery_cat_id = $('select[name="gallery_cat_id"]').val();
            console.log('gallery_cat_id change');
            console.log(gallery_cat_id);
            $.ajax({
                url: '{{ route('ajax.multiphto.galleries') }}',
                data: {
                    gallery_cat_id: gallery_cat_id
                },
                success: function(res) {
                    $('#multiPhotoModalBoddy').empty();
                    $('#multiPhotoModalBoddy').append(res);
                }
            })
        })

        $(document).on('click', '.multiPhotoPagination a', function(e) {
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1]
            recordMultiPhotoModal(page)
        })

        function recordMultiPhotoModal(page) {
            let gallery_cat_id = $('select[name="gallery_cat_id"]').val();
            $.ajax({
                url: "/ajax/multi-photo/galleries/paginate?page=" + page,
                data: {
                    gallery_cat_id: gallery_cat_id
                },
                success: function(res) {
                    console.log('paginate');
                    $('#multiPhotoModalBoddy').empty();
                    $('#multiPhotoModalBoddy').append(res);
                }
            })
        }


        var photos = [];
        $(document).on('click', 'input[name="images"]', function(e) {
            let photo = $(this).val();
            pushUnique(photos, photo)
            console.log('click', photo);
            generatePhotoInput();
        });

        function pushUnique(arr, value) {
            // Check if the value already exists in the array
            const index = arr.indexOf(value);
            // If the value exists, remove it
            if (index !== -1) {
                arr.splice(index, 1);
            } else {
                // Push the new value into the array
                arr.push(value);
            }

        }

        function removePhoto(value) {
            pushUnique(photos, value);
            generatePhotoInput();
        }


        function generatePhotoInput() {
            $('#photosDiv').empty();
            $.each(photos, function(index, value) {
                $('#photosDiv').append(
                    `
                    <div class="flex items-center justify-between border dark:border-gray-800">
                        <input type="hidden" value="${value}" name="slider[]">
                        <img src="${window.location.origin}/uploads/galleries/${value}" class="w-10 h-10"
                            alt="Image">
                        <span class="px-4 text-red-500 cursor-pointer" onclick="removePhoto('${value}')">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </span>
                    </div>
                    `
                )
            });
        }
    </script>
@endprepend
