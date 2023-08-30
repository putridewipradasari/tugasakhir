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
          DATA PEGAWAI
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
                <div class="content">
                  <div class="box box-default box-solid">
                    <div class="box-header with-border">
                      <div class="box-title">
                        <!-- <a class="nav-link btn btn-info text-muted" href="#" data-toggle="modal" data-target="#ModalaAdd">
                          <i class="fa fa-save"> Tambah</i>
                        </a> -->
                      </div>
                    </div>
                    </.box-header -->
                    <div class="box-body table-responsive">
                      <table id="mydata" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Nomor Induk Karyawan</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody id="show_data">

                        </tbody>
                        <!--tbody id="data-load-Masuk">
                      </--tbody-->
                        <tfoot>
                          <tr>
                            <th>Nomor Induk Karyawan</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                  <!-- /.box-body -->
                </div>
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
  </div>
  <!-- MODAL ADD -->
  <!-- <div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 style="display:block; text-align:center;">Tambah Data Pegawai</h3>
          </div>
          <form class="form-horizontal">
            <div class="modal-body row">
              <div class="col-md-12">

                <div class="col-md-6">
                  <div class="container">
                    <div class="form-group">
                      <label class="control-label">Cabang</label>
                      <div>
                        <input name="cabang" id="cabang" class="form-control" type="text" placeholder="Cabang" style="width:335px;" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label">NIK</label>
                      <div>
                        <input name="nik" id="nik" class="form-control" type="text" placeholder="NIK" style="width:335px;" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label">No Absen</label>
                      <div>
                        <input name="no_absen" id="no_absen" class="form-control" type="text" placeholder="No. Absen" style="width:335px;" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label">No. KTP</label>
                      <div>
                        <input name="no_ktp" id="no_ktp" class="form-control" type="text" placeholder="NO. KTP" style="width:335px;" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label">Nama</label>
                      <div>
                        <input name="nama" id="nama" class="form-control" type="text" placeholder="Nama" style="width:335px;" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label">No. Kartu Keluarga</label>
                      <div>
                        <input name="no_kk" id="no_kk" class="form-control" type="text" placeholder="No. KK" style="width:335px;" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label ">Jenis Kelamin</label>
                      <div>
                        <select class="form-control" name="jk" id="jk" style="width:355px;">
                          <option selected="">--pilih--</option>
                          <option>L</option>
                          <option>P</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label">Tempat Lahir</label>
                      <div>
                        <input name="tempat_lahir" id="tempat_lahir" class="form-control" type="text" placeholder="Tempat Lahir" style="width:335px;" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label">Tanggal Lahir</label>
                      <div>
                        <input name="tanggal_lahir" id="tanggal_lahir" class="form-control" type="date" style="width:335px;" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label">Pendidikan</label>
                      <div>
                        <input name="pendidikan" id="pendidikan" class="form-control" type="text" placeholder="Pendidikan" style="width:335px;" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label">Alamat</label>
                      <div>
                        <input name="alamat" id="alamat" class="form-control" type="text" placeholder="Alamat" style="width:335px;" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label">Telephone</label>
                      <div>
                        <input name="tlp" id="tlp" class="form-control" type="text" placeholder="Telephone" style="width:335px;" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label ">Agama</label>
                      <div>
                        <select class="form-control" name="agama" id="agama" style="width:355px;">
                          <option selected="">--pilih--</option>
                          <option>ISLAM</option>
                          <option>PROTESTAN</option>
                          <option>KATOLIK</option>
                          <option>HINDU</option>
                          <option>BUDDHA</option>
                          <option>KHONGHUCHU</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="container">
                    <div class="form-group">
                      <label class="control-label ">Golongan Darah</label>
                      <div>
                        <select class="form-control" name="gol_dar" id="gol_dar" style="width:355px;">
                          <option selected="">--pilih--</option>
                          <option>A</option>
                          <option>B</option>
                          <option>O</option>
                          <option>AB</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Tanggal Masuk / Awal Priode</label>
                      <div>
                        <input name="tgl_masuk" id="tgl_masuk" class="form-control" type="date" style="width:335px;" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label">Tanggal Akhir Kontrak</label>
                      <div>
                        <input name="tgl_akhir" id="tgl_akhir" class="form-control" type="date" style="width:335px;" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label">Status Pegawai</label>
                      <div>
                        <input name="status_pegawai" id="status_pegawai" class="form-control" type="text" placeholder="Status Pegawai" style="width:335px;" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label">BPJS Kesehatan</label>
                      <div>
                        <input name="bpjs_kesehatan" id="bpjs_kesehatan" class="form-control" type="text" placeholder="BPJS Kesehatan" style="width:335px;" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label">BPJS Tenaga Kerja</label>
                      <div>
                        <input name="bpjs_tenaga_kerja" id="bpjs_tenaga_kerja" class="form-control" type="text" placeholder="BPJS Tenaga Kerja" style="width:335px;" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label">Taspen</label>
                      <div>
                        <input name="taspen" id="taspen" class="form-control" type="text" placeholder="Taspen" style="width:335px;" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label">Email</label>
                      <div>
                        <input name="email" id="email" class="form-control" type="text" placeholder="Email" style="width:335px;" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label">Segmen</label>
                      <div>
                        <input name="segmen" id="segmen" class="form-control" type="text" placeholder="Segmen" style="width:335px;" required>
                      </div>
                    </div>


                    <div class="form-group">
                      <label class="control-label">No. SK Calon Pegawai</label>
                      <div>
                        <input name="no_sk_cp" id="no_sk_cp" class="form-control" type="text" placeholder="SK Calon Pegawai" style="width:335px;" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label">TMT SK Calon Pegawai</label>
                      <div>
                        <input name="tmt_sk_cp" id="tmt_sk_cp" class="form-control" type="date" style="width:335px;" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label">No. SK Pegawai Perusahaan (100%)</label>
                      <div>
                        <input name="no_sk_pp" id="no_sk_pp" class="form-control" type="text" placeholder="no_sk_pp" style="width:335px;" required>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal-footer">
              <div class="col-md-12">
                <button type="submit" class="form-control btn btn-primary" id="btn_simpan"> <i class="glyphicon glyphicon-ok"></i> Simpan Data</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div> -->
  <!--END MODAL ADD-->
  <!-- MODAL EDIT -->
  <!-- <div class="modal fade" id="ModalaEdit" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 style="display:block; text-align:center;">Update Data Pegawai</h3>
        </div>
        <form class="form-horizontal">
          <div class="modal-body row">
            <div class="col-md-12">
              <div class="col-md-6">
                <div class="container">
                  <input name="id_edit" id="id2" class="form-control" type="hidden" placeholder="ID" style="width:335px;" readonly>

                  <div class="form-group">
                    <label class="control-label">Cabang</label>
                    <div>
                      <input name="cabang_edit" id="cabang2" class="form-control" type="text" placeholder="cabang" style="width:335px;" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label">Nik</label>
                    <div>
                      <input name="nik_edit" id="nik2" class="form-control" type="text" placeholder="nik" style="width:335px;" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label">No. Absen</label>
                    <div>
                      <input name="no_absen_edit" id="no_absen2" class="form-control" type="text" placeholder="No. Absen" style="width:335px;" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label">No. KTP</label>
                    <div>
                      <input name="no_ktp_edit" id="no_ktp2" class="form-control" type="text" placeholder="No. KTP" style="width:335px;" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Nama</label>
                    <div>
                      <input name="nama_edit" id="nama2" class="form-control" type="text" placeholder="Nama" style="width:335px;" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label">NO. Kartu Keluarga</label>
                    <div>
                      <input name="no_kk_edit" id="no_kk2" class="form-control" type="text" placeholder="NO. Kartu Keluarga" style="width:335px;" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label ">Jenis Kelamin</label>
                    <div>
                      <select class="form-control" name="jk_edit" id="jk2" style="width:355px;">
                        <option selected="">--pilih--</option>
                        <option>L</option>
                        <option>P</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label">Tempat Lahir</label>
                    <div>
                      <input name="tempat_lahir_edit" id="tempat_lahir2" class="form-control" type="text" placeholder="Tempar Lahir" style="width:335px;" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label">Tanggal Lahir</label>
                    <div>
                      <input name="tanggal_lahir_edit" id="tanggal_lahir2" class="form-control" type="date" style="width:335px;" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Pendidikan</label>
                    <div>
                      <input name="pendidikan_edit" id="pendidikan2" class="form-control" type="text" placeholder="Pendidikan" style="width:335px;" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Alamat</label>
                    <div>
                      <input name="alamat_edit" id="alamat2" class="form-control" type="text" placeholder="Alamat" style="width:335px;" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label">Telephone</label>
                    <div>
                      <input name="tlp_edit" id="tlp2" class="form-control" type="text" placeholder="Telephone" style="width:335px;" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label ">Agama</label>
                    <div>
                      <select class="form-control" name="agama_edit" id="agama2" style="width:355px;">
                        <option selected="">--pilih--</option>
                        <option>ISLAM</option>
                        <option>PROTESTAN</option>
                        <option>KATOLIK</option>
                        <option>HINDU</option>
                        <option>BUDDHA</option>
                        <option>KHONGHUCHU</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="container">
                  <div class="form-group">
                    <label class="control-label ">Golongan Darah</label>
                    <div>
                      <select class="form-control" name="gol_dar_edit" id="gol_dar2" style="width:355px;">
                        <option selected="">--pilih--</option>
                        <option>A</option>
                        <option>B</option>
                        <option>O</option>
                        <option>AB</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Tanggal Masuk/Awal Priode </label>
                    <div>
                      <input name="tgl_masuk_edit" id="tgl_masuk2" class="form-control" type="date" style="width:335px;" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label">Tanggal Akhir Kontrak</label>
                    <div>
                      <input name="tgl_akhir_edit" id="tgl_akhir2" class="form-control" type="date" style="width:335px;" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label">Status Pegawai</label>
                    <div>
                      <input name="status_pegawai_edit" id="status_pegawai2" class="form-control" type="text" placeholder="Status Pegawai" style="width:335px;" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label">BPJS Kesehatan</label>
                    <div>
                      <input name="bpjs_kesehatan_edit" id="bpjs_kesehatan2" class="form-control" type="text" placeholder="BPJS Kesehatan" style="width:335px;" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label">BPJS Tenaga Kerja</label>
                    <div>
                      <input name="bpjs_tenaga_kerja_edit" id="bpjs_tenaga_kerja2" class="form-control" type="text" placeholder="BPJS Tenaga Kerja" style="width:335px;" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label">Taspen</label>
                    <div>
                      <input name="taspen_edit" id="taspen2" class="form-control" type="text" placeholder="Taspen" style="width:335px;" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label">Email</label>
                    <div>
                      <input name="email_edit" id="email2" class="form-control" type="text" placeholder="Email" style="width:335px;" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label">Segmen</label>
                    <div>
                      <input name="segmen_edit" id="segmen2" class="form-control" type="text" placeholder="Segmen" style="width:335px;" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label">No. SK Calon Pegawai</label>
                    <div>
                      <input name="no_sk_cp_edit" id="no_sk_cp2" class="form-control" type="text" placeholder="SK Calon Pegawai" style="width:335px;" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label">TMT SK Calon Pegawai</label>
                    <div>
                      <input name="tmt_sk_cp_edit" id="tmt_sk_cp2" class="form-control" type="date" style="width:335px;" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label">No. SK Pegawai Perusahaan(100%)</label>
                    <div>
                      <input name="no_sk_pp_edit" id="no_sk_pp2" class="form-control" type="text" placeholder="SK Pegawai Perusahaan" style="width:335px;" required>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="col-md-12">
              <button type="submit" class="form-control btn btn-primary" id="btn_update"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
            </div>
          </div>
      </div>
    </div>
    </form>
  </div> -->
  <!--END MODAL EDIT-->
  <!--MODAL HAPUS-->
  <!-- <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 style="display:block; text-align:center;">Hapus Data Pegawai</h3>
        </div>
        <form class="form-horizontal">
          <div class="modal-body">

            <input type="hidden" name="kode" id="textkode" value="">
            <div class="alert alert-danger">
              <h4 class="modal-title">Apakah Anda Yakin Ingin Menghapus Data Ini?</h4>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
            <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
          </div>
          </frm>
      </div>
    </div>
  </div> -->
  <!--END MODAL HAPUS-->
  <!--MODAL QRCODE-->
  <!-- <div class="modal fade" id="qrcode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
          <h4 class="modal-title" id="myModalLabel">Buat QR Code Data</h4>
        </div>
        <form class="form-horizontal">
          <div class="modal-body">

            <input type="hidden" name="id" id="textid" value="">
            <input type="hidden" name="nik" id="nik" value="">
            <div class="alert alert-warning">
              <p>Apakah Anda yakin ingin membuat QR code untuk Data ini?</p>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button class="btn_buat btn btn-success" id="btn_buat">Buat</button>
          </div>
        </form>
      </div>
    </div>
  </div> -->
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
          [1, 'asc']
        ], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
        "ajax": {
          "url": "<?php echo base_url('Qrpegawai/view') ?>", // URL file untuk proses select datanya
          "type": "POST"
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
          }, {
            class: "opsi",
            data: "id",
            render: function(data, type, full, meta) {
              var str = '';
              // str += '<a onClick="qrid(' + data + ')"><i class="fa fa-qrcode btn btn-success">  QR Code</i></a>';
              str += '<a onClick="detail(' + data + ')"><i class="fa fa-list btn btn-info">  Detail</i></a>&nbsp';
              // str += '<a onClick="edit(' + data + ')"><i class="fa fa-pencil btn btn-warning">  Edit</i></a>&nbsp';
              // str += '<a onClick="deleteid(' + data + ')"><i class="fa fa-trash btn btn-danger">  Hapus</i></a>';
              return str;
            }
          },

        ],
      });
    });

    function detail(id) {
      var url = 'Detailp?id=__id__ ';
      window.location.href = url.replace('__id__', id);

    }

    // function qrid(id) {
    //   var url = '<?php echo base_url('Qrpegawai/get_pegawai') ?>';
    //   var data = {
    //     id: id
    //   };

    //   $.ajax({
    //     url: url,
    //     method: 'GET',
    //     data: data
    //   }).done(function(data, textStatus, jqXHR) {
    //     var data = JSON.parse(data);
    //     //$('#addModalLabel').html('Edit Cabang');
    //     $('[name="id"]').val(data.id);
    //     $('[name="nik"]').val(data.nik);

    //     $('#qrcode').modal('show');
    //   });
    // }


    //Buat qr
    // $('#btn_buat').on('click', function() {
    //   var nik = $('#nik').val();
    //   $.ajax({
    //     type: "POST",
    //     url: "<?php echo base_url('Qrpegawai/qrpegawai') ?>",
    //     dataType: "JSON",
    //     data: {
    //       nik: nik
    //     },
    //     success: function(data) {
    //       $('#Modaledit').modal('hide');
    //       //tampil_data_masuk();
    //     }
    //   });
    // });

    //Simpan Barang
    // $('#btn_simpan').on('click', function() {
    //   var cabang = $('#cabang').val();
    //   var nik = $('#nik').val();
    //   var no_absen = $('#no_absen').val();
    //   var no_ktp = $('#no_ktp').val();
    //   var nama = $('#nama').val();
    //   var no_kk = $('#no_kk').val();
    //   var jk = $('#jk').val();
    //   var tempat_lahir = $('#tempat_lahir').val();
    //   var tanggal_lahir = $('#tanggal_lahir').val();
    //   var pendidikan = $('#pendidikan').val();
    //   var alamat = $('#alamat').val();
    //   var tlp = $('#tlp').val();
    //   var agama = $('#agama').val();
    //   var gol_dar = $('#gol_dar').val();
    //   var tgl_masuk = $('#tgl_masuk').val();
    //   var tgl_akhir = $('#tgl_akhir').val();
    //   var status_pegawai = $('#status_pegawai').val();
    //   var bpjs_kesehatan = $('#bpjs_kesehatan').val();
    //   var bpjs_tenaga_kerja = $('#bpjs_tenaga_kerja').val();
    //   var taspen = $('#taspen').val();
    //   var email = $('#email').val();
    //   var segmen = $('#segmen').val();
    //   var no_sk_cp = $('#no_sk_cp').val();
    //   var tmt_sk_cp = $('#tmt_sk_cp').val();
    //   var no_sk_pp = $('#no_sk_pp').val();
    //   $.ajax({
    //     type: "POST",
    //     url: "<?php echo base_url('Qrpegawai/simpan_pegawai') ?>",
    //     dataType: "JSON",
    //     data: {
    //       cabang: cabang,
    //       nik: nik,
    //       no_absen: no_absen,
    //       no_ktp: no_ktp,
    //       nama: nama,
    //       no_kk: no_kk,
    //       jk: jk,
    //       tempat_lahir: tempat_lahir,
    //       tanggal_lahir: tanggal_lahir,
    //       pendidikan: pendidikan,
    //       alamat: alamat,
    //       tlp: tlp,
    //       agama: agama,
    //       gol_dar: gol_dar,
    //       tgl_masuk: tgl_masuk,
    //       tgl_akhir: tgl_akhir,
    //       status_pegawai: status_pegawai,
    //       bpjs_kesehatan: bpjs_kesehatan,
    //       bpjs_tenaga_kerja: bpjs_tenaga_kerja,
    //       taspen: taspen,
    //       email: email,
    //       segmen: segmen,
    //       no_sk_cp: no_sk_cp,
    //       tmt_sk_cp: tmt_sk_cp,
    //       no_sk_pp: no_sk_pp
    //     },
    //     success: function(data) {
    //       $('[name="cabang"]').val("");
    //       $('[name="nik"]').val("");
    //       $('[name="no_absen"]').val("");
    //       $('[name="no_ktp"]').val("");
    //       $('[name="nama"]').val("");
    //       $('[name="no_kk"]').val("");
    //       $('[name="jk"]').val("");
    //       $('[name="tempat_lahir"]').val("");
    //       $('[name="tanggal_lahir"]').val("");
    //       $('[name="pendidikan"]').val("");
    //       $('[name="alamat"]').val("");
    //       $('[name="tlp"]').val("");
    //       $('[name="agama"]').val("");
    //       $('[name="gol_dar"]').val("");
    //       $('[name="tgl_masuk"]').val("");
    //       $('[name="tgl_akhir"]').val("");
    //       $('[name="status_pegawai"]').val("");
    //       $('[name="bpjs_kesehatan"]').val("");
    //       $('[name="bpjs_tenaga_kerja"]').val("");
    //       $('[name="taspen"]').val("");
    //       $('[name="email"]').val("");
    //       $('[name="segmen"]').val("");
    //       $('[name="no_sk_cp"]').val("");
    //       $('[name="tmt_sk_cp"]').val("");
    //       $('[name="no_sk_pp"]').val("");
    //       $('#ModalaAdd').modal('hide');
    //       tampil_data_pegawai();
    //     }
    //   });
    // });

    // function edit(id) {
    //   var url = '<?php echo base_url('Qrpegawai/get_pegawai') ?>';
    //   var data = {
    //     id: id
    //   };
    //   $.ajax({
    //     url: url,
    //     method: 'GET',
    //     data: data
    //   }).done(function(data, textStatus, jqXHR) {
    //     var data = JSON.parse(data);
    //     $('[name="id_edit"]').val(data.id);
    //     $('[name="cabang_edit"]').val(data.cabang);
    //     $('[name="nik_edit"]').val(data.nik);
    //     $('[name="no_absen_edit"]').val(data.no_absen);
    //     $('[name="no_ktp_edit"]').val(data.no_ktp);
    //     $('[name="nama_edit"]').val(data.nama);
    //     $('[name="no_kk_edit"]').val(data.no_kk);
    //     $('[name="jk_edit"]').val(data.jk);
    //     $('[name="tempat_lahir_edit"]').val(data.tempat_lahir);
    //     $('[name="tanggal_lahir_edit"]').val(data.tanggal_lahir);
    //     $('[name="pendidikan_edit"]').val(data.pendidikan);
    //     $('[name="alamat_edit"]').val(data.alamat);
    //     $('[name="tlp_edit"]').val(data.tlp);
    //     $('[name="agama_edit"]').val(data.agama);
    //     $('[name="gol_dar_edit"]').val(data.gol_dar);
    //     $('[name="tgl_masuk_edit"]').val(data.tgl_masuk);
    //     $('[name="tgl_akhir_edit"]').val(data.tgl_akhir);
    //     $('[name="status_pegawai_edit"]').val(data.status_pegawai);
    //     $('[name="bpjs_kesehatan_edit"]').val(data.bpjs_kesehatan);
    //     $('[name="bpjs_tenaga_kerja_edit"]').val(data.bpjs_tenaga_kerja);
    //     $('[name="taspen_edit"]').val(data.taspen);
    //     $('[name="email_edit"]').val(data.email);
    //     $('[name="segmen_edit"]').val(data.segmen);
    //     $('[name="no_sk_cp_edit"]').val(data.no_sk_cp);
    //     $('[name="tmt_sk_cp_edit"]').val(data.tmt_sk_cp);
    //     $('[name="no_sk_pp_edit"]').val(data.no_sk_pp);

    //     $('#ModalaEdit').modal('show');
    //   });
    // }

    // //Update Barang
    // $('#btn_update').on('click', function() {
    //   var id = $('#id2').val();
    //   var cabang = $('#cabang2').val();
    //   var nik = $('#nik2').val();
    //   var no_absen = $('#no_absen2').val();
    //   var no_ktp = $('#no_ktp2').val();
    //   var nama = $('#nama2').val();
    //   var no_kk = $('#no_kk2').val();
    //   var jk = $('#jk2').val();
    //   var tempat_lahir = $('#tempat_lahir2').val();
    //   var tanggal_lahir = $('#tanggal_lahir2').val();
    //   var pendidikan = $('#pendidikan2').val();
    //   var alamat = $('#alamat2').val();
    //   var tlp = $('#tlp2').val();
    //   var agama = $('#agama2').val();
    //   var gol_dar = $('#gol_dar2').val();
    //   var tgl_masuk = $('#tgl_masuk2').val();
    //   var tgl_akhir = $('#tgl_akhir2').val();
    //   var status_pegawai = $('#status_pegawai2').val();
    //   var bpjs_kesehatan = $('#bpjs_kesehatan2').val();
    //   var bpjs_tenaga_kerja = $('#bpjs_tenaga_kerja2').val();
    //   var taspen = $('#taspen2').val();
    //   var email = $('#email2').val();
    //   var segmen = $('#segmen2').val();
    //   var no_sk_cp = $('#no_sk_cp2').val();
    //   var tmt_sk_cp = $('#tmt_sk_cp2').val();
    //   var no_sk_pp = $('#no_sk_pp2').val();

    //   $.ajax({
    //     type: "POST",
    //     url: "<?php echo base_url('Qrpegawai/update_pegawai') ?>",
    //     dataType: "JSON",
    //     data: {
    //       id: id,
    //       cabang: cabang,
    //       nik: nik,
    //       no_absen: no_absen,
    //       no_ktp: no_ktp,
    //       nama: nama,
    //       no_kk: no_kk,
    //       jk: jk,
    //       tempat_lahir: tempat_lahir,
    //       tanggal_lahir: tanggal_lahir,
    //       pendidikan: pendidikan,
    //       alamat: alamat,
    //       tlp: tlp,
    //       agama: agama,
    //       gol_dar: gol_dar,
    //       tgl_masuk: tgl_masuk,
    //       tgl_akhir: tgl_akhir,
    //       status_pegawai: status_pegawai,
    //       bpjs_kesehatan: bpjs_kesehatan,
    //       bpjs_tenaga_kerja: bpjs_tenaga_kerja,
    //       taspen: taspen,
    //       email: email,
    //       segmen: segmen,
    //       no_sk_cp: no_sk_cp,
    //       tmt_sk_cp: tmt_sk_cp,
    //       no_sk_pp: no_sk_pp
    //     },
    //     success: function(data) {
    //       $('[name="id"]').val("");
    //       $('[name="cabang_edit"]').val("");
    //       $('[name="nik_edit"]').val("");
    //       $('[name="no_absen_edit"]').val("");
    //       $('[name="no_ktp_edit"]').val("");
    //       $('[name="nama_edit"]').val("");
    //       $('[name="no_kk_edit"]').val("");
    //       $('[name="jk_edit"]').val("");
    //       $('[name="tempat_lahir_edit"]').val("");
    //       $('[name="tanggal_lahir_edit"]').val("");
    //       $('[name="pendidikan_edit"]').val("");
    //       $('[name="alamat_edit"]').val("");
    //       $('[name="tlp_edit"]').val("");
    //       $('[name="agama_edit"]').val("");
    //       $('[name="gol_dar_edit"]').val("");
    //       $('[name="tgl_masuk_edit"]').val("");
    //       $('[name="tgl_akhir_edit"]').val("");
    //       $('[name="status_pegawai_edit"]').val("");
    //       $('[name="bpjs_kesehatan_edit"]').val("");
    //       $('[name="bpjs_tenaga_kerja_edit"]').val("");
    //       $('[name="taspen_edit"]').val("");
    //       $('[name="email_edit"]').val("");
    //       $('[name="segmen_edit"]').val("");
    //       $('[name="no_sk_cp_edit"]').val("");
    //       $('[name="tmt_sk_cp_edit"]').val("");
    //       $('[name="no_sk_pp_edit"]').val("");
    //       $('#ModalaEdit').modal('hide');
    //       tampil_data_pegawai();
    //     }
    //   });
    // });

    // function deleteid(id) {
    //   $('#ModalHapus').modal('show');
    //   $('[name ="kode"]').val(id);
    // }

    // //Hapus Barang
    // $('#btn_hapus').on('click', function() {
    //   var kode = $('#textkode').val();
    //   $.ajax({
    //     type: "POST",
    //     url: "<?php echo base_url('Qrpegawai/hapus_pegawai') ?>",
    //     dataType: "JSON",
    //     data: {
    //       kode: kode
    //     },
    //     success: function(data) {
    //       $('#ModalHapus').modal('hide');
    //       tampil_data_pegawai();
    //     }
    //   });
    // });
  </script>

  <?php $this->load->view('footer') ?>
  </div>
</body>

</html>