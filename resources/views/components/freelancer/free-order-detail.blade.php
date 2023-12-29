<div class="modal fade" id="free_order_detail_popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgb(244, 244, 244)">
            <button type="button" class="backbutton" onclick="hideModal()"><i class="fa-solid fa-left-long"
                    style="display: flex;"></i></button>
            <div class="row modal_page_view">
                <div class="col-xl-1"></div>
                <div class="col-12 col-xl-10">
                    <div class="pagetitle">
                        {{ __('home.order_detail') }}
                    </div>
                    <div style="font-size: 13px; font-family:'Inter';">
                        <div style="margin-bottom:5px">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="order_detail_div">
                                        <div class="box_title">{{ __('home.detail_box1') }}</div>
                                        <div class="row">
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group form_dv_wrap">
                                                    <div class="row">
                                                        <div class="col-12 col-md-6 form_label">
                                                            <label
                                                                class="control-label">{{ __('home.customer_number') }}
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
                                                            <div id="detail_size"
                                                                class="order_detail_input_div_element">
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
                                        <div id="embroidery_parameter_div">
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
                                                                <div id="yarn_information"
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
                                                                <div id="need_embroidery_files"
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
                                                                <div id="cutting_options"
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
                                                                <div id="special_cutting_options"
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
                                                                <div id="needle_instructions"
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
                                                                <div id="standard_instructions"
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
                                                                <div id="special_standard_instructions"
                                                                    class="order_detail_input_div_element">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="vector_parameter_div">
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
                                                                <div id="required_vector_file"
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
                                                                <div id="required_image_file"
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
                        <div>
                            <div>
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="order_detail_div">
                                            <div class="col-12 file_view_box">
                                                <div class="box_title">
                                                    {{ __('home.detail_box3') }}</div>
                                                <div>
                                                    <button class="btn btn-primary btn-sm"
                                                        onclick="freeMultipleDownload()"
                                                        style="background-color:#c3ac6d; border:none; font-size:13px;"><i
                                                            class="fa-solid fa-download"></i>&nbsp&nbsp{{ __('home.alldownload') }}</button>
                                                </div>
                                            </div>
                                            <div class="col-12 file_view_flex_toggle">
                                                <div style="margin-right: 10px;">
                                                    <ul class="nav nav-tabs column_flex">
                                                        <li class="nav-item">
                                                            <div class="folder_button" type="button"
                                                                id="free_subfolder_structure1">
                                                                <div
                                                                    style="height: 54%;margin-bottom: 5px;padding: 0; text-align:center;">
                                                                    <img src="{{ asset('asset/images/folder-open-duotone.svg') }}"
                                                                        style="width: 37px;">
                                                                </div>
                                                                <div style="height: 40%;padding: 3px 0;">
                                                                    <label style="padding-top: 6px;">
                                                                        ORIGINALDATEI</label>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="nav-item" style="margin-top: 5px;">
                                                            <div class="folder_button" type="button"
                                                                id="free_subfolder_structure2">
                                                                <div
                                                                    style="height: 54%;margin-bottom: 5px;padding: 0; text-align:center;">
                                                                    <img src="{{ asset('asset/images/folder-open-duotone.svg') }}"
                                                                        style="width: 37px;">
                                                                </div>
                                                                <div style="height: 40%;padding: 3px 0;">
                                                                    <label style="padding-top: 6px;">
                                                                        STICKPROGRAMM</label>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="nav-item" style="margin-top: 5px;">
                                                            <div class="folder_button" type="button"
                                                                id="free_subfolder_structure3">
                                                                <div
                                                                    style="height: 54%;margin-bottom: 5px;padding: 0; text-align:center;">
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
                                                    <table id="free_order_detail" class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th style="text-align: center;">
                                                                    {{ __('home.customer_number') }}
                                                                </th>
                                                                <th style="text-align: center">
                                                                    {{ __('home.order_number') }}
                                                                </th>
                                                                <th style="text-align: center">
                                                                    {{ __('home.index') }}</th>
                                                                <th style="text-align: center">
                                                                    {{ __('home.extension') }}
                                                                </th>
                                                                <th style="text-align: center">
                                                                    {{ __('home.download') }}
                                                                </th>
                                                                <th style="text-align: center">
                                                                    {{ __('home.delete') }}
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="text-align: center">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="order_detail_div">
                                            <div id="green_job">
                                                <div class="box_title">
                                                    {{ __('home.detail_box4') }}
                                                </div>
                                                <div id="freelancer_job_start_div">
                                                    <button onclick="StartJob()"
                                                        class="job_button">{{ __('home.Job starten') }}</button>
                                                </div>

                                            </div>
                                            <div id="yellow_job">
                                                <div class="box_title">
                                                    {{ __('home.detail_box4') }}
                                                </div>
                                                <div
                                                    style="display: flex; flex-direction:column; justify-content:space-between">
                                                    <div id="freelancer_job_update_div">
                                                        <button onclick="UpdateJob()"
                                                            class="job_button">{{ __('home.Dateien hochladen') }}</button>
                                                    </div>
                                                    <div id="freelacner_job_upload_div">
                                                        <form action="" id="freelancer_job_start_form"
                                                            class="box_file_upload_form">
                                                            <input type="hidden" name="free_detail_id"
                                                                value="">
                                                            <div style="display: flex">
                                                                <div id="freelancer_job_upload" action=""
                                                                    method="POST" enctype="multipart/form-data"
                                                                    style="width: 100%; overflow-x:hidden; overflow-y:auto;">
                                                                    <noscript><input type="hidden" name="redirect"
                                                                            value="" /></noscript>
                                                                    <div class="row fileupload-buttonbar">
                                                                        <div class="col-lg-7">
                                                                            <span class="fileinput-button">
                                                                                <i
                                                                                    class="glyphicon glyphicon-plus"></i>
                                                                                <span
                                                                                    style="font-size: 13px;">{{ __('home.add_file') }}...</span>
                                                                                <input type="file" name="files[]"
                                                                                    multiple
                                                                                    id="freelancer_detail_file_input" />
                                                                            </span>
                                                                            <button type="submit"
                                                                                class="btn btn-primary start"
                                                                                style="visibility: hidden;">
                                                                                <i
                                                                                    class="glyphicon glyphicon-upload"></i>
                                                                                <span>Start
                                                                                    Upload</span>
                                                                            </button>

                                                                            <span class="fileupload-process"></span>
                                                                        </div>
                                                                        <div class="col-lg-5 fileupload-progress fade">
                                                                            <div class="progress progress-striped active"
                                                                                role="progressbar" aria-valuemin="0"
                                                                                aria-valuemax="100">
                                                                                <div class="progress-bar progress-bar-success"
                                                                                    style="width: 0%;">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <table role="presentation"
                                                                        class="table table-striped"
                                                                        id="order_form_upload_list">
                                                                        <tbody class="files">
                                                                        </tbody>
                                                                    </table>

                                                                </div>
                                                            </div><br>
                                                            <div style="display: flex; justify-content:flex-end">
                                                                <div>
                                                                    <button type="submit"
                                                                        class="freelancer_job_start_submit">{{ __('home.order_upload') }}</button>
                                                                </div>
                                                            </div>
                                                        </form>
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
        </div>
        <div class="col-xl-1"></div>
    </div>
