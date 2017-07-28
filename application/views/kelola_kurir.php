		<!-- Page Content -->
		<div class="right_col" role="main">
			<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Kelola Kurir</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Kurir yang tersedia (<?= count($kurir->data); ?>)</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <?php if( ! $kurir->return): ?>
                  <h3>Kurir belum ada!</h3>
                  <?php else: ?>
                	<table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th class="text-center">Nama Kurir</th>
                          <th class="text-center">Foto</th>
                          <th class="text-center">No HP</th>
                          <th class="text-center">Plat Nomor</th>
                          <th colspan="3" style="text-align:center;">Aksi</th>
                        </tr>
                      </thead>


                      <tbody class="text-center">

                        <?php for($i = 0 ; $i <= count($kurir->data)-1; $i ++): 
                        $row = $kurir->data; 
                        ?>
                        <tr>
                        	<td style="padding-top:20px;"><?= $row[$i]->nama; ?></td>
                        	<td class="text-center"><img alt="error" class="img-thumbnail img-responsive" style="width:45px;height:40px;" src="<?= $row[$i]->foto_profil; ?>""></td>
                        	<td style="padding-top:20px;"><?= $row[$i]->no_hp; ?></td>
                        	<td style="padding-top:20px;"><?= $row[$i]->no_plat; ?></td>
                        	<td style="padding-top:20px;"><a href="/kurir?action=detail&token=<?= $row[$i]->key ?>">Detail Kurir</a></td>
                        	<td style="padding-top:20px;"><a href="">Ubah</a></td>
                        	<td style="padding-top:20px;"><a href="">Hapus</a></td>
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