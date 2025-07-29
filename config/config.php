<?php
/**
 * Configurações do Sistema Meus Cursos
 */

// Carregar variáveis de ambiente
require_once __DIR__ . '/env.php';
loadEnv(__DIR__ . '/../.env');

// Configurações do banco de dados
define('DB_HOST', $_ENV['DB_HOST'] ?? 'localhost');
define('DB_NAME', $_ENV['DB_NAME'] ?? 'leo_learning');
define('DB_USER', $_ENV['DB_USER'] ?? 'root');
define('DB_PASS', $_ENV['DB_PASS'] ?? '');

// Configurações gerais
define('SITE_NAME', $_ENV['SITE_NAME'] ?? 'Leo Learning');
define('SITE_URL', $_ENV['SITE_URL'] ?? 'http://localhost');
define('TIMEZONE', $_ENV['TIMEZONE'] ?? 'America/Sao_Paulo');
define('APP_ENV', $_ENV['APP_ENV'] ?? 'production');
define('APP_DEBUG', filter_var($_ENV['APP_DEBUG'] ?? false, FILTER_VALIDATE_BOOLEAN));

// Definir timezone
date_default_timezone_set(TIMEZONE);

// Configurações de erro baseadas no ambiente
if (APP_DEBUG) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(0);
}

// Iniciar sessão se não estiver iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include database class
require_once __DIR__ . '/Database.php';

// Include course class
require_once __DIR__ . '/Course.php';
