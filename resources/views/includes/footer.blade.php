@stack('custom-script')
<script>
    $(document).on("change", ".uploadProfileInput", function() {
        var triggerInput = $(this);
        var currentImg = $(this).closest(".pic-holder").find(".pic").attr("src");
        var holder = $(this).closest('.profile-pic-wrapper').find(".pic-holder");
        var wrapper = $(this).closest(".profile-pic-wrapper");
        $(wrapper).find('[role="alert"]').remove();
        triggerInput.blur();
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) {
            return;
        }
        if (/^image/.test(files[0].type)) {
            // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function() {
                $(holder).addClass("uploadInProgress");
                $(holder).find(".pic").attr("src", this.result);
                $(holder).append(
                    '<div class="upload-loader"><div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div></div>'
                );

                // Dummy timeout; call API or AJAX below
                setTimeout(() => {
                    $(holder).removeClass("uploadInProgress");
                    $(holder).find(".upload-loader").remove();
                    // If upload successful
                    if (Math.random() < 0.9) {
                        $(wrapper).append(
                            '<div class="snackbar show" role="alert"><i class="fa fa-check-circle text-success"></i> Profile image updated successfully</div>'
                        );

                        // Clear input after upload
                        // $(triggerInput).val("");

                        setTimeout(() => {
                            $(wrapper).find('[role="alert"]').remove();
                        }, 3000);
                    } else {
                        $(holder).find(".pic").attr("src", currentImg);
                        $(wrapper).append(
                            '<div class="snackbar show" role="alert"><i class="fa fa-times-circle text-danger"></i> There is an error while uploading! Please try again later.</div>'
                        );

                        // Clear input after upload
                        $(triggerInput).val("");
                        setTimeout(() => {
                            $(wrapper).find('[role="alert"]').remove();
                        }, 3000);
                    }
                }, 1500);
            };
        } else {
            $(wrapper).append(
                '<div class="alert alert-danger d-inline-block p-2 small" role="alert">Please choose the valid image.</div>'
            );
            setTimeout(() => {
                $(wrapper).find('role="alert"').remove();
            }, 3000);
        }
    });
    $(document).ready(function() {
        setTimeout(function() {
            $(".alert").alert('close');
        }, 3000);
    });
</script>
<footer>
    <div class="footer_wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-12">
                    <ul class="copyright_list">
                        <li>
                            <p>
                            <p><span><span style="font-size:20px">©</span> Lion Werbe GmbH | Wir machen Werbung.</span>
                                <span>Stark wie ein Löwe.</span> <span>Alle Rechte vorbehalten.</span>
                            </p>
                            </p>
                        </li>
                    </ul>
                </div>

                <div class="col-md-5 col-sm-12">
                    <ul class="copyright_list" style="justify-content: end">
                        <li>
                            <a href="">Datenschutzerklärung</a>
                        </li>
                        <li>
                            <a href="">Impressum</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>


{{-- <script>
    $("#order_file_upload").change(function(e) {
        var files = e.target.files;
        var data = new FormData();

        for (var i in files) {
            if (i < files.length) {
                data.append(i, files[i]);
            }
        }

        $.ajax({
            url: '{{ route('upload') }}',
            type: 'POST',
            contentType: false,
            processData: false,
            data: data,
            xhr: () => {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = (evt.loaded / evt.total) * 100;
                        $('#order_progress').removeClass('reqiurd');
                        $('#order_progress').text('Uploading ' + percentComplete + '%...');
                    }
                }, false);
                return xhr;
            },
            success: () => {
                $('#order_progress').text('{{ __('home.Files are successfully uploaded') }}');
                table.ajax.reload();
            },
            error: () => {
                $('#order_progress').addClass('reqiurd');
                $('#order_progress').text('{{ __('home.Files uploading failed') }}');
            }
        });
    });
</script> --}}

