<?php include "header.php"; ?>  
<!-- End Site Header --> 
<!-- Start Hero Slider -->
<div class="hero-slider flexslider clearfix" data-autoplay="yes" data-pagination="yes" data-arrows="yes" data-style="fade" data-pause="yes">
    <ul class="slides">
        <li class="parallax" style="background-image:url(images/1.png);"></li>
    </ul>
</div>
<!-- End Hero Slider --> 
<!-- Start Notice Bar -->
<div class="notice-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-6 notice-bar-title"> 
                <span class="notice-bar-title-icon hidden-xs"><i class="fa fa-calendar fa-3x"></i></span> 
                <span class="title-note">Next</span> <strong>Upcoming Event</strong> 
            </div>
            <?php
                $result = $db->prepare("SELECT * FROM events ORDER BY id DESC Limit 1");
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){   
            ?> 
            <div class="col-md-3 col-sm-6 col-xs-6 notice-bar-event-title">
                <h5><a href="events.php"><?php echo $row['title']; ?></a></h5>
                <span class="meta-data"><?php echo $row['venue']; ?></span> 
            </div>
            <div id="counter" class="col-md-4 col-sm-6 col-xs-12 counter" data-date="July 13, 2016">
                <div class=""> 
                    <span><?php echo $row['date']; ?></span> 
                </div>
            </div>
            <?php } ?>
            <div class="col-md-2 col-sm-6 hidden-xs"> 
                <a href="events.php" class="btn btn-primary btn-lg btn-block">All Events</a> 
            </div>
        </div>
    </div>
</div>
<!-- End Notice Bar --> 
<!-- Start Content -->
<div class="main" role="main">
    <div id="content" class="content full">
        <div class="container">
            <div class="row"> 
                <!-- Start Featured Blocks -->
                <!-- End Featured Blocks --> 
            </div>
            <div class="row">
                <div class="col-md-8 col-sm-6"> 
                    <!-- Events Listing -->
                    <div class="listing events-listing">
                        <header class="listing-header">
                            <h3 class=" titles">Welcome to Philippine Christian University - Dasmariñas</h3>
                        </header>
                        <?php
                            $result = $db->prepare("SELECT * FROM welcome");
                            $result->execute();
                            for($i=0; $row = $result->fetch(); $i++){
                        ?>  
                            <?php echo $row['body']; ?>             
                        <?php } ?>
                    </div>
                    <div class="spacer-30"></div>
                    <!-- Latest News -->
                    <div class="listing post-listing">
                        <header class="listing-header">
                            <h3 class="titles">Latest News</h3>
                        </header>
                        <section class="listing-cont">
                            <ul>
                                <li class="item post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php
                                                $result = $db->prepare("SELECT * FROM news ORDER BY id DESC Limit 3");
                                                $result->execute();
                                                for($i=0; $row = $result->fetch(); $i++){   
                                            ?> 
                                                <div class="post-title">
                                                    <h2 class=" titles"><a href="news_post.php?id=<?php echo $row['id'];?>"><?php echo $row['news_title']; ?></a></h2>
                                                    <span class="meta-data"><i class="fa fa-calendar"></i> on <?php echo $row['date']; ?></span>
                                                    <p><?php echo strip_tags(substr($row['news_detail'],0,180)) ;?>...</p>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <center> -- <a href="news-updates.php">All News</a> --</center>
                                </li>
                            </ul>
                        </section>
                    </div>
                </div>
                <!-- Start Sidebar -->
                <div class="col-md-4 col-sm-6">
                    <!-- Latest Sermons -->
                    <div class="listing sermons-listing">
                        <header class="listing-header">
                        </header>
                        <section class="listing-cont">
                            <ul>
                                <li class="item sermon featured-sermon"> <span class="date"></span>
                                    <h4><a href="https://www.facebook.com/osacollege.cavite/?ref=embed_page">Like Us on Facebook</a></h4>
                                    <?php
                                        //include('../connect.php');
                                        $result = $db->prepare("SELECT * FROM settings");
                                        $result->execute();
                                        for($i=0; $row = $result->fetch(); $i++){
                                    ?> 
                                    <div class="featured-sermon-video">
                                        <!-- Facebook Page Plugin -->
                                        <iframe 
                                            src="https://www.facebook.com/plugins/page.php?href=https://www.facebook.com/osacollege.cavite&tabs=timeline&width=500&height=215&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=403202216515066" 
                                            width="100%" 
                                            height="215" 
                                            style="border:none; overflow:hidden;" 
                                            scrolling="no" 
                                            frameborder="0" 
                                            allowTransparency="true">
                                        </iframe>
                                    </div> 
                                    <?php } ?>
                                </li>
                            </ul>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Start Footer -->
<?php include "footer.php"; ?>
