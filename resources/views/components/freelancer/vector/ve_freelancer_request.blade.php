<div class="modal fade" id="ve_freelancer_request_popup" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgb(244, 244, 244)">
            <button type="button" class="backbutton" onclick="hideModal()"><i class="fa-solid fa-left-long"
                    style="display: flex;"></i></button>
            <div class="row" style="margin-top: -30px;">
                <div class="col-xl-1"></div>
                <div class="col-12 col-xl-10">
                    <div class="pagetitle" style="margin-top:10px !important;">
                        {{ __('home.dashboard_change') }}
                    </div>
                    <div style="font-size: 13px; font-family:'Inter';">
                        <div style="margin-bottom: 5px;">
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
                                                            <div id="ve_detail_customer_number"
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
                                                            <div id="ve_detail_order_number"
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
                                                            <div id="ve_detail_project_name"
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
                                                            <label class="control-label">{{ __('home.change_text') }}
                                                            </label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <div class="order_detail_input_div_element">
                                                                <div id="ve_order_rquest_text1"></div>
                                                                <div id="ve_order_rquest_text2"></div>
                                                                <div id="ve_order_rquest_text3"></div>
                                                                <div id="ve_order_rquest_text4"></div>
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
                                                            <div id="ve_required_vector_file"
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
                                                            <div id="ve_required_image_file"
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
                        <div>
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="order_detail_div">
                                        <div>
                                            <nav class="navbar navbar-expand-lg navbar-light bg-light"
                                                style="padding: 0; background:#eee !important; border:1px solid #ddd; border-bottom:none;">
                                                <div style="padding: 0">
                                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                                        <li class="request_li" type="button" id="ve_change1">
                                                            {{ __('home.change1') }}
                                                        </li>
                                                        <li class="request_li" type="button" id="ve_change2">
                                                            {{ __('home.change2') }}
                                                        </li>
                                                        <li class="request_li" type="button" id="ve_change3">
                                                            {{ __('home.change3') }}
                                                        </li>
                                                        <li class="request_li" type="button" id="ve_change4">
                                                            {{ __('home.change4') }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </nav>
                                        </div>
                                        <div class="col-12">
                                            <div style="display: flex; justify-content:flex-end; margin-bottom:5px;">
                                                <button class="btn btn-primary btn-sm"
                                                    onclick="vector_multipleDownload()"
                                                    style="background-color:#c3ac6d; border:none; font-size:13px;"><i
                                                        class="fa-solid fa-download"></i>&nbsp&nbsp{{ __('home.alldownload') }}</button>
                                            </div>
                                        </div>
                                        <div class="col-12 file_view_flex_toggle">
                                            <div style="margin-right: 10px;">
                                                <ul class="nav nav-tabs column_flex">
                                                    <li class="nav-item">
                                                        <div class="folder_button" type="button"
                                                            id="vector_subfolder_structure3_1">
                                                            <div
                                                                style="height: 54%;margin-bottom: 5px;padding: 0; text-align:center;">
                                                                <img src="{{ asset('asset/images/folder-open-duotone.svg') }}"
                                                                    style="width: 37px;">
                                                            </div>
                                                            <div style="height: 40%;padding: 3px 0;">
                                                                <p>
                                                                    1.ÄNDERUNGSDATEIEN KUNDE</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="nav-item">
                                                        <div class="folder_button" type="button"
                                                            id="vector_subfolder_structure3_2">
                                                            <div
                                                                style="height: 54%;margin-bottom: 5px;padding: 0; text-align:center;">
                                                                <img src="{{ asset('asset/images/folder-open-duotone.svg') }}"
                                                                    style="width: 37px;">
                                                            </div>
                                                            <div style="height: 40%;padding: 3px 0;">
                                                                <p>
                                                                    2.ÄNDERUNGSDATEIEN KUNDE</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="nav-item">
                                                        <div class="folder_button" type="button"
                                                            id="vector_subfolder_structure3_3">
                                                            <div
                                                                style="height: 54%;margin-bottom: 5px;padding: 0; text-align:center;">
                                                                <img src="{{ asset('asset/images/folder-open-duotone.svg') }}"
                                                                    style="width: 37px;">
                                                            </div>
                                                            <div style="height: 40%;padding: 3px 0;">
                                                                <p>
                                                                    3.ÄNDERUNGSDATEIEN KUNDE</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="nav-item">
                                                        <div class="folder_button" type="button"
                                                            id="vector_subfolder_structure3_4">
                                                            <div
                                                                style="height: 54%;margin-bottom: 5px;padding: 0; text-align:center;">
                                                                <img src="{{ asset('asset/images/folder-open-duotone.svg') }}"
                                                                    style="width: 37px;">
                                                            </div>
                                                            <div style="height: 40%;padding: 3px 0;">
                                                                <p>
                                                                    4.ÄNDERUNGSDATEIEN KUNDE</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="nav-item" style="margin-top: 5px;">
                                                        <div class="folder_button" type="button"
                                                            id="vector_subfolder_structure4_1">
                                                            <div
                                                                style="height: 54%;margin-bottom: 5px;padding: 0; text-align:center;">
                                                                <img src="{{ asset('asset/images/folder-open-duotone.svg') }}"
                                                                    style="width: 37px;">
                                                            </div>
                                                            <div style="height: 40%;padding: 3px 0;">
                                                                <p>
                                                                    1.VEKTORDATEI ÄNDERUNG</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="nav-item" style="margin-top: 5px;">
                                                        <div class="folder_button" type="button"
                                                            id="vector_subfolder_structure4_2">
                                                            <div
                                                                style="height: 54%;margin-bottom: 5px;padding: 0; text-align:center;">
                                                                <img src="{{ asset('asset/images/folder-open-duotone.svg') }}"
                                                                    style="width: 37px;">
                                                            </div>
                                                            <div style="height: 40%;padding: 3px 0;">
                                                                <p>
                                                                    2.VEKTORDATEI ÄNDERUNG</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="nav-item" style="margin-top: 5px;">
                                                        <div class="folder_button" type="button"
                                                            id="vector_subfolder_structure4_3">
                                                            <div
                                                                style="height: 54%;margin-bottom: 5px;padding: 0; text-align:center;">
                                                                <img src="{{ asset('asset/images/folder-open-duotone.svg') }}"
                                                                    style="width: 37px;">
                                                            </div>
                                                            <div style="height: 40%;padding: 3px 0;">
                                                                <p>
                                                                    3.VEKTORDATEI ÄNDERUNG</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="nav-item" style="margin-top: 5px;">
                                                        <div class="folder_button" type="button"
                                                            id="vector_subfolder_structure4_4">
                                                            <div
                                                                style="height: 54%;margin-bottom: 5px;padding: 0; text-align:center;">
                                                                <img src="{{ asset('asset/images/folder-open-duotone.svg') }}"
                                                                    style="width: 37px;">
                                                            </div>
                                                            <div style="height: 40%;padding: 3px 0;">
                                                                <p>
                                                                    4.VEKTORDATEI ÄNDERUNG</p>
                                                            </div>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="responsive-table file_view_table">

                                                <table id="vector_order_detail" class="table table-striped"
                                                    style="width:100%; font-size:13px; ">
                                                    <thead>
                                                        <tr>
                                                            <th style="text-align: center;">
                                                                {{ __('home.customer_number') }}</th>
                                                            <th style="text-align: center">
                                                                {{ __('home.order_number') }}
                                                            </th>
                                                            <th style="text-align: center">{{ __('home.index') }}</th>
                                                            <th style="text-align: center">{{ __('home.extension') }}
                                                            </th>
                                                            <th style="text-align: center">{{ __('home.download') }}
                                                            </th>
                                                            <th style="text-align: center">{{ __('home.delete') }}
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="text-align: center"></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="order_detail_div">
                                        <div id="ve_green_job">
                                            <div class="box_title">{{ __('home.start_change') }}</div>
                                            <div>
                                                <button onclick="VectorStartChange()" class="job_button">START
                                                    CHANGE</button>
                                            </div>
                                        </div>
                                        <div id="ve_yellow_job">
                                            <div class="box_title">{{ __('home.upload_change') }}
                                            </div>
                                            <div
                                                style="display: flex; flex-direction:column; justify-content:space-between">
                                                <div id="ve_change_upload_div">
                                                    <form action="" id="vector_uplaod_form"
                                                        class="box_change_file_upload_form">
                                                        <input type="hidden" name="vector_request_id"
                                                            value="" />
                                                        <input type="hidden" name="vector_time" value="" />
                                                        <div style="display: flex; overflow-y:auto;">
                                                            <div id="vector_fileupload" action="" method="POST"
                                                                enctype="multipart/form-data" style="width: 98%;">
                                                                <noscript><input type="hidden" name="redirect"
                                                                        value="" /></noscript>
                                                                <div class="row fileupload-buttonbar">
                                                                    <div class="col-lg-7">
                                                                        <span class="fileinput-button">
                                                                            <i class="glyphicon glyphicon-plus"></i>
                                                                            <span
                                                                                style="font-size: 13px;">{{ __('home.add_file') }}...</span>
                                                                            <input type="file" name="files[]"
                                                                                multiple
                                                                                id="ve_freelancer_change_file_input" />
                                                                        </span>
                                                                        <button type="submit"
                                                                            class="btn btn-primary start"
                                                                            style="visibility: hidden;">
                                                                            <i class="glyphicon glyphicon-upload"></i>
                                                                            <span>Start Upload</span>
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
                                                                <table role="presentation" class="table table-striped"
                                                                    id="order_form_upload_list">
                                                                    <tbody class="files"></tbody>
                                                                </table>

                                                            </div>
                                                        </div><br>
                                                        <div style="display: flex; justify-content:flex-end">
                                                            <div>
                                                                <button type="submit"
                                                                    class="vector_upload_submit">{{ __('home.order_upload') }}</button>
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
            <div class="col-xl-1"></div>
        </div>
    </div>
</div>
</div>
@include('components.freelancer.vector.start_change_confirm_modal')
@include('components.freelancer.vector.change_upload_success_modal')
@include('components.freelancer.vector.end_change_success_modal')
@include('components.freelancer.vector.delete_confirm_modal')

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var selector = '#ve_change1';
    var folderType = 'Änderungsdateien Kunde1';

    function VectorDetailRequest(id, type) {
        $('[name=vector_time]').val(new Date());
        folderType = type;
        if (type == 'Originaldatei') {
            type = 'Änderungsdateien Kunde1';
            selector = '#ve_change1';
        }
        $('#ve_green_job').show();
        $('#ve_yellow_job').hide();
        var vector_detail_table;
        $('[name=vector_request_id]').val(id);
        $('#vector_subfolder_structure3_1').hide();
        $('#vector_subfolder_structure3_2').hide();
        $('#vector_subfolder_structure3_3').hide();
        $('#vector_subfolder_structure3_4').hide();
        $('#vector_subfolder_structure4_1').hide();
        $('#vector_subfolder_structure4_2').hide();
        $('#vector_subfolder_structure4_3').hide();
        $('#vector_subfolder_structure4_4').hide();
        $('#ve_order_rquest_text2').hide();
        $('#ve_order_rquest_text3').hide();
        $('#ve_order_rquest_text4').hide();
        $('#ve_change1').click(function() {
            $('#ve_order_rquest_text1').show();
            $('#ve_order_rquest_text2').hide();
            $('#ve_order_rquest_text3').hide();
            $('#ve_order_rquest_text4').hide();
            $('#ve_change1').css('background', '#ddd');
            $('#ve_change2').css('background', '#eee');
            $('#ve_change3').css('background', '#eee');
            $('#ve_change4').css('background', '#eee');
        });
        $('#ve_change2').click(function() {
            $('#ve_order_rquest_text1').hide();
            $('#ve_order_rquest_text2').show();
            $('#ve_order_rquest_text3').hide();
            $('#ve_order_rquest_text4').hide();
            $('#ve_change1').css('background', '#eee');
            $('#ve_change2').css('background', '#ddd');
            $('#ve_change3').css('background', '#eee');
            $('#ve_change4').css('background', '#eee');
        });
        $('#ve_change3').click(function() {
            $('#ve_order_rquest_text1').hide();
            $('#ve_order_rquest_text2').hide();
            $('#ve_order_rquest_text3').show();
            $('#ve_order_rquest_text4').hide();
            $('#ve_change1').css('background', '#eee');
            $('#ve_change2').css('background', '#eee');
            $('#ve_change3').css('background', '#ddd');
            $('#ve_change4').css('background', '#eee');
        });
        $('#ve_change4').click(function() {
            $('#ve_order_rquest_text1').hide();
            $('#ve_order_rquest_text2').hide();
            $('#ve_order_rquest_text3').hide();
            $('#ve_order_rquest_text4').show();
            $('#ve_change1').css('background', '#eee');
            $('#ve_change2').css('background', '#eee');
            $('#ve_change3').css('background', '#eee');
            $('#ve_change4').css('background', '#ddd');
        });
        $('#ve_order_rquest_text1').text("");
        $('#ve_order_rquest_text2').text("");
        $('#ve_order_rquest_text3').text("");
        $('#ve_order_rquest_text4').text("");

        $.ajax({
            url: '{{ __('routes.vector-freelancer-get-request-detail') }}',
            type: 'GET',
            data: {
                id
            },
            success: (data) => {
                var en_order_change = JSON.parse(data.en_order_change);
                if (data.order_change[0]) {
                    console.log("1q");
                    $('#ve_order_rquest_text1').text(en_order_change[0].message);
                }
                if (data.order_change[1]) {
                    console.log("2q");
                    $('#ve_order_rquest_text2').text(en_order_change[1].message);
                }
                if (data.order_change[2]) {
                    console.log("3q");
                    $('#ve_order_rquest_text3').text(en_order_change[2].message);
                }
                if (data.order_change[3]) {
                    $('#ve_order_rquest_text4').text(en_order_change[3].message);
                }

                var folderArray = [];
                data.detail.map((item, index) => {
                    item = item.split('/')[3];
                    if (folderArray.filter((el) => el == item).length == 0) {
                        folderArray.push(item);
                    }
                });
                console.log(folderArray);
                console.log(data.change_count);

                if (data.change_count == 1) {
                    $('#ve_change1').show();
                    $('#ve_change2').hide();
                    $('#ve_change3').hide();
                    $('#ve_change4').hide();
                } else if (data.change_count == 2) {
                    $('#ve_change1').show();
                    $('#ve_change2').show();
                    $('#ve_change3').hide();
                    $('#ve_change4').hide();
                } else if (data.change_count == 3) {
                    $('#ve_change1').show();
                    $('#ve_change2').show();
                    $('#ve_change3').show();
                    $('#ve_change4').hide();
                }
                $('[name=vector_request_id]').val(data.order.id);


                $('#ve_freelancer_request_popup').find('#ve_detail_customer_number').text(data.order
                    .customer_number);
                $('#ve_freelancer_request_popup').find('#ve_detail_order_number').text(data.order
                    .order_number);
                $('#ve_freelancer_request_popup').find('#ve_detail_project_name').text(data.order
                    .project_name);


                $("#ve_change1").click(() => {
                    selector = "#ve_change1";
                    $('#vector_subfolder_structure3_1').hide();
                    $('#vector_subfolder_structure3_2').hide();
                    $('#vector_subfolder_structure3_3').hide();
                    $('#vector_subfolder_structure3_4').hide();
                    $('#vector_subfolder_structure4_1').hide();
                    $('#vector_subfolder_structure4_2').hide();
                    $('#vector_subfolder_structure4_3').hide();
                    $('#vector_subfolder_structure4_4').hide();

                    folderArray.forEach((item) => {
                        if (item == "Änderungsdateien Kunde1") {
                            $('#vector_subfolder_structure3_1').show();
                        } else if (item == "Vektordatei Änderung1") {
                            $('#vector_subfolder_structure4_1').show();
                        }
                    });

                });
                $("#ve_change2").click(() => {
                    selector = "#ve_change2";
                    $('#vector_subfolder_structure3_1').hide();
                    $('#vector_subfolder_structure3_2').hide();
                    $('#vector_subfolder_structure3_3').hide();
                    $('#vector_subfolder_structure3_4').hide();
                    $('#vector_subfolder_structure4_1').hide();
                    $('#vector_subfolder_structure4_2').hide();
                    $('#vector_subfolder_structure4_3').hide();
                    $('#vector_subfolder_structure4_4').hide();

                    folderArray.forEach((item) => {
                        if (item == "Änderungsdateien Kunde2") {
                            $('#vector_subfolder_structure3_2').show();
                        } else if (item == "Vektordatei Änderung2") {
                            $('#vector_subfolder_structure4_2').show();
                        }
                    });

                });
                $("#ve_change3").click(() => {
                    selector = "#ve_change3";
                    $('#vector_subfolder_structure3_1').hide();
                    $('#vector_subfolder_structure3_2').hide();
                    $('#vector_subfolder_structure3_3').hide();
                    $('#vector_subfolder_structure3_4').hide();
                    $('#vector_subfolder_structure4_1').hide();
                    $('#vector_subfolder_structure4_2').hide();
                    $('#vector_subfolder_structure4_3').hide();
                    $('#vector_subfolder_structure4_4').hide();

                    folderArray.forEach((item) => {
                        if (item == "Änderungsdateien Kunde3") {
                            $('#vector_subfolder_structure3_3').show();
                        } else if (item == "Vektordatei Änderung3") {
                            $('#vector_subfolder_structure4_3').show();
                        }
                    });

                });
                $("#ve_change4").click(() => {
                    selector = "#ve_change4";
                    $('#vector_subfolder_structure3_1').hide();
                    $('#vector_subfolder_structure3_2').hide();
                    $('#vector_subfolder_structure3_3').hide();
                    $('#vector_subfolder_structure3_4').hide();
                    $('#vector_subfolder_structure4_1').hide();
                    $('#vector_subfolder_structure4_2').hide();
                    $('#vector_subfolder_structure4_3').hide();
                    $('#vector_subfolder_structure4_4').hide();

                    folderArray.forEach((item) => {
                        if (item == "Änderungsdateien Kunde4") {
                            $('#vector_subfolder_structure3_4').show();
                        } else if (item == "Vektordatei Änderung4") {
                            $('#vector_subfolder_structure4_4').show();
                        }
                    });
                });


                $(selector).trigger('click');

                folderArray.forEach((item) => {
                    if (item == "Vektordatei Änderung1") {
                        $('#ve_green_job').hide();
                        $('#ve_yellow_job').show();
                    }
                })

            },
            error: () => {
                console.error('err');
            }
        })
        $('#order_form_upload_list tr').remove();

        vector_detail_table = $('#vector_order_detail').DataTable({
            responsive: true,
            searchable: false,
            language: {

            },
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ __('routes.vector-freelancer-order_detail') }}',
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

        $('#ve_freelancer_request_popup').modal('show');
        vector_detail_table.destroy();
        //customer parameter information
        $.ajax({
            url: '{{ __('routes.freelnacer-vector-parameter') }}',
            type: 'GET',
            data: {
                id: $('[name=vector_request_id]').val()
            },
            success: (data) => {
                if (data[1] != null) {
                    data_ve = JSON.parse(data[1]);
                    $('#ve_required_vector_file').text(data_ve.parameter8);
                    $('#ve_required_image_file').text(data_ve.parameter9);
                }
            },
            error: () => {
                console.error('error');
            }
        })
    }

    function DeleteVeRequestFile(id) {
        $('#delete_ve_request_confirm_popup').modal('show');
        console.log(id);
        $('#delete_ve_request_confirm').click(function() {
            $.ajax({
                url: '{{ __('routes.freelancer-em-delete-files') }}' + id,
                type: 'GET',
                success: () => {
                    $('#vector_subfolder_structure3_1').trigger('click');
                    $('#delete_ve_request_confirm_popup').modal('hide');
                },
                error: () => {
                    console.log("error");
                }
            })
        })
    }

    function vector_multipleDownload() {
        window.location.href = '{{ url('multi-download') }}/' + $('[name=vector_request_id]').val() + '?type=' +
            folderType;
    }
    $('#vector_subfolder_structure3_1').click(function() {
        VectorDetailRequest($('[name=vector_request_id]').val(), 'Änderungsdateien Kunde1');
    });
    $('#vector_subfolder_structure3_2').click(function() {
        VectorDetailRequest($('[name=vector_request_id]').val(), 'Änderungsdateien Kunde2');
    });
    $('#vector_subfolder_structure3_3').click(function() {
        VectorDetailRequest($('[name=vector_request_id]').val(), 'Änderungsdateien Kunde3');
    });
    $('#vector_subfolder_structure3_4').click(function() {
        VectorDetailRequest($('[name=vector_request_id]').val(), 'Änderungsdateien Kunde4');
    });
    $('#vector_subfolder_structure4_1').click(function() {
        VectorDetailRequest($('[name=vector_request_id]').val(), 'Vektordatei Änderung1');
    });
    $('#vector_subfolder_structure4_2').click(function() {
        VectorDetailRequest($('[name=vector_request_id]').val(), 'Vektordatei Änderung2');
    });
    $('#vector_subfolder_structure4_3').click(function() {
        VectorDetailRequest($('[name=vector_request_id]').val(), 'Vektordatei Änderung3');
    });
    $('#vector_subfolder_structure4_4').click(function() {
        VectorDetailRequest($('[name=vector_request_id]').val(), 'Vektordatei Änderung4');
    });


    $('#vector_uplaod_form').submit(function(e) {
        e.preventDefault();
    })
    $('.vector_upload_submit').click(function(e) {
        e.preventDefault();
        $('[name=free_detail_id]').val("");
        $('[name=embroidery_request_id]').val("");
        var freelancer_ve_request_data = new FormData();
        freelancer_ve_request_data.append('vector_request_id', $('[name=vector_request_id]').val());
        freelancer_ve_request_data.append('vector_time', $('[name=vector_time]').val());
        $('#vector_fileupload').find('.fileupload-buttonbar .start').trigger('click');
    });

    function VectorStartChange() {
        VectorStartChangeConfirmAlert();
        $('#ve_start_change_confirm').click(function() {
            $('#ve_green_job').hide();
            $('#ve_yellow_job').show();
            $('#ve_start_change_confirm_popup').modal('hide');
        })
    }

    function VectorEndChange() {
        $.ajax({
            url: '{{ __('routes.vector-freelancer-endchange') }}',
            type: 'GET',
            data: {
                ve_end_change_id: $('[name=vector_request_id]').val()
            },
            success: () => {
                $('#ve_freelancer_table_reload_btn').trigger('click');
                $('#ve_freelancer_all_table_reload_button').trigger('click');
                $('#ve_freelancer_blue_table_reload_button').trigger('click');
                $('#ve_freelancer_red_table_reload_button').trigger('click');
                $('#ve_yellow_job').hide();
                $('#ve_upload_success_popup').modal('hide');
                $('#end_ve_change_success_popup').modal('show');

            },
            error: () => {
                $('#ve_end_change_confirm_popup').modal('hide');
                VectorEndChangeError();
            }
        })
    }

    function VectorStartChangeConfirmAlert() {
        console.log("sadf");
        $('#ve_start_change_confirm_popup').modal('show');
    }


    function VectorEndChangeError() {
        $('#ve_end_change_error_popup').modal('show');
    }
    $(function() {
        $('#ve_freelancer_change_file_input').on('change', function() {
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
