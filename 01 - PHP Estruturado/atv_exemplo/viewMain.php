<?php
    include ("controle.php");
    include ("header.php");
    if( !empty($_POST['form_submit']) ) {
        rotas($_POST["acao"]);
    }


?>

<!DOCTYPE html>
<html lang="pt-br">
    
    <body>
    <div class="container py-4">    
        <form action="viewMain.php" method="POST">
            <input type="hidden" name="form_submit" value="OK">
            <div class="row ">
                <div class="col-12">
                    <h1> Pessoas Físicas Cadastradas</h1>
                    <hr class='separador'>
                    <button  type='submit' name='acao' value='cadastrar/0' class='btn btn-primary btn-cadastro'>
                        Cadastrar Nova Pessoa Física
                    </button>                    
                </div>
                <div class="col d-flex justify-content-end">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table align-middle caption-top table-striped">
                        <thead>
                        <tr>
                            <th scope="col" class="d-none d-md-table-cell">CPF</th>
                            <th scope="col">NOME</th>
                            <th scope="col" class="d-none d-md-table-cell">ENDEREÇO</th>
                            <th scope="col" class="d-none d-md-table-cell">TELEFONE</th>
                            <th scope="col">AÇÕES</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php loadCursos(); ?>
                        </tbody>    
                    </table>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </body>
</html>
