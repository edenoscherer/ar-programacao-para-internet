<?php
include "head.php";
?>
<div class="container login-container">
    <div class="row  justify-content-md-center">
        <div class="col-md-6 content-form">
            <h3>Login</h3>
            <form method="POST" action="login-validar">
                <div class="form-group">
                    <input type="text" name="nome" class="form-control" placeholder="Nome" value="" required />
                </div>
                <div class="form-group">
                    <input type="password" name="senha" class="form-control" placeholder="Senha" required value="" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Login" />
                </div>
                <?php
                if (isset($error) && !empty($error)) {
                    echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                }
                ?>
                <div class="form-group">
                    <a href="cadastrar-usuario" class="btnCadastro">Cadastar</a>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    .login-container {
        margin-top: 5%;
        margin-bottom: 5%;
    }

    .content-form {
        padding: 5%;
        box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
    }

    .content-form h3 {
        text-align: center;
        color: #333;
    }

    .login-container form {
        padding: 10%;
    }

    .content-form .btnCadastro {
        color: #0062cc;
        font-weight: 600;
        text-decoration: none;
    }
</style>
<?php

include "footer.php";
