<div>
    <div class="grid grid-cols-6 gap-x-3 ">
        <div
            class="col-span-1 flex items-center justify-center text-center border border-slate-200 rounded shadow-sm bg-white">
            <div class="font-semibold text-slate-400 w-32 bg-white p-2.5 border-r rounded-l">
                Per Page
            </div>
            <div class="rounded-r flex bg-white pr-2 w-full">
                <select name="perPage" wire:model="perPage" class="p-2.5 w-full outline-none bg-white">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                </select>
            </div>
        </div>
        <div class="col-span-5 border border-slate-200 bg-white rounded shadow-sm">
            <div class="flex justify-between items-center">
                <div class="w-full p-2.5">
                    <input type="text" placeholder="Search users on this page..." class="w-full outline-none"
                        wire:model='search'>
                </div>
                <div class="p-2.5">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col border-1 rounded border-slate-200 my-3 shadow-sm">
        <div class="inline-block rounded">
            <div class="overflow-hidden rounded">
                <table class="min-w-full bg-white rounded">
                    <thead class="border-b border-slate-200">
                        <tr>
                            <th class="text-sm font-semibold text-slate-400 py-2.5 px-4 text-center">
                                ID
                            </th>
                            <th class="text-sm font-semibold text-slate-400 py-2.5 px-4 text-center">
                                Image
                            </th>
                            <th class="text-sm font-semibold text-slate-400 py-2.5 px-4 text-left">
                                Name
                            </th>
                            <th class="text-sm font-semibold text-slate-400 py-2.5 px-1 text-left">
                                Email
                            </th>
                            <th class="text-sm font-semibold text-slate-400 py-2.5 px-1 text-left">
                                Job Title
                            </th>
                            <th class="text-sm font-semibold text-slate-400 py-2.5 px-1 text-left">
                                Created At
                            </th>
                            <th class="text-sm font-semibold text-slate-400 py-2.5 px-1 text-left">
                                Updated At
                            </th>
                            <th class="text-sm font-semibold text-slate-400 py-2.5 px-1 text-left">
                                Action
                            </th>
                        </tr>
                    </thead>
                    @forelse($users as $user)
                    <tbody>
                        <td class="whitespace-nowrap text-sm font-semibold text-blue-900 text-center">{{$user->id}}
                        </td>
                        <td
                            class="text-sm text-blue-900 py-2.5 px-1 font-semibold  whitespace-nowrap flex justify-center items-baseline ">

                            <img src="{{Storage::disk('s3')->url($user->image)}}" alt="image" class="w-14
                            rounded">
                        </td>
                        <td class="text-sm text-blue-900 font-semibold whitespace-nowrap p-4">
                            {{$user->name}}
                        </td>
                        <td class="text-sm text-blue-900 px-1 font-semibold whitespace-nowrap">
                            {{$user->email}}
                        </td>
                        <td
                            class="text-sm text-blue-900 px-1 font-semibold whitespace-nowrap text-clip overflow-hidden">
                            {{$user->job_title}}
                        </td>
                        <td class="text-sm text-blue-900 px-1 font-semibold whitespace-nowrap overflow-hidden">
                            {{$user->created_at->diffForHumans()}}
                        </td>
                        <td class="text-sm text-blue-900 px-1 font-semibold whitespace-nowrap overflow-hidden">
                            {{$user->updated_at->diffForHumans()}}
                        </td>
                        <td
                            class="text-sm text-blue-900 px-1 font-semibold whitespace-nowrap overflow-hidden text-center">
                            <div class="flex">

                                <div class="pr-2">
                                    <a href={{route('users.edit', $user)}}>
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </div>
                                <div>
                                    <div>
                                        <a href="" wire:click.prevent="deleteConfirm({{$user->id}})">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </td>

                        @empty
                        <tr>
                            <td colspan="8">
                                <div
                                    class="flex justify-center items-center py-8 text-xl text-slate-400 font-semibold flex-col">
                                    <p>No Users found...</p>
                                    <a href="{{route('users.index')}}" class="underline text-xs mt-1">Go back</a>
                                </div>
                            </td>

                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>

        </div>

    </div>
    <div class="flex justify-between items-center">
        <div>
            <a href="{{route('users.create')}}">
                <div class="bg-blue-900 rounded px-3 py-2 shadow-sm inline-block">
                    <div class="text-white font-semibold text-sm">Create User</div>
                </div>
            </a>
        </div>
        <div>
            @if(count($users))
            {{ $users->links('livewire.pagination-links') }}
            @endif
        </div>
    </div>

</div>