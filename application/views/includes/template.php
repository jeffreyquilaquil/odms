<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Online Document Management System</title>

  <?php
    // Bootstrap core css
    echo '<link href="'.$this->config->base_url().'/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">';
    // Page level plugin CSS
    echo '<link href="'.$this->config->base_url().'/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">';
    // Custom styles for this template
    echo '<link href="'.$this->config->base_url().'/css/sb-admin.css" rel="stylesheet">';
    echo '<link href="'.$this->config->base_url().'/css/main.style.css" rel="stylesheet">';
  ?>

  <?php
    // Initial load jquery
    echo '<script src="'.$this->config->base_url().'vendor/jquery/jquery-3.3.1.min.js"></script>';
    // echo '<script src="'.$this->config->base_url().'vendor/validate/validate.js"></script>';
    // echo '<script src="'.$this->config->base_url().'vendor/validate/additional-methods.js">';
  ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js" charset="utf-8"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js" charset="utf-8"></script>



  <link href="<?= $this->config->base_url() ?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body class="fixed-nav sticky-footer" id="page-top">
  <input type="hidden" id="base_url" value="<?= $this->config->base_url() ?>">
  <!-- Navigation-->
  <?php
    if(!isset($content)) $content = 'index';
    if($this->user != false){
      $this->load->view('includes/header');
    }
  ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <?php
        if($this->user==false){

          if($content == 'forgotpassword')
            $this->load->view('forgotpassword');
          else{
            $this->load->view('login');
          }
        }else if(isset($access) && $access==false){
          echo '<div id="contentfull">Sorry you do not have access to this page.</div>';
        }else{
          $this->load->view($content);
          exit();
        }
      ?>
    </div>
  </div>

  <?php
    // echo '<script src="'.$this->config->base_url().'vendor/bootstrap/js/bootstrap.bundle.min.js"></script>';
    // // Core plugin Javascript
    // echo '<script src="'.$this->config->base_url().'vendor/jquery-easing/jquery.easing.min.js"></script>';
    // // Page level plugin Javascript
    // echo '<script src="'.$this->config->base_url().'vendor/datatables/jquery.dataTables.js"></script>';
    // echo '<script src="'.$this->config->base_url().'vendor/datatables/dataTables.bootstrap4.js"></script>';
    // // Custom scripts for all pages
    // echo '<script src="'.$this->config->base_url().'js/sb-admin.js"></script>';
    // // Custom Scripts for this page
    // echo '<script src="'.$this->config->base_url().'js/sb-admin-datatables.js"></script>';
    // echo '<script src="'.$this->config->base_url().'js/validate/jquery.validate.js ">'
  ?>
  <script src="<?= $this->config->base_url() ?>vendor/bootstrap/js/bootstrap.bundle.min.js" charset="utf-8"></script>
  <!-- Core Plugin Javascript -->
  <script src="<?= $this->config->base_url() ?>vendor/jquery-easing/jquery-easing.min.js" charset="utf-8"></script>
  <!-- Page Level plugin javascript -->
  <script src="<?= $this->config->base_url() ?>vendor/datatables/jquery.dataTables.js" charset="utf-8"></script>
  <script src="<?= $this->config->base_url() ?>vendor/datatables/dataTables.bootstrap4.js" charset="utf-8"></script>
  <!-- Custom Scripts for all pages -->
  <script src="<?= $this->config->base_url() ?>js/sb-admin.js" charset="utf-8"></script>
  <!-- Custom scripts for this page -->


</body>
</html>
