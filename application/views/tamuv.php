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
                    Data Tamu
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-users"></i> Home</a></li>
                    <li class="active">Tamu</li>
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
                                            <h3 class="box-title"></h3>
                                            <a class="nav-link btn btn-primary" href="<?php echo base_url('Aman'); ?>">
                                                <i class="fa fa-angle-left"></i> Batal
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="container">
                                        <div class="col-md-6 ">
                                            <form action="<?php echo site_url('Tamu/simpan_dt_tamu') ?>" method="post" enctype="multipart/form-data">
                                                <div class="box-header">
                                                    <div class="row">
                                                        <div class="container">
                                                            <h3 class="bmd-label-floating">SILAHKAN MASUKKAN DATA TAMU</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pesan" style="display: none;"></div>
                                                <input type="hidden" id="id_kartu" name="id_kartu" value="<?php echo $id_kartu; ?>" class="form-control">
                                                <input type="hidden" id="nm_kartu" name="nm_kartu" value="<?php echo $nm_kartu; ?>" class="form-control">
                                                <div class="form_group">
                                                    <div class="form-group bmd-form-group">
                                                        <label class="bmd-label-floating">Nama</label>
                                                        <input type="text" id="nama" name="nama" class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="form_group">
                                                    <div class="form-group bmd-form-group">
                                                        <label class="bmd-label-floating">Alamat/Instansi</label>
                                                        <input type="text" id="asal" name="asal" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form_group">
                                                    <div class="form-group bmd-form-group">
                                                        <label class="bmd-label-floating">Tujuan</label>
                                                        <textarea class="form-control" id="tujuan" name="tujuan" rows="3" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="form_group">
                                                    <div class="form-group bmd-form-group">
                                                        <label class="bmd-label-floating">Keterangan</label>
                                                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required></textarea>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <input type="submit" name="submit" id="btn_simpan" class="btn btn-info btn-primary" value="Tambah">
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>

                                        </form>

                                        <!-- <div class="row">
                                            <div id="reload">
                                                <div class="col-xs-12">
                                                    <div class="box">
                                                        <div class="box-header">
                                                        </div>
                                                        <!-- /.box-header -->
                                        <!-- <div class="box-body table-responsive">
                                                            <table id="mydata" class="table table-bordered table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Nama</th>
                                                                        <th>Nomor Induk Kependudukan</th>
                                                                        <th>Keterangan</th>
                                                                        <th>Waktu Masuk</th>
                                                                        <th>Waktu Keluar</th>
                                                                        <th>Atur Waktu Keluar</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="show_data">

                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>Nama</th>
                                                                        <th>Nomor Induk Kependudukan</th>
                                                                        <th>Keterangan</th>
                                                                        <th>Waktu Masuk</th>
                                                                        <th>Waktu Keluar</th>
                                                                        <th>Atur Waktu Keluar</th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                        <!-- /.box-body -->
                                        <!-- </div> -->
                                        <!-- /.box -->
                                        <!-- </div> -->
                                        <!-- /.col -->
                                        <!-- </div>
                                        </div> -->
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

        <!--MODAL HAPUS-->
        <div class="modal fade" id="Modaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Waktu Keluar</h4>
                    </div>
                    <form class="form-horizontal">
                        <div class="modal-body">

                            <input type="hidden" name="id" id="textid" value="">
                            <div class="alert alert-warning">
                                <p>Apakah Anda yakin mengatur waktu keluar sekarang?</p>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                            <button class="btn_edit btn btn-info" id="btn_edit">Atur</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <script type="text/javascript" src="<?php echo base_url() . 'assets/admin/bower_components/jquery/dist/jquery.js' ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/admin/bower_components/bootstrap/dist/js/bootstrap.js' ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/admin/bower_components/datatables.net/js/jquery.dataTables.js' ?>"></script>


        <!-- <script type="text/javascript">
            $(document).ready(function() {


                tabel = $('#mydata').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ordering": true, // Set true agar bisa di sorting
                    "order": [
                        [5, 'desc']
                    ], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
                    "ajax": {
                        "url": "<?php echo base_url('Tamu/view') ?>", // URL file untuk proses select datanya
                        "type": "POST"
                    },
                    "deferRender": true,
                    "aLengthMenu": [
                        [10, 50, 100],
                        [10, 50, 100]
                    ], // Combobox Limit
                    "columns": [{
                            "data": "nama"
                        }, {
                            "data": "nik_ktp"
                        },
                        {
                            "data": "ket"
                        },
                        {
                            "data": "wkt_msk"
                        },
                        {
                            "data": "wkt_klr"
                        },
                        {
                            class: "opsi",
                            data: "id",
                            render: function(data, type, full, meta) {
                                var str = '';
                                str += '<a onClick="deleteid(' + data + ')"><i class="fa fa-clock-o btn btn-success"></i></a>';
                                return str;
                            }
                        },
                    ],
                });
            });


            //Simpan nama
            $('#btn_simpan').on('click', function() {
                var id_kartu = $('#id_kartu').val();
                var nama = $('#nama').val();
                var asal = $('#asal').val();
                var tujuan = $('#tujuan').val();
                var keterangan = $('#keterangan').val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('Tamu/simpan_dt_tamu') ?>",
                    dataType: "JSON",
                    data: {
                        id_kartu: id_kartu,
                        nama: nama,
                        asal: asal,
                        tujuan: tujuan,
                        keterangan: keterangan
                    },
                    // success: function(data) {
                    //     if (data.error) {
                    //         $('.pesan').html(data.error).show();
                    //     }
                    //     $('[name="id_kartu"]').val("");
                    //     $('[name="nama"]').val("");
                    //     $('[name="asal"]').val("");
                    //     $('[name="tujuan"]').val("");
                    //     $('[name="keterangan"]').val("");
                    // }
                });
            });


            function deleteid(id) {
                $('#Modaledit').modal('show');
                $('[name="id"]').val(id);
            }

            $('#btn_edit').on('click', function() {
                var id = $('#textid').val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('Tamu/update_tamu') ?>",
                    dataType: "JSON",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $('#Modaledit').modal('hide');
                        //tampil_data_pegawai();
                    }
                });
            });
        </script> -->

        <?php $this->load->view('footer') ?>
    </div>
</body>

</html>