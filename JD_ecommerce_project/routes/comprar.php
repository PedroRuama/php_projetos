<?php

include_once('../controllers/conexao.php');




if (isset($_POST['user']) != 0) {
    $user = $_POST['user'];
    $select_user = mysqli_query($conexao, "SELECT * from users where user_name='$user'");
    $dadosU = mysqli_fetch_array($select_user);
}


do {
    $caracteres = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $n_pedido = '';
    for ($i = 0; $i < 6; $i++) {
        $indiceAleatorio = rand(0, strlen($caracteres) - 1);
        $n_pedido .= $caracteres[$indiceAleatorio];
    }

    $Verificacao = mysqli_query($conexao, "SELECT n_pedido from pedidos where n_pedido = '$n_pedido'");
    $num_rows = mysqli_num_rows($Verificacao);
} while ($num_rows > 0);




if (isset($_POST['codP'])) {
    $codP = $_POST['codP'];
    $select_produto = mysqli_query($conexao, "SELECT * from produtos where codP = $codP");
    $dadosP = mysqli_fetch_array($select_produto);

    $imagens = mysqli_query($conexao, "SELECT * FROM imagens WHERE codP = $codP");
    $dadosImg = mysqli_fetch_array($imagens);
}




?>




<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprar</title>
    <link rel="stylesheet" href="../styles/login.css">
    <script src="../scripts/comprar.js"></script>
</head>

<body>
    <div class="alingLogin">
        <form class="form_c" action="../api/preference.php" method="post">
            <input type="text" value="<?= $codP ?>" name="codP" style="display: none">

            <div class="divLogo">
                <img src="../imgs/logofake.png" alt="logo" class="img">
            </div>
            <p class="form-title">Comprar </p>


            <div class="alingV" id="boxGeral">

                <div class="Allinputs_div" id="inputs_compra">
                    <div id="dPedido_box">
                        <div class="alingV">
                            <div class="img_redonda">
                                <img src="../<?= $dadosImg['path'] ?>" alt="imgProduto" class="img2">
                            </div>
                            <div>
                                <input type="text" name="nome_p" class="fake_inp" id="fake_inp1" value="<?= $dadosP['titulo'] ?>">
                            </div>

                        </div>

                        <div id="codigo_compra_div">
                            <p class="label_p">CÓDIGO COMPRA:</p>
                            <input type="text" name="n_pedido" class="fake_inp" id="fake_inp2" value="<?= $n_pedido;  ?>">
                        </div>
                    </div>

                </div>
                <br>
              
                

                <div class="input-container">
                    <input type="email" autocomplete="on" placeholder="Email" required name="email" value="
                            <?php
                            if (isset($dadosU['email'])) {
                                echo $dadosU['email'];
                            }
                            ?>
                        
                        " class="inp_c">

                </div>

                <div class="input-container">
                    <input type="text" autocomplete="on" placeholder="Nome Completo" required name="nome" value="<?php
                                                                                                                    if (isset($dadosU['nome'])) {
                                                                                                                        echo $dadosU['nome'];
                                                                                                                    }
                                                                                                                    ?>" class="inp_c">

                </div>

                <div class="input-container">
                    <input type="text" autocomplete="on" placeholder="Telefone" required name="tel" oninput="mascaraTel(this)" class="inp_c">
                </div>
                <div class="input-container">
                    <input type="text" autocomplete="on" placeholder="CPF" required name="cpf" oninput="mascaraCpf(this)" class="inp_c">
                </div>
                <div class="input-container">
                    <input type="text" autocomplete="on" placeholder="CEP" required name="CEP" oninput="mascaraCEP(this)" class="inp_c">
                </div>
                <div class="input-container">
                    <input type="text" autocomplete="on" placeholder="Endereço" required name="ende" class="inp_c">
                </div>

            </div>

            <br>
            <br>
            <br>

            <button type="submit" class="submit_comprar">
                Confirmar Compra
            </button>
            <br>



        </form>

    </div>

</body>

</html>