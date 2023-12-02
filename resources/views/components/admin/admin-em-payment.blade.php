<section class="page_section">

    <div class="pagetitle">
        <h1 style="margin-left: 0 !important">Abrechnung Stickprogramme</h1>
        <p></p>
    </div>
    <div>
        <div style="margin-top: 40px;">
            <div class="responsive-table">
                <button id="em_admin_payment_table_reload_button" style="display: none"></button>
                <table id="em_admin_payment_table" class="table table-striped">
                    <thead>
                        <tr>
                            <th style="min-width: 70px !important; text-align:center;">{{ __('home.order_type') }}</th>
                            <th style="min-width: 100px !important;">{{ __('home.delivery_time') }}</th>
                            <th style="min-width: 150px !important;">{{ __('home.order') }}</th>
                            <th style="min-width: 150px !important;">{{ __('home.date') }}</th>
                            <th>{{ __('home.project') }}</th>
                            <th style="min-width: 200px !important; text-align:center !important;">
                                Zahl zählen</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="upload_btn">
                <button class="btn btn-primary btn-block" id="admin_em_payment_archive">Zahlungsarchiv</button>
            </div>
        </div>

    </div>

</section>
@include('components.admin.admin-em-payment-archive')
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
