@extends('layouts.main')

@section('content')
<form action="{{ route('curhat-baru.create') }}" method="POST">
    @csrf

    <div class="flex flex-col justify-center items-center mt-10">
        <x-textarea name="isi"></x-textarea>
    </div>

    <div class="py-8 flex justify-center items-center">
        <x-button-submit url="/curhat-baru" color="bg-secondary-700 text-white hover:bg-secondary-500 font-comfortaa">
            Kirim
            Sekarang</x-button-submit>
    </div>
</form>
@endsection