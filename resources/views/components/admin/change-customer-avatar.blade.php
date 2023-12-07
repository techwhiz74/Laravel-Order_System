<div class="modal fade" id="change_customer_avatar_popup" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form id="change_customer_avatar_form" action="" style="height: 100%">
                    <div style="display: flex; flex-direction:column; justify-content:space-between; height:100%;">
                        <div class="modal_sm_title">{{ __('home.change_avatar') }}</div>
                        <div action="" method="POST" enctype="multipart/form-data">
                            <input type="file" class="form-control" name="change_customer_avatar_input"
                                style="font-size: 13px;" required>
                        </div>
                        <div class="row" style="text-align:center;">
                            <div>
                                <button type="button" class="modal_close_btn"
                                    id="change_customer_avatar_confirm">{{ __('home.change_avatar') }}</button>
                                <button type="button" class="modal_close_btn"
                                    onclick="hideAlertModal()">ABSCHLIESSEN</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
