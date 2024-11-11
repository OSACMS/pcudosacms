<?php include "header.php"; ?>
<!-- End Site Header --> 
<!-- Start Nav Backed Header -->
<div class="nav-backed-header parallax" style="background-image:url(images/gallery.png);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Photo Gallery</li>
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
                <h1>Photos</h1>
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
                <ul class="isotope-grid" data-sort-id="gallery">
                    <?php
                    // Ensure the page variable is set
                    if (!isset($_GET["page"])) {
                        $_GET["page"] = 1;
                    }

                    $tbl_name = "gallery"; // your table name
                    $adjacents = 3; // How many adjacent pages to be shown

                    // Fetch all images from the gallery
                    $get_gallery = ORM::for_table($tbl_name)->find_array();

                    // Get total number of images
                    $total_pages = count($get_gallery);

                    // Setup pagination variables
                    $limit = 16; // Number of items per page
                    $page = $_GET['page'];
                    $start = ($page - 1) * $limit; // First item to display on this page

                    // Fetch paginated gallery items
                    $gallery_images = ORM::for_table($tbl_name)
                        ->limit($limit)
                        ->offset($start)
                        ->order_by_desc('gallery.id')
                        ->find_array();
                    ?>

                    <!-- Check if there are no gallery images -->
                    <?php if ($total_pages == 0): ?>
                        <p>There are no images in the gallery uploaded at the moment.</p>
                    <?php else: ?>
                        <!-- Display the gallery images -->
                        <?php foreach ($gallery_images as $row): ?>
                            <li class="col-md-3 col-sm-4 col-xs-6 grid-item post format-image">
                                <div class="grid-item-inner">
                                    <a href="uploads/<?php echo $row['file']; ?>" data-rel="prettyPhoto" class="media-box">
                                        <img src="uploads/<?php echo $row['file']; ?>" alt="" class="img-responsive">
                                    </a>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>

            <!-- Pagination Section -->
            <?php if ($total_pages > 0): ?>
                <div class="text-align-center">
                    <span class="text-muted m-r-sm">
                        Showing 
                        <?php
                        // Display the current page's items (either the last page or the number of images displayed)
                        if ($page * $limit < $total_pages) {
                            echo $page * $limit;
                        } else {
                            echo $total_pages;
                        }
                        ?> of <?php echo $total_pages; ?>
                    </span>

                    <div class="btn-group">
                        <?php
                        $prev = $page - 1; // Previous page
                        $next = $page + 1; // Next page
                        $lastpage = ceil($total_pages / $limit); // Last page
                        $lpm1 = $lastpage - 1; // Last page minus 1

                        // Display previous page button if not on the first page
                        if ($page > 1): ?>
                            <a class="btn btn-default" href="?page=<?php echo $prev; ?>"><i class="">Page <?php echo $prev; ?> <<</i></a>
                        <?php endif; ?>

                        <!-- Display next page button if not on the last page -->
                        <?php if ($page < $lastpage): ?>
                            <a class="btn btn-default" href="?page=<?php echo $next; ?>"><i class="">>> Page <?php echo $next; ?></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- End Content -->
<!-- Start Footer -->
<?php include "footer.php"; ?>


