<?php
session_start();


function setComments($conn, $id, $sessionComments) {
    
    $comments = $_POST['comments'];
        $comments = mysqli_real_escape_string($conn, $_POST['comments']);
        
    if (isset($_POST['commentSubmit'.$id]) && $sessionComments != $comments){
        
        
        $sql = "INSERT INTO comments (comments, postId, date) VALUES ('$comments', '$id', now() + INTERVAL 2 HOUR )";
        
        // créer une connection et passé la metho définie dans $sql dans cette requete dans la database
        
        
        $result = mysqli_query($conn, $sql); 
        
        $_SESSION['comments'] = $comments;
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
    
 $commentsArray = array_reverse($commentsArray);
    
    foreach($commentsArray as $value2){
        if($id == $value2['postId']){
        echo "<div style='margin-top : 1%;' class='speech-bubble mx-auto'><p style='padding-left: 5%; padding-right: 5%; text-align: center;'>" . $value2['comments'] . "</p>
        <div style='background-color: #007bff; text-align: center;' class='w-100 mx-auto rounded'><p style='color : white;'>" . $value2['date'] . "</p></div>
        </div>" . "<br>" 
        ;
    }
}
   
    
}

     
    // while($row = mysqli_fetch_assoc($result) ){
    //     echo "<p style='text-align: center;'>" . nl2br($row['comments']) . "</p>" .  "<br>";
    // }


}

?>