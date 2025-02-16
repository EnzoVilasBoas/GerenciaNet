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
                    $tempoExpiracao = time() + (30 * 24 * 60 * 60);
                    setcookie('GerenciaNet', $json, $tempoExpiracao, '/');
                }
                $_SESSION['AutUser'] = $user;
                return 1;
            } else {
                setcookie('GerenciaNet', '', time() - 3600, '/');
                return 2;
            }
        }else {
            setcookie('GerenciaNet', '', time() - 3600, '/');
            return 2;
        }
    }

    /**
     * Metodo responsavel por realizar o cadastro do usuario
     * @param array $post
     * @return int
     */
    public function cadastra(array $post) {
        $verificaEmail = Dbasis::read("users",'email = "'.$post["email"].'"');
        if ($verificaEmail->num_rows) {
            return 1;
        }else {
            if ($post["cadPass"] == $post["conPass"]) {
                $cad = [
                    "name"  => $post["name"],
                    "email" => $post["email"],
                    "phone" => $post["phone"],
                    "password_hash"  => password_hash($post["cadPass"], PASSWORD_ARGON2ID),
                ];
                $create = Dbasis::create("users",$cad);
                if ($create) {
                    return 3;
                }
                return 0;
            }else {
                return 2;
            }
        }
    }
}