<div class="modal fade" id="customer_staff_create_popup" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div style="display: flex; justify-content:space-between; width:100% !important">
                    <div style="margin-left: 65px">
                        <h3 style="margin:auto"><strong>Add Staff</strong></h3>
                    </div>
                    <div>
                        <button type="button" class="close" style="font-size: 22px; margin-right:10px"
                            onclick="hideModal()">&times;</button>
                    </div>
                </div>
            </div>
            <div class="modal-body" style="padding: 20px 80px !important;">

                <form id="add_employee_submit_form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="employee_id" value="">
                    <div class="row" style="font-size: 13px; font-family:Inter; margin-bottom:10px;">
                        <div class="col-xs-12 col-sm-12 col-md-12" style="margin: 5px 0;">
                            <div class="form-group">
                                <strong>Staff Name, Vorname:</strong>
                                <input type="text" id="name" class="form-control" placeholder=""
                                    style="width:100% !important;">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12" style="margin: 5px 0;">
                            <div class="form-group">
                                <strong>Staff Email, Address:</strong>
                                <input type="email" id="email" class="form-control" placeholder=""
                                    style="width:100% !important;">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12" style="margin: 5px 0;">
                            <div class="form-group">
                                <strong>Password:</strong>
                                <input type="password" id="password" class="form-control" placeholder=""
                                    style="width:100% !important;">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12" style="margin: 5px 0;">
                            <button type="submit" id="customer_staff_create_submit">Submit</button>
                        </div>
                </form>

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
            $.ajax({
                url: '{{ __('routes.employer-addemployee') }}',
                type: 'POST',
                contentType: false,
                processData: false,
                data: data,
                success: (result) => {
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
    });

    function editEmployee(id) {
        $('#customer_staff_create_popup').modal('show');
        $('#employee_id').val(id);
        $.ajax({
            url: '{{ __('routes.employer-getemployee') }}' + id,
            type: 'GET',
            success: (result) => {
                $('#name').val(result.name);
                $('#email').val(result.email);
            },
            error: (err) => {
                console.error(err);
            }
        })
    }

    function updateEmployee() {
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

    function deleteEmployee(id) {
        var confirm = window.confirm('Are you sure?');
        if (confirm == true) {
            $.ajax({
                url: '{{ __('routes.employer-deleteemployee') }}' + id,
                type: 'DELETE',
                success: (result) => {
                    console.log(result)
                },
                error: (err) => {
                    console.error(err)
                }
            });
            table.ajax.reload();
        }
    }
</script>
