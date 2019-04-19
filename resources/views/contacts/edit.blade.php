@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="margin:20px;float:right; display:block"> <a class="btn btn-primary" href="{{route('contacts.index')}}"> show all contacts </a> </div>
    <div class="row">
      
        <form action="{{route('contacts.update', ['id' => $contact->id])}}"method="POST" >
            @csrf
            {{ method_field('PUT') }}
            @if(count($errors))
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif
        <input type="text" name="name" class="form-control" placeholder="name" value="@if(old('name')){{ old('name')}}@else{{$contact->name}}@endif">
        <input type="tel" name="number" class="form-control" placeholder="number" value="@if(old('number')){{ old('number')}}@else{{$contact->number}}@endif">
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        <input type="hidden" name="id" value="{{$contact->id}}">

        <input type="submit" value="update" class="btn btn-success">
        </form>

    </div>
</div>
@endsection