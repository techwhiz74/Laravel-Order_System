<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var ve_admin_payment_table;

    $(function() {
        ve_admin_payment_table = $('#ve_admin_payment_table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searching: false,
            language: {
                paginate: {
                    next: '<i class="fa-solid fa-chevron-right"></i>', // or '→'
                    previous: '<i class="fa-solid fa-chevron-left"></i>' // or '←'
                }
            },
            ajax: {
                url: "{{ __('routes.admin-ve-payment') }}",
                type: "get",
            },
            columns: [{
                    data: 'type',
                    name: 'type',
                    orderable: false,
                    searchable: false
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
                    data: 'date',
                    name: 'date'
                },
                {
                    data: 'project_name',
                    name: 'project_name'
                },
                {
                    data: 'counting_number',
                    name: 'counting_number'
                },
            ]
        });
        $('#ve_admin_payment_table_reload_button').click(function() {
            ve_admin_payment_table.ajax.reload();
        })
    });
    $(function() {
        $('#admin_ve_payment1').click(function() {
            $('#admin_ve_payment_sum_cal').trigger('click');
        })
        $('#admin_ve_payment_sum_cal').click(function() {
            $.ajax({
                url: '{{ __('routes.admin-ve-payment-sum') }}',
                type: 'get',
                success: (sum) => {
                    $('#admin_ve_sum').text(sum);
                },
                error: () => {
                    console.error("error");
                }
            })
        })
    })
    $(function() {
        $('#admin_ve_payment_btn').click(function() {
            $.ajax({
                url: '{{ __('routes.admin-ve-payment-handle') }}',
                type: 'post',
                success: () => {
                    $('#ve_admin_payment_table_reload_button').trigger('click');
                    $('#admin_ve_payment_sum_cal').trigger('click');
                },
                error: () => {
                    console.error('error');
                }
            })
        })
    })
    $(function() {
        $('#admin_ve_payment_archive').click(function() {
            $('#admin_ve_payment_archive_table').DataTable().destroy();
            $('#admin_vector_payment_archive').modal('show');
            var admin_ve_payment_archive_table;
            admin_ve_payment_archive_table = $('#admin_ve_payment_archive_table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                searching: false,
                language: {
                    paginate: {
                        next: '<i class="fa-solid fa-chevron-right"></i>', // or '→'
                        previous: '<i class="fa-solid fa-chevron-left"></i>', // or '←'
                    }
                },
                ajax: {
                    url: '{{ __('routes.admin-vector-payment-archive') }}',
                    type: "get",
                },
                columns: [{
                        data: 'type',
                        name: 'type',
                        orderable: false,
                        searchable: false
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
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'project_name',
                        name: 'project_name'
                    },
                    {
                        data: 'counting_number',
                        name: 'counting_number'
                    },
                ]
            });
            $('#admin_ve_payment_archive_table_reload_button').click(function() {
                admin_ve_payment_archive_table.ajax.reload();
            });
        });
    })
</script>
