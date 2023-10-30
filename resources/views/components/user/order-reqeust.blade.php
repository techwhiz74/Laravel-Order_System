<div class="modal fade" id="order_request_popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('home.order_change') }}</h5>
                <button type="button" class="close" style="font-size: 22px" onclick="hideModal()">&times;</button>
            </div>
            <div class="modal-body" style="font-size: 13px; font-family:'Inter'; height:600px; overflow:auto;">
                <div class="container" style="padding: 20px">
                    <div id="order_rquest_text"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function showOrderRequest(id) {
        $.ajax({
            url: '{{ __('routes.customer-order_request') }}' + id,
            type: 'GET',
            success: (order_request_result) => {
                $('#order_rquest_text').text(order_request_result.message);
                $('#order_request_popup').modal("show");
            },
            error: (err) => {
                console.error(err);
            }
        });
    }
</script>
