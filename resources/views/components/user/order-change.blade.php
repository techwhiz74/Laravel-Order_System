<div class="modal fade" id="order_change_popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="backbutton" onclick="hideModal()"><i class="fa-solid fa-left-long"
                    style="display: flex;"></i></button>
            <div class="row modal_page_view">
                <div class="col-xl-1"></div>
                <div class="col-12 col-xl-10">
                    <div class="pagetitle">
                        {{ __('home.order_change') }}</div>
                    <button style="display: none" id="order_request_mail" type="button"></button>
                    <button style="display: none" id="order_request_text_mail" type="button"></button>
                    <div style="font-size: 13px">
                        <form action="" id="order_change_form">
                            <input type="hidden" name="order_id" value="" />
                            <input type="hidden" name="time" value="" />
                            <div class="row">
                                <div class="col-12 col-md-3 form_label">
                                    <label class="control-label">{{ __('home.change_request') }}
                                    </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="order_change_textarea" placeholder="{{ __('home.change_request') }}"
                                        style="height: 150px; border:1px solid #ddd;"></textarea>
                                </div>
                            </div>
                            <div class="row" style="margin-top:5px;">
                                <div class="col-12 col-md-3 form_label">
                                    <label class="control-label">{{ __('home.data_upload') }}
                                    </label>
                                </div>
                                <div class="col-12 col-md-9 ">
                                    <div class="order_change_upload_div">
                                        <div id="fileupload_em_ex" action="" method="POST"
                                            enctype="multipart/form-data">
                                            <!-- Redirect browsers with JavaScript disabled to the origin page -->
                                            <noscript><input type="hidden" name="redirect" value="" /></noscript>
                                            <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                            <div class="row fileupload-buttonbar">
                                                <div class="col-lg-7">
                                                    <!-- The fileinput-button span is used to style the file input field as button -->
                                                    <span class="fileinput-button">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                        <span
                                                            style="font-size: 13px;">{{ __('home.add_file') }}...</span>
                                                        <input type="file" name="files[]" multiple
                                                            id="order_change_file_input" />
                                                    </span>
                                                    <button type="submit" class="btn btn-primary start"
                                                        style="visibility: hidden;">
                                                        <i class="glyphicon glyphicon-upload"></i>
                                                        <span>Start Upload</span>
                                                    </button>

                                                    <span class="fileupload-process"></span>
                                                </div>
                                                <div class="order_form_file_upload">
                                                    {{ __('home.validation_file_upload') }}
                                                </div>
                                                <!-- The global progress state -->
                                                <div class="col-lg-5 fileupload-progress fade">
                                                    <!-- The global progress bar -->
                                                    <div class="progress progress-striped active" role="progressbar"
                                                        aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-bar-success"
                                                            style="width: 0%;">
                                                        </div>
                                                    </div>
                                                    <!-- The extended global progress state -->
                                                    {{-- <div class="progress-extended">&nbsp;</div> --}}
                                                </div>
                                            </div>
                                            <!-- The table listing the files available for upload/download -->
                                            <table role="presentation" class="table table-striped"
                                                id="order_form_upload_list">
                                                <tbody class="files"></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="display: flex; justify-content:flex-end; margin-top:5px;">
                                <div>
                                    <button type="submit"
                                        class="order_change_submit">{{ __('home.order_upload') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-1"></div>
            </div>
        </div>
    </div>
</div>
@include('components.user.order_change_success')
<script>
    $(function() {
        // order-change message and file upload form
        $('#order_change_form').submit(function(e) {
            e.preventDefault();
        });
        var $text;
        $('.order_change_submit').click(function(e) {
            e.preventDefault();
            if ($('#order_form_upload_list tr').length != 0) {
                var data = new FormData();
                data.append('order_id', $('[name=order_id]').val());
                data.append('order_change_textarea', $('[name=order_change_textarea]').val());
                data.append('time', $('[name=time]').val());
                $('#fileupload_em_ex').find('.fileupload-buttonbar .start').trigger('click');
            } else if ($('#order_form_upload_list tr').length == 0 && $('[name=order_change_textarea]')
                .val() != '') {
                var customer_order_change_data = new FormData();
                customer_order_change_data.append('order_id', $('[name=order_id]').val());
                customer_order_change_data.append('order_change_textarea', $(
                    '[name=order_change_textarea]').val());
                $.ajax({
                    url: '{{ __('routes.customer-order-change-text') }}',
                    type: 'post',
                    contentType: false,
                    processData: false,
                    data: customer_order_change_data,
                    success: (result) => {
                        $text = result;
                        $('#btn_table_refresh').trigger('click');
                        $('#customer_dahsboard_table_reload_button').trigger(
                            'click');
                        setTimeout(() => {
                            $('#order_change_success_popup').modal('show');
                            $('#order_request_text_mail').trigger('click');
                        }, 1000);
                    },
                    error: () => {
                        console.error("error");
                    }
                })
            }
        });
        $('#order_request_mail').click(function() {
            $.ajax({
                url: '{{ __('routes.customer-order-request-mail') }}',
                type: 'get',
                data: {
                    order_id: $('[name=order_id]').val()
                },
                success: () => {
                    console.log("success");
                },
                error: () => {
                    console.error("error");
                }
            })
        })
        $('#order_request_text_mail').click(function() {
            var order_request_text_mail_data = new FormData();
            order_request_text_mail_data.append('order_id', $(
                '[name=order_id]').val());
            order_request_text_mail_data.append('text', $text);
            $.ajax({
                url: '{{ __('routes.customer-order-request-text-mail') }}',
                type: 'post',
                data: order_request_text_mail_data,
                contentType: false,
                processData: false,
                success: () => {
                    console.log("success");
                },
                error: () => {
                    console.error("error");
                }
            })
        })
    })

    function openOrderChangeModal(id) {
        $('#order_change_popup').modal("show");
        $('[name=order_id]').val(id);
        $('#order_change_popup').find('[name=order_change_textarea]').val('');
        $('#order_change_popup').find('#order_form_upload_list tr').remove();
        $('[name=time]').val(new Date());
        $('#order_form_upload_list tr').length = 0;
    }
    $(function() {
        $('#order_change_file_input').on('change', function() {
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
