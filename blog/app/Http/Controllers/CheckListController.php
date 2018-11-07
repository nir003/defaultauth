<?php

namespace App\Http\Controllers;

use App\CheckList;
use App\User;
use App\UserChecklist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CheckListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function index()
    {
        //
        $test_user_id = Session::get('user_id');

        $checklist_all = CheckList::all();
        $user = User::find($test_user_id);

        $user_checklists = UserChecklist::where('user_id',$test_user_id)->where('checked',1)->get();

        return view('checklist.checklist')
            ->with('checklist_all',$checklist_all)
            ->with('user',$user)
            ->with('user_checklists',$user_checklists);
    }

    public function check_save(Request $request){

        $test_user_id = Session::get('user_id');

        //echo "hello";
        $check_boxes = $request->input('check_list');
        /*echo "<pre>";
        print_r($check_boxes);
        echo "</pre>";*/

       /* echo "<hr>";
        echo sizeof($check_boxes);
        echo "<hr>";*/
        //exit;

        $user_checklists = UserChecklist::where('user_id',$test_user_id)->get();

        $i = 0;
        foreach($user_checklists as $user_checklist){

            if($user_checklist->check_list_id == $check_boxes[$i] ){

                //echo "".$user_checklist->user_id." : ".$check_boxes[$i]."<br>";
                $user_checklist->checked = 1;
                $user_checklist->save();
                $i++;
            }else{
                $user_checklist->checked = 0;
                $user_checklist->save();
            }

            if($i >= sizeof($check_boxes)){
                break;
            }

        }
        Session::flash('success','Your Check List Saved Successfully');
        return Redirect::back();

        /*exit;
        $user = User::find($test_user_id);
        echo $user->name;
        $user->check_lists()->sync($check_boxes,false);*/

    }

    public function add_new_check(Request $request){

        $checklist = new CheckList();

        $checklist->name = $request->name;
        $checklist->created_by = Session::get('user_id');
        //$checklist->checked = 0;

        $checklist->save();

        $test_user_id = Session::get('user_id');
        $user = User::find($test_user_id);

        $user->check_lists()->sync($checklist,false);

        Session::flash('success','You Added New Item on your Check List Successfully');

        return Redirect::back();

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
        //
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
    public function update(Request $request, $id)
    {
        //
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
