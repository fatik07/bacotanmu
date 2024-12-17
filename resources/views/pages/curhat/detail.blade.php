@extends('layouts.main')

@section('content')

<div class="flex items-center w-full md:w-3/4 lg:w-1/2 m-auto mt-6 font-comfortaa font-bold">
    <a href="/" class="mr-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-big-left-dash"><path d="M19 15V9"/><path d="M15 15h-3v4l-7-7 7-7v4h3v6z"/></svg>
    </a>
    <p class="text-xl">Disini Bacotanmu</p>
</div>

<div class="flex flex-col justify-center items-center mt-3">
    <div
        class="relative w-full md:w-3/4 lg:w-1/2 min-h-[270px] p-6 bg-white border-2 border-black rounded-lg shadow-custom font-poppins">
        <div class="hover-effect w-full">
            <div class="relative inline-block">
                <h5 class="mb-2 text-md font-semibold tracking-tight text-gray-700 underline-custom">Bacotanmu</h5>
            </div>

            <p class="mb-3 font-normal text-sm text-gray-900">{{ Str::limit($curhat->isi, 250, ' .....') }}</p>

        </div>

        <div class="absolute bottom-9 left-0 right-0 flex justify-between px-6 text-sm text-gray-500">
            <p>dari: anonymous</p>
            <p>{{ \Carbon\Carbon::parse($curhat->tanggal_posting)->diffForHumans() }}</p>
        </div>

        <div class="absolute bottom-3 left-0 right-0 px-6">
            @foreach ($curhat->categories as $tag)
            <span class="text-white text-xs font-medium px-2.5 py-0.5 rounded"
                style="background-color: {{ $tag->warna }}">{{
                $tag->name }}</span>
            @endforeach
        </div>
    </div>
</div>

<div class="flex flex-col justify-center items-center mt-4 gap-2">
    <span class="w-full md:w-3/4 lg:w-1/2 m-auto">{{ $comments->count() }} komentar</span>
    <x-comment name=""></x-comment>
    @forelse ($comments as $comment)
    @include('components.comment-detail')
    @empty
    <div class="text-center text-red-500">
        Tidak ada komentar
    </div>
    @endforelse
</div>

@endsection

<style>
    .underline-custom::after {
        content: '';
        position: absolute;
        right: 0;
        bottom: 8px;
        width: 50%;
        height: 2px;
        background-color: black;
        transform: rotate(-5deg);
        transform-origin: left;
    }
</style>