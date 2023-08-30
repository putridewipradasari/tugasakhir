<!DOCTYPE html>
<html>
<?php $this->load->view('head') ?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php $this->load->view('header') ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php $this->load->view('left') ?>


    <!-- Left side column. contains the logo and sidebar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          KUNJUNGAN
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-users"></i> Home</a></li>
          <li class="active">Kunjungan</li>
        </ol>
      </section>
      <!--TAMBAH-->

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div id="reload">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <!-- <div class="col-md-12" style="margin-bottom: 20px"> -->
                  <!--  -->
                  <div class="row">
                    <div class="col-md-2">
                      <span>Pilih dari tanggal</span>
                      <div class="input-group">
                        <input type="date" class="form-control pickdate date_range_filter" name="min" id="min">
                        <span class="input-group-addon" id="basic-addon2">
                          <!-- <span class="glyphicon glyphicon-calendar"></span> -->
                        </span>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <span>Sampai tanggal</span>
                      <div class="input-group">
                        <input type="date" class="form-control pickdate date_range_filter2" name="max" id="max">
                        <span class="input-group-addon" id="basic-addon2">
                          <!-- <span class="glyphicon glyphicon-calendar"></span> -->
                        </span>
                      </div>
                    </div>
                  </div>
                  <!-- </div> -->
                  <!--  -->
                  <?php
                  // if (isset($_SESSION['error'])) {
                  //   echo "<div class='alert alert-danger alert-dismissible' style='background:red;color:#fff'>
                  //         <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  //         <h4><i class='icon fa fa-warning'></i> Error!</h4>" . $_SESSION['error'] . "</div>";
                  //   unset($_SESSION['error']);
                  // } 
                  ?>
                  <div class="pull-right">
                    <?php echo $this->session->flashdata('succ'); ?>
                  </div>
                </div>
                </.box-header -->
                <div class="box-body table-responsive">
                  <table id="mydata" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th width="170px">Nomor Induk</th>
                        <th>Nama</th>
                        <th>Waktu Masuk</th>
                        <th>Waktu Keluar</th>
                        <th>Jenis Kartu</th>
                        <th width="170px">Aksi</th>
                      </tr>
                    </thead>
                    <tbody id="show_data">

                    </tbody>
                    <!--tbody id="data-load-Masuk">
                    </--tbody-->
                    <tfoot>
                      <tr>
                        <th>Nomor Induk</th>
                        <th>Nama</th>
                        <th>Waktu Masuk</th>
                        <th>Waktu Keluar</th>
                        <th>Jenis Kartu</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
          </div>
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>

    <!--MODAL HAPUS-->
    <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
            <h4 class="modal-title" id="myModalLabel">Hapus Data</h4>
          </div>
          <form class="form-horizontal">
            <div class="modal-body">

              <input type="hidden" name="kode" id="textkode" value="">
              <div class="alert alert-warning">
                <p>Apakah Anda Yakin Ingin Menghapus Data Ini?</p>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!--END MODAL HAPUS-->
    <!-- /.content-wrapper -->


    <script type="text/javascript" src="<?php echo base_url() . 'assets/admin/bower_components/jquery/dist/jquery.js' ?>"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url() . 'assets/admin/bower_components/bootstrap/dist/js/bootstrap.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/admin/bower_components/datatables.net/js/jquery.dataTables.js' ?>"></script>

    <?php $this->load->view('footer') ?>
    <!-- <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script> -->
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.colVis.min.js"></script> -->
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.colVis.min.js"></script>



    <script type="text/javascript">
      $(document).ready(function() {
        var tabel = $('#mydata').DataTable({
          "lengthChange": true,
          dom: '<"html5buttons">Blfrtip',
          // "buttons": ['copy', 'excel', 'pdf', 'colvis'],
          // language: {
          //   buttons: {
          //     colvis: 'show / hide', // label button show / hide
          //     colvisRestore: "Reset Kolom" //lael untuk reset kolom ke default
          //   }
          // },
          buttons: [{
              extend: 'csv',
              title: 'Daftar Kunjungan',
              exportOptions: {
                columns: ':visible'
              }
            },
            {
              extend: 'pdf',
              title: 'Daftar Kunjungan',
              exportOptions: {
                columns: ':visible'
              }
            },
            {
              extend: 'excel',
              title: 'Daftar Kunjungan',
              exportOptions: {
                columns: ':visible'
              }
            },
            {
              extend: 'print',
              title: 'Daftar Kunjungan',
              exportOptions: {
                columns: ':visible'
              }
            },
            // {
            //   extend: 'colvis',
            //   postfixButtons: ['colvisRestore']
            // },
            // 'colvis'
          ],
          // columnDefs: [{
          //   targets: -1,
          //   visible: false
          // }],
          "processing": true,
          "serverSide": true,
          "ordering": true, // Set true agar bisa di sorting
          "order": [
            [2, 'desc']
          ], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)

          "ajax": {
            "url": "<?php echo base_url('Masuk/userList') ?>", // URL file untuk proses select datanya
            "type": "POST",
            "data": function(data) {
              data.searchMin = $('#min').val();
              data.searchMax = $('#max').val();
            }
          },
          "deferRender": true,
          "aLengthMenu": [
            [10, 50, 100],
            [10, 50, 100]
          ], // Combobox Limit
          "columns": [{
              "data": "nik"
            }, {
              "data": "nama"
            },
            {
              "data": "waktu_msk"
            },
            {
              "data": "waktu_klr"
            },
            {
              "data": "level"
            },
            {
              data: "id",
              render: function(data, type, full, meta) {
                var str = '';
                str += '<a onClick="detail(' + data + ')"><i class="fa fa-list btn btn-info">  Detail</i></a>&nbsp';
                <?php if ($this->session->userdata('userdata')->role == 'Petugas') : ?>
                  str += '<a onClick="deleteid(' + data + ')"><i class="fa fa-trash btn btn-danger">  Hapus</i></a>';
                <?php endif; ?>
                return str;
              }
            },

          ],
        });

        tabel.buttons().container()
          .appendTo('#mydata_wrapper .col-sm-6:eq(0)');

        $('#min').change(function() {
          tabel.draw();
        });
        $('#max').change(function() {
          tabel.draw();
        });


      });

      function deleteid(id) {
        $('#ModalHapus').modal('show');
        $('[name="kode"]').val(id);
      }


      //Hapus Masuk
      $('#btn_hapus').on('click', function() {
        var kode = $('#textkode').val();
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('Masuk/hapus_data') ?>",
          dataType: "JSON",
          data: {
            kode: kode
          },
          success: function(data) {
            // $('#ModalHapus').modal('hide');
            //tampil_data_masuk();
          }
        });
      });

      function detail(id) {
        var url = 'Masukd?id=__id__ ';
        window.location.href = url.replace('__id__', id);

      }
    </script>



  </div>
</body>

</html>