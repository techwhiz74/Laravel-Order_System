<footer>
    @auth
        <div class="footer_wrap" style="background: #fff">
            <div class="footer">
                <div class="row">
                    <div class="col-xl-8 col-12">
                        <ul class="copyright_list">
                            <li>
                                <p>
                                <p style="color: #aaa"><span><span style="font-size:20px">©</span> Lion Werbe GmbH | Wir
                                        machen Werbung.</span>
                                    <span>Stark wie ein Löwe.</span> <span>Alle Rechte vorbehalten.</span>
                                </p>
                                </p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xl-4 col-12">
                        <ul class="copyright_list copyright_list2">
                            <li>
                                <a href="" style="color: #aaa">Datenschutzerklärung</a>
                            </li>
                            <li>
                                <a href="" style="color: #aaa">Impressum</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="footer_wrap" style="margin-top: -10vh;">
            <div class="footer" style="margin-bottom:0">
                <div class="row">
                    <div class="col-xl-8 col-12">
                        <ul class="copyright_list">
                            <li>
                                <p>
                                <p style="color: #fff"><span><span style="font-size:20px">©</span> Lion Werbe GmbH | Wir
                                        machen Werbung.</span>
                                    <span>Stark wie ein Löwe.</span> <span>Alle Rechte vorbehalten.</span>
                                </p>
                                </p>
                            </li>
                        </ul>
                    </div>

                    <div class="col-xl-4 col-12">
                        <ul class="copyright_list copyright_list2">
                            <li>
                                <a href="" style="color: #fff">Datenschutzerklärung</a>
                            </li>
                            <li>
                                <a href="" style="color: #fff">Impressum</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endauth
</footer>
