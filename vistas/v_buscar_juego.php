<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juegos</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Play&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
    <main>
        <section class="seccionJuegos">
            <h1>Juegos</h1>
            <?php
                if($tipo_usu=="admin"){
                    echo '<div class="contenedor_buscar_nuevo">
                        <form action="../controladores/c_buscar_juego.php" method="post">
                            <input type="text" name="cadena">
                            <input type="submit" name="buscar_juego" value="Buscar">
                        </form>
                        <form action="../controladores/c_nuevo_juego.php" method="post">
                            <input type="submit" name="nuevo_juego" value="Nuevo juego">
                        </form>
                    </div>';
                }

                for($i=0;$i<count($plataformas);$i++){
                    echo "<table border>
                    <tr>
                        <td colspan=\"4\">".$plataformas[$i]['nombre']."</td>
                    </tr>";
                    $juegos=$jue->buscar_juego_por_nombre($plataformas[$i]['id'],$cadena);
                    echo "<tr>";
                    for($j=0;$j<count($juegos);$j++){
                        echo "<td><img src=\"".$juegos[$j]['caratula']."\"></td>";
                        echo "<td>".$juegos[$j]['nombre']."</td>";
                        echo '<td>
                            <form action="c_juego_ver.php" method="post">
                                <input type="hidden" name="id_juego" value="'.$juegos[$j]['id'].'">
                                <input type="submit" name="enviar" id="btn-login" value="Ver más">
                            </form>
                        </td>';
                    }
                    echo "</tr>";
                    echo "</table>";
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