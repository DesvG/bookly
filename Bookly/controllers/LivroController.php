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
  Descritivo: Controlador de Livros com suporte a imagens.
**********************************************************************/

/*
 * O QUE TEM: Métodos index, create, edit, delete e integração com Model Categoria.
 * O QUE FAZ: Valida os campos (incluindo URL da imagem) e gerencia o fluxo de dados.
 * O QUE FOI USADO: Validação de tipos (floatval, intval), header() redirect.
 */

require_once __DIR__ . '/../models/Livro.php';
require_once __DIR__ . '/../models/Categoria.php';

class LivroController {
    private $model;
    private $categoriaModel;

    public function __construct() {
        $this->model = new Livro();
        $this->categoriaModel = new Categoria();
    }

    public function index() {
        $livros = $this->model->read();
        require __DIR__ . '/../views/livros/index_livro.php';
    }

    public function create() {
        $categorias = $this->categoriaModel->read();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = trim($_POST['nome'] ?? '');
            $autor = trim($_POST['autor'] ?? '');
            $descricao = trim($_POST['descricao'] ?? '');
            $valor = floatval($_POST['valor'] ?? 0);
            $imagem = trim($_POST['imagem'] ?? '');
            $categoria_id = intval($_POST['categoria_id'] ?? 0);

            if (!empty($nome) && !empty($autor) && $valor > 0 && $categoria_id > 0) {
                $this->model->create($nome, $autor, $descricao, $valor, $imagem, $categoria_id);
                header('Location: index.php?page=livros');
                exit;
            }
        }
        require __DIR__ . '/../views/livros/create_livro.php';
    }

    public function edit($id) {
        $livro = $this->model->readOne($id);
        $categorias = $this->categoriaModel->read();

        if (!$livro) {
            header('Location: index.php?page=livros');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = trim($_POST['nome'] ?? '');
            $autor = trim($_POST['autor'] ?? '');
            $descricao = trim($_POST['descricao'] ?? '');
            $valor = floatval($_POST['valor'] ?? 0);
            $imagem = trim($_POST['imagem'] ?? '');
            $categoria_id = intval($_POST['categoria_id'] ?? 0);

            if (!empty($nome) && !empty($autor) && $valor > 0 && $categoria_id > 0) {
                $this->model->update($id, $nome, $autor, $descricao, $valor, $imagem, $categoria_id);
                header('Location: index.php?page=livros');
                exit;
            }
        }
        require __DIR__ . '/../views/livros/edit_livro.php';
    }

    public function delete($id) {
        $this->model->delete($id);
        header('Location: index.php?page=livros');
        exit;
    }
}