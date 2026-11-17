<?php
/**********************************************************************
  Curso: Engenharia de Software
  Disciplina: Linguagem e Técnicas de Programação
  Professor: Flores
  Turma: ESOFT-2
  Componentes:
    26014883-2 - Arthur Martins Inacio
    26004871-2 - Derick Narresi
    26013191-2 - Giovanna Yoko Figueredo Durigan Nakai
    26009755-2 - Guilherme Massaro De Souza
    26008921-2 - Guivensley Guillaume
    26013021-2 - João Victor Vargas de Oliveira
    26007287-2 - Yago De Souza Rodrigues
    26014129-2 - Thiago das Neves Fernandes
    26013017-2 - Matheus Rodrigues Oliveira
  Data: 03 de Novembro de 2026
  Descritivo: Controlador de Categorias.
**********************************************************************/

/*
 * O QUE TEM: Métodos de roteamento da entidade Categoria.
 * O QUE FAZ: Recebe requisições, valida e insere/edita no banco, chamando as views.
 * O QUE FOI USADO: Superglobais $_POST, $_SERVER, redirecionamento com header().
 */

require_once __DIR__ . '/../models/Categoria.php';

class CategoriaController {
    private $model;

    public function __construct() {
        $this->model = new Categoria();
    }

    public function index() {
        $categorias = $this->model->read();
        require __DIR__ . '/../views/categorias/index_cat.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = trim($_POST['nome'] ?? '');
            if (!empty($nome)) {
                $this->model->create($nome);
                header('Location: index.php?page=categorias');
                exit;
            }
        }
        require __DIR__ . '/../views/categorias/create_cat.php';
    }

    public function edit($id) {
        $categoria = $this->model->readOne($id);
        if (!$categoria) {
            header('Location: index.php?page=categorias');
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = trim($_POST['nome'] ?? '');
            if (!empty($nome)) {
                $this->model->update($id, $nome);
                header('Location: index.php?page=categorias');
                exit;
            }
        }
        require __DIR__ . '/../views/categorias/edit_cat.php';
    }

    public function delete($id) {
        $this->model->delete($id);
        header('Location: index.php?page=categorias');
        exit;
    }
}