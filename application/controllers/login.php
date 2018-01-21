<?php
/**
* 
*/
class login extends CI_Controller
{
  
function cek_login(){
  $username = $this->input->post('username');
  $password = $this->input->post('password');
  $where = array(
   'username' => $username,
   'password' => md5($password)
   );
  $cek = $this->data_login->cek_login("admin",$where)->num_rows();
  if($cek > 0){

   $data_session = array(
    'nama' => $username,
    'status' => "login"
    );

   $this->session->set_userdata($data_session);

   redirect(base_url("admin"));

  }else{
   echo "<script type='text/javascript'>
               alert ('Maaf Username Dan Password Anda Salah !');
               document.write ('<center><h1> Harap Masukan Username Dan Password Dengan Benar !</h1></center><center></center>');
      </script>";
  }
 }
?>