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
        <section class="bienvenida w-75 mx-auto my-2">
            <h1 class="text-center">Bienvenido a Gaming Hub</h1>
        </section>
        <section class="seccionUltimosLanzamientos w-75 mx-auto my-5">
            <h2 class="text-center fs-2">Últimos lanzamientos</h2>
            <?php
                $plata=new plataforma();
                $plataformas=$plata->todas_plataformas();

                $jue=new juego();

                for($i=0;$i<count($plataformas);$i++){
                    $juegos=$jue->ultimos_juegos_por_plataforma($plataformas[$i]['id']);
                    if($juegos!=null){
                        echo '<div class="my-5">
                        <h3 class="text-center my-3 fs-2">'.$plataformas[$i]['nombre'].'</h3>';
                        echo '<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">';
                        for($j=0;$j<count($juegos);$j++){
                            echo '<div class="col">';
                            echo '<div class="card text-center h-100">
                                <img src="assets/img/juegos/'.$juegos[$j]['caratula'].'" class="card-img-top h-100 object-fit-cover" alt="">
                                <div class="card-body">
                                    <h3 class="card-title">'.$juegos[$j]['nombre'].'</h3>
                                </div>
                            </div>
                            </div>';
                        }
                        echo "</div>";
                        echo "</div>";
                    }
                }
            ?>
        </section>
        <section class="seccionUltimosComentarios w-75 mx-auto my-5">
            <h2 class="text-center fs-2">Últimos comentarios</h2>
            <?php
                $comen=new comentario();
                $comentarios=$comen->ultimos_comentarios();

                if($comentarios!=null){
                    echo '<div id="ultimosComentarios" class="carousel m-auto" data-bs-ride="carousel" style="width: 20rem;">
                    <div class="carousel-inner">';
                    for($i=0;$i<count($comentarios);$i++){
                        if($i==0){
                            echo '<div class="carousel-item active">
                                <img src="assets/img/juegos/'.$comentarios[$i]['caratula'].'" class="d-block w-100" alt="">
                                <div class="carousel-caption d-none d-md-block bg-black bg-opacity-75">
                                    <h5>'.$comentarios[$i]['nombre'].'</h5>
                                    <p>'.$comentarios[$i]['texto'].'</p>
                                    <p>'.$comentarios[$i]['fecha'].'</p>
                                </div>
                            </div>';
                        }else{
                            echo '<div class="carousel-item">
                                <img src="assets/img/juegos/'.$comentarios[$i]['caratula'].'" class="d-block w-100" alt="">
                                <div class="carousel-caption d-none d-md-block bg-black bg-opacity-75">
                                    <h5>'.$comentarios[$i]['nombre'].'</h5>
                                    <p>'.$comentarios[$i]['texto'].'</p>
                                    <p>'.$comentarios[$i]['fecha'].'</p>
                                </div>
                            </div>';
                        }
                    }
                    echo '</div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#ultimosComentarios" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#ultimosComentarios" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>';
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