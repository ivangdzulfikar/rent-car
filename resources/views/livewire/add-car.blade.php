<div class="container max-w-[900px] p-3 m-auto">
    <h1 class="font-bold text-4xl mb-5">Tambah Mobil</h1>

    <a href="/cars" wire:navigate
        class="py-2 w-1/5 px-3 items-center bg-gray-300 rounded-md mb-5 flex gap-2 hover:bg-gray-400">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
        </svg>
        Daftar Mobil..
    </a>

    <form wire:submit="create" action="">
        @if (session('created'))

        <div class="text-green-500 font-bold">
            {{ session('created') }}
        </div>

        @endif

        <div class="flex gap-3 flex-col">

            <div class="flex flex-col gap">
                <label class="text-sm text-gray-400" for="name">Merk Mobil</label>
                <input wire:model.live="brand" type="text" class="text-sm h-10 rounded-md border-gray-400 py-3"
                    required />
                @error('brand')
                <p class="text-red-700 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col gap">
                <label class="text-sm text-gray-400" for="name">Model Mobil</label>
                <input wire:model.live="model" type="text" class="text-sm h-10 rounded-md border-gray-400 py-3"
                    required />
                @error('model')
                <p class="text-red-700 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col">
                <label class="text-sm text-gray-400" for="name">Plat Nomor</label>
                <input wire:model.live="number_plate" type="text" class="text-sm h-10 rounded-md border-gray-400 py-3"
                    required />
                @error('number_plate')
                <p class="text-red-700 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col">
                <label class="text-sm text-gray-400" for="name">Harga Sewa / Hari</label>
                <input wire:model.live="price_perday" type="text" class="text-sm h-10 rounded-md border-gray-400 py-3"
                    required />
                @error('price_perday')
                <p class="text-red-700 text-xs">{{ $message }}</p>
                @enderror
            </div>

        </div>

        <button type="submit" class="bg-sky-600 py-2 px-6 text-white rounded-md mt-3 hover:bg-sky-300">Submit</button>

    </form>
</div>