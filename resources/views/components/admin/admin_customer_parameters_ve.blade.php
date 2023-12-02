<div class="page_section">
    <div class="pagetitle">
        <h1 style="margin-left: 0 !important">{{ __('home.customer_ve_parameters') }}</h1>
        <p></p>
    </div>
    <button style="display: none;" id="admin_parameter_ve_table_reload_button"></button>
    <div style="margin-top: 40px;">
        <input type="hidden" name="admin_ve_parameter_customer_id">
        <div class="responsive-table">
            <table id="admin_parameter_ve_table" class="table table-striped" style="width:100%; font-size:11.5px;">
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
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
@include('components.admin.customer_parameters_ve')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var adminParameterVeTable;
    $(function() {
        adminParameterVeTable = $('#admin_parameter_ve_table').DataTable({
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
                url: "{{ __('routes.admin-parameter-ve-table') }}",
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
                    data: 'parameter',
                    name: 'parameter',
                    orderable: false,
                    searchable: false
                },
            ]
        });
        $('#admin_parameter_ve_table_reload_button').click(function() {
            adminParameterVeTable.ajax.reload();
        })
    });

    function openVeParameter(id) {
        $('#admin_ve_parameter_change_buttons').show();
        $('#admin_ve_parameter_buttons').hide();
        $('.parameter-select-items-vector').find(
            'input').prop("checked", false);
        $('.parameter-select-items-image').find(
            'input').prop("checked", false);
        $('#selected_ve_parameter8').text("");
        $('#selected_ve_parameter9').text("");
        $('[name=admin_ve_parameter_customer_id]').val(id);
        $.ajax({
            url: '{{ __('routes.admin-parameter-ve') }}',
            type: 'GET',
            data: {
                id
            },
            success: (result) => {
                if (result[0] != null) {
                    var vectorFiles0 = result[0].parameter8.split(', ');
                    var imageFiles0 = result[0].parameter9.split(', ');
                    vectorFiles0.forEach(item => {
                        $('.parameter-select-items-vector').find(
                            'input[value="' + item + '"]').prop("checked", true);
                    });
                    imageFiles0.forEach(item => {
                        $('.parameter-select-items-image').find(
                            'input[value="' + item + '"]').prop("checked", true);
                    });
                    $('#selected_ve_parameter8').text(result[0].parameter8);
                    $('#selected_ve_parameter9').text(result[0].parameter9);

                    if (result[1] != null) {
                        $('#admin_ve_parameter_change_buttons').hide();
                        $('#admin_ve_parameter_buttons').show();
                        var vectorFiles1 = result[1].parameter8.split(', ');
                        var imageFiles1 = result[1].parameter9.split(', ');
                        vectorFiles1.forEach(item => {
                            $('.parameter-select-items-vector').find(
                                'input[value="' + item + '"]').prop("checked", true);
                        });
                        imageFiles1.forEach(item => {
                            $('.parameter-select-items-image').find(
                                'input[value="' + item + '"]').prop("checked", true);
                        });
                        $('#selected_ve_parameter8').text(result[1].parameter8);
                        $('#selected_ve_parameter9').text(result[1].parameter9);
                    }
                }
                $('#admin_customer_parameters_ve_popup').modal('show');
            },
            error: () => {
                console.error("error");
            }
        })
    }
</script>
