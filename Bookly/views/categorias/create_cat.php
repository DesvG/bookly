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
  Descritivo: Visão de criação de nova categoria.
**********************************************************************/

/*
 * O QUE TEM: Formulário de cadastro com campo único (Nome) e botões de ação.
 * O QUE FAZ: Envia a requisição POST para o CategoriaController::create().
 * O QUE FOI USADO: HTML5 (required), classes CSS de formulário e botão.
 */
require __DIR__ . '/../includes/header.php'; ?>

<h2>Nova Categoria</h2>
<form method="post">
    <label>Nome da Categoria
        <input type="text" name="nome" required placeholder="Ex: Manuscritos Históricos">
    </label>

    <div style="margin-top: 2rem; display: flex; gap: 1rem;">
        <button type="submit" class="btn" style="flex: 1;">Salvar Categoria</button>
        <a href="index.php?page=categorias" style="flex: 1; text-align: center; padding: 0.9rem; color: var(--charcoal); text-decoration: none; font-weight: 600; border-radius: 8px;">Cancelar</a>
    </div>
</form>

<?php require __DIR__ . '/../includes/footer.php'; ?>