<?php

class AutUser extends Dbasis
{
    public function verificaCookie()
    {
        if (isset($_COOKIE['GerenciaNet'])) {
            $dadosUsuario = json_decode($_COOKIE['GerenciaNet'], true);
            $verifica = Dbasis::read('users','email = "'.$dadosUsuario['email'].'"');
            if ($verifica->num_rows) {
                foreach ($verifica as $v);
                unset($v['senha']);
                $_SESSION['AutUser'] = $v;
                return 1;
            }else {
                setcookie('GerenciaNet', '', time() - 3600, '/');
                return 2;
            }
        }
    }

    /**
     * Método responsável por logar os usuarios
     * @param array $dados
     * @return int
     * **/
    public function login($dados)
    {
        $verifica = Dbasis::read('users','email = "'.$dados['email'].'"');
        if ($verifica->num_rows) {
            foreach ($verifica as $user);
            if (password_verify($dados["senha"], $user["password_hash"])) {
                if ($dados['persistente']??null) {
                    $json = json_encode($user);
                    $tempoExpiracao = time() + (30 * 24 * 60 * 60); // 30 dias em segundos
                    setcookie('GerenciaNet', $json, $tempoExpiracao, '/');
                }
                $_SESSION['AutUser'] = $user;
                return 1;
            } else {
                setcookie('Enzo', '', time() - 3600, '/');
                return 2;
            }
        }else {
            setcookie('Enzo', '', time() - 3600, '/');
            return 2;
        }
    }
}