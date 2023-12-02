<script>
    $(function() {
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
    })
</script>
