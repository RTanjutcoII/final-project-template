<?php

namespace app\models;

class Course extends Model {

    protected $table = 'courses';

    public function getAllCourses() {
        return $this->findAll();
    }
}