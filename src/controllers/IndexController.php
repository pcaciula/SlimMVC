<?php

namespace MyApp\Controllers;

class IndexController extends \MyApp\Core\Controller {

    public function getIndex()
    {
        $this->render('index');
    }

    public function postSave()
    {
        $record = $this->mdl->create();
        $record->name = 'test';
        $record->description = 'testing';
        $record->save();
    }
}
