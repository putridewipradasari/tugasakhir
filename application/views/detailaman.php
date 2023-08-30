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