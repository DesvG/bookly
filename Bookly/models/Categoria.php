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
  Descritivo: Modelo CRUD da tabela categorias.
**********************************************************************/

/*
 * O QUE TEM: Métodos read, readOne, create, update e delete.
 * O QUE FAZ: Executa as queries SQL referentes às categorias.
 * O QUE FOI USADO: PDO Prepared Statements (prevenção de SQL Injection).
 */

require_once __DIR__ . '/../config/database.php';

class Categoria {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function read() {
        return $this->conn->query("SELECT * FROM categorias ORDER BY nome")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readOne($id) {
        $stmt = $this->conn->prepare("SELECT * FROM categorias WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nome) {
        $stmt = $this->conn->prepare("INSERT INTO categorias (nome) VALUES (?)");
        return $stmt->execute([$nome]);
    }

    public function update($id, $nome) {
        $stmt = $this->conn->prepare("UPDATE categorias SET nome = ? WHERE id = ?");
        return $stmt->execute([$nome, $id]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM categorias WHERE id = ?");
        return $stmt->execute([$id]);
    }
}