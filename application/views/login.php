
<style class="cp-pen-styles">
body{
    background:#EEEEEE;
}
.content-wrapper{
    margin-left:0px;
    background:none;
}
.container-fluid{
    margin-top:150px;
    background:none;    
}
h1, input::-webkit-input-placeholder, button {
 font-family: 'roboto', sans-serif;
 -webkit-transition: all 0.3s ease-in-out;
 transition: all 0.3s ease-in-out;
}

h1 {
  height: 60px;
  width: 100%;
  font-size: 18px;
  background: #18aa8d;
  color: white;
  line-height: 150%;
  border-radius: 3px 3px 0 0;
  box-shadow: 0 2px 5px 1px rgba(0, 0, 0, 0.2);
}

form {
  box-sizing: border-box;
  width: 412px;
  margin: 150px auto 0;
  box-shadow: 2px 2px 5px 1px rgba(0, 0, 0, 0.2);
  padding-bottom: 20px;
  border-radius: 3px;
  background:white;
  margin-top:-33px;
}

form h1 {
  box-sizing: border-box;
  padding: 20px;
}

input {
  margin: 40px 25px;
  width: 360px;
  display: block;
  border: none;
  padding: 10px 0;
  border-bottom: solid 1px #1abc9c;
  -webkit-transition: all 0.3s cubic-bezier(0.64, 0.09, 0.08, 1);
  transition: all 0.3s cubic-bezier(0.64, 0.09, 0.08, 1);
  background: -webkit-linear-gradient(top, rgba(255, 255, 255, 0) 96%, #1abc9c 4%);
  background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 96%, #1abc9c 4%);
  background-position: -360px 0;
  background-size: 360px 100%;
  background-repeat: no-repeat;
  color: #0e6252;
}
input:focus, input:valid {
 box-shadow: none;
 outline: none;
 background-position: 0 0;
}
input:focus::-webkit-input-placeholder, input:valid::-webkit-input-placeholder {
 color: #1abc9c;
 font-size: 11px;
 height:25px;
 -webkit-transform: translateY(-20px);
 transform: translateY(-20px);
 visibility: visible !important;
}

button {
  border: none;
  background: #1abc9c;
  cursor: pointer;
  border-radius: 3px;
  padding: 6px;
  width: 360px;
  color: white;
  margin-left: 25px;
  margin-bottom: 10px;
  box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.2);
}

button:hover {
  -webkit-transform: translateY(-3px);
  -ms-transform: translateY(-3px);
  transform: translateY(-3px);
  box-shadow: 0 6px 6px 0 rgba(0, 0, 0, 0.2);
  
}
a{
    color: #1abc9c;
    margin-top:20px;
    margin-left:145px;
}

a:hover{
    color: #1abc9c;
    text-decoration:none;
}

.error{
  margin-:25px;
}


</style>

<form method="POST" action="<?= $this->config->base_url();?>staff/login">
  <h1>Online Document Management System</h1>
  <?php
    $err_txt = ''; 
    if( isset($error)){
      echo '<span class="error text-danger">'.$error.'</span>';
      $err_txt = 'border-danger';
  }
  ?>
  <input class="<?= $err_txt; ?>" placeholder="Username" type="text" name="uname" required>
  <input class="<?= $err_txt; ?>" placeholder="Password" type="password" name="pword" required>
  <button>Submit</button>
  <br>
  <a href="<?= $this->config->base_url(); ?>staff/forgotpassword">Forgot Password</a>
</form>

