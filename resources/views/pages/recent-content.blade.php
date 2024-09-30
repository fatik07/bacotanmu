<div class="mt-8">
    <div class="flex justify-center gap-7 items-center flex-wrap">
        @foreach ($curhats as $curhat)
        @include('components.card')
        @endforeach
    </div>
    <div class="flex justify-center items-center mt-5">
        <x-a-link url="/curhat-semua" color="bg-secondary-700 text-white hover:bg-secondary-500 font-comfortaa">
            Lihat Semua
        </x-a-link>
    </div>
</div>

<x-alert></x-alert>