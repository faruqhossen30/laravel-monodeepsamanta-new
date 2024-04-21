<div  x-data="{ video: false }">
    <label class="inline-flex items-center me-5 cursor-pointer space-x-2 py-2">
        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Video
        </span>
        <input type="checkbox" value="" class="sr-only peer" x-on:click="video =!video" >
        <div
            class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600">
        </div>
    </label>
    <div x-show="video">
        <div class="space-y-1 py-1">
            <label for="pull_zone" class="text-gray-500 dark:text-gray-500 text-sm font-medium">Zone</label>
            <input id="pull_zone" type="text" name="pull_zone" value="https://vz-042d75cc-e8d.b-cdn.net"
                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                placeholder="Zone" x-bind:required="video" >
            @error('pull_zone')
                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="space-y-1 py-1">
            <label for="video_id" class="text-gray-500 dark:text-gray-500 text-sm font-medium">Video ID</label>
            <input id="video_id" type="text" name="video_id"
                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                placeholder="Video ID" x-bind:required="video" >
            @error('video_id')
                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="py-1">
            <label for="resolution" class="text-gray-500 dark:text-gray-500">Video Resulation</label>
            <select name="resolution" id="resolution"
                class="js-example-basic-multiple py-2 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" x-bind:required="video">
                <option value="">Select</option>
                <option value="240p">240p</option>
                <option value="360p">360p</option>
                <option value="480p">480p</option>
                <option value="720p">720p</option>
            </select>
            @error('{{ $resolution }}')
                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror
        </div>

    </div>
</div>
