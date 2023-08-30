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
          Data Pegawai
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-users"></i> Home</a></li>
          <li class="active">Pegawai</li>
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
                  <h3 class="box-title"></h3>
                  <a class="nav-link btn btn-primary" href="#" data-toggle="modal" data-target="#modal-tambah_pegawai">
                    <i class="fa fa-user-plus"></i> Tambah
                  </a>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="mydata" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nama pegawai</th>
                        <th>Alamat</th>
                        <th>Bagian</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody id="show_data">

                    </tbody>
                    <!--tbody id="data-load-pegawai">
                </--tbody-->
                    <tfoot>
                      <tr>
                        <th>Nama pegawai</th>
                        <th>Alamat</th>
                        <th>Bagian</th>
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
    <div class="modal fade" id="modal-tambah_pegawai">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah data</h4>
            <button class="close" data-dismiss="modal" type="button">&times;</button>
          </div>
          <div class="pesan" style="display: none;"></div>
          <div class="modal-body">
            <form id="form-tambah_pegawai">
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Nama pegawai</label>
                    <input type="text" id="nama" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">alamat</label>
                    <input type="text" id="alamat" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Bagian</label>
                    <input type="text" id="bagian" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <input type="submit" name="submit" id="btn_simpan" class="btn btn-info btn-primary" value="Tambah">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="ModalaEdit">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Data</h4>
            <button type="button" class="close" data-dismiss='modal'>&times;</button>
          </div>
          <div class="pesan" style="display: none;"></div>
          <div class="modal-body">
            <form id="form-edit_pegawai">
              <input type="hidden" name="idpegawai" id="idpegawai2">
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Nama pegawai</label>
                    <input type="text" name="nama" id="nama2" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Alamat</label>
                    <input type="text" name="alamat" id="alamat2" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Bagian</label>
                    <input type="text" name="bagian" id="bagian2" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <input type="submit" name="submit" id="btn_update" class="btn btn-block btn-primary" value="Edit">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--MODAL HAPUS-->
    <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
            <h4 class="modal-title" id="myModalLabel">Hapus pegawai</h4>
          </div>
          <form class="form-horizontal">
            <div class="modal-body">

              <input type="hidden" name="kode" id="textkode" value="">
              <div class="alert alert-warning">
                <p>Apakah Anda yakin mau menghapus pegawai ini?</p>
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
    <script type="text/javascript" src="<?php echo base_url() . 'assets/admin/bower_components/bootstrap/dist/js/bootstrap.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/admin/bower_components/datatables.net/js/jquery.dataTables.js' ?>"></script>


    <script type="text/javascript">
      $(document).ready(function() {


        tabel = $('#mydata').DataTable({
          "processing": true,
          "serverSide": true,
          "ordering": true, // Set true agar bisa di sorting
          "order": [
            [0, 'asc']
          ], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
          "ajax": {
            "url": "<?php echo base_url('Pegawai/view') ?>", // URL file untuk proses select datanya
            "type": "POST"
          },
          "deferRender": true,
          "aLengthMenu": [
            [5, 10, 50],
            [5, 10, 50]
          ], // Combobox Limit
          "columns": [{
              "data": "nama"
            },
            {
              "data": "alamat"
            },
            {
              "data": "bagian"
            },
            {
              class: "opsi",
              data: "idpegawai",
              render: function(data, type, full, meta) {
                var str = '';
                str += '<a onclick="edit(' + data + ')"><i class="fa fa-pencil btn btn-info"></i></a>';
                str += '<a onClick="deleteid(' + data + ')"><i class="fa fa-trash btn btn-danger"></i></a>';
                return str;
              }
            },
          ],
        });
      });

      function edit(idpegawai) {
        var url = '<?php echo base_url('Pegawai/get_pegawai') ?>';
        var data = {
          idpegawai: idpegawai
        };

        $.ajax({
          url: url,
          method: 'GET',
          data: data
        }).done(function(data, textStatus, jqXHR) {
          var data = JSON.parse(data);
          //$('#addModalLabel').html('Edit Cabang');
          $('[name="idpegawai"]').val(data.idpegawai);
          $('[name="nama"]').val(data.nama);
          $('[name="alamat"]').val(data.alamat);
          $('[name="bagian"]').val(data.bagian);

          $('#ModalaEdit').modal('show');
        });
      }

      function deleteid(idpegawai) {
        $('#ModalHapus').modal('show');
        $('[name="kode"]').val(idpegawai);
      }


      //Simpan pegawai
      $('#btn_simpan').on('click', function() {
        var idpegawai = $('#idpegawai').val();
        var nama = $('#nama').val();
        var alamat = $('#alamat').val();
        var bagian = $('#bagian').val();
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('Pegawai/simpan_pegawai') ?>",
          dataType: "JSON",
          data: {
            idpegawai: idpegawai,
            nama: nama,
            alamat: alamat,
            bagian: bagian
          },
          success: function(data) {
            if (data.error) {
              $('.pesan').html(data.error).show();
            }
            /*$('[name="idpegawai"]').val("");
            $('[name="nama"]').val("");
            $('[name="alamat"]').val("");
            $('[name="bagian"]').val("");
            $('#modal-tambah_pegawai').modal('hide');
            tampil_data_pegawai();
            //setInterval('location.reload()', 1000);
            location.reload(true);*/
          }
        });
      });

      //Update pegawai
      $('#btn_update').on('click', function() {
        var idpegawai = $('#idpegawai2').val();
        var nama = $('#nama2').val();
        var alamat = $('#alamat2').val();
        var bagian = $('#bagian2').val();
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('Pegawai/update_pegawai') ?>",
          dataType: "JSON",
          data: {
            idpegawai: idpegawai,
            nama: nama,
            alamat: alamat,
            bagian: bagian
          },
          success: function(data) {
            if (data.error) {
              $('.pesan').html(data.error).show();
            }
            /*$('[name="idpegawai"]').val("");
            $('[name="nama"]').val("");
            $('[name="alamat"]').val("");
            $('[name="bagian"]').val("");
            $('#ModalaEdit').modal('hide');
            tampil_data_pegawai();*/
          }
        });
      });

      //Hapus pegawai
      $('#btn_hapus').on('click', function() {
        var kode = $('#textkode').val();
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('Pegawai/hapus_pegawai') ?>",
          dataType: "JSON",
          data: {
            kode: kode
          },
          success: function(data) {
            $('#ModalHapus').modal('hide');
            //tampil_data_pegawai();
          }
        });
      });
    </script>

    <?php $this->load->view('footer') ?>
</body>

</html>