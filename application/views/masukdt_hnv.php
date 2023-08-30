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
                    Data Honorer
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-users"></i> Home</a></li>
                    <li class="active">Detail Honorer</li>
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
                                                        <td><label class="control-label">Nomor Induk</label></td>
                                                        <td><?php echo $no_induk; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label ">Nama</label></td>
                                                        <td><?php echo $nama; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label ">Alamat</label></td>
                                                        <td><?php echo $asal; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label ">Bidang</label></td>
                                                        <td><?php echo $bidang; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label ">No KTP</label></td>
                                                        <td><?php echo $ktp; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label ">No HP</label></td>
                                                        <td><?php echo $no_tlp; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label ">Status</label></td>
                                                        <td><?php echo $status; ?></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                       
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
        
        <?php $this->load->view('footer') ?>
</body>

</html>