<section class="customer_parameters_section">
    <div class="pagetitle">
        <h1>{{ __('home.customer_parameters') }}</h1>
        <p></p>
    </div>
    <div class="order_fome_container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <fieldset class="field-group row">
                    <legend class="field-caption">
                        {{ __('home.embroidery_file_information') }}</legend>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group form_dv_wrap">
                            <label style="width: 200px;">{{ __('home.yarn_information') }}
                            </label>
                            <select name="parameter_yarn_information" class="form-control"
                                style="width: calc(100% - 205px) !important;">
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
                        <div class="form-group form_dv_wrap">
                            <label style="width: 200px;">{{ __('home.need_embroidery_files') }}
                            </label>
                            <select name="parameter_need_embroidery_files" class="form-control"
                                style="width: calc(100% - 205px) !important;">
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
                                <option value="Brother/Babylock/Deco (*.PES)">Brother/Babylock/Deco (*.PES)</option>
                                <option value="Brother/Babylock/Deco (*.PEC)">Brother/Babylock/Deco (*.PEC)</option>
                                <option value="Toyota (*.10O)">Toyota (*.10O)</option>
                                <option value="Pfaff (*.KSM)">Pfaff (*.KSM)</option>
                                <option value="Pfaff (*.T09)">Pfaff (*.T09)</option>
                                <option value="Pfaff (*.PCS)">Pfaff (*.PCS)</option>
                                <option value="Pfaff (*.PCD)">Pfaff (*.PCD)</option>
                                <option value="Pfaff (*.PCQ)">Pfaff (*.PCQ)</option>
                                <option value="Singer (*.XXX)">Singer (*.XXX)</option>
                                <option value="Janome/Elna/Kenmore (*.JEF)">Janome/Elna/Kenmore (*.JEF)</option>
                                <option value="Janome/Elna (*.JPX)">Janome/Elna (*.JPX)</option>
                                <option value="Janome/Elna/Kenmore (*.SEW)">Janome/Elna/Kenmore (*.SEW)</option>
                                <option value="Husqvarna/Viking/Pfaff (*.VP3)">Husqvarna/Viking/Pfaff (*.VP3)</option>
                                <option value="Husqvarna/Viking/Pfaff (*.SHV)">Husqvarna/Viking/Pfaff (*.SHV)</option>
                                <option value="Husqvarna/Viking/Pfaff (*.HUS)">Husqvarna/Viking/Pfaff (*.HUS)</option>
                                <option value="Bits & Volts (*.BRO)">Bits & Volts (*.BRO)</option>
                                <option value="Datastitch (*.STX)">Datastitch (*.STX)</option>
                                <option value="Proel DOS (*.PUM)">Proel DOS (*.PUM)</option>
                                <option value="Proel Win (*.PMU)">Proel Win (*.PMU)</option>
                                <option value="Zangs (*.T04)">Zangs (*.T04)</option>
                                <option value="Inbro (*.INB)">Inbro (*.INB)</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group form_dv_wrap">
                            <label style="width: 200px;">{{ __('home.cutting_options') }}
                            </label>
                            <select name="parameter_cutting_options" class="form-control"
                                style="width: calc(100% - 205px) !important;">
                                <option value="Fadenschnitte setzen">Fadenschnitte setzen</option>
                                <option value="Keine Fadenschnitte setzenc">Keine Fadenschnitte setzenc</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group form_dv_wrap">
                            <label style="width: 200px;">{{ __('home.special_cutting_options') }}
                            </label>
                            <select name="parameter_special_cutting_options" class="form-control"
                                style="width: calc(100% - 205px) !important;">
                                <option value="Fadenschnitte werden durch Lion Werbe GmbH bestimmt">Fadenschnitte werden
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
                            <input type="text" name="country" class="form-control"
                                style="width: calc(100% - 205px) !important;" value="">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12" style="margin-bottom:5px;">
                        <div class="form-group form_dv_wrap">
                            <label style="width: 200px;">{{ __('home.special_standard_instructions') }}
                            </label>
                            <textarea type="text" name="country" class="form-control"
                                style="height:70px; width: calc(100% - 205px) !important; vertical-align:top;" value=""></textarea>
                        </div>
                    </div>

                </fieldset>
            </div>
            <div class="col-lg-6 col-md-6 col-12"
                style="display: flex; flex-direction:column; justify-content:space-between;">
                <fieldset class="field-group row">
                    <legend class="field-caption">
                        {{ __('home.vector_file_information') }}</legend>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group form_dv_wrap">
                            <label style="width: 200px;">{{ __('home.required_vector_file') }}
                            </label>
                            <input type="text" name="country" class="form-control"
                                style="width: calc(100% - 205px) !important;" value="">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12" style="margin-bottom:5px;">
                        <div class="form-group form_dv_wrap">
                            <label style="width: 200px;">{{ __('home.required_image_file') }}
                            </label>
                            <input type="text" name="country" class="form-control"
                                style="width: calc(100% - 205px) !important;" value="">
                        </div>
                    </div>
                </fieldset>
                <div class="row">
                    <div class="col-12 ">
                        <div class="upload_btn">
                            @if (@auth()->user()->user_type == 'customer')
                                <button class="btn btn-primary btn-block"
                                    type="submit">{{ __('home.request_change') }}</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
