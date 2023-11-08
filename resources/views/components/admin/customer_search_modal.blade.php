<div class="modal fade" id="customer_search_popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-12">
                    <div class="SearchInputWrapper">
                        <input type="text" id="CustomerTableSearchInput"
                            placeholder="Eingang Kundennr, Name, Firma, ZIP">
                    </div>
                    <input name="seleted_customer_button" type="hidden"></button>
                    <div class="responsive-table">
                        <button style="display: none;" id="customer_search_table_reload_button"></button>
                        <table id="customer_search_table" class="table table-striped"
                            style="width:100%; font-size:11.5px;">
                            <thead>
                                <tr>
                                    <th>{{ __('home.customer_number') }}</th>
                                    <th>{{ __('home.company') }}</th>
                                    <th>{{ __('home.name') }}</th>
                                    <th>{{ __('home.first_name') }}</th>
                                    <th>{{ __('home.phone') }}</th>
                                    <th>{{ __('home.email') }}</th>
                                    <th>{{ __('home.street_number') }}</th>
                                    <th>{{ __('home.postal_code') }}</th>
                                    <th>{{ __('home.location') }}</th>
                                    <th>{{ __('home.country') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12" style="text-align:end;">
                    <div>
                        <button type="button" class="modal_close_btn" id="customer_search_result">Bestätigen</button>
                        <button type="button" class="modal_close_btn" onclick="hideModal()">Stornieren</button>
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

    $(function() {
        var $customer_search_result = "";

        function getCustomers(keyword) {
            $.ajax({
                url: '{{ __('routes.admin-customer-search-table') }}',
                type: 'GET',
                data: {
                    search_filter: keyword
                },
                success: (result) => {
                    var obj = JSON.parse(result);
                    console.log(result);
                    $('[name=searched_id]').val(obj.id);
                    $('[name=customer_number]').val(obj.customer_number);
                    $('[name=ordered_from]').val(obj.ordered_from);
                    $("#customer_search_table tbody").html(obj.html);
                    if ($('[name=selected_customer]:checked')) {
                        $('[name=seleted_customer_button]').val($(
                            '[name=selected_customer]:checked').val());

                    }
                    $customer_search_result = obj.customer_number + "\u00A0\u00A0\u00A0\u00A0" + obj
                        .company + "\u00A0\u00A0\u00A0\u00A0" + obj
                        .ordered_from + "\u00A0\u00A0\u00A0\u00A0" +
                        obj.first_name + "\u00A0\u00A0\u00A0\u00A0" + obj.street_number +
                        "\u00A0\u00A0\u00A0\u00A0" + obj.postal_code + "\u00A0\u00A0\u00A0\u00A0" +
                        obj.location + "\u00A0\u00A0\u00A0\u00A0" +
                        obj.email;
                },
                error: (err) => {
                    console.log(err);
                }
            })
        }
        $('#CustomerTableSearchInput').keyup(function() {
            if ($('#CustomerTableSearchInput').val() != '') {
                $("#customer_search_table").show();
                getCustomers($('#CustomerTableSearchInput').val());
            } else {
                $("#customer_search_table").show();
            }
        });
        $('#customer_search_result').click(function() {
            console.log($('[name=seleted_customer_button]').val());
            $('#adminTableSearchInput').text($customer_search_result);
            $('#customer_search_popup').modal('hide');
        })
    });
</script>
