<?php

/*
    O Visitor ajuda a introduzir recurso de relatório na hierarquia de classes:
    Company > Department > Employee
*/

require_once 'autoload.php';

use App\Components\Company;
use App\Components\Department;
use App\Components\Employee;
use App\Visitors\SalaryReport;

// Componente
$mobileDev = new Department("Desenvolvimento", [
    new Employee("Rafael Moreira", "Designer", 100000),
    new Employee("Mark Zuckerberg", "Testes", 100000),
    new Employee("Bill Gates", "Qualidade", 90000),
    new Employee("Steve Wozniak", "Full-stack", 31000),
    new Employee("James Da Salada de frutas", "Qualidade", 30000),
]);

// Componente
$techSupport = new Department("Suporte", [
    new Employee("Adalberto Piotto", "Supervisor", 70000),
    new Employee("Elon Musk", "Operador", 30000),
    new Employee("Steve Jobs", "Operador", 30000),
    new Employee("Tim Cook", "Operador", 34000),
    new Employee("Jeff Bezos", "Operador", 35000),
]);

// Componente
$company = new Company("Pica Das Galaxias SA", [$mobileDev, $techSupport]);

// Visitor
$report = new SalaryReport();

echo "Client: Exportando relatório da compania:\n\n";
echo $company->accept($report);

echo "\nClient: Exportando relatório dos empregados, departamentos e da compania toda:\n\n";

$someEmployee = new Employee("Some employee", "operator", 35000);
$differentEntities = [$someEmployee, $techSupport, $company];

foreach ($differentEntities as $entity) echo $entity->accept($report) . "\r\n";

