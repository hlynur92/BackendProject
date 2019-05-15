<?php
include_once __DIR__ . "/../Persistence/CompanyDAO.php";
class CompanyController{

    public function getCompanyInfo(){
        $CompanyDao = new CompanyDAO();
        $company = $CompanyDao->GetCompanyInfo();
        return $company;
    }

    public function deleteCompany($companyid){
        $CompanyDao = new CompanyDAO();
        $CompanyDao->deleteCompany($companyid);
    }

    public function createNewCompany($companyname, $phonenr, $email, $openinghours, $street, $zipcode, $city, $country, $description){
        $CompanyDao = new CompanyDAO();
        $CompanyDao->createNewCompany($companyname, $phonenr, $email, $openinghours, $street, $zipcode, $city, $country, $description);
    }
}