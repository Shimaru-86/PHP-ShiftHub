<?php
require_once __DIR__ . '/../Connection.php';

class Log {
    public static function handle($next) {
        self::register($_SERVER['REQUEST_URI'], $_SERVER['HTTP_USER_AGENT'], $_SERVER['REMOTE_ADDR']);
        return $next();
    }

    public static function register($action, $userAgent, $ipAddress) {
        // Criar nova conexão
        $db = new Connection();
        $conn = $db->connectDB();
        
        $stmt = $conn->prepare("INSERT INTO activities_log (id_user, user_action, user_agent, ip_address) VALUES (?, ?, ?, ?)");

        $id_user = $_SESSION['user_id'] ?? 1;
        
        $stmt->bind_param("isss", $id_user, $action, $userAgent, $ipAddress);

        if (!$stmt->execute()) {
            die("Erro ao registrar log: " . $stmt->error);
        }
        
        $stmt->close();
        $db->disconnectDB();
    }
}
?>
