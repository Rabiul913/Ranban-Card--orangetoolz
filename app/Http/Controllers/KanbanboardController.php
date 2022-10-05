<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kanbanboard;


class KanbanboardController extends Controller
{
    //
    public function index()
    {
        $kanbans=Kanbanboard::get();
        // dd($kanban_data);

        return view('home',compact('kanbans'));
        
    }


}
