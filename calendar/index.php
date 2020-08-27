<?php
include('header.php');
?>
<title>phpzag.com : Demo Create Event Calendar with jQuery, PHP and MySQL</title>
<link rel="stylesheet" href="css/calendar.css">
<?php include('container.php');?>
<div class="container">
	<h2>Posts Calendar</h2>
	<div class="page-header">
		<div class="pull-right form-inline">
			<div class="btn-group">
				<button class="btn btn-primary" data-calendar-nav="prev"><< Prev</button>
				<button class="btn btn-default" data-calendar-nav="today">Today</button>
				<button class="btn btn-primary" data-calendar-nav="next">Next >></button>
			</div>
			<div class="btn-group">
				<button class="btn btn-warning" data-calendar-view="year">Year</button>
				<button class="btn btn-warning active" data-calendar-view="month">Month</button>
				<button class="btn btn-warning" data-calendar-view="week">Week</button>
				<button class="btn btn-warning" data-calendar-view="day">Day</button>
			</div>
		</div>
		<h3></h3>
		<small>Click on <b>Today</b> for checking todays Posts. Check your Posts by clicking on the respective <b>Date</b>.</small>
	</div>
	<div class="row">
		<div class="col-md-9">
			<div id="showEventCalendar"></div>
		</div>
		<div class="col-md-3">
			<h4>All Posts List</h4>
			<ul id="eventlist" class="nav nav-list"></ul>
		</div>
	</div>
	<div style="margin:50px 0px 0px 0px;">
		<a class="btn btn-default read-more" style="background:#3399ff;color:white" href="/blog/profile.php">Back to Profile</a>
	</div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/events.js"></script>
<?php include('footer.php');?>
