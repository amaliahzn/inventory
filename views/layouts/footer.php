  <footer class="main-footer">
      <strong>Copyright &copy; <script>
              document.write(new Date().getFullYear());
          </script> <a target="_blank">PT.Tekno Birru Mulia</a>.</strong>
      </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>src/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>src/backend/dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url() ?>src/backend/dist/js/demo.js"></script>
  <!-- SweetAlert2 -->
  <script src="<?= base_url() ?>src/backend/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="<?= base_url() ?>src/js/notif.js"></script>
  <!-- Select2 -->
  <script src="<?= base_url() ?>src/backend/plugins/select2/js/select2.min.js"></script>
  <script>
      $(document).ready(function() {
          $('.select2').select2({
              theme: "classic"
          });
      });
  </script>

  <!-- Untuk Input Harga ada rupiahnya -->
  <script>
      var dengan_rupiah = document.getElementById('dengan-rupiah');
      dengan_rupiah.addEventListener('keyup', function(e) {
          dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
      });

      /* Fungsi */
      function formatRupiah(angka, prefix) {
          var number_string = angka.replace(/[^,\d]/g, '').toString(),
              split = number_string.split(','),
              sisa = split[0].length % 3,
              rupiah = split[0].substr(0, sisa),
              ribuan = split[0].substr(sisa).match(/\d{3}/gi);

          if (ribuan) {
              separator = sisa ? '.' : '';
              rupiah += separator + ribuan.join('.');
          }

          rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
          return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
      }
  </script>
  </body>

  </html>