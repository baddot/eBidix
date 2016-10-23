<?php

Class autobid
{
    public function add($values) {
        return Database::getInstance()->insert('autobids', $values);
    }
}

?>