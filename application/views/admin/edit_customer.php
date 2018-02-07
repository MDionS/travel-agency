<html>
<head>
 <title>Edit Customer</title>
</head>
<body>
 <center>
  <h3>Edit Customer</h3>
 </center>
 <form action="<?php echo base_url('Admin/edit_customer_update'); ?>" method="post">
 <div class="box box-danger">
    <div class="box-header">
      <h3 class="box-title">Edit Customer</h3>
    </div>
    <div class="box-body">
      <?php echo form_open('Admin/edit_customer'); ?>
      <input type="hidden" name="id_customer" value="<?php echo $customer["id_customer"]; ?>">
      <!-- Date dd/mm/yyyy -->
      <div class="form-group">
        <label>Nama:</label>

        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-file"></i>
          </div>
          <input value="<?php echo $customer["name"]; ?>" type="text" name="name" class="form-control">
        </div>
        <!-- /.input group -->
      </div>
      <div class="form-group">
      <label>Jenis Kelamin :</label>

      <div class="input-group">
        <div class="input-group-addon">
          <i class="fa fa-file"></i>
        </div>
        <input value="<?php echo $customer["gender"]; ?>" type="text" name="gender" class="form-control">
      </div>
      <!-- /.input group -->
    </div>
      <!-- /.form group -->
      <!-- phone mask -->
      <div class="form-group">
        <label>Telephone:</label>

        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-phone"></i>
          </div>
          <input value="<?php echo $customer["phone"]; ?>" name="phone" type="text" class="form-control">
        </div>
        <!-- /.input group -->
      </div>

      <div class="form-group">
        <label>Alamat:</label>
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-map"></i>
          </div>
          <textarea name="address" class="form-control"><?php echo $customer["address"]; ?></textarea>
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