@extends('layouts.main')

@section('content')

<div class="mt-8">
    <x-category></x-category>
</div>

<div class="mt-9">
    <div id="curhat-container" class="flex justify-center gap-7 items-center flex-wrap">
        @foreach ($curhats as $curhat)
        @include('components.card')
        @endforeach
    </div>

    <div id="load-more-container" class="flex justify-center items-center mt-5">
        @if ($curhats->count() >= 6)
        <x-button id="load-more" color="px-4 py-2 bg-secondary-700 text-white hover:bg-secondary-500 font-comfortaa">
            Tampilkan lebih banyak</x-button>
        @endif
    </div>
</div>

<style>
    #load-more {
        position: relative;
    }

    #load-more::after {
        content: '';
        position: absolute;
        left: 50%;
        top: 50%;
        width: 20px;
        height: 20px;
        border: 2px solid rgba(255, 255, 255, 0.6);
        border-top: 2px solid white;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        display: none;
    }

    #load-more.loading::after {
        display: block;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>

<script>
    let skip = {{ $curhats->count() }};

    document.getElementById('load-more').addEventListener('click', function() {
    const button = document.getElementById('load-more');
    button.innerHTML = 'Loading...';

    fetch(`{{ route('curhats.loadMore') }}?skip=${skip}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('curhat-container').insertAdjacentHTML('beforeend', data.curhats);

            skip += 6;
            if (!data.showMoreButton) {
                document.getElementById('load-more-container').remove();
            } else {
                button.innerHTML = 'Tampilkan lebih banyak';
            }
        })
        .catch(error => {
            console.error('Error loading more curhats:', error);
            button.innerHTML = 'Tampilkan lebih banyak';
        });
});
</script>

@endsection