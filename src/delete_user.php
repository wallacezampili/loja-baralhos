<!DOCTYPE html>
<html lang="en">

<head>
    <title> Delete</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
    #nav
    {

        background-color: black;
        height: 50px;
        


    }
    </style>








</head>

<body>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

    <!-- NAVBAR -->

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

        <li class="nav-item dropdown my-auto">

            <a class="nav-link dropdown-toggle text-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Gerenciar</a>
            <div class="dropdown-menu">
            
            <a class="dropdown-item" href="item_register.php">Cadastrar Produto</a>
            <a class="dropdown-item" href="adm.php">Cadastrar Administrador</a>
            <a class="dropdown-item" href="view.php">Visualizar Produtos</a>
            <a class="dropdown-item" href="view_users.php">Visualizar usuários</a>
           

            </div>
        </li>

        <li class="nav-item ml-auto my-auto">
        
        <?php 
        session_start();
        if(isset($_SESSION["name"]))
        { 

            echo "<a class=\"nav-link text-light\" href=\"profile.php\">" . $_SESSION["name"] . "</a>";

        }
        else
        {
            echo '<a class="nav-link" href="login.php"><button type="button" class="btn btn-sm btn-outline-light">Login</button></a>';
        }
        ?>

        </li>

    </ul>


    </header>

    <?php

    include "mysqli.php";
    $id = $_REQUEST["id"];
    $del = "DELETE FROM userdata WHERE id=$id";
    if (mysqli_query($con, $del)) {
    ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">

            Item deletado com sucesso

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                <span aria-hidden="true">&times;</span>

            </button>

        </div>
    <?php

    } else {

        echo $con->error;
    }

    ?>
    <br>
    <a href="view_users.php">Return</a>




</body>

</html>