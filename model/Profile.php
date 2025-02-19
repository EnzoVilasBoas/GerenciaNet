<?php
    class Profile extends Dbasis {
        /**
         * Metodo responsavel por retornar os dados do usuario
         * @param int $userId
         * @return array/int
         */
        public function user(int $userId) {
            $user = Dbasis::read("users","id = $userId");
            if (!$user -> num_rows) {
                return 0;
            }else {
                foreach ($user as $u);
                unset($u["password_hash"]);
                return $u;
            }
        }
    }