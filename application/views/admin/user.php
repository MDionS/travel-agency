

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Dashboard
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>
<section class="content">
 <?php 

 $user = $user[0]->id_user;
 $newus = substr($user,1,4);

 $tambahuser=$newus;
 if ($tambahuser<10) {
  $id="A000".$tambahuser;
}
else if($tambahuser>100){
  $id="A0".$tambahuser;
}
else{
  $id="A00".$tambahuser;
}

?>
<div class="box box-danger">
  <div class="box-header">
    <h3 class="box-title">Tambah User</h3>
  </div>
  <div class="box-body">
    <?php echo form_open('Admin/tambahuser'); ?>
    <input type="hidden" name="id_user" value="<?php echo($id); ?>">

    <div class="form-group">
      <label>Username :</label>

      <div class="input-group">
        <div class="input-group-addon">
          <i class="fa fa-file"></i>
        </div>
        <input type="text" name="username" class="form-control">
      </div>
      <!-- /.input group -->
    </div>
    <div class="form-group">
    <label>Password :</label>

    <div class="input-group">
      <div class="input-group-addon">
        <i class="fa fa-file"></i>
      </div>
      <input name="password" type="text" class="form-control">
    </div>
    <!-- /.form group -->
    <!-- fullname -->
    <div class="form-group">
      <label>Fullname :</label>

      <div class="input-group">
        <div class="input-group-addon">
          <i class="fa fa-file"></i>
        </div>
        <input name="fullname" type="text" class="form-control">
      </div>
      <!-- /.input group -->
    </div>

    <div class="form-group">
    <label>Level :</label>
    <div class="input-group">
      <div class="input-group-addon">
        <i class="fa fa-user"></i>
      </div>
      <select name="level" class="form-control">
        <option value="customer">customer</option>
        <option value="admin">admin</option>
      </select>
    </div>
  </div>
    <input type="submit" name="submit" class="btn btn-success">
    <!-- /.form group -->
  </div>
  <?php echo form_close(); ?>
  <!-- /.box-body -->
</div>
</section>
</div>

<!-- /.content-wrapper -->
<footer class="main-footer">
<div class="pull-right hidden-xs">
  <b>Version</b> 2.4.0
</div>
<strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
reserved.
</footer>
</div>
<!-- ./wrapper -->
