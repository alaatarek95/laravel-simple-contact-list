@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="margin:20px;float:right; display:block"> <a class="btn btn-primary" href="{{route('contacts.index')}}"> show all contacts </a> </div>
    <div class="row">
      
        <form action="{{route('contacts.store')}}"method="POST" >
            @csrf
            @if(count($errors))
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif
        <input type="text" name="name" class="form-control" placeholder="name" value="{{ old('name') }}">
        <input type="tel" name="number" class="form-control" placeholder="phone" value="{{ old('number')}}">
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

        <input type="submit" value="submit" class="btn btn-success">
        </form>

    </div>
</div>
@endsection