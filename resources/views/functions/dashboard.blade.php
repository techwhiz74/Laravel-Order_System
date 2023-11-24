<script>
    $(function() {
        var customer_dahsboard_green_table;
        customer_dahsboard_green_table = $('#customer_dashboard_green_table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searching: false,
            paginate: false,
            info: false,
            ajax: {
                url: "{{ __('routes.customer-dashboard-green-table') }}",
                type: "get",
            },
            order: [
                [2, 'desc']
            ],
            columns: [{
                    data: 'art',
                    name: 'art'
                },
                {
                    data: 'deliver_time',
                    name: 'deliver_time'
                },
                {
                    data: 'order',
                    name: 'order'
                },
                {
                    data: 'project_name',
                    name: 'project_name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
            ],
        })
        $('#customer_dahsboard_table_reload_button').click(function() {
            customer_dahsboard_green_table.ajax.reload();
        });
    })
    $(function() {
        var customer_dahsboard_red_table;
        customer_dahsboard_red_table = $('#customer_dashboard_red_table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searching: false,
            paginate: false,
            info: false,
            ajax: {
                url: "{{ __('routes.customer-dashboard-red-table') }}",
                type: "get",
            },
            order: [
                [2, 'desc']
            ],
            columns: [{
                    data: 'art',
                    name: 'art'
                },
                {
                    data: 'deliver_time',
                    name: 'deliver_time'
                },
                {
                    data: 'order',
                    name: 'order'
                },
                {
                    data: 'project_name',
                    name: 'project_name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
            ],

        })

        $('#customer_dahsboard_table_reload_button').click(function() {
            customer_dahsboard_red_table.ajax.reload();
        });
    })
    $(function() {
        var customer_dahsboard_yellow_table;
        customer_dahsboard_yellow_table = $('#customer_dashboard_yellow_table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searching: false,
            paginate: false,
            info: false,
            ajax: {
                url: "{{ __('routes.customer-dashboard-yellow-table') }}",
                type: "get",
            },
            order: [
                [2, 'desc']
            ],
            columns: [{
                    data: 'art',
                    name: 'art'
                },
                {
                    data: 'deliver_time',
                    name: 'deliver_time'
                },
                {
                    data: 'order',
                    name: 'order'
                },
                {
                    data: 'project_name',
                    name: 'project_name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
            ],

        })

        $('#customer_dahsboard_table_reload_button').click(function() {
            customer_dahsboard_yellow_table.ajax.reload();
        });
    })
    $(function() {
        var customer_dahsboard_blue_table;
        customer_dahsboard_blue_table = $('#customer_dashboard_blue_table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searching: false,
            paginate: false,
            info: false,
            ajax: {
                url: "{{ __('routes.customer-dashboard-blue-table') }}",
                type: "get",
            },
            order: [
                [2, 'desc']
            ],
            columns: [{
                    data: 'art',
                    name: 'art'
                },
                {
                    data: 'deliver_time',
                    name: 'deliver_time'
                },
                {
                    data: 'order',
                    name: 'order'
                },
                {
                    data: 'project_name',
                    name: 'project_name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
            ],

        })

        $('#customer_dahsboard_table_reload_button').click(function() {
            customer_dahsboard_blue_table.ajax.reload();
        });
    })
    $(function() {
        var em_freelancer_green_dash_table;
        em_freelancer_green_dash_table = $('#em_freelancer_green_dashboard_table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searching: false,
            paginate: false,
            info: false,
            ajax: {
                url: "{{ __('routes.embroidery-freelancer-green-dashboard') }}",
                type: "get",
            },
            order: [
                [2, 'desc']
            ],
            columns: [{
                    data: 'art',
                    name: 'art'
                },
                {
                    data: 'deliver_time',
                    name: 'deliver_time'
                },
                {
                    data: 'order',
                    name: 'order'
                },
                {
                    data: 'project_name',
                    name: 'project_name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
            ],

        })
        $('#em_freelancer_table_reload_btn').click(function() {
            em_freelancer_green_dash_table.ajax.reload();
        })
    })
    $(function() {
        var em_freelancer_yellow_dash_table;
        em_freelancer_yellow_dash_table = $('#em_freelancer_yellow_dashboard_table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searching: false,
            paginate: false,
            info: false,
            ajax: {
                url: "{{ __('routes.embroidery-freelancer-yellow-dashboard') }}",
                type: "get",
            },
            order: [
                [2, 'desc']
            ],
            columns: [{
                    data: 'art',
                    name: 'art'
                },
                {
                    data: 'deliver_time',
                    name: 'deliver_time'
                },
                {
                    data: 'order',
                    name: 'order'
                },
                {
                    data: 'project_name',
                    name: 'project_name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
            ],

        })
        $('#em_freelancer_table_reload_btn').click(function() {
            em_freelancer_yellow_dash_table.ajax.reload();
        })
    })
    $(function() {
        var em_freelancer_red_dash_table;
        em_freelancer_red_dash_table = $('#em_freelancer_red_dashboard_table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searching: false,
            paginate: false,
            info: false,
            ajax: {
                url: "{{ __('routes.embroidery-freelancer-red-dashboard') }}",
                type: "get",
            },
            order: [
                [2, 'desc']
            ],
            columns: [{
                    data: 'art',
                    name: 'art'
                },
                {
                    data: 'deliver_time',
                    name: 'deliver_time'
                },
                {
                    data: 'order',
                    name: 'order'
                },
                {
                    data: 'project_name',
                    name: 'project_name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
            ],

        })
        $('#em_freelancer_table_reload_btn').click(function() {
            em_freelancer_red_dash_table.ajax.reload();
        })
    })
    $(function() {
        var em_freelancer_blue_dash_table;
        em_freelancer_blue_dash_table = $('#em_freelancer_blue_dashboard_table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searching: false,
            paginate: false,
            info: false,
            ajax: {
                url: "{{ __('routes.embroidery-freelancer-blue-dashboard') }}",
                type: "get",
            },
            order: [
                [2, 'desc']
            ],
            columns: [{
                    data: 'art',
                    name: 'art'
                },
                {
                    data: 'deliver_time',
                    name: 'deliver_time'
                },
                {
                    data: 'order',
                    name: 'order'
                },
                {
                    data: 'project_name',
                    name: 'project_name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'request',
                    name: 'request',
                    orderable: false,
                    searchable: false
                }
            ],

        })
        $('#em_freelancer_table_reload_btn').click(function() {
            em_freelancer_blue_dash_table.ajax.reload();
        })
    })
    $(function() {
        var ve_freelancer_green_dash_table;
        ve_freelancer_green_dash_table = $('#ve_freelancer_green_dashboard_table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searching: false,
            paginate: false,
            info: false,
            ajax: {
                url: "{{ __('routes.vector-freelancer-green-dashboard') }}",
                type: "get",
            },
            order: [
                [2, 'desc']
            ],
            columns: [{
                    data: 'art',
                    name: 'art'
                },
                {
                    data: 'deliver_time',
                    name: 'deliver_time'
                },
                {
                    data: 'order',
                    name: 'order'
                },
                {
                    data: 'project_name',
                    name: 'project_name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
            ],

        })
        $('#ve_freelancer_table_reload_btn').click(function() {
            ve_freelancer_green_dash_table.ajax.reload();
        })
    })
    $(function() {
        var ve_freelancer_yellow_dash_table;
        ve_freelancer_yellow_dash_table = $('#ve_freelancer_yellow_dashboard_table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searching: false,
            paginate: false,
            info: false,
            ajax: {
                url: "{{ __('routes.vector-freelancer-yellow-dashboard') }}",
                type: "get",
            },
            order: [
                [2, 'desc']
            ],
            columns: [{
                    data: 'art',
                    name: 'art'
                },
                {
                    data: 'deliver_time',
                    name: 'deliver_time'
                },
                {
                    data: 'order',
                    name: 'order'
                },
                {
                    data: 'project_name',
                    name: 'project_name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
            ],

        })
        $('#ve_freelancer_table_reload_btn').click(function() {
            ve_freelancer_yellow_dash_table.ajax.reload();
        })
    })
    $(function() {
        var ve_freelancer_red_dash_table;
        ve_freelancer_red_dash_table = $('#ve_freelancer_red_dashboard_table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searching: false,
            paginate: false,
            info: false,
            ajax: {
                url: "{{ __('routes.vector-freelancer-red-dashboard') }}",
                type: "get",
            },
            order: [
                [2, 'desc']
            ],
            columns: [{
                    data: 'art',
                    name: 'art'
                },
                {
                    data: 'deliver_time',
                    name: 'deliver_time'
                },
                {
                    data: 'order',
                    name: 'order'
                },
                {
                    data: 'project_name',
                    name: 'project_name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
            ],

        })
        $('#ve_freelancer_table_reload_btn').click(function() {
            ve_freelancer_red_dash_table.ajax.reload();
        })
    })
    $(function() {
        var ve_freelancer_blue_dash_table;
        ve_freelancer_blue_dash_table = $('#ve_freelancer_blue_dashboard_table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searching: false,
            paginate: false,
            info: false,
            ajax: {
                url: "{{ __('routes.vector-freelancer-blue-dashboard') }}",
                type: "get",
            },
            order: [
                [2, 'desc']
            ],
            columns: [{
                    data: 'art',
                    name: 'art'
                },
                {
                    data: 'deliver_time',
                    name: 'deliver_time'
                },
                {
                    data: 'order',
                    name: 'order'
                },
                {
                    data: 'project_name',
                    name: 'project_name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'request',
                    name: 'request',
                    orderable: false,
                    searchable: false
                }
            ],

        })
        $('#ve_freelancer_table_reload_btn').click(function() {
            ve_freelancer_blue_dash_table.ajax.reload();
        })
    });
    $(function() {
        var admin_dashboard_green_table;
        admin_dashboard_green_table = $('#admin_dashboard_green_table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searching: false,
            paginate: false,
            info: false,
            ajax: {
                url: "{{ __('routes.admin-dashboard-green-table') }}",
                type: "get",
            },
            order: [
                [2, 'desc']
            ],
            columns: [{
                    data: 'art',
                    name: 'art'
                },
                {
                    data: 'deliver_time',
                    name: 'deliver_time'
                },
                {
                    data: 'order',
                    name: 'order'
                },
                {
                    data: 'project_name',
                    name: 'project_name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
            ],
        })
        $('#admin_dashboard_table_reload_button').click(function() {
            admin_dashboard_green_table.ajax.reload();
        });
    })
    $(function() {
        var admin_dashboard_red_table;
        admin_dashboard_red_table = $('#admin_dashboard_red_table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searching: false,
            paginate: false,
            info: false,
            ajax: {
                url: "{{ __('routes.admin-dashboard-red-table') }}",
                type: "get",
            },
            order: [
                [2, 'desc']
            ],
            columns: [{
                    data: 'art',
                    name: 'art'
                },
                {
                    data: 'deliver_time',
                    name: 'deliver_time'
                },
                {
                    data: 'order',
                    name: 'order'
                },
                {
                    data: 'project_name',
                    name: 'project_name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
            ],

        })

        $('#admin_dashboard_table_reload_button').click(function() {
            admin_dashboard_red_table.ajax.reload();
        });
    })
    $(function() {
        var admin_dashboard_yellow_table;
        admin_dashboard_yellow_table = $('#admin_dashboard_yellow_table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searching: false,
            paginate: false,
            info: false,
            ajax: {
                url: "{{ __('routes.admin-dashboard-yellow-table') }}",
                type: "get",
            },
            order: [
                [2, 'desc']
            ],
            columns: [{
                    data: 'art',
                    name: 'art'
                },
                {
                    data: 'deliver_time',
                    name: 'deliver_time'
                },
                {
                    data: 'order',
                    name: 'order'
                },
                {
                    data: 'project_name',
                    name: 'project_name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
            ],

        })

        $('#admin_dashboard_table_reload_button').click(function() {
            admin_dashboard_yellow_table.ajax.reload();
        });
    })
    $(function() {
        var admin_dashboard_blue_table;
        admin_dashboard_blue_table = $('#admin_dashboard_blue_table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searching: false,
            paginate: false,
            info: false,
            ajax: {
                url: "{{ __('routes.admin-dashboard-blue-table') }}",
                type: "get",
            },
            order: [
                [2, 'desc']
            ],
            columns: [{
                    data: 'art',
                    name: 'art'
                },
                {
                    data: 'deliver_time',
                    name: 'deliver_time'
                },
                {
                    data: 'order',
                    name: 'order'
                },
                {
                    data: 'project_name',
                    name: 'project_name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
            ],

        })

        $('#admin_dashboard_table_reload_button').click(function() {
            admin_dashboard_blue_table.ajax.reload();
        });
    })

    function showAllOrder() {
        console.log("sdf");
        $('#view_order_popup1').trigger('click');
    }

    function freelancerEmbroideryShowAllOrder() {
        $('#em_freelancer_all').trigger('click');
    }

    function freelancerVectorShowAllOrder() {
        $('#ve_freelancer_all').trigger('click');
    }

    function adminShowAllOrder() {
        $('#admin_all1').trigger('click');
    }
    // pagination information
    $(function() {
        $('#view_order_popup1').click(function() {
            $('#view-order_info').text("{{ __('home.pagination_info') }}");
        })
    })
</script>