<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
      {% for (var i=0, file; file=o.files[i]; i++) { %}
          <tr class="template-upload fade{%=o.options.loadImageFileTypes.test(file.type)?' image':''%}">
              <td>
                  <span class="preview"></span>
              </td>
              <td>
                  <p class="name">{%=file.name%}</p>
                  <strong class="error text-danger"></strong>
              </td>
              <td>
                  <p class="size">Processing...</p>
                  <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
              </td>
              <td style="text-align:end;">
                  {% if (!o.options.autoUpload && o.options.edit && o.options.loadImageFileTypes.test(file.type)) { %}
                    <button class="btn btn-success edit" data-index="{%=i%}" disabled>
                        <i class="glyphicon glyphicon-edit"></i>
                        <span>Edit</span>
                    </button>
                  {% } %}
                  {% if (!i && !o.options.autoUpload) { %}
                      <button class="upload_table_button start" disabled>
                          <i class="glyphicon glyphicon-upload"></i>
                          <span style="font-size:13px;">Start</span>
                      </button>
                  {% } %}
                  {% if (!i) { %}
                      <button class="upload_table_button cancel">
                          <i class="glyphicon glyphicon-ban-circle"></i>
                          <span style="font-size:13px;">Abbrechen</span>
                      </button>
                  {% } %}
              </td>
          </tr>
      {% } %}
    </script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
      {% for (var i=0, file; file=o.files[i]; i++) { %}
          <tr class="template-download fade{%=file.thumbnailUrl?' image':''%}">
              <td>
                  <span class="preview">
                      {% if (file.thumbnailUrl) { %}
                          <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                      {% } %}
                  </span>
              </td>
              <td>
                  <p class="name">
                      {% if (file.url) { %}
                          <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                      {% } else { %}
                          <span>{%=file.name%}</span>
                      {% } %}
                  </p>
                  {% if (file.error) { %}
                      <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                  {% } %}
              </td>
              <td>
                  <span class="size">{%=o.formatFileSize(file.size)%}</span>
              </td>
              <td>
                  {% if (file.deleteUrl) { %}
                      <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                          <i class="glyphicon glyphicon-trash"></i>
                          <span>Delete</span>
                      </button>
                      <input type="checkbox" name="delete" value="1" class="toggle">
                  {% } else { %}
                      <button class="btn btn-warning cancel">
                          <i class="glyphicon glyphicon-ban-circle"></i>
                          <span>Cancel</span>
                      </button>
                  {% } %}
              </td>
          </tr>
      {% } %}
    </script>
