@extends('layouts.master')
@section('content')

    <div class="container m-5">
        {{-- prikaz podataka o svim studentima --}}
        <table class="table">
            <thead class="thead-light">
                <th>ID</th>
                <th>Ime studenta</th>
                <th>Odsjek</th>
                <th>Prikazi</th>
                <th>Azuriraj</th>
                <th>Izbrisi</th>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->ime }}</td>
                        <td>{{ $student->odsjek }}</td>
                        <td><a href="{{ route('show', ['id'=>$student->id]) }}" class="btn btn-success">Prikazi</a></td>
                        <td><a href="{{ route('update-student', ['id'=>$student->id]) }}" class="btn btn-primary">Izmjeni</a></td>
                        <td><a href="{{ route('delete', ['id'=>$student->id]) }}" class="btn btn-danger">Izbrisi</a></td>
                    </tr>

                @endforeach
            </tbody>
        </table>

    </div>

@endsection
