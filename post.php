<?php
session_start();


function setPosts($session, $conn, $titre, $description){

    if(isset($_POST['submit']) && $session != $titre){
     
        $sql = "INSERT INTO test (title, description, date) VALUES ('$titre', '$description', now() + INTERVAL 2 HOUR )";
        
        // créer une connection et passé la metho définie dans $sql dans cette requete dans la database
        $result = mysqli_query($conn, $sql); 
        $_SESSION['submit'] = $titre;
    }else{
        echo "cant have a post with the same title";
    }
    
}
?>