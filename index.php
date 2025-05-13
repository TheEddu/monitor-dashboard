<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="text-white min-h-screen flex items-center justify-center" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('./image/background.webp') no-repeat center center; background-size: cover;">
    <div class="container mx-auto py-10 text-center">
        <h1 class="text-4xl font-extrabold mb-8">Painel de Monitoramento</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 bg-gray-900 rounded-2xl p-8 shadow-2xl max-w-4xl mx-auto">
            <a href="./paginas/servicos.php" class="w-full max-w-xs mx-auto  bg-blue-500 hover:bg-blue-600 px-6 py-4 rounded-lg text-white font-semibold shadow-lg transform hover:scale-105 transition duration-300 ease-in-out">
                Serviços Essenciais
            </a>
            <a href="./paginas/rede.php" class="w-full max-w-xs mx-auto  bg-green-500 hover:bg-green-600 px-6 py-4 rounded-lg text-white font-semibold shadow-lg transform hover:scale-105 transition duration-300 ease-in-out">
                Rede e Segurança
            </a>
            <a href="./paginas/sistema.php" class="w-full max-w-xs mx-auto  bg-yellow-500 hover:bg-yellow-600 px-6 py-4 rounded-lg text-white font-semibold shadow-lg transform hover:scale-105 transition duration-300 ease-in-out">
                Recursos do Sistema
            </a>
        </div>
    </div>
</body>
</html>