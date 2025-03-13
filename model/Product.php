<?php
    class Product extends Dbasis {
        /** 
         * Metodo responsavel por retornar a lista de produtos
         * @param int $userId
         * @return array/int
         */
        public function list(int $userId) {
            $products = Dbasis::select("mi.id, mi.name AS item_name, mi.price, mc.name AS category_name","menu_items mi JOIN menu_categories mc ON mi.category_id = mc.id","WHERE mi.user_id = $userId");
            if (!$products -> num_rows) {
                return 0;
            }else {
                return $products;
            }
            
        }
    }