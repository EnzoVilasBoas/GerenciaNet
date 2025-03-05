<?php

class Category extends Dbasis
{
    /**
     * Funcao responsavel pelo retorno das categorias
     * @param int $userId
     * @param int $pag
     * @return array/int
     */
    public function list(int $userId, int $pag = 1)
    {
        $offset = 5 * $pag;
        $list = Dbasis::readPag("menu_categories", "WHERE user_id = $userId", 5, $offset);
        if ($list->num_rows > 0) {
            return $list;
        } else {
            return 0;
        }
    }
    /**
     * Método para gerar o HTML do paginador
     * @param int $retornos - numero de retorno por pagina
     * @param int $currentPage - pagina atual
     * @return string
     */
    public function renderPaginator($retornos, $currentPage = 1)
    {
        $sql = Dbasis::select("COUNT(*) AS total", "menu_categories");
        $data = mysqli_fetch_assoc($sql);
        $totalPages = floor($data["total"] / $retornos);

        if ($totalPages <= 1) {
            return ''; // Sem necessidade de paginador
        }

        $html = '<nav aria-label="Page navigation example"><ul class="pagination">';

        // Botão "Anterior"
        $prevClass = $currentPage == 0 ? 'disabled' : '';
        $html .= '<li class="page-item ' . $prevClass . '">';
        $html .= '<a class="page-link" href="' . ($currentPage > 1 ? BASE . "/categoria/" . ($currentPage - 1) : 'javascript:;') . '">Previous</a>';
        $html .= '</li>';

        // Links de página
        for ($i = 0; $i <= $totalPages; $i++) {
            $activeClass = $i == $currentPage ? 'active' : '';
            $pag = $i + 1;
            $html .= '<li class="page-item ' . $activeClass . '">';
            $html .= '<a class="page-link" href="' . BASE . "/categoria/" . $i . '">' . $pag . '</a>';
            $html .= '</li>';
        }

        // Botão "Próximo"
        $nextClass = $currentPage == $totalPages ? 'disabled' : '';
        $html .= '<li class="page-item ' . $nextClass . '">';
        $html .= '<a class="page-link" href="' . ($currentPage < $totalPages ? BASE . "/categoria/" . ($currentPage + 1) : 'javascript:;') . '">Next</a>';
        $html .= '</li>';

        $html .= '</ul></nav>';

        return $html;
    }

    /**
     * Metodo responsavel pelo cadastro de categorias
     * @param array $post
     * @return int
     */
    public function categoryCreate(array  $post) {
        $insert = Dbasis::create("menu_categories", $post);
        return $insert;
    }

    /**
     * Metodo responsavel pela leitura de uma categoria
     * @param int $id
     * @param int $userId
     * @return array/int
     */
    public function categoryRead(int $categoryId,int $userId) {
        $read = Dbasis::read("menu_categories", 'id = "'.$categoryId.'" AND user_id = "'.$userId.'"');
        if ($read->num_rows) {
            foreach ($read as $r);
            return $r;
        } else {
            return 0;
        }
    }

    /**
     * Metodo responsavel pela atualizacao de uma categoria
     * @param array $post
     * @param int $id
     * @param int $userId
     * @return int
     */
    public function categoryUpdate(array $post, int $id, int $userId) {
        $update = Dbasis::update("menu_categories", $post, 'id = "'.$id.'" AND user_id = "'.$userId.'"');
        return $update;
    }
}
