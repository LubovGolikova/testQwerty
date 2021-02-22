@extends('layouts.app')

@section('content')

<div class="container adverts">
   <h1><span>Редактирование пользователя</h1>
         <div class="text-center">
            @if( session('success') )
            <div class="alert alert-success">{{session('success')}}</div>
            @endif

              <form method="POST" action="/users/{{$user->id}}" enctype="multipart/form-data" >
                    @method('PUT')
                   @include('user._form')

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