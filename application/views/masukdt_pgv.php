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