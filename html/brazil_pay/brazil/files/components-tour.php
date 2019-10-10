<?php require 'includes/header_start.php'; ?>
<!-- Tour css -->
<link href="assets/plugins/hopscotch/css/hopscotch.min.css" rel="stylesheet" type="text/css"/>
<?php require 'includes/header_end.php'; ?>


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box" id="page-title-tour">
                        <h4 class="page-title">Tour</h4>
                        <ol class="breadcrumb p-0">
                            <li>
                                <a href="#">Uplon</a>
                            </li>
                            <li>
                                <a href="#">Components</a>
                            </li>
                            <li class="active">
                                Tour
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->


        </div> <!-- container -->

    </div> <!-- content -->

</div>
<!-- End content-page -->


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->

<?php require 'includes/footer_start.php' ?>

<!-- Tour page js -->
<script src="assets/plugins/hopscotch/js/hopscotch.min.js"></script>

<script>
    $(document).ready(function () {
        var placementRight = 'right';
        var placementLeft = 'left';

        // Define the tour!
        var tour = {
            id: "my-intro",
            steps: [
                {
                    target: "logo-tour",
                    title: "Current online user",
                    content: "You can find here status of user who's currently online.",
                    placement: placementRight,
                    yOffset: 10
                },
                {
                    target: 'page-title-tour',
                    title: "User settings",
                    content: "You can edit you profile info here.",
                    placement: 'bottom',
                    zindex: 999
                },
                {
                    target: 'notification-tour',
                    title: "Configuration tools",
                    content: "Here you can change theme skins and other features.",
                    placement: 'left',
                    zindex: 999
                }
            ],
            showPrevButton: true
        };

        // Start the tour!
        hopscotch.startTour(tour);
    });
</script>
<?php require 'includes/footer_end.php' ?>
