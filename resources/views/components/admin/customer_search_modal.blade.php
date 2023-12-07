<div class="modal fade" id="customer_search_popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgb(244, 244, 244); padding-top:1vw !important;">
            <button type="button" class="backbutton" onclick="hideModal()"><i class="fa-solid fa-left-long"
                    style="display: flex;"></i></button>
            <div class="row">
                <div class="col-md-1 col-xl-2"></div>
                <div class="col-12 col-md-10 col-xl-8">
                    <div class="pagetitle">Kundensuche
                    </div>
                    <div>
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
                                <button type="button" class="modal_close_btn"
                                    id="customer_search_result">BESTÄTIGEN</button>
                                <button type="button" class="modal_close_btn" onclick="hideModal()">STORNIEREN</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 col-xl-2"></div>
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
        $('.tooltiptext').hide();
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
                        $('[name=selected_customer]').not(this).prop('checked', false);
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
                        "\u00A0\u00A0\u00A0\u00A0" + result.company);

                    $('#customer_serched_result_customer_number').text(result
                        .customer_number);
                    $('#customer_serched_result_company').text(result.company);
                    $('#customer_serched_result_name').text(result.name);
                    $('#customer_serched_result_first_name').text(result.first_name);
                    $('#customer_serched_result_street_number').text(result.street_number);
                    $('#customer_serched_result_postal_code').text(result.postal_code);
                    $('#customer_serched_result_location').text(result.location);

                    $(".SearchInputWrapper").hover(function() {
                        console.log('hovered');
                        $('.tooltiptext').show();
                    }, function() {
                        $('.tooltiptext').hide();
                    });
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
