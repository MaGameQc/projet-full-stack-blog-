<?php
session_start();


function setComments($conn, $id, $sessionComments) {
    
    $comments = $_POST['comments'];
        $comments = mysqli_real_escape_string($conn, $_POST['comments']);
        
    if (isset($_POST['commentSubmit'.$id]) && $sessionComments != $comments){
        
         $target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$target_file_path = "uploads/" . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST['commentSubmit'.$id])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
        
        
        

        
        
        $sql = "INSERT INTO comments (comments, postId, date, image) VALUES ('$comments', '$id', now() + INTERVAL 2 HOUR, '$target_file_path' )";
        
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
            $imgSrc = $value2['image'];
            if($imgSrc != "uploads/"){
                echo
        "<img src='$imgSrc' class='img-fluid col-md-2 mx-auto'>";
        }
        echo "
        
        <div style='margin-top : 1%;' class='speech-bubble mx-auto'><p style='padding-left: 5%; padding-right: 5%; text-align: center; color: white; '>" . $value2['comments'] . "</p>
        <div style='background-color: #03fc84; text-align: center;' class='w-100 mx-auto rounded'><p style='color : black;'>" . $value2['date'] . "</p></div>
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