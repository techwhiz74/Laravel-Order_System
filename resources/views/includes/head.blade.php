<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Fonts -->
<title> Lion Werbe GmbH | Bestellsystem Stickprogramme & Vektordateien</title>

<link rel="stylesheet" href="{{ asset('asset/css/user/global.css') }}">


<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
{{-- <link rel="stylesheet" --}}
{{-- href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker3.min.css"> --}}
<link rel="stylesheet" href="{{ asset('asset/css/bootstrap-datepicker3.min.css') }}">
<link href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css"
    rel="stylesheet">
<link href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css"
    rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"rel="stylesheet">
<link href="{{ asset('asset/css/jquery.multiselect.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<!-- blueimp Gallery styles -->
<link rel="stylesheet" href="https://blueimp.github.io/Gallery/css/blueimp-gallery.min.css" />
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="{{ asset('asset/css/jquery.fileupload.css') }}" />
<link rel="stylesheet" href="{{ asset('asset/css/jquery.fileupload-ui.css') }}" />
{{-- <link rel="stylesheet"
    href="https://www.jqueryscript.net/demo/jQuery-Multiple-Select-Plugin-For-Bootstrap-Bootstrap-Multiselect/css/bootstrap-multiselect.css"
    type="text/css"> --}}
<link rel="stylesheet"
    href="https://www.jqueryscript.net/demo/jQuery-Multiple-Select-Plugin-For-Bootstrap-Bootstrap-Multiselect/css/prettify.css"
    type="text/css">




<!-- CSS adjustments for browsers with JavaScript disabled -->
<noscript>
    <link rel="stylesheet" href="{{ asset('asset/css/jquery.fileupload-noscript.css') }}" />
</noscript>
<noscript>
    <link rel="stylesheet" href="{{ asset('asset/css/jquery.fileupload-ui-noscript.css') }}" />
</noscript>
<!-- blueimp Gallery styles -->
<link rel="stylesheet" href="{{ asset('asset/css/fastselect.min.css') }}">
<link href="{{ asset('asset/css/magicsuggest.css') }}" rel="stylesheet" />

<style>
    .overlay {
        display: none;
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 10000;
        background: rgba(255, 255, 255, 0.8) url('{{ asset('asset/images/loader.gif') }}') center no-repeat;
    }

    /* body {
        text-align: center;
    } */

    /* Turn off scrollbar when body element has the loading class */
    body.loading {
        overflow: hidden;
    }

    /* Make spinner image visible when body element has the loading class */
    body.loading .overlay {
        display: block;
    }
</style>


<!-- Font Awesome -->

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
    crossorigin="anonymous"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="{{ asset('asset/js/jquery.dataTables.min.js') }}" defer></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/locales/bootstrap-datepicker.de.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript"
    src="https://www.jqueryscript.net/demo/jQuery-Multiple-Select-Plugin-For-Bootstrap-Bootstrap-Multiselect/js/bootstrap-multiselect.js">
</script>
<script type="text/javascript"
    src="https://www.jqueryscript.net/demo/jQuery-Multiple-Select-Plugin-For-Bootstrap-Bootstrap-Multiselect/js/prettify.js">
</script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>




<script>
    function menuToggle() {
        const toggleMenu = document.querySelector(".menu");
        toggleMenu.classList.toggle("active");
    }
</script>

<!-- <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js"></script> -->

<script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
<script src="{{ asset('asset/js/jquery.multiselect.js') }}"></script>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="{{ asset('asset/js/vendor/jquery.ui.widget.js') }}"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="https://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="https://blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="https://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- blueimp Gallery script -->
<script src="https://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="{{ asset('asset/js/jquery.iframe-transport.js') }}"></script>
<!-- The basic File Upload plugin -->
<script src="{{ asset('asset/js/jquery.fileupload.js') }}"></script>
<!-- The File Upload processing plugin -->
<script src="{{ asset('asset/js/jquery.fileupload-process.js') }}"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="{{ asset('asset/js/jquery.fileupload-image.js') }}"></script>
<!-- The File Upload audio preview plugin -->
<script src="{{ asset('asset/js/jquery.fileupload-audio.js') }}"></script>
<!-- The File Upload video preview plugin -->
<script src="{{ asset('asset/js/jquery.fileupload-video.js') }}"></script>
<!-- The File Upload validation plugin -->
<script src="{{ asset('asset/js/jquery.fileupload-validate.js') }}"></script>
<!-- The File Upload user interface plugin -->
<script src="{{ asset('asset/js/jquery.fileupload-ui.js') }}"></script>
<!-- The main application script -->
<script src="{{ asset('asset/js/demo.js') }}"></script>
<script src="{{ asset('asset/js/demo_em_ex.js') }}"></script>
<script src="{{ asset('asset/js/demo_admin.js') }}"></script>
<script src="{{ asset('asset/js/demo_job.js') }}"></script>
<script src="{{ asset('asset/js/demo_embroidery.js') }}"></script>
<script src="{{ asset('asset/js/demo_vector.js') }}"></script>
<script src="{{ asset('asset/js/fastselect.standalone.js') }}"></script>
<script src="{{ asset('asset/js/magicsuggest.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#header_slider').owlCarousel({
            items: 1,
            loop: true,
            margin: 0,
            autoplay: true,
            autoplayTimeout: 6000,
            autoplayHoverPause: true,
            dots: false,
            autoplaySpeed: 1500,
            responsive: {
                margin: 10,
                loop: true,
                0: {
                    items: 1
                },

                992: {
                    items: 1
                },
                1200: {
                    items: 1
                },
                1400: {
                    items: 1
                },
            }
        });
        $('select[multiple]#order_multiselect').multiselect({
            columns: 4,
            placeholder: '{{ __('home.order_form_multiselect_placeholder') }}',
            search: true,
            searchOptions: {
                'default': 'Bitte wählen Sie das Endmaterial aus. Mehrfachauswahl möglich.'
            },
            selectAll: true
        });
    });
