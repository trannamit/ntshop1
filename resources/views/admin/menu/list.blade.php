@extends('admin.main')

@section('content')
@include('admin.alert')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Active</th>
                <th>Update</th>
                <th style="width:100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            {!! \App\Helpers\Helper::menu($menus) !!} {{-- gọi function menu trong class helper và xuát ra ở dạng HTML {!! !!} --}}
        </tbody>
    </table>
@endsection
