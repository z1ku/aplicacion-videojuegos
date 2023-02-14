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
    <title>Usuarios</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Play&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
    <main>
        <section class="seccionUsuarios">
            <h1>Usuarios</h1>
            <?php
                echo '<div class="contenedor_buscar_nuevo">
                    <form action="../controladores/c_buscar_usuario.php" method="post">
                        <input type="text" name="cadena">
                        <input type="submit" name="buscar_usuario" value="Buscar">
                    </form>
                    <form action="../controladores/c_usuario_nuevo.php" method="post">
                        <input type="submit" name="usuario_nuevo" value="Nuevo usuario">
                    </form>
                </div>';

                echo "<table border>
                <tr>
                    <td>Nombre</td>
                    <td>Nick</td>
                    <td>Activo</td>
                    <td>Editar</td>
                </tr>";
                for($i=0;$i<count($usuarios);$i++){
                    if($usuarios[$i]['id']!=0){
                        echo "<tr>
                        <td>".$usuarios[$i]['nombre']."</td>
                        <td>".$usuarios[$i]['nick']."</td>";
                        if($usuarios[$i]['activo']==1){
                            echo "<td>Si</td>";
                        }else{
                            echo "<td>No</td>";
                        }
                        echo '<td>
                            <form action="c_usuario_editar.php" method="post">
                                <input type="hidden" name="id_usu" value="'.$usuarios[$i]['id'].'">
                                <input type="submit" name="enviar" id="btn-login" value="Editar">
                            </form>
                        </td>';
                        echo "</tr>";
                    }
                }
                echo "</table>";
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