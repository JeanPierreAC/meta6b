<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Requiere los archivos de configuración y el modelo
require_once $_SERVER['DOCUMENT_ROOT'] . '/meta6b/config/database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/meta6b/app/models/Sexo.php';

class SexoController {
    private $sexo;
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->sexo = new Sexo($this->db);
    }

    // Mostrar todos los sexos
    public function index() {
        $sexos = $this->sexo->read();
        require_once '../app/views/sexo/index.php';
    }

    // Crear un nuevo sexo
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['nombre']) && !empty($_POST['nombre'])) {
                $this->sexo->nombre = $_POST['nombre'];
                if ($this->sexo->create()) {
                    header("Location: /meta6b/sexo/index"); // Redirige a la lista de sexos
                    exit;
                } else {
                    echo "Error al crear el sexo.";
                }
            } else {
                echo "Faltan datos en el formulario.";
            }
        } else {
            require_once '../app/views/sexo/create.php';  // Mostrar formulario de creación
        }
    }

    // Editar un sexo existente
    public function edit($id) {
        $this->sexo->id = $id;
        $sexo = $this->sexo->readOne();

        if (!$sexo) {
            die("Error: No se encontró el registro.");
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->sexo->nombre = $_POST['nombre'];
            if ($this->sexo->update()) {
                header("Location: /meta6b/sexo/index");  // Redirige a la lista de sexos
                exit;
            } else {
                echo "Error al actualizar el sexo.";
            }
        }

        require_once '../app/views/sexo/edit.php';  // Mostrar formulario de edición
    }

    // Eliminar un sexo
    public function delete($id) {
        $this->sexo->id = $id;
        $sexo = $this->sexo->readOne();

        if (!$sexo) {
            die("Error: No se encontró el registro.");
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->sexo->delete()) {
                header("Location: /meta6b/sexo/index");  // Redirige a la lista de sexos
                exit;
            } else {
                echo "Error al eliminar el sexo.";
            }
        }

        require_once '../app/views/sexo/delete.php';  // Mostrar formulario de eliminación
    }
}

// Manejo de la acción en la URL
if (isset($_GET['action'])) {
    $controller = new SexoController();

    switch ($_GET['action']) {
        case 'create':
            $controller->create();
            break;
        case 'edit':
            if (isset($_GET['id'])) {
                $controller->edit($_GET['id']);
            } else {
                echo "No se especificó el ID para editar.";
            }
            break;
        case 'delete':
            if (isset($_GET['id'])) {
                $controller->delete($_GET['id']);
            } else {
                echo "No se especificó el ID para eliminar.";
            }
            break;
        default:
            echo "Acción no válida.";
            break;
    }
} else {
    echo "No se especificó ninguna acción.";
}

?>
