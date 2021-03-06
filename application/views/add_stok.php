		<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Halaman Stok</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form class="form-horizontal form-label-left" novalidate id="formAdd" method="post">
                      <span class="section">Tambah Stok</span>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Menu <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="nama_menu" id="nama_menu" class="form-control" required="required" onchange="changeMenuAdd(this.options[this.selectedIndex].getAttribute('stok'),this.options[this.selectedIndex].getAttribute('sha'))">
                              <option stok="no_select" value="">-- Pilih Menu--</option>
                              <?php foreach ($menuList->data as $key => $value): ?>
                              <option stok="<?= $value->stok->sisa ?>" sha="<?= $value->sha ?>" value="<?= $value->id; ?>"><?= $value->nama; ?></option>
                              <?php endforeach; ?>
                          </select>
                        </div>
                      </div>  

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Jumlah<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="jumlahTambahStok1" class="form-control col-md-7 col-xs-12 inputNumberOnly" name="jumlah" autocomplete="off" required="required" type="text">
                          <span id="stokSekarang1"></span>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="button" onclick="this.form.reset()" class="btn btn-primary">Ulangi</button>
                          <button onclick="confirmAddStok(this.form,'<?= base_url() ?>menu?action=stok')" type="button" class="btn btn-success">Tambah</button>
                        </div>
                      </div>
                    </form>
                  </div>

                  <div class="x_content">
                    <form class="form-horizontal form-label-left" novalidate id="formUpdate" method="post">
                      <span class="section">Ubah Stok</span>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Menu <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="nama_menu" id="nama_menu" class="form-control" required="required" onchange="changeMenuUpdate(this.options[this.selectedIndex].getAttribute('stok'),this.options[this.selectedIndex].getAttribute('sha'))">
                              <option stok="no_select" value="">-- Pilih Menu--</option>
                              <?php foreach ($menuList->data as $key => $value): ?>
                              <option stok="<?= $value->stok->sisa ?>" sha="<?= $value->sha; ?>" value="<?= $value->id; ?>"><?= $value->nama; ?></option>
                              <?php endforeach; ?>
                          </select>
                        </div>
                      </div>  

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Jumlah<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="jumlahTambahStok2" class="form-control col-md-7 col-xs-12 inputNumberOnly" name="jumlah" autocomplete="off" required="required" type="text">
                          <span id="stokSekarang2"></span>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="button" onclick="this.form.reset()" class="btn btn-primary">Ulangi</button>
                          <button onclick="confirmUpdateStok(this.form , '<?= base_url() ?>menu?action=stok')" type="button" class="btn btn-success">Ubah</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->