<?php require_once 'cabecalho.php' ?>
<?php require_once 'autoload.php' ?>
<?php
   $id =  $_GET["id"];
   $category = new Category();
   $categoria = $category->findById($id);

   $product = new Product();
   $products = $product->findAllByCategoriaId($id);
?>
<div class="row">
    <div class="col-md-12">
        <h2>Detalhe da Categoria</h2>
    </div>
</div>

<dl>
    <dt>ID</dt>
    <dd><?php echo $categoria['id'] ?></dd>
    <dt>Nome</dt>
    <dd><?php echo $categoria['nome'] ?></dd>
    <dt>Produtos</dt>
    <dd>
        <ul>
            <?php for($indice = 0; $indice < count($products); $indice++): ?>

                <li>
                    <a href="/produtos-editar.php?id=<?php echo $products[$indice]['id'] ?>">
                        <?= $products[$indice]["nome"] ?>
                    </a>
                </li>
            <?php endfor; ?>
            <?php if (count($products) == 0): ?>
                <p>Nenhum produto cadastro nessa categoria.</p>
            <?php endif ?>
        </ul>
    </dd>
</dl>
<?php require_once 'rodape.php' ?>
