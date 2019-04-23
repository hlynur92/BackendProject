<?php
include_once __DIR__ . "/../Persistence/CompanyDAO.php.php";
class CompanyController{

    public function getCompanyInfo(){
        $CompanyDao = new CompanyDAO();
        $company = $CompanyDao->GetCompanyInfo();
        return $company;
    }
}