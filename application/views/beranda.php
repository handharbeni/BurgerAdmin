      <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><small><?= humantime(date('Y-m-d H:i:s')); ?></h3>
              </div>

              <div class="row">
              <div class="col-md-12">
                <div class="">
                  <div class="x_content">
                    <div class="row">
                      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                         <a href="<?= base_url() ?>pesanan"><div class="icon"><i class="fa fa-sticky-note-o"></i>
                          </div>
                          <div class="count"><?= count($order->data); ?></div>

                          <h3>Pesanan</h3>
                          <p>Pesanan yang tersedia.</p>
                          </a>
                        </div>
                      </div>

                      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <a href="<?= base_url() ?>kurir?action=show"><div class="icon" style="margin-right: 15px !important;"><i class="fa fa-motorcycle"></i>
                          </div>
                          <div class="count"><?= count($kurir->data); ?></div>

                          <h3>Kurir</h3>
                          <p>Kurir yang tersedia.</p>
                          </a>
                        </div>
                      </div>

                      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <a href="<?= base_url() ?>outlet?action=show"><div class="icon"><i class="fa fa-send"></i>
                          </div>
                          <div class="count"><?= count($outlet->data); ?></div>

                          <h3>Outlet</h3>
                          <p>Outlet yang tersedia.</p>
                          </a>
                        </div>
                      </div>

                      <div class="clearfix"></div>

                      <div class="animated flipInY col-lg-4 col-lg-4-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <a href="<?= base_url() ?>user?action=show"><div class="icon"><i class="fa fa-user"></i>
                          </div>
                          <div class="count"><?= count($userdata->data) ?></div>

                          <h3>Pengguna</h3>
                          <p>Pengguna pada aplikasi.</p>
                          </a>
                        </div>
                      </div>

                      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <a href="<?= base_url() ?>menu?action=show"><div class="icon"><i class="fa fa-book"></i>
                          </div>
                          <div class="count"><?= $menu->return ? count($menu->data) : 0 ?></div>

                          <h3>Menu</h3>
                          <p>Menu yang tersedia.</p>
                          </a>
                        </div>
                      </div>

                      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <a href="#"><div class="icon"><i class="fa fa-money"></i>
                          </div>
                          <div class="count"><?= count($userdata->data) ?></div>

                          <h3>Banner</h3>
                          <p>Banner yang tersedia.</p>
                          </a>
                        </div>
                      </div>

                      <div class="clearfix"></div>
                    </div>
                  </div>
                </div>
              </div>
              </div>

            </div>

            </div>
          </div>
        </div>
        <!-- /page content -->