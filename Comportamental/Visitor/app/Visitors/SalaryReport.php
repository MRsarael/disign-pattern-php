<?php

namespace App\Visitors;

use App\Contracts\Visitor;
use App\Components\Company;
use App\Components\Department;
use App\Components\Employee;

/**
 * Concrete Visitor - fornece implementação para todos os Concrete Components
 */
class SalaryReport implements Visitor
{
    public function visitCompany(Company $company): string
    {
        $output = "";
        $total = 0;

        foreach ($company->getDepartments() as $department) {
            $total += $department->getCost();
            $output .= "\n--".$this->visitDepartment($department);
        }

        return $company->getName()
            ." (".\App\Utils::formatMoney("%i", $total).")\n"
            .$output;
    }

    public function visitDepartment(Department $department): string
    {
        $output = "";
        
        foreach ($department->getEmployees() as $employee) {
            $output .= " ".$this->visitEmployee($employee);
        }

        return $department->getName()
            ." (".\App\Utils::formatMoney("%i", $department->getCost()).")\n\n"
            .$output;
    }

    public function visitEmployee(Employee $employee): string
    {
        return \App\Utils::formatMoney("%#6n", $employee->getSalary())." "
            .$employee->getName()
            ." (".$employee->getPosition().")\n";
    }
}


