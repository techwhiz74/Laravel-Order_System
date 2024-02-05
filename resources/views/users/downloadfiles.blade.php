@extends('layout.layout')
@section('content')
    @php
        $serial = 1;
    @endphp
    <section class="page_section">
        <div class="padding-30">
            <div class="row">
                <div class="col-12">
                    <h1 class="pagetitle">
                    </h1>
                </div>
            </div>
            @if ($files != '')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="profile_wrap">
                            <div class="card">
                                <div class="card-body">
                                    @if (count($data) > 0)
                                        @foreach ($data as $item)
                                            <div class="item download-files-item">

                                                <rect class="cls-637647fac3a86d32eae6f27d-1" x="7.23" y="11.05"
                                                    width="5.73" height="6.68"></rect>
                                                <polygon class="cls-637647fac3a86d32eae6f27d-1"
                                                    points="12.96 14.86 15.82 17.73 16.77 17.73 16.77 11.04 15.82 11.04 12.96 13.91 12.96 14.86">
                                                </polygon>
                                                <polygon class="cls-637647fac3a86d32eae6f27d-1"
                                                    points="20.59 6.27 20.59 22.5 3.41 22.5 3.41 1.5 15.82 1.5 20.59 6.27">
                                                </polygon>
                                                <polygon class="cls-637647fac3a86d32eae6f27d-1"
                                                    points="20.59 6.27 20.59 7.23 14.86 7.23 14.86 1.5 15.82 1.5 20.59 6.27">
                                                </polygon>
                                                </img>
                                                <div class="filename">
                                                    <p>{{ Helper::fileName($item) }}</p>
                                                </div>
                                                <a href="{{ $item }}" class="download-btn" download>Download</a>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="item">
                                            <div class="filename">
                                                <p>NO FILE Uploaded Yet !</p>
                                            </div>
                                            <!-- <a href="{{ asset('/deliveryFiles/' . $item) }}" class="download-btn" download>Download</a> -->
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @else
                <div class="no-files">
                    <i class="fas fa-file-download"></i>
                    <p>Oops! It looks like there are no files available for download at the moment.</p>
                </div>
            @endif
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
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endsection
