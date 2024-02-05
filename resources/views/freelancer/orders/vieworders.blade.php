@extends('layout.layout')
@section('content')
    @php
        $serial = 1;
    @endphp

    <section class="page_section">
        <div class="container">
            <select id="status-filter">
                <option value="">All</option>
                <option value="pending">Pending</option>
                <option value="delivered">Delivered</option>
            </select>
            <table id="freelance-datatable123" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>S.no</th>
                        <th>Selection</th>
                        <th>Project Name</th>
                        <th>Category</th>
                        <th>Company</th>
                        <th>Created at</th>
                        <th>Status</th>
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
                            <img src="http://127.0.0.1:8000/images/files.svg" width="40" height="40" alt="image">
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
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'project_name',
                        name: 'project_name'
                    },
                    {
                        data: 'selection',
                        name: 'selection'
                    },
                    {
                        data: 'catgory',
                        name: 'catgory'
                    },
                    {
                        data: 'company',
                        name: 'company'
                    },
                    {
                        data: 'date',
                        name: 'date'
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
@endsection
