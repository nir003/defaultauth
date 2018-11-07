<?php
/**
 * Created by PhpStorm.
 * User: Nirjhor
 * Date: 11/5/2018
 * Time: 12:33 PM
 */



?>


<?php $__env->startSection('content'); ?>
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
                    <strong>Success!</strong> <?php echo e(Session::get('success')); ?>

                </div>
                <?php
                echo Session::put('success', '');

                }else {
                    echo "else";

                }

                ?>


                <form class="form-horizontal" method="POST" action="<?php echo e(url('/check_save')); ?>">
                    <?php echo e(csrf_field()); ?>


                    
                    <?php $__currentLoopData = $user->check_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $checklist_one): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="<?php echo e($checklist_one->id); ?>"
                                       name="check_list[]" <?php echo e((in_array($checklist_one->id,$checklist_id_array)) ?  "checked": ""); ?> >
                                <?php echo e($checklist_one->name); ?>

                            </label>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <input type="submit" value="save" class=" btn btn-block btn-primary">

                </form>


                


                <br>
                <hr>

                <form class="form-horizontal" method="POST" action="<?php echo e(url('/add_new_check')); ?>">
                    <?php echo e(csrf_field()); ?>

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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>