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
    // variables vacias
    $nombreErr = $emailErr = $telefonoErr= $direccionErr = "";  
    $nombre = $email = $telefono= $direccion = "";  
      
    //Valida el valor de los inputs
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
          
    //Validacion de String  
        if (empty($_POST["nombre"])) {  
             $nombreErr = "Se requiere el nombre"; 
             $class="text-danger"; 
        } else {  
            $nombre = input_data($_POST["nombre"]);  
                
                if (!preg_match("/^[a-zA-Z ]*$/",$nombre)) {  
                    $nombreErr = "Solo letras y espacios"; 
                    $class="text-danger"; 
                }  
        }  
        if (empty($_POST["direccion"])) {  
            $direccionErr = "Se requiere la direccion";
            $class="text-danger";  
       } else {  
           $direccion = input_data($_POST["direccion"]);  
               
               if (!preg_match("/^[A-Za-z0-9]*$/",$direccion)) {  
                   $direccionErr = "Solo letras, numeros y espacios";
                   $class="text-danger";  
               }  
       }  
          
        //Validacion de Email  
        if (empty($_POST["email"])) {  
                $emailErr = "Se requiere el email";
                $class="text-danger";  
        } else {  
                $email = input_data($_POST["email"]);  
                
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
                    $emailErr = "EMAIL Invalido";
                    $class="text-danger";  
                }  
         }  
        
        //Validacion de Numeros  
        if (empty($_POST["telefono"])) {  
                $telefonoErr = "Se requiere telefono";
                $class="text-danger";  
        } else {  
                $telefono= input_data($_POST["telefono"]);
                $class="text-danger";  
                
                if (!preg_match ("/^[0-9]*$/", $telefono) ) {  
                $telefonoErr = "Solo numeros.";
                $class="text-danger";  
                }  
            
            if (strlen ($telefono) != 10) {  
                $telefonoErr = "Solo 10 digitos.";
                $class="text-danger";  
                }  
        }  
        
    }  
    function input_data($data) {  
      $data = trim($data);  
      $data = stripslashes($data);  
      $data = htmlspecialchars($data);  
      return $data;  
    }  
    ?>  

	<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Formulario de Ejemplo</h2></div>
                    
                </div>
            </div> 
            <br><br>  
			<div class="row">
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
				<div class="col-md-12">
					<label>Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class='form-control'>
                    <span class="<?php echo $class?>"> <?php echo $nombreErr; ?> </span>
                    
				</div>
				<div class="col-md-6">
					<label>Email:</label>
                    <input type="text" name="email" id="email" class='form-control' >
                    <span class="<?php echo $class?>"> <?php echo $emailErr; ?> </span>
                     
				</div>
				<div class="col-md-6">
					<label>Telefono:</label>
                    <input type="text" name="telefono" id="telefono" class='form-control' >
                    <span class="<?php echo $class?>"> <?php echo $telefonoErr; ?> </span>
                     
				</div>
				<div class="col-md-12">
					<label>Dirección:</label>
                    <textarea  name="direccion" id="direccion" class='form-control' ></textarea>
                    <span class="<?php echo $class?>"> <?php echo $direccionErr; ?> </span>
                     
				</div>
				
				<div class="col-md-12 pull-right">
				<hr>
					<button name="submit" value="Submit" class="btn btn-primary">Guardar datos</button>
				</div>
				</form>
			</div>
        </div>
    </div>
    <div class="container">
        <div class="col-md-12">
            <?php  
            if(isset($_POST['submit'])) {  
            if($nombreErr == "" && $emailErr == "" && $telefonoErr == "" && $direccionErr == "" ) {  
                echo "<h3 color = #FF0001> <b>Usuario Registrado.</b> </h3>";  
                echo "<h2>Datos Enviados:</h2>";  
                echo "Nombre: " .$nombre;  
                echo "<br>";  
                echo "Email: " .$email;  
                echo "<br>";  
                echo "Telefono: " .$telefono;  
                echo "<br>"; 
                echo "Direccion: " .$direccion;  
                echo "<br>";   
            
            } else {  
                echo "<h3> <b>Los Datos no se llenaron correctente.</b> </h3>";  
            }  
            }  
            ?>  
        </div>
    </div>

</body>
</html>
