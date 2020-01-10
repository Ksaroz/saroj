<?php include "include/admin_header.php"; ?>
<?php
if(!isLoggedIn('Admin'))
{
redirect('../index.php');
}
?>
<div id="wrapper">
    <?php include "include/admin_navigation.php"; ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                    Welcome! Admin
                    <small><?php echo $_SESSION['username'] ?></small>
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fab fa-usps fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class='huge'><?php echo $post_count = recordCount('post'); ?></div>
                                    <div>Posts</div>
                                </div>
                            </div>
                        </div>
                        <a href="post.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fas fa-syringe fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class='huge'><?php echo $donar_count = recordCount('donar'); ?></div>
                                    <div>Donars</div>
                                </div>
                            </div>
                        </div>
                        <a href="manage.php?source=donar">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fas fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class='huge'><?php echo $user_count = recordCount('user'); ?></div>
                                    <div> Users</div>
                                </div>
                            </div>
                        </div>
                        <a href="user.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fas fa-bed fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class='huge'><?php echo $request_count = recordCount('request'); ?></div>
                                    <div>Requests</div>
                                </div>
                            </div>
                        </div>
                        <a href="manage.php?source=request">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <?php
            $post_draft_count = checkStatus('post','post_status','Draft');
            $post_active_count = checkStatus('post','post_status','Active');
            $request_pending_count = checkStatus('request','req_status','pending');
            $inquiry_pending_count = checkStatus('inquiry','inq_status','pending');
            $feedback_pending_count = checkStatus('feedback','feed_status','pending');
            ?>
            <div class="row">
                
                <script type="text/javascript">
                google.charts.load('current', {'packages':['bar']});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                var data = google.visualization.arrayToDataTable([
                ['Data', 'Count'],
                <?php
                $elements_text = ['All Posts','Draft Posts','Active Posts','Donars','Pending Request','Pending Inquiry','Pending Feedback'];
                $elements_count = [$post_count,$post_draft_count,$post_active_count,$donar_count,$request_pending_count,$inquiry_pending_count,$feedback_pending_count];
                for($i = 0;$i < 7; $i++) {
                echo "['{$elements_text[$i]}'" . "," . "{$elements_count[$i]}],";
                }
                ?>
                // ['Posts', 1000],
                
                ]);
                var options = {
                chart: {
                title: '',
                subtitle: '',
                }
                };
                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
                chart.draw(data, google.charts.Bar.convertOptions(options));
                }
                </script>
                <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
</div>
<!-- /#wrapper -->

<?php include "include/admin_footer.php"; ?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script src="https://js.pusher.com/4.4/pusher.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){
var pusher = new Pusher('9322f3977fc35073e2a0', {
cluster: 'ap2',
useTLS: true
});
var notificationChannel =  pusher.subscribe('notification');
notificationChannel.bind('new_user', function(notification){
var message = notification.message;
toastr.success(`${message} Just Registered`);
});
var notificationChannel =  pusher.subscribe('notification');
notificationChannel.bind('login_user', function(notification){
var message = notification.message;
toastr.success(`${message} Just Logged In`);

});
var notificationChannel =  pusher.subscribe('notification');
notificationChannel.bind('logout_user', function(notification){
var message = notification.message;
toastr.success(`${message} Just Logged Out`);

});
});
</script>