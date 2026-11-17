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
  Descritivo: Visão de criação de livro com campo de imagem.
**********************************************************************/

/*
 * O QUE TEM: Formulário de cadastro estilizado.
 * O QUE FAZ: Envia os dados para o Controller criar o registro.
 * O QUE FOI USADO: Tags HTML5 com validação nativa (required, type="url").
 */
require __DIR__ . '/../includes/header.php'; ?>

<h2>Cadastrar Obra Rara</h2>
<form method="post">
    <label>Nome da Obra
        <input type="text" name="nome" required placeholder="Ex: First Folio">
    </label>
    <label>Autor
        <input type="text" name="autor" required placeholder="Ex: William Shakespeare">
    </label>
    <label>URL da Capa (Imagem)
        <input type="url" name="imagem" placeholder="https://exemplo.com/capa.jpg">
    </label>
    <label>Categoria
        <select name="categoria_id" required>
            <option value="">Selecione...</option>
            <?php foreach ($categorias as $cat): ?>
                <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['nome']) ?></option>
            <?php endforeach; ?>
        </select>
    </label>
    <label>Valor Estimado (R$)
        <input type="number" step="0.01" name="valor" required placeholder="0.00">
    </label>
    <label>Descrição / História da Obra
        <textarea name="descricao" placeholder="Detalhes sobre a edição, estado, etc..."></textarea>
    </label>
    
    <div style="margin-top: 2rem; display: flex; gap: 1rem;">
        <button type="submit" class="btn" style="flex: 1;">Salvar no Acervo</button>
        <a href="index.php?page=livros" style="flex: 1; text-align: center; padding: 0.9rem; color: var(--charcoal); text-decoration: none; font-weight: 600; border-radius: 8px;">Cancelar</a>
    </div>
</form>

<?php require __DIR__ . '/../includes/footer.php'; ?>