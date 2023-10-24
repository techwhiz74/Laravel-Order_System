<div class="modal fade" id="order_change_popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('home.order_change') }}</h5>
                <button type="button" class="close" style="font-size: 22px" onclick="hideModal()">&times;</button>
            </div>
            <div class="modal-body" style="font-size: 13px; font-family:'Inter'; height:600px; overflow:auto;">
                <div class="container" style="padding: 20px">
                    <form action="" id="order_change_form">
                        <input type="hidden" name="order_id" value="" />
                        <div style="display: flex">
                            <div class="col-2">Änderungswünsche</div>
                            <div class="col-10">
                                <textarea name="order_change_textarea" placeholder="Änderungswünsche" style="height: 150px"></textarea>
                            </div>
                        </div><br>
                        <div style="display: flex">
                            <div class="col-2">{{ __('home.data_upload') }}</div>
                            <div class="col-10">
                                <div id="fileupload_em_ex" action="" method="POST" enctype="multipart/form-data">
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
                        </div><br>
                        <div style="display: flex; justify-content:flex-end">
                            <div>
                                <button type="submit" class="order_change_submit">Hochladen</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function openOrderChangeModal(id) {
        $('#order_change_popup').modal("show");
        $('[name=order_id]').val(id);
        $('#order_change_popup').find('[name=order_change_textarea]').val('');
        $('#order_change_popup').find('#order_form_upload_list tr').hide();
    }
</script>
