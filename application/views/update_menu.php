		<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ubah Menu </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php if ( ! $menu->return): ?>
                     <h3 class="text-center">Maaf, data menu tidak ditemukan!</h3>
                    <?php else: 
                    $data = $menu->data[0];
                    ?>
                    <form class="form-horizontal form-label-left" action="<?= base_url();?>do_action?method=update_menu" method="post" novalidate>
                      <span class="section">Ubah Menu <?= "#".$data->id ?></span>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Menu <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="nama" autocomplete="off" required="required" type="text" value="<?= $data->nama ?>">
                        </div>
                      </div>

                      <!-- <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Gambar <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input required="required" type="file" />
                        </div>
                      </div> -->

                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">URL Gambar <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="gambar" autocomplete="off" required="required" type="text" value="<?= $data->gambar ?>"> 
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Harga <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" autocomplete="off" name="harga" required="required" type="text" value="<?= $data->harga ?>">
                        </div>
                      </div>

                      <input type="hidden" name="sha" value="<?= $this->input->get('sha'); ?>" />

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kategori <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="kategori" class="form-control" required="required">
                              <option value="Makanan">Makanan</option>
                              <option value="Minuman">Minuman</option>
                          </select>
                        </div>
                      </div>  

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="button" onclick="this.form.reset()" class="btn btn-primary">Ulangi</button>
                          <button id="send" type="submit" class="btn btn-success">Ubah</button>
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
        <!-- /page content -->