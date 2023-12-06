<?php
    include "conexion.php";
    ob_start();
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
            <a href="directores.php" class="btn btn-success">Directores</a>
        </div>
        <div class="row justify-content-center">
            <h4 class="text-center col-md-12">Editar Directores</h4>
            <?php 
                $id = $_GET['id'];
                $query = "SELECT * FROM directores WHERE dire_id = {$id}";
                $query_res = mysqli_query($conexion, $query);
                $fila = mysqli_fetch_assoc($query_res);
            ?>
            <form method="post" class="col-md-6 mt-4 pb-15">
                <div class="form-group">
                    <label for="dire_id">Nombre del Director</label>
                    <select name="dire_id" id="dire_id" class="form-control" required>
                        <option value="" selected disabled>- Selecciona un Director -</option>
                        <?php
                            $query = "SELECT * FROM directores";
                            $query_res = mysqli_query($conexion, $query);
                            while($filaDire = mysqli_fetch_assoc($query_res)){
                                $dire_id = $filaDire['dire_id'];
                                $director = $filaDire['dire_nombres'] . " " . $filaDire['dire_apellidos'];

                                if($dire_id == $fila['dire_id']){
                                    ?>
                                    <option 
                                        value="<?php echo $filaDire['dire_id']; ?>"
                                        selected
                                    >
                                        <?php echo $director; ?>
                                    </option>
                                <?php }else{
                                    ?>
                                    <option value="<?php echo $filaDire['dire_id']; ?>">
                                        <?php echo $director; ?>
                                    </option>
                                <?php }
                                }                                    
                        ?>
                        
                    </select>
                </div>
                <div class="form-group">
                    <label for="dire_nacionalidad">Nacionalidad del Director</label>
                    <input 
                        type="text" 
                        name="dire_nacionalidad" 
                        class="form-control" 
                        id="dire_nacionalidad"
                        value="<?php echo $fila['dire_nacionalidad']; ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="dire_fechNac">Fecha de Nacimiento del Director</label>
                    <input 
                        type="date" 
                        name="dire_fechNac" 
                        class="form-control" 
                        id="dire_fechNac"
                        value="<?php echo $fila['dire_fechNac']; ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="dire_img">Imagen URL</label>
                    <input 
                        type="text" 
                        name="dire_img" 
                        class="form-control" 
                        id="dire_img" 
                        required
                        value="<?php echo $fila['dire_img']; ?>"
                    >
                </div>
                <div class="form-group mt-5">
                    <input type="submit" value="Editar" name="editar" class="btn btn-primary">
                </div>
            </form>
            <?php 
                if(isset($_POST['editar'])){
                    $dire_id=$_POST['dire_id'];
                    $dire_nacionalidad=$_POST['dire_nacionalidad'];
                    $dire_fechNac=$_POST['dire_fechNac'];
                    $dire_img=$_POST['dire_img'];

                    $query = "UPDATE directores SET dire_id = {$dire_id}, dire_nacionalidad = '{$dire_nacionalidad}', dire_fechNac = '{$dire_fechNac}', dire_img = '{$dire_img}' WHERE dire_id={$id}";
                    mysqli_query($conexion, $query);
                    header("Location: directores.php");
                }            
            ?>
        </div>
    </section>
</body>
</html>