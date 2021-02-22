@extends('layouts.app')

@section('content')

<div class="container adverts">
   <h1><span>Редактирование группы</span></h1>
         <div class="text-center">
            @if( session('success') )
            <div class="alert alert-success">{{session('success')}}</div>
            @endif

              <form method="POST" action="/groups/{{$group->id}}" >
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Название</label>
                    <div class="col">
                        <input id="name" type="text" value="{{$group->name}}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
                        @error('name')
                             <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                             </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">
                            Сохранить
                        </button>
                    </div>
                </div>
              </form>
         </div>



</div>
@endsection