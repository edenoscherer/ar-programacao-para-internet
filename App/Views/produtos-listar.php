<?php
include "head.php";
?>

<div class="container">
    <div class="row  justify-content-md-center">
        <div class="col-md-8 content-form">
            <div class="card">
                <div class="card-header">
                    Produtos
                    <span class="content-btn">
                        <a class="btn-link" href="cadastrar-produto" title="Cadastrar um novo produto">
                            Cadastrar
                        </a>
                    </span>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($error) && !empty($error)) {
                        echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                    }
                    ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Fabricante</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            /** @var \App\Entities\Produto[] $produtos */
                            foreach ($produtos as $produto) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $produto->getId() ?></th>
                                    <td><?php echo $produto->getNome() ?></td>
                                    <td><?php echo $produto->getFabricante() ?></td>
                                    <td>
                                        <a href="editar-produto?id=<?php echo $produto->getId(); ?>" title="Editar produto">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="deletar-produto?id=<?php echo $produto->getId(); ?>" title="Remover Produto">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .container {
        margin-top: 5%;
        margin-bottom: 5%;
    }

    .content-btn {

        position: absolute;
        right: 10px;
    }
</style>
<?php
include "footer.php";
?>