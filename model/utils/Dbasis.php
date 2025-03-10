<?php
class Dbasis{

    /**
     * Método responsavel por gera logs de erros do MySql
     * @param string $arquivo
     * @param string $mensagem
     */
    private function LogAcesso($arquivo,$mensagem){
        $arquivo 		= fopen($arquivo, 'a');
        $novoArquivo 	= $mensagem."\n";
        fwrite($arquivo,utf8_decode($novoArquivo));
        fclose($arquivo);
    }

    /**
     * Método responsável por cadastros nas tabelas
     * @param string $tabela
     * @param array $datas
     */
    public function create($tabela, array $datas)
    {
        $conn = mysqli_connect(HOST, USER, PASS, DBSA) or die('Erro ao conectar: ' . mysqli_connect_error($conn));
        $fields = implode(", ", array_keys($datas));
        $values = "'" . implode("', '", array_values($datas)) . "'";
        $qrCreate = "INSERT INTO {$tabela} ($fields) VALUES ($values)";
        if (LOG){
            $stCreate   =  mysqli_query($conn, $qrCreate) or die('<div class="alert alert-danger">Falha na execução do comando. Entre em contato com o suporte!</div>'
                . Dbasis::logAcesso(BASE.'/logbderro.txt', "ERRO NO CREATE, " . $_SERVER['REQUEST_URI'] . ", DATA: " . date('Y-m-d H:i:s') . " , TABELA: $tabela, QUERY:  $qrCreate  " . mysqli_error($conn)));
        } else {
            $stCreate   = mysqli_query($conn, $qrCreate)  or die('<div class="alert alert-danger">Falha na execução do comando. Entre em contato com o suporte!</div>');
        }
        if (isset($stCreate)) {
            return mysqli_insert_id($conn);
        }
    }

    /**
     * Método responsavel pela leitura da tabela
     * @param string $tabela
     * @param string $cond
     */
    public function read($tabela, $cond = NULL)
    {
        $conn = mysqli_connect(HOST, USER, PASS, DBSA) or die('Erro ao conectar: ');
        if ($cond) {
            $qrRead = "SELECT * FROM {$tabela} WHERE {$cond}";
        }else {
            $qrRead = "SELECT * FROM {$tabela}";
        }
        if (LOG){
            $stRead   =  mysqli_query($conn, $qrRead) or die('<div class="alert alert-danger">Falha na execução do comando. Entre em contato com o suporte!</div>'
                . Dbasis::logAcesso(BASE.'/logbderro.txt', "ERRO NA READ, " . $_SERVER['REQUEST_URI'] . ", DATA: " . date('Y-m-d H:i:s') . " , TABELA: $tabela, QUERY:  $stRead  " . mysqli_error($conn)));
        } else {
            $stRead   = mysqli_query($conn, $qrRead)  or die('<div class="alert alert-danger">Falha na execução do comando. Entre em contato com o suporte!</div>');
        }
        if (isset($stRead)) {
            return $stRead;
        }
    }

    /**
     * Método responsavel pelas atualizações
     * @param string $tabela
     * @param array $datas
     * @param string $where
     */
    public function update($tabela, array $datas, $where)
    {
        $conn = mysqli_connect(HOST, USER, PASS, DBSA) or die('Erro ao conectar: ' . mysqli_connect_error($conn));
        foreach ($datas as $fields => $values) {
            $campos[] = "$fields = '$values'";
        }
        $campos = implode(", ", $campos);
        $qrUpdate = "UPDATE " . $tabela . " SET " . $campos . " WHERE " . $where;
    
        if (LOG) {
            $stUpdate = mysqli_query($conn, $qrUpdate) or die('<div class="alert alert-danger">Falha na execução do comando. Entre em contato com o suporte!</div>'
                . Dbasis::logAcesso(BASE.'/logbderro.txt', "ERRO NO UPDATE, " . $_SERVER['REQUEST_URI'] . ", DATA: " . date('Y-m-d H:i:s') . " , TABELA: $tabela, QUERY:  $stUpdate  " . mysqli_error($conn)));
        } else {
            $stUpdate = mysqli_query($conn, $qrUpdate) or die('<div class="alert alert-danger">Falha na execução do comando. Entre em contato com o suporte!</div>');
        }
        if (isset($stUpdate)) {
            return TRUE;
        }
    }

