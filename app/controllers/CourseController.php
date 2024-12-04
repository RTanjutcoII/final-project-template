<?php

namespace app\controllers;
use app\models\Course;

class CourseController extends Controller {
    public function getCourses() {
        $courseModel = new Course();
        $courses = $courseModel->getAllCourses();
        $this->returnJSON($courses);
        exit();
    }
}