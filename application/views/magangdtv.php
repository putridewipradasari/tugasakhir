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
                    Data Magang
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-users"></i> Home</a></li>
                    <li class="active">Detail Magang</li>
                </ol>
            </section>


            <section class="content">
                <div class="row">
                    <div id="reload">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title"></h3>
                                    <a class="nav-link btn btn-primary" href="<?php echo base_url('Magang'); ?>">
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
                                                        <td><label class="control-label">Nomor Induk</label></td>
                                                        <td><?php echo $no_induk; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label ">Nama</label></td>
                                                        <td><?php echo $nama; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label ">Instansi</label></td>
                                                        <td><?php echo $asal; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label ">Tujuan</label></td>
                                                        <td><?php echo $tujuan; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label ">Keterangan</label></td>
                                                        <td><?php echo $keterangan; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label ">Status</label></td>
                                                        <td><?php echo $status; ?></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <!-- <div class="col-md-3 ">
                                            <label class="control-label ">QR CODE</label><br>
                                            <?php //echo "<img src='assets/uploads/qr-code/item-$no_induk.png' width='220' height='220' />"; 
                                            ?><br>
                                            <button type="submit" onClick="qrid(<?php //echo $id; 
                                                                                ?>)" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-qrcode"></i> Buat QR Code</button>
                                        </div> -->
                                        <div class="col-md-3 ">
                                            <label class="control-label ">Foto</label><br>
                                            <?php echo "<img src='assets/uploads/foto/magang/foto-$no_induk.png' width='220' height='220' />";
                                            ?><br>

                                            <?php echo form_open_multipart('Magangdt/aksi_upload'); ?>
                                            <input type="hidden" name="no_induk" id="no_induk" value="<?php echo $no_induk; ?>">
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
                                            <label class="control-label ">ID CARD MAGANG</label><br>
                                            <?php echo "<img src='assets/uploads/id-card/magang/idcard-$no_induk.png' width='325' height='502' />"; ?><br><br>
                                            <button type="submit" onClick="idcard(<?php echo $id; ?>)" class="form-control btn btn-primary"> <i class="fa fa-credit-card"></i> Buat ID Card</button><br><br>
                                            <button type="submit" onClick="down('<?php echo $no_induk; ?>')" class="form-control btn btn-primary"> <i class="fa fa-download"></i> Download ID Card</button>
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
                            <input type="hidden" name="no_induk" id="no_induk" value="">
                            <input type="hidden" name="nama" id="nama" value="">
                            <div class="alert alert-warning">
                                <p>Apakah Anda yakin ingin membuat ID CARD untuk Data ini?</p>
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
            //     var url = '<?php echo base_url('Magangdt/get_pegawai') ?>';
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
            //         $('[name="no_induk"]').val(data.no_induk);

            //         $('#qrcode').modal('show');
            //     });
            // }

            // //Buat qr
            // $('#btn_buat').on('click', function() {
            //     var no_induk = $('#no_induk').val();
            //     $.ajax({
            //         type: "POST",
            //         url: "<?php echo base_url('Magangdt/qrpegawai') ?>",
            //         dataType: "JSON",
            //         data: {
            //             no_induk: no_induk
            //         },
            //         success: function(data) {
            //             $('#Modaledit').modal('hide');
            //             //tampil_data_masuk();
            //         }
            //     });
            // });

            function idcard(id) {
                var url = '<?php echo base_url('Magangdt/get_magang') ?>';
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
                    $('#idcard').modal('show');
                });
            }

            //Buat card
            $('#btn_idcard').on('click', function() {
                var no_induk = $('#no_induk').val();
                var nama = $('#nama').val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('Magangdt/card') ?>",
                    dataType: "JSON",
                    data: {
                        no_induk: no_induk,
                        nama: nama
                    },
                    success: function(data) {
                        $('#Modaledit').modal('hide');
                        //tampil_data_masuk();
                    }
                });
            });

            // download
            function down(no_induk) {
                var url = 'Magangdt/download?no_induk=__no_induk__ ';
                window.location.href = url.replace('__no_induk__', no_induk);
            }
        </script>

        <?php $this->load->view('footer') ?>
    
</body>

</html>