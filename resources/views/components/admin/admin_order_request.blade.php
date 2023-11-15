<div class="modal fade" id="admin_request_popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('home.order_change') }}</h5>
                <button type="button" class="close" style="font-size: 22px" onclick="hideModal()">&times;</button>
            </div>
            <div class="modal-body" style="font-size: 13px; font-family:'Inter'; height:570px;">
                <div class="container" style="padding: 20px">
                    <form action="" id="admin_request_form">
                        <input type="hidden" name="admin_request_id" value="" />
                        <input type="hidden" name="admin_request_time" value="" />
                        <div style="display: flex">
                            <div class="col-2">Änderungswünsche</div>
                            <div class="col-10">
                                <textarea name="admin_order_request_text" placeholder="Änderungswünsche" style="height: 150px"></textarea>
                            </div>
                        </div>
                        <div style="display: flex; height: 300px; margin-top:5px;">
                            <div class="col-2">{{ __('home.data_upload') }}</div>
                            <div class="col-10"
                                style="border: 1px solid #ddd; heigh:200px; padding:20px; overflow-y:auto">
                                <div id="admin_request_fileupload" action="" method="POST"
                                    enctype="multipart/form-data">
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
                                                    id="admin_request_file_input" />
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
                            </div>
                        </div>
                        <div style="display: flex; justify-content:flex-end; margin-top:5px;">
                            <div>
                                <button type="submit" class="admin_request_submit">Hochladen</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('components.admin.order_request_success')

<script>
    $(function() {
        $('[name=admin_request_time]').val(new Date());

        // order-change message and file upload form
        $('#admin_request_form').submit(function(e) {
            e.preventDefault();
        });
        $('.admin_request_submit').click(function(e) {
            e.preventDefault();
            if ($('#order_form_upload_list tr').length != 0) {
                $('[name=admin_change_id]').val("");
                $('[name=admin_detail_id]').val("");
                var data = new FormData();
                data.append('admin_request_id', $('[name=admin_request_id]').val());
                data.append('admin_order_request_text', $('[name=admin_order_request_text]').val());
                $('#admin_request_fileupload').find('.fileupload-buttonbar .start').trigger('click');
            } else if ($('#order_form_upload_list tr').length == 0 && $(
                    '[name=admin_order_request_text]').val() != '') {
                var admin_request_data = new FormData();
                admin_request_data.append('admin_request_id', $('[name=admin_request_id]')
                    .val());
                admin_request_data.append('admin_order_request_text', $(
                    '[name=admin_order_request_text]').val());
                admin_request_data.append('admin_request_time', $('[name=admin_request_time]').val());

                $.ajax({
                    url: '{{ __('routes.admin-request-text') }}',
                    type: 'post',
                    contentType: false,
                    processData: false,
                    data: admin_request_data,
                    success: () => {
                        $('#admin_all_table_reload_button').trigger('click');
                        $('#admin_red_table_reload_button').trigger('click');
                        $('#admin_blue_table_reload_button').trigger('click');
                        setTimeout(() => {
                            $('#admin_request_success_popup').modal('show');
                        }, 1000);
                    },
                    error: () => {
                        console.error("error");
                    }
                })
            }
        });
        $('#admin_request_anotherOrderButton').click(function() {
            $('#order_form_upload_list tr').remove();
            $('[name=admin_order_request_text]').text("");
            $('#admin_request_popup').modal('hide');
            $('#admin_request_success_popup').modal('hide');
        });
    })

    function AdminOpenOrderChangeModal(id) {
        $('#admin_request_popup').modal("show");
        $('[name=admin_request_id]').val(id);
        $('#admin_request_popup').find('[name=admin_order_request_text]').val('');
        $('#admin_request_popup').find('#order_form_upload_list tr').remove();
    }
    $(function() {
        $('#admin_request_file_input').on('change', function() {
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
