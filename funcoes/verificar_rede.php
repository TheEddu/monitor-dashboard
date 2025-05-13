<?php

function obterStatusRede($metrica) {
    switch ($metrica) {
        case "conectividade":
            return verificarConectividade();
        case "portas_abertas":
            return listarPortasAbertas();
        case "firewall_ufw":
            return statusFirewallUfw();
        case "firewall_iptables":
            return statusFirewallIptables();
        case "tentativas_ssh":
            return tentativasSSH();
        case "logs_suspeitos":
            return logsSuspeitos();
        case "consumo_rede":
            return consumoRede();
        default:
            return "❓ Métrica desconhecida";
    }
}

function verificarConectividade() {
    $output = shell_exec("ping -c 4 8.8.8.8");
    preg_match('/min\/avg\/max\/[^ ]+ = ([\d\.]+)\/([\d\.]+)\/([\d\.]+)/', $output, $matches);
    $status = strpos($output, '0% packet loss') !== false ? '✅ Conectado' : '❌ Perda de pacotes';
    $latencia = $matches[2] ?? 'N/A';
    return "$status (Latência média: $latencia ms)";
}

function listarPortasAbertas() {
    $output = shell_exec("ss -tuln | awk '{print $5}' | grep -Eo '[0-9]+\.[0-9]+\.[0-9]+\.[0-9]+:[0-9]+'
");
    return $output ?: "❌ Erro ao listar portas abertas";
}

function statusFirewallUfw() {
    $output = shell_exec("sudo ufw status");
    return $output ?: "❌ Erro ao verificar status do UFW";
}

function statusFirewallIptables() {
    $output = shell_exec("sudo iptables -L");
    return $output ?: "❌ Erro ao verificar status do iptables";
}

function tentativasSSH() {
    $output = shell_exec("grep 'sshd' /var/log/auth.log | grep -E 'Failed|Accepted' | tail -n 20");
    return $output ?: "❌ Erro ao obter tentativas de SSH";
}

function logsSuspeitos() {
    $output = shell_exec("grep -i 'error\\|fail\\|invalid' /var/log/auth.log | tail -n 20");
    return $output ?: "❌ Erro ao obter logs suspeitos";
}

function consumoRede($interface = 'eth0') {
    $cmd = "awk '/$interface/ {print \"Recebido: \"\$2\" bytes, Enviado: \"\$10\" bytes\"}' /proc/net/dev";
    $output = shell_exec($cmd);
    return $output ?: "❌ Erro ao obter consumo de rede";
}

$metricasRede = [
    "conectividade" => "Conectividade com a Internet",
    "portas_abertas" => "Portas Abertas",
    "firewall_ufw" => "Status do Firewall (UFW)",
    "firewall_iptables" => "Status do Firewall (iptables)",
    "tentativas_ssh" => "Tentativas de Conexão SSH",
    "logs_suspeitos" => "Logs Suspeitos",
    "consumo_rede" => "Consumo de Rede"
];
