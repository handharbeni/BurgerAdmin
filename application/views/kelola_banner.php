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
                    <h2>Banner yang tersedia (<?= count($userdata->data) ?>)</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <?php if( ! $userdata->return): ?>
                  <h3>Pengguna belum ada!</h3>
                  <?php else: ?>
                	<table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th class="text-center">No.</th>
                          <th class="text-center">Nama</th>
                          <th class="text-center">Keterangan</th>
                          <th class="text-center">Gambar</th>
                          <th class="text-center">Posisi</th>
                          <th class="text-center">Status</th>
                          <th colspan="3" style="text-align:center;">Aksi</th>
                        </tr>
                      </thead>

                      <tbody class="text-center">

                        <?php for($i = 0; $i <= count($userdata->data)-1; $i ++): 
                        $row = $userdata->data;
                        ?>
                        <tr>
                          <td><?= $i + 1; ?></td>
                        	<td>Banner Pertama</td>
                        	<td>ini banner pertama</td>
                          <td>img src</td>
                          <td>1</td>
                          <td>Aktif</td>
                        	<td><a href="/user?action=detail&token=<?= $row[$i]->key?>">Detail Pengguna</a></td>
                          <td><a href="#">Ubah</a></td>
                          <td><a href="">Hapus</a></td>
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