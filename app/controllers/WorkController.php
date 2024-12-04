<?php

namespace app\controllers;
use app\models\Work;

class WorkController extends Controller {
    public function getWorks() {
        $workModel = new Work();
        $works = $workModel->getAllWorks();
        $this->returnJSON($works);
        exit();
    }
}