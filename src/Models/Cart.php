<?php

namespace  Pc\XUONG_OOP\Models;

use Pc\XUONG_OOP\Commons\Model;

class Cart extends Model
{
    protected string $tableName = 'carts';

    public function findByUserID($userID)
    {
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where('user_id = ?')
            ->setParameter(0, $userID)
            ->fetchAssociative();
    }
}
