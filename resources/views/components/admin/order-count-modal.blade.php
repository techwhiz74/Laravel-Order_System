<div class="modal fade" id="admin_order_count" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div>
                        {{ __('home.free_order_count_title') }}
                    </div>
                </div>
                <div class="row">
                    <div>
                        <select name="admin_order_count_select" class="payment_selectbox_control">
                            <option value="1" selected></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div>
                <div class="row" style="text-align:center;">
                    <div>
                        <button type="button" class="modal_close_btn"
                            id="admin_order_count_confirm">{{ __('home.confirm') }}</button>
                        <button type="button" class="modal_close_btn"
                            onclick="hideAlertModal()">{{ __('home.cancel') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
