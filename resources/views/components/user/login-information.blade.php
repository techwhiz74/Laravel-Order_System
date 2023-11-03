<section class="login_information_section">
    <div class="pagetitle">
        <h1>{{ __('home.right_top_box_name') }}</h1>
        <p></p>
    </div>
    <div class="order_fome_container">
        @if (auth()->user()->user_type == 'customer')
            <div class="tab-content" style="height: 470px;">
                <div id="addresses" class="tab-pane fade in active" style="height: 100%">
                    <div class="employee-list-container"
                        style="height: 100%; display:flex; flex-direction:column; justify-content:space-between; align-items:start;">
                        <div class="employee-list" style="width: 100%; font-size:13px">
                            <table id="customer_staffs" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="padding-left: 30px;">{{ __('home.lastName') }},
                                            {{ __('home.firstName') }}</th>
                                        <th>{{ __('home.email_address') }}</th>
                                        <th>{{ __('home.created_on') }}</th>
                                        <th style="text-align: center">{{ __('home.edit') }}</th>
                                        <th style="text-align: center">{{ __('home.delete') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="employee-top d-flex" style="align-items:flex-end">
                            <div class="submit_btn" id="customer_staff_create_button" type="button">
                                {{ __('home.add') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

</section>
@include('components.user.create-customer-staff')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var table;
    $(function() {
        table = $('#customer_staffs').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searching: false,
            language: {
                paginate: {
                    next: '<i class="fa-solid fa-chevron-right"></i>', // or '→'
                    previous: '<i class="fa-solid fa-chevron-left"></i>' // or '←'
                }
            },
            ajax: {
                url: "{{ __('routes.employee-staffs-table') }}",
                type: 'get',

            },
            order: [
                [2, 'desc']
            ],
            columns: [{
                    data: 'name',
                    name: 'name',
                },
                {
                    data: 'email',
                    name: 'email',
                },
                {
                    data: 'created_on',
                    name: 'created_on',
                },
                {
                    data: 'edit',
                    name: 'edit',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'delete',
                    name: 'delete',
                    orderable: false,
                    searchable: false
                }
            ]
        })
        $('#customer_staff_create_submit').click(function() {
            setTimeout(() => {
                table.ajax.reload();
            }, 1000);
        })
    });
</script>
