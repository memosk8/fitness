@extends('layouts.tienda')
@section('userName')
<a class="nav-link text-decoration-underline" href="{{ route('user.session') }}">
   <span data-feather="user" class="border-1">
      {{ $data->nombre}}
   </span>
</a>
@endsection