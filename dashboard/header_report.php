            <!-- <div class="uk-grid uk-grid-width-small-1-2 uk-grid-width-large-1-3 uk-grid-width-xlarge-1-5 uk-text-center uk-sortable sortable-handler" id="dashboard_sortable_cards" data-uk-sortable data-uk-grid-margin>
                <div>
                    <div class="md-card md-card-hover md-card-overlay">
                        <div class="md-card-content">
                            <div class="epc_chart" data-percent="76" data-bar-color="#03a9f4">
                                <span class="epc_chart_icon"><i class="material-icons">map</i></span>
                            </div>
                        </div>
                        <div class="md-card-overlay-content">
                            <div class="uk-clearfix md-card-overlay-header">
                                <i class="md-icon material-icons md-card-overlay-toggler">&#xE5D4;</i>
                                <h3>
                                    Field Monitoring
                                </h3>
                            </div>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus alias consectetur.
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card md-card-hover md-card-overlay">
                        <div class="md-card-content uk-flex uk-flex-center uk-flex-middle">
                            <span class="peity_conversions_large peity_data">5,3,9,6,5,9,7</span>
                        </div>
                        <div class="md-card-overlay-content">
                            <div class="uk-clearfix md-card-overlay-header">
                                <i class="md-icon material-icons md-card-overlay-toggler">&#xE5D4;</i>
                                <h3>
                                    Stock management
                                </h3>
                            </div>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card md-card-hover md-card-overlay md-card-overlay">
                        <div class="md-card-content" id="canvas_1">
                            <div class="epc_chart" data-percent="37" data-bar-color="#9c27b0">
                                <span class="epc_chart_icon"><i class="material-icons">&#xE85D;</i></span>
                            </div>
                        </div>
                        <div class="md-card-overlay-content">
                            <div class="uk-clearfix md-card-overlay-header">
                                <i class="md-icon material-icons md-card-overlay-toggler">comments</i>
                                <h3>
                                    Communication
                                </h3>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            <button class="md-btn md-btn-primary">More</button>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card md-card-hover md-card-overlay md-card-overlay">
                        <div class="md-card-content" id="canvas_1">
                            <div class="epc_chart" data-percent="37" data-bar-color="#9c27b0">
                                <span class="epc_chart_icon"><i class="fa fa-info-circle"></i></span>
                            </div>
                        </div>
                        <div class="md-card-overlay-content">
                            <div class="uk-clearfix md-card-overlay-header">
                                <h3>
                                    Information
                                </h3>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            <button class="md-btn md-btn-primary">More</button>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card md-card-hover md-card-overlay">
                        <div class="md-card-content">
                            <div class="epc_chart" data-percent="37" data-bar-color="#607d8b">
                                <span class="epc_chart_icon"><i class="material-icons">&#xE7FE;</i></span>
                            </div>
                        </div>
                        <div class="md-card-overlay-content">
                            <div class="uk-clearfix md-card-overlay-header">
                                <i class="md-icon material-icons md-card-overlay-toggler">&#xE5D4;</i>
                                <h3>
                                    User Registrations
                                </h3>
                            </div>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        </div>
                    </div>
                </div>
            </div> -->
<?php
    $harvest_summary = $Cooperative->harvest_summary($current_cooperative);
?>
<div class="uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable sortable-handlera hierarchical_show" data-uk-grid-margin>
    <div>
        <a href="products">
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-float-right uk-margin-top uk-margin-small-right">
                        <i class="material-icons md-color-red md-icon md-color-light-blue-800">people</i>
                    </div>
                    <span class="uk-text-muted uk-text-small">Remaining Quantity</span>
                    <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $Cooperative->n_members($user_data['cooperativeId']); ?></noscript></span></h2>
                </div>
            </div>
        </a>
    </div>
    <div>
        <a href="crops">
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-float-right uk-margin-top uk-margin-small-right">
                        <i class="material-icons md-color-light-green-800">spa</i>
                    </div>
                    <span class="uk-text-muted uk-text-small">Pending Orders</span>
                    <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $Cooperative->n_crops($user_data['cooperativeId']); ?></noscript></span></h2>
                </div>
            </div>
        </a>
    </div>
    <div>
        <a href="harvest">
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_orders peity_data"><?php echo $harvest_summary['remainingPercentage']; ?>/100</span></div>
                    <span class="uk-text-muted uk-text-small">Warehouse Capacity</span>
                    <h2 class="uk-margin-remove"><span class="countUpMe"><noscript><?php echo $harvest_summary['remaining']; ?></noscript></span> kg</h2>
                </div>
            </div>
        </a>
    </div>
    <div>
        <a href="sell">
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_orders peity_data"><?php echo $harvest_summary['soldPercentage']; ?>/100</span></div>
                    <span class="uk-text-muted uk-text-small">Stock reliability</span>
                    <h2 class="uk-margin-remove" id=""><?php echo $harvest_summary['sold']; ?> kg</h2>
                </div>
            </div>
        </a>
    </div>
</div>