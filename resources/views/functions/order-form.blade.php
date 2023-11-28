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
        //checkbox fileds in select products
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
        $('.parameter-select-items-vector input[type=checkbox]').change(function() {
            parameters = [];
            $('.parameter-select-items-vector').find('input[type=checkbox]:checked').each(function() {
                parameters.push($(this).val());
            });
            parameters = parameters.concat(inputValues);
            $('#selected_ve_parameter8').text(parameters.join(', '));
        });
        $('.parameter-select-items-image input[type=checkbox]').change(function() {
            parameters = [];
            $('.parameter-select-items-image').find('input[type=checkbox]:checked').each(function() {
                parameters.push($(this).val());
            });
            parameters = parameters.concat(inputValues);
            $('#selected_ve_parameter9').text(parameters.join(', '));
        });
        $('.parameter-select-items-file input[type=checkbox]').change(function() {
            parameters = [];
            $('.parameter-select-items-file').find('input[type=checkbox]:checked').each(function() {
                parameters.push($(this).val());
            });
            parameters = parameters.concat(inputValues);
            $('#selected_em_parameter3').text(parameters.join(', '));
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
        $('.product-multiselect.dropdown-toggle').click(function() {
            if ($('.product-item-menu').css("display") === "none") {
                $('.product-item-menu').show();
            } else if ($('.product-item-menu').css("display") === "block") {
                $('.product-item-menu').hide();
            }
        });
        $('.product-multiselect8.dropdown-toggle').click(function() {
            if ($('.product-item-menu8').css("display") === "none") {
                $('.product-item-menu8').show();
            } else if ($('.product-item-menu8').css("display") === "block") {
                $('.product-item-menu8').hide();
            }
        });
        $('.product-multiselect9.dropdown-toggle').click(function() {
            if ($('.product-item-menu9').css("display") === "none") {
                $('.product-item-menu9').show();
            } else if ($('.product-item-menu9').css("display") === "block") {
                $('.product-item-menu9').hide();
            }
        });
        $('.product-multiselect3.dropdown-toggle').click(function() {
            if ($('.product-item-menu3').css("display") === "none") {
                $('.product-item-menu3').show();
            } else if ($('.product-item-menu3').css("display") === "block") {
                $('.product-item-menu3').hide();
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
            var container8 = $('.product-item-menu8');
            // Check if the clicked element is outside the modal
            if (!container8.is(event.target) &&
                container8.has(event.target).length === 0 &&
                $('.product-item-menu8').css("display") === "block") {
                // Hide the modal
                container8.hide();
            }
            var container9 = $('.product-item-menu9');
            // Check if the clicked element is outside the modal
            if (!container9.is(event.target) &&
                container9.has(event.target).length === 0 &&
                $('.product-item-menu9').css("display") === "block") {
                // Hide the modal
                container9.hide();
            }
            var container3 = $('.product-item-menu3');
            // Check if the clicked element is outside the modal
            if (!container3.is(event.target) &&
                container3.has(event.target).length === 0 &&
                $('.product-item-menu3').css("display") === "block") {
                // Hide the modal
                container3.hide();
            }
        });
        //cancel button in muti select dropdown
        $('#close_project_menu').click(function() {
            $('.product-item-menu').hide();
        })
        $('#order_submit_form').submit(function(e) {
            e.preventDefault();
            $('.product-items-menu').show();
        });
        $('#admin_order_submit_form').submit(function(e) {
            e.preventDefault();
            $('.product-items-menu').show();
        });


        //order form submit button
        $('.order_form_submit').click(function(e) {
            e.preventDefault();
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
    })
</script>
