<?php

namespace app\controllers;
use app\models\Ask;

class AskController extends Controller {

    public function validateAsk($inputData) {
        $errors = [];
        $firstName = $inputData['firstName'];
        $lastName = $inputData['lastName'];
        $question = $inputData['question'];

        if ($firstName) {
            $firstName = htmlspecialchars($firstName, ENT_QUOTES|ENT_HTML5, 'UTF-8');
            if (strlen($firstName) < 2) {
                $errors['firstNameShort'] = 'First name is too short';
            }
        } else {
            $errors['requiredFirstName'] = 'First name is required';
        }

        if ($lastName) {
            $lastName = htmlspecialchars($lastName, ENT_QUOTES|ENT_HTML5, 'UTF-8');
            if (strlen($lastName) < 2) {
                $errors['lastNameShort'] = 'Last name is too short';
            }
        } else {
            $errors['requiredLastName'] = 'Last name is required';
        }

        if ($question) {
            $question = htmlspecialchars($question, ENT_QUOTES|ENT_HTML5, 'UTF-8');
            if (strlen($question) < 2) {
                $errors['questionShort'] = 'Question is too short';
            }
        } else {
            $errors['requiredQuestion'] = 'Question is required';
        }

        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }
        return [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'question' => $question,
        ];
    }

    public function getAsks() {
        $askModel = new Ask();
        $asks = $askModel->getAllAsks();
        $this->returnJSON($asks);
        exit();
    }

    public function asksView() {
        $this->returnView('./assets/views/users/asksView.html');
    }

    public function saveAsk() {
        $inputData = [
            'firstName' => $_POST['firstName'] ? $_POST['firstName'] : false,
            'lastName' => $_POST['lastName'] ? $_POST['lastName'] : false,
            'question' => $_POST['question'] ?$_POST['question'] : false,
        ];
        
        $askData = $this->validateAsk($inputData);
        $ask = new Ask();
        $ask->saveAsk(
            [
                'firstName' => $askData['firstName'],
                'lastName' => $askData['lastName'],
                'question' => $askData['question']
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }
}