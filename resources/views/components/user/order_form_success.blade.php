<div class="modal fade" id="order_form_success_popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="display: flex; justify-content:flex-end">
                <button type="button" class="close" style="font-size: 22px" onclick="hideModal()">&times;</button>
            </div>
            <div class="modal-body" style="padding: 50px !important;">
                <div class="row">
                    <div class="order_form_file_uplaod_command">
                        <strong>{{ __('home.order_form_file_uplaod_command') }}</strong>
                    </div>
                </div>
                <div class="row">
                    <div>
                        <button id="order_form_anotherOrderButton">{{ __('home.order_form_AnotherOrder') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
