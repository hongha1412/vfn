<div class="col-md-4">
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-cogs"></i><b> Thống Kê</b>
        </div>

        <div class="panel-body">
            <div class="progress-group">

                <span class="progress-text">VIP LIKE ACTIVE</span>
                <span class="progress-number"><b>@{{ paginationVipLike.total }}</b>/100</span>

                <div class="progress sm">
                    <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar"
                         aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                         v-bind:style="{width: paginationVipLike.total + '%'}">

                    </div>
                </div>
                <!-- /.progress-group -->
                <div class="progress-group">
                    <span class="progress-text">VIP COMMENT ACTVIE</span>
                    <span class="progress-number"><b>@{{ paginationVipCmt.total }}</b>/100</span>

                    <div class="progress sm">
                        <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                             v-bind:style="{width: paginationVipCmt.total + '%'}"></div>
                    </div>
                </div>
                <!-- /.progress-group -->
                <div class="progress-group">
                    <span class="progress-text">VIP SHARE ACTIVE</span>
                    <span class="progress-number"><b>@{{ paginationVipShare.total }}</b>/100</span>

                    <div class="progress sm">
                        <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                             v-bind:style="{width: paginationVipShare.total + '%'}"></div>
                    </div>
                </div>
                <!-- /.progress-group -->
                <div class="progress-group">
                    <span class="progress-text">BOT REACTION ACTIVE</span>
                    <span class="progress-number"><b>@{{ paginationLogCard.total }}</b>/100</span>

                    <div class="progress sm">
                        <div class="progress-bar progress-bar-yellow progress-bar-striped" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                             v-bind:style="{width: paginationLogCard.total + '%'}"></div>
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