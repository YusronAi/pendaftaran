<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="img/<?= session()->get('login')['foto']; ?>" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="/" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Pendaftaran</span> </a>
                <div class="nav_list">
                    <a href="/" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                    <a href="/pasien" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Pasien</span> </a>
                    <!-- <a href="#" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Messages</span> </a> -->
                    <!-- <a href="#" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Bookmark</span> </a> <a href="#" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Files</span> </a> -->

                    <?php if (session()->get('login')['role'] == "admin") : ?>

                        <a href="/dokter" class="nav_link"> <i class='bx bx-briefcase nav_icon'></i> <span class="nav_name">Dokter</span> </a>

                    <?php endif; ?>

                    <?php if (session()->get('login')['role'] == "admin") : ?>

                        <a href="/poliklinik" class="nav_link"> <i class='bx bx-home-heart nav_icon'></i> <span class="nav_name">Poliklinik</span> </a>

                    <?php endif; ?>

                    <a href="/laporan" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Laporan</span> </a>
                </div>

            </div> <a href="/logout" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light m-100">
        <div style="width: 100; height: 100px; "></div>
        <?= $this->renderSection('content'); ?>
    </div>
    <!--Container Main end-->