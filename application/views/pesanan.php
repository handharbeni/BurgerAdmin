		<!-- Page Content -->
		<div class="right_col" role="main">
			<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Kelola Pesanan</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pesanan yang tersedia (<?= count($order->data)?>)</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                	<table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama User</th>
                          <th>Alamat Kirim</th>
                          <th>Kurir</th>
                          <th>Outlet</th>
                          <th>Status</th>
                          <th>Jumlah Item</th>
                          <th>Tanggal Pesan</th>
                          <th colspan="2" style="text-align:center;">Aksi</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php for($i = 0; $i <= count($order->data)-1; $i++): ?>
                        <tr>
                          <td><?= $i+1; ?></td>
                        	<td><?= $order->data[$i]->user->nama; ?></td>
                        	<td><?= $order->data[$i]->alamat_kirim; ?></td>
                        	<td><?= ($order->data[$i]->kurir == 'nothing') ? 
                          "<strong>Belum Ada</strong>" : $order->data[$i]->kurir->nama; ?></td>
                        	<td><?= $order->data[$i]->outlet->outlet; ?></td>
                        	<td><i><?= $order->data[$i]->status->value ?></i></td>
                        	<td><?= count($order->data[$i]->items); ?></td>
                        	<td><?= $order->data[$i]->tanggal.' '.$order->data[$i]->jam ?></td>
                        	<td style="text-align:center;"><a href="/pesanan?action=detail&id_order=<?= $order->data[$i]->id_order ?>">Detail Pesanan</a></td>
<<<<<<< HEAD
                          <?php if ($order->data[$i]->kurir == 'nothing' && $order->data[$i]->status->key == 1): ?>
                        	<td style="text-align:center;cursor: default;"><a onclick="acceptOrder()" id="accept-order">Terima</a></p></td>
                          <?php elseif ($order->data[$i]->kurir == 'nothing' && $order->data[$i]->status->key == 2): ?>
                          <td style="text-align:center;cursor: default;"><a onclick="acceptOrder()" id="accept-order">Kirim</a></p></td>
                          <?php elseif($order->data[$i]->kurir != 'nothing'): ?>
                        	<td style="text-align:center;cursor: default;"><a id="cancel-order" data-id="<?= $order->data[$i]->id_order; ?>" onclick="cancelOrder()">Batalkan</a></td>
                          <?php elseif($order->data[$i]->status->key == 6): ?>
                          <td style="text-align:center;cursor: default;"><p id="order-completed" onclick="orderCompleted()">Selesai</p></td>
                          <?php elseif($order->data[$i]->status->key == 7): ?>
                          <td style="text-align:center;cursor: default;"><p>Sudah dihapus</p></td>
                          <?php if ($order->data[$i]->kurir == 'nothing'): ?>
                        	<td style="text-align:center;"><a href="/pesanan?action=accept&id_order=<?= $order->data[$i]->id_order ?>">Terima</a></td>
                          <?php else: ?>
                        	<td style="text-align:center;"><a href="/pesanan?action=cancel&id_order=<?= $order->data[$i]->id_order ?>">Batalkan</a></td>
                          <?php else: ?>
                          <td style="text-align:center;cursor: default;"><p onclick="orderProcessing()">Proses</p></td>
                          <?php endif; ?>
                          <?php if ($order->data[$i]->kurir == 'nothing' && $order->data[$i]->status->key == 7): ?>
                          <td style="text-align: center;cursor: default;"><a id="delete-order" onclick="deleteOrderPermanent()">Hapus Permanen</a></td>
                          <?php else: ?>
                            <td style="text-align: center;cursor: default;"><a id="delete-order" onclick="deleteOrder()">Hapus</a></td>
                          <?php endif; ?>
                        </tr>
                        <?php endfor; ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
		</div>