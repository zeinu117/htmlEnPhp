<?php
 
    function conexion(){
        $servidor = "localhost";
        $usuario = "root";
        $password = "";
        $db = "sistemasweb";
 
        return $conexion = mysqli_connect($servidor, $usuario, $password, $db);
       
 
    }
 
    $conexion = conexion();
 
    $sql = "SELECT id_tarea,id_fecha, tarea, estado  FROM t_tareas";
    $respuesta = mysqli_query($conexion, $sql);
 
    $cadenaTabla = "";
    $cadenaTabla = $cadenaTabla . '<br>'.'<table border="1" style="border-collapse:collapse" class="table table-dark table-striped">
                                    <thead>
                                        <th>Id</th>
                                        <th>tarea</th>
                                        <th>estado</th>
                                        <th>Eliminar</th>
                                    </thead>
                                    <tbody>';    
    while ($mostrar = mysqli_fetch_array($respuesta)){
        $cadenaTabla = $cadenaTabla . '<tr>
                                            <td>'. $mostrar['id_tarea'] . '</td>
                                            <td>'. $mostrar['tarea'] . '</td>
                                            <td><button class="btn btn-primary">sin terminar</button></td>
                                            <td><button class="btn btn-danger">Eliminar</button></td>
                                        </tr>';
                                            
    } 
    $cadenaTabla = $cadenaTabla . '</tbody></table>';
 
    
    $cadenaTabla = $cadenaTabla . '</tbody></table>';
    
    $tituloDePagina = '<h2 style="font-family: Style Script, cursive;"
    class="text-center">Manejo de cadenas con php a html</h2>' ;
 
    $descripcion = '<p style="font-family: Style Script, cursive;" class="text-center">
                        <strong> Se muestra la tabla tareas usando php y tag de html incrustados dentro de php y concatenados para
                        obtener la tabla como si fuera construida desde html con estilos.</strong>
                    </p>';
    $formulario = '
    <form action="" method="POST">
                            <label for="tarea">Escribe la tarea</label>
                            <textarea 
                                name="tarea" 
                                id="tarea" 
                                cols="30" 
                                rows="3"
                                required 
                                class="form-control"></textarea>
                            <br>
                            <button class="btn btn-primary">Agregar</button>
                            <br>
                        </form>
    ';
    echo $tituloDePagina . $descripcion .$formulario. $cadenaTabla;

    ?>
