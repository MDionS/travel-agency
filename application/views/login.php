<<!DOCTYPE html>
<html>
<head>
	<title><?php $status = $this->session->userdata('status'); echo $status; ?> </title>
</head>
<body>
<h1 align="center">Login</h1>
 <form action="<?php echo base_url('login/cek_login'); ?>" method="post">
  <table align="center">
   <tr>
    <td>Username</td>
    <td><input type="text" name="username"></td>
   </tr>
   <tr>
    <td>Password</td>
    <td><input type="password" name="password"></td>
   </tr>
   <tr>
    <td></td>
    <td><input type="submit" value="Login"></td>
   </tr>
  </table>
 </form>

</body>
</html>