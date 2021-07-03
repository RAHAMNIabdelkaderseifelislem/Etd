<?php

include ('../connect.php');
$req = "SELECT * From module ";
$res = $connection->query($req);
?>

<!DOCTYPE html>
<html>
<head>

<style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background-color: #ddd;
        }
        .topnav {
            overflow: hidden;
            background-color: #333;
        }

        .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .create{
            color: #f2f2f2;
            background-color: #04AA6D;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }
        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }
        .create :hover {
            background-color: #ddd;
            color: black;
        }

        .topnav a.active {
            background-color: #04AA6D;
            color: white;
        }
        * {
            box-sizing: border-box;
        }

        input[type=text], select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }
        input[type=number] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }
        input[type=password] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }

        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }

        .col-25 {
            float: left;
            width: 25%;
            margin-top: 6px;
        }

        .col-75 {
            float: left;
            width: 75%;
            margin-top: 6px;
        }

            /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

            /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {
            .col-25, .col-75, input[type=submit] {
                width: 100%;
                margin-top: 0;
            }
        }
        #res tbody tr td .actions {
            text-decoration: none;
        }
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: black;
            color: white;
            text-align: center;
        }
    </style>

    <title>Gere Module</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../tables/datatables.min.css"/>
    <script src="../tables/jquery.js"></script>
    <script src="../tables/jquery.dataTables.js"></script>
</head>
<body>
    <div class="topnav">
        <a href="home.php">Administration</a>
        <a href="student.php">Gerer les Etudiants</a>
        <a class = "active" href="module.php">Gerer les Modules</a>
        <a href="result.php">Gerer les Resultats</a>
    </div>
    <br><br><br>
    <a href="add-module.php" class="create">Ajouter Un Module</a>
    <br><br><br><br>
    <table id="std" class="display">
        <thead>
            <tr>
                <th>Lib</th>
                <th>Coef</th>
                <th>Semestre</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php if ($res->num_rows >0){
                while ($row = $res ->fetch_array()){?>
                <tr>
                    <td><?php echo $row['titre'];?></td>
                    <td><?php echo  $row['coeficient']?></td>
                    <td><?php echo $row['semseter']?></td>
                    <td class="actions">
                        <a href="#" class="edit"></a>
                        <a href="#" class="trash"></a>
                    </td>
                </tr>
            <?php }
            }
             ?>    
        </tbody>
    </table>
    <script>
    $(document).ready( function () {
        $('#std').DataTable();
    } );
    </script>
</body>
</html>