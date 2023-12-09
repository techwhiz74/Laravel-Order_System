<div class="modal fade" id="admin_customer_parameters_em_popup" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgb(244, 244, 244); ">
            <button type="button" class="backbutton" style="margin: 20px 0 0 20px;" onclick="hideModal()"><i
                    class="fa-solid fa-left-long" style="display: flex;"></i></button>
            <div class="row">
                <div class="col-md-1 col-xl-2"></div>
                <div class="col-12 col-md-10 col-xl-8">
                    <div class="pagetitle">{{ __('home.customer_em_parameters') }}
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-12">
                                <fieldset class="field-group row">
                                    <legend class="field-caption">
                                        {{ __('home.embroidery_file_information') }}</legend>
                                    <div class="col-12">
                                        <div class="form-group form_dv_wrap">
                                            <div class="row">
                                                <div class="col-12 col-md-3 form_label">
                                                    <label>{{ __('home.yarn_information') }}
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="admin_parameter_yarn_information"
                                                        class="selectbox-control">
                                                        <option value=""></option>
                                                        <option value="Madeira 40 / 60 PolyNeon">Madeira 40 / 60
                                                            PolyNeon
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
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group form_dv_wrap">
                                            <div class="row">
                                                <div class="col-12 col-md-3 form_label">
                                                    <label>{{ __('home.need_embroidery_files') }}
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <div class="dropdown">
                                                        <div class="product-multiselect3 dropdown-toggle">
                                                            <div id="selected_em_parameter3">
                                                            </div>
                                                        </div>
                                                        <div class="product-item-menu3">
                                                            <div class="row parameter-select-items-file"
                                                                style="font-size: 13px;">
                                                                <div>
                                                                    <input type="checkbox"
                                                                        value="Tajima (*.DST)" />Tajima
                                                                    (*.DST)
                                                                </div>
                                                                <div>
                                                                    <input type="checkbox"
                                                                        value="Tajima (*.TBF)" />Tajima
                                                                    (*.TBF)
                                                                </div>
                                                                <div>
                                                                    <input type="checkbox"
                                                                        value="Tajima Barudan (*.DSB)" />Tajima Barudan
                                                                    (*.DSB)
                                                                </div>
                                                                <div>
                                                                    <input type="checkbox"
                                                                        value="Tajima (*.T01)" />Tajima
                                                                    (*.T01)
                                                                </div>
                                                                <div>
                                                                    <input type="checkbox"
                                                                        value="Tajima ZSK (*.DSZ)" />Tajima
                                                                    ZSK (*.DSZ)
                                                                </div>
                                                                <div>
                                                                    <input type="checkbox"
                                                                        value="Barudan FDR-3 (*.U??)" />Barudan FDR-3
                                                                    (*.U??)
                                                                </div>
                                                                <div>
                                                                    <input type="checkbox"
                                                                        value="Barudan (*.U??)" />Barudan
                                                                    (*.U??)
                                                                </div>
                                                                <div>
                                                                    <input type="checkbox"
                                                                        value="Barudan (*.T03)" />Barudan
                                                                    (*.T03)
                                                                </div>
                                                                <div>
                                                                    <input type="checkbox" value="Happy (*.TAP)" />Happy
                                                                    (*.TAP)
                                                                </div>
                                                                <div>
                                                                    <input type="checkbox" value="ZSK TC (*.Z00)" />ZSK
                                                                    TC
                                                                    (*.Z00)
                                                                </div>
                                                                <div>
                                                                    <input type="checkbox" value="ZSK TC (*.Z01)" />ZSK
                                                                    TC
                                                                    (*.Z01)
                                                                </div>
                                                                <div>
                                                                    <input type="checkbox" value="ZSK (*.T05)" />ZSK
                                                                    (*.T05)
                                                                </div>
                                                                <div>
                                                                    <input type="checkbox" value="Melco (*.EXP)" />Melco
                                                                    (*.EXP)
                                                                </div>
                                                                <div>
                                                                    <input type="checkbox" value="Melco (*.CND)" />Melco
                                                                    (*.CND)
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
                                                                    <input type="checkbox"
                                                                        value="Toyota (*.10O)" />Toyota
                                                                    (*.10O)
                                                                </div>
                                                                <div>
                                                                    <input type="checkbox" value="Pfaff (*.KSM)" />Pfaff
                                                                    (*.KSM)
                                                                </div>
                                                                <div>
                                                                    <input type="checkbox" value="Pfaff (*.T09)" />Pfaff
                                                                    (*.T09)
                                                                </div>
                                                                <div>
                                                                    <input type="checkbox" value="Pfaff (*.PCS)" />Pfaff
                                                                    (*.PCS)
                                                                </div>
                                                                <div>
                                                                    <input type="checkbox" value="Pfaff (*.PCD)" />Pfaff
                                                                    (*.PCD)
                                                                </div>
                                                                <div>
                                                                    <input type="checkbox" value="Pfaff (*.PCQ)" />Pfaff
                                                                    (*.PCQ)
                                                                </div>
                                                                <div>
                                                                    <input type="checkbox"
                                                                        value="Singer (*.XXX)" />Singer
                                                                    (*.XXX)
                                                                </div>
                                                                <div>
                                                                    <input type="checkbox"
                                                                        value="Janome/Elna/Kenmore (*.JEF)" />Janome/Elna/Kenmore
                                                                    (*.JEF)
                                                                </div>
                                                                <div>
                                                                    <input type="checkbox"
                                                                        value="Janome/Elna (*.JPX)" />Janome/Elna
                                                                    (*.JPX)
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
                                                                    <input type="checkbox"
                                                                        value="Bits & Volts (*.BRO)" />Bits
                                                                    & Volts (*.BRO)
                                                                </div>
                                                                <div>
                                                                    <input type="checkbox"
                                                                        value="Datastitch (*.STX)" />Datastitch (*.STX)
                                                                </div>
                                                                <div>
                                                                    <input type="checkbox"
                                                                        value="Proel DOS (*.PUM)" />Proel
                                                                    DOS (*.PUM)
                                                                </div>
                                                                <div>
                                                                    <input type="checkbox"
                                                                        value="Proel Win (*.PMU)" />Proel
                                                                    Win (*.PMU)
                                                                </div>
                                                                <div>
                                                                    <input type="checkbox"
                                                                        value="Zangs (*.T04)" />Zangs
                                                                    (*.T04)
                                                                </div>
                                                                <div>
                                                                    <input type="checkbox"
                                                                        value="Inbro (*.INB)" />Inbro
                                                                    (*.INB)
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group form_dv_wrap">
                                            <div class="row">
                                                <div class="col-12 col-md-3 form_label">
                                                    <label>{{ __('home.cutting_options') }}
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="admin_parameter_cutting_options"
                                                        class="selectbox-control">
                                                        <option value=""></option>
                                                        <option value="Fadenschnitte setzen">Fadenschnitte setzen
                                                        </option>
                                                        <option value="Keine Fadenschnitte setzen">Keine Fadenschnitte
                                                            setzen
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group form_dv_wrap">
                                            <div class="row">
                                                <div class="col-12 col-md-3 form_label">
                                                    <label>{{ __('home.special_cutting_options') }}
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="admin_parameter_special_cutting_options"
                                                        class="selectbox-control">
                                                        <option value=""></option>
                                                        <option
                                                            value="Fadenschnitte werden durch Lion Werbe GmbH bestimmt">
                                                            Fadenschnitte
                                                            werden
                                                            durch Lion Werbe GmbH bestimmt</option>
                                                        <option value="Fadenschnitte überall">Fadenschnitte überall
                                                        </option>
                                                        <option value="Fadenschnitte ab 1.2mm Abstand">Fadenschnitte ab
                                                            1.2mm
                                                            Abstand</option>
                                                        <option value="Fadenschnitte ab 1.5mm Abstand">Fadenschnitte ab
                                                            1.5mm
                                                            Abstand</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group form_dv_wrap">
                                            <div class="row">
                                                <div class="col-12 col-md-3 form_label">
                                                    <label>{{ __('home.needle_instructions') }}
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="admin_parameter_needle_instructions"
                                                        class="selectbox-control">
                                                        <option value=""></option>
                                                        <option
                                                            value="Bitte bei der Farbbelegung mit der Nadel 1 beginnen">
                                                            Bitte
                                                            bei der
                                                            Farbbelegung mit der Nadel 1 beginnen</option>
                                                        <option value="Freie Belegung der Nadelzuweisungen">Freie
                                                            Belegung
                                                            der
                                                            Nadelzuweisungen
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group form_dv_wrap">
                                            <div class="row">
                                                <div class="col-12 col-md-3 form_label">
                                                    <label>{{ __('home.standard_instructions') }}
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" name="admin_parameter_standard_instructions"
                                                        class="selectbox-control" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group form_dv_wrap">
                                            <div class="row">
                                                <div class="col-12 col-md-3 form_label">
                                                    <label>{{ __('home.special_standard_instructions') }}
                                                    </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea type="text" name="admin_parameter_special_standard_instructions" class="selectbox-control"
                                                        style="height:70px !important; padding:8px 12px !important;" value=""></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            </fieldset>
                        </div>
                        <div class="col-12 ">
                            <div class="upload_btn" id="admin_em_parameter_buttons" style="display: none">
                                <button class="btn btn-primary btn-block" type="submit"
                                    id="admin_em_parameter_confirm">BESTÄTIGEN</button>
                                <button class="btn btn-primary btn-block" type="submit"
                                    id="admin_em_parameter_decline">ABLEHNEN</button>
                            </div>
                            <div class="upload_btn" id="admin_em_parameter_change_buttons">
                                <button class="btn btn-primary btn-block" type="submit"
                                    id="admin_em_parameter_change">ÄNDERN</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1 col-xl-2"></div>
        </div>
    </div>
</div>
</div>
