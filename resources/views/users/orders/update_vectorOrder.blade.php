@extends('layout.layout')
@section('content')
<style>
    * {
        box-sizing: border-box;
    }

    body {
        background-color: #fff;
    }

    .error {
        display: none;
        background-color: #fdd;
        padding: 5px;
        color: #ff0101;
        width: 257px;
        margin-top: 10px;
        border: #f03232 2px solid;
    }


    /* Show error messages when the corresponding input field has the "invalid" class */
    .form-group input.invalid+.error,
    .form-group select.invalid+.error,
    .form-group textarea.invalid+.error {
        display: block;
    }



    .fa-exclamation-circle {
        float: right;
    }

    #vectorOrder {
        background-color: #e9e9e9;
        padding: 30px 20px 1px;
        width: 100%;
        border-left: 55px solid #c4ae79;
    }

    h1 {
        text-align: center;
    }

    input {
        padding: 10px;
        width: 100%;
        font-size: 17px;
        border: 1px solid #aaaaaa;
    }

    /* Mark input boxes that gets an error on validation: */
    /* input.invalid {
        background-color: #ffdddd;
    } */
    input.invalid {
        /* background-color: #ffdddd; */
        border: #f03232 2px solid;
    }

    select.invalid {
        /* background-color: #ffdddd; */
        border: #f03232 2px solid;
    }

    textarea.invalid {
        /* background-color: #ffdddd; */
        border: #f03232 2px solid;
    }

    /* Hide all steps by default: */
    .tab {
        display: none;
    }

    button {
        background-color: #04AA6D;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        font-size: 17px;
        cursor: pointer;
    }

    button:hover {
        opacity: 0.8;
    }

    #prevBtn {
        background-color: #bbbbbb;
    }

    /* Make circles that indicate the steps of the form: */
    .multi-step-nav .step {
        height: 12px;
        width: 12px;
        margin: 0 2px;
        background-color: rgb(196, 174, 121, 0.4);
        border: none;
        border-radius: 50%;
        display: inline-block;
    }

    .multi-step-nav .step.active {
        opacity: 1;
        background-color: rgb(196, 174, 121);
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
        background-color: rgb(196, 174, 121);
    }

    .tab label {
        display: block;
        margin-bottom: 10px;
        font-family: "Inter", "Helvetica", monospace;
        font-weight: 400 !important;
        font-size: 16.8px !important;
        color: #060617;

    }

    #vectorOrder p {
        margin-bottom: 10px;
    }

    #vectorOrder h5 {
        font-size: 25px;
        font-weight: 400;
        margin-bottom: 20px;
    }

    .custom-select {
        position: relative;
    }

    .custom-select select {
        padding-right: 20px;
    }

    .custom-select:before {
        content: "";
        display: block;
        width: 8px;
        height: 8px;
        border-top: 2px solid #888;
        border-left: 2px solid #888;
        transform: rotate(225deg);
        position: absolute;
        top: 14px;
        right: 13px;
    }

    .form-control {
        min-height: 36px;
        font-family: "Inter", "Helvetica", monospace;
        border: none !important;
        border-radius: 0 !important;
    }

    .form-control:focus {
        box-shadow: none;
        border: 1px solid #ced4da;
    }

    .invalid {
        border: 1px solid #f03232 !important;
        background-color: #fff;
    }

    #vectorOrder p {
        margin-bottom: 10px;
    }

    #vectorOrder textarea {
        min-height: 150px;
    }

    .error {
        background-color: transparent;
        border:0;
        width: auto;
        padding: 0 5px 0 2px;
        margin-top: 0;
    }

    .error .fa {
        float: left;
        margin-top: 4px;
        margin-right: 6px;
    }

    button#nextBtn, button#prevBtn {
        background-color: #c4ae79!important;
        color: #fff;
        font-family: "Inter", "Helvetica", monospace;
        margin-top: 10px;
    }

    button#prevBtn {
        margin-right: 10px;
    }

    .multi-step-nav {
        text-align: center;
        margin-top: 20px;
        padding-bottom: 30px;
    }

    .custom-radio label {
        padding: 0 10px;
    }

    button#add-file-btn {
        background-color: #c4ae79!important;
        color: #fff;
        font-family: "Inter", "Helvetica", monospace;
        border: 0;
        width: auto;
        margin-left: auto !important;
        margin-right: 14px !important;
    }

    button#add-file-btn:focus {
        outline: none;
        box-shadow: none;
    }

    .send-btn {
        background-color: #c4ae79!important;
        color: #fff !important;
        font-family: "Inter", "Helvetica", monospace;
        border: 0;
        text-transform: capitalize;
        width: 100%;
        max-width: 150px;
        margin: 47px auto 0;
        display: block;
        font-weight: 400 !important;
    }

    .send-btn:focus {
        outline: none;
        box-shadow: none;
    }

    @media (max-width: 767px) {
        #vectorOrder {
            border-left: 10px solid #c4ae79;
        }

    }

    .custom-file-input {
            position: relative;
            overflow: hidden;
        }

        .custom-file-input input[type="file"] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }

        /* Style the browse button and file name display */
        .custom-file-input::before {
            content: 'Choose a file'; /* Default browse button text */
            display: inline-block;
            background: black;
            color: white;
            border: 1px solid black;
            padding: 8px 20px;
            outline: none;
            white-space: nowrap;
            -webkit-user-select: none;
            cursor: pointer;
            text-align: center;
            font-size: 14px;

        }

        .custom-file-input:hover::before {
            background-color: grey;
            border-color: grey;
        }

        .custom-file-input[data-placeholder]::before {
            content: attr(data-placeholder);
        }
    /* label{
font-weight: 600;
color:gray;
} */

