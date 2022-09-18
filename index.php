<?php
include "includ/config.php";
// form search
if (isset($_POST['search'])){
  $tex=$_POST['tex'];
  $_SESSION['search']=$tex;
  header("Location:search.php");
}
// form login
if (isset($_POST['login'])){
  $name=$_POST['name'];
  $pass=$_POST['password'];
	if (empty ($_POST['name'])){
		echo("<script>alert('null name!! ')</script>");
	}
  elseif(empty($_POST['password'])){
    echo("<script>alert('null password!! ')</script>");
  }
  else{
    $stmt  =  $db->prepare("SELECT * FROM `users` WHERE `username` = :username AND `password` = :pass");
    $stmt->bindvalue("username","$name");
    $stmt->bindvalue("pass","$pass");
    $stmt->execute();
    $login=$stmt->rowCount();
    if($login > 0){
      echo("<script>alert('welcome user ')</script>");
      $_SESSION['login']=$name;
    }


    // if($name==ADMINUSER && $pass==PASSWORD){
    //   header("Location:admin/index.php");
    // }
    // else{
    //   echo("<script>alert('you are not admin')</script>");
    // }
  }
}
// form register
if (isset($_POST['register'])){
  if (empty ($_POST['name'])){
    echo("<script>alert('null name!! ')</script>");
  }
  elseif (empty ($_POST['password'])){
    echo("<script>alert('null password!! ')</script>");
  }
  else{
    $username=$_POST['name'];
    $Password=$_POST['password'];
    $sql="INSERT INTO `users`(`username` , `password`) VALUES (? , ?)";
    $stmt=$db->prepare($sql);
    $stmt->bindvalue(1 , "$username");
    $stmt->bindvalue(2 , "$Password");
    $stmt->execute();
    echo("<script>alert('register ok!! ')</script>");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="asset/css/bootstrap.min.css">
	<title>blog</title>
</head>
<body>
<header style = "
        position: fixed;
        z-index: 1030;">
        <div class = "pos-f-t">
        <div class = "collapse" id = "navbarToggleExternalContent">
          <div class = "bg-dark p-4">
          <button type = "submit" class = "btn btn-outline-light" name = "login"><a href = "index.php" style = "text-decoration:none;">Home</a></button>
          <hr style = "background-color:white;" >
        <!-- form search -->
          <form class = "form-inline" method = "POST">
          <input class = "form-control mr-sm-2" type = "search" placeholder = "Search" aria-label = "Search" name = "tex">
          <button class = "btn btn-outline-success my-2 my-sm-0" type = "submit" name = "search">Search</button>
        </form>  
        <hr style = "background-color:white;" >
        <!-- category -->
      <nav aria-label = "...">
        <ul class = "pagination pagination-sm">
          <li class = "page-item col-sm-4"><a class = "page-link" href = "category.php?pid = 1">1</a></li>
          <li class = "page-item col-sm-4"><a class = "page-link" href = "category.php?pid = 2">2</a></li>
          <li class = "page-item col-sm-4"><a class = "page-link" href = "category.php?pid = 3">3</a></li>
        </ul>
      </nav>
      <hr style = "background-color:white;" >
      <!-- form login -->
      <p>
  <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><i>Login / Register</i></a>
      </p>
    <div class="row">
      <div class="col">
        <div class="collapse multi-collapse" id="multiCollapseExample1">
          <div class="card card-body">
          <form method = "POST">
          <h4>form register</h4>
            <hr style = "background-color:white;" >
            <div class = "form-group">
              <input type = "text" class = "form-control" id = "exampleInputEmail1" aria-describedby = "emailHelp" placeholder = "Enter name" name = "name">
            </div>
            <div class = "form-group">
              <input type = "password" class = "form-control" id = "exampleInputPassword1" placeholder = "Enter password" name = "password">
            </div>
            <button type = "submit" class = "btn btn-outline-primary" name = "register">register</button>
          </form>
          </div>
          <div class="card card-body">
          <form method = "POST">
            <h4>form login</h4>
            <hr style = "background-color:white;" >
            <div class = "form-group">
              <input type = "text" class = "form-control" id = "exampleInputEmail1" aria-describedby = "emailHelp" placeholder = "Enter name" name = "name">
            </div>
            <div class = "form-group">
              <input type = "password" class = "form-control" id = "exampleInputPassword1" placeholder = "Enter password" name = "password">
            </div>
            <button type = "submit" class = "btn btn-outline-primary" name = "login">login</button>
          </form>
          </div>
        </div>
      </div>
    </div>
      <hr style = "background-color:white;" >
          </div>
        </div>
        <nav class = "navbar navbar-dark bg-dark">
          <button class = "navbar-toggler" type = "button" data-toggle = "collapse" data-target = "#navbarToggleExternalContent" aria-controls = "navbarToggleExternalContent" aria-expanded = "false" aria-label = "Toggle navigation">
            <h1><span class = "navbar-toggler-icon"></span>
          <b><i>menu</i></b></h1>
          </button>
        </nav>
      </div>

</header>
<!-- slider -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="4.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- products -->
<?php 
    $stmt=$db->prepare("SELECT * FROM `posts`");
    $stmt->execute();
    foreach($stmt as $row){
    ?>
    <div class="row" style="
      float:left;
      margin:26px;
      border:2px solid;">
    <div class="card" style="width: 28rem;height: 30rem;">
      <img class="card-img-top" src="<?php echo $row['images'] ?>" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title"><?php echo $row['title'] ?></h5>
        <p class="card-text"><?php echo $row['body'] ?></p>
        <p class="card-text" style="float:right;"><?php echo $row['category'] ?></p>
        <a href="singlepost.php?pid=<?php echo $row['id']; ?>" class="btn btn-primary">more...</a>
      </div>
    </div>
    

    </div>
<?php }?>
<script src="asset/js/jquery.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>
<script src="asset/js/bootstrap.bundle.min.js"></script>
	</body>
</html>