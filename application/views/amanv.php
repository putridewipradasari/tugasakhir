<!DOCTYPE html>
<html>

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
                    SCAN ID CARD
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-users"></i> Home</a></li>
                    <li class="active">scan id card</li>
                </ol>
            </section>


            <section class="content">
                <div class="row">
                    <div id="reload">
                        <div class="col-xs-12">
                            <div class="box">
                                <!--div class="box-header">
                                    <div class="row">
                                        <div class="container">
                                            <scan webcam-->
                                <!--div class="col-md-6">
                                                <video id="preview" width="100%"></video>
                                            </!--div>
                                            <div class="col-sm-6">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating">Nomor Induk Karyawan</label>
                                                    <input type="text" id="nik" name="nik" class="form-control" required autofocus>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating">QR Code <i class=" fa fa-qrcode"></i></label>
                                                    <span id='example'></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div-->
                                <div class="row">
                                    <div class="col-md-4" style="padding:10px;background:#fff;border-radius: 5px;" id="divvideo">
                                        <center>
                                            <p class="login-box-msg"> <i class="glyphicon glyphicon-camera"></i> SCAN</p>
                                        </center>
                                        <video id="preview" width="100%" height="50%" style="border-radius:10px;"></video>
                                        <br>
                                        <br>
                                        <?php
                                        if (isset($_SESSION['error'])) {
                                            echo "
                                            <div class='alert alert-danger alert-dismissible' style='background:red;color:#fff'>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                            <h4><i class='icon fa fa-warning'></i> Error!</h4>
                                            " . $_SESSION['error'] . "
                                            </div>
                                        ";
                                            unset($_SESSION['error']);
                                        }
                                        if (isset($_SESSION['success'])) {
                                            echo "<div class='alert alert-success alert-dismissible' style='background:green;color:#fff'>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                            <h4><i class='icon fa fa-check'></i> Success!</h4>
                                            " . $_SESSION['success'] . "
                                            </div>
                                        ";
                                            unset($_SESSION['success']);
                                        }
                                        ?>

                                    </div>

                                    <div class="col-md-8">
                                        <form action="<?php echo base_url() . "Aman/get_waktu" ?>" method="post" class="form-horizontal" style="border-radius: 5px;padding:10px;background:#fff;" id="divvideo">
                                            <i class="glyphicon glyphicon-qrcode"></i> <label>SCAN QR CODE</label>
                                            <p id="time"></p>
                                            <input type="text" name="nik" id="nik" placeholder="scan qrcode" class="form-control" autofocus required>
                                        </form>
                                        <div style="border-radius: 5px;padding:10px;background:#fff;" id="divvideo">

                                            <!-- <a class="nav-link btn btn-primary" href="#" data-toggle="modal" data-target="#ModelTamu"><i class="fa fa-plus-circle"></i> Tambah</a> -->

                                            <table id="mydata" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Nomor Induk</th>
                                                        <th>Nama</th>
                                                        <th>Waktu Masuk</th>
                                                        <th>Waktu Keluar</th>
                                                        <th>Jenis Kartu</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="show_data">

                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Nomor Induk</th>
                                                        <th>Nama</th>
                                                        <th>Waktu Masuk</th>
                                                        <th>Waktu Keluar</th>
                                                        <th>Jenis Kartu</th>
                                                    </tr>
                                                </tfoot>

                                            </table>

                                        </div>

                                    </div>

                                </div>

                                <!--div class="row">
                                    <div class="container">
                                        <hr />
                                        <div class="col-md-6 ">
                                            <form class="form-horizontal">
                                                <div class="form-group">
                                                    <label class="control-label col-xs-3">Cabang</label>
                                                    <div class="col-xs-9">
                                                        <input name="cabang" class="form-control" type="text" style="width:335px;" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-xs-3">Nomor Induk Karyawan</label>
                                                    <div class="col-xs-9">
                                                        <input name="nik" class="form-control" type="text" style="width:335px;" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-xs-3">No. absen</label>
                                                    <div class="col-xs-9">
                                                        <input name="no_absen" class="form-control" type="text" style="width:335px;" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-xs-3">No KTP</label>
                                                    <div class="col-xs-9">
                                                        <input name="no_ktp" class="form-control" type="text" style="width:335px;" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-xs-3">Nama</label>
                                                    <div class="col-xs-9">
                                                        <input name="nama" class="form-control" type="text" style="width:335px;" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-xs-3">No. Kartu Keluarga</label>
                                                    <div class="col-xs-9">
                                                        <input name="no_kk" class="form-control" type="text" style="width:335px;" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-xs-3">Jenis Kelamin</label>
                                                    <div class="col-xs-9">
                                                        <input name="jk" class="form-control" type="text" style="width:335px;" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-xs-3">Tempat Lahir</label>
                                                    <div class="col-xs-9">
                                                        <input name="tempat_lahir" class="form-control" type="text" style="width:335px;" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-xs-3">Tanggal Lahir</label>
                                                    <div class="col-xs-9">
                                                        <input name="tanggal_lahir" class="form-control" type="text" style="width:335px;" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-xs-3">Pendidikan</label>
                                                    <div class="col-xs-9">
                                                        <input name="pendidikan" class="form-control" type="text" style="width:335px;" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-xs-3">Alamat</label>
                                                    <div class="col-xs-9">
                                                        <input name="alamat" class="form-control" type="text" style="width:335px;" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-xs-3">Telephone</label>
                                                    <div class="col-xs-9">
                                                        <input name="tlp" class="form-control" type="text" style="width:335px;" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-xs-3">Agama</label>
                                                    <div class="col-xs-9">
                                                        <input name="agama" class="form-control" type="text" style="width:335px;" readonly>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-6 ">
                                            <form class="form-horizontal">
                                                <div class="form-group">
                                                    <label class="control-label col-xs-3">Golongan Darah</label>
                                                    <div class="col-xs-9">
                                                        <input name="gol_dar" class="form-control" type="text" style="width:335px;" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-xs-3">Tanggal Masuk / Awal Kontrak</label>
                                                    <div class="col-xs-9">
                                                        <input name="tgl_masuk" class="form-control" type="text" style="width:335px;" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-xs-3">Tanggal Akhir Kontrak</label>
                                                    <div class="col-xs-9">
                                                        <input name="tgl_akhir" class="form-control" type="text" style="width:335px;" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-xs-3">Status Pegawai</label>
                                                    <div class="col-xs-9">
                                                        <input name="status_pegawai" class="form-control" type="text" style="width:335px;" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-xs-3">BPJS Kesehatan</label>
                                                    <div class="col-xs-9">
                                                        <input name="bpjs_kesehatan" class="form-control" type="text" style="width:335px;" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-xs-3">BPJS Tenaga Kerja</label>
                                                    <div class="col-xs-9">
                                                        <input name="bpjs_tenaga_kerja" class="form-control" type="text" style="width:335px;" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-xs-3">Taspen</label>
                                                    <div class="col-xs-9">
                                                        <input name="taspen" class="form-control" type="text" style="width:335px;" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-xs-3">Email</label>
                                                    <div class="col-xs-9">
                                                        <input name="email" class="form-control" type="text" style="width:335px;" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-xs-3">Segmen</label>
                                                    <div class="col-xs-9">
                                                        <input name="segmen" class="form-control" type="text" style="width:335px;" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-xs-3">No. SK Calon Pegawai</label>
                                                    <div class="col-xs-9">
                                                        <input name="no_sk_cp" class="form-control" type="text" style="width:335px;" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-xs-3">TMT SK Calon Pegawai</label>
                                                    <div class="col-xs-9">
                                                        <input name="tmt_sk_cp" class="form-control" type="text" style="width:335px;" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-xs-3">No. SK Pegawai Perusahaan(100%)</label>
                                                    <div class="col-xs-9">
                                                        <input name="no_sk_pp" class="form-control" type="text" style="width:335px;" readonly>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div-->
                                <!-- /.box-header -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
                <!-- /.row -->
            </section>
        </div>
        <!-- TAMBAH TAMU -->
        <div class="modal fade" id="ModelTamu">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah data</h4>
                        <button class="close" data-dismiss="modal" type="button">&times;</button>
                    </div>
                    <!--?php form_open('Data/simpan_barang', ['class' => 'formsimpan'])?-->
                    <div class="pesan" style="display: none;"></div>
                    <div class="modal-body">
                        <form id="ModelTamu">
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
                                        <label class="bmd-label-floating">Alamat / Instansi</label>
                                        <input type="text" id="asal" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Tujuan</label>
                                        <textarea id="tujuan" name="tujuan" class="form-control" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Keterangan</label>
                                        <textarea id="keterangan" nama="keterangan" class="form-control" required></textarea>
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


        <script type="text/javascript" src="<?php echo base_url() . 'assets/admin/bower_components/jquery/dist/jquery.js' ?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {


                tabel = $('#mydata').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ordering": true, // Set true agar bisa di sorting
                    "order": [
                        [2, 'desc']
                    ], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
                    "ajax": {
                        "url": "<?php echo base_url('Aman/userList') ?>", // URL file untuk proses select datanya
                        "type": "POST"
                    },
                    "deferRender": true,
                    "aLengthMenu": [
                        [10, 50, 100],
                        [10, 50, 100]
                    ], // Combobox Limit
                    "columns": [{
                            "data": "nik"
                        },
                        {
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
                        /*{
                            data: "id",
                            render: function(data, type, full, meta) {
                                var str = '';
                                str += '<a onClick="deleteid(' + data + ')"><i class="fa fa-trash btn btn-danger"></i></a>';
                                return str;
                            }
                        },*/
                    ],
                });
            });
        </script>
        <script>
            let scanner = new Instascan.Scanner({
                video: document.getElementById('preview')
            });
            Instascan.Camera.getCameras().then(function(cameras) {
                if (cameras.length > 0) {
                    scanner.start(cameras[0]);
                } else {
                    alert('No cameras found');
                }

            }).catch(function(e) {
                console.error(e);
            });

            scanner.addListener('scan', function(c) {
                document.getElementById('nik').value = c;
                document.forms[0].submit();
            });
        </script>
        <?php $this->load->view('footer') ?>
</body>

</html>