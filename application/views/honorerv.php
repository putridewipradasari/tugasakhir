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
          Data honorer
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-cube"></i> Home</a></li>
          <li class="active">Data honorer</li>
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
                  <a class="nav-link btn btn-primary" href="#" data-toggle="modal" data-target="#modal-tambah_honorer"><i class="fa fa-plus-circle"></i> Tambah</a>
                  <div class="pull-right">
                    <?php echo $this->session->flashdata('succ'); ?>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="mydata" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th width="190px">Nomor Induk</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Bidang</th>
                        <th>NO KTP</th>
                        <th>NO HP</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody id="show_data">

                    </tbody>
                    <!--tbody id="data-load-honorer">
                </--tbody-->
                    <tfoot>
                      <tr>
                        <th>Nomor Induk</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Bidang</th>
                        <th>NO KTP</th>
                        <th>NO HP</th>
                        <th>Status</th>
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
    <div class="modal fade" id="modal-tambah_honorer">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah data</h4>
            <button class="close" data-dismiss="modal" type="button">&times;</button>
          </div>
          <div class="pesan" style="display: none;"></div>
          <div class="modal-body">
            <form id="form-tambah_honorer">

              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Nomor Induk</label>
                    <input type="text" id="no_induk" class="form-control" value="<?php echo $kode; ?>" readonly="readonly" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Nama</label>
                    <input type="text" id="nama" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Alamat</label>
                    <input type="text" id="asal" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Bidang</label>
                    <select class="form-control" name="bidang" id="bidang">
                      <option selected disabled>--Pilih--</option>
                      <option>Logistik</option>
                      <option>Pemasaran</option>
                      <option>Usaha</option>
                      <option>SDM</option>
                      <option>Teknik</option>
                      <option>Keuangan</option>
                      <option>Driver</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">NO KTP</label>
                    <input type="number" id="ktp" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">NO HP</label>
                    <input type="number" id="no_tlp" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Status</label>
                    <!-- <input type="text" id="status" class="form-control" required> -->
                    <select class="form-control" name="status" id="status">
                      <!-- <option selected="">--pilih--</option> -->
                      <option selected>Aktif</option>
                      <option>Nonaktif</option>
                    </select>
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
            <form id="form-edit_honorer">
              <input type="hidden" name="id" id="id2">
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Nomor Induk</label>
                    <input type="text" name="no_induk" id="no_induk2" class="form-control" required readonly="readonly">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Nama</label>
                    <input type="text" name="nama" id="nama2" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Alamat</label>
                    <input type="text" name="asal" id="asal2" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Bidang</label>
                    <!-- <input type="text" name="bidang" id="bidang2" class="form-control" required> -->
                    <select class="form-control" name="bidang" id="bidang2">

                      <option>Logistik</option>
                      <option>Pemasaran</option>
                      <option>Usaha</option>
                      <option>SDM</option>
                      <option>Teknik</option>
                      <option>Keuangan</option>
                      <option>Driver</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">NO KTP</label>
                    <input type="number" name="ktp" id="ktp2" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">NO HP</label>
                    <input type="number" name="no_tlp" id="no_tlp2" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">status</label>
                    <!-- <input type="text" name="status" id="status2" class="form-control" required> -->
                    <select class="form-control" name="status" id="status2">
                      <option>Aktif</option>
                      <option>Nonaktif</option>
                    </select>
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
            "url": "<?php echo base_url('Honorer/view') ?>", // URL file untuk proses select datanya
            "type": "POST",
            //"draw": 1
          },
          "deferRender": true,
          "aLengthMenu": [
            [5, 10, 50],
            [5, 10, 50]
          ], // Combobox Limit
          "columns": [{
              "data": "no_induk"
            },
            {
              "data": "nama"
            },
            {
              "data": "asal"
            },
            {
              "data": "bidang"
            },
            {
              "data": "ktp"
            },
            {
              "data": "no_tlp"
            },
            {
              "data": "status"
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
        var url = 'Honorerdt?id=__id__ ';
        window.location.href = url.replace('__id__', id);

      }

      function edit(id) {
        var url = '<?php echo base_url('Honorer/get_honorer') ?>';
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
          $('[name="no_induk"]').val(data.no_induk);
          $('[name="nama"]').val(data.nama);
          $('[name="asal"]').val(data.asal);
          $('[name="bidang"]').val(data.bidang);
          $('[name="ktp"]').val(data.ktp);
          $('[name="no_tlp"]').val(data.no_tlp);
          $('[name="status"]').val(data.status);
          $('#ModalaEdit').modal('show');
        });
      }

      function deleteid(id) {
        $('#ModalHapus').modal('show');
        $('[name="kode"]').val(id);
      }



      //Simpan honorer
      $('#btn_simpan').on('click', function() {
        var id = $('#id').val();
        var no_induk = $('#no_induk').val();
        var nama = $('#nama').val();
        var asal = $('#asal').val();
        var bidang = $('#bidang').val();
        var ktp = $('#ktp').val();
        var no_tlp = $('#no_tlp').val();
        var status = $('#status').val();
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('Honorer/simpan_honorer') ?>",
          dataType: "JSON",
          data: {
            id: id,
            no_induk: no_induk,
            nama: nama,
            asal: asal,
            bidang: bidang,
            ktp: ktp,
            no_tlp: no_tlp,
            status: status
          },
          success: function(data) {
            if (data.error) {
              $('.pesan').html(data.error).show();
            }
            $('[name="id"]').val("");
            $('[name="no_induk"]').val("");
            $('[name="nama"]').val("");
            $('[name="asal"]').val("");
            $('[name="bidang"]').val("");
            $('[name="ktp"]').val("");
            $('[name="no_tlp"]').val("");
            $('[name="status"]').val("");
          }
        });
      });

      //Update honorer
      $('#btn_update').on('click', function() {
        var id = $('#id2').val();
        var no_induk = $('#no_induk2').val();
        var nama = $('#nama2').val();
        var asal = $('#asal2').val();
        var bidang = $('#bidang2').val();
        var ktp = $('#ktp2').val();
        var no_tlp = $('#no_tlp2').val();
        var status = $('#status2').val();
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('Honorer/update_honorer') ?>",
          dataType: "JSON",
          data: {
            id: id,
            no_induk: no_induk,
            nama: nama,
            asal: asal,
            bidang: bidang,
            ktp: ktp,
            no_tlp: no_tlp,
            status: status
          },
          success: function(data) {
            if (data.error) {
              $('.pesanedit').html(data.error).show();
            }
            $('[name="id"]').val("");
            $('[name="no_induk"]').val("");
            $('[name="nama"]').val("");
            $('[name="asal"]').val("");
            $('[name="bidang"]').val("");
            $('[name="ktp"]').val("");
            $('[name="no_tlp"]').val("");
            $('[name="status"]').val("");
            // $('#ModalaEdit').modal('hide');
            // tampil_data_honorer();
          }
        });
      });

      //Hapus honorer
      $('#btn_hapus').on('click', function() {
        var kode = $('#textkode').val();
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('Honorer/hapus_honorer') ?>",
          dataType: "JSON",
          data: {
            kode: kode
          },
          success: function(data) {
            $('#ModalHapus').modal('hide');
            //tampil_data_honorer();
          }
        });
      });
    </script>
    <?php $this->load->view('footer') ?>
</body>

</html>