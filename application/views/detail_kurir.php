        <!-- page content -->
        <div class="right_col" role="main">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><a href="<?= base_url().'kurir?action=show'; ?>"><span class="fa fa-chevron-left"></span>&nbsp;</a> Data Kurir <?= $kurir->return ? '#'.$kurir->data->id : null;?> </h2>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php if ( ! $kurir->return): ?>
                    <h3 class="text-center">Maaf, data kurir tidak ditemukan!</h3>
                    <?php else:
                    $data = $kurir->data;
                    ?>
                    <form class="form-horizontal form-label-left" novalidate>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?= $data->nama ?>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Username</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?= $data->username ?>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Foto Profil</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <img src="<?= $data->foto_profil ; ?>" class="img-responsive img-thumbnail" width="auto" height="250">
                        </div>
                      </div> 


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">No Handphone</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?= $data->no_hp ?>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">No Plat</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?= $data->no_plat ?>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Tanggal bergabung</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?= humanTime($data->tanggal) ?>
                        </div>
                      </div>
                      </form>
                   <?php endif; ?>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->