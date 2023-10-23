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
        <table id="admin-order1" class="table table-striped" style="width:100%">
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
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(function() {
        var table = $('#admin-order1').DataTable({
            language: {
                paginate: {
                    next: '<i class="fa-solid fa-chevron-right"></i>', // or '→'
                    previous: '<i class="fa-solid fa-chevron-left"></i>' // or '←'
                }
            },
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{__('routes.admin-vieworders')}}",
                data: function(d) {
                    d.status_filter = $('#status-filter').val();
                    d.category_filter = $('#category-filter').val();
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'selection',
                    name: 'selection'
                },
                {
                    data: 'project_name',
                    name: 'project_name'
                },
                {
                    data: 'catgory',
                    name: 'catgory'
                },
                {
                    data: 'user',
                    name: 'user'
                },
                {
                    data: 'date',
                    name: 'date'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });
        $('#status-filter, #category-filter').change(function() {
            table.ajax.reload();
        });
    });
</script>
@endsection
