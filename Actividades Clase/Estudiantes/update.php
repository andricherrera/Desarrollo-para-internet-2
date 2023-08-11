<!doctype html>
<html lang="es-MX">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CRUD con PHP </title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</head>
<body>
<?php
	if (isset($_GET['id'])){
		$id=intval($_GET['id']);
	} else {
		header("location:index.php");
	}
?>

<?php
				
				include ("database.php");
				$estudiante= new Database();
				
				if(isset($_POST) && !empty($_POST)){
					$nombre = $estudiante->sanitize($_POST['nombre']);
					$apellido = $estudiante->sanitize($_POST['apellido']);
					
					$direccion = $estudiante->sanitize($_POST['direccion']);
					
					$id_estudiante=intval($_POST['id']);
					$res = $estudiante->update($nombre, $apellido, $direccion, $id);
					if($res){
						$message= "Datos actualizados con éxito";
						$class="alert alert-success";
						
					}else{
						$message="No se pudieron actualizar los datos";
						$class="alert alert-danger";
					}
					
					?>
				<div class="<?php echo $class?>">
				  <?php echo $message;?>
				</div>	
					<?php
				}
				$datos_estudiante=$estudiante->single_record($id);
			?>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Editar <b>Estudiante</b></h2></div>
                    <div class="col-sm-4">
                        <a href="index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
			<div class="row">
				<form method="post">
				<div class="col-md-6">
					<label>Nombres:</label>
					<input type="text" name="nombre" id="nombre" class='form-control' maxlength="100" required  value="<?php echo $datos_estudiante->nombre;?>">
					<input type="hidden" name="id" id="id" class='form-control' maxlength="100"   value="<?php echo $datos_estudiante->id;?>">
				</div>
				<div class="col-md-6">
					<label>Apellidos:</label>
					<input type="text" name="apellido" id="apellido" class='form-control' maxlength="100" required value="<?php echo $datos_estudiante->apellido;?>">
				</div>
				<div class="col-md-12">
					<label>Dirección:</label>
					<textarea  name="direccion" id="direccion" class='form-control' maxlength="255" required><?php echo $datos_estudiante->direccion;?></textarea>
				</div>
				
				
				<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-success">Actualizar datos</button>
				</div>
				</form>
			</div>
        </div>
    </div>     
</body>
</html>
