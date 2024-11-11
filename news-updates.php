<?php include "header.php"; ?>
<!-- End Site Header --> 
<!-- Start Nav Backed Header -->
<div class="nav-backed-header parallax" style="background-image:url(images/news.png);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">News Update</li>
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
                <h1>Latest News</h1>
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
                <div class="col-md-9 posts-archive">
                    <?php
                    if (!isset($_GET["page"])) {
                        $_GET["page"] = 1;
                    }
                    
                    $tbl_name = "news"; // your table name
                    $adjacents = 3; // How many adjacent pages should be shown on each side?

                    // Get all news
                    $get_news = ORM::for_table("$tbl_name")->find_array();
                    $total_pages = count($get_news);

                    // Pagination setup
                    $limit = 5; // Items per page
                    $page = $_GET['page'];
                    if ($page) {
                        $start = ($page - 1) * $limit; // first item to display on this page
                    } else {
                        $start = 0; // if no page var is given, set start to 0
                    }

                    // Get the paginated news data
                    $news = ORM::for_table("news")
                        ->limit($limit)
                        ->offset($start)
                        ->order_by_desc('news.id')
                        ->find_array();

                    // Setup page vars for display
                    if ($page == 0) $page = 1; // if no page var is given, default to 1
                    $prev = $page - 1; // previous page is page - 1
                    $next = $page + 1; // next page is page + 1
                    $lastpage = ceil($total_pages / $limit); // last page is = total pages / items per page, rounded up
                    $lpm1 = $lastpage - 1; // last page minus 1
                    ?>

                    <?php foreach ($news as $row): ?>
                        <article class="post">
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <a href="news_post.php?id=<?php echo $row['id']; ?>">
                                        <img src="uploads/<?php echo $row['file']; ?>" alt="" class="img-thumbnail img-responsive">
                                    </a>
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <h3><a href="news_post.php?id=<?php echo $row['id']; ?>"><?php echo $row['news_title']; ?></a></h3>
                                    <span class="post-meta meta-data"> 
                                        <span><i class="fa fa-calendar"></i> <?php echo $row['date']; ?></span>
                                    </span>
                                    <?php echo strip_tags(substr($row['news_detail'], 0, 180)); ?>...
                                    <p><a href="news_post.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Continue reading <i class="fa fa-long-arrow-right"></i></a></p>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?> 

                  
                    <div class="btn-group">
                        <?php if ($page > 1): ?>
                            <a class="btn btn-default" href="?page=<?php echo $prev; ?>"><i class=""><< Page <?php echo $prev; ?></i></a>
                        <?php endif; ?>

                        <?php if ($page < $lastpage): ?>
                            <a class="btn btn-default" href="?page=<?php echo $next; ?>"><i class="">Page <?php echo $next; ?> >></i></a>
                        <?php endif; ?>
                    </div>  
                </div>
                <!-- Start Sidebar -->
                <?php include "side-bar.php"; ?>
                <!-- End Sidebar -->
            </div>
        </div>
    </div>
</div>
<!-- End Content -->

<!-- Start Footer -->
<?php include "footer.php"; ?>
<!-- End Footer -->


