<?php require_once 'cabecalho.php' ?>
<?php require_once 'autoload.php' ?>
<?php
    try {
        $produto = new Product();
        $produtos = $produto->findAll();
    } catch(\Exception $exception) {
        HandlerException::handler($exception);
    }
?>
<div class="row">
    <div class="col-md-12">
        <h2>Produtos</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <a href="produtos-criar.php" class="btn btn-info btn-block">Crair Novo Produto</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php if (count($produtos) == 0): ?>
            <div>
                <p class=""><strong>Nenhum registro encontrado!</strong>    </p>
            </div>
        <?php else: ?>
            <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Categoria</th>
                <th class="acao">Editar</th>
                <th class="acao">Excluir</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($produtos as $produto): ?>
                <tr>
                    <td><?= $produto["id"] ?></td>
                    <td><?= $produto["nome"] ?></td>
                    <td>R$ <?= $produto["preco"] ?></td>
                    <td><?= $produto["quantidade"] ?></td>
                    <td><?= $produto["categoria_nome"] ?></td>
                    <td><a href="/produtos-editar.php?id=<?= $produto["id"] ?>"
                           class="btn btn-info">Editar</a></td>
                    <td><a href="/produtos-deletar-post.php?id=<?= $produto["id"] ?>"
                           class="btn btn-danger">Excluir</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif ?>
    </div>
</div>
<?php require_once 'rodape.php' ?>
