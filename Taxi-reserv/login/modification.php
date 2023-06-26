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

$name="";
$email="";
$tel="";

function getPosts()
{ 
    $posts=array();
    $posts[0]= $_POST['name'];
    $posts[1]= $_POST['email'];
    $posts[2]= $_POST['tel'];

    return $posts;
    }
    if (isset($_POST['recherche']))
    { 
        $data = getPosts();

        $search_Query ="SELECT * FROM users where username LIKE '$data[0]'";   
    
        $search_Result=mysqli_query ($conn,$search_Query);

        if($search_Result)
        {
            while($row = mysqli_fetch_array($search_Result))
            {
                $name=$row['username'];
                $email=$row['email'];
                $tel=$row['tel'];
             
            }
        }else {
            echo 'no data for this nom';
        }
    }else{
        echo '';
    }
?> 

<html>
    <head>
         <title>Modification</title>
         <link rel="stylesheet" href="cs/style.css"/>
        <meta charset="UTF-8">
    </head>
    <body>
    <div class="form">
    <form method="POST" action="modification.php" >
    <h1>Formulaire de modification</h1>
        <fieldset>
            <legend>Informations personnelles</legend>
            <label>name :</label><input type="text" name="name" value="<?php echo $name;?>" placeholder="name"><br>
            <label>email :</label><input type="text" name="email" value="<?php echo $email;?>" placeholder=""><br>
            <label>telephone:</label><input type="text" name="tel" value="<?php echo $tel;?>" placeholder=""><br>
        </fieldset>
      
        <input type="submit" name="recherche" value="recherche">
        <input type="submit" name="modifier" value="modifier">
</form>

    </div>

 </body>

</html>


<?php  
$name=$_POST['name'];
$tel=$_POST['tel'];
$email=$_POST['email'];


if(isset($_POST['modifier'])){
    $sql="UPDATE `users` SET `username`='$name',`email`='$email',`tel`='$tel' WHERE `username` like '$name'";
if($conn->query($sql)===TRUE){
    echo"Modification avec succès";
}else{
    echo"Erreur:".$sql."<br>".$conn->error;
}
$conn->close();
}


?>