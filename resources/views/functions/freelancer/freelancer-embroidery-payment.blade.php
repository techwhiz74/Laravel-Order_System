<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var em_freelancer_payment_table;

    $(function() {
        em_freelancer_payment_table = $('#em_freelancer_payment_table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searching: false,
            info: false,
            language: {
                emptyTable: "No data available in table",
                paginate: {
                    next: '<i class="fa-solid fa-chevron-right"></i>', // or '→'
                    previous: '<i class="fa-solid fa-chevron-left"></i>', // or '←'
                }
            },
            ajax: {
                url: "{{ __('routes.embroidery-freelancer-payment') }}",
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
        $('#em_freelancer_payment_table_reload_button').click(function() {
            em_freelancer_payment_table.ajax.reload();
        });
    });
    $(function() {
        $('#em_freelancer_payment').click(function() {
            $('#free_em_payment_sum_cal').trigger('click');
        })
        $('#free_em_payment_sum_cal').click(function() {
            $.ajax({
                url: '{{ __('routes.freelancer-em-payment-sum') }}',
                type: 'get',
                success: (sum) => {
                    $('#free_em_sum').text(sum);
                },
                error: () => {
                    console.error("error");
                }
            })
        })
    })
    $(function() {
        $('#free_em_payment_btn').click(function() {
            var confirm = window.confirm('Would you like to pay?');
            if (confirm == true) {
                $.ajax({
                    url: '{{ __('routes.freelancer-em-payment-handle') }}',
                    type: 'post',
                    success: () => {
                        $('#em_freelancer_payment_table_reload_button').trigger('click');
                        $('#free_em_payment_sum_cal').trigger('click');
                        $.ajax({
                            url: '{{ __('routes.freelancer-embroidery-payment-mail') }}',
                            type: 'get',
                            success: () => {
                                console.log('success');
                            },
                            error: () => {
                                console.error('error');
                            }
                        })
                    },
                    error: () => {
                        console.error('error');
                    }
                })
            }
        })
    })
    $(function() {
        $('#em_payment_archive').click(function() {
            $('#em_freelancer_payment_archive_table').DataTable().destroy();
            $('#free_embroidery_payment_archive').modal('show');
            var em_freelancer_payment_archive_table;
            em_freelancer_payment_archive_table = $('#em_freelancer_payment_archive_table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                searching: false,
                info: false,
                language: {
                    emptyTable: "No data available in table",
                    paginate: {
                        next: '<i class="fa-solid fa-chevron-right"></i>', // or '→'
                        previous: '<i class="fa-solid fa-chevron-left"></i>', // or '←'
                    }
                },
                ajax: {
                    url: '{{ __('routes.freelancer-embroidery-payment-archive') }}',
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
            $('#em_freelancer_payment_archive_table_reload_button').click(function() {
                em_freelancer_payment_archive_table.ajax.reload();
            });
        });
    })
</script>
