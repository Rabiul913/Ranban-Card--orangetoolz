<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Kanbanboard;
use Illuminate\Support\Facades\DB;
class KanbanboardapiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->content);
        $request->validate([
            'content' => 'required',
        ]);

        $kanban=new Kanbanboard();
        $kanban->content=$request->content;
        $kanban->save();
        
        if($kanban){
         return response()->json(['success' => true, 'message' => 'Ranban card created successfully.']);
        }
        else{
            return response()->json(['success' => false, 'message' => 'Ranban card created fail']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $kanban=DB::table('kanbanboards')->where('content', $request->content)
        ->update([
            'status' =>$request->status,
         ]);
                // $kanban = Kanbanboard::find($request->content);
                // $kanban->status=$request->status;
                // $kanban->save();
            if($request->status==2){

                if($kanban){

                return response()->json(['success' => true, 'message' => 'Ranban card in progress successfully.']);
                }
                else{
                    return response()->json(['success' => false, 'message' => 'Ranban card in progress fail']);
                }
            }elseif($request->status==3){
               
                if($kanban){

                return response()->json(['success' => true, 'message' => 'Ranban card done successfully.']);
                }
                else{
                    return response()->json(['success' => false, 'message' => 'Ranban card done fail']);
                }
            }
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
