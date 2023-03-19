@extends('backend.master')

@section('content')

    <h1>Customer List</h1>

    <table class="table table-striped donar_list">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Email</th>
            <th scope="col">Blood Group</th>
            <th scope="col">Mobile Number</th>
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
            var table = $('.donar_list').DataTable({
                processing: true,
                serverSide: true,
                lengthMenu: [
                    [20, 50, 100, -1],
                    [20, 50, 100, 'All'],
                ],
                ajax: "{{ route('donar.list') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'blood', name: 'blood'},
                    {data: 'mobile', name: 'mobile'},
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