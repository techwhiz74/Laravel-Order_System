<div class="modal fade" id="admin_customer_parameters_em_popup" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true" style="overflow-y: hidden;">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgb(244, 244, 244)">
            <button type="button" class="backbutton" style="margin: 20px 0 0 20px;" onclick="hideModal()"><i
                    class="fa-solid fa-left-long" style="display: flex;"></i></button>
            <div style="padding: 0 12vw">
                <div class="pagetitle" style="margin-top: 0 !important;">
                    <h1>{{ __('home.customer_em_parameters') }}</h1>
                    <p></p>
                </div>
                <div style="padding: 20px 10vw;">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <fieldset class="field-group row">
                                <legend class="field-caption">
                                    {{ __('home.embroidery_file_information') }}</legend>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group form_flex">
                                        <div class="col-3">
                                            <label>{{ __('home.yarn_information') }}
                                            </label>
                                        </div>
                                        <div class="col-9">
                                            <select name="admin_parameter_yarn_information" class="selectbox-control">
                                                <option value=""></option>
                                                <option value="Madeira 40 / 60 PolyNeon">Madeira 40 / 60 PolyNeon
                                                </option>
                                                <option value="Madeira Classic">Madeira Classic</option>
                                                <option value="Madeira Frosted">Madeira Frosted</option>
                                                <option value="Gunold Poly40">Gunold Poly40</option>
                                                <option value="Isacord Amann 40">Isacord Amann 40</option>
                                                <option value="Brildor">Brildor</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group form_flex">
                                        <div class="col-3">
                                            <label>{{ __('home.need_embroidery_files') }}
                                            </label>
                                        </div>
                                        <div class="col-9">
                                            <div class="dropdown">
                                                <div class="product-multiselect3 dropdown-toggle">
                                                    <div id="selected_em_parameter3">
                                                    </div>
                                                </div>
                                                <div class="product-item-menu3">
                                                    <div class="row parameter-select-items-file"
                                                        style="font-size: 13px;">
                                                        <div>
                                                            <input type="checkbox" value="Tajima (*.DST)" />Tajima
                                                            (*.DST)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox" value="Tajima (*.TBF)" />Tajima
                                                            (*.TBF)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox"
                                                                value="Tajima Barudan (*.DSB)" />Tajima Barudan (*.DSB)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox" value="Tajima (*.T01)" />Tajima
                                                            (*.T01)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox" value="Tajima ZSK (*.DSZ)" />Tajima
                                                            ZSK (*.DSZ)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox"
                                                                value="Barudan FDR-3 (*.U??)" />Barudan FDR-3 (*.U??)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox" value="Barudan (*.U??)" />Barudan
                                                            (*.U??)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox" value="Barudan (*.T03)" />Barudan
                                                            (*.T03)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox" value="Happy (*.TAP)" />Happy (*.TAP)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox" value="ZSK TC (*.Z00)" />ZSK TC
                                                            (*.Z00)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox" value="ZSK TC (*.Z01)" />ZSK TC
                                                            (*.Z01)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox" value="ZSK (*.T05)" />ZSK (*.T05)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox" value="Melco (*.EXP)" />Melco (*.EXP)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox" value="Melco (*.CND)" />Melco (*.CND)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox"
                                                                value="Brother/Babylock/Deco (*.PES)" />Brother/Babylock/Deco
                                                            (*.PES)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox"
                                                                value="Brother/Babylock/Deco (*.PEC)" />Brother/Babylock/Deco
                                                            (*.PEC)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox" value="Toyota (*.10O)" />Toyota
                                                            (*.10O)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox" value="Pfaff (*.KSM)" />Pfaff (*.KSM)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox" value="Pfaff (*.T09)" />Pfaff (*.T09)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox" value="Pfaff (*.PCS)" />Pfaff (*.PCS)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox" value="Pfaff (*.PCD)" />Pfaff (*.PCD)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox" value="Pfaff (*.PCQ)" />Pfaff (*.PCQ)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox" value="Singer (*.XXX)" />Singer
                                                            (*.XXX)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox"
                                                                value="Janome/Elna/Kenmore (*.JEF)" />Janome/Elna/Kenmore
                                                            (*.JEF)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox"
                                                                value="Janome/Elna (*.JPX)" />Janome/Elna (*.JPX)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox"
                                                                value="Janome/Elna/Kenmore (*.SEW)" />Janome/Elna/Kenmore
                                                            (*.SEW)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox"
                                                                value="Husqvarna/Viking/Pfaff (*.VP3)" />Husqvarna/Viking/Pfaff
                                                            (*.VP3)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox"
                                                                value="Husqvarna/Viking/Pfaff (*.SHV)" />Husqvarna/Viking/Pfaff
                                                            (*.SHV)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox"
                                                                value="Husqvarna/Viking/Pfaff (*.HUS)" />Husqvarna/Viking/Pfaff
                                                            (*.HUS)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox" value="Bits & Volts (*.BRO)" />Bits
                                                            & Volts (*.BRO)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox"
                                                                value="Datastitch (*.STX)" />Datastitch (*.STX)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox" value="Proel DOS (*.PUM)" />Proel
                                                            DOS (*.PUM)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox" value="Proel Win (*.PMU)" />Proel
                                                            Win (*.PMU)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox" value="Zangs (*.T04)" />Zangs
                                                            (*.T04)
                                                        </div>
                                                        <div>
                                                            <input type="checkbox" value="Inbro (*.INB)" />Inbro
                                                            (*.INB)
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group form_flex">
                                        <div class="col-3">
                                            <label>{{ __('home.cutting_options') }}
                                            </label>
                                        </div>
                                        <div class="col-9">
                                            <select name="admin_parameter_cutting_options" class="selectbox-control">
                                                <option value=""></option>
                                                <option value="Fadenschnitte setzen">Fadenschnitte setzen</option>
                                                <option value="Keine Fadenschnitte setzen">Keine Fadenschnitte setzen
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group form_flex">
                                        <div class="col-3">
                                            <label>{{ __('home.special_cutting_options') }}
                                            </label>
                                        </div>
                                        <div class="col-9">
                                            <select name="admin_parameter_special_cutting_options"
                                                class="selectbox-control">
                                                <option value=""></option>
                                                <option value="Fadenschnitte werden durch Lion Werbe GmbH bestimmt">
                                                    Fadenschnitte
                                                    werden
                                                    durch Lion Werbe GmbH bestimmt</option>
                                                <option value="Fadenschnitte überall">Fadenschnitte überall</option>
                                                <option value="Fadenschnitte ab 1.2mm Abstand">Fadenschnitte ab 1.2mm
                                                    Abstand</option>
                                                <option value="Fadenschnitte ab 1.5mm Abstand">Fadenschnitte ab 1.5mm
                                                    Abstand</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group form_flex">
                                        <div class="col-3">
                                            <label>{{ __('home.needle_instructions') }}
                                            </label>
                                        </div>
                                        <div class="col-9">
                                            <select name="admin_parameter_needle_instructions"
                                                class="selectbox-control">
                                                <option value=""></option>
                                                <option value="Bitte bei der Farbbelegung mit der Nadel 1 beginnen">
                                                    Bitte
                                                    bei der
                                                    Farbbelegung mit der Nadel 1 beginnen</option>
                                                <option value="Freie Belegung der Nadelzuweisungen">Freie Belegung der
                                                    Nadelzuweisungen
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group form_flex">
                                        <div class="col-3">
                                            <label>{{ __('home.standard_instructions') }}
                                            </label>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" name="admin_parameter_standard_instructions"
                                                class="selectbox-control" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12" style="margin-bottom:5px;">
                                    <div class="form-group form_flex">
                                        <div class="col-3">
                                            <label>{{ __('home.special_standard_instructions') }}
                                            </label>
                                        </div>
                                        <div class="col-9">
                                            <textarea type="text" name="admin_parameter_special_standard_instructions" class="selectbox-control"
                                                style="height:70px !important; vertical-align:top;" value=""></textarea>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <div class="col-12 ">
                            <div class="upload_btn" id="admin_em_parameter_buttons" style="display: none">
                                <button class="btn btn-primary btn-block" type="submit"
                                    id="admin_em_parameter_confirm">Bestätigen</button>
                                <button class="btn btn-primary btn-block" type="submit"
                                    id="admin_em_parameter_decline">Ablehnen</button>
                            </div>
                            <div class="upload_btn" id="admin_em_parameter_change_buttons">
                                <button class="btn btn-primary btn-block" type="submit"
                                    id="admin_em_parameter_change">Ändern</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(function() {
        window.prettyPrint() && prettyPrint();
        $('[name=admin_parameter_need_embroidery_files]').multiselect({
            // buttonWidth: '300px'
        });
    });
    $(function() {
        $('#admin_em_parameter_change').click(function() {
            var em_parameter_change_data = new FormData();
            em_parameter_change_data.append('parameter1', $('[name=admin_parameter_yarn_information]')
                .val());
            em_parameter_change_data.append('parameter2', $('#selected_em_parameter3').text());
            em_parameter_change_data.append('parameter3', $('[name=admin_parameter_cutting_options]')
                .val());
            em_parameter_change_data.append('parameter4', $(
                '[name=admin_parameter_special_cutting_options]').val());
            em_parameter_change_data.append('parameter5', $(
                '[name=admin_parameter_needle_instructions]').val());
            em_parameter_change_data.append('parameter6', $(
                '[name=admin_parameter_standard_instructions]').val());
            em_parameter_change_data.append('parameter7', $(
                '[name=admin_parameter_special_standard_instructions]').val());
            em_parameter_change_data.append('customer_id', $('[name=admin_em_parameter_customer_id]')
                .val());
            var confirm = window.confirm('Möchten Sie diesen Kundenstickparameter ändern?');
            if (confirm == true) {
                $.ajax({
                    url: '{{ __('routes.admin-change-em-parameter-change') }}',
                    type: 'post',
                    data: em_parameter_change_data,
                    contentType: false,
                    processData: false,
                    success: () => {
                        $('#admin_em_parameter_buttons').hide();
                        console.log("success");
                    },
                    error: () => {
                        console.error("error");
                    }
                })
            }
        })
        $('#admin_em_parameter_confirm').click(function() {
            var em_parameter_conform_data = new FormData();
            em_parameter_conform_data.append('parameter1', $('[name=admin_parameter_yarn_information]')
                .val());
            em_parameter_conform_data.append('parameter2', $('#selected_em_parameter3').text());
            em_parameter_conform_data.append('parameter3', $('[name=admin_parameter_cutting_options]')
                .val());
            em_parameter_conform_data.append('parameter4', $(
                '[name=admin_parameter_special_cutting_options]').val());
            em_parameter_conform_data.append('parameter5', $(
                '[name=admin_parameter_needle_instructions]').val());
            em_parameter_conform_data.append('parameter6', $(
                '[name=admin_parameter_standard_instructions]').val());
            em_parameter_conform_data.append('parameter7', $(
                '[name=admin_parameter_special_standard_instructions]').val());
            em_parameter_conform_data.append('customer_id', $('[name=admin_em_parameter_customer_id]')
                .val());
            $.ajax({
                url: '{{ __('routes.admin-change-em-parameter-confirm') }}',
                type: 'post',
                data: em_parameter_conform_data,
                contentType: false,
                processData: false,
                success: () => {
                    $('#admin_em_parameter_buttons').hide();
                    $.ajax({
                        url: '{{ __('routes.admin-change-em-parameter-confirm-mail') }}',
                        type: 'get',
                        data: {
                            customer_id: $('[name=admin_em_parameter_customer_id]')
                                .val()
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
                    console.error("error");
                }
            })
        })
        $('#admin_em_parameter_decline').click(function() {
            $.ajax({
                url: '{{ __('routes.admin-change-em-parameter-decline') }}',
                type: 'post',
                data: {
                    customer_id: $('[name=admin_em_parameter_customer_id]').val()
                },
                success: () => {
                    $('#admin_em_parameter_buttons').hide();
                    $.ajax({
                        url: '{{ __('routes.admin-change-em-parameter-decline-mail') }}',
                        type: 'get',
                        data: {
                            customer_id: $('[name=admin_em_parameter_customer_id]')
                                .val()
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
                    console.error("error");
                }
            })
        })
    })
</script>
