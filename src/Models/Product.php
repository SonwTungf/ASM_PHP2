<?php

namespace Pc\XUONG_OOP\Models;

use Pc\XUONG_OOP\Commons\Model;

class Product extends Model
{
    protected string $tableName = 'products';

    public function all()
    {
        $queryBuilder = $this->conn->createQueryBuilder();

        return $queryBuilder
            ->select(
                'p.id',
                'p.name',
                'p.img_thumbnail',
                'p.price_regular',
                'p.price_sale',
                'p.created_at',
                'p.updated_at'
            )
            ->from($this->tableName, 'p')
            ->join('p', 'categories', 'c', 'p.category_id = c.id')
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
