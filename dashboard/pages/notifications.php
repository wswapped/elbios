<?php
    $notificationID = $_GET['id']??"";
    
    if($notificationID){
        include 'viewnotification.php';
    }else{
        //get all notifications
        $notifications = $Notification->list($currentUserId);
?>
    <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <!-- Left sidebar -->
                <div class="col-md-12">
                    <div class="white-box">
                        <!-- row -->
                        <div class="row">
                            <div class="col-lg-2 col-md-3  col-sm-12 col-xs-12 inbox-panel">
                                <div>
                                    <a href="#" class="btn btn-custom btn-block waves-effect waves-light">Compose</a>

                                    <div class="list-group mail-list m-t-20">
                                        <a href="#" class="list-group-item active">Inbox <span class="label label-rouded label-success pull-right">5</span></a>
                                        <a href="#" class="list-group-item">Warnings <span class="label label-rouded label-warning pull-right">15</span></a>
                                        <a href="#" class="list-group-item"></a>
                                    </div>
                                    <h3 class="panel-title m-t-40 m-b-0">Labels</h3>
                                    <hr class="m-t-5">
                                    <div class="list-group b-0 mail-list"> <a href="#" class="list-group-item"><span class="fa fa-circle text-info m-r-10"></span>Manual</a> <a href="#" class="list-group-item"><span class="fa fa-circle text-warning m-r-10"></span>Automated</a></div>
                                </div>
                            </div>
                            <div class="col-lg-10 col-md-9 col-sm-12 col-xs-12 mail_listing">
                                <div class="inbox-center">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th width="30">
                                                    <div class="checkbox m-t-0 m-b-0 ">
                                                        <input id="checkbox0" type="checkbox" class="checkbox-toggle" value="check all">
                                                        <label for="checkbox0"></label>
                                                    </div>
                                                </th>
                                                <th colspan="4">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary dropdown-toggle waves-effect waves-light m-r-5" data-toggle="dropdown" aria-expanded="false"> Filter <b class="caret"></b> </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li><a href="#fakelink">Read</a></li>
                                                            <li><a href="#fakelink">Unread</a></li>
                                                            <li><a href="#fakelink">Something else here</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="#fakelink">Separated link</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-default waves-effect waves-light  dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <i class="fas fa-sync"></i> </button>
                                                    </div>
                                                </th>
                                                <th class="hidden-xs" width="100">
                                                    <div class="btn-group pull-right">
                                                        <button type="button" class="btn btn-default waves-effect"><i class="fa fa-chevron-left"></i></button>
                                                        <button type="button" class="btn btn-default waves-effect"><i class="fa fa-chevron-right"></i></button>
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                for($n = 0; $n<count($notifications); $n++){
                                                    $notification = $notifications[$n];
                                                    $userData = $User->details($notification['createdBy']);
                                                    $sentDate = $notification['createdDate'];
                                                    ?>
                                                        <tr class="unread">
                                                            <td>
                                                                <div class="checkbox m-t-0 m-b-0">
                                                                    <input type="checkbox">
                                                                    <label for="checkbox0"></label>
                                                                </div>
                                                            </td>
                                                            <td class="hidden-xs"><i class="far fa-star"></i></td>
                                                            <td class="hidden-xs"><?=$userData['names']?></td>
                                                            <td class="max-texts"> <a href="inbox-detail.html" /><span class="label label-info m-r-10">Work</span> <?=$notification['title']?></td>
                                                            <td class="hidden-xs"><i class="fa fa-paperclip"></i></td>
                                                            <td class="text-right"> <?php echo date('m:i', strtotime($sentDate)) ?></td>
                                                        </tr>
                                                    <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-xs-7 m-t-20"> Showing 1 - 15 of 200 </div>
                                    <div class="col-xs-5 m-t-20">
                                        <div class="btn-group pull-right">
                                            <button type="button" class="btn btn-default waves-effect"><i class="fa fa-chevron-left"></i></button>
                                            <button type="button" class="btn btn-default waves-effect"><i class="fa fa-chevron-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
            </div>
    </div>
<?php } ?>