    /**
     * Método responsavel pelas exclusões nas tabelas
     * @param string $tabela
     * @param string $where
     */
    public function delete($tabela, $where)
    {
        $conn = mysqli_connect(HOST, USER, PASS, DBSA) or die('Erro ao conectar: ' . mysqli_connect_error($conn));
        $qrDelete = "DELETE FROM {$tabela} WHERE {$where}";
        if (LOG) {
            $stDelete = mysqli_query($conn, $qrDelete)  or die('<div class="alert alert-danger">Falha na execução do comando. Entre em contato com o suporte!</div>'
                . Dbasis::logAcesso(BASE.'/logbderro.txt', "ERRO NO UPDATE, " . $_SERVER['REQUEST_URI'] . ", DATA: " . date('Y-m-d H:i:s') . " , TABELA: $tabela, QUERY:  $stDelete  " . mysqli_error($conn)));
        } else {
            $stDelete = mysqli_query($conn, $qrDelete) or die('<div class="alert alert-danger">Falha na execução do comando. Entre em contato com o suporte!</div>');
        }
        if (isset($stDelete)) {
            return TRUE;
        }
    }

    /**
     * Método responsavel pelas ligações avançadas entre tabelas
     * @param array $campo
     * @param string $tabela
     * @param string $cond
     */
    public function select($campo, $tabela, $cond = NULL)
    {
        $conn = mysqli_connect(HOST, USER, PASS, DBSA) or die('Erro ao conectar: ' . mysqli_connect_error($conn));
        $qrRead = "SELECT {$campo} FROM {$tabela} {$cond}";
    
        if (LOG) {
            $stRead = mysqli_query($conn, $qrRead) or die('<div class="alert alert-danger">Falha na execução do comando. Entre em contato com o suporte!</div>'
                . Dbasis::logAcesso(BASE.'/logbderro.txt', "ERRO NO SELECT, " . $_SERVER['REQUEST_URI'] . ", DATA: " . date('Y-m-d H:i:s') . " , TABELA: $tabela, QUERY:  $stRead  " . mysqli_error($conn)));
        } else {
            $stRead = mysqli_query($conn, $qrRead) or die('<div class="alert alert-danger">Falha na execução do comando. Entre em contato com o suporte!</div>');
        }
        if (isset($stRead)) {
            return $stRead;
        }
    }

    /**
     * Método responsável pela leitura paginada da tabela
     * @param string $tabela
     * @param string $cond
     * @param int $limit Número máximo de resultados por página
     * @param int $offset Posição inicial dos resultados
     * @return bool/array Resultado da query ou false em caso de falha
     */
    public function readPag($tabela, $cond = NULL, $limit = 10, $offset = 0)
    {
        $conn = mysqli_connect(HOST, USER, PASS, DBSA) or die('Erro ao conectar: ');

        // Monta a query com condições, limites e offset
        if ($cond) {
            $qrRead = "SELECT * FROM {$tabela} {$cond} LIMIT {$limit} OFFSET {$offset}";
        } else {
            $qrRead = "SELECT * FROM {$tabela} LIMIT {$limit} OFFSET {$offset}";
        }

        if (LOG) {
            $stRead = mysqli_query($conn, $qrRead) or die('<div class="alert alert-danger">Falha na execução do comando. Entre em contato com o suporte!</div>'
                . Dbasis::logAcesso(BASE . '/logbderro.txt', "ERRO NA READ, " . $_SERVER['REQUEST_URI'] . ", DATA: " . date('Y-m-d H:i:s') . " , TABELA: $tabela, QUERY:  $qrRead  " . mysqli_error($conn)));
        } else {
            $stRead = mysqli_query($conn, $qrRead) or die('<div class="alert alert-danger">Falha na execução do comando. Entre em contato com o suporte!</div>');
        }

        if (isset($stRead)) {
            return $stRead;
        }

        return false;
    }
}