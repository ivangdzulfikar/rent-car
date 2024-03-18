<div class="container max-w-[900px] p-3 m-auto">
    <h1 class="font-bold text-4xl mb-8">Profile</h1>

    @if (session('updated'))

    <div class="text-green-500 font-bold">
        {{ session('updated') }}
    </div>

    @endif

    <div>
        <form wire:submit="edit" action="">

            <div class="flex flex-col gap-4">

                <label class="flex flex-col cursor-pointer">
                    Nama
                    <input wire:model='name' class="h-7 py-4 px-2 rounded-md w-1/2" type="text">
                </label>

                <label class="flex flex-col cursor-pointer">
                    Email
                    <input wire:model='email' class="h-7 py-4 px-2 rounded-md w-1/2" type="text">
                </label>

                <label class="flex flex-col cursor-pointer">
                    Address
                    <input wire:model='address' class="h-7 py-4 px-2 rounded-md w-1/2" type="text">
                </label>

                <label class="flex flex-col cursor-pointer">
                    SIM
                    <input wire:model='sim' class="h-7 py-4 px-2 rounded-md w-1/2" type="text">
                </label>

                <label class="flex flex-col cursor-pointer">
                    Telepon
                    <input wire:model='telepon' class="h-7 py-4 px-2 rounded-md w-1/2" type="text">
                </label>

            </div>

            <button
                class="py-px px-3 mt-5 bg-yellow-500 text-white rounded hover:bg-yellow-400 cursor-pointer">Edit</button>
        </form>
    </div>
</div>