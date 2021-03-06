		<!-- Page Content -->
		<div class="right_col" role="main">
			<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Kelola Banner</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Banner yang tersedia (<?= $banner->return ? count($banner->data) : 0 ?>)</h2>
                    <div class="clearfix"></div>
                    <?php if ( $this->session->userdata('banner_message')): ?>
                    <h4 class="text-center"><?= $this->session->userdata('banner_message'); ?></h4>
                    <?php 
                    $this->session->unset_userdata('banner_message');
                    endif; ?>
                    <?php if ( $this->session->userdata('hapus_banner')): ?>
                    <h5>Banner berhasil dihapus. <a href="<?= base_url() ?>banner?action=hapus&token=<?= $this->session->userdata('hapus_banner'); ?>&undo=true">Tidak jadi</a></h5>
                   <?php 
                   $this->session->unset_userdata('hapus_banner');
                   endif; ?>
                  </div>
                  <div class="x_content">
                  <?php if( ! $banner->return): ?>
                  <h3>Banner belum ada!</h3>
                  <?php else: ?>
                	<table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th class="text-center">No.</th>
                          <th class="text-center">Posisi</th>
                          <th class="text-center">Nama</th>
                          <th class="text-center">Keterangan</th>
                          <th colspan="3" style="text-align:center;">Aksi</th>
                        </tr>
                      </thead>

                      <tbody class="text-center">

                        <?php for($i = 0; $i <= count($banner->data)-1; $i ++): 
                        $row = $banner->data;
                        ?>
                        <tr>
                          <td><?= $i + 1; ?></td>
                           <td><?= $row[$i]->posisi ?></td>
                          <td><?= $row[$i]->nama ?></td>
                          <td><?= strlen($row[$i]->keterangan > 20) ? 
                            substr($row[$i]->keterangan, 0,20).'...' : $row[$i]->keterangan; ?></td>
                        	<td><a href="<?= base_url() ?>banner?action=detail&token=<?= $row[$i]->sha ?>">Detail Banner</a></td>
                          <td><a href="<?= base_url() ?>banner?action=edit&token=<?= $row[$i]->sha ?>">Ubah</a></td>
                          <td style="cursor: default;"><a onclick="deleteBanner('<?= base_url(); ?>banner?action=hapus&token=<?= $row[$i]->sha ?>','<?= $row[$i]->nama ?>')">Hapus</a></td>
                        </tr>
                      <?php endfor; ?>
                    </table>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
		</div>