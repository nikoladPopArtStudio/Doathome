<?php 
    require_once 'connection.php';

    $q = "SELECT * FROM `studenti`";
    $res = $conn->query($q);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="loader"></div>

    <div class="main">
        <ul class='parent list-group'>
            <?php
            $students = $res->fetchAll();
            foreach($students as $student)
            {
            ?>
            <li>
                <ul>
                    <li class='list-group-item' >Index: <span class='studentId '><?php echo $student['student_id']; ?></span></li>
                    <li class="list-group-item" >Ime i Prezime: <?php echo $student['Ime'] . ' ' . $student['Prezime']; ?></li>
                    <li class="list-group-item">Prosecna Ocena: <?php echo $student['Ocena']; ?></li>
                    <button class='deleteButton btn btn-danger' type="submit">Delete</button>
                </ul>
            </li>
            <?php } ?>
        </ul>
            <form id='studentForm' name='studentForm' action="create.php"  onsubmit="return required(event);" method='POST'>
            <div class="form-group">
                    <label for="ime">Ime: </label>
                    <input class='field form-control' type="text" name='ime' value=''>
                </div>
        
                <div class="form-group">
                    <label for="ime">Prezime: </label>
                    <input class='field form-control' type="text" name='prezime' value=''>
                </div>
        
                <div class="form-group">
                    <label for="ime">Ocena: </label>
                    <input class='field form-control' type="number" name="ocena" value='' step=".01">
                </div>
        
                <input class="btn btn-primary" type="submit" value='unesi studenta' ></input>
            </form>
        
    </div>



    <?php $conn = null; ?>
    <script src="delete.js"></script>
    <script src="prevent.js"></script>
    <script src="validation.js"></script>
</body>

</html>