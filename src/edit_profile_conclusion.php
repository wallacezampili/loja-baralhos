<!DOCTYPE html>
<html lang="en">

<head>

    <title> Editar </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    
    <style>
        #nav {

            background-color: black;
            height: 50px;



        }

        label {

            font-size: 20px;

        }
    </style>

</head>

<body>

    <?php

    include "mysqli.php";
    session_start();

    $id = $_SESSION["id"];
    $name = $_POST["name"];
    $lastname = $_POST["lastname"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    $sql = "UPDATE userdata SET name = '$name', lastname = '$lastname', password = '$password', email = '$email' WHERE id = '$id';";
    $select = "SELECT email FROM userdata WHERE email = '$email'";

    $result = mysqli_query($con, $select);
    $row = $result->fetch_assoc();



    if (empty($name) or empty($lastname) or empty($password) or empty($email)) {
    ?>

        <div class="alert alert-danger alert-dismissible fade show" role="alert">

            Um ou mais campos foram deixados em branco! <a href="edit_profile.php" class="alert-link">Tente novamente.</a>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    <?php
    } else if ($result->num_rows > 0 and $row["email"] != $email) {
    ?>

        <div class="alert alert-danger alert-dismissible fade show" role="alert">

            Já existe um usuário com este e-mail! <a href="edit_profile.php" class="alert-link">Tente novamente.</a>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    <?php

    } else if (mysqli_query($con, $sql)) {

    ?>

        <div class="alert alert-success alert-dismissible fade show" role="alert">

            Usuário alterado com sucesso!

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

    <?php 
    include "mysqli.php";
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

                <a class="nav-link text-light" id="item" href="#">Home</a>

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

    
    $sql = "SELECT * FROM userdata WHERE id =". $_SESSION["id"];
    $result = mysqli_query($con, $sql) or die(mysqli_error($con));
    $user = $result->fetch_assoc();



    ?>

    <div class="container align-top pt-5 mt-5">




        <!-- Name -->

        <div class="form-group">


            <label for="Item Name">Name: <?php echo $user["name"] ?></label>




        </div>


        <!-- Lastname -->

        <div class="form-group">


            <label for="Price">Last Name: <?php echo $user["lastname"] ?></label>



        </div>


        <!-- Email -->


        <div class="form-group">


            <label for="Price">Email: <?php echo $user["email"] ?></label>


        </div>



        <br>

        <form action="home_logoff.php">

            <a href="edit_profile.php"> <button type="button" class="btn btn-secondary mr-3">Change</button> </a>

            <button type="submit" class="btn btn-secondary">Logoff</button>

        </form>





    </div>




</body>

</html>