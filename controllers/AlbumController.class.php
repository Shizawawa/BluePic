<?php
/**
 * Created by PhpStorm.
 * User: shizawa
 * Date: 18/01/2018
 * Time: 09:20
 */

class AlbumController
{
    public function indexAction()
    {
        $v = new View("album");

        $v->assign("title", "Album");
    }
}