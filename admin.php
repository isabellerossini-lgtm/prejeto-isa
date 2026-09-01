<?php
include 'db.php';

// Ação de mudar status
if (isset($_GET['mudar_status'])) {
    $id = (int)$_GET['id'];
    $novo = $_GET['mudar_status'];
    $conn->query("UPDATE pedidos SET status='$novo' WHERE id=$id");
    header("Location: admin.php");
}

$res = $conn->query("SELECT * FROM pedidos ORDER BY data_evento ASC");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel Administrativo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header><h1>PAINEL DE <span>PEDIDOS</span></h1></header>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Data Evento</th>
                    <th>Cliente / Tel</th>
                    <th>Pedido</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($res && $res->num_rows > 0): ?>
                    <?php while($p = $res->fetch_assoc()): ?>
                    <tr>
                        <td><?= date('d/m/Y', strtotime($p['data_evento'])) ?></td>
                        <td><?= $p['nome_cliente'] ?><br><small><?= $p['telefone'] ?></small></td>
                        <td><?= $p['quantidade'] ?>x <?= $p['produto'] ?></td>
                        <td>R$ <?= number_format($p['valor_total'], 2, ',', '.') ?></td>
                        <td><span class="status <?= $p['status'] ?>"><?= $p['status'] ?></span></td>
                        <td>
                            <a href="?id=<?= $p['id'] ?>&mudar_status=Reservado" class="btn-status" title="Reservar">📅</a>
                            <a href="?id=<?= $p['id'] ?>&mudar_status=Entregue" class="btn-status" title="Marcar como Entregue">✅</a>
                            <a href="?id=<?= $p['id'] ?>&mudar_status=Cancelado" class="btn-status" title="Cancelar">❌</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" style="text-align:center; padding:20px;">Nenhum pedido encontrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>