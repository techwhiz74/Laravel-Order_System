@extends('layout.layout')
@section('content')
<style>
    .card {
        background: #e9e9e9;
        border: none;
    }

    /* .card .card-body {
        padding-top: 20px;
        padding-bottom: 20px;
    } */

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
</style>

<section class="page_section">
    <div class="padding-30">
        <form method="POST" action="{{__('routes.customer-profileupdate')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="profile_wrap">
                        <div class="row">
                            <div class="col-12">
                                <div class="pagetitle">
                                    <h1>Profile Management </h1>
                                </div>
                            </div>
                        </div>
                        @if(Session::has('success'))
                        <p class="alert alert-success" style="text-align: center;">
                            {{(Session::get('success'))}}
                        </p>
                        @endif
                        <div class="card">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-4">

                                        <div class="profile-pic-wrapper">
                                            <div class="pic-holder">
                                                <!-- uploaded pic shown here -->
                                                @if($user->image)
                                                <img id="profilePic" class="pic" src="{{$user->image}}">
                                                @else
                                                <img id="profilePic" class="pic" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/340px-Default_pfp.svg.png">
                                                @endif

                                                <input class="uploadProfileInput" type="file" name="image" id="newProfilePhoto" accept="image/*" style="opacity: 0; width:0" />
                                                <label for="newProfilePhoto" class="upload-file-block">
                                                    <div class="text-center">
                                                        <div class="mb-2">
                                                            <i class="fa fa-camera fa-2x"></i>
                                                        </div>
                                                        <div class="text-uppercase">
                                                            Update <br /> Profile Photo
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>

                                            <div class="upload_profile_text">
                                                <p>Update Profile Picture</p>
                                                @if ($errors->has('image'))
                                                <span class="text-danger">{{__('home.requiredMessage')}}<i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-9 col-md-8">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group form_dv_wrap">
                                                    <label class="">{{__('home.fullName')}} <span class="reqiurd">*</span></label>
                                                    <!-- <input type="file" name="image"> -->
                                                    <input type="text" name="name" class="form-control" value="{{@$user->name}}" readonly>
                                                    @if ($errors->has('name'))
                                                    <span class="text-danger">{{__('home.requiredMessage')}}<i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form_dv_wrap">
                                                    <label class="">{{__('home.email')}} <span class="reqiurd">*</span></label>
                                                    <input type="email" name="email" class="form-control" value="{{@$user->email}}" readonly>
                                                    @if ($errors->has('email'))
                                                    <span class="text-danger"> {{__('home.requiredMessage')}} <i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group form_dv_wrap">
                                                    <label class="">{{__('home.contact')}} <span class="reqiurd">*</span></label>
                                                    <input type="number" name="number" class="form-control" value="{{@$user->contact_no}}">
                                                    @if ($errors->has('number'))
                                                    <span class="text-danger">{{__('home.requiredMessage')}}<i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group form_dv_wrap">
                                                    <label>{{ __('embroidery_form.salutation') }} <span class="reqiurd">*</span></label>
                                                    <div class="custom-select">
                                                        <select class="form-control" name="salutation">
                                                            <option value="" selected="selected">{{ __('vector_form.salutation') }}</option>
                                                            <option value="vector_form.mister" {{(@$user->salutation == 'vector_form.mister')? 'selected': '' }}>{{ __('vector_form.mister') }}</option>
                                                            <option value="vector_form.woman" {{(@$user->salutation == 'vector_form.woman')? 'selected': '' }}>{{ __('vector_form.woman') }}</option>
                                                            <option value="vector_form.company" {{(@$user->salutation == 'vector_form.company')? 'selected': '' }}>{{ __('vector_form.company') }}</option>
                                                        </select>
                                                    </div>
                                                    @if ($errors->has('salutation'))
                                                    <span class="text-danger">{{__('home.requiredMessage')}}<i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group form_dv_wrap">
                                                    <label>{{ __('vector_form.company') }} <span class="reqiurd">*</span></label>
                                                    <input type="text" name="company" class="form-control" value="{{@$user->company}}">
                                                    @if ($errors->has('company'))
                                                    <span class="text-danger">{{__('home.requiredMessage')}}<i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group form_dv_wrap">
                                                    <label>{{ __('home.address') }} <span class="reqiurd">*</span></label>
                                                    <input type="text" name="address" class="form-control" value="{{@$user->address}}">
                                                    @if ($errors->has('address'))
                                                    <span class="text-danger">{{__('home.requiredMessage')}}<i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group form_dv_wrap">
                                                    <label>{{ __('home.zip_code') }} <span class="reqiurd">*</span></label>
                                                    <input type="text" name="zip_code" class="form-control" value="{{@$user->zip_code}}">
                                                    @if ($errors->has('zip_code'))
                                                    <span class="text-danger">{{__('home.requiredMessage')}}<i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group form_dv_wrap">
                                                    <label>{{ __('home.place') }} <span class="reqiurd">*</span></label>
                                                    <input type="text" name="place" class="form-control" value="{{@$user->place}}">
                                                    @if ($errors->has('place'))
                                                    <span class="text-danger">{{__('home.requiredMessage')}}<i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group form_dv_wrap">
                                                    <label>{{ __('home.VAT_No') }} <span class="reqiurd">*</span></label>
                                                    <input type="text" name="vat_no" class="form-control" value="{{@$user->vat_no}}">
                                                    @if ($errors->has('vat_no'))
                                                    <span class="text-danger">{{__('home.requiredMessage')}}<i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group form_dv_wrap">
                                                    <label>{{ __('home.website') }} <span class="reqiurd">*</span></label>
                                                    <input type="text" name="site" class="form-control" value="{{@$user->site}}">
                                                    @if ($errors->has('site'))
                                                    <span class="text-danger">{{__('home.requiredMessage')}}<i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group form_dv_wrap">
                                                    <label class="">{{__('home.thread')}} <span class="reqiurd">*</span></label>
                                                    <input type="text" name="thread" class="form-control" value="{{@$user->thread}}">
                                                    @if ($errors->has('thread'))
                                                    <span class="text-danger">{{__('home.requiredMessage')}}<i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group form_dv_wrap">
                                                    <label class="">{{__('home.file_emb')}} <span class="reqiurd">*</span></label>
                                                    <input type="text" name="file_emb" class="form-control" value="{{@$user->emb_fileType}}">
                                                    @if ($errors->has('file_emb'))
                                                    <span class="text-danger">{{__('home.requiredMessage')}}<i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group form_dv_wrap">
                                                    <label class="">{{__('home.file_vect')}} <span class="reqiurd">*</span></label>
                                                    <input type="text" name="file_vect" class="form-control" value="{{@$user->vec_fileType}}">
                                                    @if ($errors->has('file_vect'))
                                                    <span class="text-danger">{{__('home.requiredMessage')}}<i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group form_dv_wrap">
                                                    <label class="">{{__('home.thread_instruction')}} <span class="reqiurd">*</span></label>
                                                    <input type="text" name="thread_instruction" class="form-control" value="{{@$user->thread_notes}}">
                                                    @if ($errors->has('thread_instruction'))
                                                    <span class="text-danger">{{__('home.requiredMessage')}}<i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group form_dv_wrap">
                                                    <label class="">{{__('home.thread_cut')}} <span class="reqiurd">*</span></label>
                                                    <input type="text" name="thread_cut" class="form-control" value="{{@$user->thread_cut_notes}}">
                                                    @if ($errors->has('thread_cut'))
                                                    <span class="text-danger">{{__('home.requiredMessage')}}<i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group form_dv_wrap">
                                                    <label class="">{{__('home.needle_instruction')}} <span class="reqiurd">*</span></label>
                                                    <input type="text" name="needle_instruction" class="form-control" value="{{@$user->needle_notes}}">
                                                    @if ($errors->has('needle_instruction'))
                                                    <span class="text-danger">{{__('home.requiredMessage')}}<i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group form_dv_wrap">
                                                    <label class="">{{__('home.font_instruction')}} <span class="reqiurd">*</span></label>
                                                    <input type="text" name="font_instruction" class="form-control" value="{{@$user->font_notes}}">
                                                    @if ($errors->has('font_instruction'))
                                                    <span class="text-danger">{{__('home.requiredMessage')}}<i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group form_dv_wrap">
                                                    <label class="">{{__('home.special_instruction')}} <span class="reqiurd">*</span></label>
                                                    <input type="text" name="special_instruction" class="form-control" value="{{@$user->special_notes}}">
                                                    @if ($errors->has('special_instruction'))
                                                    <span class="text-danger">{{__('home.requiredMessage')}}<i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        @if(auth()->user()->user_type == 'customer')
                                        <div class="row">
                                            <div class="employee-list-container mt-4">
                                                <div class="employee-top d-flex justify-content-between">
                                                    <div class="employee-title">
                                                        Employee List
                                                    </div>
                                                    <div class=" submit_btn">
                                                        <a href="#invite-employee" data-bs-toggle="modal" style="background: #c4ae79 !important; color: #fff !important; border: 0; border-radius: 0; font-size: 16px; padding: 10px 15px;" class="btn">Invite Employees </a>
                                                    </div>
                                                </div>
                                                <div class="employee-list">
                                                    <table id="list-employees" class="table table-striped" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>S.no</th>
                                                                <th>Employee Email</th>
                                                                <th>Customer</th>
                                                                <th>Created at</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if($employees->isEmpty())
                                                            <tr>
                                                                <td colspan="5" class="text-center">No Employee found.</td>
                                                            </tr>
                                                            @else
                                                                @foreach($employees as $d)
                                                                <tr>
                                                                    <td>{{$loop->iteration}}</td>
                                                                    <td>{{$d->email}}</td>
                                                                    <td>{{auth()->user()->name}}</td>
                                                                    <td>{{date('d M, Y', strtotime($d->created_at))}}</td>
                                                                    <td>
                                                                        <div class="d-flex" style="gap:20px;">
                                                                            <div>
                                                                                <a href='{{ __("routes.employer-editemployee") . $d->id }}'><i class="fa-solid fa-pen-to-square text-primary"></i></a>
                                                                            </div>
                                                                            <div><span><i class="fa-solid fa-trash text-danger" onclick="deleteemployee({{$d->id}})" style="cursor:pointer;"></i></span></div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-12 ">
                    <div class="upload_btn">
                        @if(@auth()->user()->user_type=="customer")
                        <button class="btn btn-primary btn-block" type="submit">Upload</button>
                        @endif
                    </div>
                </div>
            </div>
        </form>
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
                        <form method="POST" id="inviteEmployee" auto-complete="off" action="#" onsubmit="return false;">
                            @csrf
                            <div class="form_dv">
                                <span id="ajax-msg"></span>
                                <input type="email" placeholder="Email*" name="email" class="employee-email" required>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}<i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                @endif
                            </div>

                            <div class="submit_btn">
                                <button type="button" id="loading" class="btnsend-btn" style="display:none;padding: 8px 20px 2px;">
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
    $(function(){
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
            url: "{{__('routes.employer-deleteemployee')}}" + userid,
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
        if(email){
            $.ajax({
                type:'POST',
                url: "{{__('routes.send-invite')}}",
                beforeSend: function() {
                    $('#invite-btn').hide();
                    $("#loading").show();
                },
                complete: function() {
                    $('#invite-btn').show();
                    $("#loading").hide();
                },
                data:{
                    email: email
                },
                success:function(response){
                    if(response.success == true){
                        $('#ajax-msg').text(response.message);
                        $('#ajax-msg').addClass('text-success');
                        setTimeout(function(){
                            location.reload();
                        }, 2000)
                    }else{
                        $('#ajax-msg').text('Something went wrong.');
                        $('#ajax-msg').addClass('text-danger');
                    }
                },
                error:function(response){
                    $('#ajax-msg').text('Something went wrong.');
                    $('#ajax-msg').addClass('text-danger');
                }
            })
        }else{
            $('#ajax-msg').text('Please fill the email.');
            $('#ajax-msg').addClass('text-danger');
        }
    }

</script>
@endpush
