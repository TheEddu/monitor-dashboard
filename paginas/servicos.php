<?php
$titulo = "Serviços de Infraestrutura";
require_once "../template/header.php";
require_once "../funcoes/verificar_servicos.php";
?>

<h1 class="text-3xl font-bold mb-6 text-center">🛠️ Serviços de Infraestrutura Essenciais</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php
    foreach ($servicosInfra as $nomeServico => $descricao) {
        echo "<div class='bg-white p-6 rounded-lg shadow-md'>";
        echo "<h2 class='text-lg font-semibold mb-2'>$descricao</h2>";
        echo "<p class='text-gray-700'>" . verificarServico($nomeServico) . "</p>";
        echo "</div>";
    }
    ?>
</div>

<?php require_once "../template/footer.php"; ?>