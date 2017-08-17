        <!-- page content -->
        <div class="right_col" role="main">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><a href="<?= base_url().'pesanan'; ?>"><span class="fa fa-chevron-left"></span>&nbsp;</a> Data Pesanan</h2>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php if ( ! $order->return): ?>
                    <h3 class="text-center">Maaf, data pesanan tidak ditemukan!</h3>
                    <?php else: 
                    $data = $order->data;
                    ?>
                    <?php if ( $data->kurir != 'nothing'): ?>
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Outlet foto -->
                          <img class="img-responsive avatar-view" src="<?= $data->kurir->foto_profil;?>" style="width:220px !important; height:220px !important;" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                      <h3><?= $data->kurir->nama ?></h3>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-phone user-profile-icon"></i> <?= $data->kurir->no_hp ?>
                        </li>

                         <li><i class="fa fa-motorcycle user-profile-icon"></i> <?= $data->kurir->no_plat ?>
                        </li>
                      </ul>
                    </div>
                    <?php else: ?>
                      <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                          <h3>Kurir belum ada!</h3>
                      </div>
                   <?php endif; ?>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Pesanan: <?= humantime($data->tanggal.' '.$data->jam); ?></h2>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <ul class="list-unstyled timeline">
                          <li>
                            <div class="block">
                              <div class="tags">
                                <a class="tag" style="cursor:default;">
                                  <span>Pembeli</span>
                                </a>
                              </div>
                              <div class="block_content">
                                <h2 class="title"><?= ($data->user->nama != null) 
                                ? $data->user->nama : 'Tidak Ada'; ?></h2>
                                <p class="excerpt">
                                <span class="fa fa-envelope"></span>&nbsp;<?= ($data->user->email != null) 
                                ? $data->user->email : 'Tidak Ada'; ?><br/>
                                <span class="fa fa-phone"></span>&nbsp;<?= ( $data->user->no_hp != null) 
                                ? $data->user->no_hp : 'Tidak Ada'; ?><br/>
                                <span class="fa fa-map-marker"></span>&nbsp;<?= ($data->user->alamat != null)
                                ? $data->user->alamat : 'Tidak Ada'; ?></p>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="block">
                              <div class="tags">
                                <a class="tag" style="cursor:default;">
                                  <span>Lainnya</span>
                                </a>
                              </div>
                              <div class="block_content">
                                <h5>Alamat kirim</h5>
                                <h2 class="title"><strong><?= ( $data->alamat_kirim != null) ? $data->alamat_kirim : 'Tidak Ada'; ?></strong></h2>
                                <h5>Total belanja</h5>
                                <h2 class="title"><strong><?= ( $data->total_belanja != null) ? $data->total_belanja : 'Tidak Ada'; ?></strong></h2>
                                <h5>Status Pemesanan</h5>
                                <h2 class="title"><strong><?= ( $data->status->value != null) ? $data->status->value : 'Tidak Ada'; ?></strong></h2>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="block">
                              <div class="tags">
                                <a class="tag" style="cursor:default;">
                                  <span>Outlet</span>
                                </a>
                              </div>
                              <div class="block_content">
                                <h5>Outlet</h5>
                                <h2 class="title"><strong><?= ( $data->outlet->outlet != null) 
                                ? $data->outlet->outlet : 'Tidak Ada'; ?></strong></h2>
                                <h5>Alamat</h5>
                                <h2 class="title"><strong><?= ( $data->outlet->alamat != null) 
                                ? $data->outlet->alamat : 'Tidak Ada'; ?></strong></h2>
                            </div>
                          </li>
                          <li>
                            <div class="block">
                              <div class="tags">
                                <a class="tag" style="cursor:default;">
                                  <span>Menu</span>
                                </a>
                              </div>
                              <div class="block_content">
                                <ul class="list-unstyled msg_list">
                                <?php for($i = 0; $i <= count($data->items) - 1; $i ++): 
                                $item = $data->items[$i];
                                ?>
                                <li>
                                  <a>
                                    <span class="image">
                                      <img style="height:61px !important; width: 61px !important;" src="<?= $item->menu->gambar; ?>" alt="img" />
                                    </span>
                                    <span style="font-size:13px"><?= $item->menu->nama_menu; ?> (<?= $item->jumlah; ?>)</span>
                                    <br/>
                                    <span style="font-size:13px"><?= $item->harga; ?></span>
                                    <span style="font-size:13px;display:block!important;margin-left:65px;width:90%!important;"><?= ($item->keterangan == 'nothing') ? 'Tidak ada keterangan' : $item->keterangan;?>
                                    </span>
                                  </a>
                                </li>
                              <?php endfor; ?>
                                </ul>
                              </div>
                            </div>
                          </li>
                        </ul>

                      </div>
                    </div>
                    <?php endif; ?>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->