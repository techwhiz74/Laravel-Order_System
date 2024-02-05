@extends('layout.layout')
@section('content')
    <section class="page_section">
        <div class="padding-30">
            <div class="row">
                <div class="col-12">
                    <h1 class="pagetitle">
                    </h1>
                </div>
            </div>

        </div>
        <div class="confirm-popup" id="custom-confirm">
            <h2>Confirm Email Update</h2>
            <p>Are you sure you want to update the email? This will send an invitation email to the edited email address</p>
            <div class="confirm-buttons">
                <button class="confirm-button" id="custom-confirm-yes">Update</button>
                <button class="confirm-button cancel" id="custom-confirm-no">Cancel</button>
            </div>
        </div>
    </section>
@endsection

@push('custom-script')
    <script>
        document.getElementById('profile-form').addEventListener('submit', function(event) {
            const newEmail = document.getElementById('email').value;
            const currentEmail = '{{ $user->email }}';

            if (newEmail !== currentEmail) {
                event.preventDefault();

                const customConfirm = document.getElementById('custom-confirm');
                const confirmYes = document.getElementById('custom-confirm-yes');
                const confirmNo = document.getElementById('custom-confirm-no');

                customConfirm.style.display = 'block';

                confirmYes.addEventListener('click', function() {
                    document.getElementById('confirmed_email_update').value = '1';
                    document.getElementById('profile-form').submit();
                });

                confirmNo.addEventListener('click', function() {
                    customConfirm.style.display = 'none';
                });
            }
        });
        $('.uploadProfileInput_emp').on("change", function() {
            var triggerInput = $(this);
            console.log('dfkgjbds');
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
    </script>
@endpush
