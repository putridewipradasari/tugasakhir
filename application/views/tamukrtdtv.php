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
                    Data Kartu Tamu
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-users"></i> Home</a></li>
                    <li class="active">Detail Kartu Tamu</li>
                </ol>
            </section>


            <section class="content">
                <div class="row">
                    <div id="reload">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title"></h3>
                                    <a class="nav-link btn btn-primary" href="<?php echo base_url('Tamukrt'); ?>">
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
                                                        <td><label class="control-label">Id Kartu</label></td>
                                                        <td><?php echo $id_kartu; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label ">Nama Kartu</label></td>
                                                        <td><?php echo $nm_kartu; ?></td>
                                                    </tr>

                                                </thead>
                                            </table>
                                        </div>
                                        <!-- <div class="col-md-3 ">
                                            <label class="control-label ">QR CODE</label><br>
                                            <?php //echo "<img src='assets/uploads/qr-code/item-$id_kartu.png' width='220' height='220' />"; 
                                            ?><br>
                                            <button type="submit" onClick="qrid(<?php //echo $id; 
                                                                                ?>)" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-qrcode"></i> Buat QR Code</button>
                                        </div> -->

                                        <div class="col-md-3 ">
                                            <label class="control-label ">ID CARD TAMU</label><br>
                                            <?php echo "<img src='assets/uploads/id-card/tamukrt/idcard-$id_kartu.png' width='325' height='502' />"; ?><br><br>
                                            <button type="submit" onClick="idcard(<?php echo $id; ?>)" class="form-control btn btn-primary"> <i class="fa fa-credit-card"></i> Buat ID Card</button><br><br>
                                            <button type="submit" onClick="down('<?php echo $id_kartu; ?>')" class="form-control btn btn-primary"> <i class="fa fa-download"></i> Download ID Card</button>
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
                            <input type="hidden" name="id_kartu" id="id_kartu" value="">
                            <input type="hidden" name="nm_kartu" id="nm_kartu" value="">
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
            function idcard(id) {
                var url = '<?php echo base_url('Tamukrtdt/get_tamukrt') ?>';
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
                    $('#idcard').modal('show');
                });
            }

            //Buat card
            $('#btn_idcard').on('click', function() {
                var id_kartu = $('#id_kartu').val();
                var nm_kartu = $('#nm_kartu').val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('Tamukrtdt/card') ?>",
                    dataType: "JSON",
                    data: {
                        id_kartu: id_kartu,
                        nm_kartu: nm_kartu
                    },
                    success: function(data) {
                        $('#Modaledit').modal('hide');
                        //tampil_data_masuk();
                    }
                });
            });

            // download
            function down(id_kartu) {
                var url = 'Tamukrtdt/download?id_kartu=__id_kartu__ ';
                window.location.href = url.replace('__id_kartu__', id_kartu);
            }
        </script>

        <?php $this->load->view('footer') ?>
</body>

</html>