</script>



<script>
    $(document).ready(function() {
        $(".q1").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

    });
</script>

<script>
    $(document).ready(function() {
        $(".q2").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

    });
</script>


<script>
    $(document).ready(function() {
        var prevClass = '';
        $(".lion_pop_btn").click(async function() {
            let lionpid = $(this).attr("lion-pop-id");
            let id = $(this).attr('id');

            if ($("#" + lionpid).hasClass('active') && $("#" + lionpid).hasClass(id)) {
                $(".lion_popup_wrrpr").removeClass("active");
                $("#" + lionpid).removeClass(id);
                $("#wrapper").removeClass("full_height");
                $(".main-content-wrapper").show();
            } else {
                await $(".lion_popup_wrrpr").removeClass("active");
                $(".lion_popup_wrrpr").removeClass(prevClass);
                $("#wrapper").addClass("full_height");
                $("#" + lionpid).addClass("active");
                $("#" + lionpid).addClass(id);
                prevClass = id;
                $(".main-content-wrapper").hide();
            }
        });
    });
    $(document).ready(function() {
        $(".lion_pop_close").click(function() {
            $(".lion_popup_wrrpr").removeClass("active");
            $("#wrapper").removeClass("full_height");
        });
    });

    function hideModal() {
        $('#order_detail_popup').modal("hide");
        $('#order_change_popup').modal("hide");
        $('#order_form_success_popup').modal("hide");
        $('#customer_staff_create_popup').modal("hide");
        $('#admin_customer_profile_edit_popup').modal("hide");
        $('#admin_customer_profile_request_handle_popup').modal("hide");
        $('#em_freelancer_request_popup').modal("hide");
        $('#register_upload_popup').modal('hide');
        $('#order_request_popup').modal('hide');
        $('#free_order_detail_popup').modal("hide");
        $('#ve_freelancer_request_popup').modal("hide");
    }

    function hideAlertModal() {
        $('#delete_error').modal('hide');
    }
    $(document).on({
        ajaxStart: function() {
            $("body").addClass("loading");
        },
        ajaxStop: function() {
            $("body").removeClass("loading");
        }
    });
</script>
