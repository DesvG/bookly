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
  Descritivo: Front Controller roteador da aplicação Bookly.
**********************************************************************/

/*
 * O QUE TEM: Switch de rotas baseado em parâmetros GET (page, action, id).
 * O QUE FAZ: Instancia o controlador correto e executa a ação desejada.
 * O QUE FOI USADO: PHP puro, operador de coalescência nula (??), require_once.
 */

$page   = $_GET['page']   ?? 'livros';
$action = $_GET['action'] ?? 'index';
$id     = isset($_GET['id']) ? intval($_GET['id']) : null;

switch ($page) {
    case 'categorias':
        require_once __DIR__ . '/../controllers/CategoriaController.php';
        $controller = new CategoriaController();
        break;
    case 'livros':
    default:
        require_once __DIR__ . '/../controllers/LivroController.php';
        $controller = new LivroController();
        break;
}

switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'edit':
        if ($id) $controller->edit($id);
        else header("Location: index.php?page={$page}");
        break;
    case 'delete':
        if ($id) $controller->delete($id);
        else header("Location: index.php?page={$page}");
        break;
    case 'index':
    default:
        $controller->index();
        break;
}