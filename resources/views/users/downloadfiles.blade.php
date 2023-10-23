@extends('layout.layout')
@section('content')
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

        .filename p {
            font-size: 19px;
            font-weight: 600;
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

        .profile_wrap .item {
            border: 2px solid #959092;
            padding: 10px 16px;
            border-radius: 8px;
            display: flex;
            gap: 5px;
            align-items: center;
            will-change: transform;
            background-color: #ffffff;
            transition: all 0.3s ease-in-out;
            margin-bottom: 6px;
        }

        .profile_wrap .item:hover {
            border-color: #c4ae79;
        }

        .profile_wrap .item svg {
            width: 36px;
            height: 36px;
            transition: all 0.3s ease-in-out;
        }

        .profile_wrap .item:hover svg {
            color: #7e3af2;
            fill: red;
        }

        .profile_wrap .item .download-btn {
            all: unset;
            margin-left: auto;
            background-color: #c4ae79;
            padding: 12px 16px;
            border-radius: 6px;
            color: #ffffff;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .profile_wrap .item .download-btn:hover {
            /* background-color: #7126f1; */
            opacity: 0.8;
        }

        .profile_wrap .item .filedata {
            display: flex;
            gap: 4px;
            font-size: 12px;
            margin-top: 8px;
            color: #888888;
        }

        .no-files {
            text-align: center;
            padding: 40px 0;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .no-files i {
            font-size: 64px;
            color: #ccc;
            margin-bottom: 10px;
        }

        /* .no-files p {
            font-size: 18px;
            color: #666;
            line-height: 1.5;
        } */
        .no-files p {
            font-size: 16px;
            color: #777;
            line-height: 1.5;
            max-width: 320px;
            margin: 0 auto;
        }
    </style>
    <section class="customer_profile_section">
        <div class="padding-30">
            <div class="row">
                <div class="col-12">
                    <div class="pagetitle">
                        <h1>Delivery Files Download </h1>
                    </div>
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

                                                <img src="{{ asset('/images/files.svg') }}" width="40" height="40">
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
