<?php include "header.php"; ?> 
			<div id="page-wrapper">
				<div class="graphs">
					<div class="col_3">
						<div class="col-md-3 widget widget1">
							<div class="r3_counter_box">
								<i class="fa fa-users"></i>
								<div class="stats">
								  <h5>45 </h5>
								  <div class="grow">
									<p>Registered</p>
								  </div>
								</div>
							</div>
						</div>
						<div class="col-md-3 widget widget1">
							<div class="r3_counter_box">
								<i class="fa fa-comment"></i>
								<div class="stats">
				<?php
                // include('../connect.php');
				$result = $db->prepare("SELECT count(*) as total FROM news");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
                ?>
								  <h5><?php echo $row['total']; ?> </h5>
								  <div class="grow grow1">
									<p>Total News</p>
								  </div><?php } ?>
								</div>
							</div>
						</div>
						<div class="col-md-3 widget widget1">
							<div class="r3_counter_box">
								<i class="fa fa-eye"></i>
								<div class="stats">
								<?php
                           // include('../connect.php');
				$result = $db->prepare("SELECT count(*) as total FROM events");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){


               ?>
								  <h5><?php echo $row['total']; ?></h5>
								  <div class="grow grow3">
									<p>Total Events</p>
								  </div> <?php } ?>
								</div>
							</div>
						 </div>
						 <div class="col-md-3 widget">
							<div class="r3_counter_box">
								<i class="fa fa-inbox"></i>
								<div class="stats">
								<?php
                           // include('../connect.php');
				$result = $db->prepare("SELECT count(*) as total FROM table_admin");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){


               ?>
								  <h5><?php echo $row['total']; ?> </h5>
								  <div class="grow grow2">
									<p>Total Admins</p>
								  </div>
								  <?php } ?>
								</div>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>

			<!-- switches -->
		<!-- //switches -->
		
			 <!--body wrapper end-->
		</div>
        <?php include "footer.php"; ?>