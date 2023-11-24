<div class="modal fade" id="free_upload_success_popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div>
                        {{ __('home.free_upload_job_success') }}
                    </div>
                </div>
                <div class="row" style="text-align:center;">
                    <div>
                        <button type="button" onclick="EndJob()"
                            class="modal_close_btn">{{ __('home.complete_job') }}</button>
                        <button type="button" class="modal_close_btn"
                            onclick="hideAlertModal()">{{ __('home.cancel') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
