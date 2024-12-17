<div class="mt-8">
    <div class="flex justify-center gap-7 items-center flex-wrap">
        @forelse ( $curhats as $curhat )
        @include('components.card')
        @empty
        <div class="text-center text-red-500">
            Data Bacotanmu Belum ada nihhh.
        </div>
        @endforelse
    </div>

    @if ( $curhats->count() >= 1) <div class="flex justify-center items-center mt-5">
        <x-a-link url="/curhat-semua" color="bg-secondary-700 text-white hover:bg-secondary-500 font-comfortaa">
            Lihat Semua
        </x-a-link>
    </div>
    @endif
</div>

<x-alert></x-alert>