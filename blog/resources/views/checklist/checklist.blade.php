<?php
/**
 * Created by PhpStorm.
 * User: Nirjhor
 * Date: 11/5/2018
 * Time: 12:33 PM
 */



?>
@extends('layouts.app')

@section('content')
    <?php

    use Illuminate\Support\Facades\Session;


    $checklist_id_array = array();
    $i = 0;
    foreach ($user_checklists as $user_checklist) {
        $checklist_id_array[$i] = $user_checklist->check_list_id;
        $i++;
    }
    // print_r($checklist_id_array);
    /*if(in_array(11,$checklist_id_array)){
        echo "<br>true";
    }*/
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <?php

                if (Session::get('success')) {
                ?>

                <div class="alert alert-success">
                    <strong>Success!</strong> {{Session::get('success')}}
                </div>
                <?php
                echo Session::put('success', '');

                }else {
                    echo "else";

                }

                ?>


                <form class="form-horizontal" method="POST" action="{{url('/check_save')}}">
                    {{ csrf_field() }}

                    {{--
                                        {{$user->check_lists()->count()}}
                    --}}
                    @foreach($user->check_lists as $checklist_one)
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="{{$checklist_one->id}}"
                                       name="check_list[]" {{(in_array($checklist_one->id,$checklist_id_array)) ?  "checked": "" }} >
                                {{$checklist_one->name}}
                            </label>
                        </div>
                    @endforeach

                    <input type="submit" value="save" class=" btn btn-block btn-primary">

                </form>


                {{--@foreach($checklist_all as $checklist_one)
                    <div class="checkbox">
                        <label><input type="checkbox" value="{{$checklist_one->id}}"
                                      name="check_list[]">{{$checklist_one->name}}</label>
                    </div>
                @endforeach--}}


                <br>
                <hr>

                <form class="form-horizontal" method="POST" action="{{url('/add_new_check')}}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-8">
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="col-sm-2">
                            <input type="submit" class=" btn btn-block btn-primary" value="+" style="font-size: 100%">
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>

@endsection