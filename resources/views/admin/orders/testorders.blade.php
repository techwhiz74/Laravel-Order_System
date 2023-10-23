@extends('layout.layout')
@section('content')
@php
$serial = 1;
@endphp

<section class="admin_section">
    <div class="container">
        <select id="status-filter">
            <option value="">All</option>
            <option value="pending">Pending</option>
            <option value="delivered">Delivered</option>
        </select>
        <table id="admin-order" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>S.no</th>
                    <th>Selection</th>
                    <th>Project Name</th>
                    <th>Category</th>
                    <th>User</th>
                    <th>Created at</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</section>

@endsection