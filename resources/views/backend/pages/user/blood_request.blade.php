@extends('backend.master')

@section('content')

    <h1>Blood Request</h1>

    <table class="table table-striped blood_request">
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

@push('js')

    <script type="text/javascript">
        $(function () {
            var table = $('.blood_request').DataTable({
                processing: true,
                serverSide: true,
                lengthMenu: [
                    [20, 50, 100, -1],
                    [20, 50, 100, 'All'],
                ],
                ajax: "{{ route('blood.request') }}",
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