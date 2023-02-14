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
</head>
<body>
    <main>
        <section class="seccionPlataformas">
            <h1>Editar plataforma</h1>
            <?php
                if(isset($ok)){
                    echo $mensaje;
                    if($ok){
                        header("refresh:2; url=../controladores/c_plataformas.php");
                    }
                }

                echo '<form action="../controladores/c_modificar_plataforma.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_plataforma" value="'.$datos['id'].'">
                    <input type="hidden" name="foto_anterior" value="'.$datos['logotipo'].'">
                    <div>
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" maxlength=50 value="'.$datos['nombre'].'" required>
                    </div>
                    <div>
                        <label for="foto">Logotipo:</label>
                        <input type="file" name="foto">
                    </div>
                    <input type="submit" name="enviar" value="Guardar">
                </form>';
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