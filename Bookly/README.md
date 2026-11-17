<!--
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
  Descritivo: Documentação do projeto Bookly (Sistema CRUD de Livros Raros).
**********************************************************************/
-->

# Bookly — Onde as grandes obras ganham vida

Olá! Seja bem-vindo ao **Bookly**.

Este é o nosso Trabalho Prático 2 da disciplina de Linguagem e Técnicas de Programação. Em vez de criarmos apenas mais um sistema genérico de cadastro, decidimos unir a robustez do PHP com um tema que nos apaixona: **o mercado de livros raros e primeiras edições mundialmente famosas**.

O Bookly não é só um CRUD; é uma vitrine digital pensada para dar o devido destaque a obras como o *First Folio* de Shakespeare ou os manuscritos de Da Vinci.

---

## 👥 Quem fez acontecer

Este projeto foi construído a várias mãos pelos integrantes da turma **ESOFT-2**:

*   26014883-2 - Arthur Martins Inacio
*   26004871-2 - Derick Narresi
*   26013191-2 - Giovanna Yoko Figueredo Durigan Nakai
*   26009755-2 - Guilherme Massaro De Souza
*   26008921-2 - Guivensley Guillaume
*   26013021-2 - João Victor Vargas de Oliveira
*   26007287-2 - Yago De Souza Rodrigues
*   26014129-2 - Thiago das Neves Fernandes
*   26013017-2 - Matheus Rodrigues Oliveira

---

## O que o sistema faz (e por que ele é especial)

Desenvolvemos um CRUD completo para gerenciar duas entidades principais: **Categorias** e **Livros** (com um relacionamento direto entre eles). Mas fomos além do básico:

*   **Design Editorial Imersivo:** Fugimos das tabelas cinzas e formulários engessados. O layout usa um conceito de biblioteca antiquária, com tipografia elegante (Playfair Display) e uma paleta de cores acolhedora (Charcoal, Evergreen, Tan e Floral White).
*   **Interações Premium:** O menu principal tem um efeito *Glassmorphism* (vidro fosco). Na listagem, os livros aparecem em *cards* 3D que se levantam ao passar o mouse e revelam o autor.
*   **Capa dos Livros:** Adicionamos um campo especial para a imagem da capa. É possível colar a URL de uma imagem real do livro, deixando o acervo visualmente rico.
*   **Segurança em Primeiro Lugar:** O sistema está blindado contra SQL Injection (usando PDO *Prepared Statements*) e ataques XSS (com escape de caracteres no HTML).

---

## Arquitetura

Para garantir que o código não virasse uma bagunça, dividimos o projeto usando o padrão de arquitetura **MVC (Model-View-Controller)**

A organização ficou assim:
* `config/`→ Guarda a classe de conexão com o banco de dados (PDO).
* `models/`→ Onde o "trabalho pesado" acontece. Classes que conversam diretamente com o MySQL.
* `controllers/`→ O cérebro da aplicação. Recebem as ações do usuário, validam os dados e decidem o que fazer.
* `views/`→ A parte visual. O HTML/PHP que o usuário vê (incluindo os componentes reutilizáveis de header e footer).
*  `public/→ Nosso ponto de entrada (`index.php`), os estilos (`style.css`) e as regras do servidor.

---
**Acesse o PhpÁdmin:** `http://localhost/phpmyadmin/index.php?route=/server/sql`
**Acesse o sistema:**  `http://localhost/bookly/public/index.php`.

## Estrutura de Pastas

bookly/
├── config/database.php
├── controllers/
│   ├── CategoriaController.php
│   └── LivroController.php
├── models/
│   ├── Categoria.php
│   └── Livro.php
├── views/
│   ├── includes/ (header e footer)
│   ├── categorias/ (listagem, cadastro e edição)
│   └── livros/ (listagem, cadastro e edição)
├── public/
│   ├── index.php
│   ├── .htaccess
│   └── css/style.css
├── database.sql
└── README.md

