<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Incluir las dependencias necesarias
require_once $_SERVER['DOCUMENT_ROOT'] . '/meta6b/config/database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/meta6b/app/models/Sexo.php';

class SexoController {
    private $sexo;
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->sexo = new Sexo($this->db);
    }

    public function index() {
        $sexos = $this->sexo->read();
        require_once '../app/views/sexo/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['nombre'])) {
                $this->sexo->nombre = $_POST['nombre'];
                if ($this->sexo->create()) {
                    header('Location: index.php?msg=created');
                    exit;
                } else {
                    echo "Error al crear el sexo";
                }
            } else {
                echo "Faltan datos";
            }
        } else {
            echo "Método incorrecto";
        }
    }

    public function edit($id) {
        $this->sexo->id = $id;
        $sexo = $this->sexo->readOne();

        if (!$sexo) {
            die("Error: No se encontró el registro.");
        }

        require_once '../app/views/sexo/edit.php';
    }

    public function eliminar($id) {
        $this->sexo->id = $id;
        $sexo = $this->sexo->readOne();

        if (!$sexo) {
            die("Error: No se encontró el registro.");
        }

        require_once '../app/views/sexo/delete.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['nombre']) && isset($_POST['id'])) {
                $this->sexo->nombre = $_POST['nombre'];
                $this->sexo->id = $_POST['id'];
                if ($this->sexo->update()) {
                    header('Location: index.php?msg=updated');
                    exit;
                } else {
                    echo "Error al actualizar el sexo";
                }
            } else {
                echo "Faltan datos";
            }
        } else {
            echo "Método incorrecto";
        }
    }

    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['id'])) {
                $this->sexo->id = $_POST['id'];
                if ($this->sexo->delete()) {
                    header('Location: index.php?msg=deleted');
                    exit;
                } else {
                    header('Location: index.php?msg=error');
                    exit;
                }
            } else {
                echo "Faltan datos";
            }
        } else {
            echo "Método incorrecto";
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
    echo "No se especificó ninguna acción.";
}
?>
