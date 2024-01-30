

<?php
    
    //executa a query com base na conexão
    include_once('controllers/conexao.php');
    

    //executa a query com base na conexão
    $query = mysqli_query($conexao, "select * from pessoas");
    $aviso = mysqli_query($conexao, "select * from pessoas");
    if (!$query){
        die('Query Invalida: ' . @mysqli_error($conexao)); //mostra o erro 
    }

   
     

    $i = 0;
?>


<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pagina Inicial</title>
        <link rel="stylesheet" href="styles/inicial.css">
    </head>
    <body>
        <nav>
            <div class="navbar">
            
                <ul class="itens">
                    <a href="inicial.php" ><li class="btn">Página inicial </li></a>
                    <a href="#" ><li class="btn">Estatísticas</li></a>
                    <a href="gerenciar.php" ><li class="btn">Gerenciar Cadastros</li></a>                    
                </ul>
                <a href="cad.php" class="btn">Adicionar Cadastro</a>
                
            </div>
        </nav>


        <div class="container">
            <div class="con-title">
                <h1>Inicial</h1>
                <h3>Notificações e avisos</h3>
                <br>
                <br>
                <h3>Data de hoje: <?= date('d/m/Y')?></h3>
                <div class="img_div">
                    <img src="imgs/avisos.svg" alt="avisos img" class="img">
                </div>
            </div>

            <div class="con-warning">
                <p id="aviso_label">O prazo de revisão esta chegando na data (7 dias ou menos)</p> 
                
                    <div class="avisos_div">
                        <div class="avisos" id="avisos_tr">
                            <img src="icons/aviso.png" alt=""  class="iconAviso" id="img_aviso_tr">
                            <div class="dados_aviso" id="tr">
                                <div class="divider_tr" >Nome</div>
                                <div class="divider_tr">Telefone</div>
                                <div class="divider_tr">Data devolução</div>
                                <div class="divider_tr">Valor devolução</div>                                
                            </div>
                           
                        </div>
                    </div>
                
                <?php while($dados = mysqli_fetch_array($query)){ 
                    
                    $dataAtual = new DateTime(date('Y-m-d'));
                    $data_dev = new DateTime($dados['data_dev']);

                    // Calcula a diferença em dias
                    $diferenca = $dataAtual->diff($data_dev);
                    // Obtém a diferença em dias
                    $dias = $diferenca->days;

                   
                    
                   if($dias <= 7 && $dados['situacao'] == 'Em Divida'){
                    $i = 1;
                    ?>
                        <div class="avisos_div">
                            <div class="avisos">
                                <img src="icons/aviso.png" alt=""  class="iconAviso">
                                <div class="dados_aviso">
                                    <div class="divider"><?= $dados['nome']?></div>
                                    <div class="divider"><?= $dados['tel']?></div>
                                    <div class="divider"><?=date('d/m/Y', strtotime($dados['data_dev']))?></div>
                                    <div class="divider">R$<?= $dados['val_dev']?></div>                                
                                </div>
                                <img src="icons/seta-direita.png" alt="" class="iconAviso" id="seta">
                            </div>
                        </div>
                    <?php }
                        if($i == 0 && $dias < 15 && $dias >7){ echo '<div class="pontos">...</div>';}
                        }         
                    ?>
                   
                    <div class="atencao_div">
                        <p id="atencao_label">Atenção ao prazo de revisão (15 dias ou menos)</p> 
                        <div class="avisos">
                            <img src="icons/ponto-de-exclamacao.png" alt=""  class="iconAviso">
                            <div class="dados_atencao">
                                <?php while( $dados= mysqli_fetch_array($aviso)){ 
                                      
                                $dataAtual = new DateTime(date('Y-m-d'));
                                $data_dev = new DateTime($dados['data_dev']);

                                // Calcula a diferença em dias
                                $diferenca = $dataAtual->diff($data_dev);
                                // Obtém a diferença em dias
                                 $dias = $diferenca->days;
                                                
                                if($dias > 7 && $dados['situacao'] == 'Em Divida'){?>
                                    <div class="row_atencao">
                                        <div class="divider_"><?= $dados['id']?></div>
                                        <div class="divider_"><?= $dados['nome']?></div>
                                        <div class="divider_"><?= date('d/m/Y', strtotime($dados['data_dev']))?></div>
                                    </div>
                                    
                                 <?php } 
                                 
                                }?>
                                                                
                            </div>

                        </div>
                    </div>
                


            </div>

        </div>
         
        <?php
            //finaliza a conexao
            mysqli_close($conexao);
        ?>
        
                               



    </body>
</html>