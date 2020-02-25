<?php 

session_start();
$_SESSION['submit'];
$session = $_SESSION['submit'];
$_SESSION['comments'];
$sessionComments = $_SESSION['comments']; 



 include 'databaseConnection.php';
 

 include 'post.php';
  include 'comment.inc.php';
 

 //Jinitialise la session

// $titre = $_POST['titre'];
$description = $_POST['description'];

$titre = mysqli_real_escape_string($conn, $_POST['titre']);
$description = mysqli_real_escape_string($conn, $_POST['description']);


?>



<?php 





$sql = "SELECT * FROM test";
$result = mysqli_query($conn, $sql);
$datas = array();
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $datas[] = $row;
    }
    $datas = array_reverse($datas);
    
}




?>
<?php

echo'
<!doctype html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <!-- Required meta tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
        <!--css external file-->
        <link rel="stylesheet" href="static/css/public_styling.css">
        
        <!--google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Odibee+Sans&display=swap" rel="stylesheet"> 

        <!--css external file-->
        <link rel="stylesheet" href="style.css" type="text/css">
        
        <!--font awesome-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">

        <title>Trials Editor Blog</title>
    </head>
    ';
  ?>
<body>
    <div>
<!--navbar-->
      <nav class="navbar navbar-expand-lg " style="border: 2px solid #03fc84; background-color: black !important; color: white; border-radius: 0px;">
          <img src="images/trialsLogo.png" style="height: 50px;" class="">
  <a class="navbar-brand" style="font-weight: 700; color: #ff6016;" href="#">TrialsEditorBlog.com</a>
  <button class="navbar-toggler" style="border: 2px solid #03fc84;" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
   <i class="fas fa-bars" style="color: white;"></i>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Publish</a>
      </li>

    </ul>
  </div>
</nav>
<!--navbar-->





      
  
      <h1 style="color : black; font-family: 'Odibee Sans', cursive; font-weight: 400; font-size: 3.5rem; background-color: #03fc84;" class="m-0">Create A Post</h1>
      
          
   <?php echo    
     "
     <div class='container-fluid m-0 p-0'  id='background'>
              <div class='row m-0 p-0 col-12 mx-auto'>
     <div  class='my-4 col-md-6 p-0 mx-auto' style='height: auto; box-shadow: 4px 4px 10px grey; background-color: rgba(0, 0, 0, 0.65); '  >".

"<form action='".setPosts($session, $conn, $titre, $description, $target_file_path)."'  method='post' enctype='multipart/form-data'>" .
  "<div class='form-group' id='formTitle'>".
    "<p style='background-color : #03fc84; '>TITLE</p>".
    "<input name='titre' type=text' class='input form-control w-75' id='exampleFormControlInput1' >".
  "</div>".
 
  "<div class='form-group'>".
    "<p id='formDetails' style='background-color : #03fc84;'>DETAILS</p>".
    "<textarea style='' name='description' type='text' class='input form-control w-75 mx-auto' id='exampleFormControlTextarea1' rows='6'></textarea>".
  "</div>".
  
  
  "
    <p style='background-color : #03fc84;' id='formUploadTitle'>IMAGE TO UPLOAD</p>
    
    <!--<input type='submit' value='Upload Image' name='submit'>-->
    " .
  
  
  "
  <div class=row>
  <div class='upload-btn-wrapper mx-auto'>
  <button class='btnUpload'>Upload Image File</button>
  <input type='file' name='fileToUpload' id='fileToUpload' >
</div>
</div>
".

  "
  <div class='row'>

  <button type='submit' name='submit'  id='btnSend' class='w-25 mx-auto btn btn-primary'>Publish
  <i class='fas fa-paper-plane' style='font-size: 2.5rem; color : #ff6016; display: inline-block;'></i>
  </button>
  </div>
  ".
"</form>".
      "</div>".
      
      "<div class='postsRecent container-fluid'>".
          
      "</div>
      </div>
    </div>
      ";
      
    ?>
    
    

    <?php foreach($datas as $value): ?>
    
    <?php 
    
    
    $id = $value['id'];
    echo $id;
    
    $imgSrc = $value['image'];
   
    echo
    "<div class='container-fluid' style='text-align: center; padding: 5% '>
    <div class='row'>
    <h1 id='titlePost' class='col-md-8 mx-auto' style='word-break: break-word;'>" . $value['title'] . "</h1>".
    "<hr class='w-50' style='height: 6px; background-color: #03fc84 !important;  margin-left: auto; margin-right: auto;'>".
    "
    <div class='row col-12'>
    <img src='$imgSrc' class='img-fluid col-md-4 mx-auto'>
    </div>
    
    <div class='container-fluid'>
     <div class='row col-12'>
        <p class='col-md-8' style='word-break: break-word;' >" . $value['description'] . "</p>
    </div>
    </div>
    ".
        "<p style='color: black;  background-color: #03fc84;' class='w-50 mx-auto'>" . $value['date'] . "</p>".
        
        
        "<div class='container-fluid'>
        <div class='row col-md-12'>
        <form action='".setComments($conn, $id, $sessionComments)."' method='post' enctype='multipart/form-data' class='col-md-8 mx-auto'>
        
        <input name='comments' type='text' class='form-control' id='exampleFormControlInput1' >
        
 Select image to upload:
    <input type='file' name='fileToUpload' id='fileToUpload'>
        
       
        
        
  

  <button type='submit' name='commentSubmit$id'  id='btnSend' class='w-25 mx-auto btn btn-primary'>Comment
  <i class='fas fa-paper-plane' style='font-size: 2.5rem; color : #ff6016; display: inline-block;'></i>
  </button>
 
        
        </form>
        ".

    "
    </div>
    </div>
    </div>
    </div>"; 
    
    // afficher les commentaires
 getComments($conn, $commentsArray, $id);

 
    ?>
    
    
    
    
    <?php endforeach ?>
    
    

    <?php 
        
        
        
       
        


    ?>
    
    </div>

    
    
    <!-- Footer -->
<footer class="page-footer font-small blue pt-4">

  <!-- Footer Links -->
  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-6 mt-md-0 mt-3">

        <!-- Content -->
        <h5 class="text-uppercase">Trials Editor Blog</h5>
        <p></p>
        <p>Tommy Audet &copy; <?php echo date('Y'); ?></p>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none pb-3">
<?php echo'
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
			  src="https://code.jquery.com/jquery-3.4.1.js"
			  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
			  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
'?>