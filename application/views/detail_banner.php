        <!-- page content -->
        <div class="right_col" role="main">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <?php
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
                    <h2><a href="<?= base_url().'banner?action=show'; ?>"><span class="fa fa-chevron-left"></span>&nbsp;</a> Data Banner <?= $banner->return ? '#'.$banner->data[0]->id : null;?> <?= ! $banner->return ? null :
                        "<small><br/>".$resultHtml."</small>" ?></h2>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php if ( ! $banner->return): ?>
                    <h3 class="text-center">Maaf, data banner tidak ditemukan!</h3>
                    <?php else:
                    ?>
                    <form class="form-horizontal form-label-left" novalidate>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama Banner</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?= $data->nama ?>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Gambar</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <img src="<?= $data->gambar ; ?>" class="img-responsive img-thumbnail" width="auto" height="250">
                        </div>
                      </div> 

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Keterangan</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?= $data->keterangan == 'nothing' ? 'tidak ada' : $data->keterangan; ?>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Link</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?= $data->link == 'nothing' ? 'tidak ada' : $data->link; ?>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Posisi</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?= $data->posisi ?>
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