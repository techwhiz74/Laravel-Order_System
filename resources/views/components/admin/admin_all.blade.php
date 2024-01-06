<section class="page_section">
    <div class="row">
        <div class="col-xl-1"></div>
        <div class="col-12 col-xl-10">
            <h1 class="pagetitle" style="padding-bottom: 1vw !important;">Alle Aufträge
            </h1>
            <div>
                <button id="admin_all_table_reload_button" style="display: none"></button>
                <div>
                    <div class="tableControl">
                        <div class="controlGroup1">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label>{{ __('home.search') }}</label>
                                    <input type="text" id="adminAllTableSearchInput"
                                        placeholder="{{ __('home.search_placeholder') }}">
                                </div>
                                <div class="col-12 col-md-6">
                                    <div style="display: flex">
                                        <div class="DatePickerWrapperStart">
                                            <label>{{ __('home.start_date') }}</label>
                                            <input type="text" class="datepicker"
                                                id="adminTableDatepickerInputStart">

                                        </div>
                                        <div class="DatePickerWrapperEnd">
                                            <label>{{ __('home.end_date') }}</label>
                                            <input type="text" class="datepicker" id="adminTableDatepickerInputEnd">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="refresh-button-wrapper" style="display: none;">
                                <button class="btn btn-primary" id="btn_table_refresh" title="Refresh"><i
                                        class="fa fa-sync"></i></button>
                            </div>
                        </div>
                        <div class="controlGroup2">
                            <div>
                                <button class="tableFilterBtton dropdown-toggle" href="#"
                                    data-bs-toggle="dropdown">
                                    <i class="fas fa-file-import" style="margin-right:8px"></i>
                                    <span>{{ __('home.import') }}</span>
                                </button>
                                <div class="dropdown-menu megamenu" role="menu" style="width:230px; padding:15px;">
                                    <div class="form-group">
                                        <input type="file" style="width: 100% !important" class="form-control"
                                            id="upload_customer" multiple webkitdirectory />
                                    </div>
                                </div>
                            </div>
                            <div class="tableColumn dropdown" style="margin-left: 24px;">
                                <button class="tableCloumnBtton dropdown-toggle" href="#"
                                    data-bs-toggle="dropdown">
                                    <img src="/asset/images/tableColumn.svg" class="columnImage" alt="table column">
                                    <span>{{ __('home.column') }}</span>
                                </button>
                                <div class="dropdown-menu megamenu" role="menu"
                                    style="width:200px; padding:15px; font-size:13px">
                                    <div style="margin-bottom:10px;">{{ __('home.COLUMN') }}</div>
                                    <label>
                                        <input type="checkbox" id="checkbox_admin_order_type"
                                            class="option-input checkbox" checked />
                                        {{ __('home.order_type') }}
                                    </label><br>
                                    <label>
                                        <input type="checkbox" id="checkbox_admin_delivery_time"
                                            class="option-input checkbox" checked />
                                        {{ __('home.delivery_time') }}
                                    </label><br>
                                    <label>
                                        <input type="checkbox" id="checkbox_admin_order" class="option-input checkbox"
                                            checked />
                                        {{ __('home.order') }}
                                    </label><br>
                                    <label>
                                        <input type="checkbox" id="checkbox_admin_date" class="option-input checkbox"
                                            checked />
                                        {{ __('home.date') }}
                                    </label><br>

                                    <label>
                                        <input type="checkbox" id="checkbox_admin_project" class="option-input checkbox"
                                            checked />
                                        {{ __('home.project') }}
                                    </label><br>
                                    <label>
                                        <input type="checkbox" id="checkbox_admin_status" class="option-input checkbox"
                                            checked />
                                        {{ __('home.status') }}
                                    </label><br>
                                    <label>
                                        <input type="checkbox" id="checkbox_admin_detail" class="option-input checkbox"
                                            checked />
                                        {{ __('home.detail') }}
                                    </label><br>
                                    <label>
                                        <input type="checkbox" id="checkbox_admin_change" class="option-input checkbox"
                                            checked />
                                        {{ __('home.change') }}
                                    </label>
                                    <label>
                                        <input type="checkbox" id="checkbox_admin_request" class="option-input checkbox"
                                            checked />
                                        Änderung
                                    </label>
                                    <label>
                                        <input type="checkbox" id="checkbox_admin_delete" class="option-input checkbox"
                                            checked />
                                        {{ __('home.delete') }}
                                    </label><br>

                                    <div class="CheckboxButtons">
                                        <button id="" class="CheckboxButton">STORNIEREN</button>
                                        <button id="checkbox_admin_apply"
                                            class="CheckboxButton">{{ __('home.apply') }}</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="responsive-table">
                    <table id="admin_all_table" class="table table-striped">
                        <thead>
                            <tr>
                                <th style="text-align:center;">
                                    {{ __('home.order_type') }}</th>
                                <th>{{ __('home.delivery_time') }}</th>
                                <th>{{ __('home.order') }}</th>
                                <th>{{ __('home.date') }}</th>
                                <th>{{ __('home.project') }}</th>
                                <th>{{ __('home.status') }}</th>
                                <th style="text-align:center;">{{ __('home.detail') }}
                                </th>
                                <th style="text-align:center;">{{ __('home.change') }}
                                </th>
                                <th style="text-align:center;">{{ __('home.request') }}
                                </th>
                                <th style="text-align:center !important;">
                                    {{ __('home.delete') }}</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>

            </div>
        </div>
        <div class="col-xl-1"></div>
    </div>