.filesname{
    padding: 10px 10px 10px 10px;
background-color: #9090903d;
border-radius: 4px;
font-weight: bold;
color: #6f6868;
}

.addrsname, .filesname {
        padding: 10px;
        background-color: #c4ae79;
        border-radius: 4px;
        font-weight: bold;
        margin-top: 10px;
        display: inline-block;
        color: #fff;
        font-weight:400;
    }
</style>
@if(Session::has('message'))
<p class="alert alert-info" style="text-align: center;">
    {{(Session::get('message'))}}
</p>
@endif
<section>
    <div class="padding-30">
        <form id="vectorOrder" action="" enctype="multipart/form-data">
            <!-- One "tab" for each step in the form: -->
            @foreach($ordersDetails as $data)
            <!-- ------------------------initial Order details --------------------------- -->
            <div class="tab">
                <div class="vector_heading">
                    <h1>Order Vectorization Service</h1>
                </div>
                <input type="hidden" value="{{$data->id}}" name='id'>
                <label>{{ __('vector_form.program_selection') }}</label>
                <div class="custom-select">
                    <p class="form-group">
                        <select class="form-control" name="selection">
                            <option value="{{$data->selection}}" selected>{{__($data->selection)}}</option>
                            <option value="vector_form.VectorFile_graphics">{{ __('vector_form.VectorFile_graphics') }}</option>
                            <option value="vector_form.VectorFile_images">{{ __('vector_form.VectorFile_images') }}</option>
                            <option value="vector_form.File_Release">{{ __('vector_form.File_Release') }}</option>
                        </select>
                        <span class="error" id="prog_select_error">Please select at least one option .<i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                    </p>
                </div>

                <label>{{ __('vector_form.delievery_time') }}</label>
                <div class="custom-select">
                    <p class="form-group">
                        <select class="form-control" name="delivery_time">
                            <option value="{{$data->delivery_time}}" selected>{{$data->delivery_time}}</option>
                            <option value="default">default</option>
                            <option value="express">Express</option>
                        </select>
                        <span class="error" id="delivery_time_error">Please select delivery time.<i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                    </p>
                </div>

                <label>{{ __('vector_form.project_name') }}</label>
                <p class="form-group"><input type="text" name="project_name" class="form-control" value="{{$data->project_name}}">
                    <span class="error" id="p_name_error">Please enter project name<i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                </p>

                <label>{{ __('vector_form.instructions') }}</label>
                <p class="form-group"><textarea name="instructions" class="form-control">{{$data->instructions}}</textarea>
                    <span class="error" id="instruction_error">Please enter any special instructions for this order.<i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                </p>

            </div>

            <!-- ------------------------Order address details--------------------------- -->
            <div class="tab">
                <div class="vector_heading">
                    <h1>Order Address:</h1>
                </div>

                <label>{{ __('embroidery_form.salutation') }}</label>
                <div class="custom-select">
                    <p class="form-group">
                        <select class="form-control" name="Salutation">
                            <option value="{{$data->Order_address->salutation}}" selected="selected">{{__($data->Order_address->salutation)}}</option>
                            <option value="vector_form.mister">{{ __('vector_form.mister') }}</option>
                            <option value="vector_form.woman">{{ __('vector_form.woman') }}</option>
                            <option value="vector_form.company">{{ __('vector_form.company') }}</option>
                        </select>
                        <span class="error" id="salutation_error">Please select salutation <i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                    </p>
                </div>

                <label>{{ __('vector_form.company') }}</label>
                <p class="form-group"><input type="text" name="company" class="form-control" value="{{$data->Order_address->company}}">
                    <span class="error" id="company_error">Please enter company name <i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                </p>

                <label>{{ __('vector_form.name') }}</label>
                <p class="form-group"><input type="text" name="full_name" class="form-control" value="{{$data->Order_address->full_name}}">
                    <span class="error" id="name_error">Please enter your name <i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                </p>

                <label>{{ __('vector_form.address') }}</label>
                <p class="form-group"><input type="text" name="address" class="form-control" value="{{$data->Order_address->address}}">
                    <span class="error" id="address_error">Please enter your address <i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                </p>

                <div class="row">
                    <div class="col-6 col-md-3">
                        <label>{{ __('vector_form.zip_code') }}</label>
                        <p class="form-group"><input type="text" name="zip_code" class="form-control" value="{{$data->Order_address->zip_code}}">
                            <span class="error" id="zip_error">Please enter zip code <i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                        </p>
                    </div>

                    <div class="col-6 col-md-9">
                        <label>{{ __('vector_form.place') }}</label>
                        <p class="form-group"> <input type="text" name="place" class="form-control" value="{{$data->Order_address->place}}">
                            <span class="error" id="place_error">Please enter place <i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                        </p>
                    </div>

                </div>
                <label>{{ __('vector_form.VAT_No') }}</label>
                <p class="form-group"><input type="text" name="vat_no" class="form-control" value="{{$data->Order_address->vat_no}}">
                    <span class="error" id="vat_no_error">Please enter VAT. no.<i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                </p>

                <label>{{ __('vector_form.contact') }}</label>
                <p class="form-group"><input type="text" name="contact_no" class="form-control" value="{{$data->Order_address->contact_no}}">
                    <span class="error" id="contact_error">Please enter your contact no.<i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                </p>

                <label>{{ __('vector_form.email') }}</label>
                <p class="form-group"><input type="email" name="email" class="form-control" value="{{$data->Order_address->email}}">
                    <span class="error" id="email_error">Please enter email address.<i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                </p>

                <label>{{ __('vector_form.website') }}</label>
                <p class="form-group"><input type="text" name="site" class="form-control" value="{{$data->Order_address->site}}">
                    <span class="error" id="site_error">Please enter site.<i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                </p>

                <label>{{ __('vector_form.business_reg_file') }}</label>
                <p class="form-group"><input type="file" name="address_file" class="form-control" id="address_file" value="{{$data->Order_address->address_file}}" style="margin-bottom: 12px;">
                    <span id="file-name" class="addrsname">{{Helper::fileName($data->Order_address->address_file)}}</span>
                <span class="error" id="address_file_error">Please upload file.<i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                </p>
            </div>


            <!-- ---------------Order File Format Details------------------- -->
            <div class="tab">
                <div class="vector_heading">
                    <h1>Order File Format</h1>
                </div>
                <label>{{__('vector_form.file_format')}}</label>
                <div class="custom-select">
                    <p class="form-group">
                        <select class="form-control" name="file_format">
                            <option value="{{$data->Orderfile_formats->file_format}}" selected>{{$data->Orderfile_formats->file_format}}</option>
                            <option value=".10O">*.10O</option>
                            <option value=".art">*.art</option>
                            <option value=".bx">*.bx</option>
                            <option value=".cnd">*.cnd</option>
                            <option value=".csd">*.csd</option>
                            <option value=".dat">*.date</option>
                            <option value=".dsb">*.dsb</option>
                            <option value=".dst">*.dst</option>
                            <option value=".dsz">*.dsz</option>
                            <option value=".emb">*.emb</option>
                            <option value=".emt">*.emt</option>
                            <option value=".esl">*.esl</option>
                            <option value=".ess">*.ess</option>
                            <option value=".exp">*.exp</option>
                            <option value=".fdr">*.fdr</option>
                            <option value=".fmc">*.fmc</option>
                            <option value=".hus">*.hus</option>
                            <option value=".inb">*.inb</option>
                            <option value=".jan">*.Jan</option>
                            <option value=".jef">*.jef</option>
                            <option value=".ksm">*.ksm</option>
                            <option value=".mjd">*.mjd</option>
                            <option value=".mst">*.mst</option>
                            <option value=".pcd">*.pcd</option>
                            <option value=".pcm">*.pcm</option>
                            <option value=".pcq">*.pcq</option>
                            <option value=".pcs">*.pcs</option>
                            <option value=".pec">*.pec</option>
                            <option value=".pes">*.pes</option>
                            <option value=".sas">*.sas</option>
                            <option value=".sew">*.sew</option>
                            <option value=".shv">*.shv</option>
                            <option value=".t01">*.t01</option>
                            <option value=".t03">*.t03</option>
                            <option value=".t04">*.t04</option>
                            <option value=".t05">*.t05</option>
                            <option value=".t09">*.t09</option>
                            <option value=".t10">*.t10</option>
                            <option value=".t15">*.t15</option>
                            <option value=".tap">*.tap</option>
                            <option value=".tbf">*.tbf</option>
                            <option value=".u">*.u??</option>
                            <option value=".vep">*.vep</option>
                            <option value=".vip">*.vip</option>
                            <option value=".vip3">*.vip3</option>
                            <option value=".vp3">*.vp3</option>
                            <option value=".xxx">*.xxx</option>
                            <option value=".yng">*.yng</option>
                            <option value=".z">*.z??</option>
                        </select>
                        <span class="error" id="f_format_error">Please select desired file format.<i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                    </p>
                </div>

                <label>{{__('vector_form.view_file')}}</label>
                <div class="custom-select">
                    <p class="form-group">
                        <select class="form-control" name="view_file_format">
                            <option value="{{$data->Orderfile_formats->view_file_format}}" selected="selected">{{$data->Orderfile_formats->view_file_format}}</option>
                            <option value=".pdf">*.pdf</option>
                        </select>
                        <span class="error" id="v_format_error">Please select desired view file format .<i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                    </p>
                </div>

            </div>

            <!-- ---------------Order File Upload Details------------------- -->
            <div class="tab">
                <div class="vector_heading">
                    <h1>Order File Upload:</h1>
                </div>
                <div class="row">
                    <label class="col-10">{{__('vector_form.file_upload')}}</label>
                    <button type="button" id="add-file-btn" class="btn btn-outline-success col-2" style="margin:-10px 0px 13px 0px">Additional file</button>
                </div>
                <p class="form-group" id="file-container" style="display: flex; flex-direction:column; gap:18px">
                    <input type="file" name="file_upload[]" class="form-control " multiple id="file_upload" {{@$data->Orderfile_uploads->file_upload}}>


                    <div id="uploadfile-name" >
                        @foreach($uploadFiles as $index => $files)

                        <span class="filesname">{{Helper::fileName($files)}} <i class="fa fa-close deleteButton" data-filename="{{$files}}" data-index="{{$index}}" data-id="{{$data->id}}" ></i></span>
                        @endforeach</div>

                    <span class="error" id="file_upload_error">Please upload file .<i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                </p>

                <a href="#" id="loading" class="btn btn-outline-primary send-btn loading-btn" style="display:none;border-color: #54b4d3;color: #54b4d3;margin-top: 10px;font-weight: bold;">
                <span class="loader"></span>
                </a>
                <input type="submit" value="Update" id="send-btn" class="btn btn-outline-primary send-btn" style="border-color: #54b4d3;color: #54b4d3;margin-top: 10px;font-weight: bold;">
            </div>
            @endforeach
            <div style="overflow:auto;">
                <div style="float:right;">
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                </div>
                <!-- Circles which indicates the steps of the form: -->
                <div class="multi-step-nav">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                </div>
        </form>
    </div>
