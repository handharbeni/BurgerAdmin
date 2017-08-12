		<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Halaman Pengaturan</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form method="post" action="<?= base_url(); ?>do_action?method=setting" class="form-horizontal form-label-left" novalidate>
                      <span class="section">Ubah Pengaturan</span>
                      <?php if ( isset($this->session->userdata['return_settings'])): 
                      $x = explode("|" , $this->session->userdata('message_settings'));
                      ?>
                      <h5 class="text-center <?= $x[0] ?>"><?= $x[1]; ?></h5>
                      <?php 
                      endif; 
                      $this->session->unset_userdata( array('return_settings','message_settings'));
                      ?>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Biaya per-kilometer
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="km" autocomplete="off" type="text"><span>Sekarang: <strong>Rp. <?= $getKm->value ?></strong></span>
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
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
