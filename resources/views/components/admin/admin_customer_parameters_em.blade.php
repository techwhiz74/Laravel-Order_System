<div class="page_section">
    <div class="row">
        <div class="col-xl-1"></div>
        <div class="col-12 col-xl-10">
            <div class="pagetitle">
                {{ __('home.customer_em_parameters') }}
            </div>
            <button style="display: none;" id="admin_parameter_em_table_reload_button"></button>
            <div>
                <input type="hidden" name="admin_em_parameter_customer_id">
                <div class="responsive-table">
                    <table id="admin_parameter_em_table" class="table table-striped"
                        style="width:100%; font-size:11.5px;">
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
                                        src="{{ asset('asset/images/DetailIcon_admin.svg') }}" alt="order-detail-icon">
                                </th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-1"></div>
    </div>
</div>
@include('components.admin.customer_parameters_em')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var adminParameterEmTable;
    $(function() {
        adminParameterEmTable = $('#admin_parameter_em_table').DataTable({
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
                url: "{{ __('routes.admin-parameter-em-table') }}",
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
        $('#admin_parameter_em_table_reload_button').click(function() {
            adminParameterEmTable.ajax.reload();
        })
    });

    function openEmParameter(id) {
        $('#admin_em_parameter_change_buttons').show();
        $('#admin_em_parameter_buttons').hide();
        $('.parameter-select-items-file').find(
            'input').prop("checked", false);
        $('[name=admin_parameter_yarn_information]').val("");
        $('#selected_em_parameter3').text("");
        $('[name=admin_parameter_cutting_options]').val("");
        $('[name=admin_parameter_special_cutting_options]').val("");
        $('[name=admin_parameter_needle_instructions]').val("");
        $('[name=admin_parameter_standard_instructions]').val("");
        $('[name=admin_parameter_special_standard_instructions]').val("");
        $('[name=admin_em_parameter_customer_id]').val(id);
        $.ajax({
            url: '{{ __('routes.admin-parameter-em') }}',
            type: 'GET',
            data: {
                id
            },
            success: (result) => {
                if (result[0] != null) {
                    $('[name=admin_parameter_yarn_information]').val(result[0].parameter1);
                    $('#selected_em_parameter3').text(result[0].parameter2);
                    $('[name=admin_parameter_cutting_options]').val(result[0].parameter3);
                    $('[name=admin_parameter_special_cutting_options]').val(result[0].parameter4);
                    $('[name=admin_parameter_needle_instructions]').val(result[0].parameter5);
                    $('[name=admin_parameter_standard_instructions]').val(result[0].parameter6);
                    $('[name=admin_parameter_special_standard_instructions]').val(result[0].parameter7);
                    var fileFiles0 = result[0].parameter2.split(', ');
                    fileFiles0.forEach(item => {
                        $('.parameter-select-items-file').find(
                            'input[value="' + item + '"]').prop("checked", true);
                    });
                    if (result[1] != null) {
                        $('#admin_em_parameter_change_buttons').hide();
                        $('#admin_em_parameter_buttons').show();
                        $('[name=admin_parameter_yarn_information]').val(result[1].parameter1);
                        $('#selected_em_parameter3').text(result[1].parameter2);
                        $('[name=admin_parameter_cutting_options]').val(result[1].parameter3);
                        $('[name=admin_parameter_special_cutting_options]').val(result[1].parameter4);
                        $('[name=admin_parameter_needle_instructions]').val(result[1].parameter5);
                        $('[name=admin_parameter_standard_instructions]').val(result[1].parameter6);
                        $('[name=admin_parameter_special_standard_instructions]').val(result[1].parameter7);
                        var fileFiles1 = result[1].parameter2.split(', ');
                        fileFiles1.forEach(item => {
                            $('.parameter-select-items-file').find(
                                'input[value="' + item + '"]').prop("checked", true);
                        });
                    }
                }
                $('#admin_customer_parameters_em_popup').modal('show');
            },
            error: () => {
                console.error("error");
            }
        })
    }
</script>
