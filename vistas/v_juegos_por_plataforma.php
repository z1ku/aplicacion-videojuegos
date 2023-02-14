<?php
    if(!isset($controlador)){
        header("Location:../index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juegos por plataforma</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Play&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
    <main>
        <section class="seccionPlataformas">
            <?php
                echo "<h1>Juegos de ".$plataforma['nombre']."</h1>";
                if($juegos!=null){
                    echo "<table border>
                    <tr>
                        <td>Caratula</td>
                        <td>Nombre</td>
                        <td>Fecha lanzamiento</td>";
                    echo "</tr>";
                    for($i=0;$i<count($juegos);$i++){
                        echo "<tr>
                        <td><img src=\"../assets/img/juegos/".$juegos[$i]['caratula']."\"></td>
                        <td>".$juegos[$i]['nombre']."</td>
                        <td>".$juegos[$i]['fecha_lanzamiento']."</td>";
                        echo '</tr>';
                    }
                    echo "</table>";
                }else{
                    echo "<p>No hay juegos de esa plataforma aún</p>";
                }
            ?>
        </section>
    </main>
    <footer>
            <div>
                <a href="#">Política de privacidad</a>
                <a href="#">Condiciones</a>
                <a href="#">Contacto</a>
            </div>
            <span>DESARROLLADO POR RICARDO ROMERO BUSTOS</span>
        </footer>
</body>
</html>