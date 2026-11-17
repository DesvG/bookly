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
  Descritivo: Visão de listagem de categorias do acervo Bookly.
**********************************************************************/

/*
 * O QUE TEM: Tabela estilizada com a listagem de categorias e botões de ação.
 * O QUE FAZ: Exibe as categorias cadastradas e permite navegar para edição ou exclusão.
 * O QUE FOI USADO: PHP foreach, htmlspecialchars para segurança, estilos inline e classes do style.css.
 */
require __DIR__ . '/../includes/header.php'; ?>

<div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 2rem;">
    <h2>Categorias do Acervo</h2>
    <a href="index.php?page=categorias&action=create" class="btn">+ Nova Categoria</a>
</div>

<table style="width: 100%; border-collapse: collapse; background: var(--white); border-radius: 12px; overflow: hidden; box-shadow: var(--shadow);">
    <thead style="background: var(--evergreen); color: var(--floral);">
        <tr>
            <th style="padding: 1rem; text-align: left;">ID</th>
            <th style="padding: 1rem; text-align: left;">Nome</th>
            <th style="padding: 1rem; text-align: left;">Ações</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($categorias as $cat): ?>
        <tr style="border-bottom: 1px solid rgba(213, 183, 138, 0.3);">
            <td style="padding: 1rem;"><?= htmlspecialchars($cat['id']) ?></td>
            <td style="padding: 1rem; font-weight: 600;"><?= htmlspecialchars($cat['nome']) ?></td>
            <td style="padding: 1rem;">
                <a href="index.php?page=categorias&action=edit&id=<?= $cat['id'] ?>" style="color: var(--tan); font-weight: 600; text-decoration: none; margin-right: 1rem;">Editar</a>
                <a href="index.php?page=categorias&action=delete&id=<?= $cat['id'] ?>" style="color: #d9534f; font-weight: 600; text-decoration: none;" onclick="return confirm('Excluir esta categoria? Livros vinculados podem ser afetados.')">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php require __DIR__ . '/../includes/footer.php'; ?>