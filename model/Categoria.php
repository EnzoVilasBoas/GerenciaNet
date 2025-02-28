<?php

class Categoria extends Dbasis
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
        $list = Dbasis::readPag("menu_categories", "WHERE user_id = $userId ORDER BY id ASC", 5, $offset);
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
}
