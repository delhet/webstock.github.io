  <script src="{{ asset('sb-admin/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('js/popper.min.js') }}"></script>
  <script src="{{ asset('sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('sb-admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('sb-admin/js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('sb-admin/vendor/chart.js/Chart.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('sb-admin/js/demo/chart-area-demo.js') }}"></script>
  <script src="{{ asset('sb-admin/js/demo/chart-pie-demo.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('sb-admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('sb-admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('sb-admin/js/demo/datatables-demo.js') }}"></script>

  <!-- moment -->
  <script src="{{ asset('js/moment-with-locales.min.js') }}"></script>

  <!-- ckedtor -->
  <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

  <!-- custom js -->
  <script src="{{ asset('js/url.js') }}"></script>
  <!-- sweetalert -->
  <script src="{{ asset('js/sweetalert2.js') }}"></script>
  <!-- select2 -->
  <script src="{{ asset('select2/js/select2.min.js') }}"></script>
  <!-- datetime picker -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
  <script> 
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    });
        // sweet alert confirmation delete data
    $('.delete').on('click', function(e) {
      e.preventDefault();
      let form = $(this).parent(); // storing the form

        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.value) {
            console.log('ok');
            form.submit();
          }
        });
    });

    // initialize select2
    $('.select2').select2();
    
    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
      var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
      }

      rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
      return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }
  </script>
