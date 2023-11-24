<div class="modal fade" id="start_change_confirm_popup" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div>
                        {{ __('home.start_change_confirm') }}
                    </div>
                </div>
                <div class="row" style="text-align:center;">
                    <div>
                        <button type="button" class="modal_close_btn"
                            id="start_change_confirm">{{ __('home.confirm') }}</button>
                        <button type="button" class="modal_close_btn"
                            onclick="hideAlertModal()">{{ __('home.cancel') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
