<!DOCTYPE html>

<?php         
  
$servername = "127.0.0.1";      
$username = "root";          
$password = "";              
$dbname = "test";            

$conn = mysqli_connect($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);   
}
?> 

<html>
    <head>
         <title>Affiche</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="cs/style.css"/>
    </head>
    <body>
    <form method="POST" >
    
         <input type="submit" name="afficher" value="Afficher Réservation"> 
        
    </form>  
    <input type="submit" name="modifier" onclick=window.location.href='modification.php' value="modifier"> 
         <input type="submit" name="suprimer" onclick=window.location.href='supprimer.php' value="suprimer"> 
        <?php
           if(isset($_POST['afficher'])){
       
           $sql ="SELECT * FROM `reservations` ";          
           
           $res = mysqli_query($conn,$sql); 
            
        }
            $conn->close();        
            ?>
          

     <br> <br>
     <fieldset>
     <legend>Profil de l'utilisateur</legend>
      <table width="600px">
        <tr  >
            <td>name</td>
            <td>email</td>
            <td>telefone</td>
            <td>notes</td>
            <td>date</td>
            <td>slot</td>
        </tr>
        <?php if(isset($_POST['afficher'])){
        while($ligne= mysqli_fetch_array($res)) {?> 
        <tr> 
        <td> <?php echo $ligne['res_name']; ?> </td>
        <td> <?php echo $ligne['res_email']; ?> </td>
        <td> <?php echo $ligne['res_tel']; ?> </td>
        <td> <?php echo $ligne['res_notes']; ?> </td>
        <td> <?php echo $ligne['res_date']; ?> </td>
        <td> <?php echo $ligne['res_slot']; ?> </td>
        </tr>
        <?php } }?>
      </table>

     </fieldset>
    </body>

</html>