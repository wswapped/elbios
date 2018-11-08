<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <div class="row row-in">
                <div class="col-lg-3 col-sm-6 row-in-br">
                    <ul class="col-in">
                        <li>
                            <span class="circle circle-md bg-danger">
                                <i class="fas fa-paw"></i>
                            </span>
                        </li>
                        <li class="col-last">
                            <h3 class="counter text-right m-t-15">23</h3>
                        </li>
                        <li class="col-middle">
                            <h4>Steps today</h4>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                    <span class="sr-only">40% Complete (success)</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-sm-6 row-in-br  b-r-none">
                    <ul class="col-in">
                        <li>
                            <span class="circle circle-md bg-info"><i class="fas fa-heartbeat"></i></span>
                        </li>
                        <li class="col-last">
                            <h3 class="counter text-right m-t-15">76</h3>
                        </li>
                        <li class="col-middle">
                            <h4>Latest heartbeat</h4>
                            <div class="progress">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                    <span class="sr-only">40% Complete (success)</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-sm-6 row-in-br">
                    <ul class="col-in">
                        <li>
                            <span class="circle circle-md bg-success"><i class="fas fa-user-secret"></i></span>
                        </li>
                        <li class="col-last">
                            <h3 class="counter text-right m-t-15">93</h3>
                        </li>
                        <li class="col-middle">
                            <h4>Latest stress</h4>
                            <div class="progress">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                    <span class="sr-only">40% Complete (success)</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-sm-6  b-0">
                    <ul class="col-in">
                        <li>
                            <span class="circle circle-md bg-warning"><i class="fas fa-user-md"></i></span>
                        </li>
                        <li class="col-last">
                            <h3 class="counter text-right m-t-15">83</h3>
                        </li>
                        <li class="col-middle">
                            <h4>Doctor review</h4>
                            <div class="progress">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                    <span class="sr-only">40% Complete (success)</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-6 col-sm-12 col-xs-12">
        <div class="white-box">
            <h3 class="box-title">Temperature & Pulse</h3>
            <ul class="list-inline text-right">
                <li>
                    <h5><i class="fa fa-circle m-r-5 text-info"></i>Temperature</h5>
                </li>
                <li>
                    <h5><i class="fa fa-circle m-r-5 text-danger"></i>Pulse</h5>
                </li>
            </ul>
            <div id="ct-visits" style="height: 285px;"></div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12">
        <div class="bg-theme-alt">
            <div id="ct-daily-sales" class="p-t-30" style="height: 300px"></div>
        </div>
        <div class="white-box">
            <div class="row">
                <div class="col-xs-8">
                    <h2 class="m-b-0 font-medium">Weekly heart beat</h2>
                    <h5 class="text-muted m-t-0">80bpm</h5>
                </div>
                <div class="col-xs-4">
                    <div class="circle circle-md bg-info pull-right m-t-10 animated slideInUp"><i class="ti-heart"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-3 col-xs-12">
        <div class="bg-theme white-box m-b-0">
            <ul class="expense-box">
                <li><i class="wi wi-day-cloudy text-white"></i>
                    <div>
                        <h1 class="text-white m-b-0">23<sup>o</sup></h1>
                        <h4 class="text-white">Clear and sunny</h4>
                    </div>
                </li>
            </ul>
            <div id="ct-weather" style="height: 120px"></div>
            <ul class="dp-table text-white">
                <li><?=(date('H')-3).": 00"?></li>
                <li><?=(date('H')-2).": 00"?></li>
                <li><?=(date('H')-1).": 00"?></li>
                <li><?=(date('H')).": 00"?></li>
            </ul>
        </div>
        <div class="white-box">
            <div class="row">
                <div class="col-xs-8">
                    <h2 class="m-b-0 font-medium"><?=date('l')?></h2>
                    <h5 class="text-muted m-t-0"><?=date('F Y')?></h5>
                </div>
                <div class="col-xs-4">
                    <div class="circle circle-md bg-success pull-right m-t-10"><i class="wi wi-day-sunny"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>