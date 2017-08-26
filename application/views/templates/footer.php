        <!-- footer content -->
        <footer>
          <div class="pull-right">
              Burger Tahu &copy; 2017</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <!-- jQuery -->
    <script src="<?=base_url()?>/vendors/jquery/dist/jquery.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        jQuery.fn.ForceNumericOnly =
        function()
        {
            return this.each(function()
            {
                $(this).keydown(function(e)
                {
                    var key = e.charCode || e.keyCode || 0;
                    // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
                    // home, end, period, and numpad decimal
                    return (
                        key == 8 || 
                        key == 9 ||
                        key == 13 ||
                        key == 46 ||
                        key == 110 ||
                        key == 190 ||
                        (key >= 35 && key <= 40) ||
                        (key >= 48 && key <= 57) ||
                        (key >= 96 && key <= 105));
                });
            });
        };

        $(".inputNumberOnly").ForceNumericOnly();
     });
    </script>
    <!-- Bootstrap -->
    <script src="<?=base_url()?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?=base_url()?>/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?=base_url()?>/vendors/nprogress/nprogress.js"></script>
    <!-- jQuery custom content scroller -->
    <script src="<?=base_url()?>/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

    <?php if (@$uri): ?>
     <!-- FastClick -->
    <script src="<?=base_url()?>/vendors/fastclick/lib/fastclick.js"></script>
    <!-- iCheck -->
    <script src="<?=base_url()?>/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="<?=base_url()?>/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?=base_url()?>/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?=base_url()?>/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?=base_url()?>/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?=base_url()?>/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?=base_url()?>/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?=base_url()?>/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?=base_url()?>/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?=base_url()?>/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?=base_url()?>/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?=base_url()?>/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?=base_url()?>/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?=base_url()?>/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?=base_url()?>/vendors/pdfmake/build/vfs_fonts.js"></script>
    <?php endif; ?>
    <?php if (@$action): ?>

    <script src="<?=base_url()?>/vendors/validator/validator.js"></script>
    <?php endif; ?>
    <!-- Custom Theme Scripts -->
    <script src="<?=base_url()?>/build/js/custom.min.js"></script> 

    <!-- Sweet alert -->
    <script type="text/javascript" src="<?=base_url()?>/build/js/sweetalert.min.js"></script>

    <?php if ( $this->uri->segment(1) == 'menu'): ?>
    <script type="text/javascript">
        $("#stokSekarang").hide();

        function deleteMenu(nextUri)
        {
          swal({
                  title: "Hapus menu?",
                  text: "Menu akan dihapus apabila memilih <strong>Ya</strong>",
                  type: "warning",
                  html: true,
                  showCancelButton: true,
                  closeOnConfirm: false,
                  showLoaderOnConfirm: true,
                  confirmButtonText: "Ya, hapus",
                  cancelButtonText: "Keluar"
                },
                function(){
                  setTimeout(function(){
                      window.location.href = nextUri;
                  }, 2000);
                });
        }

        this.stok = null;
        this.jumlahStok = null;

        function changeMenu(stok)
        {
          this.stok = stok;
          $("#stokSekarang").show();
          $("#stokSekarang").html("Stok sekarang: <strong>" + stok + "</strong>");
        }

        function confirmAddStok(form)
        {   
            if ( form.jumlahTambahStok.value == null || form.jumlahTambahStok.value == ''
              || form.nama_menu.value == null || form.nama_menu.value == '')
            {
              return false;
            }
            else
            {
              if ( this.stok == '' || this.stok == null)
              {
                this.jumlahStok = 0;
              }
              else
              {
                this.jumlahStok = parseInt(this.stok);
              }

              this.total = this.jumlahStok + parseInt(form.jumlahTambahStok.value);
              swal("Tambah Stok?", "Apabila setuju total stok akan menjadi " + this.total , "warning");
            }
        }
    </script>
    <?php endif; ?>

     <?php if ( $this->uri->segment(1) == 'user'): ?>
    <script type="text/javascript">
        function deleteUser(nextUri)
        {
          swal({
                  title: "Hapus pengguna?",
                  text: "Pengguna akan dihapus apabila memilih <strong>Ya</strong>",
                  type: "warning",
                  html: true,
                  showCancelButton: true,
                  closeOnConfirm: false,
                  showLoaderOnConfirm: true,
                  confirmButtonText: "Ya, hapus",
                  cancelButtonText: "Keluar"
                },
                function(){
                  setTimeout(function(){
                      window.location.href = nextUri;
                  }, 2000);
                });
        }
    </script>
    <?php endif; ?>

    <?php if ( $this->uri->segment(1) == 'kurir'): ?>
    <script type="text/javascript">
        function deleteKurir(nextUri, kurirName)
        {
          swal({
                  title: "Hapus kurir?",
                  text: "Kurir <strong>" + kurirName + "</strong> akan dihapus apabila memilih <strong>Ya</strong>",
                  type: "warning",
                  html: true,
                  showCancelButton: true,
                  closeOnConfirm: false,
                  showLoaderOnConfirm: true,
                  confirmButtonText: "Ya, hapus",
                  cancelButtonText: "Keluar"
                },
                function(){
                  setTimeout(function(){
                      window.location.href = nextUri;
                  }, 2000);
                });
        }
    </script>
    <?php endif; ?>

    <?php if ( $this->uri->segment(1) == 'outlet'): ?>
    <script type="text/javascript">
        function deleteOutlet(nextUri, outletName)
        {
          swal({
                  title: "Hapus outlet?",
                  text: "Outlet <strong>" + outletName + "</strong> akan dihapus apabila memilih <strong>Ya</strong>",
                  type: "warning",
                  html: true,
                  showCancelButton: true,
                  closeOnConfirm: false,
                  showLoaderOnConfirm: true,
                  confirmButtonText: "Ya, hapus",
                  cancelButtonText: "Keluar"
                },
                function(){
                  setTimeout(function(){
                      window.location.href = nextUri;
                  }, 2000);
                });
        }
    </script>
    <?php endif; ?>

    <?php if ( $this->uri->segment(1) == 'banner'): ?>
    <script type="text/javascript">
        function deleteBanner(nextUri, bannerName)
        {
          swal({
                  title: "Hapus banner?",
                  text: "Banner <strong>" + bannerName + "</strong> akan dihapus apabila memilih <strong>Ya</strong>",
                  type: "warning",
                  html: true,
                  showCancelButton: true,
                  closeOnConfirm: false,
                  showLoaderOnConfirm: true,
                  confirmButtonText: "Ya, hapus",
                  cancelButtonText: "Keluar"
                },
                function(){
                  setTimeout(function(){
                      window.location.href = nextUri;
                  }, 2000);
                });
        }
    </script>
    <?php endif; ?>

    <?php if ( $this->uri->segment(1) == 'pesanan'): ?>
    <!-- Pesanan JS -->
    <script type="text/javascript">
        function cancelOrder(str , nextUri)
        {
          swal({
                  title: "Batalkan pesanan?",
                  text: "Pesanan " + str + ". Apakah yakin ingin dibatalkan?",
                  type: "warning",
                  html: true,
                  showCancelButton: true,
                  closeOnConfirm: false,
                  showLoaderOnConfirm: true,
                  confirmButtonText: "Ya, batalkan",
                  cancelButtonText: "Keluar"
                },
                function(){
                  setTimeout(function(){
                    window.location.href = nextUri;
                  }, 2000);
                });
        }

        function acceptOrder(nextUri)
        {
          swal({
                title: "Ambil pesanan?",
                text: "Pesanan akan diambil apabila memilih <strong>Ya</strong>",
                type: "info",
                html: true,
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
                confirmButtonText: "Ya, terima",
                cancelButtonText: "Batal"
              },
              function(){
                setTimeout(function(){
                   window.location.href = nextUri;
                }, 2000);
              });
        }

        function assignToCourier(nextUri)
        {
          swal({
                title: "Antarkan pesanan?",
                text: "Pesanan akan dikirim ke kurir dan akan segera diantarkan",
                type: "info",
                html: true,
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
                confirmButtonText: "Ya, antar",
                cancelButtonText: "Batal"
              },
              function(){
                setTimeout(function(){
                   window.location.href = nextUri;
                }, 2000);
              });
        }

        function orderCompleted()
        { 
          swal("Berhasil!", "Order telah selesai!", "success");
        }

        function deleteOrder(nextUri)
        {
          swal({
                  title: "Hapus pesanan?",
                  text: "Pesanan akan dihapus apabila memilih <strong>Ya</strong>",
                  type: "error",
                  html: true,
                  showCancelButton: true,
                  closeOnConfirm: false,
                  showLoaderOnConfirm: true,
                  confirmButtonText: "Ya, hapus",
                  cancelButtonText: "Batal"
                },
                function(){
                  setTimeout(function(){
                    window.location.href = nextUri;
                  }, 2000);
                });
        }

        function deleteOrderPermanent()
        {
          swal({
                  title: "Hapus pesanan selamanya?",
                  text: "Pesanan akan dihapus selamanya apabila memilih <strong>Ya</strong>",
                  type: "warning",
                  html: true,
                  showCancelButton: true,
                  closeOnConfirm: false,
                  showLoaderOnConfirm: true,
                  confirmButtonText: "Ya, hapus",
                  cancelButtonText: "Batal"
                },
                function(){
                  setTimeout(function(){
                    swal("Berhasil!", "Pesanan berhasil dihapus!", "success");
                  }, 2000);
                });
        }
    </script>
    <?php endif; ?>

  </body>
</html>