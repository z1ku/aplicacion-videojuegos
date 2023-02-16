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
    <title>Nosotros</title>
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
        <section class="seccionNosotros w-75 mx-auto my-5 min-vh-100">
            <div class="container-fluid text-center mb-5">
                <h3>¿Quiénes somos?</h3>
                <img src="../assets/img/logo.png" class="object-fit-cover mb-3" style="display:inline" alt="logo" width="350" height="350">
                <h3>Gaming Hub</h3>
            </div>

            <div class="container-fluid text-center mb-5">
                <h3 class="mb-3">¿Qué somos?</h3>
                <p>
                    Somos un club de videojuegos y cyber café.
                </p>
            </div>

            <div class="container-fluid text-center mb-5">    
                <h3>Sobre nosotros</h3><br>
                <p>
                    En Gaming Hub nos proponemos llegar a nuestros consumidores ofreciéndoles una experiencia única que no puedan encontrar en ningún otro lugar.
                </p>
                <p>
                    Cuando sumamos tecnología punta, comunidad, competición y ocio solo ahí podemos decir que hemos trasladado la experiencia a los clientes. Sobre esta base funciona nuestra manera de trabajar. Todo ello con un servicio de consideración basado en tres ejes fundamentales.
                </p>
                <div class="row">
                    <div class="col-sm-4">
                        <img src="../assets/img/cyber1.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-sm-4"> 
                        <img src="../assets/img/cyber2.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-sm-4"> 
                        <img src="../assets/img/cyber3.webp" class="img-fluid" alt="">
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <h2 class="text-center">Contacto</h2>
                <div class="row">
                    <div class="col-sm-5">
                        <p>Contacta con nosotros y te responderemos en 24h.</p>
                        <p><i class="fa-solid fa-location-dot"></i> Granada, Andalucía, ES</p>
                        <p><i class="fa-solid fa-mobile-screen"></i> +00 1515151515</p>
                        <p><i class="fa-solid fa-envelope"></i> gaminghub@gmail.com</p>
                    </div>
                    <div class="col-sm-7">
                        <div class="row">
                            <div class="col-sm-6 form-group mb-3">
                                <input class="form-control" id="name" name="name" placeholder="Nombre" type="text" required>
                            </div>
                            <div class="col-sm-6 form-group mb-3">
                                <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                            </div>
                        </div>
                        <textarea class="form-control" id="comments" name="comments" placeholder="Comentario" rows="5"></textarea><br>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <button class="btn btn-primary" type="submit">Enviar</button>
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