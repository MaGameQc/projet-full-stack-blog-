<?php

//info pour connexion à la database
$servername = "mysql.helpinghost.net:3306";
$username = "magameca_diemetop";
$password = "soadfan2011";
$dbname =  "magameca_complete-blog-php";


$conn = mysqli_connect($servername, $username, $password, $dbname);


//si ma connection ne fonctionne pas, echo le texte et sort moi l'erreur
if(!$conn){
    die("connection to database failed: " . mysqli_connect_error());
}

?>