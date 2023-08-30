<!DOCTYPE html>
<html>
<?php $this->load->view('head') ?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php $this->load->view('header') ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php $this->load->view('left') ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Data Barang
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-cube"></i> Home</a></li>
          <li class="active">Data Barang</li>
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
                  <a class="nav-link btn btn-primary" href="#" data-toggle="modal" data-target="#modal-tambah_barang"><i class="fa fa-plus-circle"></i> Tambah</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="mydata" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nama Barang</th>
                        <th>Merek</th>
                        <th>Jumlah</th>
                        <th>Harga Satuan</th>
                        <th>Total Harga</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody id="show_data">

                    </tbody>
                    <!--tbody id="data-load-barang">
                </--tbody-->
                    <tfoot>
                      <tr>
                        <th>Nama Barang</th>
                        <th>Merek</th>
                        <th>Jumlah</th>
                        <th>Harga Satuan</th>
                        <th>Total Harga</th>
                        <th>Keterangan</th>
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
    <div class="modal fade" id="modal-tambah_barang">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah data</h4>
            <button class="close" data-dismiss="modal" type="button">&times;</button>
          </div>
          <!--?php form_open('Data/simpan_barang', ['class' => 'formsimpan'])?-->
          <div class="pesan" style="display: none;"></div>
          <div class="modal-body">
            <form id="form-tambah_barang">

              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Nama Barang</label>
                    <input type="text" id="barang" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Merek</label>
                    <input type="text" id="merek" class="form-control" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Jumlah</label>
                    <input type="number" id="jumlah" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Harga Satuan</label>
                    <input type="number" id="hargasatuan" class="form-control" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Total Harga</label>
                    <input type="number" id="totalharga" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Keterangan</label>
                    <input type="text" id="keterangan" class="form-control" required>
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
        <!--?= form_close() ?-->
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
            <form id="form-edit_barang">
              <input type="hidden" name="id" id="id2">
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Nama Barang</label>
                    <input type="text" name="barang" id="barang2" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Merek</label>
                    <input type="text" name="merek" id="merek2" class="form-control" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Jumlah</label>
                    <input type="number" name="jumlah" id="jumlah2" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Harga Satuan</label>
                    <input type="number" name="hargasatuan" id="hargasatuan2" class="form-control" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Total Harga</label>
                    <input type="number" name="totalharga" id="totalharga2" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Keterangan</label>
                    <input type="text" name="keterangan" id="keterangan2" class="form-control" required>
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
    <!--MODAL HAPUS-->
    <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
            <h4 class="modal-title" id="myModalLabel">Hapus Barang</h4>
          </div>
          <form class="form-horizontal">
            <div class="modal-body">

              <input type="hidden" name="kode" id="textkode" value="">
              <div class="alert alert-warning">
                <p>Apakah anda yakin mau menghapus barang ini?</p>
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

    <!--script type="text/javascript" src="<?php echo base_url() . 'assets/alertifyjs/alertify.min.js' ?>"></!--script-->


    <script type="text/javascript">
      $(document).ready(function() {

        tabel = $('#mydata').DataTable({
          "processing": true,
          "serverSide": true,
          "ordering": true, // Set true agar bisa di sorting
          "order": [
            [0, 'asc']
          ], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
          "ajax": {
            "url": "<?php echo base_url('Data/view') ?>", // URL file untuk proses select datanya
            "type": "POST",
            //"draw": 1
          },
          "deferRender": true,
          "aLengthMenu": [
            [5, 10, 50],
            [5, 10, 50]
          ], // Combobox Limit
          "columns": [{
              "data": "barang"
            },
            {
              "data": "merek"
            },
            {
              "data": "jumlah"
            },
            {
              "data": "hargasatuan"
            },
            {
              "data": "totalharga"
            },
            {
              "data": "keterangan"
            },
            /*{ "render": function ( data, type, row ) { // Tampilkan kolom aksi
                    var html  = "<a onclick="edit(' + id + ')"><i class="fa fa-pencil btn btn-info"></i></a>";
                    html += "<a href=''>DELETE</a>";

                    return html;
                }
            },
            */
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
        var url = '<?php echo base_url('Data/get_barang') ?>';
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
          $('[name="barang"]').val(data.barang);
          $('[name="merek"]').val(data.merek);
          $('[name="jumlah"]').val(data.jumlah);
          $('[name="hargasatuan"]').val(data.hargasatuan);
          $('[name="totalharga"]').val(data.totalharga);
          $('[name="keterangan"]').val(data.keterangan);
          $('#ModalaEdit').modal('show');
        });
      }

      function deleteid(id) {
        $('#ModalHapus').modal('show');
        $('[name="kode"]').val(id);
      }

      //fungsi tampil barang
      /*function tampil_data_barang(){
            $.ajax({
                type  : 'GET',
                url   : '<!?php echo base_url()?>Data/data_barang',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].barang+'</td>'+
                                '<td>'+data[i].merek+'</td>'+
                                '<td>'+data[i].jumlah+'</td>'+
                                '<td>'+data[i].hargasatuan+'</td>'+
                                '<td>'+data[i].totalharga+'</td>'+
                                '<td>'+data[i].keterangan+'</td>'+
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
        
//Putri Dewi Pradasari
//18753048
        //GET UPDATE
		$('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<!?php echo base_url('Data/get_barang')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                	$.each(data,function(id, barang, merek, jumlah, hargasatuan, totalharga, keterangan){
                    	$('#ModalaEdit').modal('show');
            			$('[name="id"]').val(data.id);
            			$('[name="barang"]').val(data.barang);
            			$('[name="merek"]').val(data.merek);
            			$('[name="jumlah"]').val(data.jumlah);
            			$('[name="hargasatuan"]').val(data.hargasatuan);
            			$('[name="totalharga"]').val(data.totalharga);
            			$('[name="keterangan"]').val(data.keterangan);
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

      //Simpan Barang
      $('#btn_simpan').on('click', function() {
        var id = $('#id').val();
        var barang = $('#barang').val();
        var merek = $('#merek').val();
        var jumlah = $('#jumlah').val();
        var hargasatuan = $('#hargasatuan').val();
        var totalharga = $('#totalharga').val();
        var keterangan = $('#keterangan').val();
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('Data/simpan_barang') ?>",
          dataType: "JSON",
          data: {
            id: id,
            barang: barang,
            merek: merek,
            jumlah: jumlah,
            hargasatuan: hargasatuan,
            totalharga: totalharga,
            keterangan: keterangan
          },
          success: function(data) {
            if (data.error) {
              $('.pesan').html(data.error).show();
            }
            $('[name="id"]').val("");
            $('[name="barang"]').val("");
            $('[name="merek"]').val("");
            $('[name="jumlah"]').val("");
            $('[name="hargasatuan"]').val("");
            $('[name="totalharga"]').val("");
            $('[name="keterangan"]').val("");
            //$('#modal-tambah_barang').modal('hide');
            //tampil_data_barang();
            //setInterval('location.reload()', 1000);
            //location.reload(true);
          }
        });
      });

      //Update Barang
      $('#btn_update').on('click', function() {
        var id = $('#id2').val();
        var barang = $('#barang2').val();
        var merek = $('#merek2').val();
        var jumlah = $('#jumlah2').val();
        var hargasatuan = $('#hargasatuan2').val();
        var totalharga = $('#totalharga2').val();
        var keterangan = $('#keterangan2').val();
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('Data/update_barang') ?>",
          dataType: "JSON",
          data: {
            id: id,
            barang: barang,
            merek: merek,
            jumlah: jumlah,
            hargasatuan: hargasatuan,
            totalharga: totalharga,
            keterangan: keterangan
          },
          success: function(data) {
            if (data.error) {
              $('.pesan').html(data.error).show();
            }
            $('[name="id"]').val("");
            $('[name="barang"]').val("");
            $('[name="merek"]').val("");
            $('[name="jumlah"]').val("");
            $('[name="hargasatuan"]').val("");
            $('[name="totalharga"]').val("");
            $('[name="keterangan"]').val("");
            $('#ModalaEdit').modal('hide');
            // tampil_data_barang();
          }
        });
      });

      //Hapus Barang
      $('#btn_hapus').on('click', function() {
        var kode = $('#textkode').val();
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('Data/hapus_barang') ?>",
          dataType: "JSON",
          data: {
            kode: kode
          },
          success: function(data) {
            $('#ModalHapus').modal('hide');
            //tampil_data_barang();
          }
        });
      });
    </script>
    <?php $this->load->view('footer') ?>
</body>

</html>