<div class="admin_customer_list_section">
    <div class="pagetitle">
        <h1 style="margin-left: 0 !important">Kundenliste</h1>
        <p></p>
    </div>
    <button style="display: none;" id="customer_list_table_reload_button"></button>
    <div style="margin-top: 40px;">

        <div class="responsive-table">
            <table id="admin_customer_list_table" class="table table-striped" style="width:100%; font-size:11.5px;">
                <thead>
                    <tr>
                        <th>{{ __('home.customer_number') }}</th>
                        <th>{{ __('home.company') }}</th>
                        <th>{{ __('home.name') }}</th>
                        <th>{{ __('home.first_name') }}</th>
                        <th>{{ __('home.phone') }}</th>
                        <th>{{ __('home.email') }}</th>
                        <th>{{ __('home.street_number') }}</th>
                        <th>{{ __('home.postal_code') }}</th>
                        <th>{{ __('home.location') }}</th>
                        <th>{{ __('home.country') }}</th>
                        <th style="max-width: 50px !important; text-align:center;"><img
                                src="{{ asset('asset/images/DetailIcon_admin.svg') }}" alt="order-detail-icon"></th>
                        <th style="max-width: 50px !important; text-align:center;"></th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
@include('components.admin.customer_profile_edit')
@include('components.admin.customer_profile_request_handle')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var CustomerListTable;
    $(function() {
        CustomerListTable = $('#admin_customer_list_table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searching: true,
            language: {
                paginate: {
                    next: '<i class="fa-solid fa-chevron-right"></i>', // or '→'
                    previous: '<i class="fa-solid fa-chevron-left"></i>' // or '←'
                }
            },
            ajax: {
                url: "{{ __('routes.admin-customer-list') }}",
                type: "get",
            },
            order: [
                [0, 'desc']
            ],

            columns: [{
                    data: 'customer_number',
                    name: 'customer_number',
                },
                {

                    data: 'company',
                    name: 'company'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'first_name',
                    name: 'first_name'
                },
                {
                    data: 'phone',
                    name: 'phone'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'street_number',
                    name: 'street_number'
                },

                {
                    data: 'postal_code',
                    name: 'postal_code',
                },
                {
                    data: 'location',
                    name: 'location',
                },
                {
                    data: 'country',
                    name: 'country',
                },
                {
                    data: 'edit',
                    name: 'edit',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'request',
                    name: 'request',
                    orderable: false,
                    searchable: false
                }
            ]
        });
        $('#customer_list_table_reload_button').click(function() {
            CustomerListTable.ajax.reload();
        })
    });
</script>
