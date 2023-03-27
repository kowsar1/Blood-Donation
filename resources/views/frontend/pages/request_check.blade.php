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

            @foreach($data as $key=>$sell )
            <tr>
                <th scope="row">{{$sell->id}}</th>
                <td>{{$sell->name}}</td>
                <td>{{$sell->address}}</td>
                <td>{{$sell->mobile}}</td>
                <td>{{$sell->description}}</td>
                <td>{{$sell->created_at}}</td>
                <td>{{$sell->blood}}</td>
                
                <td>
                @php
                $req_id = $sell->id;
                $exists = $allAcceptRequest->filter(function($item, $key) use ($req_id) { 
                    
                return $item->request_id === $req_id;
                })->count() > 0;
                @endphp
                @if($exists)
                    <div class="alert alert-success" role="alert">
                        <strong>Donated Blood</strong>
                    </div>
                @else
                    @if(isset($lastDonate))
                        @if($lastDonate->created_at >= date('Y-m-d', strtotime('-90 days')))
                        <div class="alert alert-warning" role="alert">
                            <strong>Sorry you cannot donate blood</strong>
                            <a href="" class="btn btn-warning">Reject</a>
                        </div>
                        @endif
                    @else
                    <div class="alert alert-danger" role="alert">
                            <a href="{{route('accept.request',$sell->id)}}" class="btn btn-danger">Donate Now</a>
                        </div>
                        
                    @endif
                @endif
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
    <a class="btn btn-primary" href="{{route('home')}}">Back</a>
</div>

@endsection