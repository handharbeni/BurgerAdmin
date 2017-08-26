    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><a href="<?= base_url().'outlet?action=show'; ?>"><span class="fa fa-chevron-left"></span>&nbsp;</a> Halaman Outlet</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php if ($this->session->userdata('outlet_update')): ?>
                    <h3 class="text-center"><?= $_SESSION['outlet_update']; ?></h3>
                    <?php 
                    $this->session->unset_userdata('outlet_update');
                    endif; ?>
                    <?php if ( ! $outlet->return): ?>
                    <h3 class="text-center">Outlet tidak ditemukan!</h3>
                    <?php else : 
                    $data = $outlet->data[0]; 
                    ?>
                    <form class="form-horizontal form-label-left" action="/outlet?action=update_outlet" novalidate method="post">
                      <span class="section">Ubah Outlet <?= '#'.$data->id; ?></span>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Outlet <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" autocomplete="off" name="outlet" required="required" type="text" value="<?= $data->outlet->nama_outlet; ?>">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Alamat <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="textarea" required="required" name="alamat" class="form-control col-md-7 col-xs-12"><?= $data->outlet->alamat; ?></textarea>
                        </div>
                      </div>

                      <hr />

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Latitude <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" autocomplete="off" name="lat" required="required" type="text" value="<?= $data->outlet->latitude ?>">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Longitude <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" autocomplete="off" name="long" required="required" type="text" value="<?= $data->outlet->longitude ?>">
                        </div>
                      </div>

                      <input type="hidden" name="x" value="<?= $data->username ?>" />
                      <input type="hidden" name="token" value="<?= $_GET['token']; ?>">
                      <hr />

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Username <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" autocomplete="off" name="username" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" autocomplete="off" name="password" type="password">
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
                    <?php endif ;?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->