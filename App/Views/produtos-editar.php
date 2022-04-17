<?php
include "head.php";

/** @var \App\Entities\Produto $produto */
?>

<div class="container">
    <div class="row  justify-content-md-center">
        <div class="col-md-8 content-form">
            <div class="card">
                <div class="card-header">
                    Editar Produto
                    <span class="content-btn">
                        <a class="btn-link" href="produtos" title="Listar produtos">
                            Listar
                        </a>
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="editar-produto-salvar">
                        <input type="hidden" name="id" value="<?php echo $produto->getId() ?>" />
                        <div class="form-group">
                            <input type="text" name="nome" class="form-control" placeholder="Nome" value="<?php echo $produto->getNome() ?>" required />
                        </div>
                        <div class="form-group">
                            <textarea name="descricao" class="form-control" placeholder="Descrição" required><?php echo $produto->getDescricao() ?></textarea>
                        </div>
                        <div class="form-group">
                            <input type="text" name="cod_barras" class="form-control" placeholder="Cod. Barras" value="<?php echo $produto->getCodBarras() ?>" required />
                        </div>
                        <div class="form-group">
                            <input type="text" name="fabricante" class="form-control" placeholder="Fabricante" value="<?php echo $produto->getFabricante() ?>" required />
                        </div>
                        <div class="form-group">
                            <input type="text" name="validade" class="form-control" placeholder="Validade" value="<?php echo $produto->getValidade() ?>" />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </div>
                        <?php
                        if (isset($error) && !empty($error)) {
                            echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                        }
                        ?>
                    </form>
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