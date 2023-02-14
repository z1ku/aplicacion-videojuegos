<?php
    require_once("funciones/funciones.php");
    require_once("bd/bd.php");
    require_once("modelos/m_juegos.php");
    require_once("modelos/m_plataformas.php");
    require_once("modelos/m_comentario.php");

    session_start();

    if(isset($_COOKIE['sesion'])){
        session_decode($_COOKIE['sesion']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Play&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        if(isset($_SESSION['nick']) && isset($_SESSION['pass'])){
            $nick=$_SESSION['nick'];
            $pass=$_SESSION['pass'];
    
            $esAdmin=comprobar_admin($nick,$pass);
            
            if($esAdmin){
                headerIndexAdmin();
            }else{
                headerIndexUsu();
            }
        }else{
            headerIndexGuest();
        }
    ?>
    <main>
        <section class="bienvenida">
            <h1>Bienvenido a Gaming Hub</h1>
        </section>
        <section class="seccionUltimosLanzamientos">
            <h2>Últimos lanzamientos</h2>
            <?php
                $plata=new plataforma();
                $plataformas=$plata->todas_plataformas();

                $jue=new juego();

                for($i=0;$i<count($plataformas);$i++){
                    $juegos=$jue->ultimos_juegos_por_plataforma($plataformas[$i]['id']);
                    if($juegos!=null){
                        echo "<div>
                        <h3>".$plataformas[$i]['nombre']."</h3>";
                        echo '<div class="card-group">';
                        for($j=0;$j<count($juegos);$j++){
                            echo '<div class="card">
                                <img src="assets/img/juegos/'.$juegos[$j]['caratula'].'" class="card-img-top object-fit-cover" alt="">
                            </div>';
                        }
                        echo "</div>";
                        echo "</div>";
                    }
                }
            ?>
        </section>
        <section class="seccionUltimosComentarios">
            <h2>Últimos comentarios</h2>
            <?php
                $comen=new comentario();
                $comentarios=$comen->ultimos_comentarios();

                if($comentarios!=null){
                    echo '<table border>
                    <tr>
                        <td>Caratula</td>
                        <td>Nombre</td>
                        <td>Texto</td>
                        <td>Fecha</td>
                    </tr>';
                    for($i=0;$i<count($comentarios);$i++){
                        echo '<tr>
                            <td><img src="assets/img/juegos/'.$comentarios[$i]['caratula'].'"></td>
                            <td>'.$comentarios[$i]['nombre'].'</td>
                            <td>'.$comentarios[$i]['texto'].'</td>
                            <td>'.$comentarios[$i]['fecha'].'</td>
                        </tr>';
                    }
                    echo '</table>';
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