</div>
</div>
</div>
@include('components.freelancer.start_job_confirm_modal')
@include('components.freelancer.start_job_success_modal')
@include('components.freelancer.free_upload_success_modal')
@include('components.freelancer.delete_confirm_modal')
@include('components.freelancer.end_job_success_modal')
@include('components.freelancer.free-order-count-modal')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var free_detail_table;
    var folderType = 'Originaldatei';

    function freeOpenOrderDetailModal(id, type) {
        folderType = type;
        $('#freelancer_job_update_div').show();
        $('#freelacner_job_upload_div').hide();
        $('#green_job').hide();
        $('#yellow_job').hide();

        $('#embroidery_parameter_div').hide();
        $('#vector_parameter_div').hide();
        $('#order_form_upload_list tr').remove();

        $('[name=free_detail_id]').val(id);
        $('#free_subfolder_structure1').hide();
        $('#free_subfolder_structure2').hide();
        $('#free_subfolder_structure3').hide();

        $('#yarn_information').text("");
        $('#need_embroidery_files').text("");
        $('#cutting_options').text("");
        $('#special_cutting_options').text("");
        $('#needle_instructions').text("");
        $('#standard_instructions').text("");
        $('#special_standard_instructions').text("");
        $('#required_vector_file').text("");
        $('#required_image_file').text("");

        $.ajax({
            url: '{{ __('routes.freelancer-get-order-detail') }}',
            type: 'GET',
            data: {
                id
            },
            success: (data) => {
                var folderArray = [];
                data.detail.map((item, index) => {
                    item = item.split('/')[3];
                    if (folderArray.filter((el) => el == item).length == 0) {
                        folderArray.push(item);
                    }
                });
                console.log(data.en_order);
                var en_order = JSON.parse(data.en_order);
                if (data.order.status == 'Offen') {
                    $('#green_job').show();
                } else if (data.order.status == 'In Bearbeitung') {
                    $('#yellow_job').show();
                }
                if (data.order.width_height == "Höhe") {
                    $('#free_order_detail_popup').find('#detail_width_height').text("High");
                } else if (data.order.width_height == "Breite") {
                    $('#free_order_detail_popup').find('#detail_width_height').text("Width");
                }

                console.log(folderArray);
                $('#free_order_detail_popup').find('#detail_customer_number').text(data.order
                    .customer_number);
                $('[name=free_detail_id]').val(data.order.id);
                $('#free_order_detail_popup').find('#detail_order_number').text(data.order.order_number);
                $('#free_order_detail_popup').find('#detail_project_name').text(data.order.project_name);
                $('#free_order_detail_popup').find('#detail_size').text(data.order.size);
                $('#free_order_detail_popup').find('#detail_final_product').text(en_order.products);
                $('#free_order_detail_popup').find('#detail_special_instructions').text(en_order
                    .special_instructions);
                $data_type = data.order.type;
                if ($data_type == "Vector") {
                    $('.order_size').hide();
                    $('.order_final_product').hide();
                    $('#vector_parameter_div').show();
                } else {
                    $('.order_size').show();
                    $('.order_final_product').show();
                    $('#embroidery_parameter_div').show();
                }
                folderArray.forEach((item) => {
                    if (item == "Originaldatei") {
                        $('#free_subfolder_structure1').show();

                    } else if (item == "Stickprogramm") {
                        $('#free_subfolder_structure2').show();
                    } else if (item == "Vektordatei") {
                        $('#free_subfolder_structure3').show();
                    }
                })
            },
            error: () => {
                console.error('err');
            }
        })

        free_detail_table = $('#free_order_detail').DataTable({
            responsive: true,
            language: {

            },
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ __('routes.freelancer-order-detail') }}',
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
                {
                    data: 'delete',
                    name: 'delete',
                    orderable: false,
                    searchable: false
                },

            ]
        });

        $('#free_order_detail_popup').modal("show");
        free_detail_table.destroy();

        //customer parameter information
        $.ajax({
            url: '{{ __('routes.freelnacer-parameter') }}',
            type: 'GET',
            data: {
                id: $('[name=free_detail_id]').val()
            },
            success: (data) => {
                if (data[0] != null) {
                    data_em = JSON.parse(data[0]);
                    $('#yarn_information').text(data_em.parameter1);
                    $('#need_embroidery_files').text(data_em.parameter2);
                    $('#cutting_options').text(data_em.parameter3);
                    $('#special_cutting_options').text(data_em.parameter4);
                    $('#needle_instructions').text(data_em.parameter5);
                    $('#standard_instructions').text(data_em.parameter6);
                    $('#special_standard_instructions').text(data_em.parameter7);
                }
                if (data[1] != null) {
                    data_ve = JSON.parse(data[1]);
                    $('#required_vector_file').text(data_ve.parameter8);
                    $('#required_image_file').text(data_ve.parameter9);
                }
            },
            error: () => {
                console.error('error');
            }
        })
    }

    function freeMultipleDownload() {
        window.location.href = '{{ url('multi-download') }}/' + $('[name=free_detail_id]').val() + '?type=' +
            folderType;
    }
    $('#free_subfolder_structure1').click(function() {
        freeOpenOrderDetailModal($('[name=free_detail_id]').val(), 'Originaldatei');
    });
    $('#free_subfolder_structure2').click(function() {
        freeOpenOrderDetailModal($('[name=free_detail_id]').val(), 'Stickprogramm');
    });
    $('#free_subfolder_structure3').click(function() {
        freeOpenOrderDetailModal($('[name=free_detail_id]').val(), 'Vektordatei');
    });



    function StartJob() {
        StartJobConfirmAlert();
        $('#start_job_confirm').click(function() {
            $.ajax({
                url: '{{ __('routes.embroidery-freelancer-startjob') }}',
                type: 'GET',
                data: {
                    start_job_id: $('[name=free_detail_id]').val()
                },
                success: () => {
                    $('#em_freelancer_table_reload_btn').trigger('click');
                    $('#em_freelancer_all_table_reload_button').trigger('click');
                    $('#em_freelancer_green_table_reload_button').trigger('click');
                    $('#em_freelancer_yellow_table_reload_button').trigger('click');
                    $('#em_freelancer_red_table_reload_button').trigger('click');
                    $('#ve_freelancer_table_reload_btn').trigger('click');
                    $('#ve_freelancer_all_table_reload_button').trigger('click');
                    $('#ve_freelancer_green_table_reload_button').trigger('click');
                    $('#ve_freelancer_yellow_table_reload_button').trigger('click');
                    $('#ve_freelancer_red_table_reload_button').trigger('click');
                    $('#green_job').hide();
                    $('#start_job_confirm_popup').modal('hide');
                    $('#start_job_success_popup').modal('show');
                },
                error: () => {
                    console.error("error");
                }
            })
        })

    }

    function UpdateJob() {
        $('#freelacner_job_upload_div').show();
        // $('#freelancer_job_end_div').show();
        $('#freelancer_job_update_div').hide();
    }

    $('#freelancer_job_start_form').submit(function(e) {
        e.preventDefault();
    })
    $('.freelancer_job_start_submit').click(function(e) {
        e.preventDefault();
        $('[name=embroidery_request_id]').val("");
        $('[name=vector_request_id]').val("");
        var freelancer_job_data = new FormData();
        freelancer_job_data.append('free_detail_id', $('[name=free_detail_id]').val());
        $('#freelancer_job_upload').find('.fileupload-buttonbar .start').trigger('click');
    })

    function EndJob() {
        $('#free_order_count').modal('show');
        $('[name=free_order_count_select]').val("");
        $('#free_order_count_confirm').click(function() {
            var data = new FormData();
            data.append('count_number', $('[name=free_order_count_select]').val());
            data.append('order_id', $('[name=free_detail_id]').val())
            $.ajax({
                url: '{{ __('routes.freelancer-order-count') }}',
                type: 'post',
                data: data,
                contentType: false,
                processData: false,
                success: () => {
                    $.ajax({
                        url: '{{ __('routes.embroidery-freelancer-endjob') }}',
                        type: 'GET',
                        data: {
                            end_job_id: $('[name=free_detail_id]').val()
                        },
                        success: () => {
                            $('#em_freelancer_table_reload_btn').trigger('click');
                            $('#em_freelancer_all_table_reload_button').trigger(
                                'click');
                            $('#em_freelancer_green_table_reload_button').trigger(
                                'click');
                            $('#em_freelancer_yellow_table_reload_button').trigger(
                                'click');
                            $('#em_freelancer_red_table_reload_button').trigger(
                                'click');
                            $('#ve_freelancer_table_reload_btn').trigger('click');
                            $('#ve_freelancer_all_table_reload_button').trigger(
                                'click');
                            $('#ve_freelancer_green_table_reload_button').trigger(
                                'click');
                            $('#ve_freelancer_yellow_table_reload_button').trigger(
                                'click');
                            $('#ve_freelancer_red_table_reload_button').trigger(
                                'click');
                            $('#em_freelancer_payment_table_reload_button').trigger(
                                'click');
                            $('#ve_freelancer_payment_table_reload_button').trigger(
                                'click');
                            $('#yellow_job').hide();
                            $('#free_upload_success_popup').modal('hide');
                            $('#free_order_count').modal('hide');
                            setTimeout(() => {
                                $('#end_job_success_popup').modal('show');
                            }, 1000);

                            freelancerEndJobMail();
                        },
                        error: () => {
                            $('#end_job_success_popup').modal('hide');
                            EndJobError();
                        }
                    })
                },
                error: () => {
                    console.error('error');
                }
            })
        })
    }

    function freelancerEndJobMail() {
        $.ajax({
            url: '{{ __('routes.freelancer-end-job-mail') }}',
            type: 'get',
            data: {
                order_id: $('[name=free_detail_id]').val()
            },
            success: () => {
                console.log("success");
            },
            error: () => {
                console.error("error");
            }
        })
    }

    function DeleteFile(id) {
        DeleteConfirmAlert();
        console.log(id);
        $('#delete_confirm').click(function() {
            $.ajax({
                url: '{{ __('routes.freelancer-delete-files') }}' + id,
                type: 'GET',
                success: () => {
                    $('#free_subfolder_structure1').trigger('click');
                    $('#delete_confirm_popup').modal('hide');
                },
                error: () => {
                    console.log("error");
                }
            })
        })
    }

    function StartJobConfirmAlert() {
        console.log("sadf");
        $('#start_job_confirm_popup').modal('show');
    }

    function DeleteConfirmAlert() {
        $('#delete_confirm_popup').modal('show');
    }


    function EndJobError() {
        $('#end_job_error_popup').modal('show');
    }
    $(function() {
        $('#freelancer_detail_file_input').on('change', function() {
            var files = $(this)[0].files;
            for (var i = 0; i < files.length; i++) {
                var fileName = files[i].name;
                var fileExtension = fileName.split('.').pop().toLowerCase();
                var fileSize = files[i].size;
                if ($.inArray(fileExtension, ['exe', 'bat']) !== -1) {
                    alert('You cannot upload .exe or .bat files');
                    $('#order_form_upload_list tr').remove();
                    return;
                }
                if (fileSize > 25 * 1024 * 1024) {
                    alert('File size should not exceed 25 MB');
                    $('#order_form_upload_list tr').remove();
                    return;
                }
            }
        });

    })
</script>
