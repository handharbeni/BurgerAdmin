        <!-- page content -->
        <div class="right_col" role="main">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><a href="<?= base_url().'outlet?action=show'; ?>"><span class="fa fa-chevron-left"></span>&nbsp;</a> Data Outlet</h2>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php if ( ! $outlet->return): ?>
                    <h3 class="text-center">Maaf, data outlet tidak ditemukan!</h3>
                    <?php else:
                    $data = $outlet->data[0];
                    ?>
                    <form class="form-horizontal form-label-left" novalidate>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama Outlet</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?= $data->outlet->nama_outlet ?>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Alamat Outlet</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <?= $data->outlet->alamat ?>
                        </div>
                      </div>

                      <hr/>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Username</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?= $data->username; ?>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Latitude</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?= $data->outlet->latitude ?>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Longitude</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?= $data->outlet->longitude ?>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="https://www.google.com/maps/preview/@<?= $data->outlet->latitude; ?>,<?= $data->outlet->longitude;?>,17z" style="border-bottom:1px dashed #000" target="_blank">Lihat di Google Maps</a>
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