    <div class="modal fade" id="free_embroidery_payment_archive" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: rgb(244, 244, 244)">
                <button type="button" class="backbutton" onclick="hideModal()"><i class="fa-solid fa-left-long"
                        style="display: flex;"></i></button>

                <div class="pagetitle" style="margin-top:10px !important;">
                    <h1>Payment Achive</h1>
                    <p></p>
                </div>
                <div style="font-size: 13px; font-family:'Inter'; padding:20px 10vw">
                    <div class="responsive-table">
                        <button id="em_freelancer_payment_archive_table_reload_button" style="display: none"></button>
                        <table id="em_freelancer_payment_archive_table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="min-width: 70px !important; text-align:center;">
                                        {{ __('home.order_type') }}</th>
                                    <th style="min-width: 100px !important;">{{ __('home.delivery_time') }}</th>
                                    <th style="min-width: 150px !important;">{{ __('home.order') }}</th>
                                    <th style="min-width: 150px !important;">{{ __('home.date') }}</th>
                                    <th>{{ __('home.project') }}</th>
                                    <th style="min-width: 200px !important; text-align:center !important;">
                                        Counting Number</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
