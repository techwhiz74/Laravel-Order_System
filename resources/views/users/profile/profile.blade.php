@extends('layout.layout')
@section('content')

    <section class="page_section">
        <div class="padding-30">

        </div>
    </section>

    <div class="modal fade" id="invite-employee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Invite Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="invite-employee">
                            <form method="POST" id="inviteEmployee" auto-complete="off" action="#"
                                onsubmit="return false;">
                                @csrf
                                <div class="form_dv">
                                    <span id="ajax-msg"></span>
                                    <input type="email" placeholder="Email*" name="email" class="employee-email"
                                        required>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}<i
                                                class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                    @endif
                                </div>

                                <div class="submit_btn">
                                    <button type="button" id="loading" class="btnsend-btn"
                                        style="display:none;padding: 8px 20px 2px;">
                                        <span class="loader"></span>
                                    </button>
                                    <button type="button" id="invite-btn" onclick="inviteEmp()">Invite</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-script')
    <script>
        $(function() {
            let table = $('#list-employees').DataTable({
                language: {
                    paginate: {
                        next: '<i class="fa-solid fa-chevron-right"></i>', // or '→'
                        previous: '<i class="fa-solid fa-chevron-left"></i>' // or '←'
                    }
                },
            });
        })

        function deleteemployee(e) {
            const employerid = e;
            Swal.fire({
                title: 'Delete Employee?',
                text: 'Are you sure you want to delete this employee?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteajax(employerid);
                    window.location.reload();
                } else {
                    Swal.fire('Cancelled', 'The deletion has been cancelled.', 'info');
                }
            });
        }

        function deleteajax(e) {
            const userid = e;
            $.ajax({
                type: 'POST',
                url: "{{ __('routes.employer-deleteemployee') }}" + userid,
                success: function(success) {
                    Swal.fire('Deleted!', 'The employee has been deleted.', 'success');
                },
                error: function(error) {
                    console.error(error);
                    Swal.fire('Error', 'An error occurred while deleting the employee.', 'error');
                }
            });
        }

        function inviteEmp() {
            $('#ajax-msg').empty();
            $('#ajax-msg').removeClass('text-danger');
            $('#ajax-msg').removeClass('text-success');
            var email = $('.employee-email').val();
            console.log(email);
            if (email) {
                $.ajax({
                    type: 'POST',
                    url: "{{ __('routes.send-invite') }}",
                    beforeSend: function() {
                        $('#invite-btn').hide();
                        $("#loading").show();
                    },
                    complete: function() {
                        $('#invite-btn').show();
                        $("#loading").hide();
                    },
                    data: {
                        email: email
                    },
                    success: function(response) {
                        if (response.success == true) {
                            $('#ajax-msg').text(response.message);
                            $('#ajax-msg').addClass('text-success');
                            setTimeout(function() {
                                location.reload();
                            }, 2000)
                        } else {
                            $('#ajax-msg').text('Something went wrong.');
                            $('#ajax-msg').addClass('text-danger');
                        }
                    },
                    error: function(response) {
                        $('#ajax-msg').text('Something went wrong.');
                        $('#ajax-msg').addClass('text-danger');
                    }
                })
            } else {
                $('#ajax-msg').text('Please fill the email.');
                $('#ajax-msg').addClass('text-danger');
            }
        }
    </script>
@endpush
