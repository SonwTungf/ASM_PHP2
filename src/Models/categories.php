<?php

namespace  Pc\XUONG_OOP\Models;

use Pc\XUONG_OOP\Commons\Model;

class categories  extends Model
{
    protected string $tableName = 'categories';

    public function findById($id)
    {
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where('id = ?')
            ->setParameter(0, $id)
            ->fetchAssociative();
    }
    public function All()
    {
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->fetchAllAssociative();
    }
    public function countAll()
    {
        $result = $this->queryBuilder
            ->select('COUNT(*) AS total')
            ->from($this->tableName)
            ->fetchAssociative();

        return $result['total'];
    }
}
