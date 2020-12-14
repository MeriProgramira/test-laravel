@extends('layouts.master')
@section('content')

    <div class="container">
         {{--  prikaz greske --}}
         @if ($errors->any())
         @foreach ($errors->all() as $error)
             <div class="alert-danger">{{ $error }}</div>
         @endforeach

         @endif

         <form action={{ route('update') }} method="POST" enctype="multipart/form-data">
             @csrf
             <input type="hidden" name="id" value="{{ $student->id }}">

             <div class="form-group">
                 <label for="">Ime studenta</label>
                 <input type="text" name="ime"  class="form-control" value="{{ $student->ime }}">
             </div>

             <div class="form-group">
                <label for="">Odsjek</label>
                <input type="text" name="odsjek"  class="form-control" value="{{ $student->odsjek }}">
            </div>

             <div class="form-group">
                 <label for="">Biografija</label>
                 <textarea  name="biografija"  class="form-control">{{ $student->biografija }}"</textarea>
             </div>

             <div class="file-field">
                 <div class="btn btn-primary btn-sm float-left">
                   <span>Odaberite sliku</span>
                   <input type="file" name="image">
                 </div>
                 <div class="file-path-wrapper ">
                   <input class="file-path validate mx-3" type="text" placeholder="Upload">
                 </div>
               </div>
               <input type="submit" value="Snimi">
         </form>
    </div>

@endsection
