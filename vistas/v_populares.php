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
    <title>Populares</title>
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
        <div class="text-center container">
            <img src="../assets/img/CS-GO-Wallpaper.jpg" alt="" class="csgowp">
        </div>
        <section class="seccionPopulares py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Counter-Strike: Global Offensive</h1>
                    <p>
                        Counter-Strike: Global Offensive is one of the oldest FPS games out there. Still, it’s going strong with a solid player count in 2023.
                    </p>
                    <p>
                        The FPS industry is saturated with new titles that get popular quickly but lose relevance after a year or so. However, in a herd of fads, CSGO is one game that has remained popular for over a decade. In 2023, the game has a massive fanbase that has stayed loyal since its official launch in 2012.
                    </p>
                    <p>
                        <a href="#" class="btn btn-primary my-2">Ver más</a>
                        <a href="#" class="btn btn-danger my-2">Comprar</a>
                    </p>
                </div>
            </div>
        </section>

        <section class="w-75 mx-auto my-5 min-vh-100">
            <h1 class="text-center">Los más populares</h1>

            <div class="album py-5">
                <div class="container">

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <div class="col">
                            <div class="card shadow-sm h-100">
                                <img src="../assets/img/cs.webp" class="card-img-top h-100 object-fit-cover" alt="">
                                <div class="card-body">
                                    <p class="card-text">
                                        Counter-Strike: Global Offensive es un videojuego de disparos en primera persona desarrollado por Valve Corporation y Hidden Path Entertainment.
                                    </p>
                                    <button button type="button" class="btn btn-sm btn-primary">Ver</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow-sm h-100">
                                <img src="../assets/img/spellforce.jpg" class="card-img-top h-100 object-fit-cover" alt="">
                                <div class="card-body">
                                    <p class="card-text">
                                        On a journey to great magical might, explore and control the lands of Eo in this ever-changing turn-based strategy role-playing game.
                                    </p>
                                    <button button type="button" class="btn btn-sm btn-primary">Ver</button>
                                </div>
                            </div>
                        </div><div class="col">
                            <div class="card shadow-sm h-100">
                                <img src="../assets/img/elden.webp" class="card-img-top h-100 object-fit-cover" alt="">
                                <div class="card-body">
                                    <p class="card-text">
                                        Elden Ring es un videojuego de rol de acción desarrollado por FromSoftware y publicado por Bandai Namco Entertainment.
                                    </p>
                                    <button button type="button" class="btn btn-sm btn-primary">Ver</button>
                                </div>
                            </div>
                        </div><div class="col">
                            <div class="card shadow-sm h-100">
                                <img src="../assets/img/halo.jpg" class="card-img-top h-100 object-fit-cover" alt="">
                                <div class="card-body">
                                    <p class="card-text">
                                        Halo Reach es un videojuego de disparos en primera persona desarrollado por Bungie y publicado por Microsoft Game Studios para la consola Xbox 360 y posteriormente retrocompatible con Xbox One.
                                    </p>
                                    <button button type="button" class="btn btn-sm btn-primary">Ver</button>
                                </div>
                            </div>
                        </div><div class="col">
                            <div class="card shadow-sm h-100">
                                <img src="../assets/img/last.webp" class="card-img-top h-100 object-fit-cover" alt="">
                                <div class="card-body">
                                    <p class="card-text">
                                        The Last of Us es una franquicia de juegos de terror y supervivencia de acción y aventuras creada por Naughty Dog y Sony Interactive Entertainment.
                                    </p>
                                    <button button type="button" class="btn btn-sm btn-primary">Ver</button>
                                </div>
                            </div>
                        </div><div class="col">
                            <div class="card shadow-sm h-100">
                                <img src="../assets/img/starwars.jpg" class="card-img-top h-100 object-fit-cover" alt="">
                                <div class="card-body">
                                    <p class="card-text">
                                        Star Wars Jedi: Fallen Order es un videojuego de acción y aventura para un solo jugador desarrollado por Respawn Entertainment y publicado por Electronic Arts
                                    </p>
                                    <button button type="button" class="btn btn-sm btn-primary">Ver</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
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