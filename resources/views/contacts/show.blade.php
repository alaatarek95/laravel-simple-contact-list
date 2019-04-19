@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="margin:20px;float:right; display:block"> <a class="btn btn-primary" href="{{route('contacts.index')}}"> show all contacts </a> </div>
    <div class="row">
      <p>name: {{$contact}}</p>

    </div>
</div>
@endsection