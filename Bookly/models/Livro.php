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
  Descritivo: Modelo CRUD da tabela livros com JOIN de categorias.
**********************************************************************/

/*
 * O QUE TEM: Métodos CRUD com suporte ao campo 'imagem'.
 * O QUE FAZ: Gerencia os dados do acervo e recupera o nome da categoria via JOIN.
 * O QUE FOI USADO: PDO, INNER JOIN, Aliasing SQL (categoria_nome).
 */

require_once __DIR__ . '/../config/database.php';

class Livro {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function read() {
        $sql = "SELECT l.*, c.nome AS categoria_nome 
                FROM livros l 
                JOIN categorias c ON l.categoria_id = c.id 
                ORDER BY l.nome";
        return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readOne($id) {
        $stmt = $this->conn->prepare("SELECT * FROM livros WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nome, $autor, $descricao, $valor, $imagem, $categoria_id) {
        $stmt = $this->conn->prepare(
            "INSERT INTO livros (nome, autor, descricao, valor, imagem, categoria_id) 
             VALUES (?, ?, ?, ?, ?, ?)"
        );
        return $stmt->execute([$nome, $autor, $descricao, $valor, $imagem, $categoria_id]);
    }

    public function update($id, $nome, $autor, $descricao, $valor, $imagem, $categoria_id) {
        $stmt = $this->conn->prepare(
            "UPDATE livros SET nome=?, autor=?, descricao=?, valor=?, imagem=?, categoria_id=? WHERE id=?"
        );
        return $stmt->execute([$nome, $autor, $descricao, $valor, $imagem, $categoria_id, $id]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM livros WHERE id = ?");
        return $stmt->execute([$id]);
    }
}