<?php

class address
{
    public function getByUserId($id) {
        return Database::getInstance()->select('fetch', 'addresses', '*', array('user_id' => (int)$id));
    }
}