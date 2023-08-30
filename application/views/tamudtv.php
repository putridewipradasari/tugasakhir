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
          Data Tamu
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-cube"></i> Home</a></li>
          <li class="active">Data tamu</li>
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
                  <div class="row">

                    <div class="col-md-2">
                      <span>Pilih dari tanggal</span>
                      <div class="input-group">
                        <input type="date" class="form-control pickdate date_range_filter" name="min" id="min">
                        <!-- <input type='text' readonly id='min' class="datepicker" placeholder='From date'> -->
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

                    <!-- </form> -->
                  </div>
                  <div class="pull-right">
                    <?php echo $this->session->flashdata('succ'); ?>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="mydata" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nomor Induk</th>
                        <th>Nama</th>
                        <th>Instansi</th>
                        <th>Tujuan</th>
                        <th>Keterangan</th>
                        <th>Waktu Masuk</th>
                        <th>Waktu Keluar</th>
                        <?php if ($this->session->userdata('userdata')->role == 'Petugas') : ?>
                          <th>Aksi</th><?php endif; ?>
                      </tr>
                    </thead>
                    <tbody id="show_data">

                    </tbody>
                    <!--tbody id="data-load-tamudt">
                </--tbody-->
                    <tfoot>
                      <tr>
                        <th>Nomor Induk</th>
                        <th>Nama</th>
                        <th>Instansi</th>
                        <th>Tujuan</th>
                        <th>Keterangan</th>
                        <th>Waktu Masuk</th>
                        <th>Waktu Keluar</th>
                        <?php if ($this->session->userdata('userdata')->role == 'Petugas') : ?>
                          <th>Aksi</th><?php endif; ?>
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


    <div class="modal fade" id="ModalaEdit">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Data</h4>
            <button type="button" class="close" data-dismiss='modal'>&times;</button>
          </div>
          <div class="pesanedit" style="display: none;"></div>
          <div class="modal-body">
            <form id="form-edit_tamudt">
              <input type="hidden" name="id" id="id2">
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Id Kartu</label>
                    <input type="text" name="id_kartu" id="id_kartu2" class="form-control" readonly>
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
                    <label class="bmd-label-floating">Instansi</label>
                    <input type="text" name="asal" id="asal2" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Tujuan</label>
                    <!-- <input type="text" name="tujuan" id="tujuan2" class="form-control" required> -->
                    <textarea class="form-control" id="tujuan2" name="tujuan" rows="3" required></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Keterangan</label>
                    <!-- <input type="number" name="keterangan" id="keterang2" class="form-control" required> -->
                    <textarea class="form-control" id="keterangan2" name="keterangan" rows="3" required></textarea>
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
            <h4 class="modal-title" id="myModalLabel">Hapus Tamu</h4>
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
    <?php $this->load->view('footer') ?>
    <!--script type="text/javascript" src="<?php echo base_url() . 'assets/alertifyjs/alertify.min.js' ?>"></!--script-->
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
          buttons: [{
              extend: 'csv',
              title: 'Daftar Tamu',
              exportOptions: {
                columns: ':visible'
              }
            },
            {
              extend: 'pdf',
              title: 'Daftar Tamu',
              exportOptions: {
                columns: ':visible'
              }
            },
            {
              extend: 'excel',
              title: 'Daftar Tamu',
              exportOptions: {
                columns: ':visible'
              }
            },
            {
              extend: 'print',
              title: 'Daftar Tamu',
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
            [5, 'desc']
          ], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
          "ajax": {
            "url": "<?php echo base_url('Tamudt/userList') ?>", // URL file untuk proses select datanya
            "type": "POST",
            //"draw": 1
            "data": function(data) {
              data.searchMin = $('#min').val();
              data.searchMax = $('#max').val();
            }
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
              "data": "nama"
            },
            {
              "data": "asal"
            },
            {
              "data": "tujuan"
            },
            {
              "data": "keterangan"
            },
            {
              "data": "waktu_msk"
            },
            {
              "data": "waktu_klr"
            },
            <?php if ($this->session->userdata('userdata')->role == 'Petugas') : ?> {
                class: "opsi",
                data: "id",
                render: function(data, type, full, meta) {
                  var str = '';
                  // str += '<a onClick="detail(' + data + ')"><i class="fa fa-list btn btn-info">  Detail</i></a>&nbsp';
                  str += '<a onclick="edit(' + data + ')"><i class="fa fa-pencil btn btn-warning">  Edit</i></a>&nbsp';
                  str += '<a onClick="deleteid(' + data + ')"><i class="fa fa-trash btn btn-danger">  Hapus</i></a>';
                  return str;
                }
              },
            <?php endif; ?>
          ],
        });
        $('#min').change(function() {
          tabel.draw();
        });
        $('#max').change(function() {
          tabel.draw();
        });
      });

      function detail(id) {
        var url = 'Tamudtdt?id=__id__ ';
        window.location.href = url.replace('__id__', id);

      }

      function edit(id) {
        var url = '<?php echo base_url('Tamudt/get_tamudt') ?>';
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
          $('[name="nama"]').val(data.nama);
          $('[name="asal"]').val(data.asal);
          $('[name="tujuan"]').val(data.tujuan);
          $('[name="keterangan"]').val(data.keterangan);
          // $('[name="waktu_msk"]').val(data.waktu_msk);
          // $('[name="waktu_klr"]').val(data.waktu_klr);
          // $('[name="status"]').val(data.status);
          $('#ModalaEdit').modal('show');
        });
      }

      function deleteid(id) {
        $('#ModalHapus').modal('show');
        $('[name="kode"]').val(id);
      }
      //Update tamudt
      $('#btn_update').on('click', function() {
        var id = $('#id2').val();
        var id_kartu = $('#id_kartu2').val();
        var nama = $('#nama2').val();
        var asal = $('#asal2').val();
        var tujuan = $('#tujuan2').val();
        var keterangan = $('#keterangan2').val();
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('Tamudt/update_tamudt') ?>",
          dataType: "JSON",
          data: {
            id: id,
            id_kartu: id_kartu,
            nama: nama,
            asal: asal,
            tujuan: tujuan,
            keterangan: keterangan
          },
          success: function(data) {
            if (data.error) {
              $('.pesanedit').html(data.error).show();
            }
            $('[name="id"]').val("");
            $('[name="id_kartu"]').val("");
            $('[name="nama"]').val("");
            $('[name="asal"]').val("");
            $('[name="tujuan"]').val("");
            $('[name="keterangan"]').val("");
            // $('#ModalaEdit').modal('hide');
            // tampil_data_tamudt();
          }
        });
      });

      //Hapus tamudt
      $('#btn_hapus').on('click', function() {
        var kode = $('#textkode').val();
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('Tamudt/hapus_tamudt') ?>",
          dataType: "JSON",
          data: {
            kode: kode
          },
          success: function(data) {
            $('#ModalHapus').modal('hide');
            //tampil_data_tamudt();
          }
        });
      });
    </script>

</body>

</html>