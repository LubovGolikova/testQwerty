@csrf

<div class="form-group row">
    <label for="login" class="col-md-4 col-form-label text-md-right">Логин</label>

    <div class="col">
        <input id="login" type="text" value="{{ old('login')? old('login'):$user->login}}" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" required>
        @error('login')
             <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
             </span>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label for="group_id" class="col-md-4 col-form-label text-md-right">Группа</label>
    <div class="col">

        <select id="group_id"  class="form-control @error('group_id') is-invalid @enderror" name="group_id">
        @foreach($groups as $group)
            <option value="{{$group->id}}" @if($user->group_id == $group->id) selected @endif>{{$group->name}}</option>
        @endforeach
        </select>

        @error('group_id')
            <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>



<div class="form-group row">
    <label for="avatar" class="col-md-4 col-form-label text-md-right">Аватар</label>
    <div class="col text-left">
        @if($user->avatar)
            <img src="/{{$user->avatar}}" alt="" style="width: 70px"> <br> <br>
        @endif
        <input id="avatar" type="file"  value="{{$user->avatar}}" class="form-control @error('avatar') is-invalid @enderror" name="avatar">
        @error('avatar')
             <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
        @enderror
    </div>
</div>

