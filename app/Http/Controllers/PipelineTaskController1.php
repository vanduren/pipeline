<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PipelineTaskController1 extends Controller
{
    private $request;
    // De $request kan een echte request zijn
    // of een array met data of iets anders
    // public function task1(Request $request, $next) of
    // public function task1($request, $next)

    private function task1($request)
    {
        $this->request['title'] = $request['title'] . ' - Task 1';
    }

    private function task2($request)
    {
        $this->request['title'] = $request['title'] . ' - Task 2';
    }

    public function handle($request, $next)
    {
        $this->request = $request;
        $this->task1($this->request);
        $this->task2($this->request);
        // dd($this->request['title']);
        return $next($this->request);
    }

}
