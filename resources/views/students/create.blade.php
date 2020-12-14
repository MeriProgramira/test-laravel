@extends('layouts.master')
@section('content')

    <div class="container">

         {{-- prikaz greske --}}
         @if ($errors->any())
         @foreach ($errors->all() as $error)
             <div class="alert-danger">{{ $error }}</div>
         @endforeach
         @endif

         <form action={{ route('create') }} method="POST" enctype="multipart/form-data"
         >@csrf
             {{-- unos imena studenta --}}
             <div class="form-group">
                 <label for="ime">Ime studenta</label>
                 <input type="text" name="ime"  class="form-control" value="{{ old('ime') }}">
             </div>
              {{-- unos odsjeka studenta --}}
              <div class="form-group">
                <label for="odsjek">Odsjek</label>
                <input type="text" name="odsjek"  class="form-control" value="{{ old('odsjek') }}">
            </div>
            {{-- unos biografije studenta --}}
             <div class="form-group">
                 <label for="">Biografija</label>
                 <textarea  name="biografija"  class="form-control">{{ old('biografija') }}</textarea>
             </div>
             {{-- unos slike studenta --}}
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
