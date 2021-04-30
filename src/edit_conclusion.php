<!DOCTYPE html>
<html lang="en">
<head>

    <title> Editar </title> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
   

    <style>
    
    #nav
    {

        background-color: black;
        height: 50px;
        


    }
    .thead
    {
        background-color: black;
        



    }
    
    
    
</style>
</head>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<body>

<?php

include "mysqli.php";

$id = $_REQUEST["id"];
$name = $_POST["item_name"];
$price = $_POST["price"];
$desc = $_POST["desc"];


$sql = "UPDATE itens SET name = '$name', description = '$desc', price = '$price' WHERE id = '$id';";
$select = "SELECT name FROM itens WHERE name = '$name'";






if (empty($name) or empty($price) or empty($desc)) {

    ?>

        <div class="alert alert-danger alert-dismissible fade show" role="alert">

            Um ou mais campos foram deixados em branco! 

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    <?php




} else if (!is_numeric($price)) {

    ?>

        <div class="alert alert-danger alert-dismissible fade show" role="alert">

            O preço que você digitou não é um número!

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>

    <?php

} else if (mysqli_query($con, $sql)) {
?>

    <div class="alert alert-success alert-dismissible fade show" role="alert">

        Mudanças feitas com sucesso

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">

            <span aria-hidden="true">&times;</span>

        </button>

    </div>



<?php

} else {

    echo mysqli_error($con);
}








?>

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

    <br>
    <br>

    <!--TABLE-->

    <div class="container">

    <table class="table">
    <thead class="thead">
    <tr> 

        <th scope="col" style="color:white;" >Id</th>
        <th scope="col" style="color:white;">Name</th>
        <th scope="col" style="color:white;">Price</th>
        <th scope="col" style="color:white;">Edit</th>
        <th scope="col" style="color:white;">Delete</th>
    
    </tr>
    </thead>
    <tbody>
    
    <?php 

    include "mysqli.php";
    $sql = "SELECT * FROM itens ORDER BY id";
    $results = mysqli_query($con, $sql) or die(mysqli_error($con));

    while($row = mysqli_fetch_assoc($results))
    {
    
    ?>

    <tr>

    <td><?php echo $row["id"]?></td>
    <td><?php echo $row["name"]?></td>
    <td><?php echo $row["price"]?></td>
    <td><a href="edit.php?id=<?php echo $row["id"] ?>">Edit</a></td>
    <td><a href="delete.php?id=<?php echo $row["id"]?>">Delete</a></td>



    
    </tr>
    
    
    
    
    <?php } ?>

    </tbody>
    </table>
    </div>
    




    
    
    
    

   
</body>
</html>