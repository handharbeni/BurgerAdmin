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
    <script src="/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/vendors/nprogress/nprogress.js"></script>
    <!-- jQuery custom content scroller -->
    <script src="/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

    <?php if (@$uri): ?>
     <!-- FastClick -->
    <script src="/vendors/fastclick/lib/fastclick.js"></script>
    <!-- iCheck -->
    <script src="/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="/vendors/jszip/dist/jszip.min.js"></script>
    <script src="/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="/vendors/pdfmake/build/vfs_fonts.js"></script>
    <?php endif; ?>
    <?php if (@$action): ?>

    <script src="/vendors/validator/validator.js"></script>
    <?php endif; ?>
    <!-- Custom Theme Scripts -->
    <script src="/build/js/custom.min.js"></script> 

    <!-- Sweet alert -->
    <script type="text/javascript" src="/build/js/sweetalert.min.js"></script>

    <?php if ( $this->uri->segment(1) == 'pesanan'): ?>
    <!-- Pesanan JS -->
    <script type="text/javascript">
        function cancelOrder()
        {
          swal({
                  title: "Batalkan pesanan?",
                  text: "Pesanan akan dibatalkan apabila memilih <strong>Ok</strong>",
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
                    swal("Berhasil!", "Pesanan berhasil dibatalkan!", "success");
                  }, 2000);
                });
        }

        function deleteOrder()
        {
          swal({
                  title: "Hapus pesanan?",
                  text: "Pesanan akan dihapus apabila memilih <strong>Ok</strong>",
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
                    swal("Berhasil!", "Pesanan berhasil dihapus!", "success");
                  }, 2000);
                });
        }

        function changeKurir(x)
        {
          // alert("Selected: " + x);
        }
    </script>
    <?php endif; ?>

  </body>
</html>