@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="margin:20px;float:right; display:block"> <a class="btn btn-primary" href="{{route('contacts.create')}}"> Add new contact </a> </div>
    <div class="row">
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">name</th>
                <th scope="col">number</th>
                <th scope="col">actions</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($contacts as $contact)
                <tr>
                    <td>{{$contact->name}}</td>
                    <td>{{$contact->number}}</td>
                    <td>
                    @if(Auth::user()->can('update', $contact))
                        <a href="{{route('contacts.edit', ['id' => $contact->id ])}}" class="btn btn-primary">update</a>
                        <form action="{{route('contacts.destroy', ['id' => $contact->id])}}"method="POST" style="display:inline" >
                           @csrf

                        {{ method_field('DELETE') }}
                        <input type="submit" value="delete" class="btn btn-dangre">
                        </form>
                    @endif
                    </td>
                </tr>
            @empty
                <p>No users</p>
            @endforelse

               
            </tbody>
        </table>
    </div>
</div>
@endsection