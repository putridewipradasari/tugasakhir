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
                    Detail Data
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-users"></i> Home</a></li>
                    <li class="active">Detail</li>
                </ol>
            </section>


            <section class="content">
                <div class="row">
                    <div id="reload">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title"></h3>
                                    <a class="nav-link btn btn-primary" href="<?php echo base_url('Masuk'); ?>">
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
                                                        <td><label class="control-label">id kartu</label></td>
                                                        <td><?php echo $id_kartu; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label">Nama</label></td>
                                                        <td><?php echo $nama; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label ">Alamat atau instansi</label></td>
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
                                                    
                                                </thead>
                                            </table>
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
           
        </script>

        <?php $this->load->view('footer') ?>
</body>

</html>