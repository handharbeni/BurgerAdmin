        <!-- page content -->
        <div class="right_col" role="main">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><a href="<?= base_url().'user?action=show'; ?>"><span class="fa fa-chevron-left"></span>&nbsp;</a> Data Pengguna <?= "#".$user->data->id ?></h2>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php
                    $data = $user->data;
                    ?>
                    <form class="form-horizontal form-label-left" novalidate>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama Pengguna</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <?= $data->nama ; ?>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Email</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <?= $data->email ; ?>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">No HP</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?= $data->no_hp ?>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Alamat</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?= $data->alamat ?>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Tanggal Bergabung</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?= humanTime($data->terdaftar); ?>
                        </div>
                      </div>
                      </form>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->