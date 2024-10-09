@props(['name'])

<div class="relative w-full md:w-3/4 lg:w-1/2">
    <div class="bg-white border-2 border-black rounded-md shadow-sm w-full h-full bg-card flex flex-col">
        <form action="" method="post">
            @csrf
            <textarea name="isi"
                class="w-full h-[80%] resize-none bg-transparent py-2 px-4 placeholder:text-muted-foreground focus:outline-none focus:ring-0 focus:ring-offset-0 focus:border-none border-none"
                placeholder="Tulis sesuatu di sini..."></textarea>

            <hr class="w-full m-auto border-1 border-black" />

            <div class="h-[20%] flex justify-end items-center pe-2 p-2">
                <button class="px-4 py-2 bg-sky-600 text-white text-sm rounded-md hover:bg-sky-500 transition-colors">
                    Kirim
                </button>
            </div>
        </form>
    </div>
</div>

<x-alert></x-alert>

@error('isi')
<div class="block text-red-600 w-full md:w-3/4 lg:w-1/2 text-sm mb-2">
    {{ $message }}
</div>
@enderror