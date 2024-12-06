<?php

namespace app\core;

use app\controllers\MainController;
use app\controllers\UserController;
use app\controllers\CourseController;
use app\controllers\WorkController;
use app\controllers\AskController;

class Router {
    public $urlArray;

    function __construct()
    {
        $this->urlArray = $this->routeSplit();
        $this->handleMainRoutes();
        $this->handleCourseRoutes();
        $this->handleWorkRoutes();
        $this->handleAskRoutes();
    }

    protected function routeSplit() {
        $removeQueryParams = strtok($_SERVER["REQUEST_URI"], '?');
        return explode("/", $removeQueryParams);
    }

    protected function handleMainRoutes() {
        if ($this->urlArray[1] === '' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $mainController = new MainController();
            $mainController->homepage();
        }
    }

    protected function handleCourseRoutes() {
        if ($this->urlArray[1] === 'api' && $this->urlArray[2] === 'courses' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $courseController = new CourseController();
            $courseController->getCourses();
        }
    }

    protected function handleWorkRoutes() {
        if ($this->urlArray[1] === 'api' && $this->urlArray[2] === 'works' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $workController = new WorkController();
            $workController->getWorks();
        }
    }

    protected function handleAskRoutes() {
        if ($this->urlArray[1] === 'api' && $this->urlArray[2] === 'asks' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $askController = new AskController();
            $askController->getAsks();
        }

        if ($this->urlArray[1] === 'asks' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $askController = new AskController();
            $askController->asksView();
        }

        if ($this->urlArray[1] === 'api' && $this->urlArray[2] === 'asks' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $askController = new AskController();
            $askController->saveAsk();
        }
    }
}