</section>
</div>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("prevBtn").style.display = "none";
            document.getElementById("nextBtn").style.display = "none";
        } else {
            // document.getElementById("nextBtn").innerHTML = "Next";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
            // ... the form gets submitted:
            document.getElementById("vectorOrder").submit();
            return false;
        }

        showTab(currentTab);
    }


    $(document).ready(function() {
        $('.deleteButton').click(function() {
            var index = $(this).data('index');
            var order_id= $(this).data('id');
            var spanElement = $(this).closest('.filesname');
            var token = "{{ csrf_token() }}";

            $.ajax({
                url: "{{__('routes.delete-vectorFiles')}}",
                type: "POST",
                data: {
                    _token: token,
                    index: index,
                    id:order_id
                },
                success: function(response) {

                    spanElement.remove();
                },
                error: function(response) {
                    console.log('Error:', response);
                }
            });
        });
    });

    $('#address_file').on('change', function(event) {
    var imageFile = this.files[0];
    var imageURL = window.URL.createObjectURL(imageFile);
    var imageName = imageFile.name; // Get the name of the image file

    $("#file-name").html("<span>"+imageName+"</span>");
  });

    function validateForm() {

         var valid= true;
        if (valid) {
            // this.classList.remove('invalid');
            // error.style.display = 'none';
            document.getElementsByClassName("step")[currentTab].classList.add("finish");
        }
        return valid;
    }


    document.addEventListener('DOMContentLoaded', function() {
    const addFileBtn = document.getElementById('add-file-btn');
    const fileContainer = document.getElementById('file-container');
    const selectedFilesDiv = document.getElementById('uploadfile-name');

    function addFileInput() {
        const newInputFile = document.createElement('input');
        newInputFile.type = 'file';
        newInputFile.name = 'file_upload[]';
        newInputFile.className = 'form-control';
        newInputFile.addEventListener('change', handleFileChange);

        fileContainer.appendChild(newInputFile);
    }

    function handleFileChange(event) {
        const newInputFile = event.target;
        const newfiles = newInputFile.files;
        const selectedNewFilenames = Array.from(newfiles).map(file => file.name);

        for (const file of selectedNewFilenames) {
            const fileDiv = document.createElement('span');
            fileDiv.innerHTML = `
                <span class="filesname">${file}</span>
            `;

            selectedFilesDiv.appendChild(fileDiv);
        }
    }

    addFileBtn.addEventListener('click', addFileInput);
    const existingInputFiles = document.querySelectorAll('#file_upload');
    existingInputFiles.forEach(input => input.addEventListener('change', handleFileChange));
});



    function fixStepIndicator(n) {

        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }

        x[n].className += " active";
    }

    const form = document.getElementById('vectorOrder');


    form.addEventListener('submit', function(event) {

        event.preventDefault();
        const formData = new FormData(form);
        $.ajax({
                url: "{{__('routes.update-vectorOrder')}}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function(){
                    $('#send-btn').hide();
                    $(".loading-btn").show();
                },
                complete: function(){
                    $('#send-btn').show();
                    $(".loading-btn").hide();
                },
                success:function(response){
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message,
                        timer: 8000,
                    }).then(() => {

                        location.reload();
                    });
                },
                error:function(error){
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Something went wrong.',
                        timer: 8000,
                    })
                }

            });
    });
</script>

@endsection
