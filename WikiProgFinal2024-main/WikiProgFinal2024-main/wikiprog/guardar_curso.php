<?php
// Obtener los datos del formulario
$titulo_curso = $_POST['titulo_curso'];
$descripcion = $_POST['descripcion'];
$categoria_id = $_POST['categoria'];
$titulos_leccion = $_POST['titulo_leccion'];
$contenidos_leccion = $_POST['contenido_leccion'];

// Conexión a la base de datos
$conexion = new mysqli('localhost', 'root', '', 'wikiprog');
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Verificar si la categoría existe
$sql_categoria = "SELECT categoria_id FROM categoria WHERE categoria_id = ?";
$stmt_categoria = $conexion->prepare($sql_categoria);
$stmt_categoria->bind_param("i", $categoria_id);
$stmt_categoria->execute();
$stmt_categoria->store_result();

if ($stmt_categoria->num_rows == 0) {
    echo "Error: La categoría seleccionada no existe.";
    $stmt_categoria->close();
    $conexion->close();
    exit();
}
$stmt_categoria->close();

// Iniciar una transacción
$conexion->begin_transaction();

try {
    // Insertar los datos en la tabla curso
    $sql_curso = "INSERT INTO curso (titulo_curso, descripcion, categoria_id) VALUES (?, ?, ?)";
    $stmt_curso = $conexion->prepare($sql_curso);
    if (!$stmt_curso) {
        throw new Exception("Error en la preparación de la consulta de curso: " . $conexion->error);
    }
    $stmt_curso->bind_param("ssi", $titulo_curso, $descripcion, $categoria_id);
    $stmt_curso->execute();
    if ($stmt_curso->errno) {
        throw new Exception("Error en la ejecución de la consulta de curso: " . $stmt_curso->error);
    }

    // Obtener el ID del curso recién insertado
    $curso_id = $conexion->insert_id;

    // Insertar los datos en la tabla lección
    $sql_leccion = "INSERT INTO leccion (curso_id, titulo_leccion, contenido) VALUES (?, ?, ?)";
    $stmt_leccion = $conexion->prepare($sql_leccion);
    if (!$stmt_leccion) {
        throw new Exception("Error en la preparación de la consulta de lección: " . $conexion->error);
    }

    // Iterar sobre las lecciones y guardarlas
    foreach ($titulos_leccion as $index => $titulo_leccion) {
        $contenido_leccion = $contenidos_leccion[$index];
        $stmt_leccion->bind_param("iss", $curso_id, $titulo_leccion, $contenido_leccion);
        $stmt_leccion->execute();
        if ($stmt_leccion->errno) {
            throw new Exception("Error en la ejecución de la consulta de lección: " . $stmt_leccion->error);
        }
    }

    // Confirmar la transacción
    $conexion->commit();
    //echo "Curso y lecciones guardados exitosamente.";
    // Redirigir a otra página si es necesario
    header("Location: index.php");
} catch (Exception $e) {
    // Revertir la transacción en caso de error
    $conexion->rollback();
    echo "Error al guardar el curso y las lecciones: " . $e->getMessage();
}

// Cerrar las conexiones
if (isset($stmt_curso)) {
    $stmt_curso->close();
}
if (isset($stmt_leccion)) {
    $stmt_leccion->close();
}
$conexion->close();
?>
