		<!-- Page Content -->
		<div class="right_col" role="main">
			<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Kelola Outlet</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Oulet yang tersedia (<?= count($outletdata->data) ?>)</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <?php if( ! $outletdata->return): ?>
                  <h3>Outlet belum ada!</h3>
                  <?php else: ?>
                	<table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th class="text-center">No.</th>
                          <th class="text-center">Nama Outlet</th>
                          <th class="text-center">Alamat</th>
                          <th colspan="3" style="text-align:center;">Aksi</th>
                        </tr>
                      </thead>

                      <tbody class="text-center">

                        <?php for($i = 0; $i <= count($outletdata->data)-1; $i ++): 
                        $row = $outletdata->data;
                        ?>
                        <tr>
                          <td><?= $i + 1; ?></td>
                        	<td><?= $row[$i]->nama_outlet ?></td>
                        	<td><?= $row[$i]->alamat ?></td>
                        	<td><a href="/outlet?action=detail&token=<?= $row[$i]->token ?>">Detail Outlet</a></td>
                          <td><a href="">Ubah</a></td>
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