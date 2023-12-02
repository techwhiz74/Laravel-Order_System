<script>
    $(function() {
        var table;
        $(function() {
            table = $('#customer_staffs').DataTable({
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
                    url: "{{ __('routes.employee-staffs-table') }}",
                    type: 'get',

                },
                columns: [{
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'email',
                        name: 'email',
                    },
                    {
                        data: 'created_on',
                        name: 'created_on',
                    },
                    {
                        data: 'edit',
                        name: 'edit',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'delete',
                        name: 'delete',
                        orderable: false,
                        searchable: false
                    }
                ]
            })
            $('#customer_staff_create_submit').click(function() {
                setTimeout(() => {
                    table.ajax.reload();
                }, 1000);
            })
        });
    })
</script>
