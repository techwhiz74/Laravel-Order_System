<div class="modal fade" id="order_request_popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="backbutton" onclick="hideModal()"><i class="fa-solid fa-left-long"
                    style="display: flex;"></i></button>
            <div class="row" style="margin-top: -30px;">
                <div class="col-xl-1"></div>
                <div class="col-12 col-xl-10">
                    <div class="pagetitle">
                        {{ __('home.order_change') }}</div>
                    <div style="font-size: 13px;">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light"
                            style="padding: 0; background:#eee !important; border:1px solid #ddd; border-bottom:none;">
                            <div style="padding: 0">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="request_li" type="button" id="change1">
                                        {{ __('home.request') }} 1
                                    </li>
                                    <li class="request_li" type="button" id="change2">
                                        {{ __('home.request') }} 2
                                    </li>
                                    <li class="request_li" type="button" id="change3">
                                        {{ __('home.request') }} 3
                                    </li>
                                    <li class="request_li" type="button" id="change4">
                                        {{ __('home.request') }} 4
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <div class="order_detail_div" style="min-height: auto !important;">
                            <input type="hidden" id="req_detail_id">
                            <div id="order_rquest_text1"></div>
                            <div id="order_rquest_text2"></div>
                            <div id="order_rquest_text3"></div>
                            <div id="order_rquest_text4"></div>
                        </div>
                        <div class="order_detail_div" style="margin-top: 5px;">
                            <div class="col-12">
                                <div style="display: flex; justify-content:flex-end; margin-bottom:10px;">
                                    <button class="btn btn-primary btn-sm" onclick="req_multipleDownload()"
                                        style="background-color:#c3ac6d; border:none; font-size:13px;"><i
                                            class="fa-solid fa-download"></i>&nbsp&nbsp{{ __('home.alldownload') }}</button>
                                </div>
                            </div>
                            <div class="col-12 file_view_flex_toggle">
                                <div style="margin-right: 10px;">
                                    <ul class="nav nav-tabs column_flex"
                                        style="background-color: none; width:95%; border-bottom:none; padding-left:0px;">
                                        <li class="nav-item">
                                            <div class="folder_button" type="button" id="req_subfolder_structure3_1">
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
                                            <div class="folder_button" type="button" id="req_subfolder_structure3_2">
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
                                            <div class="folder_button" type="button" id="req_subfolder_structure3_3">
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
                                            <div class="folder_button" type="button" id="req_subfolder_structure3_4">
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
                                        <li class="nav-item">
                                            <div class="folder_button" type="button" id="req_subfolder_structure4_1">
                                                <div
                                                    style="height: 54%;margin-bottom: 5px;padding: 0; text-align:center;">
                                                    <img src="{{ asset('asset/images/folder-open-duotone.svg') }}"
                                                        style="width: 37px;">
                                                </div>
                                                <div style="height: 40%;padding: 3px 0;">
                                                    <p>
                                                        1.STICKPROGRAMM ÄNDERUNG</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <div class="folder_button" type="button" id="req_subfolder_structure4_2">
                                                <div
                                                    style="height: 54%;margin-bottom: 5px;padding: 0; text-align:center;">
                                                    <img src="{{ asset('asset/images/folder-open-duotone.svg') }}"
                                                        style="width: 37px;">
                                                </div>
                                                <div style="height: 40%;padding: 3px 0;">
                                                    <p>
                                                        2.STICKPROGRAMM ÄNDERUNG</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <div class="folder_button" type="button"
                                                id="req_subfolder_structure4_3">
                                                <div
                                                    style="height: 54%;margin-bottom: 5px;padding: 0; text-align:center;">
                                                    <img src="{{ asset('asset/images/folder-open-duotone.svg') }}"
                                                        style="width: 37px;">
                                                </div>
                                                <div style="height: 40%;padding: 3px 0;">
                                                    <p>
                                                        3.STICKPROGRAMM ÄNDERUNG</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <div class="folder_button" type="button"
                                                id="req_subfolder_structure4_4">
                                                <div
                                                    style="height: 54%;margin-bottom: 5px;padding: 0; text-align:center;">
                                                    <img src="{{ asset('asset/images/folder-open-duotone.svg') }}"
                                                        style="width: 37px;">
                                                </div>
                                                <div style="height: 40%;padding: 3px 0;">
                                                    <p>
                                                        4.STICKPROGRAMM ÄNDERUNG</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="responsive-table file_view_table">

                                    <table id="req_order_detail" class="table table-striped">
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
                                        <tbody style="text-align: center !important;"></tbody>
                                    </table>
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