</section>
@include('components.admin.delete_order_confirm_modal')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#checkbox_admin_apply").click(function() {
        console.log("sadf");
        if ($("#checkbox_admin_order_type").is(":checked")) {
            $("#admin_all_table > thead > tr > th:eq(0)").show();
            $("#admin_all_table > tbody > tr").each(function() {
                $(this).find("td:eq(0)").show();
            });
        } else {
            $("#admin_all_table > thead > tr > th:eq(0)").hide();
            $("#admin_all_table > tbody > tr").each(function() {
                $(this).find("td:eq(0)").hide();
            });
        }
        if ($("#checkbox_admin_delivery_time").is(":checked")) {
            $("#admin_all_table > thead > tr > th:eq(1)").show();
            $("#admin_all_table > tbody > tr").each(function() {
                $(this).find("td:eq(1)").show();
            });
        } else {
            $("#admin_all_table > thead > tr > th:eq(1)").hide();
            $("#admin_all_table > tbody > tr").each(function() {
                $(this).find("td:eq(1)").hide();
            });
        }
        if ($("#checkbox_admin_order").is(":checked")) {
            $("#admin_all_table > thead > tr > th:eq(2)").show();
            $("#admin_all_table > tbody > tr").each(function() {
                $(this).find("td:eq(2)").show();
            });
        } else {
            $("#admin_all_table > thead > tr > th:eq(2)").hide();
            $("#admin_all_table > tbody > tr").each(function() {
                $(this).find("td:eq(2)").hide();
            });
        }
        if ($("#checkbox_admin_date").is(":checked")) {
            $("#admin_all_table > thead > tr > th:eq(3)").show();
            $("#admin_all_table > tbody > tr").each(function() {
                $(this).find("td:eq(3)").show();
            });
        } else {
            $("#admin_all_table > thead > tr > th:eq(3)").hide();
            $("#admin_all_table > tbody > tr").each(function() {
                $(this).find("td:eq(3)").hide();
            });
        }
        if ($("#checkbox_admin_project").is(":checked")) {
            $("#admin_all_table > thead > tr > th:eq(4)").show();
            $("#admin_all_table > tbody > tr").each(function() {
                $(this).find("td:eq(4)").show();
            });
        } else {
            $("#admin_all_table > thead > tr > th:eq(4)").hide();
            $("#admin_all_table > tbody > tr").each(function() {
                $(this).find("td:eq(4)").hide();
            });
        }
        if ($("#checkbox_admin_status").is(":checked")) {
            $("#admin_all_table > thead > tr > th:eq(5)").show();
            $("#admin_all_table > tbody > tr").each(function() {
                $(this).find("td:eq(5)").show();
            });
        } else {
            $("#admin_all_table > thead > tr > th:eq(5)").hide();
            $("#admin_all_table > tbody > tr").each(function() {
                $(this).find("td:eq(5)").hide();
            });
        }
        if ($("#checkbox_admin_detail").is(":checked")) {
            $("#admin_all_table > thead > tr > th:eq(6)").show();
            $("#admin_all_table > tbody > tr").each(function() {
                $(this).find("td:eq(6)").show();
            });
        } else {
            $("#admin_all_table > thead > tr > th:eq(6)").hide();
            $("#admin_all_table > tbody > tr").each(function() {
                $(this).find("td:eq(6)").hide();
            });
        }
        if ($("#checkbox_admin_change").is(":checked")) {
            $("#admin_all_table > thead > tr > th:eq(7)").show();
            $("#admin_all_table > tbody > tr").each(function() {
                $(this).find("td:eq(7)").show();
            });
        } else {
            $("#admin_all_table > thead > tr > th:eq(7)").hide();
            $("#admin_all_table > tbody > tr").each(function() {
                $(this).find("td:eq(7)").hide();
            });
        }
        if ($("#checkbox_admin_request").is(":checked")) {
            $("#admin_all_table > thead > tr > th:eq(8)").show();
            $("#admin_all_table > tbody > tr").each(function() {
                $(this).find("td:eq(8)").show();
            });
        } else {
            $("#admin_all_table > thead > tr > th:eq(8)").hide();
            $("#admin_all_table > tbody > tr").each(function() {
                $(this).find("td:eq(8)").hide();
            });
        }
        if ($("#checkbox_admin_delete").is(":checked")) {
            $("#admin_all_table > thead > tr > th:eq(9)").show();
            $("#admin_all_table > tbody > tr").each(function() {
                $(this).find("td:eq(9)").show();
            });
        } else {
            $("#admin_all_table > thead > tr > th:eq(9)").hide();
            $("#admin_all_table > tbody > tr").each(function() {
                $(this).find("td:eq(9)").hide();
            });
        }
    });
    var admin_all_table;


    $(function() {
        $(".datepicker").datepicker({
            autoclose: true,
            orientation: 'bottom',
            format: 'dd.mm.yyyy', // German date format
            language: 'de', // German language
        });
        admin_all_table = $('#admin_all_table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searching: false,
            language: {
                paginate: {
                    next: '<i class="fa-solid fa-chevron-right"></i>', // or '→'
                    previous: '<i class="fa-solid fa-chevron-left"></i>' // or '←'
                }
            },
            ajax: {
                url: "{{ __('routes.admin-all-table') }}",
                type: "get",
                data: function(d) {
                    d.order_filter = $('#adminAllTableSearchInput').val();
                    d.start_date_filter = $('#adminTableDatepickerInputStart').val();
                    d.end_date_filter = $('#adminTableDatepickerInputEnd').val();
                },
            },

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
                {
                    data: 'delete',
                    name: 'delete',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        $('#adminAllTableSearchInput').keyup(function() {
            admin_all_table.ajax.reload();
        });

        $('#adminTableDatepickerInputStart').change(function() {
            admin_all_table.ajax.reload();
        });

        $('#adminTableDatepickerInputEnd').change(function() {
            admin_all_table.ajax.reload();
        });
        $('#admin_all_table_reload_button').click(function() {
            admin_all_table.ajax.reload();
        })

    });
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
                admin_all_table.ajax.reload();
                admin_green_table.ajax.reload();
                admin_yellow_table.ajax.reload();
                admin_red_table.ajax.reload();
                admin_blue_table.ajax.reload();
            },
            error: () => {
                console.error("error!");
            }
        });
    });

    function deleteOrder(id) {
        $('#delete_order_confirm_popup').modal('show');
        $('#delete_order_confirm').click(function() {
            $.ajax({
                url: '{{ __('routes.admin-delete-order') }}',
                type: 'POST',
                data: {
                    delete_id: id
                },
                success: () => {
                    $('#admin_all_table_reload_button').trigger('click');
                    $('#admin_green_table_reload_button').trigger('click');
                    $('#admin_yellow_table_reload_button').trigger('click');
                    $('#admin_red_table_reload_button').trigger('click');
                    $('#admin_blue_table_reload_button').trigger('click');
                    $('#delete_order_confirm_popup').modal('hide');
                },
                error: () => {
                    console.error("error");
                }
            })
        })

    }
</script>
