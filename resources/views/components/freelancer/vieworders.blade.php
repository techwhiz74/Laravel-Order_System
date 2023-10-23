@php
    $serial = 1;
@endphp
<style>
    .card {
        background: #e9e9e9;
        border: none;
    }

    .avatar-box-left {
        margin: 0px;
    }

    .avatar-upload {
        position: relative;
        max-width: 205px;
        margin: 10px auto;
    }

    .avatar-upload .avatar-edit {
        position: absolute;
        right: 12px;
        z-index: 1;
        top: 10px;
    }

    .avatar-box .avatar-preview {
        border-radius: 10%;
    }

    .avatar-upload .avatar-preview {
        width: 192px;
        height: 192px;
        position: relative;
        border-radius: 100%;
        border: 6px solid #F8F8F8;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
    }

    .avatar-box .avatar-preview>div {
        border-radius: 10%;
        width: 100%;
    }

    .avatar-upload .avatar-preview>div {
        width: 100%;
        height: 100%;
        border-radius: 100%;
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
    }

    .avatar-box-left {
        margin: 0px;
    }

    .avatar-upload {
        position: relative;
        max-width: 205px;
        margin: 10px auto;
    }

    .form-group .control-label,
    .form-group>label {
        font-weight: 400 !important;
        font-size: 16.8px !important;
        color: #060617;
        font-family: "Inter", "Helvetica", monospace;
        line-height: 1.6;
    }

    .avatar-upload .avatar-edit input {
        display: none;
    }

    .avatar-upload .avatar-edit input+label {
        display: inline-block;
        width: 34px;
        height: 34px;
        margin-bottom: 0;
        border-radius: 100%;
        background: #FFFFFF;
        border: 1px solid transparent;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        font-weight: normal;
        transition: all 0.2s ease-in-out;
    }

    .avatar-box .avatar-preview {
        border-radius: 10%;
    }

    .files-box {
        padding: .5rem !important;
        font-weight: 500;
    }

    .download-btn {
        background: #000 !important;
        padding: 15px 26px !important;
        color: #fff !important;
        font-size: 19px;
    }

    input,
    textarea {
        margin: 0;
        font-family: inherit;
        font-size: inherit;
        line-height: inherit;
        border: none;
        padding: 10px;
        color: black;
        font-weight: 600;
        background: #e9e9e9;
    }

    h1 {
        font-size: 32px;
        text-align: center;
        font-weight: 500;
        margin-bottom: 24px;
    }

    #modalHTML .item {
        /* border: 2px solid #222222; */
        border: 2px solid #959092;
        padding: 16px;
        border-radius: 8px;
        display: flex;
        gap: 16px;
        align-items: center;
        will-change: transform;
        background-color: #ffffff;
        transition: all 0.3s ease-in-out;
        margin-bottom: 6px;
    }

    #modalHTML .item:hover {
        border-color: #c4ae79;
        transform: scale(1.025);
    }

    #modalHTML .item svg {
        width: 36px;
        height: 36px;
        transition: all 0.3s ease-in-out;
    }

    #modalHTML .item:hover svg {
        color: #7e3af2;
        fill: red;
    }

    #modalHTML .item .download-btn {
        all: unset;
        margin-left: auto;
        background-color: #c4ae79;
        padding: 12px 16px;
        border-radius: 6px;
        color: #ffffff;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
    }

    #modalHTML .item .download-btn:hover {
        /* background-color: #7126f1; */
        opacity: 0.8;
    }

    #modalHTML .item .filedata {
        display: flex;
        gap: 4px;
        font-size: 12px;
        margin-top: 8px;
        color: #888888;
    }
</style>

<section class="freelance_section">
    <div class="container">
        <select id="status-filter">
            <option value="">All</option>
            <option value="pending">Pending</option>
            <option value="delivered">Delivered</option>
        </select>
        <table id="freelance-datatable" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>{{ __('home.order') }}</th>
                    <th>{{ __('home.date') }}</th>
                    <th>{{ __('home.order_from') }}</th>
                    <th>{{ __('home.project') }}</th>
                    <th>{{ __('home.status') }}</th>
                    <th>Order deatils</th>
                    <th>Upload Files</th>
                </tr>
            </thead>
            <tbody></tbody>



        </table>
    </div>
