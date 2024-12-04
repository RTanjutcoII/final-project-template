<?php

namespace app\models;

class Work extends Model {

    protected $table = 'works';

    public function getAllWorks() {
        return $this->findAll();
    }
}