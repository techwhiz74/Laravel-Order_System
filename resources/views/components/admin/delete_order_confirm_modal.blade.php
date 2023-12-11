<div class="modal fade" id="delete_order_confirm_popup" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div>
                        Möchten Sie diese Bestellung löschen?
                    </div>
                </div>
                <div class="row" style="text-align:center;">
                    <div>
                        <button type="button" class="modal_close_btn" id="delete_order_confirm">BESTÄTIGEN</button>
                        <button type="button" class="modal_close_btn"
                            onclick="hideAlertModal()">{{ __('home.cancel') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
