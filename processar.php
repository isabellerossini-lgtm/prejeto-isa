<?php
include 'db.php';

function enviarTelegram($msg) {
    $token = "SEU_TOKEN_AQUI"; // Pegue com o @BotFather
    $chat_id = "SEU_CHAT_ID_AQUI"; // Pegue com o @userinfobot
    $url = "https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=" . urlencode($msg);
    @file_get_contents($url);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $tel = mysqli_real_escape_string($conn, $_POST['telefone']);
    $prod = mysqli_real_escape_string($conn, $_POST['produto']);
    $qtd = (int)$_POST['quantidade'];
    $data = $_POST['data_evento'];

    // Cálculo do valor no servidor com catálogo de preços consistente com index.php
    $precos = [
        "Jogos de mesa" => 13.00,
        "Toalinha rosa" => 2.50,
        "Toalinha azul" => 2.50,
        "Pula-Pula G" => 130.00,
        "Pula-Pula P" => 110.00,
        "Piscina de bolinhas" => 115.00,
        "Escorregador" => 30.00,
        "Cavalinho" => 15.00,
        "Combo 1" => 180.00,
        "Combo 2" => 240.00,
        "Combo 3" => 340.00
    ];

    $preco_unitario = isset($precos[$prod]) ? floatval($precos[$prod]) : 0.0;
    $valor_total = $preco_unitario * max(1, $qtd);

    $sql = "INSERT INTO pedidos (nome_cliente, telefone, produto, quantidade, data_evento, valor_total) 
            VALUES ('$nome', '$tel', '$prod', '$qtd', '$data', '$valor_total')";

    echo "<body style='background:#121212; color:#FFD700; text-align:center; padding:50px; font-family:sans-serif;'>";
    
    if ($conn->query($sql)) {
        $msg = "💰 NOVO PEDIDO!\n\nCliente: $nome\nTel: $tel\nItem: $prod\nQtd: $qtd\nData: " . date('d/m/Y', strtotime($data));
        enviarTelegram($msg);
        
        echo "<h1>Reserva Enviada com Sucesso!</h1>";
        echo "<p>Obrigado $nome, entraremos em contato em breve.</p>";
    } else {
        echo "<h1>Erro ao processar</h1><p>" . $conn->error . "</p>";
    }
    
    echo "<br><br><a href='index.php' style='color:#fff;'>Voltar ao Site</a></body>";
}
?>