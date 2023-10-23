<div class="modal fade" id="admin_customer_profile_request_handle_popup" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgb(244, 244, 244)">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bearbeitung von Kundenprofilanfragen</h5>
                <button type="button" class="close" style="font-size: 22px" onclick="hideModal()">&times;</button>
            </div>
            <div class="modal-body" style="font-size: 13px; font-family:'Inter';">
                <input type="hidden" name="selected_customer_id" value="" />
                <div class="container differences-text" style="padding: 10px">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="customer_accept" class="accept_request_profile_button">Accept</button>
                <button type="button" id="customer_decline" class="cancel_request_profile_button">Decline</button>
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
    $('#customer_accept').click(function() {
        var id = $('[name=selected_customer_id]').val();
        $.ajax({
            url: '{{ __('routes.admin-accept-change') }}' + id,
            type: 'POST',
            success: (result) => {
                console.log('The customer\'s profile has been changed');
                $('#admin_customer_profile_request_handle_popup').modal("hide");
                $('#customer_list_table_reload_button').trigger('click');
                $('.request_profile_success_message').show();
            },
            error: (err) => {
                console.error(err);
            }
        })
    })
    $('#customer_decline').click(function() {
        var id = $('[name=selected_customer_id]').val();
        $.ajax({
            url: '{{ __('routes.admin-decline-change') }}' + id,
            type: 'post',
            succcess: () => {
                $('#admin_customer_profile_request_handle_popup').modal("hide");
                $('#customer_list_table_reload_button').trigger('click');
                $('.request_profile_refuse_message').show();
            },
            error: (err) => {
                console.error('error!');
            }
        })
    })
</script>
