<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class PipelineController extends Controller
{
    public function pipeline()
    {
        $pipeline = app(Pipeline::class);
        // send something in the pipeline
        $pipeline->send(['title' => 'Een test met een pipeline'])
                 ->through([
                     function($content, $next) {
                        $content['title'] = 'Een nieuwe titel';
                         return $next($content);
                     },
                     function($content, $next) {
                         $content['title'] = ucwords($content['title']);
                         return $next($content);
                     },
                     PipelineTaskController1::class,
                     PipelineTaskController2::class,
                 ])
                 ->then(function ($content) {
                     dump($content);
                 });
        return 'Pipeline is klaar';
    }
}
