		<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><a href="<?= base_url().'pesanan'; ?>"><span class="fa fa-chevron-left"></span>&nbsp; Terima pesanan</a></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" id="form-accept" action="<?= base_url(); ?>do_action?method=accept_order" method="post">
                      <?php if ( ! $order->return): ?>
                       <span class="section">Maaf, data pesanan tidak ditemukan!</span>
                     <?php elseif( $order->data->kurir != 'nothing'): ?>
                      <span class="section">Maaf, pesanan sudah di ambil kurir <a href="<?= base_url() ?> kurir?action=detail&token=<?= $order->data->kurir->token; ?>"><strong><?= $order->data->kurir->nama; ?></strong></a>!</span>
                     <?php else: ?>
                      <span class="section">Pilih kurir, untuk melanjutkan</span>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Kurir
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="hidden" name="order" value="<?= $order->data->id_order; ?>" />
                          <select name="kurir" id="kurir" onchange="changeKurir(this.value)" class="form-control">
                            <option name="">--Pilih Kurir--</option>
                            <?php if ( $kurir->return):
                            foreach($kurir->data as $row):
                            ?>
                            <option name="kurir_value" value="<?= $row->id; ?>" id="id_kurir"><?= $row->nama; ?></option>
                            <?php
                            endforeach;
                            endif; ?>
                          </select>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success">Terima</button>
                        </div>
                      </div>
                    <?php endif; ?>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
