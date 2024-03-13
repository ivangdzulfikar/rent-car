<div class=" max-w-[500px] m-auto h-screen flex items-center">
    <div class="flex flex-col gap-4 items-center w-full rounded-md shadow-lg p-6">
        <h1 class="font-bold text-2xl text-center">Registrasi</h1>

        <form wire:submit="create" action="">
            @if (session('created'))

            <div class="text-green-500 font-bold">
                {{ session('created') }}
            </div>

            @endif

            <div class="flex gap-3 flex-col">

                <div class="flex flex-col gap">
                    <label class="text-sm text-gray-400" for="name">Nama</label>
                    <input wire:model.live="name" type="text" class="text-sm h-6 rounded-md border-gray-400 py-3" required />
                    @error('name')
                    <p class="text-red-700 text-xs">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col gap">
                    <label class="text-sm text-gray-400" for="name">E-mail</label>
                    <input wire:model.live="email" type="email" class="text-sm h-6 rounded-md border-gray-400 py-3" required />
                    @error('email')
                    <p class="text-red-700 text-xs">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label class="text-sm text-gray-400" for="name">Alamat</label>
                    <input wire:model.live="address" type="text" class="text-sm h-6 rounded-md border-gray-400 py-3" required />
                    @error('address')
                    <p class="text-red-700 text-xs">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label class="text-sm text-gray-400" for="name">No. Telpon</label>
                    <input wire:model.live="telepon" type="text" class="text-sm h-6 rounded-md border-gray-400 py-3" required />
                    @error('telepon')
                    <p class="text-red-700 text-xs">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label class="text-sm text-gray-400" for="name">Nomor SIM</label>
                    <input wire:model.live="SIM" type="text" class="text-sm h-6 rounded-md border-gray-400 py-3" required />
                    @error('SIM')
                    <p class="text-red-700 text-xs">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label class="text-sm text-gray-400" for="name">Password</label>
                    <input wire:model.live="password" type="password"
                        class="text-sm h-6 rounded-md border-gray-400 py-3" required />
                    @error('password')
                    <p class="text-red-700 text-xs">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <button type="submit"
                class="bg-sky-600 py-2 px-6 text-white rounded-md mt-3 hover:bg-sky-300">Submit</button>

            <div class="mt-6">
                <p class="text-">Sudah punya akun ? <a wire:navigate href="/login"
                        class="text-sky-500 hover:text-sky-700">Login
                        disini</a>.</p>
            </div>
        </form>
    </div>
</div>