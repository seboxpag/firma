@extends('layouts.app')

@section('content')
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">imie</th>
      <th scope="col">nazwisko</th>
      <th scope="col">email</th>
@can('isBoss')
      <th scope="col">Akcja</th>
@endcan
@can('isMngr')
      <th scope="col">Akcja</th>
@endcan
    </tr>
  </thead>
  <tbody>
@foreach($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->surname}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->stanowisko}}</td>
@can('isBoss')
      <td><a href="\users\edit\{{$user->id}}"><button class="btn btn-accept btn-sm accept">E</button></a></td>
      <td><a href="\users\delete\{{$user->id}}"><button class="btn btn-danger btn-sm delete">X</button></a></td>
@endcan
@can('isMngr')
      <td><a href="\users\edit\{{$user->id}}"><button class="btn btn-accept btn-sm accept">E</button></a></td>
@endcan
    </tr>
@endforeach
  </tbody>
</table>
</div>
<script src="{{asset('js/app.cs')}}" defer></script>
<script type="text/javascript">
@yield('javascript');
</script>
@endsection
