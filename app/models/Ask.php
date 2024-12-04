<?php

namespace app\models;

class Ask extends Model {

    protected $table = 'asks';

    public function getAllAsks() {
        return $this->findAll();
    }

    public function saveAsk($inputData){
        $query = "insert into asks (firstName, lastName, question) values (:firstName, :lastName, :question);";
        return $this->query($query, $inputData);
    }
}