		<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><a href="<?= base_url().'banner?action=show'; ?>"><span class="fa fa-chevron-left"></span>&nbsp;</a> Halaman Banner <?= $banner->return ? "#".$banner->data[0]->id : null; ?></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php if (  ! $banner->return): ?>
                    <h3 class="text-center">Banner tidak ditemukan!</h3>
                    <?php else: 
                    $data = $banner->data[0];
                    $resultHtml = null;
                    if ( $data->diubah->oleh == 'nothing')
                    {
                      $resultHtml = "Ditambahkan oleh : <strong>".$data->ditambahkan->oleh."</strong> pada: ".humantime($data->ditambahkan->tanggal_waktu);
                    }
                    else
                    {
                      $resultHtml = "Terakhir diubah oleh: <strong>".$data->diubah->oleh."</strong> pada: ".humantime($data->diubah->tanggal_waktu);
                    }
                    ?>
                    <form class="form-horizontal form-label-left" id="form" novalidate action="<?= base_url(); ?>do_action?method=update_banner" method="post">
                      <span class="section">Ubah Banner <small style="font-size:60%"><?= $resultHtml ?></small></span>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Banner <span class="required">*</span>
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
                          <input id="gambar" class="form-control col-md-7 col-xs-12" name="gambar" autocomplete="off" required="required" type="text" value="<?= $data->gambar ?>">
                        </div>
                      </div>

                      <input type="hidden" name="sha" value="<?= $this->input->get('token'); ?>" />

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Keterangan
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control col-md-7 col-xs-12" name="keterangan"><?= $data->keterangan == 'nothing' ? null : $data->keterangan ?></textarea>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Posisi <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12 inputNumberOnly" autocomplete="off" name="posisi" required="required" type="text"  value="<?= $data->posisi ?>">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Link Banner
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" autocomplete="off" name="link_banner" type="text" value="<?= $data->link == 'nothing' ? null : $data->link; ?>">
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
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