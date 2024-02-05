<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var em_admin_payment_table;
    $(function() {
        em_admin_payment_table = $('#em_admin_payment_table').DataTable({
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
                url: "{{ __('routes.admin-em-payment') }}",
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
        $('#em_admin_payment_table_reload_button').click(function() {
            em_admin_payment_table.ajax.reload();
        })
    });
    $(function() {
        $('#admin_em_payment1').click(function() {
            $('#admin_em_payment_sum_cal').trigger('click');
        })
        $('#admin_em_payment_sum_cal').click(function() {
            $.ajax({
                url: '{{ __('routes.admin-em-payment-sum') }}',
                type: 'get',
                success: (sum) => {
                    $('#admin_em_sum').text(sum);
                },
                error: () => {
                    console.error("error");
                }
            })
        })
    })
    $(function() {
        $('#admin_em_payment_btn').click(function() {
            $.ajax({
                url: '{{ __('routes.admin-em-payment-handle') }}',
                type: 'post',
                success: () => {
                    $('#em_admin_payment_table_reload_button').trigger('click');
                    $('#admin_em_payment_sum_cal').trigger('click');
                },
                error: () => {
                    console.error('error');
                }
            })
        })
    })
    $(function() {
        $('#admin_em_payment_archive').click(function() {
            $('#admin_em_payment_archive_table').DataTable().destroy();
            $('#admin_embroidery_payment_archive').modal('show');
            var admin_em_payment_archive_table;
            admin_em_payment_archive_table = $('#admin_em_payment_archive_table').DataTable({
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
                    url: '{{ __('routes.admin-embroidery-payment-archive') }}',
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
            $('#admin_em_payment_archive_table_reload_button').click(function() {
                admin_em_payment_archive_table.ajax.reload();
            });
        });
    })
</script>
