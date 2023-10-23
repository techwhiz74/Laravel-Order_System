@php
$serial = 1;
@endphp
<div>
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
                    <th>{{__('home.order')}}</th>
                    <th>{{__('home.date')}}</th>
                    <th>{{__('home.order_from')}}</th>
                    <th>{{__('home.project')}}</th>
                    <th>{{__('home.status')}}</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </section>
</div>
<script>
        $(function() {
            var table = $('#admin-order').DataTable({
                language: {
                    paginate: {
                        next: '<i class="fa-solid fa-chevron-right"></i>', // or '→'
                        previous: '<i class="fa-solid fa-chevron-left"></i>' // or '←'
                    }
                },
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{__('routes.admin-view-orders')}}",
                    data: function(d) {
                        d.status_filter = $('#status-filter').val();
                        d.category_filter = $('#category-filter').val();
                    }
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    // {
                    //     data: 'selection',
                    //     name: 'selection'
                    // },
                    {
                        data: 'project_name',
                        name: 'project_name'
                    },
                    // {
                    //     data: 'catgory',
                    //     name: 'catgory'
                    // },
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
