<?php
    require("Connection.class.php");

    class Login
    {
        private $connectionDB;

        public function logar($email, $senha)
        {
            session_start();

            if(isset($email, $senha) && $email !== "" && $senha !== "")
            {
                // Criar Conexão
                $this->connectionDB = new Connection();
                $connect = $this->connectionDB->connectDB();

                if ($connect->connect_error) {
                    die("Erro ao conectar com o Banco de Dados: " . $connect->connect_error);
                    return array('userLogged' => '0', 'info' => 'Erro ao conectar ao Banco de Dados.');
                }

                // Conferir se a conta existe através do email.
                $stmt = $connect->prepare("SELECT * FROM administradores WHERE email = ?");
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();
                
                $stmt->close();
                $connect->close();

                if($result->num_rows > 0)
                {
                    $dados = $result->fetch_assoc(); // Recebo os dados da consulta caso exista um usuário com o email informado.

                    // Confere se a senha está correta.
                    if(password_verify($senha, $dados["senha"])) {
                        $userData = array(
                            'userLogged' => '1',
                            'info' => 'Usuário conectado',
                            'idUsuario' => $dados["idAdm_PK"],
                            'nome' => $dados["nome"],
                            'email' => $dados["email"]
                        );

                        $_SESSION['userData'] = $userData;

                        return $_SESSION['userData'];
                    }
                    else {
                        return array('userLogged' => '0', 'info' => 'Senha ou email incorreto.');
                    }
                }
                else {
                    return array('userLogged' => '0', 'info' => 'O email informado não foi encontrado no Banco de Dados.');
                }
            }
            else {
                return array('userLogged' => '0', 'info' => 'Email ou senha não definidos.');
            }
        }
    }
?>
