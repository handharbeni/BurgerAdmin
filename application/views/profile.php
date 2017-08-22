		<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Halaman Profile</h2>
                    <div class="clearfix"></div>
                    <?php if ( $this->session->userdata('error_profile')): ?>
                    <h4 class="text-center"><?= $this->session->userdata('error_profile'); ?></h4>
                    <?php  
                    $this->session->unset_userdata('error_profile');
                    endif;
                    ?>
                  </div>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" novalidate method="post" action="<?= base_url() ?>profile?method=do_update">
                      <span class="section">Ubah Data</span>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Username <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="username" autocomplete="off" required="required" type="text">
                          <span>Username sekarang : <strong><?= $admin->data[0]->username ?></strong></span>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Password Baru <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="pwd" autocomplete="off" required="required" type="password">
                        </div>
                      </div>

                      <hr/>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Password sekarang <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="now_pwd" autocomplete="off" required="required" type="password">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Konfirmasi password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="now_pwd_conf" autocomplete="off" required="required" type="password">
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