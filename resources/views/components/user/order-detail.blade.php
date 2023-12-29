<div class="modal fade" id="order_detail_popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgb(244, 244, 244); ">
            <button type="button" class="backbutton" onclick="hideModal()"><i class="fa-solid fa-left-long"
                    style="display: flex;"></i></button>
            <div class="row modal_page_view">
                <div class="col-xl-1"></div>
                <div class="col-12 col-xl-10">
                    <div class="pagetitle">
                        {{ __('home.order_detail') }}
                    </div>
                    <div style="margin-bottom:5px">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="order_detail_div">
                                    <input type="hidden" id="detail_id">
                                    <div class="box_title">{{ __('home.detail_box1') }}</div>
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group form_dv_wrap">
                                                <div class="row">
                                                    <div class="col-12 col-md-6 form_label">
                                                        <label class="control-label">{{ __('home.customer_number') }}
                                                        </label>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div id="detail_customer_number"
                                                            class="order_detail_input_div_element">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group form_dv_wrap">
                                                <div class="row">
                                                    <div class="col-12 col-md-6 form_label">
                                                        <label class="control-label">{{ __('home.order_number') }}
                                                        </label>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div id="detail_order_number"
                                                            class="order_detail_input_div_element">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-12">
                                            <div class="form-group form_dv_wrap">
                                                <div class="row">
                                                    <div class="col-12 col-md-3 form_label">
                                                        <label class="control-label">{{ __('home.projectname') }}
                                                        </label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <div id="detail_project_name"
                                                            class="order_detail_input_div_element">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-6 order_size">
                                            <div class="form-group form_dv_wrap">
                                                <div class="row">
                                                    <div class="col-12 col-md-6 form_label">
                                                        <label class="control-label">{{ __('home.size') }}
                                                        </label>
                                                    </div>
                                                    <div class="col-8 col-md-4">
                                                        <div id="detail_size" class="order_detail_input_div_element">
                                                        </div>
                                                    </div>
                                                    <div class="col-4 col-md-2 form_label">
                                                        <label class="control-label">mm
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 order_size">
                                            <div class="form-group form_dv_wrap">
                                                <div class="row">
                                                    <div class="col-12 col-md-6 form_label">
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div id="detail_width_height"
                                                            class="order_detail_input_div_element">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-12">
                                            <div class="form-group form_dv_wrap order_final_product">
                                                <div class="row">
                                                    <div class="col-12 col-md-3 form_label">
                                                        <label class="control-label">{{ __('home.fianl_product') }}
                                                        </label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <div id="detail_final_product"
                                                            class="order_detail_input_div_element">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-12">
                                            <div class="form-group form_dv_wrap">
                                                <div class="row">
                                                    <div class="col-12 col-md-3 form_label">
                                                        <label
                                                            class="control-label">{{ __('home.special instructions') }}
                                                        </label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <div id="detail_special_instructions"
                                                            class="order_detail_input_div_element">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="order_detail_div">
                                    <div class="box_title">{{ __('home.detail_box2') }}</div>
                                    <div id="order_embroidery_parameter_div">
                                        <div class="row">
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-4 form_label">
                                                            <label
                                                                class="control-label">{{ __('home.yarn_information') }}
                                                            </label>
                                                        </div>
                                                        <div class="col-12 col-md-8">
                                                            <div id="order_yarn_information"
                                                                class="order_detail_input_div_element">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-4 form_label">
                                                            <label
                                                                class="control-label">{{ __('home.need_embroidery_files') }}
                                                            </label>
                                                        </div>
                                                        <div class="col-12 col-md-8">
                                                            <div id="order_need_embroidery_files"
                                                                class="order_detail_input_div_element">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-4 form_label">
                                                            <label
                                                                class="control-label">{{ __('home.cutting_options') }}
                                                            </label>
                                                        </div>
                                                        <div class="col-12 col-md-8">
                                                            <div id="order_cutting_options"
                                                                class="order_detail_input_div_element">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-4 form_label">
                                                            <label
                                                                class="control-label">{{ __('home.special_cutting_options') }}
                                                            </label>
                                                        </div>
                                                        <div class="col-12 col-md-8">
                                                            <div id="order_special_cutting_options"
                                                                class="order_detail_input_div_element"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-4 form_label">
                                                            <label
                                                                class="control-label">{{ __('home.needle_instructions') }}
                                                            </label>
                                                        </div>
                                                        <div class="col-12 col-md-8">
                                                            <div id="order_needle_instructions"
                                                                class="order_detail_input_div_element">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-4 form_label">
                                                            <label
                                                                class="control-label">{{ __('home.standard_instructions') }}
                                                            </label>
                                                        </div>
                                                        <div class="col-12 col-md-8">
                                                            <div id="order_standard_instructions"
                                                                class="order_detail_input_div_element">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-4 form_label">
                                                            <label
                                                                class="control-label">{{ __('home.special_standard_instructions') }}
                                                            </label>
                                                        </div>
                                                        <div class="col-12 col-md-8">
                                                            <div id="order_special_standard_instructions"
                                                                class="order_detail_input_div_element">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="order_vector_parameter_div">
                                        <div class="row">
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-4 form_label">
                                                            <label
                                                                class="control-label">{{ __('home.required_vector_file') }}
                                                            </label>
                                                        </div>
                                                        <div class="col-12 col-md-8">
                                                            <div id="order_required_vector_file"
                                                                class="order_detail_input_div_element">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-4 form_label">
                                                            <label
                                                                class="control-label">{{ __('home.required_image_file') }}
                                                            </label>
                                                        </div>
                                                        <div class="col-12 col-md-8">
                                                            <div id="order_required_image_file"
                                                                class="order_detail_input_div_element">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="order_detail_div" style="height: auto !important;">
                        <div class="col-12">
                            <div style="display: flex; justify-content:flex-end; margin-bottom:5px;">
                                <button class="btn btn-primary btn-sm" onclick="multipleDownload()"
                                    style="background-color:#c3ac6d; border:none; font-size:13px;"><i
                                        class="fa-solid fa-download"></i>&nbsp&nbsp{{ __('home.alldownload') }}</button>
                            </div>
                        </div>
                        <div class="col-12 file_view_flex_toggle">
                            <div style="margin-right: 10px;">
                                <ul class="nav nav-tabs column_flex">
                                    <li class="nav-item">
                                        <div class="folder_button" type="button" id="subfolder_structure1">
                                            <div style="height: 54%;margin-bottom: 5px;padding: 0; text-align:center;">
                                                <img src="{{ asset('asset/images/folder-open-duotone.svg') }}"
                                                    style="width: 37px;">
                                            </div>
                                            <div style="height: 40%;padding: 3px 0;">
                                                <p style="padding-top: 6px;">
                                                    ORIGINALDATEI</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item" style="margin-top: 5px;">
                                        <div class="folder_button" type="button" id="subfolder_structure2">
                                            <div style="height: 54%;margin-bottom: 5px;padding: 0; text-align:center;">
                                                <img src="{{ asset('asset/images/folder-open-duotone.svg') }}"
                                                    style="width: 37px;">
                                            </div>
                                            <div style="height: 40%;padding: 3px 0;">
                                                <p style="padding-top: 6px;">
                                                    STICKPROGRAMM</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item" style="margin-top: 5px;">
                                        <div class="folder_button" type="button" id="subfolder_structure3">
                                            <div style="height: 54%;margin-bottom: 5px;padding: 0; text-align:center;">
                                                <img src="{{ asset('asset/images/folder-open-duotone.svg') }}"
                                                    style="width: 37px;">
                                            </div>
                                            <div style="height: 40%;padding: 3px 0;">
                                                <label style="padding-top: 6px;">
                                                    VEKTORDATEI</label>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="responsive-table file_view_table">
                                <table id="order_detail" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">
                                                {{ __('home.customer_number') }}</th>
                                            <th style="text-align: center">{{ __('home.order_number') }}</th>
                                            <th style="text-align: center">{{ __('home.index') }}</th>
                                            <th style="text-align: center">{{ __('home.extension') }}</th>
                                            <th style="text-align: center">{{ __('home.download') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody style="text-align: center"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-1"></div>
            </div>
        </div>
    </div>
</div>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var folderType = 'Originaldatei';

    function openOrderDetailModal(id, type) {
        var detail_table;
        $('#detail_id').val(id);
        $('#subfolder_structure1').hide();
        $('#subfolder_structure2').hide();
        $('#subfolder_structure3').hide();

        $('#order_embroidery_parameter_div').hide();
        $('#order_vector_parameter_div').hide();
        $('#order_yarn_information').text("");
        $('#order_need_embroidery_files').text("");
        $('#order_cutting_options').text("");
        $('#order_special_cutting_options').text("");
        $('#order_needle_instructions').text("");
        $('#order_standard_instructions').text("");
        $('#order_special_standard_instructions').text("");
        $('#order_required_vector_file').text("");
        $('#order_required_image_file').text("");

        folderType = type;

        $.ajax({
            url: '{{ __('routes.customer-get-order-detail') }}',
            type: 'GET',
            data: {
                id
            },
            success: (data) => {
                console.log(data);
                var folderArray = [];
                data.detail.map((item, index) => {
                    item = item.split('/')[3];
                    if (folderArray.filter((el) => el == item).length == 0) {
                        folderArray.push(item);
                    }
                });
                console.log(folderArray);
                $('#order_detail_popup').find('#detail_customer_number').text(data.order.customer_number);
                $('#detail_id').val(data.order.id);
                $('#order_detail_popup').find('#detail_order_number').text(data.order.order_number);
                $('#order_detail_popup').find('#detail_project_name').text(data.order.project_name);
                $('#order_detail_popup').find('#detail_size').text(data.order.size);
                $('#order_detail_popup').find('#detail_width_height').text(data.order.width_height);
                $('#order_detail_popup').find('#detail_final_product').text(data.order.products);
                $('#order_detail_popup').find('#detail_special_instructions').text(data
                    .order.special_instructions);
                $data_type = data.order.type;
                if ($data_type == "Vector") {
                    $('.order_size').hide();
                    $('.order_final_product').hide();
                    $('#order_vector_parameter_div').show();
                } else {
                    $('.order_size').show();
                    $('.order_final_product').show();
                    $('#order_embroidery_parameter_div').show();
                }
                folderArray.forEach((item) => {
                    if (item == "Originaldatei") {
                        $('#subfolder_structure1').show();
                    } else if (item == "Stickprogramm") {
                        $('#subfolder_structure2').show();
                    } else if (item == "Vektordatei") {
                        $('#subfolder_structure3').show();
                    }
                })
            },
            error: () => {
                console.error('err');
            }
        })

        detail_table = $('#order_detail').DataTable({
            responsive: true,
            language: {

            },
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ __('routes.customer-order_detail') }}',
                data: function(d) {
                    d.id = id;
                    d.type = type;
                },
            },
            columns: [{
                    data: 'customer_number',
                    name: 'customer_number'
                },

                {
                    data: 'order_number',
                    name: 'order_number'
                },

                {
                    data: 'index',
                    name: 'index'
                },

                {
                    data: 'extension',
                    name: 'extension'
                },

                {
                    data: 'download',
                    name: 'download',
                    orderable: false,
                    searchable: false
                },

            ]
        });

        $('#order_detail_popup').modal("show");
        detail_table.destroy();

        //customer parameter information
        $.ajax({
            url: '{{ __('routes.customer-order-detail-parameter') }}',
            type: 'GET',
            data: {
                id: $('#detail_id').val()
            },
            success: (data) => {
                console.log(data);
                if (data[0] != null) {
                    $('#order_yarn_information').text(data[0].parameter1);
                    $('#order_need_embroidery_files').text(data[0].parameter2);
                    $('#order_cutting_options').text(data[0].parameter3);
                    $('#order_special_cutting_options').text(data[0].parameter4);
                    $('#order_needle_instructions').text(data[0].parameter5);
                    $('#order_standard_instructions').text(data[0].parameter6);
                    $('#order_special_standard_instructions').text(data[0].parameter7);
                }
                if (data[1] != null) {
                    $('#order_required_vector_file').text(data[1].parameter8);
                    $('#order_required_image_file').text(data[1].parameter9);
                }
            },
            error: () => {
                console.error('error');
            }
        })
    }


    function multipleDownload() {
        window.location.href = '{{ url('multi-download') }}/' + $('#detail_id').val() + '?type=' + folderType;
    }
    $('#subfolder_structure1').click(function() {
        openOrderDetailModal($('#detail_id').val(), 'Originaldatei');
    });
    $('#subfolder_structure2').click(function() {
        openOrderDetailModal($('#detail_id').val(), 'Stickprogramm');
    });
    $('#subfolder_structure3').click(function() {
        openOrderDetailModal($('#detail_id').val(), 'Vektordatei');
    });
</script>
