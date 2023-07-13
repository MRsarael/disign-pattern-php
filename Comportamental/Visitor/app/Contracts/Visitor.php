<?php

namespace App\Contracts;

use App\Components\Company;
use App\Components\Department;
use App\Components\Employee;

/**
 * Interface dos Visitors - O Concrete Visitor deve conhecer todos os Concrete Components
 */
interface Visitor
{
    public function visitCompany(Company $company): string;
    public function visitDepartment(Department $department): string;
    public function visitEmployee(Employee $employee): string;
}


