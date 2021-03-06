<?php session_start(); if(isset($_SESSION['playbolier'])){ define("include",true); include("plug/do_sys.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="robots" content="noindex,nofollow,nosnippet,noodp,noarchive,noimageindex">
	<meta name="author" content="hyPerdarKness - github.com/hyPerdarKness">
	
    <title>Domain Takip Scripti</title>
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/pages/dashboard.css" rel="stylesheet">
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
</head>
<body>

<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="home.php">Domain Takip Scripti</a>
      <div class="nav-collapse">
        <ul class="nav pull-right">		
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> <?php echo $_SESSION['username']; ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="yonetim.php?id=<?php echo $_SESSION['playbolier']; ?>">Şifre Değiştir</a></li>
              <li><a href="logout.php">Çıkış Yap</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<?php include("plug/menu.php"); ?>

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
          <div class="widget">
            <div class="widget-header"><i class="icon-info-sign"></i>
              <h3>Not Ekle</h3>
            </div>
            <div class="widget-content">
<?php if(isset($_POST['ekle'])){

if($_POST['domain']==""||$_POST['text']==""){ echo '<div class="alert alert-danger">Madem bir şey eklemeye niyetin yok, niye bu sayfadasın! Boş bırakma...</div>'; }else{

$kayit = $db->prepare("insert into defter set domain=?,text=?"); $kayit->execute(array($_POST['domain'], $_POST['text']));

echo '<div class="alert alert-success">Not eklendi...</div>'; echo '<meta http-equiv="refresh" content="2">'; } } ?>
<form method="post">		
		<div class="control-group">											
			<label class="control-label">Domain</label>
			<div class="controls">
			<select class="span6" name="domain"><option></option>
<?php foreach($db->query("select * from domain") as $x){ echo '<option>'.$x['domain'].'</option>'; } ?>
			</select>
			<span class="help-block">Sadece kayıtlı domainler için not ekleyebilirsin</span>
			</div>				
		</div>	

		<div class="control-group">											
			<label class="control-label">Not/Detay</label>
			<div class="controls">
			<textarea class="span6" name="text" rows="5"></textarea>
			<span class="help-block">html kodları kullanabilirsiniz</span>
			</div>				
		</div>			

		<div class="form-actions">
			<button type="submit" name="ekle" class="btn btn-success"><i class="icon-plus"></i> Ekle</button> 
			<a class="btn btn-danger" href="home.php"><i class="icon-remove-circle"></i> İptal</a>
		</div>  
</form>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="footer" align="center">
  <div class="footer-inner">
    <div class="container">
      <div class="row">
        <div class="span12"> Tasarım: <a href="http://www.egrappler.com" target="_blank">Bootstrap Responsive Admin Template</a> <# --- #> PHP Kodlama: <a href="https://github.com/hyPerdarKness" target="_blank">hyPerdarKness</a></div>
      </div>
    </div>
  </div>
</div>

	<script src="js/jquery-1.7.2.min.js"></script> 
	<script src="js/bootstrap.js"></script>
	<script src="js/base.js"></script> 

</body>
</html>
<?php }else{ echo '<meta http-equiv="refresh" content="0;URL=../index.php">'; } ?>