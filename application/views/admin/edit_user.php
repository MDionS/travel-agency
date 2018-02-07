<html>
<head>
 <title>Edit User</title>
</head>
<body>
 <center>
  <h3>Edit User</h3>
 </center>
 <form action="<?php echo base_url('admin/edit_user_update'); ?>" method="post">
 <div class="box box-danger">
    <div class="box-header">
      <h3 class="box-title">Edit User</h3>
    </div>
    <div class="box-body">
      <?php echo form_open('Admin/edit_user'); ?>
      <input type="hidden" name="id_user" value="<?php echo $user["id_user"]; ?>">
     
      <div class="form-group">
        <label>Username:</label>

        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-file"></i>
          </div>
          <input value="<?php echo $user["username"]; ?>" type="text" name="username" class="form-control">
        </div>
      </div>
      <div class="form-group">
      <label>Password :</label>

      <div class="input-group">
        <div class="input-group-addon">
          <i class="fa fa-file"></i>
        </div>
        <input value="<?php echo $user["password"]; ?>" type="text" name="password" class="form-control">
      </div>
    </div>
      <!-- /.form group -->
      <div class="form-group">
        <label>Fullname :</label>

        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-phone"></i>
          </div>
          <input value="<?php echo $user["fullname"]; ?>" name="fullname" type="text" class="form-control">
        </div>
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
    <?php  echo form_close();?>
    <!-- /.box-body -->
  </div>
</section>
</div>
</html>