<div class="modal fade" id="admin_customer_profile_request_handle_popup" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgb(244, 244, 244);">
            <button type="button" class="backbutton" onclick="hideModal()"><i class="fa-solid fa-left-long"
                    style="display: flex;"></i></button>
            <div class="row modal_page_view">
                <div class="col-md-1 col-xl-2"></div>
                <div class="col-12 col-md-10 col-xl-8">
                    <div class="modal-body" style="font-size: 13px; font-family:'Inter'; overflow-y:auto">
                        <h1 class="pagetitle">Bearbeitung von Kundenprofilanfragen
                        </h1>
                        <input type="hidden" name="selected_customer_id" value="" />
                        <div class="container differences-text" style="padding: 10px">
                        </div>
                    </div>
                </div>
                <div class="col-md-1 col-xl-2"></div>
            </div>
        </div>
    </div>
</div>

<script>
    function HandleProfileRequest(id, type) {
        $.ajax({
            url: '{{ __('routes.admin-get-differences') }}' + id,
            type: 'GET',
            success: (result) => {
                $('[name=selected_customer_id]').val(id);
                $('.differences-text').html(result);
                $('#admin_customer_profile_request_handle_popup').modal("show");
            },
            error: (err) => {
                console.error(err);
            }
        });
    }
</script>
