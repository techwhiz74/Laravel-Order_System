<div class="modal fade" id="free_embroidery_payment_archive" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgb(244, 244, 244)">
            <button type="button" class="backbutton" onclick="hideModal()"><i class="fa-solid fa-left-long"
                    style="display: flex;"></i></button>
            <div class="row modal_page_view">
                <div class="col-xl-1"></div>
                <div class="col-12 col-xl-10">
                    <h1 class="pagetitle">
                        Payment Achive
                    </h1>
                    <div style="font-size: 13px; font-family:'Inter';">
                        <div class="responsive-table">
                            <button id="em_freelancer_payment_archive_table_reload_button"
                                style="display: none"></button>
                            <table id="em_freelancer_payment_archive_table" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;">
                                            {{ __('home.order_type') }}</th>
                                        <th>{{ __('home.delivery_time') }}</th>
                                        <th>{{ __('home.order') }}</th>
                                        <th>{{ __('home.date') }}</th>
                                        <th>{{ __('home.project') }}</th>
                                        <th style="text-align:center !important;">
                                            Counting Number</th>
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
