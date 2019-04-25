<?php

require('config.php');
$req = $connection->query("SELECT * FROM users ORDER BY id DESC");






?>
















<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../bootstrap3/css/bootstrap.min.css">
        <link rel="stylesheet" href="../bootstrap3/css/style.css">
        <title>Admin</title>
    </head>
    <body>
       
         <nav class="navbar navbar-default">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">BATIPLUS</a>
            
            </div>
        
        </nav>
        
        <section id="admin">

            <div class="container">
                <h1 style="text-align:center; color:brown; text-transform:uppercase; font-size:30px; font-family:Serif; font-weight:bold;">liste</h1>

                <table class="table">
                    <thead>
                        <tr> 
                            <th>#</th>
                            <th>nom</th>
                            <th>email</th>
                            <th>contact</th>
                            <th>statut</th>
                            <th>objet</th>
                            <th>description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row=$req->fetch()):?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['nom'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['contact'] ?></td>
                                <td><?= $row['statut'] ?></td>
                                <td><?= $row['objet'] ?></td>
                                <td><?= $row['description'] ?></td>
                            </tr>

                        <?php endwhile;?> 
                    </tbody>
                </table>


            </div>

        </section>
        
        <?php require('footer.php'); ?>

        <script src="../bootstrap3/js/jquery-3.4.0.js"></script>
        <script src="../bootstrap3/js/bootstrap.min.js"></script>

    </body>
</html>


