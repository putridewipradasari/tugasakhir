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
                    Data Pegawai
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-users"></i> Home</a></li>
                    <li class="active">Keamanan</li>
                </ol>
            </section>


            <section class="content">
                <div class="row">
                    <div id="reload">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <div class="row">
                                        <div class="container">
                                            <!--scan webcam-->
                                            <div class="col-md-6">
                                                <video id="preview" width="100%"></video>
                                            </div>
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
                                </div>

                                <div class="row">
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
                                </div>
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


        <script type="text/javascript" src="<?php echo base_url() . 'assets/admin/bower_components/jquery/dist/jquery.js' ?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#nik').on('input', function() {
                     //$('#nik').on('change', function() {

                    var nik = $(this).val();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('aman/get_barang') ?>",
                        dataType: "JSON",
                        data: {
                            nik: nik
                        },
                        cache: false,
                        success: function(data) {
                            if (data.error) {
                                $('.pesan').html(data.error).show();
                            }
                            $.each(data, function(nik, cabang, no_absen, no_ktp, nama, no_kk, jk, tempat_lahir, tanggal_lahir, pendidikan, alamat, tlp, agama, gol_dar, tgl_masuk, tgl_akhiir, status_pegawai, bpjs_kesehatan, bpjs_tenaga_kerja, taspen, email, segmen, no_sk_cp, tmt_sk_cp, no_sk_pp) {
                                $('[name="cabang"]').val(data.cabang);
                                $('[name="nik"]').val(data.nik);
                                $('[name="no_absen"]').val(data.no_absen);
                                $('[name="no_ktp"]').val(data.no_ktp);
                                $('[name="nama"]').val(data.nama);
                                $('[name="no_kk"]').val(data.no_kk);
                                $('[name="jk"]').val(data.jk);
                                $('[name="tempat_lahir"]').val(data.tempat_lahir);
                                $('[name="tanggal_lahir"]').val(data.tanggal_lahir);
                                $('[name="pendidikan"]').val(data.pendidikan);
                                $('[name="alamat"]').val(data.alamat);
                                $('[name="tlp"]').val(data.tlp);
                                $('[name="agama"]').val(data.agama);
                                $('[name="gol_dar"]').val(data.gol_dar);
                                $('[name="tgl_masuk"]').val(data.tgl_masuk);
                                $('[name="tgl_akhir"]').val(data.tgl_akhir);
                                $('[name="status_pegawai"]').val(data.status_pegawai);
                                $('[name="bpjs_kesehatan"]').val(data.bpjs_kesehatan);
                                $('[name="bpjs_tenaga_kerja"]').val(data.bpjs_tenaga_kerja);
                                $('[name="taspen"]').val(data.taspen);
                                $('[name="email"]').val(data.email);
                                $('[name="segmen"]').val(data.segmen);
                                $('[name="no_sk_cp"]').val(data.no_sk_cp);
                                $('[name="tmt_sk_cp"]').val(data.tmt_sk_cp);
                                $('[name="no_sk_pp"]').val(data.no_sk_pp);
                                $('#tampil').html(data.nik);
                                $('#example').html('<p><img src="assets/uploads/qr-code/item-' + data.nik + '.png" width="220" height="220" /></p>');

                            });


                        }
                    });
                    return false;
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