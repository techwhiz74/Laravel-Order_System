<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var selector = '#ve_change1';
    var folderType = 'Änderungsdateien Kunde1';

    function VectorDetailRequest(id, type) {
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
    $(function() {
        $('[name=vector_time]').val(new Date());
    })

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
