<section class="ve_freelancer_red_section">

    <div class="pagetitle">
        <h1 style="margin-left: 0 !important">Abgeschlossene Bestellungen</h1>
        <p></p>
    </div>
    <div>
        <div style="margin-top: 40px;">
            <button id="ve_freelancer_red_table_reload_button" style="display: none"></button>
            <div class="responsive-table">
                <table id="ve_freelancer_red_table" class="table table-striped" style="width:100%; font-size:13px;">
                    <thead>
                        <tr>
                            <th style="min-width: 70px !important; text-align:center;">{{ __('home.order_type') }}</th>
                            <th style="min-width: 100px !important;">{{ __('home.delivery_time') }}</th>
                            <th style="min-width: 150px !important;">{{ __('home.order') }}</th>
                            <th style="min-width: 150px !important;">{{ __('home.date') }}</th>
                            <th>{{ __('home.project') }}</th>
                            <th style="min-width: 150px !important;">{{ __('home.status') }}</th>
                            <th style="min-width: 110px !important; text-align:center !important;">
                                {{ __('home.detail') }}</th>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>

        </div>

    </div>

</section>

{{-- @include('components.freelancer.order-detail')
@include('components.freelancer.order-change') --}}

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var ve_freelancer_red_table;

    $(function() {
        ve_freelancer_red_table = $('#ve_freelancer_red_table').DataTable({
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
                url: "{{ __('routes.vector-freelancer-red') }}",
                type: "get",
            },
            order: [
                [2, 'desc']
            ],

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
                    data: 'status',
                    name: 'status'
                },

                {
                    data: 'detail',
                    name: 'detail',
                    orderable: false,
                    searchable: false
                },
            ]
        });
        $('#ve_freelancer_red_table_reload_button').click(function() {
            ve_freelancer_red_table.ajax.reload();
        })
    });
</script>
