    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <?php if ( ! $kurir->return): ?>
                    <h3 class="text-center">Maaf, data kurir tidak ditemukan!</h3>
                    <?php else: ?>
                    <h2>Halaman Kurir</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" action="<?= base_url() ?>do_action?method=update_kurir" method="post" novalidate>
                      <span class="section">Ubah Kurir <?= $kurir->return ? '#'.$kurir->data->id : null;?></span>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="nama" autocomplete="off" type="text">
                          <span class="text-center">* abaikan jika tidak ada perubahan</span>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Username
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" autocomplete="off" name="username" type="text">
                          <span class="text-center">* abaikan jika tidak ada perubahan</span>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Password
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" autocomplete="off" name="password" type="password">
                          <span class="text-center">* abaikan jika tidak ada perubahan</span>
                        </div>
                      </div>

                      <!-- <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Foto Profil
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" />
                        </div>
                      </div> -->

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">URL Gambar
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="gambar" autocomplete="off" type="text">
                          <span class="text-center">* abaikan jika tidak ada perubahan</span>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nomor Handphone
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" autocomplete="off" name="no_hp" type="text">
                          <span class="text-center">* abaikan jika tidak ada perubahan</span>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nomor Plat
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" autocomplete="off" name="no_plat" type="text">
                          <span class="text-center">* abaikan jika tidak ada perubahan</span>
                        </div>
                      </div>

                      <input type="hidden" name="kurir_token" value="<?= $kurir->data->token; ?>">

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="button" onclick="this.form.reset()" class="btn btn-primary">Ulangi</button>
                          <button id="send" type="submit" class="btn btn-success">Ubah</button>
                        </div>
                      </div>
                    </form>
                  </div>
                    <?php endif ;?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->