<?php
include "head.php";
?>

<div class="container">
    <div class="row  justify-content-md-center">
        <div class="col-md-8 content-form">
            <div class="card">
                <div class="card-header">
                    Cadastrar Produto
                    <span class="content-btn">
                        <a class="btn-link" href="produtos" title="Listar produtos">
                            Listar
                        </a>
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="cadastrar-produto-salvar">
                        <div class="form-group">
                            <input type="text" name="nome" class="form-control" placeholder="Nome" value="" required />
                        </div>
                        <div class="form-group">
                            <textarea name="descricao" class="form-control" placeholder="Descrição" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="text" name="cod_barras" class="form-control" placeholder="Cod. Barras" value="" required />
                        </div>
                        <div class="form-group">
                            <input type="text" name="fabricante" class="form-control" placeholder="Fabricante" value="" required />
                        </div>
                        <div class="form-group">
                            <input type="text" name="validade" class="form-control" placeholder="Validade" value="" />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
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