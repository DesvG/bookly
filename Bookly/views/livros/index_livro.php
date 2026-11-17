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
  Descritivo: Visão de acervo de livros em formato de grid premium.
**********************************************************************/

/*
 * O QUE TEM: Layout em grid de cards, com imagem da capa, overlay de autor e botões.
 * O QUE FAZ: Exibe os livros de forma imersiva e visual.
 * O QUE FOI USADO: Foreach PHP, htmlspecialchars (segurança), mb_strimwidth (limitar texto), funções nativas de formatação de moeda.
 */
require __DIR__ . '/../includes/header.php'; ?>

<div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 2rem;">
    <h2>Acervo Bookly</h2>
    <a href="index.php?page=livros&action=create" class="btn">+ Adicionar Obra</a>
</div>

<div class="grid-livros">
    <?php foreach ($livros as $livro): ?>
        <div class="card-livro">
            <div class="card-img-wrapper">
                <?php if (!empty($livro['imagem'])): ?>
                    <img src="<?= htmlspecialchars($livro['imagem']) ?>" alt="Capa de <?= htmlspecialchars($livro['nome']) ?>">
                <?php else: ?>
                    <div style="position:absolute; top:0; left:0; width:100%; height:100%; display:flex; align-items:center; justify-content:center; background:var(--evergreen); color:var(--tan); font-family:'Playfair Display'; padding: 2rem; text-align:center; font-size: 1.2rem;">
                        <?= htmlspecialchars($livro['nome']) ?>
                    </div>
                <?php endif; ?>

                <div class="card-overlay">
                    <span>Autor</span>
                    <strong><?= htmlspecialchars($livro['autor']) ?></strong>
                </div>
            </div>

            <div class="card-content">
                <span class="card-cat"><?= htmlspecialchars($livro['categoria_nome']) ?></span>
                <h3 class="card-title"><?= htmlspecialchars($livro['nome']) ?></h3>
                <p style="font-size: 0.85rem; color: #666; margin-bottom: 1rem; line-height: 1.4;">
                    <?= mb_strimwidth(htmlspecialchars($livro['descricao']), 0, 80, "...") ?>
                </p>
                <div class="card-price">R$ <?= number_format($livro['valor'], 2, ',', '.') ?></div>

                <div class="card-actions">
                    <a href="index.php?page=livros&action=edit&id=<?= $livro['id'] ?>">Editar</a>
                    <a href="index.php?page=livros&action=delete&id=<?= $livro['id'] ?>" class="delete" onclick="return confirm('Remover esta obra do acervo?')">Excluir</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php require __DIR__ . '/../includes/footer.php'; ?>