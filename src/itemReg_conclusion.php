<!DOCTYPE html>
<html lang="en">

<head>

    <title> Registrar Produto </title>
    <meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
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


    <?php

    include "mysqli.php";

    $name = $_POST["item_name"];
    $price = $_POST["price"];
    $desc = $_POST["desc"];

    $sql = "INSERT INTO itens (`name`, `description`, `price`) VALUES( ?, ?, ? );";
    $select = "SELECT name FROM itens WHERE name = '$name'";


    if ($stmt = mysqli_prepare($con, $sql)) {

        mysqli_stmt_bind_param($stmt, "ssd", $name, $desc, $price);
    }
    if ($verify = mysqli_query($con, $select)) {

        if ($verify->num_rows > 0) {

    ?>

            <div class="alert alert-danger alert-dismissible fade show" role="alert">

                Já existe um produto com esse nome ! <a href="item_register.php" class="alert-link">Tente novamente.</a>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

            <?php
        } else {

            if (empty($name) or empty($price) or empty($desc)) {

            ?>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">

                    Um ou mais campos foram deixados em branco ! <a href="item_register.php" class="alert-link">Tente novamente.</a>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>

            <?php
            } else if (!is_numeric($price)) {

            ?>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">

                    O preço digitado é invalido<a href="item_register.php" class="alert-link">Tente novamente.</a>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>

            <?php

            } else if (mysqli_execute($stmt)) {

            ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">

                    Produto registrado com sucessso !

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>

    <?php

            } else {

                echo mysqli_error($con);
            }
        }
    } else {

        echo mysqli_error($con);
    }
    ?>
</body>

</html>