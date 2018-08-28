<?php 
    //getting the information on the notification
    $notificationData = $Notification->details($notificationID);

    //check posted by information
    $createdByData = $User->details($notificationData['createdBy']);

    //Mark that the notification was read
    $Notification->markRead($notificationID);
?>

<div class="container-fluid">
    <?php include_once 'modules/topBreadcump.php'; ?>
    <!-- row -->
    <div class="row">
        <!-- Left sidebar -->
        <div class="col-md-12">
            <div class="white-box">
                <div class="row">
                    <!-- <div class="col-lg-2 col-md-3  col-sm-4 col-xs-12 inbox-panel">
                        <div> <a href="#" class="btn btn-custom btn-block waves-effect waves-light">Compose</a>
                            <div class="list-group mail-list m-t-20"> <a href="inbox.html" class="list-group-item active">Inbox <span class="label label-rouded label-success pull-right">5</span></a> <a href="#" class="list-group-item ">Starred</a> <a href="#" class="list-group-item">Draft <span class="label label-rouded label-warning pull-right">15</span></a> <a href="#" class="list-group-item">Sent Mail</a> <a href="#" class="list-group-item">Trash <span class="label label-rouded label-default pull-right">55</span></a> </div>
                            <h3 class="panel-title m-t-40 m-b-0">Labels</h3>
                            <hr class="m-t-5">
                            <div class="list-group b-0 mail-list"> <a href="#" class="list-group-item"><span class="fa fa-circle text-info m-r-10"></span>Work</a> <a href="#" class="list-group-item"><span class="fa fa-circle text-warning m-r-10"></span>Family</a> <a href="#" class="list-group-item"><span class="fa fa-circle text-purple m-r-10"></span>Private</a> <a href="#" class="list-group-item"><span class="fa fa-circle text-danger m-r-10"></span>Friends</a> <a href="#" class="list-group-item"><span class="fa fa-circle text-success m-r-10"></span>Corporate</a> </div>
                        </div>
                    </div> -->
                    <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12 mail_listing">
                        <div class="media m-b-30 p-t-20">
                            <h4 class="m-t-0"><?php echo $notificationData['title'] ?></h4>
                            <hr>
                            <a class="pull-left" href="#"> <img class="media-object thumb-sm img-circle" src="<?php echo $createdByData['profile_picture'] ?>" alt=""> </a>
                            <div class="media-body"> <span class="media-meta pull-right"><?php echo date($standard_time, strtotime($notificationData['createdDate'])); ?></span>
                                <h4 class="text-danger m-0"><?php echo $createdByData['names'] ?></h4> <small class="text-muted">Type: <?php echo ucwords($notificationData['type']); ?></small> </div>
                        </div>
                        <p>
                            <?php
                                echo $notificationData['content'];
                            ?>
                        </p>
                        <!-- <hr> -->
                        <!-- <div class="b-all p-20">
                            <p class="p-b-20">click here to <a href="#">Reply</a> or <a href="#">Forward</a></p>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>