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
          USER
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-users"></i> Home</a></li>
          <li class="active">User</li>
        </ol>
      </section>
      <!--TAMBAH-->

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div id="reload">
            <div class="col-xs-12">
              <div class="box">
                <div class="content">
                  <div class="box box-default box-solid">
                    <div class="box-header with-border">
                      <div class="box-title">
                        <a class="nav-link btn btn-info text-muted" href="#" data-toggle="modal" data-target="#ModalaAdd">
                          <i class="fa fa-save"> Tambah</i>
                        </a>
                      </div>
                      <div class="pull-right">
                        <?php echo $this->session->flashdata('succ'); ?>
                      </div>
                    </div>
                    </.box-header -->
                    <div class="box-body table-responsive">
                      <table id="mydata" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th width="270px">Aksi</th>
                          </tr>
                        </thead>
                        <tbody id="show_data">

                        </tbody>
                        <!--tbody id="data-load-Masuk">
                      </--tbody-->
                        <tfoot>
                          <tr>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Aksi</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                  <!-- /.box-body -->
                </div>
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
    <!-- MODAL ADD -->

    <div class="modal fade" id="ModalaAdd">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Data User</h4>
            <button class="close" data-dismiss="modal" type="button">&times;</button>
          </div>
          <div class="pesan" style="display: none;"></div>
          <div class="modal-body">
            <form id="form-tambah_tamukrt">

              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Nama</label>
                    <input type="text" id="nama" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Username</label>
                    <input type="text" id="username" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                    <input type="checkbox" class="form-checkbox"> Show password
                    <!-- <span class="glyphicon glyphicon-eye-open"></span> -->
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Role</label>
                    <select class="form-control" name="role" id="role">
                      <option selected>Admin</option>
                      <option>Petugas</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Email</label>
                    <input type="email" id="email" class="form-control" required>
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

    <!--END MODAL ADD-->
    <!-- MODAL EDIT -->
    <div class="modal fade" id="ModalaEdit">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Data</h4>
            <button type="button" class="close" data-dismiss='modal'>&times;</button>
          </div>
          <div class="pesanedit" style="display: none;"></div>
          <div class="modal-body">
            <form id="form-edit_user">
              <input type="hidden" name="id" id="id2">
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Nama</label>
                    <input type="text" name="nama" id="nama2" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Username</label>
                    <input type="text" name="username" id="username2" class="form-control" required>
                  </div>
                </div>
              </div>
              <!-- <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Password</label>
                    <input type="text" name="password" id="password2" class="form-control" required>
                    <input type="checkbox" class="form-checkbox"> Show password
                  </div>
                </div>
              </div> -->
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Role</label>
                    <select class="form-control" name="role" id="role2">
                      <option selected>Admin</option>
                      <option>Petugas</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Email</label>
                    <input type="email" name="email" id="email2" class="form-control" required>
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
    <!--END MODAL EDIT-->
    <!--MODAL HAPUS-->
    <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 style="display:block; text-align:center;">Hapus Data User</h3>
          </div>
          <form class="form-horizontal">
            <div class="modal-body">

              <input type="hidden" name="kode" id="textkode" value="">
              <div class="alert alert-danger">
                <h4 class="modal-title">Apakah Anda Yakin Ingin Menghapus Data Ini?</h4>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
              <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
            </div>
            </frm>
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


        tabel = $('#mydata').DataTable({
          "processing": true,
          "serverSide": true,
          "ordering": true, // Set true agar bisa di sorting
          "order": [
            [1, 'asc']
          ], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
          "ajax": {
            "url": "<?php echo base_url('User/view') ?>", // URL file untuk proses select datanya
            "type": "POST"
          },
          "deferRender": true,
          "aLengthMenu": [
            [10, 50, 100],
            [10, 50, 100]
          ], // Combobox Limit
          "columns": [{
              "data": "nama"
            },
            {
              "data": "username"
            },
            {
              "data": "role"
            },
            {
              "data": "email"
            },
            {
              class: "opsi",
              data: "u_id",
              render: function(data, type, full, meta) {
                var str = '';
                str += '<a onClick="edit(' + data + ')"><i class="fa fa-pencil btn btn-warning">  Edit</i></a>&nbsp';
                str += '<a onClick="deleteid(' + data + ')"><i class="fa fa-trash btn btn-danger">  Hapus</i></a>';
                return str;
              }
            }
          ],
        });
      });
      $(document).ready(function() {
        $('.form-checkbox').click(function() {
          if ($(this).is(':checked')) {
            $('#password').attr('type', 'text');
          } else {
            $('#password').attr('type', 'password');
          }
        });
      });

      // $("#password").on("keyup", function() {
      //   if ($(this).val())
      //     $(".glyphicon-eye-open").show();
      //   else
      //     $(".glyphicon-eye-open").hide();
      // });
      // $(".glyphicon-eye-open").mousedown(function() {
      //   $("#password").attr('type', 'text');
      // }).mouseup(function() {
      //   $("#password").attr('type', 'password');
      // }).mouseout(function() {
      //   $("#password").attr('type', 'password');
      // });

      //Simpan Barang
      $('#btn_simpan').on('click', function() {
        var nama = $('#nama').val();
        var username = $('#username').val();
        var password = $('#password').val();
        var role = $('#role').val();
        var email = $('#email').val();

        $.ajax({
          type: "POST",
          url: "<?php echo base_url('User/simpan_user') ?>",
          dataType: "JSON",
          data: {
            nama: nama,
            username: username,
            password: password,
            role: role,
            email: email
          },
          success: function(data) {
            if (data.error) {
              $('.pesan').html(data.error).show();
            }
            $('[name="nama"]').val("");
            $('[name="username"]').val("");
            $('[name="password"]').val("");
            $('[name="role"]').val("");
            $('[name="email"]').val("");
            // $('#ModalaAdd').modal('hide');
            // tampil_data_user();
          }
        });
      });

      function edit(id) {
        var url = '<?php echo base_url('User/get_user') ?>';
        var data = {
          id: id
        };
        $.ajax({
          url: url,
          method: 'GET',
          data: data
        }).done(function(data, textStatus, jqXHR) {
          var data = JSON.parse(data);
          $('[name="id"]').val(data.id);
          $('[name="nama"]').val(data.nama);
          $('[name="username"]').val(data.username);
          // $('[name="password"]').val(data.password);
          $('[name="role"]').val(data.role);
          $('[name="email"]').val(data.email);
          $('#ModalaEdit').modal('show');
        });
      }

      //Update Barang
      $('#btn_update').on('click', function() {
        var id = $('#id2').val();
        var nama = $('#nama2').val();
        var username = $('#username2').val();
        // var password = $('#password2').val();
        var role = $('#role2').val();
        var email = $('#email2').val();
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('User/update_user') ?>",
          dataType: "JSON",
          data: {
            id: id,
            nama: nama,
            username: username,
            // password: password,
            role: role,
            email: email
          },
          success: function(data) {
            if (data.error) {
              $('.pesanedit').html(data.error).show();
            }
            $('[name="id"]').val("");
            $('[name="nama"]').val("");
            $('[name="username"]').val("");
            // $('[name="password"]').val("");
            $('[name="role"]').val("");
            $('[name="email"]').val("");
            // $('#ModalaEdit').modal('hide');
            // tampil_data_user();
          }
        });
      });

      function deleteid(id) {
        $('#ModalHapus').modal('show');
        $('[name ="kode"]').val(id);
      }

      //Hapus Barang
      $('#btn_hapus').on('click', function() {
        var kode = $('#textkode').val();
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('User/hapus_user') ?>",
          dataType: "JSON",
          data: {
            kode: kode
          },
          success: function(data) {
            $('#ModalHapus').modal('hide');
            tampil_data_user();
          }
        });
      });
    </script>

    <?php $this->load->view('footer') ?>
  </div>
</body>

</html>