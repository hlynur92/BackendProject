<?php
include_once __DIR__ . "/../Persistence/NewsDAO.php";

class NewsController {

    public function getAllNews(){
        $newsDAO = new NewsDAO();
        $news = $newsDAO->getAllNews();
        return $news;
    }
    public function getSpecificNews($newsid){
        $newsDAO = new NewsDAO();
        $news = $newsDAO->getSpecificNews($newsid);
        return $news;
    }
    public function getLatestNews(){
        $newsDAO = new NewsDAO();
        $news = $newsDAO->getLatestNews();
        return $news;
    }
    public function deleteNews(){
        $newsDAO = new NewsDAO();
        $newsDAO->deleteNews();
    }

}