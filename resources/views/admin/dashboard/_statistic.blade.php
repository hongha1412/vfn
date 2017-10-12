<div class="col-md-4">
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-cogs"></i><b> Thống Kê</b>
        </div>

        <div class="panel-body">
            <div class="progress-group">

                <span class="progress-text">VIP LIKE ACTIVE</span>
                <span class="progress-number"><b><?php echo $showgoivip ?></b>/100</span>

                <div class="progress sm">
                    <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar"
                         aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                         style="width: <?php echo $showgoivip ?>%">

                    </div>
                </div>
                <!-- /.progress-group -->
                <div class="progress-group">
                    <span class="progress-text">VIP COMMENT ACTVIE</span>
                    <span class="progress-number"><b><?php echo $showgoicmt ?></b>/100</span>

                    <div class="progress sm">
                        <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                             style="width: <?php echo $showgoicmt ?>%"></div>
                    </div>
                </div>
                <!-- /.progress-group -->
                <div class="progress-group">
                    <span class="progress-text">VIP SHARE ACTIVE</span>
                    <span class="progress-number"><b><?php echo $showgoishare ?></b>/100</span>

                    <div class="progress sm">
                        <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                             style="width: <?php echo $showgoishare ?>%"></div>
                    </div>
                </div>
                <!-- /.progress-group -->
                <div class="progress-group">
                    <span class="progress-text">BOT REACTION ACTIVE</span>
                    <span class="progress-number"><b><?php echo $showgoicx ?></b>/100</span>

                    <div class="progress sm">
                        <div class="progress-bar progress-bar-yellow progress-bar-striped" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                             style="width: <?php echo $showgoicx ?>%"></div>
                    </div>
                </div>
                <!-- /.progress-group -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- ./box-body -->
</div>