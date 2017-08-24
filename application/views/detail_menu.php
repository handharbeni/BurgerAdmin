        <!-- page content -->
        <div class="right_col" role="main">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><a href="<?= base_url().'menu?action=show'; ?>"><span class="fa fa-chevron-left"></span>&nbsp;</a> Data Menu <?= $menu->return ? "#".$menu->data[0]->id : '' ?></h2>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php if ( ! $menu->return): ?>
                    <h3 class="text-center">Maaf, data menu tidak ditemukan!</h3>
                    <?php else:
                    $data = $menu->data[0];
                    ?>
                    <form class="form-horizontal form-label-left" novalidate>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama Menu</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <?= $data->nama ; ?>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Gambar</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <img src="<?= $data->gambar ; ?>" class="img-responsive img-thumbnail" width="auto" height="250">
                        </div>
                      </div> 

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Harga</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <?= $data->harga ; ?>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Kategori</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <?= $data->kategori ; ?>
                        </div>
                      </div>

                      <hr/>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Stok Semua</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <?= $data->stok->jumlah ; ?>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Terpakai</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <?= $data->stok->digunakan ; ?>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Tersisa</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <?= $data->stok->sisa ; ?>
                        </div>
                      </div>
                     <!--  <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="https://www.google.com/maps/preview/@<?= $data->outlet->latitude; ?>,<?= $data->outlet->longitude;?>,17z" style="border-bottom:1px dashed #000" target="_blank">Lihat di Google Maps</a>
                        </div>
                      </div> -->
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