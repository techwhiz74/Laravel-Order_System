@php
    $serial = 1;
@endphp
<section class="view_order_section">

    <div class="pagetitle">
        <h1 style="margin-left: 0 !important">{{ __('home.overview_of_orders') }}</h1>
        <p></p>
    </div>
    <div>
        <div class="tableControl">
            <div class="controlGroup1">
                <div class="SearchInputWrapper">
                    <label>{{ __('home.search') }}</label>
                    <input type="text" id="tableSearchInput" placeholder="{{ __('home.search_placeholder') }}">
                </div>
                <div class="DatePickerWrapperStart">
                    <label>{{ __('home.start_date') }}</label>
                    <input type="text" class="datepicker" id="tableDatepickerInputStart">

                </div>
                <div class="DatePickerWrapperEnd">
                    <label>{{ __('home.end_date') }}</label>
                    <!-- <input class="datepicker" data-date-format="mm/dd/yyyy"> -->
                    <input type="text" class="datepicker" id="tableDatepickerInputEnd">
                </div>
                <div class="refresh-button-wrapper" style="display: none;">
                    <button class="btn btn-primary" id="btn_table_refresh" title="Refresh"><i
                            class="fa fa-sync"></i></button>
                </div>
            </div>
            <div class="controlGroup2">
                {{-- <div class="dropdown">
                    <button class="tableFilterBtton dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <i class="fas fa-file-import" style="margin-right:8px"></i>
                        <span>{{ __('home.import') }}</span>
                    </button>
                    <div class="dropdown-menu megamenu" role="menu" style="width:230px; padding:15px;">
                        <div class="form-group">
                            <input type="file" style="width: 100% !important" class="form-control"
                                id="upload_customer" multiple webkitdirectory />
                        </div>
                    </div>
                </div> --}}
                <div class="tableColumn dropdown">
                    <button class="tableCloumnBtton dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <img src="/asset/images/tableColumn.svg" class="columnImage" alt="">
                        <span>{{ __('home.column') }}</span>
                    </button>
                    <div class="dropdown-menu megamenu" role="menu"
                        style="width:190px; padding:15px; font-size:13px">
                        <div style="margin-bottom:10px;">{{ __('home.COLUMN') }}</div>
                        <label>
                            <input type="checkbox" id="checkbox_order_type" class="option-input checkbox" checked />
                            {{ __('home.order_type') }}
                        </label><br>
                        <label>
                            <input type="checkbox" id="checkbox_delivery_time" class="option-input checkbox" checked />
                            {{ __('home.delivery_time') }}
                        </label><br>
                        <label>
                            <input type="checkbox" id="checkbox_order" class="option-input checkbox" checked />
                            {{ __('home.order') }}
                        </label><br>
                        <label>
                            <input type="checkbox" id="checkbox_date" class="option-input checkbox" checked />
                            {{ __('home.date') }}
                        </label><br>
                        <label>
                            <input type="checkbox" id="checkbox_ordered_from" class="option-input checkbox" checked />
                            {{ __('home.order_from') }}
                        </label><br>
                        <label>
                            <input type="checkbox" id="checkbox_project" class="option-input checkbox" checked />
                            {{ __('home.project') }}
                        </label><br>
                        <label>
                            <input type="checkbox" id="checkbox_status" class="option-input checkbox" checked />
                            {{ __('home.status') }}
                        </label><br>
                        <label>
                            <input type="checkbox" id="checkbox_detail" class="option-input checkbox" checked />
                            {{ __('home.detail') }}
                        </label><br>
                        <label>
                            <input type="checkbox" id="checkbox_change" class="option-input checkbox" checked />
                            {{ __('home.change') }}
                        </label>

                        <div class="CheckboxButtons">
                            <button id="" class="CheckboxButton">{{ __('home.cancel') }}</button>
                            <button id="checkbox_apply" class="CheckboxButton">{{ __('home.apply') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>

            <div class="responsive-table">
                <table id="view-order" class="table table-striped" style="width:100%; font-size:13px;">
                    <thead>
                        <tr>
                            <th style="max-width: 80px !important; text-align:center;">{{ __('home.order_type') }}
                            </th>
                            <th>{{ __('home.delivery_time') }}</th>
                            <th>{{ __('home.order') }}</th>
                            <th>{{ __('home.date') }}</th>
                            <th>{{ __('home.order_from') }}</th>
                            <th style="min-width: 33% !important">{{ __('home.project') }}</th>
                            <th>{{ __('home.status') }}</th>
                            <th style="max-width: 70px !important; text-align:center;">{{ __('home.detail') }}</th>
                            <th style="max-width: 80px !important; text-align:center;">{{ __('home.change') }}</th>
                            <th style="max-width: 90px !important; text-align:center;">{{ __('home.request') }}</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>

        </div>

    </div>

</section>
@include('components.user.order-detail')
@include('components.user.order-change')
@include('components.user.order-reqeust')


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $("#checkbox_apply").click(function() {
        if ($("#checkbox_order_type").is(":checked")) {
            $("#view-order > thead > tr > th:eq(0)").show();
            $("#view-order > tbody > tr").each(function() {
                $(this).find("td:eq(0)").show();
            });
        } else {
            $("#view-order > thead > tr > th:eq(0)").hide();
            $("#view-order > tbody > tr").each(function() {
                $(this).find("td:eq(0)").hide();
            });
        }
        if ($("#checkbox_delivery_time").is(":checked")) {
            $("#view-order > thead > tr > th:eq(1)").show();
            $("#view-order > tbody > tr").each(function() {
                $(this).find("td:eq(1)").show();
            });
        } else {
            $("#view-order > thead > tr > th:eq(1)").hide();
            $("#view-order > tbody > tr").each(function() {
                $(this).find("td:eq(1)").hide();
            });
        }
        if ($("#checkbox_order").is(":checked")) {
            $("#view-order > thead > tr > th:eq(2)").show();
            $("#view-order > tbody > tr").each(function() {
                $(this).find("td:eq(2)").show();
            });
        } else {
            $("#view-order > thead > tr > th:eq(2)").hide();
            $("#view-order > tbody > tr").each(function() {
                $(this).find("td:eq(2)").hide();
            });
        }
        if ($("#checkbox_date").is(":checked")) {
            $("#view-order > thead > tr > th:eq(3)").show();
            $("#view-order > tbody > tr").each(function() {
                $(this).find("td:eq(3)").show();
            });
        } else {
            $("#view-order > thead > tr > th:eq(3)").hide();
            $("#view-order > tbody > tr").each(function() {
                $(this).find("td:eq(3)").hide();
            });
        }
        if ($("#checkbox_ordered_from").is(":checked")) {
            $("#view-order > thead > tr > th:eq(4)").show();
            $("#view-order > tbody > tr").each(function() {
                $(this).find("td:eq(4)").show();
            });
        } else {
            $("#view-order > thead > tr > th:eq(4)").hide();
            $("#view-order > tbody > tr").each(function() {
                $(this).find("td:eq(4)").hide();
            });
        }
        if ($("#checkbox_project").is(":checked")) {
            $("#view-order > thead > tr > th:eq(5)").show();
            $("#view-order > tbody > tr").each(function() {
                $(this).find("td:eq(5)").show();
            });
        } else {
            $("#view-order > thead > tr > th:eq(5)").hide();
            $("#view-order > tbody > tr").each(function() {
                $(this).find("td:eq(5)").hide();
            });
        }
        if ($("#checkbox_status").is(":checked")) {
            $("#view-order > thead > tr > th:eq(6)").show();
            $("#view-order > tbody > tr").each(function() {
                $(this).find("td:eq(6)").show();
            });
        } else {
            $("#view-order > thead > tr > th:eq(6)").hide();
            $("#view-order > tbody > tr").each(function() {
                $(this).find("td:eq(6)").hide();
            });
        }
        if ($("#checkbox_detail").is(":checked")) {
            $("#view-order > thead > tr > th:eq(7)").show();
            $("#view-order > tbody > tr").each(function() {
                $(this).find("td:eq(7)").show();
            });
        } else {
            $("#view-order > thead > tr > th:eq(7)").hide();
            $("#view-order > tbody > tr").each(function() {
                $(this).find("td:eq(7)").hide();
            });
        }
        if ($("#checkbox_change").is(":checked")) {
            $("#view-order > thead > tr > th:eq(8)").show();
            $("#view-order > tbody > tr").each(function() {
                $(this).find("td:eq(8)").show();
            });
        } else {
            $("#view-order > thead > tr > th:eq(8)").hide();
            $("#view-order > tbody > tr").each(function() {
                $(this).find("td:eq(8)").hide();
            });
        }
    });


    var viewOrderTable;
    $(function() {
        $(".datepicker").datepicker({
            autoclose: true,
            orientation: 'bottom',
            format: 'dd.mm.yyyy', // German date format
            language: 'de', // German language
        });
        viewOrderTable = $('#view-order').DataTable({
            responsive: true,
            language: {
                paginate: {
                    next: '<i class="fa-solid fa-chevron-right"></i>', // or '→'
                    previous: '<i class="fa-solid fa-chevron-left"></i>' // or '←'
                }
            },
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ __('routes.customer-vieworders') }}",
                data: function(d) {
                    d.status_filter = $('#status-filter').val();
                    d.category_filter = $('#category-filter').val();
                    d.order_filter = $('#tableSearchInput').val();
                    d.start_date_filter = $('#tableDatepickerInputStart').val();
                    d.end_date_filter = $('#tableDatepickerInputEnd').val();
                }
            },
            order: [
                [2, 'desc']
            ],

            columns: [{
                    data: 'type',
                    name: 'type',
                    orderable: false,
                    searchable: false
                },
                {

                    data: 'deliver_time',
                    name: 'deliver_time'
                },
                {
                    data: 'order',
                    name: 'order'
                },
                {
                    data: 'date',
                    name: 'date'
                },
                {
                    data: 'ordered_from',
                    name: 'ordered_from'
                },
                {
                    data: 'project_name',
                    name: 'project_name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'detail',
                    name: 'detail',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'request',
                    name: 'request',
                    orderable: false,
                    searchable: false
                },
            ],

        });


        $('#status-filter, #category-filter').change(function() {
            viewOrderTable.ajax.reload();
        });

        $('#tableSearchInput').keyup(function() {
            viewOrderTable.ajax.reload();
        });

        $('#tableDatepickerInputStart').change(function() {
            viewOrderTable.ajax.reload();
        });

        $('#tableDatepickerInputEnd').change(function() {
            viewOrderTable.ajax.reload();
        });

        $('#btn_table_refresh').click(function() {
            viewOrderTable.ajax.reload();
        });
    });

    $('#order_view_delete_ok').click(function() {
        var order_view_checkbox_data = new FormData();
        var $data = [];
        $("#view-order > tbody > tr").each(function() {
            if ($(this).find("td:eq(9)").find(":checked").val() != null) {
                $data.push($(this).find("td:eq(9)").find(":checked").val());
            }
        });
        console.log($data);
        order_view_checkbox_data.append('delete_id', $data);
        $.ajax({
            url: '{{ __('routes.customer-order_delete') }}',
            type: 'post',
            contentType: false,
            processData: false,
            data: order_view_checkbox_data,
            success: () => {
                console.log("success!");
                viewOrderTable.ajax.reload();
                $('#customer_dahsboard_table_reload_button').trigger('click');
            },
            error: () => {
                console.error("error!");
            }
        })
    })



    $("#upload_customer").change(function(e) {
        var files = e.target.files;
        var data = new FormData();
        var paths = "";


        for (var i in files) {
            if (i < files.length) {
                paths += files[i].webkitRelativePath + "###";
                data.append(i, files[i]);
            }
        }

        data.append('paths', paths);

        $.ajax({
            url: '{{ route('import-data') }}',
            type: 'POST',
            contentType: false,
            processData: false,
            data: data,
            success: () => {
                console.log("success!");
                viewOrderTable.ajax.reload();
                $('#customer_dahsboard_table_reload_button').trigger('click');

            },
            error: () => {
                console.error("error!");
            }
        });
    });
</script>
