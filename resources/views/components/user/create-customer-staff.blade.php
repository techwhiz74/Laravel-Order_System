<div class="modal fade" id="customer_staff_create_popup" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgb(244, 244, 244); ">
            <button type="button" class="backbutton" onclick="hideModal()"><i class="fa-solid fa-left-long"
                    style="display: flex;"></i></button>
            <div class="row" style="margin-top: -30px;">
                <div class="col-xl-1"></div>
                <div class="col-12 col-xl-10">
                    <div class="pagetitle" id="staff_popup_title">
                    </div>
                    <form id="add_employee_submit_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="employee_id" value="">
                        <div class="row" style="font-size: 13px; font-family:Inter; margin-bottom:10px;">
                            <div class="col-xs-12 col-sm-12 col-md-12" style="margin: 5px 0;">
                                <div class="form-group">{{ __('home.staff_create_name') }}
                                    <input type="text" id="name" class="form-control" placeholder=""
                                        style="width:100% !important;">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12" style="margin: 5px 0;">
                                <div class="form-group">{{ __('home.staff_create_email') }}
                                    <input type="email" id="email" class="form-control" placeholder=""
                                        style="width:100% !important;">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12" style="margin: 5px 0;">
                                <div class="form-group">{{ __('home.staff_create_password') }}
                                    <input type="password" id="password" class="form-control" placeholder=""
                                        style="width:100% !important;">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12"
                                style="margin: 5px 0; display:flex; justify-content:flex-end;">
                                <button type="submit"
                                    id="customer_staff_create_submit">{{ __('home.staff_create_button') }}</button>
                            </div>
                    </form>
                </div>
                <div class="col-xl-1"></div>
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
    $('#add_employee_submit_form').submit(function(e) {
        e.preventDefault();
        if ($('#employee_id').val() !== '') {
            updateEmployee();
        } else {
            var data = new FormData();
            data.append('name', $('#name').val());
            data.append('email', $('#email').val());
            data.append('password', $('#password').val());
            $confirm = window.confirm('{{ __('home.click_customer_add_employee') }}');
            if ($confirm == true) {
                $.ajax({
                    url: '{{ __('routes.employer-addemployee') }}',
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    data: data,
                    success: (result) => {
                        $('#customer_staffs_reload_button').trigger('click');
                        $('#customer_staff_create_popup').modal('hide');
                        $('#name').val('');
                        $('#email').val('');
                        $('#password').val('');
                        $('#employee_id').val('');
                    },
                    error: (err) => {
                        console.log(err);
                    }
                });
            }

        }
    });

    function editEmployee(id) {
        $('#customer_staff_create_popup').modal('show');
        $('#employee_id').val(id);
        $.ajax({
            url: '{{ __('routes.employer-getemployee') }}' + id,
            type: 'GET',
            success: (result) => {
                $('#staff_popup_title').text("{{ __('home.staff_edit_title') }}")
                $('#name').val(result.name);
                $('#email').val(result.email);
            },
            error: (err) => {
                console.error(err);
            }
        })
    }

    function updateEmployee() {
        $confirm = window.confirm('{{ __('home.click_customer_edit_employee') }}');
        if ($confirm == true) {
            $.ajax({
                url: '{{ __('routes.employer-updateemployee') }}',
                type: 'POST',
                data: {
                    id: $('#employee_id').val(),
                    name: $('#name').val(),
                    email: $('#email').val(),
                    password: $('#password').val()
                },
                success: (result) => {
                    $('#customer_staffs_reload_button').trigger('click');
                    $('#customer_staff_create_popup').modal('hide');
                    $('#employee_id').val('');
                    $('#name').val('');
                    $('#email').val('');
                    $('#password').val('');
                },
                error: (err) => {
                    console.log(err);
                }
            })
        }

    }

    function deleteEmployee(id) {
        var confirm = window.confirm('{{ __('home.staff_delete_confirm') }}');
        if (confirm == true) {
            $.ajax({
                url: '{{ __('routes.employer-deleteemployee') }}' + id,
                type: 'DELETE',
                success: (result) => {
                    $('#customer_staffs_reload_button').trigger('click');
                },
                error: (err) => {
                    console.error(err)
                }
            });
            table.ajax.reload();
        }
    }
</script>
