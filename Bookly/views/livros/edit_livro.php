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
  Descritivo: Visão de edição de livro.
**********************************************************************/

/*
 * O QUE TEM: Formulário preenchido com os dados atuais.
 * O QUE FAZ: Permite alterar os dados e salvar via POST.
 * O QUE FOI USADO: htmlspecialchars para evitar XSS, validação HTML5.
 */
require __DIR__ . '/../includes/header.php'; ?>

<h2>Editar Obra</h2>
<form method="post">
    <label>Nome da Obra
        <input type="text" name="nome" value="<?= htmlspecialchars($livro['nome']) ?>" required>
    </label>
    <label>Autor
        <input type="text" name="autor" value="<?= htmlspecialchars($livro['autor']) ?>" required>
    </label>
    <label>URL da Capa (Imagem)
        <input type="url" name="imagem" value="<?= htmlspecialchars($livro['imagem']) ?>" placeholder="https://...">
    </label>
    <label>Categoria
        <select name="categoria_id" required>
            <?php foreach ($categorias as $cat): ?>
                <option value="<?= $cat['id'] ?>" <?= $cat['id'] == $livro['categoria_id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($cat['nome']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label>
    <label>Valor Estimado (R$)
        <input type="number" step="0.01" name="valor" value="<?= htmlspecialchars($livro['valor']) ?>" required>
    </label>
    <label>Descrição / História da Obra
        <textarea name="descricao"><?= htmlspecialchars($livro['descricao']) ?></textarea>
    </label>
    
    <div style="margin-top: 2rem; display: flex; gap: 1rem;">
        <button type="submit" class="btn" style="flex: 1;">Atualizar Obra</button>
        <a href="index.php?page=livros" style="flex: 1; text-align: center; padding: 0.9rem; color: var(--charcoal); text-decoration: none; font-weight: 600; border-radius: 8px;">Cancelar</a>
    </div>
</form>

<?php require __DIR__ . '/../includes/footer.php'; ?>