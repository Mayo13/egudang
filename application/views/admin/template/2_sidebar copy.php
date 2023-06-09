<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="#" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="<?php echo base_url() ?>/assets/img/icons/brands/logosxx.png" />
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2"><img
                    src="<?php echo base_url() ?>/assets/img/icons/brands/nameLogosxx.png" /></span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>


    <ul class="menu-inner py-1">

        <!-- Dashboard -->
        <!-- <li class="menu-item active">
            <a href="<?php echo base_url() ?>dashboard" class="menu-link">
                <i class="menu-icon tf-icons">
                    <iconify-icon icon="uil:create-dashboard"></iconify-icon>
                </i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li> -->

        <?php
        $role_id = $this->session->userdata('role_id');

        // Summary Pencarian berdasarkan role id jika role id found maka akan diarahkan
        // Sesuai dengan ketentuan yaitu daftar dari menu 1 (judul) dan menu 2 (sub judul)                

        // dibawah ini query untuk mencari judul berdasarkan role id yang berlaku
        $queryMenu = "SELECT *
        FROM tbl_user_access
        WHERE role_id = '$role_id' AND is_active = '1'
        ORDER BY no_urut_sec ASC, no_urut_sub ASC";

        $menu = $this->db->query($queryMenu)->result_array();


        $queryMenu1 = "SELECT * 
        FROM tbl_user_access
        GROUP BY section_name";

        $group = $this->db->query($queryMenu1)->result_array();


        // var_dump($menu);
        ?>

        <?php foreach ($group as $grup) : ?>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">
                <?php echo $grup['section_name'] ?>
            </span>
        </li>

        <?php foreach ($menu as $menus) : ?>

        <?php if ($grup['section_name'] == $menus['section_name'] && $menus['is_submenu'] ==  0) : ?>
        <?php if ($menus['submenu_name'] ==  $sideActive) : ?>
        <li class="menu-item active">
            <a href="<?php echo $menus['url'] ?>" class="menu-link">
                <i class="menu-icon tf-icons">
                    <iconify-icon icon="<?php echo $menus['icons'] ?>"></iconify-icon>
                </i>
                <div data-i18n="Analytics">
                    <?php echo $menus['submenu_name'] ?>
                </div>
            </a>
        </li>
        <?php else : ?>
        <li class="menu-item">
            <a href="<?php echo $menus['url'] ?>" class="menu-link">
                <i class="menu-icon tf-icons">
                    <iconify-icon icon="<?php echo $menus['icons'] ?>"></iconify-icon>
                </i>
                <div data-i18n="Analytics">
                    <?php echo $menus['submenu_name'] ?>
                </div>
            </a>
        </li>
        <?php endif; ?>
        <?php endif; ?>

        <?php if ($grup['section_name'] == $menus['section_name'] && $menus['is_submenu'] ==  1) : ?>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons">
                    <iconify-icon icon="material-symbols:settings-outline-rounded"></iconify-icon>
                </i>
                <div data-i18n="Layouts">Settings</div>
            </a>
            <ul class="menu-sub">

                <?php
                            $sq1 = "SELECT * 
                    FROM tbl_user_access 
                    WHERE section_name = '$menus[section_name]'                    ";
                            $sq = $this->db->query($sq1)->result_array(); ?>


                <?php foreach ($sq as $sqmenu) : ?>
                <?php if ($sqmenu['submenu_name'] ==  $sideActive) : ?>
                <li class="menu-item active">
                    <a href="<?php echo $sqmenu['url'] ?>" class="menu-link">
                        <div data-i18n="Without menu"><?php echo $sqmenu['submenu_name'] ?></div>
                    </a>
                </li>
                <?php else : ?>
                <li class="menu-item">
                    <a href="<?php echo $sqmenu['url'] ?>" class="menu-link">
                        <div data-i18n="Without menu"><?php echo $sqmenu['submenu_name'] ?></div>
                    </a>
                </li>
                <?php endif; ?>
                <?php endforeach; ?>


            </ul>
        </li>

        <?php endif; ?>
        <?php endforeach; ?>
        <?php endforeach; ?>



        <!-- <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Main Menu</span>
        </li>

        <li class="menu-item">
            <a href="<?php echo base_url() ?>daftar-transaksi" class="menu-link">
                <i class="menu-icon tf-icons">
                    <iconify-icon icon="carbon:delivery-parcel"></iconify-icon>
                </i>
                <div data-i18n="Analytics">Daftar Transaksi</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="<?php echo base_url() ?>daftar-perangkat" class="menu-link">
                <i class="menu-icon tf-icons">
                    <iconify-icon icon="fluent:device-meeting-room-remote-32-regular"></iconify-icon>
                </i>

                <div data-i18n="Analytics">Daftar Perangkat</div>
            </a>
        </li>


        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Master</span>
        </li>

        <li class="menu-item">
            <a href="<?php echo base_url() ?>master-transaksi" class="menu-link">
                <i class="menu-icon tf-icons">
                    <iconify-icon icon="carbon:delivery-parcel"></iconify-icon>
                </i>
                <div data-i18n="Analytics">Master Transaksi</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="<?php echo base_url() ?>master-perangkat" class="menu-link">
                <i class="menu-icon tf-icons">
                    <iconify-icon icon="fluent:device-meeting-room-remote-32-regular"></iconify-icon>
                </i>

                <div data-i18n="Analytics">Master Perangkat</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="<?php echo base_url() ?>master-kode-barang" class="menu-link">
                <i class="menu-icon tf-icons">
                    <iconify-icon icon="ic:baseline-code"></iconify-icon>
                </i>

                <div data-i18n="Analytics">Master KodeBarang</div>
            </a>
        </li> -->

        <!-- <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Berita Acara</span>
        </li>

        <li class="menu-item">
            <a href="<?php echo base_url() ?>berita-acara-system" class="menu-link">
                <i class="menu-icon tf-icons">
                    <iconify-icon icon="carbon:document-protected"></iconify-icon>
                </i>

                <div data-i18n="Analytics">Berita Acara System</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="<?php echo base_url() ?>erita-acara-manual" class="menu-link">
                <i class="menu-icon tf-icons">
                    <iconify-icon icon="ion:document-attach-outline"></iconify-icon>
                </i>

                <div data-i18n="Analytics">Berita Acara Manual</div>
            </a>
        </li> -->

        <!-- <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Settings</span>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons">
                    <iconify-icon icon="material-symbols:settings-outline-rounded"></iconify-icon>
                </i>
                <div data-i18n="Layouts">Settings</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="<?php echo base_url() ?>layouts-without-menu.html" class="menu-link">
                        <div data-i18n="Without menu">Signature</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="<?php echo base_url() ?>layouts-without-navbar.html" class="menu-link">
                        <div data-i18n="Without navbar">Account User</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="<?php echo base_url() ?>layouts-container.html" class="menu-link">
                        <div data-i18n="Container">Kanim</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="<?php echo base_url() ?>layouts-fluid.html" class="menu-link">
                        <div data-i18n="Fluid">Kanwil</div>
                    </a>
                </li>
            </ul>
        </li> -->
    </ul>
</aside>