<section class="admin_all_section">

    <div class="pagetitle">
        <h1 style="margin-left: 0 !important">Alle Aufträge</h1>
        <p></p>
    </div>
    <div>
        <div style="margin-top: 40px;">
            <button id="admin_all_table_reload_button" style="display: none"></button>
            <div class="dropdown" style="display: flex; justify-content:end; margin-bottom:5px;">
                <button class="tableFilterBtton dropdown-toggle" href="#" data-bs-toggle="dropdown">
                    <i class="fas fa-file-import" style="margin-right:8px"></i>
                    <span>{{ __('home.import') }}</span>
                </button>
                <div class="dropdown-menu megamenu" role="menu" style="width:230px; padding:15px;">
                    <div class="form-group">
                        <input type="file" style="width: 100% !important" class="form-control" id="upload_customer"
                            multiple webkitdirectory />
                    </div>
                </div>
            </div>
            <div class="responsive-table">
                <table id="admin_all_table" class="table table-striped" style="width:100%; font-size:13px;">
                    <thead>
                        <tr>
                            <th style="min-width: 70px !important; text-align:center;">{{ __('home.order_type') }}</th>
                            <th style="min-width: 100px !important;">{{ __('home.delivery_time') }}</th>
                            <th style="min-width: 150px !important;">{{ __('home.order') }}</th>
                            <th style="min-width: 150px !important;">{{ __('home.date') }}</th>
                            <th>{{ __('home.project') }}</th>
                            <th style="min-width: 150px !important;">{{ __('home.status') }}</th>
                            <th style="min-width: 70px !important; text-align:center !important;">
                                {{ __('home.detail') }}</th>
                            <th style="min-width: 90px !important; text-align:center !important;">
                                {{ __('home.request') }}</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>

        </div>

    </div>

</section>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var admin_all_table;

    $(function() {
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
                    data: 'request',
                    name: 'request',
                    orderable: false,
                    searchable: false
                }
            ]
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
</script>
