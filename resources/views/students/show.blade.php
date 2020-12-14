@extends('layouts.master')
@section('content')

    <div class="container my-3">
        <h1 class="bg-info text-center" >Podaci o Studentu</h1>
        <h3>{{ $student->ime }}</h3>
        <h3><h3>{{ $student->odsjek }}</h3></h3>
        <p>{{ $student->biografija }}</p>
        <img src="{{ $student->image }}" alt="slika_studenta">
    </div>

@endsection
