<!DOCTYPE html>
<html>
<?php $this->load->view('head') ?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php $this->load->view('header') ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php $this->load->view('left') ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Data Kartu Tamu
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-cube"></i> Home</a></li>
          <li class="active">Data Kartu Tamu</li>
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
                  <a class="nav-link btn btn-primary" href="#" data-toggle="modal" data-target="#modal-tambah_tamukrt"><i class="fa fa-plus-circle"></i> Tambah</a>
                  <div class="pull-right">
                    <?php echo $this->session->flashdata('succ'); ?>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="mydata" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Id Kartu</th>
                        <th>Nama Kartu</th>
                        <th width="270px">Aksi</th>
                      </tr>
                    </thead>
                    <tbody id="show_data">

                    </tbody>
                    <!--tbody id="data-load-tamukrt">
                </--tbody-->
                    <tfoot>
                      <tr>
                        <th>Id Kartu</th>
                        <th>Nama Kartu</th>
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
    <div class="modal fade" id="modal-tambah_tamukrt">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah data</h4>
            <button class="close" data-dismiss="modal" type="button">&times;</button>
          </div>
          <div class="pesan" style="display: none;"></div>
          <div class="modal-body">
            <form id="form-tambah_tamukrt">

              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Id Kartu</label>
                    <input type="text" id="id_kartu" class="form-control" value="<?php echo $kode ?>" readonly="readonly" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Nama Kartu</label>
                    <input type="text" id="nm_kartu" class="form-control" required>
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
        <!--?= form_close() ?-->
      </div>
    </div>

    <div class="modal fade" id="ModalaEdit">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Data</h4>
            <button type="button" class="close" data-dismiss='modal'>&times;</button>
          </div>
          <div class="pesanedit" style="display: none;"></div>
          <div class="modal-body">
            <form id="form-edit_tamukrt">
              <input type="hidden" name="id" id="id2">
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Id Kartu</label>
                    <input type="text" name="id_kartu" id="id_kartu2" class="form-control" required readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Nama Kartu</label>
                    <input type="text" name="nm_kartu" id="nm_kartu2" class="form-control" required>
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
    <script type="text/javascript" src="<?php echo base_url() . 'assets/admin/bower_components/bootstrap/dist/js/bootstrap.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/admin/bower_components/datatables.net/js/jquery.dataTables.js' ?>"></script>

    <!--script type="text/javascript" src="<?php echo base_url() . 'assets/alertifyjs/alertify.min.js' ?>"></!--script-->


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
            "url": "<?php echo base_url('Tamukrt/view') ?>", // URL file untuk proses select datanya
            "type": "POST",
            //"draw": 1
          },
          "deferRender": true,
          "aLengthMenu": [
            [5, 10, 50],
            [5, 10, 50]
          ], // Combobox Limit
          "columns": [{
              "data": "id_kartu"
            },
            {
              "data": "nm_kartu"
            },
            {
              class: "opsi",
              data: "id",
              render: function(data, type, full, meta) {
                var str = '';
                str += '<a onClick="detail(' + data + ')"><i class="fa fa-list btn btn-info">  Detail</i></a>&nbsp';
                str += '<a onclick="edit(' + data + ')"><i class="fa fa-pencil btn btn-warning">  Edit</i></a>&nbsp';
                str += '<a onClick="deleteid(' + data + ')"><i class="fa fa-trash btn btn-danger">  Hapus</i></a>';
                return str;
              }
            },
          ],
        });
      });

      function detail(id) {
        var url = 'Tamukrtdt?id=__id__ ';
        window.location.href = url.replace('__id__', id);

      }

      function edit(id) {
        var url = '<?php echo base_url('Tamukrt/get_tamukrt') ?>';
        var data = {
          id: id
        };

        $.ajax({
          url: url,
          method: 'GET',
          data: data
        }).done(function(data, textStatus, jqXHR) {
          var data = JSON.parse(data);
          //$('#addModalLabel').html('Edit Cabang');
          $('[name="id"]').val(data.id);
          $('[name="id_kartu"]').val(data.id_kartu);
          $('[name="nm_kartu"]').val(data.nm_kartu);
          $('#ModalaEdit').modal('show');
        });
      }

      function deleteid(id) {
        $('#ModalHapus').modal('show');
        $('[name="kode"]').val(id);
      }



      //Simpan tamukrt
      $('#btn_simpan').on('click', function() {
        var id = $('#id').val();
        var id_kartu = $('#id_kartu').val();
        var nm_kartu = $('#nm_kartu').val();
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('Tamukrt/simpan_tamukrt') ?>",
          dataType: "JSON",
          data: {
            id: id,
            id_kartu: id_kartu,
            nm_kartu: nm_kartu
          },
          success: function(data) {
            if (data.error) {
              $('.pesan').html(data.error).show();
            }
            $('[name="id"]').val("");
            $('[name="id_kartu"]').val("");
            $('[name="nm_kartu"]').val("");
          }
        });
      });

      //Update tamukrt
      $('#btn_update').on('click', function() {
        var id = $('#id2').val();
        var id_kartu = $('#id_kartu2').val();
        var nm_kartu = $('#nm_kartu2').val();
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('Tamukrt/update_tamukrt') ?>",
          dataType: "JSON",
          data: {
            id: id,
            id_kartu: id_kartu,
            nm_kartu: nm_kartu
          },
          success: function(data) {
            if (data.error) {
              $('.pesanedit').html(data.error).show();
            }
            $('[name="id"]').val("");
            $('[name="id_kartu"]').val("");
            $('[name="nm_kartu"]').val("");
            // $('#ModalaEdit').modal('hide');
            // tampil_data_tamukrt();
          }
        });
      });

      //Hapus tamukrt
      $('#btn_hapus').on('click', function() {
        var kode = $('#textkode').val();
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('Tamukrt/hapus_tamukrt') ?>",
          dataType: "JSON",
          data: {
            kode: kode
          },
          success: function(data) {
            $('#ModalHapus').modal('hide');
            //tampil_data_tamukrt();
          }
        });
      });
    </script>
    <?php $this->load->view('footer') ?>
</body>

</html>