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
                    Data Aman
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-users"></i> Home</a></li>
                    <li class="active">Aman</li>
                </ol>
            </section>
            <!--TAMBAH-->

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div id="reload">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title"></h3>
                                    <a class="nav-link btn btn-primary" href="#" data-toggle="modal" data-target="#modal-tambah_aman">
                                        <i class="fa fa-user-plus"></i> Tambah
                                    </a>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="mydata" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>nik aman</th>
                                                <th>absen</th>
                                                <th>nama</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="show_data">

                                        </tbody>
                                        <!--tbody id="data-load-aman">
                </--tbody-->
                                        <tfoot>
                                            <tr>
                                                <th>nik aman</th>
                                                <th>absen</th>
                                                <th>nama</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.box-body -->
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
        <div class="modal fade" id="modal-tambah_aman">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah data</h4>
                        <button class="close" data-dismiss="modal" type="button">&times;</button>
                    </div>
                    <div class="pesan" style="display: none;"></div>
                    <div class="modal-body">
                        <form id="form-tambah_aman">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">nik aman</label>
                                        <input type="text" id="nik" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">absen</label>
                                        <input type="text" id="absen" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">nama</label>
                                        <input type="text" id="nama" class="form-control" required>
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
            </div>
        </div>

        <div class="modal fade" id="ModalaEdit">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Data</h4>
                        <button type="button" class="close" data-dismiss='modal'>&times;</button>
                    </div>
                    <div class="pesan" style="display: none;"></div>
                    <div class="modal-body">
                        <form id="form-edit_aman">
                            <input type="hidden" name="id" id="id2">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">nik aman</label>
                                        <input type="text" name="nik" id="nik2" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">absen</label>
                                        <input type="text" name="absen" id="absen2" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">nama</label>
                                        <input type="text" name="nama" id="nama2" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="submit" name="submit" id="btn_update" class="btn btn-block btn-primary" value="Edit">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--MODAL DETAIL-->
        <div class="modal fade" id="Modaladetail">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Detail Data</h4>
                        <button type="button" class="close" data-dismiss='modal'>&times;</button>
                    </div>
                    <div class="pesan" style="display: none;"></div>
                    <div class="modal-body">
                        <form id="form-detail_aman">
                            <input type="hidden" name="id" id="id2">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">nik</label>
                                        <input type="text" name="nik" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">absen</label>
                                        <input type="text" name="absen" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">nama</label>
                                        <input type="text" name="nama" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">barcode</label>
                                        <?php
                                        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                                        echo $generator->getBarcode('081231723897', $generator::TYPE_CODE_128);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--MODAL HAPUS-->
        <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus aman</h4>
                    </div>
                    <form class="form-horizontal">
                        <div class="modal-body">

                            <input type="hidden" name="kode" id="textkode" value="">
                            <div class="alert alert-warning">
                                <p>Apakah Anda yakin mau menghapus aman ini?</p>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                            <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--END MODAL HAPUS-->
        <!-- /.content-wrapper -->


        <script type="text/javascript" src="<?php echo base_url() . 'assets/admin/bower_components/jquery/dist/jquery.js' ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/admin/bower_components/bootstrap/dist/js/bootstrap.js' ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/admin/bower_components/datatables.net/js/jquery.dataTables.js' ?>"></script>


        <script type="text/javascript">
            $(document).ready(function() {
                //tampil_data_aman();   //pemanggilan fungsi tampil aman.

                // $('#mydata').DataTable();

                //fungsi tampil aman
                /*function tampil_data_aman(){
            $.ajax({
                type  : 'GET',
                url   : '<--?php echo base_url()?>Aman/data_aman',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].nik+'</td>'+
                                '<td>'+data[i].absen+'</td>'+
                                '<td>'+data[i].nama+'</td>'+
                                '<td style="text-align:left;">'+
                                    '<a href="javascript:;" class="btn btn-info  item_edit" data="'+data[i].id+'">Edit</a>'+' '+
                                    '<a href="javascript:;" class="btn btn-danger  item_hapus" data="'+data[i].id+'">Hapus</a>'+
                                    
                                '</td>'+
                                '</tr>';
                    }
                    $('#show_data').html(html);
                }
 
            });
            
        }
        */



                tabel = $('#mydata').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ordering": true, // Set true agar bisa di sorting
                    "order": [
                        [0, 'asc']
                    ], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
                    "ajax": {
                        "url": "<?php echo base_url('Aman/view') ?>", // URL file untuk proses select datanya
                        "type": "POST"
                    },
                    "deferRender": true,
                    "aLengthMenu": [
                        [5, 10, 50],
                        [5, 10, 50]
                    ], // Combobox Limit
                    "columns": [{
                            "data": "nik"
                        },
                        {
                            "data": "absen"
                        },
                        {
                            "data": "nama"
                        },
                        {
                            class: "opsi",
                            data: "id",
                            render: function(data, type, full, meta) {
                                var str = '';
                                str += '<a onclick="edit(' + data + ')"><i class="fa fa-pencil btn btn-info"></i></a>';
                                str += '<a onClick="deleteid(' + data + ')"><i class="fa fa-trash btn btn-danger"></i></a>';
                                str += '<a onClick="detailid(' + data + ')"><i class="fa fa-folder-open btn btn-warning"></i></a>';
                                return str;
                            }
                        },
                    ],
                });
            });

            function edit(id) {
                var url = '<?php echo base_url('Aman/get_aman') ?>';
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
                    $('[name="absen"]').val(data.absen);
                    $('[name="nama"]').val(data.nama);

                    $('#ModalaEdit').modal('show');
                });
            }

            function detailid(id) {
                var url = '<?php echo base_url('Aman/get_aman') ?>';
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
                    $('[name="absen"]').val(data.absen);
                    $('[name="nama"]').val(data.nama);

                    $('#Modaladetail').modal('show');
                });
            }

            function deleteid(id) {
                $('#ModalHapus').modal('show');
                $('[name="kode"]').val(id);
            }

            //GET UPDATE
            /*$('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<!?php echo base_url('Aman/get_aman')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                	$.each(data,function(id, nik, absen, nama){
                    	$('#ModalaEdit').modal('show');
            			$('[name="id"]').val(data.id);
            			$('[name="nik"]').val(data.nik);
            			$('[name="absen"]').val(data.absen);
            			$('[name="nama"]').val(data.nama);
            		});
                }
            });
        });
        
 

    //GET HAPUS
		$('#show_data').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
            $('#ModalHapus').modal('show');
            $('[name="kode"]').val(id);
        });
        */

            //Simpan aman
            $('#btn_simpan').on('click', function() {
                var id = $('#id').val();
                var nik = $('#nik').val();
                var absen = $('#absen').val();
                var nama = $('#nama').val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('Aman/simpan_aman') ?>",
                    dataType: "JSON",
                    data: {
                        id: id,
                        nik: nik,
                        absen: absen,
                        nama: nama
                    },
                    success: function(data) {
                        if (data.error) {
                            $('.pesan').html(data.error).show();
                        }
                        /*$('[name="id"]').val("");
                        $('[name="nik"]').val("");
                        $('[name="absen"]').val("");
                        $('[name="nama"]').val("");
                        $('#modal-tambah_aman').modal('hide');
                        tampil_data_aman();
                        //setInterval('location.reload()', 1000);
                        location.reload(true);*/
                    }
                });
            });

            //Update aman
            $('#btn_update').on('click', function() {
                var id = $('#id2').val();
                var nik = $('#nik2').val();
                var absen = $('#absen2').val();
                var nama = $('#nama2').val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('Aman/update_aman') ?>",
                    dataType: "JSON",
                    data: {
                        id: id,
                        nik: nik,
                        absen: absen,
                        nama: nama
                    },
                    success: function(data) {
                        if (data.error) {
                            $('.pesan').html(data.error).show();
                        }
                        /*$('[name="id"]').val("");
                        $('[name="nik"]').val("");
                        $('[name="absen"]').val("");
                        $('[name="nama"]').val("");
                        $('#ModalaEdit').modal('hide');
                        tampil_data_aman();*/
                    }
                });
            });

            //Hapus aman
            $('#btn_hapus').on('click', function() {
                var kode = $('#textkode').val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('Aman/hapus_aman') ?>",
                    dataType: "JSON",
                    data: {
                        kode: kode
                    },
                    success: function(data) {
                        $('#ModalHapus').modal('hide');
                        //tampil_data_aman();
                    }
                });
            });
        </script>

        <?php $this->load->view('footer') ?>
</body>

</html>