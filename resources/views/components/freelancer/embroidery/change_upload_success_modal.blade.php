<div class="modal fade" id="em_upload_success_popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div>
                        {{ __('home.free_upload_change_success') }}
                    </div>
                </div>
                <div class="row" style="text-align:center;">
                    <div>
                        <button type="button" onclick="EmbroideryEndChange()"
                            class="modal_close_btn">{{ __('home.end_change') }}</button>
                        <button type="button" class="modal_close_btn"
                            onclick="hideAlertModal()">{{ __('home.cancel') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
