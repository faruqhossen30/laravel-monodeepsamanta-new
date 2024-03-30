@php
    use App\Models\GalleryCategory;
    $categories = GalleryCategory::get();
@endphp

<div id="addVideoModal" tabindex="-1" aria-hidden="true"
    class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full overflow-y-auto overflow-x-hidden p-4 md:inset-0">
    <div class="relative max-h-full w-full max-w-4xl">
        <!-- Modal content -->
        <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between rounded-t border-b p-5 dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white lg:text-2xl">
                    Add Video IFrame
                </h3>
                <button type="button" onclick="hideAddVideoModal()"
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
                <div class="p-4 ">
                    <x-form.textarea name="iframe" label="Video IFrame" />
                </div>
                <div id="multiPhotoModalBoddy"></div>
                <div>

                </div>
            </div>
            <!-- Modal footer -->
            <div
                class="flex items-center space-x-2 rtl:space-x-reverse rounded-b border-t border-gray-200 p-6 dark:border-gray-600">
                <button type="button" id="modalInsertVideoButton"
                    class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:border-gray-500 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">
                    Insert Video
                </button>
            </div>
        </div>
    </div>
</div>
@prepend('script')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        var addVideoModal = document.getElementById("addVideoModal");
        const addVideoModaloptions = {
            placement: "top-center",
            backdrop: "static",
            backdropClasses: "bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40",
            closable: true,
            onHide: () => {
                $('#multiPhotoModalBoddy').empty();
                console.log('multi modal hide');
            },
            onShow: () => {
                console.log("multi modal is shown");
            },
            onToggle: () => {
                console.log("modal has been toggled");
            },
        };

        function showAddVideoModal() {
            var addVideoModalObject = new Modal(addVideoModal, addVideoModaloptions);
            addVideoModalObject.show();
        }

        function hideAddVideoModal() {
            var addVideoModalObject = new Modal(addVideoModal, addVideoModaloptions);
            addVideoModalObject.hide();
        }
    </script>

    <script>


        $(document).on('click', '#modalInsertVideoButton', function() {
           let iframe = $('textarea[name="iframe"]').val();
           photos.push(iframe);
           console.log(photos);
           generatePhotoInput();
        });

    </script>
@endprepend
