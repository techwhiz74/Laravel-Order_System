<section class="customer_parameters_em_section">
    <div class="pagetitle">
        <h1>{{ __('home.customer_em_parameters') }}</h1>
        <p></p>
    </div>
    <div class="order_fome_container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <fieldset class="field-group row">
                    <legend class="field-caption">
                        {{ __('home.embroidery_file_information') }}</legend>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group form_dv_wrap">
                            <label style="width: 200px;">{{ __('home.yarn_information') }}
                            </label>
                            <select name="parameter_yarn_information" class="form-control"
                                style="width: calc(100% - 205px) !important;">
                                <option value=""></option>
                                <option value="Madeira 40 / 60 PolyNeon">Madeira 40 / 60 PolyNeon</option>
                                <option value="Madeira Classic">Madeira Classic</option>
                                <option value="Madeira Frosted">Madeira Frosted</option>
                                <option value="Gunold Poly40">Gunold Poly40</option>
                                <option value="Isacord Amann 40">Isacord Amann 40</option>
                                <option value="Brildor">Brildor</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group form_dv_wrap" style="display: flex; align-items:center;">
                            <label style="width: 205px;">{{ __('home.need_embroidery_files') }}
                            </label>
                            <div style="width: calc(100% - 205px) !important;">
                                @if (auth()->user()->user_type == 'customer')
                                    @if (auth()->user()->customerEmParameter)
                                        <select name="parameter_need_embroidery_files" multiple>
                                            <option value="Tajima (*.DST)"
                                                {{ str_contains(auth()->user()->customerEmParameter, 'Tajima (*.DST)') ? 'selected' : '' }}>
                                                Tajima (*.DST)</option>
                                            <option value="Tajima (*.TBF)"
                                                {{ str_contains(auth()->user()->customerEmParameter, 'Tajima (*.DST)') ? 'selected' : '' }}>
                                                Tajima (*.TBF)</option>
                                            <option value="Tajima Barudan (*.DSB)"
                                                {{ str_contains(auth()->user()->customerEmParameter, 'Tajima Barudan (*.DSB)') ? 'selected' : '' }}>
                                                Tajima Barudan (*.DSB)</option>
                                            <option value="Tajima (*.T01)"
                                                {{ str_contains(auth()->user()->customerEmParameter, 'Tajima (*.T01)') ? 'selected' : '' }}>
                                                Tajima (*.T01)</option>
                                            <option value="Tajima ZSK (*.DSZ)"
                                                {{ str_contains(auth()->user()->customerEmParameter, 'Tajima ZSK (*.DSZ)') ? 'selected' : '' }}>
                                                Tajima ZSK (*.DSZ)</option>
                                            <option value="Barudan FDR-3 (*.U??)"
                                                {{ str_contains(auth()->user()->customerEmParameter, 'Barudan FDR-3 (*.U??)') ? 'selected' : '' }}>
                                                Barudan FDR-3 (*.U??)</option>
                                            <option value="Barudan (*.U??)"
                                                {{ str_contains(auth()->user()->customerEmParameter, 'Barudan (*.U??)') ? 'selected' : '' }}>
                                                Barudan (*.U??)</option>
                                            <option value="Barudan (*.T03)"
                                                {{ str_contains(auth()->user()->customerEmParameter, 'Barudan (*.T03)') ? 'selected' : '' }}>
                                                Barudan (*.T03)</option>
                                            <option value="Happy (*.TAP)"
                                                {{ str_contains(auth()->user()->customerEmParameter, 'Happy (*.TAP)') ? 'selected' : '' }}>
                                                Happy (*.TAP)</option>
                                            <option value="ZSK TC (*.Z00)"
                                                {{ str_contains(auth()->user()->customerEmParameter, 'ZSK TC (*.Z00)') ? 'selected' : '' }}>
                                                ZSK TC (*.Z00)</option>
                                            <option value="ZSK TC (*.Z01)"
                                                {{ str_contains(auth()->user()->customerEmParameter, 'ZSK TC (*.Z01)') ? 'selected' : '' }}>
                                                ZSK TC (*.Z01)</option>
                                            <option value="ZSK (*.T05)"
                                                {{ str_contains(auth()->user()->customerEmParameter, 'ZSK (*.T05)') ? 'selected' : '' }}>
                                                ZSK (*.T05)</option>
                                            <option value="Melco (*.EXP)"
                                                {{ str_contains(auth()->user()->customerEmParameter, 'Melco (*.EXP)') ? 'selected' : '' }}>
                                                Melco (*.EXP)</option>
                                            <option value="Melco (*.CND)"
                                                {{ str_contains(auth()->user()->customerEmParameter, 'Melco (*.CND)') ? 'selected' : '' }}>
                                                Melco (*.CND)</option>
                                            <option value="Brother/Babylock/Deco (*.PES)"
                                                {{ str_contains(auth()->user()->customerEmParameter, 'Brother/Babylock/Deco (*.PES)') ? 'selected' : '' }}>
                                                Brother/Babylock/Deco (*.PES)
                                            </option>
                                            <option value="Brother/Babylock/Deco (*.PEC)"
                                                {{ str_contains(auth()->user()->customerEmParameter, 'Brother/Babylock/Deco (*.PEC)') ? 'selected' : '' }}>
                                                Brother/Babylock/Deco (*.PEC)
                                            </option>
                                            <option value="Toyota (*.10O)"
                                                {{ str_contains(auth()->user()->customerEmParameter, 'Toyota (*.10O)') ? 'selected' : '' }}>
                                                Toyota (*.10O)</option>
                                            <option value="Pfaff (*.KSM)"
                                                {{ str_contains(auth()->user()->customerEmParameter, 'Pfaff (*.KSM)') ? 'selected' : '' }}>
                                                Pfaff (*.KSM)</option>
                                            <option value="Pfaff (*.T09)"
                                                {{ str_contains(auth()->user()->customerEmParameter, 'Pfaff (*.T09)') ? 'selected' : '' }}>
                                                Pfaff (*.T09)</option>
                                            <option value="Pfaff (*.PCS)"
                                                {{ str_contains(auth()->user()->customerEmParameter, 'Pfaff (*.PCS)') ? 'selected' : '' }}>
                                                Pfaff (*.PCS)</option>
                                            <option value="Pfaff (*.PCD)"
                                                {{ str_contains(auth()->user()->customerEmParameter, 'Pfaff (*.PCD)') ? 'selected' : '' }}>
                                                Pfaff (*.PCD)</option>
                                            <option value="Pfaff (*.PCQ)"
                                                {{ str_contains(auth()->user()->customerEmParameter, 'Pfaff (*.PCQ)') ? 'selected' : '' }}>
                                                Pfaff (*.PCQ)</option>
                                            <option value="Singer (*.XXX)"
                                                {{ str_contains(auth()->user()->customerEmParameter, 'Singer (*.XXX)') ? 'selected' : '' }}>
                                                Singer (*.XXX)</option>
                                            <option value="Janome/Elna/Kenmore (*.JEF)"
                                                {{ str_contains(auth()->user()->customerEmParameter, 'Janome/Elna/Kenmore (*.JEF)') ? 'selected' : '' }}>
                                                Janome/Elna/Kenmore (*.JEF)
                                            </option>
                                            <option value="Janome/Elna (*.JPX)"
                                                {{ str_contains(auth()->user()->customerEmParameter, 'Janome/Elna (*.JPX)') ? 'selected' : '' }}>
                                                Janome/Elna (*.JPX)</option>
                                            <option value="Janome/Elna/Kenmore (*.SEW)"
                                                {{ str_contains(auth()->user()->customerEmParameter, 'Janome/Elna/Kenmore (*.SEW)') ? 'selected' : '' }}>
                                                Janome/Elna/Kenmore (*.SEW)
                                            </option>
                                            <option value="Husqvarna/Viking/Pfaff (*.VP3)"
                                                {{ str_contains(auth()->user()->customerEmParameter, 'Husqvarna/Viking/Pfaff (*.VP3)') ? 'selected' : '' }}>
                                                Husqvarna/Viking/Pfaff
                                                (*.VP3)
                                            </option>
                                            <option value="Husqvarna/Viking/Pfaff (*.SHV)"
                                                {{ str_contains(auth()->user()->customerEmParameter, 'Husqvarna/Viking/Pfaff (*.SHV)') ? 'selected' : '' }}>
                                                Husqvarna/Viking/Pfaff
                                                (*.SHV)
                                            </option>
                                            <option value="Husqvarna/Viking/Pfaff (*.HUS)"
                                                {{ str_contains(auth()->user()->customerEmParameter, 'Husqvarna/Viking/Pfaff (*.HUS)') ? 'selected' : '' }}>
                                                Husqvarna/Viking/Pfaff
                                                (*.HUS)
                                            </option>
                                            <option value="Bits & Volts (*.BRO)"
                                                {{ str_contains(auth()->user()->customerEmParameter, 'Bits & Volts (*.BRO)') ? 'selected' : '' }}>
                                                Bits & Volts (*.BRO)</option>
                                            <option value="Datastitch (*.STX)"
                                                {{ str_contains(auth()->user()->customerEmParameter, 'Datastitch (*.STX)') ? 'selected' : '' }}>
                                                Datastitch (*.STX)</option>
                                            <option value="Proel DOS (*.PUM)"
                                                {{ str_contains(auth()->user()->customerEmParameter, 'Proel DOS (*.PUM)') ? 'selected' : '' }}>
                                                Proel DOS (*.PUM)</option>
                                            <option value="Proel Win (*.PMU)"
                                                {{ str_contains(auth()->user()->customerEmParameter, 'Proel Win (*.PMU)') ? 'selected' : '' }}>
                                                Proel Win (*.PMU)</option>
                                            <option value="Zangs (*.T04)"
                                                {{ str_contains(auth()->user()->customerEmParameter, 'Zangs (*.T04)') ? 'selected' : '' }}>
                                                Zangs (*.T04)</option>
                                            <option value="Inbro (*.INB)"
                                                {{ str_contains(auth()->user()->customerEmParameter, 'Inbro (*.INB)') ? 'selected' : '' }}>
                                                Inbro (*.INB)</option>
                                        </select>
                                    @else
                                        <select name="parameter_need_embroidery_files" multiple>
                                            <option value="Tajima (*.DST)">Tajima (*.DST)</option>
                                            <option value="Tajima (*.TBF)">Tajima (*.TBF)</option>
                                            <option value="Tajima Barudan (*.DSB)">Tajima Barudan (*.DSB)</option>
                                            <option value="Tajima (*.T01)">Tajima (*.T01)</option>
                                            <option value="Tajima ZSK (*.DSZ)">Tajima ZSK (*.DSZ)</option>
                                            <option value="Barudan FDR-3 (*.U??)">Barudan FDR-3 (*.U??)</option>
                                            <option value="Barudan (*.U??)">Barudan (*.U??)</option>
                                            <option value="Barudan (*.T03)">Barudan (*.T03)</option>
                                            <option value="Happy (*.TAP)">Happy (*.TAP)</option>
                                            <option value="ZSK TC (*.Z00)">ZSK TC (*.Z00)</option>
                                            <option value="ZSK TC (*.Z01)">ZSK TC (*.Z01)</option>
                                            <option value="ZSK (*.T05)">ZSK (*.T05)</option>
                                            <option value="Melco (*.EXP)">Melco (*.EXP)</option>
                                            <option value="Melco (*.CND)">Melco (*.CND)</option>
                                            <option value="Brother/Babylock/Deco (*.PES)">Brother/Babylock/Deco (*.PES)
                                            </option>
                                            <option value="Brother/Babylock/Deco (*.PEC)">Brother/Babylock/Deco (*.PEC)
                                            </option>
                                            <option value="Toyota (*.10O)">Toyota (*.10O)</option>
                                            <option value="Pfaff (*.KSM)">Pfaff (*.KSM)</option>
                                            <option value="Pfaff (*.T09)">Pfaff (*.T09)</option>
                                            <option value="Pfaff (*.PCS)">Pfaff (*.PCS)</option>
                                            <option value="Pfaff (*.PCD)">Pfaff (*.PCD)</option>
                                            <option value="Pfaff (*.PCQ)">Pfaff (*.PCQ)</option>
                                            <option value="Singer (*.XXX)">Singer (*.XXX)</option>
                                            <option value="Janome/Elna/Kenmore (*.JEF)">Janome/Elna/Kenmore (*.JEF)
                                            </option>
                                            <option value="Janome/Elna (*.JPX)">Janome/Elna (*.JPX)</option>
                                            <option value="Janome/Elna/Kenmore (*.SEW)">Janome/Elna/Kenmore (*.SEW)
                                            </option>
                                            <option value="Husqvarna/Viking/Pfaff (*.VP3)">Husqvarna/Viking/Pfaff
                                                (*.VP3)
                                            </option>
                                            <option value="Husqvarna/Viking/Pfaff (*.SHV)">Husqvarna/Viking/Pfaff
                                                (*.SHV)
                                            </option>
                                            <option value="Husqvarna/Viking/Pfaff (*.HUS)">Husqvarna/Viking/Pfaff
                                                (*.HUS)
                                            </option>
                                            <option value="Bits & Volts (*.BRO)">Bits & Volts (*.BRO)</option>
                                            <option value="Datastitch (*.STX)">Datastitch (*.STX)</option>
                                            <option value="Proel DOS (*.PUM)">Proel DOS (*.PUM)</option>
                                            <option value="Proel Win (*.PMU)">Proel Win (*.PMU)</option>
                                            <option value="Zangs (*.T04)">Zangs (*.T04)</option>
                                            <option value="Inbro (*.INB)">Inbro (*.INB)</option>
                                        </select>
                                    @endif
                                @endif

                            </div>


                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group form_dv_wrap">
                            <label style="width: 200px;">{{ __('home.cutting_options') }}
                            </label>
                            <select name="parameter_cutting_options" class="form-control"
                                style="width: calc(100% - 205px) !important;">
                                <option value=""></option>
                                <option value="Fadenschnitte setzen">Fadenschnitte setzen</option>
                                <option value="Keine Fadenschnitte setzen">Keine Fadenschnitte setzen</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group form_dv_wrap">
                            <label style="width: 200px;">{{ __('home.special_cutting_options') }}
                            </label>
                            <select name="parameter_special_cutting_options" class="form-control"
                                style="width: calc(100% - 205px) !important;">
                                <option value=""></option>
                                <option value="Fadenschnitte werden durch Lion Werbe GmbH bestimmt">Fadenschnitte
                                    werden
                                    durch Lion Werbe GmbH bestimmt</option>
                                <option value="Fadenschnitte überall">Fadenschnitte überall</option>
                                <option value="Fadenschnitte ab 1.2mm Abstand">Fadenschnitte ab 1.2mm Abstand</option>
                                <option value="Fadenschnitte ab 1.5mm Abstand">Fadenschnitte ab 1.5mm Abstand</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group form_dv_wrap">
                            <label style="width: 200px;">{{ __('home.needle_instructions') }}
                            </label>
                            <select name="parameter_needle_instructions" class="form-control"
                                style="width: calc(100% - 205px) !important;">
                                <option value=""></option>
                                <option value="Bitte bei der Farbbelegung mit der Nadel 1 beginnen">Bitte bei der
                                    Farbbelegung mit der Nadel 1 beginnen</option>
                                <option value="Freie Belegung der Nadelzuweisungen">Freie Belegung der Nadelzuweisungen
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group form_dv_wrap">
                            <label style="width: 200px;">{{ __('home.standard_instructions') }}
                            </label>
                            <input type="text" name="parameter_standard_instructions" class="form-control"
                                style="width: calc(100% - 205px) !important;" value="">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12" style="margin-bottom:5px;">
                        <div class="form-group form_dv_wrap">
                            <label style="width: 200px;">{{ __('home.special_standard_instructions') }}
                            </label>
                            <textarea type="text" name="parameter_special_standard_instructions" class="form-control"
                                style="height:70px !important;; width: calc(100% - 205px) !important; vertical-align:top;" value=""></textarea>
                        </div>
                    </div>

                </fieldset>
            </div>

            <div class="col-12 ">
                <div class="upload_btn">
                    <button class="btn btn-primary btn-block" type="submit"
                        id="customer_em_parameter_submit">{{ __('home.request_change') }}</button>
                </div>
            </div>
        </div>
    </div>

