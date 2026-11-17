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
  Descritivo: Cabeçalho padrão com identidade visual Bookly.
**********************************************************************/

/*
 * O QUE TEM: Estrutura HTML inicial, inclusão de fontes e CSS, e menu de navegação.
 * O QUE FAZ: Fornece a base visual (Glassmorphism e logo) para todas as páginas.
 * O QUE FOI USADO: HTML5, Google Fonts, link CSS relativo.
 */
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookly — Acervo Raro</title>
    <link rel="stylesheet" href="/bookly/public/css/style.css">
</head>
<body>
<header>
    <nav>
        <a href="index.php?page=livros">Acervo</a>
        <a href="index.php?page=categorias">Categorias</a>
    </nav>
</header>
<main>