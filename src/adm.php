<!DOCTYPE html>
<html lang="en">

<head>
    <title> Registrar </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <style>
        #nav {

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
    if (isset($_SESSION["id"])) {
        $sql = "SELECT adm from userdata WHERE id = " . $_SESSION["id"];
        $result = mysqli_query($con, $sql) or die(mysqli_error($con));
        $row = $result->fetch_assoc();
        $adm = $row["adm"];
    } else {

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

            <?php if ($adm > 0) { ?>

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


    <div class="container align-top pt-5 mt-5">

        <form action="adm_reg.php" method="POST">


            <!-- Username -->

            <div class="form-group">


                <label for="Name">Name</label>
                <input type="text" class="form-control mb-3 h-25" name="name">



            </div>

            <!-- Last name -->


            <div class="form-group">


                <label for="Lastname">Last Name</label>
                <input type="text" class="form-control mb-3 h-25" name="lastname">



            </div>

            <!-- Password -->

            <div class="form-group">


                <label for="Password">Password</label>
                <input type="password" class="form-control mb-3 h-25" name="password">


            </div>

            <!-- Confirm Password -->


            <div class="form-group">


                <label for="Password">Confirm Password</label>
                <input type="password" class="form-control mb-3 h-25" name="password2">


            </div>


            <!-- E-mail -->

            <div class="form-group">


                <label for="E-mail">E-mail</label>
                <input type="text" class="form-control mb-3 h-25" name="email">



            </div>

            <br>
            <button type="submit" class="btn btn-secondary">Register</button>
            <br>
            <br>
            <a href="login.php">Login</a>


        </form>

    </div>


</body>

</html>