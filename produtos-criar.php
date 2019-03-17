<?php require_once 'cabecalho.php' ?>
<?php require_once 'autoload.php' ?>
<?php
    try {
        $category = new Category();
        $categories = $category->findAll();
    } catch(\Exception $exception) {
        HandlerException::handler($exception);
    }
?>
<div class="row">
    <div class="col-md-12">
        <h2>Criar Nova Produto</h2>
    </div>
</div>
<?php if (count($categories) == 0): ?>
    <div class="alert alert-danger">
        <strong>Para continuar é preciso existir um categoria. Clique no <a href="categorias-criar.php">link</a> para cadastrar.</strong>
    </div>
    <input type="submit" class="btn btn-success btn-block" value="Salvar">
<?php endif ?>
<form action="produtos-criar-post.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="nome">Nome do Produto</label>
                <input type="text" name="nome"
                       class="form-control" placeholder="Nome do Produto" required>
            </div>
            <div class="form-group">
                <label for="preco">Preço da Produto</label>
                <input type="number" name="preco"
                       step="0.01" min="0" class="form-control" placeholder="Preço do Produto" required>
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade do Produto</label>
                <input type="number" name="quantidade"
                       min="0" class="form-control" placeholder="Quantidade do Produto" required>
            </div>
            <div class="form-group">
                <label for="nome">Categoria do Produto</label>
                <select name="categoria_id" class="form-control">
                    <option value="">Selecione um categoria</option>
                <?php foreach ($categories as $categoria): ?>
                    <option value="<?= $categoria["id"] ?>"><?= $categoria["nome"] ?></option>
                <?php endforeach; ?>
                </select>
            </div>
            <?php if (count($categories) > 0): ?>
            <input type="submit" class="btn btn-success btn-block" value="Salvar">
            <?php endif ?>

        </div>
    </div>
</form>

<?php require_once 'rodape.php' ?>
