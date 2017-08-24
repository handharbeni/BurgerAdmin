        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Kelola Kurir</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                    <?php if ( $this->session->userdata('hapus_kurir')): ?>
                    <h5>Kurir berhasil dihapus. <a href="<?= base_url() ?>kurir?action=hapus&token=<?= $this->session->userdata('hapus_kurir'); ?>&undo=true">Tidak jadi</a></h5>
                   <?php 
                   $this->session->unset_userdata('hapus_kurir');
                   endif; ?>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12 text-center"><!-- nothing --></div>
                        <div class="clearfix"></div>
                        <?php if( ! $kurir->return): ?>
                        <h3>Kurir belum ada!</h3>
                        <?php else: ?>
                        <?php for($i = 0 ; $i <= count($kurir->data)-1; $i ++): 
                        $row = $kurir->data; ?>
                        <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <div class="left col-xs-7">
                              <h2><?= $row[$i]->nama; ?></h2>
                              <p><strong><?= $row[$i]->username; ?></strong></p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-motorcycle"></i>&nbsp;<?= $row[$i]->no_plat; ?></li>
                                <li><i class="fa fa-phone"></i>&nbsp;<?= $row[$i]->no_hp; ?></li>
                              </ul>
                            </div>
                            <div class="right col-xs-5 text-center">
                              <img src="<?= $row[$i]->foto_profil ?>" alt="Gambar tidak ditemukan" class="img-circle img-responsive">
                            </div>
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            <div class="col-xs-12 col-sm-12 emphasis">
                              <a href="/kurir?action=detail&token=<?= $row[$i]->key ?>"  class="btn btn-primary btn-xs"><i class="fa fa-user"> </i> Lihat Kurir</a>
                              <a href="/kurir?action=edit&token=<?= $row[$i]->key ?>"  class="btn btn-success btn-xs"><i class="fa fa-user"> </i> Ubah</a>
                              <a onclick="deleteKurir('<?= base_url(); ?>kurir?action=hapus&token=<?= $row[$i]->key ?>' , '<?= $row[$i]->nama ?>')" class="btn btn-danger btn-xs"><i class="fa fa-user"> </i> Hapus</a>
                            </div>
                          </div>
                        </div>
                        </div>
                        <?php endfor; ?>
                        <?php endif; ?>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->