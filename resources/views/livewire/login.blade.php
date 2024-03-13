<div class=" max-w-[500px] m-auto h-screen flex items-center">
    <div class="flex flex-col gap-4 items-center w-full rounded-md shadow-lg p-6">
        <h1 class="font-bold text-2xl text-center">Registrasi</h1>

        <form wire:submit="login" action="">
            @if (session('created'))

            <div class="text-green-500 font-bold">
                {{ session('created') }}
            </div>

            @endif

            <div class="flex gap-3 flex-col">

                <div class="flex flex-col gap">
                    <label class="text-sm text-gray-400" for="name">E-mail</label>
                    <input wire:model.live="email" type="email" class="text-sm h-6 rounded-md border-gray-400 py-3"
                        required />
                    @error('email')
                    <p class="text-red-700 text-xs">{{ $message }}</p>
                    @enderror

                </div>
                <div class="flex flex-col gap">
                    <label class="text-sm text-gray-400" for="name">Password</label>
                    <input wire:model.live="password" type="password"
                        class="text-sm h-6 rounded-md border-gray-400 py-3" required />
                    @error('password')
                    <p class="text-red-700 text-xs">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <button type="submit"
                class="bg-sky-600 py-2 px-6 text-white rounded-md mt-3 hover:bg-sky-300">login</button>

            <div class="mt-6">
                <p class="">Belum punya akun ? <a wire:navigate href="/register"
                        class="text-sky-500 hover:text-sky-700">Registrasi
                        disini</a>.</p>
            </div>
        </form>
    </div>
</div>