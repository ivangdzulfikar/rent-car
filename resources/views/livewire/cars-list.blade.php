<div class="container max-w-[900px] p-3 m-auto">
    <h1 class="font-bold text-4xl">Daftar Mobil</h1>

    @if (session('deleted'))

    <div class="text-green-500 font-bold">
        {{ session('deleted') }}
    </div>

    @endif
    @if (session('updated'))

    <div class="text-green-500 font-bold">
        {{ session('updated') }}
    </div>

    @endif

    <div class="flex justify-between gap-4 mt-4 itmes-center">
        <div class="">
            <a href="/addcar" class="px-4 py-2 rounded-md hover:bg-green-500 bg-green-700 text-white ">Tambah Mobil</a>
        </div>
        <div class="flex-1 self-center">
            <input wire:model.live="search" type="text" class="w-full h-9 rounded-md border-gray-400" />
        </div>
    </div>

    <div class="relative overflow-x-auto mt-8">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Merk Mobil
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Model
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Plat Nomor
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Harga Sewa/hari
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>

                </tr>
            </thead>
            <tbody>
                @if ($cars->count(0))

                @foreach ($cars as $car)
                <tr class="bg-white border-b  ">
                    @if ($editingCarId === $car->id)
                    <th>
                        <input wire:model.live.debounce.500ms="" type="text" placeholder="{{ $car->brand }}"
                            value="{{ $editingCarBrand }}"
                            class="bg-gray-100  text-gray-900 text-sm rounded block w-full h-7 p-2.5">

                        @error('editingCarBrand')
                        <span class="mt-1 text-red-500 text-xs block">{{ $message }}</span>
                        @enderror
                    </th>
                    @else
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap 
                    Apple MacBook Pro 17"> {{ $car->brand }} </th>
                    @endif

                    @if ($editingCarId === $car->id)
                    <th>
                        <input wire:model.live.debounce.500ms="editingCarModel" type="text"
                            placeholder="{{ $car->model }}" value="{{ $car->model }}"
                            class="bg-gray-100  text-gray-900 text-sm rounded block w-full h-7 p-2.5">

                        @error('editingCarModel')
                        <span class="mt-1 text-red-500 text-xs block">{{ $message }}</span>
                        @enderror
                    </th>
                    @else
                    <td class="px-6 py-4">
                        {{ $car->model }}
                    </td>
                    @endif

                    @if ($editingCarId === $car->id)
                    <th>
                        <input wire:model.live.debounce.500ms="editingCarNumberPlate" type="text"
                            placeholder="{{ $car->number_plate }}" value="{{ $car->number_plate }}"
                            class="bg-gray-100  text-gray-900 text-sm rounded block w-full h-7 p-2.5">

                        @error('editingCarNumberPlate')
                        <span class="mt-1 text-red-500 text-xs block">{{ $message }}</span>
                        @enderror
                    </th>
                    @else
                    <td class="px-6 py-4">
                        {{ $car->number_plate }}
                    </td>
                    @endif

                    @if ($editingCarId === $car->id)
                    <th>
                        <input wire:model.live.debounce.500ms="editingCarPricePerDay" type="text"
                            placeholder="{{ $car->price_perday }}" value="{{ $car->price_perday }}"
                            class="bg-gray-100  text-gray-900 text-sm rounded block w-full h-7 p-2.5">

                        @error('editingCarPricePerDay')
                        <span class="mt-1 text-red-500 text-xs block">{{ $message }}</span>
                        @enderror
                    </th>
                    @else
                    <td class="px-6 py-4">
                        Rp. {{ $car->price_perday }}
                    </td>
                    @endif
                    <td>
                        <div class="flex gap-1">

                            <button wire:click="delete({{ $car }})"
                                wire:confirm="yakin ingin menghapus {{ $car->brand }}, {{ $car->model }} ?"
                                class="bg-red-600 py-1 px-3 rounded hover:bg-red-400 ease-in-out duration-150 capitalize text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                            @if ($editingCarId === $car->id)
                            <button wire:click="update"
                                class="bg-sky-500 py-1 px-3 rounded hover:bg-sky-400 ease-in-out duration-150 capitalize text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m9 13.5 3 3m0 0 3-3m-3 3v-6m1.06-4.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                                </svg>

                            </button>
                            <button wire:click="cancelEdit"
                                class="bg-gray-500 py-1 px-3 rounded hover:bg-gray-400 ease-in-out duration-150 capitalize text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>


                            </button>

                        </div>
                        @else
                        <button wire:click="edit({{ $car->id }})"
                            class="bg-yellow-500 py-1 px-2 rounded hover:bg-yellow-400 ease-in-out duration-150 capitalize text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>

                        </button>
                        @endif
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td class="text-center font-medium text-xl pt-2" colspan="5">Data tidak ditemukan</td>not foun..
                </tr>
                @endif

            </tbody>
        </table>

        <div class="mt-5">
            {{ $cars->links() }}
        </div>
    </div>
</div>