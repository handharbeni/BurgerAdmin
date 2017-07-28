		<!-- Page Content -->
		<div class="right_col" role="main">
			<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Kelola Pengguna</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pengguna yang tersedia (<?= count($userdata->data) ?>)</h2>
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
                          <th class="text-center">Email</th>
                          <th class="text-center">No HP</th>
                          <th class="text-center">Alamat</th>
                          <th class="text-center">Tanggal Daftar</th>
                          <th colspan="2" style="text-align:center;">Aksi</th>
                        </tr>
                      </thead>

                      <tbody class="text-center">

                        <?php for($i = 0; $i <= count($userdata->data)-1; $i ++): 
                        $row = $userdata->data;
                        ?>
                        <tr>
                          <td><?= $i + 1; ?></td>
                        	<td><?= $row[$i]->nama ?></td>
                        	<td><?= $row[$i]->email ?></td>
                        	<td><?= $row[$i]->no_hp ? $row[$i]->no_hp : "Belum Ada" ?></td>
                        	<td><?= $row[$i]->alamat ? $row[$i]->alamat : "Belum Ada" ?></td>
                          <td><?= $row[$i]->tanggal_buat ? $row[$i]->tanggal_buat : "Belum Ada" ?></td>
                        	<td><a href="/user?action=detail&token=<?= $row[$i]->key?>">Detail Pengguna</a></td>
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