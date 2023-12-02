<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var ve_freelancer_payment_table;

    $(function() {
        ve_freelancer_payment_table = $('#ve_freelancer_payment_table').DataTable({
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
                url: "{{ __('routes.vector-freelancer-payment') }}",
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
        $('#ve_freelancer_payment_table_reload_button').click(function() {
            ve_freelancer_payment_table.ajax.reload();
        })
    });
    $(function() {
        $('#ve_payment_mail').click(function() {
            var confirm = window.confirm('Would you like to pay?');
            if (confirm == true) {
                $.ajax({
                    url: '{{ __('routes.freelancer-vector-payment-mail') }}',
                    type: 'get',
                    success: () => {
                        console.log('success');
                    },
                    error: () => {
                        console.error('error');
                    }
                })
            }
        })
    })
    $(function() {
        $('#ve_payment_archive').click(function() {
            $('#ve_freelancer_payment_archive_table').DataTable().destroy();
            $('#free_vector_payment_archive').modal('show');
            var ve_freelancer_payment_archive_table;
            ve_freelancer_payment_archive_table = $('#ve_freelancer_payment_archive_table').DataTable({
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
                    url: '{{ __('routes.freelancer-vector-payment-archive') }}',
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
            $('#ve_freelancer_payment_archive_table_reload_button').click(function() {
                ve_freelancer_payment_archive_table.ajax.reload();
            });
        });
    })
</script>
