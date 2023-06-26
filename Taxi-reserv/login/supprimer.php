<!DOCTYPE html>


<?php         
     
$servername = "127.0.0.1";       
$username = "root";          
$password = "";             
$dbname = "registration";            

$conn = mysqli_connect($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);   
}
?> 

<html>
    <head>
         <title>Supprimer</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="cs/style.css"/>
    </head>
    <body>

    <div class="form">
    <form method="POST" >
        <h1>Suppression du profil de l'utilisateur:</h1>
        <fieldset>  
            <legend>Informations </legend>
            <label>Nom :</label><input type="text" name="username" placeholder="Ex:Ben ahmed"><br>
            <label>Email :</label><input type="text" name="email" placeholder="Ex:Hajer"><br>
        </fieldset>  
         <input type="submit" name="supprimer" value="Supprimer"> 
    </form>  
        <?php
           if(isset($_POST['supprimer'])){
            $username=$_POST['username'];
            $email=$_POST['email'];
           $sql ="DELETE FROM `users` WHERE username like '$username' and email like '$email';";           
         
           if($conn -> query($sql) === TRUE){   
            echo "Suppression avec sucès "; 
        } else {      
            echo "Error: ". $sql . "<br>" . $conn->error;  
        }
        }
            $conn->close();   
            ?>
            </body>

</html>