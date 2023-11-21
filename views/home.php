<?php

ob_start();?>
<style>

    body{
        margin-top:20px;
        background:#eee;
        color: #708090;
    }
    .icon-1x {
        font-size: 24px !important;
    }
    a{
        text-decoration:none;    
    }
    .text-primary, a.text-primary:focus, a.text-primary:hover {
        color: #00ADBB!important;
    }
    .text-black, .text-hover-black:hover {
        color: #000 !important;
    }
    .font-weight-bold {
        font-weight: 700 !important;
    }
</style>
<?php $style = ob_get_clean();?>

<?php
ob_start();?>
        <div class="container">
        <div class="row">
            <!-- Main content -->
            <div class="col-lg-12 mb-3">
                <form action="controllers/addQuestion.php" method="POST">
                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text">your question</span>
                        <textarea class="form-control" aria-label="With textarea" name="question"></textarea>
                        <button class="btn btn-primary" type="submit">send</button>
                    </div>
                </form>
                <div class="row text-left mb-5">
                    <div class="col-lg-6 mb-3 mb-sm-0">
                    <div class="dropdown bootstrap-select form-control form-control-lg bg-white bg-op-9 text-sm w-lg-50" style="width: 100%;">
                    <select class="form-control form-control-lg bg-white bg-op-9 text-sm w-lg-50" data-toggle="select" tabindex="-98">
                        <option> Categories </option>
                        <option> Learn </option>
                        <option> Share </option>
                        <option> Build </option>
                    </select>
                    </div>
                    </div>
                    <div class="col-lg-6 text-lg-right">
                    <div class="dropdown bootstrap-select form-control form-control-lg bg-white bg-op-9 ml-auto text-sm w-lg-50" style="width: 100%;">
                        <select class="form-control form-control-lg bg-white bg-op-9 ml-auto text-sm w-lg-50" data-toggle="select" tabindex="-98">
                            <option> Filter by </option>
                            <option> Votes </option>
                            <option> Replys </option>
                            <option> Views </option>
                        </select>
                    </div>
                    </div>
                </div>
                <!-- End of post 1 -->
                <?php foreach($questions as $question):?>
                    <div class="card row-hover pos-relative py-3 px-3 mb-3 border-warning border-top-0 border-right-0 border-bottom-0 rounded-0">
                        <div class="row align-items-center">
                        <div class="col-md-8 mb-3 mb-sm-0">
                            <h5>
                            <a href="index.php?action=question&id=<?=$question->id?>" class="text-primary"><?= $question->question?></a>
                            </h5>
                            <p class="text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#"><?= $question->date?></a> <span class="op-6"> by</span> <a class="text-black" href="#"><?= nameById($question->user_id)?></a></p>

                        </div>
                        <div class="col-md-4 op-7">
                            <div class="row text-center op-7">
                            <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span class="d-block text-sm"><?= getNumOfResponse($question->id)?> Replys</span> </div>
                            <div class="col px-1"> <i class="ion-ios-eye-outline icon-1x"></i> <span class="d-block text-sm">290 Views</span> </div>
                            </div>
                        </div>
                        </div>
                    </div>
                <?php endforeach;?>
                    <!-- /End of post 1 -->
                </div>
            
        </div>
        </div>
<?php $content = ob_get_clean();?>
<?php include_once 'layouts/layout.php'?>

