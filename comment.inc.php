<?php

function setComments($conn, $id) {
    if (isset($_POST['commentSubmit'.$id])){
        $comments = $_POST['comments'];
        
        $sql = "INSERT INTO comments (comments) VALUES ('$comments')";
        
        // créer une connection et passé la metho définie dans $sql dans cette requete dans la database
        
        
        $result = mysqli_query($conn, $sql); 
    }
}

function getComments($conn){
    $sql = "SELECT * FROM comments";
    $result = mysqli_query($conn, $sql); 
     
    while($row = mysqli_fetch_assoc($result) ){
        echo "<p style='text-align: center;'>" . nl2br($row['comments']) . "</p>" .  "<br>";
    }
}

?>