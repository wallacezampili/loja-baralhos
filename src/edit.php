<!DOCTYPE html>
<html lang="en">
<head>
    <title> Editar </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    <style>
    
        textarea 
        {
        
         resize: none;
        
        }
        #nav
        {

        background-color: black;
        height: 50px;
        


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
   <?php 

   include "mysqli.php";

   $id = $_REQUEST["id"];
   $sql = "SELECT * FROM itens WHERE id=$id";
   
   $result = mysqli_query($con, $sql) or die(mysqli_error($con));
   $row = mysqli_fetch_assoc($result);
   
   
   ?>

    <div class="container align-top pt-5 mt-5">
        
         <form action="edit_conclusion.php?id=<?php echo $id ?>" method="POST">


        <!-- Item Name -->

        <div class="form-group">
        
            
            <label for="Item Name">Item Name</label>
            <input type="text" class="form-control mb-3 h-25" required value="<?php echo $row["name"]?>" name="item_name">  

            
        
        </div>

       
        <!-- Price-->

        <div class="form-group">
        
            
            <label for="Price">Price</label>
            <input type="text" class="form-control mb-3 h-25" required value="<?php echo $row["price"]?>" name="price">
           
        
        </div> 
        
        
        <!-- Description -->


        <div class="form-group">
        
            
            <label for="Description">Item Description</label>
            <textarea class="form-control" rows="3" required placeholder="<?php echo $row["description"]?>" name="desc"></textarea>

            
        
        </div>



        <br>
        <button type="submit" class="btn btn-secondary">Update</button>
        


        </form>

    </div>
    

</body>
</html>