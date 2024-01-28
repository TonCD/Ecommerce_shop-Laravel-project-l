@extends('admin.main')

@section('content')
    <table class="table table-hover table-striped">
        <thead class="thead-dark" >
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Active</th>
            <th scope="col">Update</th>
            <th scope="col">Action</th>

        </tr>
        </thead>
        <tbody>
            {!! \App\Helpers\Helper::menu($menus) !!}
        </tbody>
    </table>
@endsection