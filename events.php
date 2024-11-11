<?php include "header.php"; ?>
<!-- End Site Header --> 
<!-- Start Nav Backed Header -->
<div class="nav-backed-header parallax" style="background-image:url(images/event.png);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Events</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- End Nav Backed Header --> 
<!-- Start Page Header -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Events</h1>
            </div>
        </div>
    </div>
</div>
<!-- End Page Header --> 
<!-- Start Content -->
<div class="main" role="main">
    <div id="content" class="content full">
        <div class="container">
            <div class="row">
                <div class="col-md-9"> 
                    <!-- Events Listing -->
                    <div class="listing events-listing">
                        <header class="listing-header">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <h3>All events</h3>
                                </div>
                            </div>
                        </header>
                        <section class="listing-cont">
                            <ul>
                            <?php
                                if (!isset($_GET["page"])) {
                                    $_GET["page"] = 1;
                                }

                                $tbl_name = "events"; // your table name
                                // How many adjacent pages should be shown on each side?
                                $adjacents = 3;

                                // Fetch all events to calculate total pages
                                $get_events = ORM::for_table("$tbl_name")->find_array();
                                $total_pages = count($get_events);

                                /* Setup vars for query. */
                                $limit = 5; // how many items to show per page
                                $page = $_GET['page'];
                                if ($page) {
                                    $start = ($page - 1) * $limit; // first item to display on this page
                                } else {
                                    $start = 0; // if no page var is given, set start to 0
                                }

                                /* Get data. */
                                $events = ORM::for_table("events")
                                    ->limit($limit)
                                    ->offset($start)
                                    ->order_by_desc('events.id')
                                    ->find_array();

                                /* Setup page vars for display. */
                                if ($page == 0) $page = 1; // if no page var is given, default to 1
                                $prev = $page - 1; // previous page is page - 1
                                $next = $page + 1; // next page is page + 1
                                $lastpage = ceil($total_pages / $limit); // last page is = total pages / items per page, rounded up
                                $lpm1 = $lastpage - 1; // last page minus 1
                            ?>

                            <?php if ($total_pages > 0): ?> <!-- Only show if there are events -->
                                <?php foreach ($events as $row): ?>
                                    <li class="item event-item">
                                        <div class="event-detail">
                                            <h4><a href="event-detail.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h4>
                                            <span class="event-dayntime meta-data"><?php echo $row['date']; ?> | <?php echo $row['time']; ?></span>
                                            <?php echo strip_tags(substr($row['detail'], 0, 50)); ?>...
                                        </div>
                                    </li>
                                <?php endforeach; ?>

                                <!-- Pagination -->
                                <div class="pagination">
                                    <ul class="pagination">
                                        <!-- Previous Button -->
                                        <?php if ($page > 1): ?>
                                            <li><a href="?page=<?php echo $prev; ?>" class="btn btn-default">Previous</a></li>
                                        <?php else: ?>
                                            <li class="disabled"><span class="btn btn-default">Previous</span></li>
                                        <?php endif; ?>

                                        <!-- Next Button -->
                                        <?php if ($page < $lastpage): ?>
                                            <li><a href="?page=<?php echo $next; ?>" class="btn btn-default">Next</a></li>
                                        <?php else: ?>
                                            <li class="disabled"><span class="btn btn-default">Next</span></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            <?php else: ?>
                                <p>No events found.</p>
                            <?php endif; ?>
                            </ul>
                        </section>
                    </div>
                </div>
                <!-- Start Sidebar -->
                <?php include "side-bar.php"; ?>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->

<!-- Start Footer -->
<?php include "footer.php"; ?>
<!-- End Footer -->


