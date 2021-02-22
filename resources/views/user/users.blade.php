@extends('layouts.app')

@section('content')

<div class="container adverts">
   <h1><span>Все пользователи</span></h1>

<div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center">
<div class="toast alert alert-success" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000"  style="position: absolute; top: 0; left: 45%;">
  <div class="toast-body">
   Данные изменены
  </div>
</div>
</div>


   <table class="table">
       <thead>
            <tr>
               <th>ID</th>
               <th>Логин</th>
               <th>Группа</th>
               <th>Аватар</th>
               <th></th>
           </tr>
       </thead>
   <tbody>
   @foreach($users as $user)
   <tr>
       <td>{{$user->id}}</td>
       <td><a href="/users/{{$user->id}}/edit">{{$user->login}}</a></td>
       <td>{{$user->group->name}}</td>
       <td>
             <img src="/{{$user->avatar}}" alt="" style="width: 70px">
       </td>
       <td>
        <form action="/users/{{$user->id}}" method="POST">
            @method('DELETE')
            @csrf
            <button class="btn btn-primary">Удалить</button>
        </form>
       </td>
   </tr>
   @endforeach
   </tbody>
   </table>
@endsection