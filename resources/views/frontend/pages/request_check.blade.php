@extends('frontend.master')

@section('content')

<div class="container">
    <p class="btn btn-primary">Your Post</p>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Description</th>
                <th scope="col">Date</th>
                <th scope="col">Blood Group</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $sell)
            <tr>
                <th scope="row">{{$sell->id}}</th>
                <td>{{$sell->name}}</td>
                <td>{{$sell->address}}</td>
                <td>{{$sell->mobile}}</td>
                <td>{{$sell->description}}</td>
                <td>{{$sell->created_at}}</td>
                <td>{{$sell->blood}}</td>
                <td>
                
                <a href="" class="btn btn-danger">Accept</a>
                <a href="" class="btn btn-warning">Reject</a>
               
            
      </td>
               
              

            </tr>
            @endforeach

        </tbody>
    </table>
    <a class="btn btn-primary" href="{{route('home')}}">Back</a>
</div>

@endsection
