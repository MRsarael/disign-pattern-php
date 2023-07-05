<?php

use Mysql\MysqlQueryBuilder;
use Postgres\PostgresQueryBuilder;

require_once 'autoload.php';

function clientCode(SQLQueryBuilderInterface $queryBuilder)
{
    $query = $queryBuilder
        ->select("users", ["name", "email", "password"])
        ->where("age", 18, ">")
        ->where("age", 30, "<")
        ->limit(10, 20)
        ->getSQL();

    return $query;
}

echo "Testando MysqlQueryBuilder construtor de queries:\n";
echo clientCode(new MysqlQueryBuilder());

echo "\n\n";

echo "Testando PostgresQueryBuilder construtor de queries:\n";
echo clientCode(new PostgresQueryBuilder());

