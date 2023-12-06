<?php
    ob_start();
    include "conexion.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css" integrity="sha512-rt/SrQ4UNIaGfDyEXZtNcyWvQeOq0QLygHluFQcSjaGB04IxWhal71tKuzP6K8eYXYB6vJV4pHkXcmFGGQ1/0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Pelicomic</title>
</head>
<body>
    <h1 class="text-center pt-5 pb-5 bg-primary text-white">Directores</h1>
    <section class="container">
        <div class="row p-4">
            <a href="./" class="btn btn-success">HOME</a> 
        </div>
        <div class="row">
            <?php
                $query = "SELECT
                    dir.dire_id,
                    dir.dire_img,
                    dir.dire_nacionalidad,
                    dir.dire_fechNac,
                    CONCAT(dir.dire_nombres, ' ', dir.dire_apellidos) AS director
                        FROM directores dir
                            LEFT JOIN peliculas pel ON   dir.dire_id = peli_dire_id";
                $res_query = mysqli_query($conexion, $query);
                while($fila = mysqli_fetch_assoc($res_query)){
                    ?>
                        <div class="col-md-3 mb-4">
                            <img src="<?php echo $fila['dire_img']; ?>" alt="" width="100%">
                            <h4 class="text-info"><?php echo $fila['director']; ?></h4>
                            <div>
                                <strong>Nacionalidad: </strong> <?php echo $fila['dire_nacionalidad']; ?>
                            </div>
                            <div>
                                <strong>F/N: </strong> <?php echo $fila['dire_fechNac']; ?>
                            </div>
                            <div>
                                <a href="editar_dire.php?id=<?php echo $fila['dire_id']; ?>" class="btn btn-success">editar</a>
                                <a href="borrar_directores.php?id=<?php echo $fila['dire_id']?>" class="btn btn-danger">borrar</a>
                            </div>
                        </div>
                <?php }
            ?>
            
        </div>
    </section>
</body>
</html>