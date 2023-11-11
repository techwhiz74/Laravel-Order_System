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
        var selectedId = '';

        function getCustomers(keyword) {
            $.ajax({
                url: '{{ __('routes.admin-customer-search-table') }}',
                type: 'GET',
                data: {
                    search_filter: keyword
                },
                success: (result) => {
                    var obj = JSON.parse(result);
                    console.log(obj);

                    $("#customer_search_table tbody").html(obj.html);

                    $('[name=selected_customer]').on('change', function() {
                        selectedId = $(this).val();

                    });

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

            console.log("selectedId", selectedId);
            $.ajax({
                url: '{{ __('routes.admin-customer-searched-result') }}',
                type: 'GET',
                data: {
                    id: selectedId
                },
                success: (result) => {
                    console.log(result);
                    $('#adminTableSearchInput').text(result.customer_number +
                        "\u00A0\u00A0\u00A0\u00A0" + result
                        .company + "\u00A0\u00A0\u00A0\u00A0" + result
                        .ordered_from + "\u00A0\u00A0\u00A0\u00A0" +
                        result.first_name + "\u00A0\u00A0\u00A0\u00A0" + result
                        .street_number +
                        "\u00A0\u00A0\u00A0\u00A0" + result.postal_code +
                        "\u00A0\u00A0\u00A0\u00A0" +
                        result.location + "\u00A0\u00A0\u00A0\u00A0" +
                        result.email);
                    $('[name=searched_id]').val(result.id);
                    $('[name=customer_number]').val(result.customer_number);
                    $('[name=ordered_from]').val(result.name);
                    $('#customer_search_popup').modal('hide');
                },
                error: () => {
                    console.error("error");
                }
            })
        })
    });
</script>
