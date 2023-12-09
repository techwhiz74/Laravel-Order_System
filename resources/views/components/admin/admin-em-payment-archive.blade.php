    <div class="modal fade" id="admin_embroidery_payment_archive" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: rgb(244, 244, 244);">
                <button type="button" class="backbutton" onclick="hideModal()"><i class="fa-solid fa-left-long"
                        style="display: flex;"></i></button>
                <div class="row" style="margin-top: -30px;">
                    <div class="col-xl-1"></div>
                    <div class="col-12 col-xl-10">
                        <div class="pagetitle">Zahlungsarchiv
                        </div>
                        <div style="font-size: 13px; font-family:'Inter';">
                            <div class="responsive-table">
                                <button id="admin_em_payment_archive_table_reload_button"
                                    style="display: none"></button>
                                <table id="admin_em_payment_archive_table" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;">
                                                {{ __('home.order_type') }}</th>
                                            <th>{{ __('home.delivery_time') }}</th>
                                            <th>{{ __('home.order') }}</th>
                                            <th>{{ __('home.date') }}</th>
                                            <th>{{ __('home.project') }}</th>
                                            <th style="text-align:center !important;">
                                                Zahlungsarchiv</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-1"></div>
                </div>
            </div>
        </div>
    </div>
