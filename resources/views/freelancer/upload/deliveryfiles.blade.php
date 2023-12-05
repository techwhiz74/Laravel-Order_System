    @extends('layout.layout')
    @section('content')
        @php
            $serial = 1;
            if (isset($freelancer_files)) {
                $data = json_decode($freelancer_files->delivery_files);
            }

        @endphp

        <section class="page_section">
            <div class="padding-30">
                <div class="row">
                    <div class="col-12">
                        @if (Session::has('success'))
                            <p class="alert alert-success" style="text-align: center;">
                                {{ Session::get('success') }}
                            </p>
                        @endif
                        <div class="pagetitle">
                            <h1>Delivery Files</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="profile_wrap freelancer-profile-wrap">
                            <div id="success-message" style="display:none;">
                                <p class="alert alert-success" style="text-align: center;">
                                    Delivery Files Uploaded Successfully
                                </p>
                            </div>

                            <form id="delivery_files">
                                <div class="tab">

                                    <div class="row additional_wrap">
                                        <div class="col-md-6">
                                            <div class="additional_heading">
                                                <h5>Delivery File Upload</h5>
                                            </div>
                                            <!-- <label class="col-10"></label> -->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="additional_btn">
                                                <button type="button" id="add-file-btn"
                                                    class="btn btn-outline-success ">Additional file</button>
                                            </div>
                                        </div>
                                    </div>
                                    <p id="file-container" style="display: flex; flex-direction:column; gap:18px"
                                        class="form-group">
                                        <input type="file" name="file_upload[]" class="form-control " multiple
                                            id="file_upload">
                                        <input type="hidden" name="customerid" class="form-control "
                                            value="{{ @$orderdata->user_id }}">
                                        <input type="hidden" name="order_id" class="form-control "
                                            value="{{ @$orderid }}">
                                        <input type="hidden" name="freelancerid" class="form-control "
                                            value="{{ @$orderdata->category_id }}">
                                        <span class="error" id="file_upload_error">Please upload file
                                            <i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                    </p>
                                </div>


                                <div class="row">
                                    <div class="col-12 ">
                                        <div class="upload_btn">
                                            <a href="#" id="loading"
                                                class="btn btn-primary btn-block send-btn loading-btn"
                                                style="display:none;border-color: #54b4d3;color: #54b4d3;font-weight: bold;">
                                                <span class="loader"></span>
                                            </a>
                                            <button id="send-btn" class="btn btn-primary btn-block">Upload</button>
                                        </div>
                                    </div>
                                </div>
                                @if (isset($data))
                                    <div class="row">
                                        <div class="upload_heading">
                                            <h1> Uploaded Files </h1>
                                        </div>
                                        <div class="col-md-12" style="cursor:pointer;">
                                            @for ($i = 0; $i < count($data); $i++)
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="upload-file-row">
                                                            <span class=""><i class="fa-solid fa-file"></i></span>
                                                            <span>
                                                                <p>{{ Helper::fileName($data[$i]) }}</p>
                                                            </span>

                                                            <span><a href="{{ @$data[$i] }}" class="download-btn"
                                                                    download> download</a></span>
                                                            {{-- <span><a href="{{ __('routes.freelancer-delete-files') . $i . '/' . @$orderdata->id }}"
                                                                    class="btn btn-danger"><i
                                                                        class="fa-solid fa-xmark"></i></a></span> --}}

                                                        </div>
                                                    </div>
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>


                </div>

                <!-- <div class="row mt-5">
                                <div class="col-12">
                                    <div class="pagetitle">
                                        <h2> Uploaded Files </h2>
                                    </div>
                                </div>
                                <div class="col-md-3 img-gallery">
                                    <img class="image" width="100%" src="https://images.pexels.com/photos/6462662/pexels-photo-6462662.png?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Lamo parked on road">
                                </div>
                                <div class="col-md-3 img-gallery">
                                    <img class="image" width="100%" src="https://images.pexels.com/photos/5288701/pexels-photo-5288701.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="lambo on road">
                                </div>
                                <div class="col-md-3 img-gallery">
                                    <img class="image" width="100%" src="https://images.pexels.com/photos/6894430/pexels-photo-6894430.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="lambo parked">
                                </div>
                                <div class="col-md-3 img-gallery">
                                    <img class="image" width="100%" src="https://images.pexels.com/photos/6894430/pexels-photo-6894430.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="lambo parked">
                                </div>
                            </div> -->

            </div>



        </section>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            document.addEventListener('DOMContentLoaded', function() {
                const addFileBtn = document.getElementById('add-file-btn');
                const fileContainer = document.getElementById('file-container');

                addFileBtn.addEventListener('click', function() {
                    const newInputFile = document.createElement('input');
                    newInputFile.type = 'file';
                    newInputFile.name = 'file_upload[]';
                    newInputFile.className = 'form-control';
                    fileContainer.appendChild(newInputFile);
                });
            });

            const form = document.getElementById('delivery_files');
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                const formData = new FormData(form);
                console.log(formData);
                $.ajax({
                        url: "{{ __('routes.upload-delivery-files') }}",
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        beforeSend: function() {
                            $('#send-btn').hide();
                            $(".loading-btn").show();
                        },
                        complete: function() {
                            $('#send-btn').show();
                            $(".loading-btn").hide();
                        },

                    })
                    .then(response => {
                        if (response.message) {
                            document.getElementById('success-message').style.display = "block"
                            setTimeout(() => {
                                document.getElementById('success-message').style.display = "none"
                                location.reload()
                            }, 2000);
                        }
                    });
            });
        </script>
    @endsection
