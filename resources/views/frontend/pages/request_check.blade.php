@extends('frontend.master')
@section('content')
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    <span class="font-weight-bold">{{auth()->user()->name}}</span> 
                    <span class="text-black-50">{{auth()->user()->email}}</span>


                </div>
            </div>
            <div class="col-md-8 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right"></h4>
                    </div>
                    <h1>Check Blood Request</h1>

    <table class="table table-striped check_request">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Patient Name</th>
            <th scope="col">Blood Group</th>
            <th scope="col">Mobile Number</th>
            <th scope="col">Request Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>



@endsection


                </div>
            </div>

        </div>
    </div>

    @push('js')

<script type="text/javascript">
    $(function () {
        var table = $('.check_request').DataTable({
            processing: true,
            serverSide: true,
            lengthMenu: [
                [20, 50, 100, -1],
                [20, 50, 100, 'All'],
            ],
            ajax: "{{ route('check.request') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'User_name', name: 'User_name'},
                {data: 'blood', name: 'blood'},
                {data: 'mobile', name: 'mobile'},
                {data: 'status', name: 'status'},
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        });
    });
</script>
@endpush

