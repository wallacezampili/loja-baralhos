<!DOCTYPE html>
<html lang="en">
<head>

<title> Perfil </title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<style>
    
    #nav
    {

        background-color: black;
        height: 50px;
        


    }
    label
    {

        font-size: 20px;

    }
    
    
    
</style>

</head>
<body>



    <!-- NAVBAR -->

    <?php 
    include "mysqli.php";
    session_start();
    if(isset($_SESSION["id"]))
    {
        $sql = "SELECT adm from userdata WHERE id = ".$_SESSION["id"];
        $result = mysqli_query($con, $sql) or die(mysqli_error($con));
        $row = $result->fetch_assoc();
        $adm = $row["adm"];
    
    }else
    {

        $adm = 0;

    }
    
    ?>

    <header>


        <ul class="nav" id="nav">

            <li class="nav-brand mr-5 my-auto ml-2">

                <img src="img/logo.png" id="logo">

            </li>


            <li class="nav-item my-auto">

                <a class="nav-link text-light" id="item" href="index.php">Home</a>

            </li>

            <li class="nav-item my-auto">

                <a class="nav-link text-light" href="items.php">Itens</a>

            </li>

            <?php if($adm > 0) 
            { ?>

                <li class="nav-item dropdown my-auto">
                    <a class="nav-link dropdown-toggle text-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Gerenciar</a>
                    <div class="dropdown-menu">

                        <a class="dropdown-item" href="item_register.php">Cadastrar Produto</a>
                        <a class="dropdown-item" href="adm.php">Cadastrar Administrador</a>
                        <a class="dropdown-item" href="view.php">Visualizar Produtos</a>
                        <a class="dropdown-item" href="view_users.php">Visualizar usuários</a>


                    </div>
                </li>

            <?php } ?>

            <li class="nav-item ml-auto my-auto">

                <?php
                
                if (isset($_SESSION["name"])) {

                    echo "<a class=\"nav-link text-light\" href=\"profile.php\">" . $_SESSION["name"] . "</a>";
                } else {
                    echo '<a class="nav-link" href="login.php"><button type="button" class="btn btn-sm btn-outline-light">Login</button></a>';
                }
                ?>

            </li>
        </ul>




    </header>


<div class="media">
   
    <img src="img/avatar.jpg" class="mx-auto w-25 h-25 mt-5">
    
</div>

<!-- Dados -->

<?php 

include "mysqli.php";


$sql = "";




?>

 <div class="container align-top pt-5 mt-5">
     
    


     <!-- Name -->

     <div class="form-group">
     
         
        <label for="Item Name">Name: <?php echo $_SESSION["name"] ?></label>
          

         
     
     </div>

    
     <!-- Lastname -->

     <div class="form-group">
     
         
         <label for="Price">Last Name: <?php echo $_SESSION["lastname"] ?></label>
        
        
     
     </div> 
     
     
     <!-- Email -->


     <div class="form-group">
     
         
     <label for="Price">Email:  <?php echo $_SESSION["email"] ?></label>
     
 
    </div> 



     <br>

    <form action="home_logoff.php">

    <a href="edit_profile.php"> <button type="button" class="btn btn-secondary mr-3">Change</button> </a>
    
    <button type="submit" class="btn btn-secondary">Logoff</button> 
    
    </form>
     


  

 </div>




</body>

</html>