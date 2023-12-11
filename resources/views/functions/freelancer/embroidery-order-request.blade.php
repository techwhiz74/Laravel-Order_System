<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var selector = '#em_change1';
    var folderType = 'Änderungsdateien Kunde1';

    function EmbroideryDetailRequest(id, type) {
        folderType = type;
        if (type == 'Originaldatei') {
            type = 'Änderungsdateien Kunde1';
            selector = '#em_change1';
        }
        $('#em_green_job').show();
        $('#em_yellow_job').hide();
        var embroidery_detail_table;
        $('[name=embroidery_request_id]').val(id);
        $('#embroidery_subfolder_structure3_1').hide();
        $('#embroidery_subfolder_structure3_2').hide();
        $('#embroidery_subfolder_structure3_3').hide();
        $('#embroidery_subfolder_structure3_4').hide();
        $('#embroidery_subfolder_structure4_1').hide();
        $('#embroidery_subfolder_structure4_2').hide();
        $('#embroidery_subfolder_structure4_3').hide();
        $('#embroidery_subfolder_structure4_4').hide();
        $('#em_order_rquest_text2').hide();
        $('#em_order_rquest_text3').hide();
        $('#em_order_rquest_text4').hide();
        $('#em_change1').click(function() {
            $('#em_order_rquest_text1').show();
            $('#em_order_rquest_text2').hide();
            $('#em_order_rquest_text3').hide();
            $('#em_order_rquest_text4').hide();
            $('#em_change1').css('background', '#ddd');
            $('#em_change2').css('background', '#eee');
            $('#em_change3').css('background', '#eee');
            $('#em_change4').css('background', '#eee');
        });
        $('#em_change2').click(function() {
            $('#em_order_rquest_text1').hide();
            $('#em_order_rquest_text2').show();
            $('#em_order_rquest_text3').hide();
            $('#em_order_rquest_text4').hide();
            $('#em_change1').css('background', '#eee');
            $('#em_change2').css('background', '#ddd');
            $('#em_change3').css('background', '#eee');
            $('#em_change4').css('background', '#eee');
        });
        $('#em_change3').click(function() {
            $('#em_order_rquest_text1').hide();
            $('#em_order_rquest_text2').hide();
            $('#em_order_rquest_text3').show();
            $('#em_order_rquest_text4').hide();
            $('#em_change1').css('background', '#eee');
            $('#em_change2').css('background', '#eee');
            $('#em_change3').css('background', '#ddd');
            $('#em_change4').css('background', '#eee');
        });
        $('#em_change4').click(function() {
            $('#em_order_rquest_text1').hide();
            $('#em_order_rquest_text2').hide();
            $('#em_order_rquest_text3').hide();
            $('#em_order_rquest_text4').show();
            $('#em_change1').css('background', '#eee');
            $('#em_change2').css('background', '#eee');
            $('#em_change3').css('background', '#eee');
            $('#em_change4').css('background', '#ddd');
        });
        $('#em_order_rquest_text1').text("");
        $('#em_order_rquest_text2').text("");
        $('#em_order_rquest_text3').text("");
        $('#em_order_rquest_text4').text("");

        $.ajax({
            url: '{{ __('routes.embroidery-freelancer-get-request-detail') }}',
            type: 'GET',
            data: {
                id
            },
            success: (data) => {
                var en_order_change = JSON.parse(data.en_order_change);
                if (data.order_change[0]) {
                    console.log("1q");
                    $('#em_order_rquest_text1').text(en_order_change[0].message);
                }
                if (data.order_change[1]) {
                    console.log("2q");
                    $('#em_order_rquest_text2').text(en_order_change[1].message);
                }
                if (data.order_change[2]) {
                    console.log("3q");
                    $('#em_order_rquest_text3').text(en_order_change[2].message);
                }
                if (data.order_change[3]) {
                    $('#em_order_rquest_text4').text(en_order_change[3].message);
                }

                var folderArray = [];
                data.detail.map((item, index) => {
                    item = item.split('/')[3];
                    if (folderArray.filter((el) => el == item).length == 0) {
                        folderArray.push(item);
                    }
                });
                if (data.order.width_height == "Höhe") {
                    $('#em_freelancer_request_popup').find('#em_detail_width_height').text("High");
                } else if (data.order.width_height == "Breite") {
                    $('#em_freelancer_request_popup').find('#em_detail_width_height').text("Width");
                }
                var en_order = JSON.parse(data.en_order);

                $('#em_freelancer_request_popup').find('#em_detail_customer_number').text(data.order
                    .customer_number);
                $('#em_freelancer_request_popup').find('#em_detail_order_number').text(data.order
                    .order_number);
                $('#em_freelancer_request_popup').find('#em_detail_project_name').text(data.order
                    .project_name);
                $('#em_freelancer_request_popup').find('#em_detail_size').text(data.order.size);
                $('#em_freelancer_request_popup').find('#em_detail_final_product').text(en_order
                    .products);
                console.log(folderArray);
                console.log("change_count", data.change_count);
                if (data.change_count == 1) {
                    $('#em_change1').show();
                    $('#em_change2').hide();
                    $('#em_change3').hide();
                    $('#em_change4').hide();
                } else if (data.change_count == 2) {
                    $('#em_change1').show();
                    $('#em_change2').show();
                    $('#em_change3').hide();
                    $('#em_change4').hide();
                } else if (data.change_count == 3) {
                    $('#em_change1').show();
                    $('#em_change2').show();
                    $('#em_change3').show();
                    $('#em_change4').hide();
                }

                $('[name=embroidery_request_id]').val(data.order.id);

                $("#em_change1").click(() => {
                    selector = "#em_change1";
                    $('#embroidery_subfolder_structure3_1').hide();
                    $('#embroidery_subfolder_structure3_2').hide();
                    $('#embroidery_subfolder_structure3_3').hide();
                    $('#embroidery_subfolder_structure3_4').hide();
                    $('#embroidery_subfolder_structure4_1').hide();
                    $('#embroidery_subfolder_structure4_2').hide();
                    $('#embroidery_subfolder_structure4_3').hide();
                    $('#embroidery_subfolder_structure4_4').hide();

                    folderArray.forEach((item) => {
                        if (item == "Änderungsdateien Kunde1") {
                            $('#embroidery_subfolder_structure3_1').show();
                        } else if (item == "Stickprogramm Änderung1") {
                            $('#embroidery_subfolder_structure4_1').show();
                        }
                    });
                });
                $("#em_change2").click(() => {
                    selector = "#em_change2";
                    $('#embroidery_subfolder_structure3_1').hide();
                    $('#embroidery_subfolder_structure3_2').hide();
                    $('#embroidery_subfolder_structure3_3').hide();
                    $('#embroidery_subfolder_structure3_4').hide();
                    $('#embroidery_subfolder_structure4_1').hide();
                    $('#embroidery_subfolder_structure4_2').hide();
                    $('#embroidery_subfolder_structure4_3').hide();
                    $('#embroidery_subfolder_structure4_4').hide();

                    folderArray.forEach((item) => {
                        if (item == "Änderungsdateien Kunde2") {
                            $('#embroidery_subfolder_structure3_2').show();
                        } else if (item == "Stickprogramm Änderung2") {
                            $('#embroidery_subfolder_structure4_2').show();
                        }
                    });
                });
                $("#em_change3").click(() => {
                    selector = "#em_change3";
                    $('#embroidery_subfolder_structure3_1').hide();
                    $('#embroidery_subfolder_structure3_2').hide();
                    $('#embroidery_subfolder_structure3_3').hide();
                    $('#embroidery_subfolder_structure3_4').hide();
                    $('#embroidery_subfolder_structure4_1').hide();
                    $('#embroidery_subfolder_structure4_2').hide();
                    $('#embroidery_subfolder_structure4_3').hide();
                    $('#embroidery_subfolder_structure4_4').hide();

                    folderArray.forEach((item) => {
                        if (item == "Änderungsdateien Kunde3") {
                            $('#embroidery_subfolder_structure3_3').show();
                        } else if (item == "Stickprogramm Änderung3") {
                            $('#embroidery_subfolder_structure4_3').show();
                        }
                    });
                });
                $("#em_change4").click(() => {
                    selector = "#em_change4";
                    $('#embroidery_subfolder_structure3_1').hide();
                    $('#embroidery_subfolder_structure3_2').hide();
                    $('#embroidery_subfolder_structure3_3').hide();
                    $('#embroidery_subfolder_structure3_4').hide();
                    $('#embroidery_subfolder_structure4_1').hide();
                    $('#embroidery_subfolder_structure4_2').hide();
                    $('#embroidery_subfolder_structure4_3').hide();
                    $('#embroidery_subfolder_structure4_4').hide();

                    folderArray.forEach((item) => {
                        if (item == "Änderungsdateien Kunde4") {
                            $('#embroidery_subfolder_structure3_4').show();
                        } else if (item == "Stickprogramm Änderung4") {
                            $('#embroidery_subfolder_structure4_4').show();
                        }
                    });
                });


                $(selector).trigger('click');

                folderArray.forEach((item) => {
                    if (item == "Stickprogramm Änderung1") {
                        $('#em_green_job').hide();
                        $('#em_yellow_job').show();
                    }
                })

            },
            error: () => {
                console.error('err');
            }
        })
        $('#order_form_upload_list tr').remove();

        embroidery_detail_table = $('#embroidery_order_detail').DataTable({
            responsive: true,
            info: false,
            language: {
                emptyTable: "No data available in table",
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
        embroidery_detail_table.destroy();
        //customer parameter information
        $.ajax({
            url: '{{ __('routes.freelnacer-embroidery-parameter') }}',
            type: 'GET',
            data: {
                id: $('[name=embroidery_request_id]').val()
            },
            success: (data) => {
                if (data[0] != null) {
                    data_em = JSON.parse(data[0]);
                    $('#em_yarn_information').text(data_em.parameter1);
                    $('#em_need_embroidery_files').text(data_em.parameter2);
                    $('#em_cutting_options').text(data_em.parameter3);
                    $('#em_special_cutting_options').text(data_em.parameter4);
                    $('#em_needle_instructions').text(data_em.parameter5);
                    $('#em_standard_instructions').text(data_em.parameter6);
                    $('#em_special_standard_instructions').text(data_em.parameter7);
                }
            },
            error: () => {
                console.error('error');
            }
        })
    }


    function embroidery_multipleDownload() {
        window.location.href = '{{ url('multi-download') }}/' + $('[name=embroidery_request_id]').val() + '?type=' +
            folderType;
    }

    $('#embroidery_subfolder_structure3_1').click(function() {
        EmbroideryDetailRequest($('[name=embroidery_request_id]').val(), 'Änderungsdateien Kunde1');
    });
    $('#embroidery_subfolder_structure3_2').click(function() {
        EmbroideryDetailRequest($('[name=embroidery_request_id]').val(), 'Änderungsdateien Kunde2');
    });
    $('#embroidery_subfolder_structure3_3').click(function() {
        EmbroideryDetailRequest($('[name=embroidery_request_id]').val(), 'Änderungsdateien Kunde3');
    });
    $('#embroidery_subfolder_structure3_4').click(function() {
        EmbroideryDetailRequest($('[name=embroidery_request_id]').val(), 'Änderungsdateien Kunde4');
    });
    $('#embroidery_subfolder_structure4_1').click(function() {
        EmbroideryDetailRequest($('[name=embroidery_request_id]').val(), 'Stickprogramm Änderung1');
    });
    $('#embroidery_subfolder_structure4_2').click(function() {
        EmbroideryDetailRequest($('[name=embroidery_request_id]').val(), 'Stickprogramm Änderung2');
    });
    $('#embroidery_subfolder_structure4_3').click(function() {
        EmbroideryDetailRequest($('[name=embroidery_request_id]').val(), 'Stickprogramm Änderung3');
    });
    $('#embroidery_subfolder_structure4_4').click(function() {
        EmbroideryDetailRequest($('[name=embroidery_request_id]').val(), 'Stickprogramm Änderung4');
    });
    $(function() {
        $('[name=embroidery_time]').val(new Date());
    })
    $('#embroidery_uplaod_form').submit(function(e) {
        e.preventDefault();
    })
    $('.embroidery_upload_submit').click(function(e) {
        e.preventDefault();
        $('[name=free_detail_id]').val("");
        $('[name=vector_request_id]').val("");
        var freelancer_request_data = new FormData();
        freelancer_request_data.append('embroidery_request_id', $('[name=embroidery_request_id]').val());
        freelancer_request_data.append('embroidery_time', $('[name=embroidery_time]').val());
        $('#embroidery_fileupload').find('.fileupload-buttonbar .start').trigger('click');
    });

    function EmbroideryStartChange() {
        StartChangeConfirmAlert();
        $('#start_change_confirm').click(function() {
            $('#em_green_job').hide();
            $('#em_yellow_job').show();
            $('#start_change_confirm_popup').modal('hide');
        })

    }

    function EmbroideryEndChange() {
        $.ajax({
            url: '{{ __('routes.embroidery-freelancer-endchange') }}',
            type: 'GET',
            data: {
                end_change_id: $('[name=embroidery_request_id]').val()
            },
            success: () => {
                $('#em_freelancer_table_reload_btn').trigger('click');
                $('#em_freelancer_all_table_reload_button').trigger('click');
                $('#em_freelancer_blue_table_reload_button').trigger('click');
                $('#em_freelancer_red_table_reload_button').trigger('click');
                $('#em_yellow_job').hide();
                $('#em_upload_success_popup').modal('hide');
                $('#end_em_change_success_popup').modal('show');
            },
            error: () => {
                $('#end_change_confirm_popup').modal('hide');
                EndChangeError();
            }
        })
    }

    function StartChangeConfirmAlert() {
        console.log("sadf");
        $('#start_change_confirm_popup').modal('show');
    }

    function EndChangeError() {
        $('#end_change_error_popup').modal('show');
    }
    $(function() {
        $('#em_freelancer_change_file_input').on('change', function() {
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
