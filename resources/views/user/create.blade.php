@extends('layouts.app')

@section('content')

<div class="container adverts">
   <h1><span>Добавление пользователя</span></h1>
         <div class="text-center">
            @if( session('success') )
            <div class="alert alert-success">{{session('success')}}</div>
            @endif

              <form method="POST" action="/users" enctype="multipart/form-data" >

                   @include('user._form')

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Пароль</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid
                        @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Подтверждение пароля</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control  @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                         required autocomplete="new-password">
                         @error('password_confirmation')
                              <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                              </span>
                         @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">
                            Добавить
                        </button>
                    </div>
                </div>

              </form>
         </div>
</div>
@endsection