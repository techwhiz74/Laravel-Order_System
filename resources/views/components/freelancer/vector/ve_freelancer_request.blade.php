<style>
    * {
        box-sizing: border-box;
    }

    .order_form_input,
    textarea,
    .ms-options-wrap>button,
    .ms-options-wrap>button:focus {
        width: 100%;
        height: 40px;
        padding: 12px;
        border: 1px solid #ddd !important;
        display: flex;
        margin: auto;
    }

    .ms-options-wrap * {
        font-size: 16px;
    }

    .ms-res-ctn {
        top: 100%;
        left: 0;
    }

    .order_form_lavel {
        display: inline-block;
    }

    .order_form_submit {
        background: #c4ae79 !important;
        color: #fff !important;
        height: 40px !important;
        border: 0;
        border-radius: 0;
        font-size: 13px;
        padding: 6px 25px;
        font-family: "Inter", "Helvetica", monospace;
        float: right;
    }


    .dropdown-toggle.product-multiselect {
        height: 40px;
    }

    .dropdown-toggle.product-multiselect_em_ex {
        height: 40px;
    }

    .dropdown-toggle.product-multiselect div {
        max-width: 100%;
        overflow-y: visible;
        text-wrap: wrap;
        width: 100%;
        min-height: 100%;
        background-color: #fff;
        border: 1px solid #ddd;
    }

    .dropdown-toggle.product-multiselect_em_ex div {
        max-width: 100%;
        overflow-y: visible;
        text-wrap: wrap;
        width: 100%;
        min-height: 100%;
        background-color: #fff;
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    .dropdown-toggle.product-multiselect::after {
        display: none;
    }

    .dropdown-toggle.product-multiselect_em_ex::after {
        display: none;
    }

    /* .order_form_submit:hover {
        background-color: #45a049;
    }

    .order_form_submit_em_ex:hover {
        background-color: #45a049;
    } */


    .col-20 {
        float: left;
        width: 20%;
        margin-top: 10px;
    }

    .col-80 {
        float: left;
        width: 80%;
        margin-top: 6px;
    }

    .col-lg-7 {
        flex: 0 0 auto;
        width: 100%;
    }

    /* Clear floats after the columns */
    .row::after {
        content: "";
        display: table;
        clear: both;
    }

    .order_form_check_label {
        margin-left: 10px;
        margin-top: -4px;
    }

    .ms-options-wrap>.ms-options>ul input[type="checkbox"] {
        margin: auto 5px auto 0;
        position: static;
    }

    .ms-ctn .ms-sel-ctn {
        margin-left: -7px;
        padding-left: 10px;
    }

    .ms-ctn .ms-trigger .ms-trigger-ico {
        display: inline-block;
        width: 0;
        height: 0;
        vertical-align: bottom;
        border-top: 4px solid #333;
        border-right: 4px solid transparent;
        border-left: 4px solid transparent;
        content: "";
        margin-left: 8px;
        margin-top: 15px;
    }

    .ms-res-ctn .ms-res-item {
        line-height: 25px;
        text-align: left;
        padding: 2px 15px;
        color: #666;
        cursor: pointer;
    }

    .clear-products-button {
        position: absolute;
        right: 10px;
        top: 0;
        height: 100%;
        border: none;
        background-color: transparent;
    }

    .product-item-menu {
        position: absolute;
        z-index: 1000;
        display: none;
        min-width: 10rem;
        padding: 0.5rem 0;
        margin: 0;
        font-size: 1rem;
        color: #212529;
        text-align: left;
        list-style: none;
        background-color: #fff;
        background-clip: padding-box;
    }

    .product-item-menu_em_ex {
        position: absolute;
        z-index: 1000;
        display: none;
        min-width: 10rem;
        padding: 0.5rem 0;
        margin: 0;
        font-size: 1rem;
        color: #212529;
        text-align: left;
        list-style: none;
        background-color: #fff;
        background-clip: padding-box;
    }




    .btn-success {
        color: #fff;
        background-color: #c3ac6d;
        border: none;
        border-radius: 0;
    }

    .btn-success :hover {
        background-color: #c3ac6d !important;
    }

    .upload_table_button {
        color: white;
        background-color: #c3ac6d;
        border: none;
        border-radius: 0;
        padding: 5px 8px;
        width: 80px;
    }

    .order_form_validation_deliver_time,
    .order_form_validation_projectname,
    .order_form_validation_size,
    .order_form_validation_products,
    .order_form_file_upload,
    .order_form_validation_checkbox {
        color: red;
        font-style: italic;
        font-size: 13px;
        display: none;
        margin-bottom: 10px;
    }


    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {

        .col-25,
        .col-75 {
            width: 100%;
            margin-top: 0;
        }
    }
</style>
<div class="modal fade" id="ve_freelancer_request_popup" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgb(244, 244, 244)">
            <button type="button" class="backbutton" onclick="hideModal()"><i class="fa-solid fa-left-long"
                    style="display: flex;"></i></button>

            <div class="pagetitle" style="margin-left: 10vw; margin-top:10px !important;">
                <h1>Änderungsanforderungen</h1>
                <p></p>
            </div>
            <div style="font-size: 13px; font-family:'Inter'; padding:20px 20vw">

                <div class="request_information" style="height: 400px;">
                    <div>
                        <nav class="navbar navbar-expand-lg navbar-light bg-light"
                            style="padding: 0; background:#eee !important; border:1px solid #ddd; border-bottom:none;">
                            <div class="container-fluid" style="padding: 0">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="request_li" type="button" id="ve_change1">
                                        1. Änderung
                                    </li>
                                    <li class="request_li" type="button" id="ve_change2">
                                        2. Änderung
                                    </li>
                                    <li class="request_li" type="button" id="ve_change3">
                                        3. Änderung
                                    </li>
                                    <li class="request_li" type="button" id="ve_change4">
                                        4. Änderung
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <div class="order_detail_div1" style="height: 100px !important;">
                            <div id="ve_order_rquest_text1"></div>
                            <div id="ve_order_rquest_text2"></div>
                            <div id="ve_order_rquest_text3"></div>
                            <div id="ve_order_rquest_text4"></div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div style="display: flex; justify-content:flex-end; margin-bottom:5px;">
                            <button class="btn btn-primary btn-sm" onclick="vector_multipleDownload()"
                                style="background-color:#c3ac6d; border:none; font-size:13px;"><i
                                    class="fa-solid fa-download"></i>&nbsp&nbsp{{ __('home.alldownload') }}</button>
                        </div>
                    </div>
                    <div class="col-12" style="display:flex;">
                        <div style="margin-right: 20px;">
                            <ul class="nav nav-tabs flex-column"
                                style="background-color: rgb(244, 244, 244); width:95%; border-bottom:none; padding-left:0px;">
                                <li class="nav-item">
                                    <div class="folder_button" type="button" id="vector_subfolder_structure3_1">
                                        <div style="height: 54%;margin-bottom: 5px;padding: 0; text-align:center;">
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
                                    <div class="folder_button" type="button" id="vector_subfolder_structure3_2">
                                        <div style="height: 54%;margin-bottom: 5px;padding: 0; text-align:center;">
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
                                    <div class="folder_button" type="button" id="vector_subfolder_structure3_3">
                                        <div style="height: 54%;margin-bottom: 5px;padding: 0; text-align:center;">
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
                                    <div class="folder_button" type="button" id="vector_subfolder_structure3_4">
                                        <div style="height: 54%;margin-bottom: 5px;padding: 0; text-align:center;">
                                            <img src="{{ asset('asset/images/folder-open-duotone.svg') }}"
                                                style="width: 37px;">
                                        </div>
                                        <div style="height: 40%;padding: 3px 0;">
                                            <p>
                                                4.ÄNDERUNGSDATEIEN KUNDE</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class="folder_button" type="button" id="vector_subfolder_structure4_1">
                                        <div style="height: 54%;margin-bottom: 5px;padding: 0; text-align:center;">
                                            <img src="{{ asset('asset/images/folder-open-duotone.svg') }}"
                                                style="width: 37px;">
                                        </div>
                                        <div style="height: 40%;padding: 3px 0;">
                                            <p>
                                                1.VEKTORDATEI ÄNDERUNG</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class="folder_button" type="button" id="vector_subfolder_structure4_2">
                                        <div style="height: 54%;margin-bottom: 5px;padding: 0; text-align:center;">
                                            <img src="{{ asset('asset/images/folder-open-duotone.svg') }}"
                                                style="width: 37px;">
                                        </div>
                                        <div style="height: 40%;padding: 3px 0;">
                                            <p>
                                                2.VEKTORDATEI ÄNDERUNG</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class="folder_button" type="button" id="vector_subfolder_structure4_3">
                                        <div style="height: 54%;margin-bottom: 5px;padding: 0; text-align:center;">
                                            <img src="{{ asset('asset/images/folder-open-duotone.svg') }}"
                                                style="width: 37px;">
                                        </div>
                                        <div style="height: 40%;padding: 3px 0;">
                                            <p>
                                                3.VEKTORDATEI ÄNDERUNG</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class="folder_button" type="button" id="vector_subfolder_structure4_4">
                                        <div style="height: 54%;margin-bottom: 5px;padding: 0; text-align:center;">
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
                        <div class="responsive-table" style="height: 200px; width:100%;">

                            <table id="vector_order_detail" class="table table-striped"
                                style="width:100%; font-size:13px; ">
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
                <div class="request_information" style="margin-top: 10px;">
                    <form action="" id="vector_uplaod_form"
                        style="height: 230px; display:flex; flex-direction:column; justify-content:space-between;">
                        <input type="hidden" name="vector_request_id" value="" />
                        <div style="display: flex; overflow-y:auto;">
                            <div id="vector_fileupload" action="" method="POST" enctype="multipart/form-data"
                                style="width: 98%;">
                                <!-- Redirect browsers with JavaScript disabled to the origin page -->
                                <noscript><input type="hidden" name="redirect" value="" /></noscript>
                                <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                <div class="row fileupload-buttonbar">
                                    <div class="col-lg-7">
                                        <!-- The fileinput-button span is used to style the file input field as button -->
                                        <span class="fileinput-button">
                                            <i class="glyphicon glyphicon-plus"></i>
                                            <span style="font-size: 13px;">{{ __('home.add_file') }}...</span>
                                            <input type="file" name="files[]" multiple
                                                accept=".jpg, .png, .pdf, .ai, .dst" />
                                        </span>
                                        <button type="submit" class="btn btn-primary start"
                                            style="visibility: hidden;">
                                            <i class="glyphicon glyphicon-upload"></i>
                                            <span>Start Upload</span>
                                        </button>

                                        <span class="fileupload-process"></span>
                                    </div>
                                    <!-- The global progress state -->
                                    <div class="col-lg-5 fileupload-progress fade">
                                        <!-- The global progress bar -->
                                        <div class="progress progress-striped active" role="progressbar"
                                            aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar progress-bar-success" style="width: 0%;">
                                            </div>
                                        </div>
                                        <!-- The extended global progress state -->
                                        {{-- <div class="progress-extended">&nbsp;</div> --}}
                                    </div>
                                </div>
                                <!-- The table listing the files available for upload/download -->
                                <table role="presentation" class="table table-striped" id="order_form_upload_list">
                                    <tbody class="files"></tbody>
                                </table>

                            </div>
                        </div><br>
                        <div style="display: flex; justify-content:flex-end">
                            <div>
                                <button type="submit" class="vector_upload_submit">Hochladen</button>
                            </div>
                        </div>
                    </form>
                </div>
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
    var selector = '#ve_change1';

    function VectorDetailRequest(id, type) {
        if (type == 'Originaldatei') {
            type = 'Änderungsdateien Kunde1';
            selector = '#ve_change1';
        }
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
                if (data.order_change[0]) {
                    console.log("1q");
                    $('#ve_order_rquest_text1').text(data.order_change[0].message);
                }
                if (data.order_change[1]) {
                    console.log("2q");
                    $('#ve_order_rquest_text2').text(data.order_change[1].message);
                }
                if (data.order_change[2]) {
                    console.log("3q");
                    $('#ve_order_rquest_text3').text(data.order_change[2].message);
                }
                if (data.order_change[3]) {
                    $('#ve_order_rquest_text4').text(data.order_change[3].message);
                }

                var folderArray = [];
                data.detail.map((item, index) => {
                    item = item.split('/')[3];
                    if (folderArray.filter((el) => el == item).length == 0) {
                        folderArray.push(item);
                    }
                });
                console.log(folderArray);

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

            },
            error: () => {
                console.error('err');
            }
        })
        $('#order_form_upload_list tr').remove();

        vector_detail_table = $('#vector_order_detail').DataTable({
            responsive: true,
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
            ]
        });

        $('#ve_freelancer_request_popup').modal('show');
        vector_detail_table.destroy();
    }

    function vector_multipleDownload() {
        window.location.href = '{{ url('multi-download') }}/' + $('[name=vector_request_id]').val();
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
        var freelancer_request_data = new FormData();
        freelancer_request_data.append('vector_request_id', $('[name=vector_request_id]').val());
        $('#vector_fileupload').find('.fileupload-buttonbar .start').trigger('click');
    });
</script>
