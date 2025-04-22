<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
// En SexoController.php
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

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['nombre'])) {
                $this->sexo->nombre = $_POST['nombre'];
                if ($this->sexo->create()) {
                    // Redirigir a la página principal después de crear el sexo
                    header('Location: /meta6b/public/sexo');
                    exit;
                } else {
                    // Redirigir con un mensaje de error si falla
                    header('Location: /meta6b/public/sexo?msg=error');
                    exit;
                }
            } else {
                echo "Faltan datos";
            }
        } else {
            echo "Método incorrecto";  // Verificar que el formulario no se envíe con GET
        }
    }

    public function edit($id) {
        // Pasar el ID al modelo antes de llamar a readOne()
        $this->sexo->id = $id;
        $sexo = $this->sexo->readOne();

        if (!$sexo) {
            die("Error: No se encontró el registro.");
        }

        require_once '../app/views/sexo/edit.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['nombre']) && isset($_POST['id'])) {
                $this->sexo->nombre = $_POST['nombre'];
                $this->sexo->id = $_POST['id'];
                if ($this->sexo->update()) {
                    // Redirigir a la página principal después de actualizar el sexo
                    header('Location: /meta6b/public/sexo');
                    exit;
                } else {
                    // Redirigir con un mensaje de error si falla
                    header('Location: /meta6b/public/sexo?msg=error');
                    exit;
                }
            } else {
                echo "Faltan datos";
            }
        } else {
            echo "Método incorrecto";  // Verificar que el formulario no se envíe con GET
        }
    }

    public function eliminar($id) {
        // Pasar el ID al modelo antes de llamar a readOne()
        $this->sexo->id = $id;
        $sexo = $this->sexo->readOne();

        if (!$sexo) {
            die("Error: No se encontró el registro.");
        }

        require_once '../app/views/sexo/delete.php';
    }

    // Eliminar un sexo
    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['id'])) {
                $this->sexo->id = $_POST['id'];
                if ($this->sexo->delete()) {
                    // Redirigir a la página principal después de eliminar el sexo
                    header('Location: /meta6b/public/sexo');
                    exit;
                } else {
                    // Redirigir con un mensaje de error si falla
                    header('Location: /meta6b/public/sexo?msg=error');
                    exit;
                }
            } else {
                echo "Faltan datos";
            }
        } else {
            echo "Método incorrecto";  // Verificar que el formulario no se envíe con GET
        }
    }
}

// Manejo de la acción en la URL
if (isset($_GET['action'])) {
    $controller = new SexoController();

    switch ($_GET['action']) {
        case 'create':
            $controller->create();
            break;
        case 'update':
            $controller->update();
            break;
        case 'delete':
            $controller->delete();
            break;
        default:
            echo "Acción no válida.";
            break;
    }
} else {
    echo "";
}
?>

