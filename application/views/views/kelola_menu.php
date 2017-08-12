		<!-- Page Content -->
		<div class="right_col" role="main">
			<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Kelola Menu</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Menu yang tersedia (<?= count($menu->data); ?>)</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <?php if( ! $menu->return): ?>
                  <h3>Menu belum ada!</h3>
                  <?php else: ?>
                	<table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th class="text-center">No.</th>
                          <th class="text-center">Nama Item</th>
                          <th class="text-center">Gambar</th>
                          <th class="text-center">Harga</th>
                          <th class="text-center">Kategori</th>
                          <th colspan="3" style="text-align:center;">Aksi</th>
                        </tr>
                      </thead>


                      <tbody class="text-center">

                        <?php for($i = 0 ; $i < count($menu->data); $i ++): 
                        $row = $menu->data[$i]; 
                        ?>
                        <tr>
                          <td style="padding-top:20px;"><?= $i + 1;?></td>
                        	<td style="padding-top:20px;"><?= $row->nama ?></td>
                        	<td class="text-center"><img alt="error" class="img-thumbnail img-responsive" style="width:45px;height:40px;" src="<?= $row->gambar ?>"></td>
                        	<td style="padding-top:20px;"><?= $row->harga ?></td>
                        	<td style="padding-top:20px;"><?= $row->kategori ?></td>
                        	<td style="padding-top:20px;"><a href="">Detail Menu</a></td>
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