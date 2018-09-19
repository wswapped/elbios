<?php
    $notificationID = $_GET['id']??"";
    
    if($notificationID){
        include 'viewnotification.php';
    }else{
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
                                <div> <a href="#" class="btn btn-custom btn-block waves-effect waves-light">Compose</a>
                                    <div class="list-group mail-list m-t-20"> <a href="#" class="list-group-item active">Inbox <span class="label label-rouded label-success pull-right">5</span></a> <a href="#" class="list-group-item ">Starred</a> <a href="#" class="list-group-item">Draft <span class="label label-rouded label-warning pull-right">15</span></a> <a href="#" class="list-group-item">Sent Mail</a> <a href="#" class="list-group-item">Trash <span class="label label-rouded label-default pull-right">55</span></a> </div>
                                    <h3 class="panel-title m-t-40 m-b-0">Labels</h3>
                                    <hr class="m-t-5">
                                    <div class="list-group b-0 mail-list"> <a href="#" class="list-group-item"><span class="fa fa-circle text-info m-r-10"></span>Work</a> <a href="#" class="list-group-item"><span class="fa fa-circle text-warning m-r-10"></span>Family</a> <a href="#" class="list-group-item"><span class="fa fa-circle text-purple m-r-10"></span>Private</a> <a href="#" class="list-group-item"><span class="fa fa-circle text-danger m-r-10"></span>Friends</a> <a href="#" class="list-group-item"><span class="fa fa-circle text-success m-r-10"></span>Corporate</a> </div>
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
                                            <tr class="unread">
                                                <td>
                                                    <div class="checkbox m-t-0 m-b-0">
                                                        <input type="checkbox">
                                                        <label for="checkbox0"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs"><i class="far fa-star"></i></td>
                                                <td class="hidden-xs">Hritik Roshan</td>
                                                <td class="max-texts"> <a href="inbox-detail.html" /><span class="label label-info m-r-10">Work</span> Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</td>
                                                </td>
                                                <td class="hidden-xs"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> 12:30 PM </td>
                                            </tr>
                                            <tr class="unread">
                                                <td>
                                                    <div class="checkbox m-t-0 m-b-0">
                                                        <input type="checkbox">
                                                        <label for="checkbox0"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs"><i class="fa fa-star text-warning"></i></td>
                                                <td class="hidden-xs">Genelia Roshan</td>
                                                <td class="max-texts"><a href="inbox-detail.html">Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 13 </td>
                                            </tr>
                                            <tr class="unread">
                                                <td>
                                                    <div class="checkbox m-t-0 m-b-0">
                                                        <input type="checkbox">
                                                        <label for="checkbox0"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs"><i class="far fa-star"></i></td>
                                                <td class="hidden-xs">Ritesh Deshmukh</td>
                                                <td class="max-texts"><a href="inbox-detail.html"><span class="label label-success">Elite</span> Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 12 </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox m-t-0 m-b-0">
                                                        <input type="checkbox">
                                                        <label for="checkbox0"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs"><i class="far fa-star"></i></td>
                                                <td class="hidden-xs">Akshay Kumar</td>
                                                <td class="max-texts"><a href="inbox-detail.html"><span class="label label-warning">Work</span> Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 12 </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox m-t-0 m-b-0">
                                                        <input type="checkbox">
                                                        <label for="checkbox0"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs"><i class="far fa-star"></i></td>
                                                <td class="hidden-xs">Hritik Roshan</td>
                                                <td class="max-texts"><a href="inbox-detail.html"><span class="label label-info m-r-10">Work</span> Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 12 </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox m-t-0 m-b-0">
                                                        <input type="checkbox">
                                                        <label for="checkbox0"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs"><i class="fa fa-star text-warning"></i></td>
                                                <td class="hidden-xs">Genelia Roshan</td>
                                                <td class="max-texts"><a href="inbox-detail.html">Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 11 </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox m-t-0 m-b-0">
                                                        <input type="checkbox">
                                                        <label for="checkbox0"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs"><i class="far fa-star"></i></td>
                                                <td class="hidden-xs">Ritesh Deshmukh</td>
                                                <td class="max-texts"><a href="inbox-detail.html"><span class="label label-success">Elite</span> Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 11 </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox m-t-0 m-b-0">
                                                        <input type="checkbox">
                                                        <label for="checkbox0"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs"><i class="far fa-star"></i></td>
                                                <td class="hidden-xs">Akshay Kumar</td>
                                                <td class="max-texts"><a href="inbox-detail.html"><span class="label label-warning">Work</span> Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 11 </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox m-t-0 m-b-0">
                                                        <input type="checkbox">
                                                        <label for="checkbox0"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs"><i class="far fa-star"></i></td>
                                                <td class="hidden-xs">Hritik Roshan</td>
                                                <td class="max-texts"><a href="inbox-detail.html"><span class="label label-info m-r-10">Work</span> Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 10 </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox m-t-0 m-b-0">
                                                        <input type="checkbox">
                                                        <label for="checkbox0"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs"><i class="fa fa-star text-warning"></i></td>
                                                <td class="hidden-xs">Genelia Roshan</td>
                                                <td class="max-texts"><a href="inbox-detail.html">Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 10 </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox m-t-0 m-b-0">
                                                        <input type="checkbox">
                                                        <label for="checkbox0"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs"><i class="far fa-star"></i></td>
                                                <td class="hidden-xs">Ritesh Deshmukh</td>
                                                <td class="max-texts"><a href="inbox-detail.html"><span class="label label-success">Elite</span> Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 10 </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox m-t-0 m-b-0">
                                                        <input type="checkbox">
                                                        <label for="checkbox0"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs"><i class="far fa-star"></i></td>
                                                <td class="hidden-xs">Akshay Kumar</td>
                                                <td class="max-texts"><a href="inbox-detail.html"><span class="label label-warning">Work</span> Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 09 </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox m-t-0 m-b-0">
                                                        <input type="checkbox">
                                                        <label for="checkbox0"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs"><i class="far fa-star"></i></td>
                                                <td class="hidden-xs">Hritik Roshan</td>
                                                <td class="max-texts"><a href="inbox-detail.html"><span class="label label-info m-r-10">Work</span> Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 09 </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox m-t-0 m-b-0">
                                                        <input type="checkbox">
                                                        <label for="checkbox0"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs"><i class="fa fa-star text-warning"></i></td>
                                                <td class="hidden-xs">Genelia Roshan</td>
                                                <td class="max-texts"><a href="inbox-detail.html">Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 09 </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox m-t-0 m-b-0">
                                                        <input type="checkbox">
                                                        <label for="checkbox0"></label>
                                                    </div>
                                                </td>
                                                <td class="hidden-xs"><i class="far fa-star"></i></td>
                                                <td class="hidden-xs">Ritesh Deshmukh</td>
                                                <td class="max-texts"><a href="inbox-detail.html"><span class="label label-success">Elite</span> Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
                                                <td class="hidden-xs"><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right"> May 09 </td>
                                            </tr>
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
            <!-- /.row -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- .right-sidebar -->
            <div class="right-sidebar">
                <div class="slimscrollright">
                    <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                    <div class="r-panel-body">
                        <ul id="themecolors" class="m-t-20">
                            <li><b>With Light sidebar</b></li>
                            <li><a href="javascript:void(0)" data-theme="default" class="default-theme working">1</a></li>
                            <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                            <li><a href="javascript:void(0)" data-theme="gray" class="yellow-theme">3</a></li>
                            <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme">4</a></li>
                            <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                            <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                            <li><b>With Dark sidebar</b></li>
                            <br/>
                            <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                            <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                            <li><a href="javascript:void(0)" data-theme="gray-dark" class="yellow-dark-theme">9</a></li>
                            <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                            <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                            <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme">12</a></li>
                        </ul>
                        <ul class="m-t-20 all-demos">
                            <li><b>Choose other demos</b></li>
                        </ul>
                        <ul class="m-t-20 chatonline">
                            <li><b>Chat option</b></li>
                            <li>
                                <a href="javascript:void(0)"><img src="../plugins/images/users/varun.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../plugins/images/users/genu.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../plugins/images/users/ritesh.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../plugins/images/users/arijit.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../plugins/images/users/govinda.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../plugins/images/users/hritik.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../plugins/images/users/john.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><img src="../plugins/images/users/pawandeep.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
    </div>
<?php } ?>