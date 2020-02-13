<?php

function setComments($conn, $id) {
    if (isset($_POST['commentSubmit'.$id])){
        $comments = $_POST['comments'];
        
        $sql = "INSERT INTO comments (comments, postId) VALUES ('$comments', $id)";
        
        // créer une connection et passé la metho définie dans $sql dans cette requete dans la database
        
        
        $result = mysqli_query($conn, $sql); 
    }
}

function getComments($conn, $commentsArray, $id){
    $commentsArray = array();
    
    $sql = "SELECT * FROM comments";
    $result = mysqli_query($conn, $sql); 
    

    
    
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $commentsArray[] = $row;
    }
    

    
    foreach($commentsArray as $value2){
        if($id == $value2['postId']){
        echo "<p style='text-align : center'>" . $value2['comments'] . "</p>" . "<br>";
    }
}
//     // $commentsArray = array_reverse($commentsArray);
    
}

     
    // while($row = mysqli_fetch_assoc($result) ){
    //     echo "<p style='text-align: center;'>" . nl2br($row['comments']) . "</p>" .  "<br>";
    // }


}

?>