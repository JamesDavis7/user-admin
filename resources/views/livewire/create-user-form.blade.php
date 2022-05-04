<div>
    <form action="/users" method="post" class="bg-white p-3 rounded border-1 border-slate-200 shadow-sm"
        wire:submit.prevent="submit" enctype="multipart/form-data">
        <div class="grid lg:grid-cols-2 gap-3">
            <div>
                <label for="name" class="text-sm text-blue-900 font-semibold">Name:</label>
                <div>
                    <input type="text" wire:model.defer="name"
                        class="w-full bg-slate-100 py-2 px-3 mt-2 outline-none rounded text-slate-900 border-1 border-slate-200">
                </div>
                @error('name') <span class="error text-red-600">{{ $message }}</span> @enderror

            </div>
            <div>
                <label for="email" class="text-sm text-blue-900 font-semibold">Email:</label>
                <div>
                    <input type="email" wire:model.defer="email"
                        class="w-full bg-slate-100 py-2 px-3 mt-2 outline-none rounded text-slate-900 border-1 border-slate-200">
                </div>
                @error('email') <span class="error text-red-600 ">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="job_title" class="text-sm text-blue-900 font-semibold">Job Title:</label>
                <div>
                    <input type="text" wire:model.defer="job_title"
                        class="w-full bg-slate-100 py-2 px-3 mt-2 outline-none rounded text-slate-900 border-1 border-slate-200">
                </div>
                @error('job_title') <span class="error text-red-600">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="image" class="text-sm text-blue-900 font-semibold">Image: <span class="text-xs">(Max:
                        1MB)</span></label>
                <div>
                    <input type="file" wire:model.defer="image"
                        class="w-full bg-slate-100 mt-2 outline-none rounded text-slate-900 border-1 border-slate-200">
                </div>
                @error('image') <span class="error text-red-600">{{ $message }}</span> @enderror
            </div>
        </div>


        <div class="flex mt-3 gap-x-2">
            <button class="bg-blue-900 text-white font-semibold text-sm rounded px-3 py-2 inline-block shadow-sm"
                wire:click.prevent="store()">
                <div class="font-semibold">Create</div>
            </button>
            <div>
                <a href="{{route('users.index')}}"
                    class="bg-red-600 rounded px-3 py-2 inline-block shadow-sm text-white font-semibold text-sm">
                    <div class="text-white">Cancel</div>
                </a>

            </div>
        </div>
</div>

</form>
</div>