<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PipelineTaskController2 extends Controller
{
    private $request;
    // De $request kan een echte request zijn
    // of een array met data of iets anders
    // public function task1(Request $request, $next) of
    // public function task1($request, $next)
    private function task3($request)
    {
        $this->request['title'] = $request['title'] . ' - Task 3';
    }

    private function task4($request)
    {
        $this->request['title'] = $request['title'] . ' - Task 4';
    }

    public function handle($request, $next)
    {
        $this->request = $request;
        $this->task3($this->request);
        $this->task4($this->request);
        // dd($this->request['title']);
        return $next($this->request);
    }

}
