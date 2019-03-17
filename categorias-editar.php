<?php require_once 'cabecalho.php' ?>
<?php require_once("autoload.php"); ?>
<?php
    $id = $_GET["id"];
    $category = new Category();
    $categoria = $category->findById($id);
?>
<div class="row">
    <div class="col-md-12">
        <h2>Editar Categoria</h2>
    </div>
</div>
<form action="categorias-editar-post.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="form-group">
                <label for="nome">Nome da Categoria</label>
                <input type="text" name="nome" value="<?= $categoria["nome"] ?>"
                       class="form-control" placeholder="Nome da Categoria">
            </div>
            <input type="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>
<?php require_once 'rodape.php' ?>
