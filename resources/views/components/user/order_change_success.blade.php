<div class="modal fade" id="order_change_success_popup" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="order_form_file_uplaod_command">
                        <strong>{{ __('home.order_form_file_uplaod_command') }}</strong>
                    </div>
                </div>
                <div class="row">
                    <div style="text-align:center;">
                        <button id="order_change_anotherOrderButton"
                            class="modal_close_btn">{{ __('home.order_change_another') }}</button>
                        <button type="button" class="modal_close_btn"
                            onclick="hideAlertModal()">{{ __('home.cancel') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