<script>
    function contentViewer(id) {
        for (let i = 0; i < 4; i++) {
            $('#menu_content_wrapper' + i).hide();
        }
        $('#bn_sec').hide();
        $('.lion_popup_wrrpr').removeClass('active');
        $("#wrapper").removeClass("full_height");
        $(".main-content-wrapper").show();
        $('#menu_content_wrapper' + id).show();
        return false;
    }
    $(function() {
        // checkbox fileds in select products
        $('.product-item-menu').hide();
        $('#menu_content_wrapper0').hide();
        $('#menu_content_wrapper1').hide();
        $('#menu_content_wrapper2').hide();
        $('#menu_content_wrapper3').hide();
        $('#bn_sec').show();
        var products = [];
        var inputValues = [];

        var popup = '#order_form_em_standard_popup';
        var typeInput = $('[name=type]');
        var deliverTimeInput = $('[name=deliver_time]');

        $('#order_form_em_standard_popup1').click(function() {
            typeInput.val('Embroidery');
            deliverTimeInput.val('STANDARD');
            inputValues = [];
            popup = '#' + $(this).attr('lion-pop-id');
            $('#order_form_title').text('{{ __('home.orderform_title') }}');
            $('#order_form_size').css("display", "block");
            $('#order_form_products').css("display", "block");
            $('#order_form_anotherOrderButton').trigger('click');
            $('.order_form_validation_projectname').hide();
            $('[name=project_name]').css("border", "1px solid #ddd");
            $('.order_form_validation_size').hide();
            $('[name=size]').css("border", "1px solid #ddd");
            $('.order_form_validation_products').hide();
            $('#selected_products').css("border", "1px solid #ddd");
            $('.order_form_validation_checkbox').hide();
            $('#selected_products').text("");
            $('.order_form_file_upload').hide();
            $('.admin_search_customer_validation').hide();
            $('.SearchInputWrapper').css("border", "1px solid #ddd");
            $('#customer_search_popup').modal('hide');

        });
        $('#order_form_em_standard_popup2').click(function() {
            typeInput.val('Embroidery');
            deliverTimeInput.val('EXPRESS');
            inputValues = [];
            popup = '#' + $(this).attr('lion-pop-id');
            $('#order_form_title').text('{{ __('home.express_head_title') }}');
            $('#order_form_size').css("display", "block");
            $('#order_form_products').css("display", "block");
            $('#order_form_anotherOrderButton').trigger('click');
            $('.order_form_validation_projectname').hide();
            $('[name=project_name]').css("border", "1px solid #ddd");
            $('.order_form_validation_size').hide();
            $('[name=size]').css("border", "1px solid #ddd");
            $('.order_form_validation_products').hide();
            $('#selected_products').css("border", "1px solid #ddd");
            $('.order_form_validation_checkbox').hide();
            $('#selected_products').text("");
            $('.order_form_file_upload').hide();
            $('.admin_search_customer_validation').hide();
            $('.SearchInputWrapper').css("border", "1px solid #ddd");
            $('#customer_search_popup').modal('hide');

        });
        $('#order_form_em_standard_popup3').click(function() {
            typeInput.val('Vector');
            deliverTimeInput.val('STANDARD');
            inputValues = [];
            popup = '#' + $(this).attr('lion-pop-id');
            $('#order_form_title').text('{{ __('home.vecotr_standard_head_title') }}');
            $('#order_form_size').css("display", "none");
            $('#order_form_products').css("display", "none");
            $('#order_form_anotherOrderButton').trigger('click');
            $('.order_form_validation_projectname').hide();
            $('[name=project_name]').css("border", "1px solid #ddd");
            $('.order_form_file_upload').hide();
            $('[name=size]').val("");
            $('.order_form_validation_checkbox').hide();
            $('#selected_products').text("No Products");
            $('.admin_search_customer_validation').hide();
            $('.SearchInputWrapper').css("border", "1px solid #ddd");
            $('#customer_search_popup').modal('hide');
        });
        $('#order_form_em_standard_popup4').click(function() {
            typeInput.val('Vector');
            deliverTimeInput.val('EXPRESS');
            inputValues = [];
            popup = '#' + $(this).attr('lion-pop-id');
            $('#order_form_title').text('{{ __('home.vecotr_express_head_title') }}');
            $('#order_form_size').css("display", "none");
            $('#order_form_products').css("display", "none");
            $('#order_form_anotherOrderButton').trigger('click');
            $('.order_form_validation_projectname').hide();
            $('[name=project_name]').css("border", "1px solid #ddd");
            $('.order_form_file_upload').hide();
            $('[name=size]').val("");
            $('.order_form_validation_checkbox').hide();
            $('#selected_products').text("No Products");
            $('.admin_search_customer_validation').hide();
            $('.SearchInputWrapper').css("border", "1px solid #ddd");
            $('#customer_search_popup').modal('hide');
        });
        $('#view_order_popup1').click(function() {
            $('#order_detail_popup').hide();
            $('#order_change_popup').hide();
        })

        $('.product-select-items input[type=checkbox]').change(function() {
            products = [];
            $('.product-select-items').find('input[type=checkbox]:checked').each(function() {
                products.push($(this).val());
            });
            products = products.concat(inputValues);
            $('#selected_products').text(products.join(', '));
            $('[name=products]').val(products.join(', '));
        });

        $('#order_submit_form').submit(function(e) {
            e.preventDefault();
            $('.product-items-menu').show();
        });
        $('#admin_order_submit_form').submit(function(e) {
            e.preventDefault();
            $('.product-items-menu').show();
        });
        //manual input fiels in multi select
        $('#manualInput').keyup(function(e) {
            var inputValue = $(this).val().trim();
            if (e.key == "Enter") {
                if (inputValue !== '') {
                    products.push(inputValue);
                    inputValues.push(inputValue);
                    $('#selected_products').text(products.join(', '));
                    $('[name=products]').val(products.join(', '));
                    $('#manualInput').val('');
                }
            }
            $('.product-item-menu').show();
        });

        // $('#clear_all_selected').click(function() {
        //     products = [];
        //     $('#selected_products').text('');
        //     $('[name=products]').val('');
        // });

        $('.product-multiselect.dropdown-toggle').click(function() {
            if ($('.product-item-menu').css("display") === "none") {
                $('.product-item-menu').show();
            } else if ($('.product-item-menu').css("display") === "block") {
                $('.product-item-menu').hide();
            }
        });

        $(document).mouseup(function(event) {
            var container = $('.product-item-menu');
            // Check if the clicked element is outside the modal
            if (!container.is(event.target) &&
                container.has(event.target).length === 0 &&
                $('.product-item-menu').css("display") === "block") {
                // Hide the modal
                container.hide();
            }
        });
        //cancel button in muti select dropdown
        $('#close_project_menu').click(function() {
            $('.product-item-menu').hide();
        })

        //another order button
        $('#order_form_anotherOrderButton').click(function() {
            $('#order_form_success_popup').modal('hide');
            $('.order_form_input').val('');
            $('#selected_products').text('');
            $('[name=products]').val('');
            products = [];
            $('#order_form_textarea').val('');
            $('#fileupload').val('');
            $('.template-upload').remove();
            $('#admin_customer_search_table tr').remove();
            $('#adminTableSearchInput').text('Kunden suchen');
            $('#order_form_checkbox').prop("checked", false);
            $('.order_form_anotherOrder').hide();
            $('.product-select-items input[type=checkbox]').prop('checked', false);
        });
        $('#order_change_anotherOrderButton').click(function() {
            $('#order_change_popup').modal('hide');
            $('#order_form_upload_list tr').remove();
            $('[name=order_change_textarea]').val("");
            $('#order_change_success_popup').modal('hide');
        });
        //order form submit button
        $('.order_form_submit').click(function() {
            var data = new FormData();
            data.append('project_name', $('[name=project_name]').val());
            data.append('size', $('[name=size]').val());
            data.append('width_height', $('[name=width_height]:checked').val());
            data.append('products', $('[name=products]').val());
            data.append('special_instructions', $('[name=special_instructions]').val());
            data.append('type', typeInput);
            data.append('deliver_time', deliverTimeInput);
            data.append('customer_number', $('[name=customer_number]').val());
            data.append('ordered_from', $('[name=ordered_from]').val());
        });
        $('#customer_order_form_mail').one('click', function() {
            var order_form_mail_data = {
                project_name: $('[name=project_name]').val(),
                size: $('[name=size]').val(),
                width_height: $('[name=width_height]:checked').val(),
                products: $('[name=products]').val(),
                special_instructions: $('[name=special_instructions]').val()
            };
            $.ajax({
                url: '{{ __('routes.customer-order-form-mail') }}',
                type: 'get',
                data: order_form_mail_data,
                success: () => {
                    console.log('Success');
                },
                error: () => {
                    console.error('error');
                }
            })
        });
        $('.admin_order_form_submit').click(function() {
            var admin_upload = new FormData();
            admin_upload.append('project_name', $('[name=project_name]').val());
            admin_upload.append('size', $('[name=size]').val());
            admin_upload.append('width_height', $('[name=width_height]:checked').val());
            admin_upload.append('products', $('[name=products]').val());
            admin_upload.append('special_instructions', $('[name=special_instructions]').val());
            admin_upload.append('type', typeInput);
            admin_upload.append('deliver_time', deliverTimeInput);
            admin_upload.append('customer_number', $('[name=customer_number]').val());
            admin_upload.append('ordered_from', $('[name=ordered_from]').val());
            admin_upload.append('searched_id', $('[name=searched_id]').val());
        });
        $('.admin_order_form_submit').click(function(e) {
            e.preventDefault();
            if (($('[name=project_name]').val() != "") && ($('#selected_products')
                    .text() != "") && ($('#order_form_upload_list tr').length != 0) && ($(
                        '#adminTableSearchInput').text() !=
                    "Kunden suchen")) {
                $('#admin_order_submit_form').find('.fileupload-buttonbar .start').trigger('click');
            }
            if ($('#adminTableSearchInput').text() == "Kunden suchen") {
                $('.admin_search_customer_validation').show();
                $('.SearchInputWrapper').css("border", "1px solid red");
            }
            if ($('[name=project_name]').val() == "") {
                $('.order_form_validation_projectname').show();
                $('[name=project_name]').css("border", "1px solid red");
            }
            if ($('[name=size]').val() == "") {
                $('.order_form_validation_size').show();
                $('[name=size]').css("border", "1px solid red");
            }
            if ($('#selected_products').text() == "") {
                $('.order_form_validation_products').show();
                $('#selected_products').css("border", "1px solid red");
            }
            if ($('#order_form_upload_list tr').length == 0) {
                $('.order_form_file_upload').show();
            }
            if ($('#order_form_checkbox').is(':not(:checked)')) {
                $('.order_form_validation_checkbox').show();
            }
        });
        $('#request_profile_form').submit(function(e) {
            e.preventDefault();
            var request_profile_data = new FormData();
            request_profile_data.append('id', $('[name=customer_id]').val());
            request_profile_data.append('name', $('[name=profile_name]').val());
            request_profile_data.append('first_name', $('[name=profile_first_name]').val());
            request_profile_data.append('email', $('[name=profile_email]').val());
            request_profile_data.append('company', $('[name=profile_company]').val());
            request_profile_data.append('company_addition', $('[name=profile_company_addition]')
                .val());
            request_profile_data.append('street_number', $('[name=profile_street_number]').val());
            request_profile_data.append('postal_code', $('[name=profile_postal_code]').val());
            request_profile_data.append('location', $('[name=profile_location]').val());
            request_profile_data.append('country', $('[name=profile_country]').val());
            request_profile_data.append('website', $('[name=profile_website]').val());
            request_profile_data.append('phone', $('[name=profile_phone]').val());
            request_profile_data.append('mobile', $('[name=profile_mobile]').val());
            request_profile_data.append('tax_number', $('[name=profile_tax_number]').val());
            request_profile_data.append('vat_number', $('[name=profile_vat_number]').val());
            request_profile_data.append('register_number', $('[name=profile_register_number]').val());
            request_profile_data.append('kd_group', $('[name=profile_kd_group]').val());
            request_profile_data.append('kd_category', $('[name=profile_kd_category]').val());
            request_profile_data.append('payment_method', $('[name=profile_payment_method]').val());
            request_profile_data.append('bank_name', $('[name=profile_bank_name]').val());
            request_profile_data.append('IBAN', $('[name=profile_IBAN]').val());
            request_profile_data.append('BIC', $('[name=profile_BIC]').val());

            $.ajax({
                url: '{{ __('routes.customer-profileupdate') }}',
                type: 'post',
                contentType: false,
                processData: false,
                data: request_profile_data,
                success: () => {
                    toastr.success(
                        "Warten Sie auf die Genehmigung durch den Administrator");
                    $.ajax({
                        url: '{{ __('routes.customer-profileupdate-mail') }}',
                        type: 'get',
                        data: {
                            customer_id: $('[name=customer_id]').val()
                        },
                        success: () => {
                            console.log("success");
                        },
                        error: () => {
                            console.error("error");
                        }
                    })
                },
                error: () => {
                    console.error("error!");
                }
            })
        });


        //validation
        $('.order_form_submit').click(function(e) {
            e.preventDefault();

            if (($('[name=project_name]').val() != "") && ($('#selected_products')
                    .text() != "") && ($('#order_form_upload_list tr').length != 0) && ($(
                    '#order_form_checkbox').is(':checked'))) {
                $('#order_submit_form').find('.fileupload-buttonbar .start').trigger('click');
            }

            if ($('[name=project_name]').val() == "") {
                $('.order_form_validation_projectname').show();
                $('[name=project_name]').css("border", "1px solid red");
            }
            if ($('[name=size]').val() == "") {
                $('.order_form_validation_size').show();
                $('[name=size]').css("border", "1px solid red");
            }
            if ($('#selected_products').text() == "") {
                $('.order_form_validation_products').show();
                $('#selected_products').css("border", "1px solid red");
            }
            if ($('#order_form_upload_list tr').length == 0) {
                $('.order_form_file_upload').show();
            }
            if ($('#order_form_checkbox').is(':not(:checked)')) {
                $('.order_form_validation_checkbox').show();
            }
        });
        $("[name=project_name]").keyup(function(e) {
            if ($(this).val() != "") {
                $('.order_form_validation_projectname').hide();
                $('[name=project_name]').css("border", "1px solid #ddd");
            }
        });
        $("#input_number_format").keyup(function(e) {
            if ($(this).val() != "") {
                $('.order_form_validation_size').hide();
                $('[name=size]').css("border", "1px solid #ddd");
            }
        });
        $('.product-multiselect').click(function(e) {
            $('.order_form_validation_products').hide();
            $('#selected_products').css("border", "1px solid #ddd");
        });
        $('.fileinput-button').click(function(e) {
            $('.order_form_file_upload').hide();
        });
        $('#order_form_checkbox').click(function(e) {
            $('.order_form_validation_checkbox').hide();
        })
        $('.SearchInputWrapper').click(function(e) {
            $('.admin_search_customer_validation').hide();
            $('.SearchInputWrapper').css("border", "none");
        })

        // validation order form size field
        $("#input_number_format").keyup(function(e) {
            if ($(this).val().match(/^[0-9]+$/))
                return;
            else
                $(this).val('');
        });
        $('#customer_staff_create_button').click(function() {

            $('#customer_staff_create_popup').modal('show');
            $('#staff_popup_title').text("Mitarbeiter hinzufügen")
            $('#employee_id').val('');
            $('#name').val('');
            $('#email').val('');
            $('#password').val('');
        });


    });

    $(function() {
        var customer_dahsboard_green_table;
        customer_dahsboard_green_table = $('#customer_dashboard_green_table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searching: false,
            paginate: false,
            info: false,
            ajax: {
                url: "{{ __('routes.customer-dashboard-green-table') }}",
                type: "get",
            },
            order: [
                [2, 'desc']
            ],
            columns: [{
                    data: 'art',
                    name: 'art'
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
                    data: 'project_name',
                    name: 'project_name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
            ],
        })
        $('#customer_dahsboard_table_reload_button').click(function() {
            customer_dahsboard_green_table.ajax.reload();
        });
    })
    $(function() {
        var customer_dahsboard_red_table;
        customer_dahsboard_red_table = $('#customer_dashboard_red_table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searching: false,
            paginate: false,
            info: false,
            ajax: {
                url: "{{ __('routes.customer-dashboard-red-table') }}",
                type: "get",
            },
            order: [
                [2, 'desc']
            ],
            columns: [{
                    data: 'art',
                    name: 'art'
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
                    data: 'project_name',
                    name: 'project_name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
            ],

        })

        $('#customer_dahsboard_table_reload_button').click(function() {
            customer_dahsboard_red_table.ajax.reload();
        });
    })
    $(function() {
        var customer_dahsboard_yellow_table;
        customer_dahsboard_yellow_table = $('#customer_dashboard_yellow_table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searching: false,
            paginate: false,
            info: false,
            ajax: {
                url: "{{ __('routes.customer-dashboard-yellow-table') }}",
                type: "get",
            },
            order: [
                [2, 'desc']
            ],
            columns: [{
                    data: 'art',
                    name: 'art'
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
                    data: 'project_name',
                    name: 'project_name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
            ],

        })

        $('#customer_dahsboard_table_reload_button').click(function() {
            customer_dahsboard_yellow_table.ajax.reload();
        });
    })
    $(function() {
        var customer_dahsboard_blue_table;
        customer_dahsboard_blue_table = $('#customer_dashboard_blue_table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searching: false,
            paginate: false,
            info: false,
            ajax: {
                url: "{{ __('routes.customer-dashboard-blue-table') }}",
                type: "get",
            },
            order: [
                [2, 'desc']
            ],
            columns: [{
                    data: 'art',
                    name: 'art'
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
                    data: 'project_name',
                    name: 'project_name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
            ],

        })

        $('#customer_dahsboard_table_reload_button').click(function() {
            customer_dahsboard_blue_table.ajax.reload();
        });
    })
    $(function() {
        var em_freelancer_green_dash_table;
        em_freelancer_green_dash_table = $('#em_freelancer_green_dashboard_table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searching: false,
            paginate: false,
            info: false,
            ajax: {
                url: "{{ __('routes.embroidery-freelancer-green-dashboard') }}",
                type: "get",
            },
            order: [
                [2, 'desc']
            ],
            columns: [{
                    data: 'art',
                    name: 'art'
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
                    data: 'project_name',
                    name: 'project_name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
            ],

        })
        $('#em_freelancer_table_reload_btn').click(function() {
            em_freelancer_green_dash_table.ajax.reload();
        })
    })
    $(function() {
        var em_freelancer_yellow_dash_table;
        em_freelancer_yellow_dash_table = $('#em_freelancer_yellow_dashboard_table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searching: false,
            paginate: false,
            info: false,
            ajax: {
                url: "{{ __('routes.embroidery-freelancer-yellow-dashboard') }}",
                type: "get",
            },
            order: [
                [2, 'desc']
            ],
            columns: [{
                    data: 'art',
                    name: 'art'
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
                    data: 'project_name',
                    name: 'project_name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
            ],

        })
        $('#em_freelancer_table_reload_btn').click(function() {
            em_freelancer_yellow_dash_table.ajax.reload();
        })
    })
    $(function() {
        var em_freelancer_red_dash_table;
        em_freelancer_red_dash_table = $('#em_freelancer_red_dashboard_table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searching: false,
            paginate: false,
            info: false,
            ajax: {
                url: "{{ __('routes.embroidery-freelancer-red-dashboard') }}",
                type: "get",
            },
            order: [
                [2, 'desc']
            ],
            columns: [{
                    data: 'art',
                    name: 'art'
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
                    data: 'project_name',
                    name: 'project_name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
            ],

        })
        $('#em_freelancer_table_reload_btn').click(function() {
            em_freelancer_red_dash_table.ajax.reload();
        })
    })
    $(function() {
        var em_freelancer_blue_dash_table;
        em_freelancer_blue_dash_table = $('#em_freelancer_blue_dashboard_table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searching: false,
            paginate: false,
            info: false,
            ajax: {
                url: "{{ __('routes.embroidery-freelancer-blue-dashboard') }}",
                type: "get",
            },
            order: [
                [2, 'desc']
            ],
            columns: [{
                    data: 'art',
                    name: 'art'
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
                    data: 'project_name',
                    name: 'project_name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'request',
                    name: 'request',
                    orderable: false,
                    searchable: false
                }
            ],

        })
        $('#em_freelancer_table_reload_btn').click(function() {
            em_freelancer_blue_dash_table.ajax.reload();
        })
    })
    $(function() {
        var ve_freelancer_green_dash_table;
        ve_freelancer_green_dash_table = $('#ve_freelancer_green_dashboard_table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searching: false,
            paginate: false,
            info: false,
            ajax: {
                url: "{{ __('routes.vector-freelancer-green-dashboard') }}",
                type: "get",
            },
            order: [
                [2, 'desc']
            ],
            columns: [{
                    data: 'art',
                    name: 'art'
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
                    data: 'project_name',
                    name: 'project_name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
            ],

        })
        $('#ve_freelancer_table_reload_btn').click(function() {
            ve_freelancer_green_dash_table.ajax.reload();
        })
    })
    $(function() {
        var ve_freelancer_yellow_dash_table;
        ve_freelancer_yellow_dash_table = $('#ve_freelancer_yellow_dashboard_table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searching: false,
            paginate: false,
            info: false,
            ajax: {
                url: "{{ __('routes.vector-freelancer-yellow-dashboard') }}",
                type: "get",
            },
            order: [
                [2, 'desc']
            ],
            columns: [{
                    data: 'art',
                    name: 'art'
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
                    data: 'project_name',
                    name: 'project_name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
            ],

        })
        $('#ve_freelancer_table_reload_btn').click(function() {
            ve_freelancer_yellow_dash_table.ajax.reload();
        })
    })
    $(function() {
        var ve_freelancer_red_dash_table;
        ve_freelancer_red_dash_table = $('#ve_freelancer_red_dashboard_table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searching: false,
            paginate: false,
            info: false,
            ajax: {
                url: "{{ __('routes.vector-freelancer-red-dashboard') }}",
                type: "get",
            },
            order: [
                [2, 'desc']
            ],
            columns: [{
                    data: 'art',
                    name: 'art'
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
                    data: 'project_name',
                    name: 'project_name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
            ],

        })
        $('#ve_freelancer_table_reload_btn').click(function() {
            ve_freelancer_red_dash_table.ajax.reload();
        })
    })
    $(function() {
        var ve_freelancer_blue_dash_table;
        ve_freelancer_blue_dash_table = $('#ve_freelancer_blue_dashboard_table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searching: false,
            paginate: false,
            info: false,
            ajax: {
                url: "{{ __('routes.vector-freelancer-blue-dashboard') }}",
                type: "get",
            },
            order: [
                [2, 'desc']
            ],
            columns: [{
                    data: 'art',
                    name: 'art'
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
                    data: 'project_name',
                    name: 'project_name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'request',
                    name: 'request',
                    orderable: false,
                    searchable: false
                }
            ],

        })
        $('#ve_freelancer_table_reload_btn').click(function() {
            ve_freelancer_blue_dash_table.ajax.reload();
        })
    })

    function showAllOrder() {
        console.log("sdf");
        $('#view_order_popup1').trigger('click');
    }

    function freelancerEmbroideryShowAllOrder() {
        $('#em_freelancer_all').trigger('click');
    }

    function freelancerVectorShowAllOrder() {
        $('#ve_freelancer_all').trigger('click');
    }
</script>
