<script>
    $(function() {
        $('#profile_popup1').click(function() {
            $.ajax({
                url: '{{ __('routes.customer-get-profile') }}',
                type: 'get',
                success: (profile) => {
                    $('[name=customer_number]').val(profile.customer_number);
                    $('[name=profile_company]').val(profile.company);
                    $('[name=profile_company_addition]').val(profile
                        .company_addition);
                    $('[name=profile_name]').val(profile.name);
                    $('[name=profile_first_name]').val(profile.first_name);
                    $('[name=profile_street_number]').val(profile.street_number);
                    $('[name=profile_postal_code]').val(profile.postal_code);
                    $('[name=profile_location]').val(profile.location);
                    $('[name=profile_country]').val(profile.country);
                    $('[name=profile_email]').val(profile.email);
                    $('[name=profile_website]').val(profile.website);
                    $('[name=profile_phone]').val(profile.phone);
                    $('[name=profile_mobile]').val(profile.mobile);
                    $('[name=profile_tax_number]').val(profile.tax_number);
                    $('[name=profile_vat_number]').val(profile.vat_number);
                    $('[name=profile_register_number]').val(profile.register_number);
                    $('[name=profile_kd_group]').val(profile.kd_group);
                    $('[name=profile_kd_category]').val(profile.kd_category);
                    $('[name=profile_payment_method]').val(profile.payment_method);
                    $('[name=profile_bank_name]').val(profile.bank_name);
                    $('[name=profile_IBAN]').val(profile.IBAN);
                    $('[name=profile_BIC]').val(profile.BIC);
                },
                error: () => {
                    console.error("error!");
                }
            })
        })
    })
    $(function() {
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
            var confirm = window.confirm('{{ __('home.click_customer_profile_change') }}');
            if (confirm == true) {
                $.ajax({
                    url: '{{ __('routes.customer-profileupdate') }}',
                    type: 'post',
                    contentType: false,
                    processData: false,
                    data: request_profile_data,
                    success: () => {
                        $('#change_profile_success_popup').modal('show');
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
                table.ajax.reload();
            }

        });
    })
</script>
