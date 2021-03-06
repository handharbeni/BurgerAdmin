        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title text-center" style="border: 0;">
              <a href="<?= base_url() ?>" class="site_title"><span>Burger Tahu</span></a>
            </div>

            <div class="clearfix"></div>

            <?php if($this->session->userdata('outletKey')): ?>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="/build/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Selamat Datang,</span>
                <h2><?= $admindata->outlet->nama_outlet;?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->
            <?php endif; ?>
            <br/>
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="<?= base_url() ?>"><i class="fa fa-home"></i> Beranda</a></li>
                  <li><a href="<?= base_url() ?>pesanan"><i class="fa fa-sticky-note-o"></i> Pesanan</a></li>
                  <li><a><i class="fa fa-book"></i>Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= base_url() ?>menu?action=show">Lihat Menu</a></li>
                      <li><a href="<?= base_url() ?>menu?action=add">Tambah Menu</a></li>
                      <li><a href="<?= base_url() ?>menu?action=add_stok">Stok</a></li>
                    </ul>
                  </li>
                
                  <?php if ($this->sessionAdmin): ?>
                  <li><a><i class="fa fa-user"></i>Pengguna <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= base_url() ?>user?action=show">Lihat Pengguna</a></li>
                      <!-- <li><a href="<?= base_url() ?>user?action=add">Tambah Pengguna</a></li> -->
                    </ul>
                  </li>

                  <li><a><i class="fa fa-send"></i>&nbsp;Outlet <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= base_url() ?>outlet?action=show">Lihat Outlet</a></li>
                      <li><a href="<?= base_url() ?>outlet?action=add">Tambah Outlet</a></li>
                    </ul>
                  </li>
                  <?php endif;?>
                  <li><a><i class="fa fa-motorcycle"></i>&nbsp;Kurir <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= base_url() ?>kurir?action=show">Lihat Kurir</a></li>
                      <li><a href="<?= base_url() ?>kurir?action=add">Tambah Kurir</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-money"></i>&nbsp;Banner <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= base_url() ?>banner?action=show">Lihat Banner</a></li>
                      <li><a href="<?= base_url() ?>banner?action=add">Tambah Banner</a></li>
                    </ul>
                  </li>
                  <li><a href="<?= base_url() ?>logout"><i class="fa fa-sign-out"></i> Keluar</a></li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->
          </div>
        </div>