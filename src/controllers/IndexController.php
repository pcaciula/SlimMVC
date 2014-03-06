<?php

namespace MyApp\Controllers;

use \MyApp\Core\R;

class IndexController extends \MyApp\Core\Controller {

    public function getIndex()
    {
        $this->render('index');
    }

    public function postSave()
    {
        echo '<h1>Action com POST</h1>';
    }
}