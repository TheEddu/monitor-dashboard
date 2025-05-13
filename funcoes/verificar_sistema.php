<?php

function obterStatusSistema($metrica) {
    switch ($metrica) {
        case "cpu":
            return verificarCPU();
        case "ram":
            return verificarRAM();
        case "disco":
            return verificarDisco();
        case "carga":
            return verificarCarga();
        case "temp":
            return verificarTemperatura();
        case "cron":
            return verificarCron();
        default:
            return "❓ Métrica desconhecida";
    }
}


function verificarCPU() {
    $output = shell_exec("mpstat 1 1 | awk 'NR==4 {print 100 - \$12\"%\"}'");
    return trim($output) ?: "❌ Erro ao obter CPU";
}

function verificarRAM() {
    $output = shell_exec("free -m | awk '/Mem:/ {printf \"%.1f%%\", (\$3/\$2)*100}'");
    return trim($output) ?: "❌ Erro ao obter RAM";
}

function verificarDisco() {
    $output = shell_exec("df -h | awk '/\/dev\// {print $6 \" \" $5}'");
    return trim($output) ?: "❌ Erro ao obter Disco";
}

function verificarCarga() {
    $output = shell_exec("uptime | awk -F 'load average: ' '{print $2}' | cut -d, -f1-3");
    return trim($output) ?: "❌ Erro ao obter carga";
}

function verificarTemperatura() {
    $output = shell_exec("sensors | awk '/Core 0:/ {print $3}' | tr -d '+'");
    return $output ? trim($output) : "⚠️ Sensor não disponível";
}

function verificarCron() {
    $output = shell_exec("pgrep cron");
    return $output ? "✅ Cron ativo" : "❌ Cron inativo";
}


$metricasSistema = [
    "cpu" => "Uso de CPU",
    "ram" => "Uso de RAM",
    "disco" => "Espaço em Disco",
    "carga" => "Carga do Sistema",
    "temp" => "Temperatura",
    "cron" => "Processo Cron"
];
