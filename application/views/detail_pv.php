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
                    <li class="active">Detail Pegawai</li>
                </ol>
            </section>


            <section class="content">
                <div class="row">
                    <div id="reload">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title"></h3>
                                    <a class="nav-link btn btn-primary" href="<?php echo base_url('Qrpegawai'); ?>">
                                        <i class="fa fa-angle-left"></i> Kembali
                                    </a>
                                </div>
                                <div class="row">
                                    <div class="container">
                                        <hr />
                                        <div class="col-md-6 ">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <td><label class="control-label">Cabang</label></td>
                                                        <td><?php echo $cabang; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label">Nomor Induk Karyawan</label></td>
                                                        <td><?php echo $nik; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label ">No. absen</label></td>
                                                        <td><?php echo $no_absen; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label ">No KTP</label></td>
                                                        <td><?php echo $no_ktp; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label ">Nama</label></td>
                                                        <td><?php echo $nama; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label ">No. Kartu Keluarga</label></td>
                                                        <td><?php echo $no_kk; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label ">Jenis Kelamin</label></td>
                                                        <td><?php echo $jk; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label ">Tempat Lahir</label></td>
                                                        <td><?php echo $tempat_lahir; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label ">Tanggal Lahir</label></td>
                                                        <td><?php echo $tanggal_lahir; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label ">Pendidikan</label></td>
                                                        <td><?php echo $pendidikan; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label ">Alamat</label></td>
                                                        <td><?php echo $alamat; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label ">Telephone</label></td>
                                                        <td><?php echo $tlp; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label ">Agama</label></td>
                                                        <td><?php echo $agama; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label ">Golongan Darah</label></td>
                                                        <td><?php echo $gol_dar; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label ">Tanggal Masuk / Awal Kontrak</label></td>
                                                        <td><?php echo $tgl_masuk; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label ">Tanggal Akhir Kontrak</label></td>
                                                        <td><?php echo $tgl_akhir; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td> <label class="control-label ">Status Pegawai</label>
                                                        </td>
                                                        <td> <?php echo $status_pegawai; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <label class="control-label ">BPJS Kesehatan</label>
                                                        </td>
                                                        <td> <?php echo $bpjs_kesehatan; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <label class="control-label ">BPJS Tenaga Kerja</label>
                                                        </td>
                                                        <td> <?php echo $bpjs_tenaga_kerja; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <label class="control-label ">Taspen</label>
                                                        </td>
                                                        <td> <?php echo $taspen; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <label class="control-label ">Email</label>
                                                        </td>
                                                        <td> <?php echo $email; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <label class="control-label ">Segmen</label>
                                                        </td>
                                                        <td> <?php echo $segmen; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <label class="control-label ">No. SK Calon Pegawai</label>
                                                        </td>
                                                        <td> <?php echo $no_sk_cp; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <label class="control-label ">TMT SK Calon Pegawai</label>
                                                        </td>
                                                        <td> <?php echo $tmt_sk_cp; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <label class="control-label ">No. SK Pegawai Perusahaan(100%)</label>
                                                        </td>
                                                        <td> <?php echo $no_sk_pp; ?>
                                                        </td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <!-- <div class="col-md-3 ">
                                            <label class="control-label ">QR CODE</label><br>
                                            <?php //echo "<img src='assets/uploads/qr-code/item-$nik.png' width='220' height='220' />"; 
                                            ?><br>
                                            <button type="submit" onClick="qrid(<?php //echo $id; 
                                                                                ?>)" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-qrcode"></i> Buat QR Code</button>
                                        </div> -->
                                        <div class="col-md-3 ">
                                            <label class="control-label ">Foto</label><br>
                                            <?php echo "<img src='assets/uploads/foto/foto-$nik.png' width='220' height='220' />";
                                            ?><br>

                                            <?php echo form_open_multipart('Qrpegawai/aksi_upload'); ?>
                                            <input type="hidden" name="nik" id="nik" value="<?php echo $nik; ?>">
                                            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>"><br />
                                            <input type="file" name="berkas" class="form-control btn btn-primary" />
                                            <small><cite>Silahkan upload foto tanpa background dengan format .png</cite></small>
                                            <br />
                                            <input type="submit" value="upload" class="form-control btn btn-primary" />
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
                                            } ?>
                                            </form>

                                        </div>
                                        <div class="col-md-3 ">
                                            <label class="control-label ">ID CARD PEGAWAI</label><br>
                                            <?php echo "<img src='assets/uploads/id-card/idcard-$nik.png' width='325' height='502' />"; ?><br><br>
                                            <button type="submit" onClick="idcard(<?php echo $id; ?>)" class="form-control btn btn-primary"> <i class="fa fa-credit-card"></i> Buat ID Card</button><br><br>
                                            <button type="submit" onClick="down('<?php echo $nik; ?>')" class="form-control btn btn-primary"> <i class="fa fa-download"></i> Download ID Card</button>
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
                                <p>Apakah Anda yakin ingin membuat ID CARD untuk Data ini?</p>
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
        <!--MODAL id card-->
        <div class="modal fade" id="idcard" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Buat Id Card</h4>
                    </div>
                    <form class="form-horizontal">
                        <div class="modal-body">

                            <input type="hidden" name="id" id="textid" value="">
                            <input type="hidden" name="nik" id="nik" value="">
                            <input type="hidden" name="nama" id="nama" value="">
                            <div class="alert alert-warning">
                                <p>Apakah Anda yakin ingin membuat Id Card untuk Data ini?</p>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                            <button class="btn_idcard btn btn-success" id="btn_idcard">Buat</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <script type="text/javascript" src="<?php echo base_url() . 'assets/admin/bower_components/jquery/dist/jquery.js' ?>"></script>
        <script type="text/javascript">
            // function qrid(id) {
            //     var url = '<?php echo base_url('Qrpegawai/get_pegawai') ?>';
            //     var data = {
            //         id: id
            //     };

            //     $.ajax({
            //         url: url,
            //         method: 'GET',
            //         data: data
            //     }).done(function(data, textStatus, jqXHR) {
            //         var data = JSON.parse(data);
            //         //$('#addModalLabel').html('Edit Cabang');
            //         $('[name="id"]').val(data.id);
            //         $('[name="nik"]').val(data.nik);

            //         $('#qrcode').modal('show');
            //     });
            // }

            //Buat qr
            $('#btn_buat').on('click', function() {
                var nik = $('#nik').val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('Qrpegawai/qrpegawai') ?>",
                    dataType: "JSON",
                    data: {
                        nik: nik
                    },
                    success: function(data) {
                        $('#Modaledit').modal('hide');
                        //tampil_data_masuk();
                    }
                });
            });

            function idcard(id) {
                var url = '<?php echo base_url('Qrpegawai/get_pegawai') ?>';
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
                    $('[name="nik"]').val(data.nik);
                    $('[name="nama"]').val(data.nama);
                    $('#idcard').modal('show');
                });
            }

            //Buat card
            $('#btn_idcard').on('click', function() {
                var nik = $('#nik').val();
                var nama = $('#nama').val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('Qrpegawai/card') ?>",
                    dataType: "JSON",
                    data: {
                        nik: nik,
                        nama: nama
                    },
                    success: function(data) {
                        $('#Modaledit').modal('hide');
                        //tampil_data_masuk();
                    }
                });
            });

            // download
            function down(nik) {
                var url = 'Detailp/download?nik=__nik__ ';
                window.location.href = url.replace('__nik__', nik);
            }
        </script>

        <?php $this->load->view('footer') ?>
</body>

</html>