</section>








<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-8 modalHTML" id="modalHTML">
                        <!-- <div class="item">
                            <img src="{{ asset('/images/files.svg') }}" width="40" height="40">
                            <rect class="cls-637647fac3a86d32eae6f27d-1" x="7.23" y="11.05" width="5.73" height="6.68"></rect>
                            <polygon class="cls-637647fac3a86d32eae6f27d-1" points="12.96 14.86 15.82 17.73 16.77 17.73 16.77 11.04 15.82 11.04 12.96 13.91 12.96 14.86"></polygon>
                            <polygon class="cls-637647fac3a86d32eae6f27d-1" points="20.59 6.27 20.59 22.5 3.41 22.5 3.41 1.5 15.82 1.5 20.59 6.27"></polygon>
                            <polygon class="cls-637647fac3a86d32eae6f27d-1" points="20.59 6.27 20.59 7.23 14.86 7.23 14.86 1.5 15.82 1.5 20.59 6.27"></polygon>
                            </img>
                            <div class="filename">
                                <p></p>
                                <div class="filedata">
                                    <span>30 MB</span>
                                </div>
                            </div>
                            <a href="" class="download-btn" download>Download</a>
                        </div> -->
                    </div>
                    <hr>
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
    $(document).ready(function() {
        $(".pop-up").on("click", function() {
            $('#modalHTML').empty();
            const id = $(this).data("id");
            const category = $(this).data("category");
            $.ajax({
                url: "{{ __('routes.files') }}",
                method: "POST",
                data: {
                    id: id,
                    category: category,
                },
                success: function(data) {
                    var files = JSON.parse(data.data[0].file_upload);
                    console.log("files", files);
                    var modal = document.getElementById('modalHTML');
                    files.forEach(item => {
                        console.log("data", item);
                        var size = item.size;
                        console.log(size);
                        var newelement = `<div class="item" id="item">
                            <img src="http://127.0.0.1:8000/images/files.svg" width="40" height="40">
                            <rect class="cls-637647fac3a86d32eae6f27d-1" x="7.23" y="11.05" width="5.73" height="6.68"></rect>
                            <polygon class="cls-637647fac3a86d32eae6f27d-1" points="12.96 14.86 15.82 17.73 16.77 17.73 16.77 11.04 15.82 11.04 12.96 13.91 12.96 14.86"></polygon>
                            <polygon class="cls-637647fac3a86d32eae6f27d-1" points="20.59 6.27 20.59 22.5 3.41 22.5 3.41 1.5 15.82 1.5 20.59 6.27"></polygon>
                            <polygon class="cls-637647fac   3a86d32eae6f27d-1" points="20.59 6.27 20.59 7.23 14.86 7.23 14.86 1.5 15.82 1.5 20.59 6.27"></polygon>
                            <div class="filename" id="showdata">
                                <p id="file-name">${item}</p>
                                <div class="filedata">

                                </div>
                            </div>
                            <a href="/deliveryFiles/${item}" class="download-btn" id="downloadbutton" download="">Download</a>
                        </div>`
                        console.log('new', newelement)
                        $('#modalHTML').append(newelement);
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });

    $(function() {
        var table = $('#freelance-datatable').DataTable({
            language: {
                paginate: {
                    next: '<i class="fa-solid fa-chevron-right"></i>', // or '→'
                    previous: '<i class="fa-solid fa-chevron-left"></i>' // or '←'
                }
            },
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ __('routes.freelancer-vieworders') }}",
                data: function(d) {
                    d.status_filter = $('#status-filter').val();
                    d.category_filter = $('#category-filter').val();
                }
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'project_name',
                    name: 'project_name'
                },
                // {
                //     data: 'selection',
                //     name: 'selection'
                // },
                // {
                //     data: 'catgory',
                //     name: 'catgory'
                // },
                // {
                //     data: 'company',
                //     name: 'company'
                // },
                {
                    data: 'date',
                    name: 'date'
                },
                {
                    data: 'user',
                    name: 'user'
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
                    data: 'upload',
                    name: 'upload',
                    orderable: false,
                    searchable: false
                },
            ]
        });
        $('#status-filter, #category-filter').change(function() {
            table.ajax.reload();
        });
    });
</script>
