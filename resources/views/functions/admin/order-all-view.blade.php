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
