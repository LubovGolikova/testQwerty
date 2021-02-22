@extends('layouts.app')

@section('content')

<div class="container adverts">
   <h1><span>Добавление группы</span></h1>
         <div class="text-center">
            @if( session('success') )
            <div class="alert alert-success">{{session('success')}}</div>
            @endif

              <form method="POST" action="/groups" >
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Название</label>
                    <div class="col">
                        <input id="name" type="text" value="{{$group->name}}" class="form-control @error('name')
                         is-invalid @enderror" name="name" value="{{ old('name') }}" required>
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


        <h2 class="h1"><span>Все группы</span></h2>
         <table class="table">
             <thead>
             <tr>
                 <th>ID</th>
                 <th>Название группы</th>
                 <th></th>
             </tr>
             </thead>
             <tbody>
             @foreach($groups as $group)
             <tr>
                 <td>{{$group->id}}</td>
                 <td><a href="/groups/{{$group->id}}/edit">{{$group->name}}</a></td>
                 <td>
                    <form action="/groups/{{$group->id}}" method="POST">
                         @method('DELETE')
                         @csrf
                         <button class="btn btn-primary">Удалить</button>
                     </form>
                 </td>
             </tr>
             @endforeach
             </tbody>
         </table>
</div>
@endsection