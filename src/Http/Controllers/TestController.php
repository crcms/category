<?php

namespace CrCms\Category\Http\Controllers;


use CrCms\Foundation\App\Http\Controllers\Controller;

class TestController extends Controller
{

//    public function test($name = null)
//    {
//        echo 123;
//    }

    public function setFrame($frame)
    {
        dump($frame);
    }

    public function __invoke()
    {

        //dump('sss',$frame->fd ?? 'none');
//        dump($frame[1]);
    }

}