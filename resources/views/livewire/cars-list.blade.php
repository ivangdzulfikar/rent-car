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
                        <input wire:model.live.debounce.500ms="editingCarBrand" type="text"
                            placeholder="{{ $car->brand }}" value="{{ $car->brand }}"
                            class="bg-gray-100  text-gray-900 text-sm rounded block w-full p-2.5">

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
                            class="bg-gray-100  text-gray-900 text-sm rounded block w-full p-2.5">

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
                            class="bg-gray-100  text-gray-900 text-sm rounded block w-full p-2.5">

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
                            class="bg-gray-100  text-gray-900 text-sm rounded block w-full p-2.5">

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
                        <button wire:click="delete({{ $car }})"
                            wire:confirm="yakin ingin menghapus {{ $car->brand }}, {{ $car->model }} ?"
                            class="bg-red-600 py-1 px-3 rounded hover:bg-red-800 ease-in-out duration-150 capitalize text-white">delete</button>
                        @if ($editingCarId === $car->id)
                        <button wire:click="update"
                            class="bg-sky-500 py-1 px-3 rounded hover:bg-sky-800 ease-in-out duration-150 capitalize text-white">save</button>
                        @else
                        <button wire:click="edit({{ $car->id }})"
                            class="bg-yellow-500 py-1 px-3 rounded hover:bg-yellow-800 ease-in-out duration-150 capitalize text-white">edit</button>
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