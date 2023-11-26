<?php ob_start();?>
        <style> 
        body {
            margin-top: 20px;
            background: #eee;
            color: #708090;
        }
        .icon-1x {
            font-size: 24px !important;
        }
        a {
            text-decoration: none;    
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

<?php ob_start();?>
        
    <div class="row">
        <!-- Main content -->
        <div class="col-lg-12 mb-3">
            <!-- Question Card -->
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="#" class="text-primary"><?=$question->question?></a>
                    </h5>
                    <p class="card-text text-sm">
                        <span class="op-6">Posted</span>
                        <a class="text-black" href="#"><?=$question->date?></a>
                        <span class="op-6"> by</span>
                        <a class="text-black" href="#"><?= nameById($question->user_id)?></a>
                    </p>
                    <div class="row text-center op-7">
                        <div class="col px-1">
                            <i class="ion-ios-chatboxes-outline icon-1x"></i>
                            <span class="d-block text-sm"><?= getNumOfResponse($question->id)?> Replies</span>
                        </div>
                        <div class="col px-1">
                            <i class="ion-ios-eye-outline icon-1x"></i>
                            <span class="d-block text-sm">290 Views</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /End of Question Card -->
            <form action="controllers/addResponse.php?question=<?=$question->id?>" method="POST">

                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text">your answer</span>
                    <textarea class="form-control" aria-label="With textarea" name="response" required></textarea>
                    <button class="btn btn-primary" type="submit" name="btnresponse">send</button>
                </div>
            </form>
            <!-- Answers -->
            <?php
            // Replace this with your actual data
        
            foreach ($answers as $answer):
            ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <p class="card-text"><?= $answer['response'] ?></p>
                        <p class="card-text text-sm">
                            <span class="op-6">Posted</span>
                            <a class="text-black" href="#"><?= $answer['date'] ?></a>
                            <span class="op-6"> by</span>
                            <a class="text-black" href="#"><?= nameById($answer['user_id']) ?></a>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- /End of Answers -->
        </div>
    </div>

<?php $content = ob_get_clean();?>

<?php include_once 'layouts/layout.php'?>

