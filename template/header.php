<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title><?= $titulo ?? 'Painel de Monitoramento' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 min-h-screen">
    <header class="bg-gray-800 text-white py-4 shadow-md">
        <div class="container mx-auto px-4">
            <h1 class="text-xl font-bold"><?= $titulo ?? 'Painel de Monitoramento' ?></h1>
        </div>
    </header>
    <main class="container mx-auto px-4 py-6">