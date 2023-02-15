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
    <title>Plataformas</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Play&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        echo $header;
    ?>
    <main>
        <section class="seccionPlataformas">
            <h1>Plataformas</h1>
            <?php
                if($tipo_usu=="admin"){
                    echo '<div class="contenedor_buscar_nuevo">
                        <form action="../controladores/c_buscar_plataforma.php" method="post">
                            <input type="text" name="cadena">
                            <input type="submit" name="buscar_plataforma" value="Buscar">
                        </form>
                        <form action="../controladores/c_plataforma_nueva.php" method="post">
                            <input type="submit" name="plataforma_nueva" value="Nueva plataforma">
                        </form>
                    </div>';
                }

                echo "<div>";
                for($i=0;$i<count($plataformas);$i++){
                    echo "<div>";
                    echo '<a href="../controladores/c_ver_plataforma.php?plata_id='.$plataformas[$i]['id'].'"><img src="../assets/img/plataformas/'.$plataformas[$i]['logotipo'].'"></a>';
                    if($tipo_usu=="admin"){
                        echo '<form action="c_plataforma_editar.php" method="post">
                            <input type="hidden" name="id_plata" value="'.$plataformas[$i]['id'].'">
                            <input type="submit" name="enviar" id="btn-login" value="Editar">
                        </form>';
                    }
                    echo "</div>";
                }
                echo "</div>";
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