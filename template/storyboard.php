<?php
    //$Project = Project::getfromtkn($tkn);
?>
<style>
    .TaskStage{
        min-height: 200px;
        padding-bottom: 50px;
    }
</style>

<div class="container-fluid container-sm">

    <div class="mt-5 row justify-content-center">
        <div class="col-12 col-sm-3">
            <div class="row">
                <div class="col-12 text-center">Queued</div>
                <div class="col-12 border TaskStage">
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-3">
            <div class="row">
                <div class="col-12 text-center">In progress</div>
                <div class="col-12 border TaskStage">

                </div>
            </div>
        </div>
        <div class="col-12 col-sm-3">
            <div class="row">
                <div class="col-12 text-center">Completed</div>
                <div class="col-12 border TaskStage">

                </div>
            </div>
        </div>
    </div>
</div>