<?php

namespace Postgres;

use SQLQueryBuilderInterface;
use Mysql\MysqlQueryBuilder;

// Extendendo MysqlQueryBuilder todos os métodos serão herdados. Somente limit será refeito.
class PostgresQueryBuilder extends MysqlQueryBuilder
{
    public function limit(int $start, int $offset): SQLQueryBuilderInterface
    {
        parent::limit($start, $offset);
        $this->query->limit = " LIMIT " . $start . " OFFSET " . $offset;
        return $this;
    }
}
