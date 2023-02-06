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
                        <form action="../controladores/c_juego_nuevo.php" method="post">
                            <input type="submit" name="juego_nuevo" value="Nuevo juego">
                        </form>
                    </div>';
                }

                if($juegos!=null){
                    echo "<h2>Juegos encontrados</h2>";
                    echo "<table border>
                    <tr>
                        <td>Plataforma</td>
                        <td>Caratula</td>
                        <td>Nombre</td>
                        <td>Ver</td>";
                        if($tipo_usu=="admin"){
                            echo "<td>Editar</td>";
                        }
                    echo "</tr>";
                    for($i=0;$i<count($juegos);$i++){
                        $plataforma=$plata->plataforma_por_id($juegos[$i]['plataforma']);
                        echo "<tr>
                        <td>".$plataforma['nombre']."</td>
                        <td>
                            <img src=\"".$juegos[$i]['caratula']."\">
                        </td>
                        <td>".$juegos[$i]['nombre']."</td>";
                        echo '<td>
                            <form action="c_juego_ver.php" method="post">
                                <input type="hidden" name="id_juego" value="'.$juegos[$i]['id'].'">
                                <input type="submit" name="enviar" id="btn-login" value="Ver más">
                            </form>
                        </td>';
                        if($tipo_usu=="admin"){
                            echo '<td>
                                <form action="c_juego_editar.php" method="post">
                                    <input type="hidden" name="id_juego" value="'.$juegos[$i]['id'].'">
                                    <input type="submit" name="enviar" id="btn-login" value="Editar">
                                </form>
                            </td>';
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                }else{
                    echo "<p>No se han encontrado coincidencias</p>";
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