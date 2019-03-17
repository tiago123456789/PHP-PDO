<?php require_once 'cabecalho.php' ?>
<?php require_once 'autoload.php' ?>
<?php
    $id = $_GET["id"];

    $category = new Category();
    $categorias = $category->findAll();

    $product = new Product();
    $produto = $product->findById($id);
?>
<div class="row">
    <div class="col-md-12">
        <h2>Editar Nova Categoria</h2>
    </div>
</div>

<form action="/produtos-editar-post.php" method="post">
    <div class="row">
        <input type="hidden" name="id" value="<?= $produto["id"] ?>" />
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="nome">Nome do Produto</label>
                <input type="text" name="nome"
                       value="<?= $produto["nome"] ?>" class="form-control" placeholder="Nome do Produto" required>
            </div>
            <div class="form-group">
                <label for="preco">Preço da Produto</label>
                <input type="number" name="preco"
                       value="<?= $produto["preco"] ?>" step="0.01" min="0" class="form-control" placeholder="Preço do Produto" required>
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade do Produto</label>
                <input type="number" name="quantidade"
                       value="<?= $produto["quantidade"] ?>" min="0" class="form-control" placeholder="Quantidade do Produto" required>
            </div>
            <div class="form-group">
                <label for="nome">Categoria do Produto</label>
                <select name="categoria_id" class="form-control">
                    <option value="">Selecione um categoria</option>
                    <?php foreach ($categorias as $categoria): ?>
                        <option value="<?= $categoria["id"] ?>"
                                selected="<?= ($categoria.id == $produto.categoria_id) ?>">
                            <?= $categoria["nome"] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <input type="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>

<?php require_once 'rodape.php' ?>
