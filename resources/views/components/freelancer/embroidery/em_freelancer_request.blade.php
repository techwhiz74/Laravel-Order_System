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
        border: 1px solid #ccc;
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
        border: 1px solid #ccc;
    }

    .dropdown-toggle.product-multiselect_em_ex div {
        max-width: 100%;
        overflow-y: visible;
        text-wrap: wrap;
        width: 100%;
        min-height: 100%;
        background-color: #fff;
        border-radius: 5px;
        border: 1px solid #ccc;
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
        border: 1px solid rgba(0, 0, 0, .15);
        border-radius: 0.25rem;
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
        border: 1px solid rgba(0, 0, 0, .15);
        border-radius: 0.25rem;
    }

    .order_form_file_uplaod_command {
        color: #c3ac6d;
        text-align: center;
        font-size: 20px;
    }

    #order_form_anotherOrderButton {
        background-color: #c3ac6d;
        color: white;
        padding: 10px 14px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 300px;
        float: right;
        margin-top: 50px;
        margin-right: 160px;
        font-size: 13px
    }

    #order_form_anotherOrderButton:hover {
        background-color: #c3ac6f;
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

    .upload_cacel_btn {
        margin-left: -120px;
        color: white;
        background-color: #c3ac6d;
        border: none;
        border-radius: 0;
        padding: 7px 10px;
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
<div class="modal fade" id="em_freelancer_request_popup" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgb(244, 244, 244)">
            <button type="button" style="font-size: 18px; border:none; background:none;" onclick="hideModal()"><i
                    class="fa-solid fa-left-long" style="display: flex;"></i></button>

            <div class="pagetitle" style="margin-left: 10vw; margin-top:10px !important;">
                <h1>Änderungsanforderungen</h1>
                <p></p>
            </div>
            <div style="font-size: 13px; font-family:'Inter'; padding:20px 20vw">

                <div class="request_information" style="height: 400px; overflow:auto;">
                    <div id="request_information_text"></div>
                    <div class="col-12" style="display:flex;">
                        <div class="col-3">
                            <ul class="nav nav-tabs flex-column"
                                style="background-color: rgb(244, 244, 244); width:70%; border-bottom:none; padding-left:0px;">
                                <li class="nav-item" style="margin-bottom:10px;">
                                    <button id="freelancer_subfolder_structure1" class="order_detail_folder_button"><i
                                            class="fa-regular fa-folder-open" style="margin-right: 5px;"></i>
                                        Originaldatei</button>
                                </li>
                                <li class="nav-item" style="margin-bottom:10px;">
                                    <button id="freelancer_subfolder_structure2" class="order_detail_folder_button"><i
                                            class="fa-regular fa-folder-open" style="margin-right: 5px;"></i>
                                        Stickprogramm</button>
                                </li>
                                <li class="nav-item" style="margin-bottom:10px;">
                                    <button id="freelancer_subfolder_structure3" class="order_detail_folder_button"
                                        style="display: flex;">
                                        <i class="fa-regular fa-folder-open" style="margin-right: 5px;"></i>
                                        <div style="margin-left:5px; text-align:left;">
                                            Änderungsdateien Kunde</div>
                                    </button>
                                </li>
                                <li class="nav-item" style="margin-bottom:10px;">
                                    <button id="freelancer_subfolder_structure4" class="order_detail_folder_button">
                                        <i class="fa-regular fa-folder-open" style="margin-right: 5px;"></i>
                                        <div style="margin-left:5px; text-align:left;">
                                            Stickprogramm Änderung</div>
                                    </button>
                                </li>

                            </ul>
                        </div>
                        <div class="col-9 responsive-table">

                            <table id="freelancer_order_detail" class="table table-striped"
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
                    <form action="" id="freelancer_uplaod_form">
                        <input type="hidden" name="freelancer_request_id" value="" />
                        <div style="display: flex">
                            <div id="freelancer_fileupload" action="" method="POST" enctype="multipart/form-data">
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
                                        <button type="reset" class="upload_cacel_btn">
                                            <i class="glyphicon glyphicon-ban-circle"></i>
                                            <span style="font-size: 13px;">{{ __('home.cancel_upload') }}</span>
                                        </button>
                                        <!-- The global file processing state -->
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
                                <button type="submit" class="freelancer_upload_submit">Hochladen</button>
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

    function FreelancerDetailRequest(id, type) {

        var freelancer_detail_table;
        $('[name=freelancer_request_id]').val(id);
        $('#freelancer_subfolder_structure1').hide();
        $('#freelancer_subfolder_structure2').hide();
        $('#freelancer_subfolder_structure3').hide();
        $('#freelancer_subfolder_structure4').hide();
        $.ajax({
            url: '{{ __('routes.embroidery-freelancer-get-request-detail') }}',
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
                $('#em_freelancer_request_popup').find('#request_information_text').text(data.order_change
                    .message);
                $('[name=freelancer_request_id]').val(data.order.id);

                folderArray.forEach((item) => {
                    if (item == "Originaldatei") {
                        $('#freelancer_subfolder_structure1').show();
                    } else if (item == "Stickprogramm") {
                        $('#freelancer_subfolder_structure2').show();
                    } else if (item == "Änderungsdateien Kunde") {
                        $('#freelancer_subfolder_structure3').show();
                    } else if (item == "Stickprogramm Änderung") {
                        $('#freelancer_subfolder_structure4').show();
                    }
                })

            },
            error: () => {
                console.error('err');
            }
        })
        $('#order_form_upload_list tr').remove();

        freelancer_detail_table = $('#freelancer_order_detail').DataTable({
            responsive: true,
            language: {

            },
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ __('routes.embroidery-freelancer-order_detail') }}",
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

        $('#em_freelancer_request_popup').modal('show');
        freelancer_detail_table.destroy();
    }
    $('#freelancer_subfolder_structure1').click(function() {
        FreelancerDetailRequest($('[name=freelancer_request_id]').val(), 'Originaldatei');
    });
    $('#freelancer_subfolder_structure2').click(function() {
        FreelancerDetailRequest($('[name=freelancer_request_id]').val(), 'Stickprogramm');
    });
    $('#freelancer_subfolder_structure3').click(function() {
        FreelancerDetailRequest($('[name=freelancer_request_id]').val(), 'Änderungsdateien Kunde');
    });
    $('#freelancer_subfolder_structure4').click(function() {
        FreelancerDetailRequest($('[name=freelancer_request_id]').val(), 'Stickprogramm Änderung');
    });

    $('#freelancer_uplaod_form').submit(function(e) {
        e.preventDefault();
    })
    $('.freelancer_upload_submit').click(function(e) {
        e.preventDefault();
        var freelancer_request_data = new FormData();
        freelancer_request_data.append('freelancer_request_id', $('[name=freelancer_request_id]').val());
        $('#freelancer_fileupload').find('.fileupload-buttonbar .start').trigger('click');
    });
</script>
