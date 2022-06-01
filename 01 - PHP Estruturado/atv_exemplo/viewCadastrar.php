<?php

    include ("controle.php");
    include ("header.php");

    if( !empty($_POST['form_submit']) ) {
        cadastrar();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Novo Cadastramento</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    </head>
    <body>
        <div class="container py-4">        
            <form class="form" method="post" action="viewCadastrar.php">
                <input type="hidden" name="form_submit" value="OK">
                <h1 class="display-7" style="color: black">Cadastrar Pessoa Física</h1>
                    <hr class="separador">
                <div style='display:flex; justify-content: center; gap: 5rem' class='col12'>
                    <div>
                        <a>
                            <button type='submit' class='btn btn-confirm' style='background-color: green; color: white; width: 608px; font-weight: bold; padding: 0.5rem; font-size: 1.2rem'>
                                Confirmar &nbsp;
                        </a>
                    </div>
                    <div>
                        <a href="viewMain.php" class="btn btn-voltar" style='background-color: orange; color: white; width: 608px; font-weight: bold; padding: 0.5rem; font-size: 1.2rem'>
                                
                                &nbsp; Voltar - Não Alterar
                        </a>
                    </div>
                </div>
                
                
               <div style="display: grid; grid-template-columns: 1fr 3fr; gap: 1rem 2.5rem; margin-top: 2rem">
                   <div class="row">
                       <div class="col" >
                           <div class="form-floating mb-3">
                            <input 
                                type="text" 
                                class="form-control" 
                                name="cpf" 
                                placeholder="Cpf"
                            />
                            
                            <label for="cpf">CPF</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col" >
                        <div class="form-floating mb-3">
                            <input 
                                type="text" 
                                class="form-control" 
                                name="nome" 
                                placeholder="Nome"
                                />
                            <label for="nome">Nome</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col" >
                        <div class="form-floating mb-3">
                            <input 
                                type="text" 
                                class="form-control" 
                                name="endereço" 
                                placeholder="Endereço"
                                />
                                <label for="endereço">Endereço</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col" >
                        <div class="form-floating mb-3">
                            <input 
                                type="text"
                                class="form-control" 
                                name="telefone" 
                                placeholder="Telefone"
                            />
                            <label for="telefone">Telefone</label>
                        </div>
                    </div>
                </div>
            </div>
                <div class="row">
                    <div class="col">
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
