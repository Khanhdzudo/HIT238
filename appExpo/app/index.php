<? session_start();
include_once("includes.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Khanh Dzu Do - S328390">
    <meta name="generator" content="Khanh Dzu Do - S328390">
    <title>NT Photography Social Network</title>
 
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/jumbotron/">

    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">

  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top " id="menu">
  <a class="navbar-brand" href="index.php">NT Photography</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?">Darwin</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?">Katherine</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?">Alice Spring</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?">Other</a>
      </li>
      
      
      
    </ul>
    <div class="form-inline my-2 my-lg-0">
	<? if (!$_SESSION['username']) { ?>
		
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="margin-right: 10px;"  onclick="location.href='login.php'">Login</button> 
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" onclick="location.href='register.php'">Register User</button>
	<? } else { ?>
		 <button class="btn btn-outline-success my-2 my-sm-0" type="submit" onclick="location.href='user.php'">Hello <?=$_SESSION['username'];?> !</button> &nbsp;	
	  <button class="btn btn-outline-success my-2 my-sm-0" type="submit" onclick="location.href='logout.php'">Logout</button>	
<?		
}?>
		
    </div>
  </div>
</nav>

<main role="main">








  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron banner" >
    <div class="container">
      <h1 class="display-3">Welcome to NT Photography!</h1>
      <p>This is a social network for NT People to share their traveling experiences.</p>
<? if (!$_SESSION['username']) { ?>		
      <p><a class="btn btn-primary btn-lg" href="#" role="button"  onclick="location.href='register.php'">Register User Now &raquo;</a></p>
	<? } else { ?>
	  <p><a class="btn btn-primary btn-lg" href="#" role="button"  onclick="location.href='user.php'">Post Your Photos Now &raquo;</a></p>	
		
	<? }?>
    </div>
  </div>








<!-- Gallery -->
<div class="container">

	
	
	

	
	

	
	
	
<div class="row">
	
	<? 
		$query = "SELECT * FROM photos ORDER BY id DESC";
		connectDB();
		$result = mysqli_query($_SESSION['db'],$query) or die("<p><b>A fatal MySQL error occured</b>.\n<br />Query: " . $query . "<br />\nError: (" . mysqli_errno($_SESSION['db']) . ") " . mysqli_error($_SESSION['db']) . "</p>");
		$result2=$result;
		$result3=$result;
		closeDB();
		if(mysqli_num_rows($result)<1){
			//no results found
			echo "<p class=\"\">No results found.</p>";
		}else{
			$a=0;
			while($row = mysqli_fetch_assoc($result)){ 
	?>
	
	 <div class="col-lg-4 col-md-12 mb-4 mb-lg-0" >
    <a href="#lightbox" data-slide-to="<?=$a?>">
    <img src="./uploads/<?=$row['photo']?>" class="w-100 shadow-1-strong rounded mb-4 img-thumbnail" alt=""  data-toggle="modal" data-target="#modal" />
</a>
<h2><?=$row['title']?></h2>
        <p><?=$row['des']?> </p>
        <p><button type="button" class="btn btn-primary"  onclick="location.href='like.php?id=<?=$row['id']?>'">Like</button> <?=$row['likes']?>

  </div>
	
							  
<?		$a++;											  
			}
		
		}
	 ?>
	
	
	
	






</div>
<!-- Gallery -->

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="Lightbox Gallery by Bootstrap 4" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Photo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
			<div class="modal-body">
      
				<div id="lightbox" class="carousel slide" data-ride="carousel" data-interval="5000" data-keyboard="true">
					<ol class="carousel-indicators">
						
							<? 
						$query = "SELECT * FROM photos ORDER BY id DESC";
		connectDB();
		$result = mysqli_query($_SESSION['db'],$query) or die("<p><b>A fatal MySQL error occured</b>.\n<br />Query: " . $query . "<br />\nError: (" . mysqli_errno($_SESSION['db']) . ") " . mysqli_error($_SESSION['db']) . "</p>");
		closeDB();
						$a=0;
						while($row = mysqli_fetch_assoc($result)){ ?>
						<li data-target="#lightbox" data-slide-to="<?=$a?>"></li>
						<? $a++;}?>
					</ol>
				
					
					<div class="carousel-inner">
            
						
						<?
										$query = "SELECT * FROM photos ORDER BY id DESC";
		connectDB();
		$result = mysqli_query($_SESSION['db'],$query) or die("<p><b>A fatal MySQL error occured</b>.\n<br />Query: " . $query . "<br />\nError: (" . mysqli_errno($_SESSION['db']) . ") " . mysqli_error($_SESSION['db']) . "</p>");
		closeDB();
						$bb=0;
						while($row = mysqli_fetch_assoc($result)){ ?>
						<div class="carousel-item <? if ($bb==0) echo "active";?>"><img src="./uploads/<?=$row['photo']?>" class="w-100"
							 alt=""></div>
						
				
						<?
																 $bb++;
																 }?>
						
			
					</div>
					<a class="carousel-control-prev" href="#lightbox" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a>
					<a class="carousel-control-next" href="#lightbox" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a>
				</div>
			</div>
		</div>
	</div>
</div>


	
	

</main>

<footer class="container">
  <p>&copy; Khanh Dzu Do - S328390 - 2021</p>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="./assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
      
</html>