<script>
    var selector = '#change1';
    var folderType = 'Änderungsdateien Kunde1';

    function showOrderRequest(id, type) {
        if (type == null) {
            type = 'Änderungsdateien Kunde1';
            selector = '#change1';
        }
        folderType = type;
        var req_detail_table;
        $('#req_detail_id').val(id);
        $('#req_subfolder_structure3_1').hide();
        $('#req_subfolder_structure3_2').hide();
        $('#req_subfolder_structure3_3').hide();
        $('#req_subfolder_structure3_4').hide();
        $('#req_subfolder_structure4_1').hide();
        $('#req_subfolder_structure4_2').hide();
        $('#req_subfolder_structure4_3').hide();
        $('#req_subfolder_structure4_4').hide();
        $('#order_rquest_text2').hide();
        $('#order_rquest_text3').hide();
        $('#order_rquest_text4').hide();
        $('#change1').click(function() {
            $('#order_rquest_text1').show();
            $('#order_rquest_text2').hide();
            $('#order_rquest_text3').hide();
            $('#order_rquest_text4').hide();
            $('#change1').css('background', '#ddd');
            $('#change2').css('background', '#eee');
            $('#change3').css('background', '#eee');
            $('#change4').css('background', '#eee');
        });
        $('#change2').click(function() {
            $('#order_rquest_text1').hide();
            $('#order_rquest_text2').show();
            $('#order_rquest_text3').hide();
            $('#order_rquest_text4').hide();
            $('#change1').css('background', '#eee');
            $('#change2').css('background', '#ddd');
            $('#change3').css('background', '#eee');
            $('#change4').css('background', '#eee');
        });
        $('#change3').click(function() {
            $('#order_rquest_text1').hide();
            $('#order_rquest_text2').hide();
            $('#order_rquest_text3').show();
            $('#order_rquest_text4').hide();
            $('#change1').css('background', '#eee');
            $('#change2').css('background', '#eee');
            $('#change3').css('background', '#ddd');
            $('#change4').css('background', '#eee');
        });
        $('#change4').click(function() {
            $('#order_rquest_text1').hide();
            $('#order_rquest_text2').hide();
            $('#order_rquest_text3').hide();
            $('#order_rquest_text4').show();
            $('#change1').css('background', '#eee');
            $('#change2').css('background', '#eee');
            $('#change3').css('background', '#eee');
            $('#change4').css('background', '#ddd');

        });
        $('#order_rquest_text1').text("");
        $('#order_rquest_text2').text("");
        $('#order_rquest_text3').text("");
        $('#order_rquest_text4').text("");
        $.ajax({
            url: '{{ __('routes.customer-order_request') }}' + id,
            type: 'GET',
            success: (order_request_result) => {
                console.log(order_request_result);
                if (order_request_result[0]) {
                    console.log("1q");
                    $('#order_rquest_text1').text(order_request_result[0].message);
                }
                if (order_request_result[1]) {
                    console.log("2q");
                    $('#order_rquest_text2').text(order_request_result[1].message);
                }
                if (order_request_result[2]) {
                    console.log("3q");
                    $('#order_rquest_text3').text(order_request_result[2].message);
                }
                if (order_request_result[3]) {
                    $('#order_rquest_text4').text(order_request_result[3].message);
                }
                $('#order_request_popup').modal("show");
            },
            error: (err) => {
                console.error(err);
            }
        });
        $.ajax({
            url: '{{ __('routes.customer-req-get-order-detail') }}',
            type: 'GET',
            data: {
                id
            },
            success: (data) => {
                var folderArray = [];

                data.detail.map((item, index) => {
                    item = item.split('/')[3];
                    if (folderArray.filter((el) => el === item).length === 0) {
                        if (item.match(/^(Änderungsdateien Kunde|Stickprogramm Änderung)\d/)) {
                            folderArray.push(item);
                        }
                    }
                });
                console.log(folderArray);
                console.log(data.change_count);
                if (data.change_count == 1) {
                    $('#change1').show();
                    $('#change2').hide();
                    $('#change3').hide();
                    $('#change4').hide();
                } else if (data.change_count == 2) {
                    $('#change1').show();
                    $('#change2').show();
                    $('#change3').hide();
                    $('#change4').hide();
                } else if (data.change_count == 3) {
                    $('#change1').show();
                    $('#change2').show();
                    $('#change3').show();
                    $('#change4').hide();
                }


                $('#req_detail_id').val(data.order.id);



                $("#change1").click(() => {
                    selector = "#change1";
                    $('#req_subfolder_structure3_1').hide();
                    $('#req_subfolder_structure3_2').hide();
                    $('#req_subfolder_structure3_3').hide();
                    $('#req_subfolder_structure3_4').hide();
                    $('#req_subfolder_structure4_1').hide();
                    $('#req_subfolder_structure4_2').hide();
                    $('#req_subfolder_structure4_3').hide();
                    $('#req_subfolder_structure4_4').hide();

                    folderArray.forEach((item) => {
                        if (item == "Änderungsdateien Kunde1") {
                            $('#req_subfolder_structure3_1').show();
                        } else if (item == "Stickprogramm Änderung1") {
                            $('#req_subfolder_structure4_1').show();
                        }
                    });
                    // if (!$('#req_subfolder_structure3_1').is(':visible') && !$(
                    //         '#req_subfolder_structure4_1').is(':visible')) {
                    //     $('#req_order_detail tbody').remove();
                    // }
                });
                $("#change2").click(() => {
                    selector = "#change2";
                    $('#req_subfolder_structure3_1').hide();
                    $('#req_subfolder_structure3_2').hide();
                    $('#req_subfolder_structure3_3').hide();
                    $('#req_subfolder_structure3_4').hide();
                    $('#req_subfolder_structure4_1').hide();
                    $('#req_subfolder_structure4_2').hide();
                    $('#req_subfolder_structure4_3').hide();
                    $('#req_subfolder_structure4_4').hide();

                    folderArray.forEach((item) => {
                        if (item == "Änderungsdateien Kunde2") {
                            $('#req_subfolder_structure3_2').show();
                        } else if (item == "Stickprogramm Änderung2") {
                            $('#req_subfolder_structure4_2').show();
                        }
                    });

                    // if (!$('#req_subfolder_structure3_2').is(':visible') && !$(
                    //         '#req_subfolder_structure4_2').is(':visible')) {
                    //     $('#req_order_detail tbody').remove();
                    // }
                });
                $("#change3").click(() => {
                    selector = "#change3";
                    $('#req_subfolder_structure3_1').hide();
                    $('#req_subfolder_structure3_2').hide();
                    $('#req_subfolder_structure3_3').hide();
                    $('#req_subfolder_structure3_4').hide();
                    $('#req_subfolder_structure4_1').hide();
                    $('#req_subfolder_structure4_2').hide();
                    $('#req_subfolder_structure4_3').hide();
                    $('#req_subfolder_structure4_4').hide();

                    folderArray.forEach((item) => {
                        if (item == "Änderungsdateien Kunde3") {
                            $('#req_subfolder_structure3_3').show();
                        } else if (item == "Stickprogramm Änderung3") {
                            $('#req_subfolder_structure4_3').show();
                        }
                    });
                    // if (!$('#req_subfolder_structure3_3').is(':visible') && !$(
                    //         '#req_subfolder_structure4_3').is(':visible')) {
                    //     $('#req_order_detail tbody').remove();
                    // }
                });
                $("#change4").click(() => {
                    selector = "#change4";
                    $('#req_subfolder_structure3_1').hide();
                    $('#req_subfolder_structure3_2').hide();
                    $('#req_subfolder_structure3_3').hide();
                    $('#req_subfolder_structure3_4').hide();
                    $('#req_subfolder_structure4_1').hide();
                    $('#req_subfolder_structure4_2').hide();
                    $('#req_subfolder_structure4_3').hide();
                    $('#req_subfolder_structure4_4').hide();

                    folderArray.forEach((item) => {
                        if (item == "Änderungsdateien Kunde4") {
                            $('#req_subfolder_structure3_4').show();
                        } else if (item == "Stickprogramm Änderung4") {
                            $('#req_subfolder_structure4_4').show();
                        }
                    });
                    // if (!$('#req_subfolder_structure3_4').is(':visible') && !$(
                    //         '#req_subfolder_structure4_4').is(':visible')) {
                    //     $('#req_order_detail tbody').remove();
                    // }
                });


                $(selector).trigger('click');
            },
            error: () => {
                console.error('err');
            }

        })


        req_detail_table = $('#req_order_detail').DataTable({
            responsive: true,
            language: {

            },
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ __('routes.customer-req-order_detail') }}',
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

        req_detail_table.destroy();

    }

    function req_multipleDownload() {
        window.location.href = '{{ url('multi-download') }}/' + $('#req_detail_id').val() + '?type=' + folderType;
    }
    $('#req_subfolder_structure3_1').click(function() {
        showOrderRequest($('#req_detail_id').val(), 'Änderungsdateien Kunde1');

    });
    $('#req_subfolder_structure3_2').click(function() {
        showOrderRequest($('#req_detail_id').val(), 'Änderungsdateien Kunde2');
    });
    $('#req_subfolder_structure3_3').click(function() {
        showOrderRequest($('#req_detail_id').val(), 'Änderungsdateien Kunde3');
    });
    $('#req_subfolder_structure3_4').click(function() {
        showOrderRequest($('#req_detail_id').val(), 'Änderungsdateien Kunde4');
    });
    $('#req_subfolder_structure4_1').click(function() {
        showOrderRequest($('#req_detail_id').val(), 'Stickprogramm Änderung1');
    });
    $('#req_subfolder_structure4_2').click(function() {
        showOrderRequest($('#req_detail_id').val(), 'Stickprogramm Änderung2');
    });
    $('#req_subfolder_structure4_3').click(function() {
        showOrderRequest($('#req_detail_id').val(), 'Stickprogramm Änderung3');
    });
    $('#req_subfolder_structure4_4').click(function() {
        showOrderRequest($('#req_detail_id').val(), 'Stickprogramm Änderung4');
    });
</script>
