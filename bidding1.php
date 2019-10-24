



<?php
date_default_timezone_set('Asia/Dhaka');
$date=date('m/d/Y');
$time=date('h:i:s a');

echo $date ,$time;
?>


<!doctype html>
<html lang="en">
<head>
	<!-- DataTable-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  

	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css" rel="stylesheet" media="all">
	<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css " rel="stylesheet" media="all">
	
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container">
		<div class="row ">
			<div class="col-md-6 offset-md-3 col-sm-6 offset-sm-3 col-12 comments-main pt-4 rounded">
				<div class="row comment-box-main p-3 rounded-bottom">
					<div class="col-md-9 col-sm-9 col-9 pr-0 comment-box">
						<input type="text" class="form-control" placeholder="comment ...." />
					</div>
					<div class="col-md-3 col-sm-2 col-2 pl-0 text-center send-btn">
						<button class="btn btn-info">Send</button>
					</div>
				</div>
				<ul class="p-0">
					<li>
						<div class="row comments mb-2">
							<div class="col-md-2 col-sm-2 col-3 text-center user-img">
								<img id="profile-photo" src="http://nicesnippets.com/demo/man01.png" class="rounded-circle" />
							</div>
							<div class="col-md-9 col-sm-9 col-9 comment rounded mb-2">
								<h4 class="m-0"><a href="#">Jacks David</a></h4>
								<time class="text-white ml-3">1 hours ago</time>
								<like></like>
								<p class="mb-0 text-white">Thank you for visiting all the way from New York.</p>
							</div>
						</div>
					</li>
					<ul class="p-0">
						<li>
							<div class="row comments mb-2">
								<div class="col-md-2 offset-md-2 col-sm-2 offset-sm-2 col-3 offset-1 text-center user-img">
									<img id="profile-photo" src="http://nicesnippets.com/demo/man02.png" class="rounded-circle" />
								</div>
								<div class="col-md-7 col-sm-7 col-8 comment rounded mb-2">
									<h4 class="m-0"><a href="#">Steve Alex</a></h4>
									<time class="text-white ml-3">1 week ago</time>
									<like></like>
									<p class="mb-0 text-white">Thank you for visiting all the way from NYC.</p>
								</div>
							</div>
						</li>
					</ul>
				</ul>
				<ul class="p-0">
					<li>
						<div class="row comments mb-2">
							<div class="col-md-2 col-sm-2 col-3 text-center user-img">
								<img id="profile-photo" src="http://nicesnippets.com/demo/man03.png" class="rounded-circle" />
							</div>
							<div class="col-md-9 col-sm-9 col-9 comment rounded mb-2">
								<h4 class="m-0"><a href="#">Andrew Filander</a></h4>
								<time class="text-white ml-3">7 day ago</time>
								<like></like>
								<p class="mb-0 text-white">Thank you for visiting all the way from New York.</p>
							</div>
						</div>
					</li>
					<ul class="p-0">
						<li>
							<div class="row comments mb-2">
								<div class="col-md-2 offset-md-2 col-sm-2 offset-sm-2 col-3 offset-1 text-center user-img">
									<img id="profile-photo" src="http://nicesnippets.com/demo/man04.png" class="rounded-circle" />
								</div>
								<div class="col-md-7 col-sm-7 col-8 comment rounded mb-2">
									<h4 class="m-0"><a href="#">james Cordon</a></h4>
									<time class="text-white ml-3">1 min ago</time>
									<like></like>
									<p class="mb-0 text-white">Thank you for visiting from an unknown location.</p>
								</div>
							</div>
						</li>
					</ul>
				</ul>
				<ul class="p-0">
					<li>
						<div class="row comments mb-2">
							<div class="col-md-2 col-sm-2 col-3 text-center user-img">
								<img id="profile-photo" src="http://nicesnippets.com/demo/man01.png" class="rounded-circle" />
							</div>
							<div class="col-md-9 col-sm-9 col-9 comment rounded mb-2">
								<h4 class="m-0"><a href="#">Tye Simmon</a></h4>
								<time class="text-white ml-3">1 month ago</time>
								<like></like>
								<p class="mb-0 text-white">Thank you for visiting all the way from New York.</p>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/vue/0.12.14/vue.min.js'></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable();
	} );
</script>
</html>