</section>

<script>
    $(function() {
        window.prettyPrint() && prettyPrint();
        $('[name=parameter_need_embroidery_files]').multiselect({
            // buttonWidth: '300px'
        });
    });
    $(function() {
        $('#customer_parameters_em1').click(function() {
            $.ajax({
                url: '{{ __('routes.customer-get-em-parameter') }}',
                type: 'get',
                success: (parameter) => {
                    $('[name=parameter_yarn_information]').val(parameter.parameter1);
                    $('[name=parameter_need_embroidery_files]').val(parameter.parameter2);
                    $('[name=parameter_cutting_options]').val(parameter.parameter3);
                    $('[name=parameter_special_cutting_options]').val(parameter.parameter4);
                    $('[name=parameter_needle_instructions]').val(parameter.parameter5);
                    $('[name=parameter_standard_instructions]').val(parameter.parameter6);
                    $('[name=parameter_special_standard_instructions]').val(parameter
                        .parameter7);
                },
                error: () => {
                    console.error("error");
                }
            })
        })
        $('#customer_em_parameter_submit').click(function() {
            var em_parameter_data = new FormData();
            em_parameter_data.append('parameter1', $('[name=parameter_yarn_information]').val());
            em_parameter_data.append('parameter2', $('[name=parameter_need_embroidery_files]').val()
                .join(', '));
            em_parameter_data.append('parameter3', $('[name=parameter_cutting_options]').val());
            em_parameter_data.append('parameter4', $('[name=parameter_special_cutting_options]').val());
            em_parameter_data.append('parameter5', $('[name=parameter_needle_instructions]').val());
            em_parameter_data.append('parameter6', $('[name=parameter_standard_instructions]').val());
            em_parameter_data.append('parameter7', $('[name=parameter_special_standard_instructions]')
                .val());
            $.ajax({
                url: '{{ __('routes.customer-em-parameter-change') }}',
                type: 'post',
                data: em_parameter_data,
                contentType: false,
                processData: false,
                success: () => {
                    $('#customer_em_parameter_submit').hide();
                    $.ajax({
                        url: '{{ __('routes.customer-em-parameter-change-mail') }}',
                        type: 'get',
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
