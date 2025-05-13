<?php
function verificarServico($servico) {
    $status = trim(shell_exec("systemctl is-active $servico"));

    if ($status === "active") {
        return "✅ Ativo";
    } elseif ($status === "inactive") {
        return "⚠️ Inativo";
    } elseif ($status === "failed") {
        return "❌ Falhou";
    } else {
        return "❓ Desconhecido ou não instalado";
    }
}

$servicosInfra = [
    "apache2" => "Apache",
    "mysql" => "MySQL",
    "ssh" => "SSH",
    "vsftpd" => "FTP/SFTP",
    "bind9" => "DNS",
    "postfix" => "Email (Postfix)"
];
