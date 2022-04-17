<?php
include "head.php";
?>
<div class="container login-container">
    <div class="row  justify-content-md-center">
        <div class="col-md-8 content-page">
            <h3><i class="fa-solid fa-triangle-exclamation"></i> Oops! Página não encontrada - 404</h3>
            <p>
                Não foi possível encontrar a página que você estava procurando.
                Enquanto isso, você pode retornar para a <a href="javascript:void(0)" onclick="goBack()" title="ultima página acessada">ultima página acessada</a>
            </p>
        </div>
    </div>
</div>

<style>
    .container {
        margin-top: 5%;
        margin-bottom: 5%;
    }

    .content-page {
        padding: 5%;
        box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
    }

    .content-page h3 {
        text-align: center;
        color: #333;
    }

    .content-page h3 i {
        color: orange;
    }
</style>
<script type="text/javascript">
    function goBack() {
        window.history.go(-1);
    }
</script>
<?php
include "footer.php";
