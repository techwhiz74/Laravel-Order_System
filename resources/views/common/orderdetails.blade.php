@extends('layout.layout')
@section('content')
    @php
        $serial = 1;
    @endphp

    <section class="page_section">
        <div class="padding-30">
            <div class="row">
                <div class="col-12">
                    <div class="pagetitle">
                        <h1>ORDER DEATILS</h1>
                    </div>
                </div>
            </div>

            <div class="nav nav-tabs " id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-project-tab" data-bs-toggle="tab" data-bs-target="#nav-project"
                    type="button" role="tab" aria-controls="nav-project" aria-selected="true">Project</button>
                <button class="nav-link" id="nav-address-tab" data-bs-toggle="tab" data-bs-target="#nav-address"
                    type="button" role="tab" aria-controls="nav-address" aria-selected="false">Address</button>
                <button class="nav-link" id="nav-format-tab" data-bs-toggle="tab" data-bs-target="#nav-format"
                    type="button" role="tab" aria-controls="nav-format" aria-selected="false">File Format</button>
                <button class="nav-link" id="nav-file-tab" data-bs-toggle="tab" data-bs-target="#nav-file" type="button"
                    role="tab" aria-controls="nav-file" aria-selected="false">Uploaded Files</button>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="profile_wrap">
                        <div class="card">
                            <div class="card-body">
                                <!-- <div class="nav nav-tabs " id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-project-tab" data-bs-toggle="tab" data-bs-target="#nav-project" type="button" role="tab" aria-controls="nav-project" aria-selected="true">Project</button>
                                        <button class="nav-link" id="nav-address-tab" data-bs-toggle="tab" data-bs-target="#nav-address" type="button" role="tab" aria-controls="nav-address" aria-selected="false">Address</button>
                                        <button class="nav-link" id="nav-format-tab" data-bs-toggle="tab" data-bs-target="#nav-format" type="button" role="tab" aria-controls="nav-format" aria-selected="false">File Format</button>
                                        <button class="nav-link" id="nav-file-tab" data-bs-toggle="tab" data-bs-target="#nav-file" type="button" role="tab" aria-controls="nav-file" aria-selected="false">Uploaded Files</button>
                                    </div>   -->
                                </nav>
                                <div class="tab-content p-3 border bg-light" id="nav-tabContent">
                                    <div class="tab-pane fade active show" id="nav-project" role="tabpanel"
                                        aria-labelledby="nav-project">
                                        <div class="project-detail">
                                            <ul>
                                                <li>
                                                    <span
                                                        class="text-bold">{{ __('embroidery_form.program_selection') }}</span>
                                                    <span>{{ __($order->selection) }}</span>
                                                </li>
                                                <li>
                                                    <span
                                                        class="text-bold">{{ __('embroidery_form.delievery_time') }}</span>
                                                    <span>{{ $order->delivery_time }}</span>
                                                </li>
                                                <li>
                                                    <span class="text-bold">{{ __('embroidery_form.project_name') }}</span>
                                                    <span>{{ $order->project_name }}</span>
                                                </li>
                                                @if ($order->category->category_name == 'embroidery program')
                                                    <li>
                                                        <span
                                                            class="text-bold">{{ __('embroidery_form.end_product') }}</span>
                                                        <span>{{ __($order->end_product) }}</span>
                                                    </li>
                                                    <li>
                                                        <span class="text-bold">{{ __('embroidery_form.Emb_info') }}</span>
                                                        <span>{{ $order->emb_info }}</span>
                                                    </li>
                                                    <li>
                                                        <span class="text-bold">{{ __('embroidery_form.Emb_size') }}</span>
                                                        <span>{{ $order->emb_size }}</span>
                                                    </li>
                                                @else
                                                @endif
                                                <li>
                                                    <span class="text-bold">{{ __('embroidery_form.instructions') }}</span>
                                                    <span>{{ $order->instructions }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-address" role="tabpanel"
                                        aria-labelledby="nav-address">
                                        <div class="project-detail">
                                            <ul>
                                                <li>
                                                    <span class="text-bold">{{ __('embroidery_form.salutation') }}</span>
                                                    <span>{{ __($order->Order_address->salutation) }}</span>
                                                </li>
                                                <li>
                                                    <span class="text-bold">{{ __('embroidery_form.company') }}</span>
                                                    <span>{{ $order->Order_address->company }}</span>
                                                </li>
                                                <li>
                                                    <span class="text-bold">{{ __('embroidery_form.name') }}</span>
                                                    <span>{{ $order->Order_address->full_name }}</span>
                                                </li>
                                                <li>
                                                    <span class="text-bold">{{ __('embroidery_form.address') }}</span>
                                                    <span>{{ $order->Order_address->address }},
                                                        {{ $order->Order_address->zip_code }},
                                                        {{ $order->Order_address->place }}</span>
                                                </li>
                                                <li>
                                                    <span class="text-bold">{{ __('embroidery_form.VAT_No') }}</span>
                                                    <span>{{ $order->Order_address->vat_no }}</span>
                                                </li>
                                                <li>
                                                    <span class="text-bold">{{ __('embroidery_form.contact') }}</span>
                                                    <span>{{ $order->Order_address->contact_no }}</span>
                                                </li>
                                                <li>
                                                    <span class="text-bold">{{ __('embroidery_form.email') }}</span>
                                                    <span>{{ $order->Order_address->email }}</span>
                                                </li>
                                                <li>
                                                    <span class="text-bold">{{ __('embroidery_form.website') }}</span>
                                                    <span>{{ $order->Order_address->site }}</span>
                                                </li>
                                                <li>
                                                    <span
                                                        class="text-bold">{{ __('embroidery_form.business_reg_file') }}</span>
                                                    <span><a href="{{ $order->Order_address->address_file }}"
                                                            download>{{ Helper::fileName($order->Order_address->address_file) }}</a></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-format" role="tabpanel"
                                        aria-labelledby="nav-format">
                                        <div class="project-detail">
                                            <ul>
                                                <li>
                                                    <span class="text-bold">{{ __('embroidery_form.file_format') }}</span>
                                                    <span>{{ $order->Orderfile_formats->file_format }}</span>
                                                </li>
                                                <li>
                                                    <span class="text-bold">{{ __('embroidery_form.view_file') }}</span>
                                                    <span>{{ $order->Orderfile_formats->view_file_format }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-file" role="tabpanel"
                                        aria-labelledby="nav-file">
                                        <div class="project-detail">
                                            <ul>
                                                @php
                                                    $files = json_decode($order->Orderfile_uploads->file_upload);
                                                @endphp
                                                @foreach ($files as $file)
                                                    <li>
                                                        <span><a href="{{ $file }}"
                                                                class="text-dark text-decoration-none" download>
                                                                {{ Helper::fileName($file) }}</a></span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
        $(document).ready(function() {
            $("#addressFile").submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "{{ __('routes.downloadFile') }}",
                    type: "POST",
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function(response) {
                        console.log(response);
                        // const blob = new Blob([response]);
                        // const url = window.URL.createObjectURL(blob);
                        // console.log(url);
                        // const a = document.createElement("a");
                        // a.style.display = "none";
                        // a.href = url;
                        // a.download = "downloaded_file.jpg"; // Replace with the desired filename and extension
                        // document.body.appendChild(a);
                        // a.click();
                        // // Clean up the URL and remove the link
                        // window.URL.revokeObjectURL(url);
                        // document.body.removeChild(a);
                        // console.log(blog);
                    },
                    error: function(xhr, status, error) {
                        // Handle the error response
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endsection
