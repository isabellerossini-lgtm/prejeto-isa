<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>LocaFest - Aluguel para Festas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>LOCA <span>FEST</span></h1>
    <p>A melhor opção para o seu evento!</p>
</header>

<main class="container">
    
    <div class="banner-topo">
        <img src="fotos/logo.jpeg" alt="Bem-vindo ao LocaFest">
    </div>

    <section class="produtos">
        <div class="card"><h3>Jogos de mesa</h3><p>R$ 13,00 un.</p></div>
        <div class="card"><h3>Toalinha de mesa rosa</h3><p>R$ 2,50 un.</p></div>
        <div class="card"><h3>Toalinha de mesa azul</h3><p>R$ 2,50 un.</p></div>
        <div class="card"><h3>Pula-Pula grande (3mx3m)</h3><p>R$ 130,00 dia</p></div>
        <div class="card"><h3>Pula-pula pequeno (2,44)</h3><p>R$ 110,00 dia.</p></div>
        <div class="card"><h3>Piscina de bolinhas</h3><p>R$ 115,00 dia.</p></div>
        <div class="card"><h3>Escorregador</h3><p>R$ 30,00 dia.</p></div>
        <div class="card"><h3>Cavalinho</h3><p>R$ 15,00 dia.</p></div>
    </section>

    <section class="produtos">
        <div class="card"><h3>COMBO 1 (5 jogos de mesa + 1 pula-pula)</h3><p>R$ 180,00</p></div>
        <div class="card"><h3>COMBO 2 (10 jogos de mesa + 1 pula-pula) </h3><p>R$ 240,00</p></div>
        <div class="card"><h3>COMBO 3 (10 jogos de mesa + 1 pula-pula + piscina) </h3><p>R$ 340,00</p></div>
    </section>

    <section class="carrossel-container">
        <div class="carrossel-slides">
            <img src="fotos/foto1.jpeg" alt="Foto 1" class="slide ativo">
            <img src="fotos/pula-pula.jpeg" alt="Foto 2" class="slide">
            <img src="fotos/foto2.jpeg" alt="Foto 3" class="slide">
            <img src="fotos/foto3.jpeg" alt="Foto 4" class="slide">
            <img src="fotos/foto4.jpeg" alt="Foto 5" class="slide">
            <img src="fotos/foto5.jpeg" alt="Foto 6" class="slide">
        </div>
        <button type="button" class="btn-carrossel anterior" onclick="mudarSlide(-1)">&#10094;</button>
        <button type="button" class="btn-carrossel proximo" onclick="mudarSlide(1)">&#10095;</button>
    </section>

    <section class="formulario">
        <h2>Solicitar Reserva</h2>
        <form id="formAluguel" action="processar.php" method="POST">
            <input type="text" name="nome" placeholder="Seu Nome" required>
            <input type="text" name="telefone" placeholder="WhatsApp (DDD + Número)" required>
            
            <select name="produto" id="produto" required>
                <option value="" data-p="0">Selecione o Item ou Combo</option>
                <optgroup label="Itens Individuais">
                    <option value="Jogos de mesa" data-p="13.00">Jogos de mesa - R$ 13,00</option>
                    <option value="Toalinha rosa" data-p="2.50">Toalinha de mesa rosa - R$ 2,50</option>
                    <option value="Toalinha azul" data-p="2.50">Toalinha de mesa azul - R$ 2,50</option>
                    <option value="Pula-Pula G" data-p="130.00">Pula-Pula grande (3mx3m) - R$ 130,00</option>
                    <option value="Pula-Pula P" data-p="110.00">Pula-pula pequeno (2,44) - R$ 110,00</option>
                    <option value="Piscina de bolinhas" data-p="115.00">Piscina de bolinhas - R$ 115,00</option>
                    <option value="Escorregador" data-p="30.00">Escorregador - R$ 30,00</option>
                    <option value="Cavalinho" data-p="15.00">Cavalinho - R$ 15,00</option>
                </optgroup>
                <optgroup label="Combos Promocionais">
                    <option value="Combo 1" data-p="180.00">COMBO 1 - R$ 180,00</option>
                    <option value="Combo 2" data-p="240.00">COMBO 2 - R$ 240,00</option>
                    <option value="Combo 3" data-p="340.00">COMBO 3 - R$ 340,00</option>
                </optgroup>
            </select>

            <input type="number" name="quantidade" id="qtd" placeholder="Quantidade" min="1" required>
            
            <label style="display:block; margin-top:10px; color:#FFD700;">Data do Evento:</label>
            <input type="date" name="data_evento" required min="<?= date('Y-m-d') ?>">
            
            <div class="total-box">Total Estimado: <span id="valorTotal">R$ 0,00</span></div>
            
            <button type="submit">Finalizar Pedido</button>
        </form>
    </section>

</main>

<footer class="rodape-site">
    <div class="banner-final">
        <img src="fotos/final.jpg" alt="Festa de Sucesso">
    </div>
    <p>&copy; 2026 LocaFest - Todos os direitos reservados.</p>
</footer>
<script src="script.js"></script>
</body>
</html>

