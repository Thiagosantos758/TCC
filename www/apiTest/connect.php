<?php
/* 
 *Nome: Thiago Lima dos Santos
 *Arquivo de conexão ao banco de dados.
 *Projeto de Conclusão de Curso: NexBusi
*/
ob_clean();

error_reporting(0);  // Desabilita exibição de erros (use error_log em produção)
ob_start();  // Buffer para capturar qualquer output indesejado

$uri = "mysql://avnadmin:AVNS_EoweUt9w0N3Fzraad65@meutcc-tcc2025.b.aivencloud.com:12566/defaultdb?ssl-mode=REQUIRED";

$fields = parse_url($uri);

// Build the DSN including SSL settings
$conn = "mysql:";
$conn .= "host=" . $fields["host"];
$conn .= ";port=" . $fields["port"];  // Removeu ;; extra
$conn .= ";dbname=abcd";
$conn .= ";sslmode=verify-ca;sslrootcert=ca.pem";  // SSL obrigatório para Aiven

try {
    $db = new PDO($conn, $fields["user"], $fields["pass"]);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);  // Para prepared statements reais
    
    
} catch (PDOException $e) {
    $db = null;  // Define como null para o login.php checar
    error_log("Erro de conexão Aiven: " . $e->getMessage());  // Log do erro
}

ob_end_clean();  // Limpa buffer se houver output
?>