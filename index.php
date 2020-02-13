<?php 
session_start();
$_SESSION['submit'];
$session = $_SESSION['submit'];



 include 'databaseConnection.php';
 

 include 'post.php';
  include 'comment.inc.php';
 

 //Jinitialise la session

// $titre = $_POST['titre'];
$description = $_POST['description'];

$titre = mysqli_real_escape_string($conn, $_POST['titre']);
$description = mysqli_real_escape_string($conn, $_POST['description']);


?>

<!doctype html>

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
<html lang="en">
   
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <!--css external file-->
    <link rel="stylesheet" href="static/css/public_styling.css">

 




    <title>Trials Editor Blog</title>
  </head>
  <body style="">
<!--navbar-->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" style="font-weight: 700;" href="#">TrialsEditorBlog.com</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Publier</a>
      </li>

    </ul>
  </div>
</nav>
<!--navbar-->
      
      
      <h1 style="color : #007bff;">créer un post</h1>
   <?php echo    
     " <div  class='m-4' style='height: auto; box-shadow: 4px 4px 10px grey;'  >".

"<form action='".setPosts($session, $conn, $titre, $description)."'  method='post'>" .
  "<div class='form-group'>".
    "<p>titre</p>".
    "<input name='titre' type=text' class='form-control' id='exampleFormControlInput1' >".
  "</div>".
 
  "<div class='form-group'>".
    "<p>détails</p>".
    "<textarea name='description' type='text' class='form-control' id='exampleFormControlTextarea1' rows='10'></textarea>".
  "</div>".
  
  "<input type='submit' name='submit' class='btn btn-outline-primary w-50 mx-auto'>".
"</form>".
      "</div>".
      
      "<div class='postsRecent container-fluid'>".
          
      "</div>";
      
    ?>
    
    

    <?php foreach($datas as $value): ?>
    
    <?php 
    
    
    $id = $value['id'];
    echo $id;
   
    echo
    "<div style='box-shadow: 4px 4px 10px grey; text-align: center; padding: 5% '>
    <h1 style='color : #007bff;'>" . $value['title'] . "</h1>".
    "<hr style='height: 6px; background-color: black; width: 75%; margin-left: auto; margin-right: auto;'>".
    "<p>" . $value['description'] . "</p>".
        "<p style='color: white; background-color: #007bff;' class='w-50 mx-auto'>" . $value['date'] . "</p>".
        
        
        "<form action='".setComments($conn, $id)."' method='post'>
        <input name='comments' type='text' class='form-control' id='exampleFormControlInput1' >
        <input type='submit' name='commentSubmit$id' value='commenter '>
        </form>
        ".

    "</div>"; 
    
    // afficher les commentaires
 getComments($conn, $commentsArray, $id);

 
    ?>
    
    
    
    
    <?php endforeach ?>
    
    

    <?php 
        
        
        
       
        


    ?>
    
    

    
    
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