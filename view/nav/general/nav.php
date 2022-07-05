<div class="col-sm-3 col-xs-6 sidebar pl-0">
    <div class="inner-sidebar mr-3">
        <!--Image Avatar-->
        <div class="avatar text-center">
            <img src="./assets/general/img/poltek.png" alt="" class="border-0" />
            <p><strong>Politeknik Negeri Batam</strong></p>
            <span class="text-primary small">
                <strong style="text-transform: capitalize;">
                    <?= $_SESSION["level"] ?>
                </strong>
            </span>
        </div>
        <!--Image Avatar-->

        <!-- MENU -->
        <div class="sidebar-menu-container">
            <ul class="sidebar-menu mt-4 mb-4">
                <li class="parent">
                    <?php if ($_SESSION["level"] === "mahasiswa") : ?>
                        <a href="#" onclick="toggle_menu('form_element'); return false" class="">
                            <i class="fa fa-pencil-square mr-3"></i>
                            <span class="none">Form
                                <i class="fa fa-angle-down pull-right align-bottom"></i>
                            </span>
                        </a>
                        <ul class="children" id="form_element">
                            <li class="child">
                                <a href="?p=mahasiswa" class="ml-4">
                                    <i class="fa fa-angle-right mr-2"></i> Form Peminjaman Ruangan
                                </a>
                            </li>
                            <li class="child">
                                <a href="?p=lapor-kerusakan" class="ml-4">
                                    <i class="fa fa-angle-right mr-2"></i>
                                    Form Laporan Kerusakan
                                </a>
                            </li>
                        </ul>
                        <a href="?p=papan-informasi" class="">
                            <i class="fa fa-pencil-square mr-3"></i>
                            <span class="none">Status Pengajuan
                                <i class=""></i>
                            </span>
                        </a>
                    <?php elseif ($_SESSION["login"] === true && $_SESSION["level"] === "dosen") : ?>
                        <a href="#" onclick="toggle_menu('data-pengajuan'); return false" class="">
                            <i class="fa fa-pencil-square mr-3"></i>
                            <span class="none">
                                Data
                                <i class="fa fa-angle-down pull-right align-bottom"></i>
                            </span>
                        </a>
                        <ul class="children" id="data-pengajuan">
                            <li class="child">
                                <a href="./" class="ml-4">
                                    <i class="fa fa-angle-right mr-2"></i> Pengajuan
                                </a>
                            </li>
                        </ul>
                    <?php elseif ($_SESSION["login"] === true && $_SESSION["level"] === "laboran") : ?>
                        <a href="#" onclick="toggle_menu('form_element'); return false" class="">
                            <i class="fa fa-pencil-square mr-3"></i>
                            <span class="none">Data
                                <i class="fa fa-angle-down pull-right align-bottom"></i>
                            </span>
                        </a>
                        <ul class="children" id="form_element">
                            <li class="child">
                                <a href="?p=laboran" class="ml-4">
                                    <i class="fa fa-angle-right mr-2"></i> Peminjaman
                                </a>
                            </li>
                            <li class="child">
                                <a href="?p=list-kerusakan" class="ml-4">
                                    <i class="fa fa-angle-right mr-2"></i>
                                    Kerusakan
                                </a>
                            </li>
                            <li class="child">
                                <a href="?p=peralatan" class="ml-4">
                                    <i class="fa fa-angle-right mr-2"></i>
                                    Peralatan
                                </a>
                            </li>
                            <li class="child">
                                <a href="?p=sparepart" class="ml-4">
                                    <i class="fa fa-angle-right mr-2"></i>
                                    Sparepart
                                </a>
                            </li>
                        </ul>
                    <?php endif ?>
                    <a href="?p=logout" class="">
                        <span class="none">Logout
                            <i class="fa pull-right align-bottom"></i>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>