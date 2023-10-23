<div class="modal fade" id="order_change_popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('home.order_detail') }}</h5>
                <button type="button" class="close" style="font-size: 22px" onclick="hideModal()">&times;</button>
            </div>
            <div class="modal-body" style="font-size: 13px; font-family:'Inter'; height:300px; overflow:auto;">
                <div class="row">
                    <div class="container">

                        <div class="responsive-table">
                            <table id="order_change" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>{{ __('home.customer_number') }}</th>
                                        <th>{{ __('home.order_number') }}</th>
                                        <th>{{ __('home.index') }}</th>
                                        <th>{{ __('home.extension') }}</th>
                                        <th>{{ __('home.edit') }}</th>

                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function handleEditClick(id) {
        $("#index_span" + id).hide();
        $("#index_input" + id).show();
        $("#button_edit" + id).hide();
        $("#button_save" + id).show();
    }

    function handleSaveClick(id) {
        $.ajax({
            url: "{{ __('routes.customer-order-file-index-change') }}",
            type: 'POST',
            data: {
                id: id,
                index: $("#index_input" + id).val()
            },
            success: (result) => {
                console.log(result);
                if (result) {
                    console.log(result);
                    $("#index_span" + id).text(result.index);
                    $("#index_span" + id).show();
                    $("#index_input" + id).hide();
                    $("#button_edit" + id).show();
                    $("#button_save" + id).hide();

                }
            },
            error: (err) => {
                console.error(err);
            }
        })
    }

    function openOrderChangeModal(id) {
        var detail_table;
        detail_table = $('#order_change').DataTable({
            responsive: true,
            language: {

            },
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ __('routes.customer-order_change') }}",
                data: function(d) {
                    d.id = id;
                }
            },

            columns: [{
                    data: 'customer_number',
                    name: 'customer_number'
                },

                {
                    data: 'order_number',
                    name: 'order_number'
                },
                {
                    data: 'index',
                    name: 'index'
                },
                {
                    data: 'extension',
                    name: 'extension'
                },

                {
                    data: 'edit',
                    name: 'edit',
                    orderable: false,
                    searchable: false
                },

            ]
        });

        $('#order_change_popup').modal("toggle");
        detail_table.destroy();
    }
</script>
