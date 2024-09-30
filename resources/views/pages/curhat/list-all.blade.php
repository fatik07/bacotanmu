@extends('layouts.main')

@section('content')

@foreach ($curhats as $curhat)
@include('components.card')
@endforeach

@endsection