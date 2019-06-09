<!DOCTYPE html>
<html>
<head>
	<title>main_view</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<script src="<?php echo base_url();?>assets/js/jquery.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>">Codeigniter App</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>
        <li><a href="<?php echo base_url(); ?>projects">Projects</a></li>
        <li ><a href="<?php echo base_url(); ?>users/register">Register</a></li>
      </ul>
     <?php if($this->session->userdata('logged_in')): ?>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="<?php echo base_url() ?>users/logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
	      </ul>
  	 <?php endif; ?>
    </div>
  </div>
</nav>



<div class="container">

	<div class="col-xs-3">
		<?php 
			$this->load->view('users/login_view');
		?>
	</div>

	<div class="col-xs-9">
		<?php 
			$this->load->view($main_view);
		 ?>
	</div>
	
</div>


</body>
</html>