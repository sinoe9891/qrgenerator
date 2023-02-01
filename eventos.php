<?php
include 'inc/templates/header.php';
?>

<body>
	<?php
	include 'inc/templates/sidebar.php';
	?>
	<div class="wrapper d-flex flex-column min-vh-100 bg-light">
		<header class="header header-sticky mb-4">
			<div class="container-fluid">
				<button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
					<svg class="icon icon-lg">
						<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
					</svg>
				</button><a class="header-brand d-md-none" href="#">
					<svg width="118" height="46" alt="CoreUI Logo">
						<use xlink:href="assets/brand/coreui.svg#full"></use>
					</svg></a>
				<ul class="header-nav d-none d-md-flex">
					<li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
					<li class="nav-item"><a class="nav-link" href="#">Users</a></li>
					<li class="nav-item"><a class="nav-link" href="#">Settings</a></li>
				</ul>
				<ul class="header-nav ms-auto">
					<li class="nav-item"><a class="nav-link" href="#">
							<svg class="icon icon-lg">
								<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
							</svg></a></li>
					<li class="nav-item"><a class="nav-link" href="#">
							<svg class="icon icon-lg">
								<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-list-rich"></use>
							</svg></a></li>
					<li class="nav-item"><a class="nav-link" href="#">
							<svg class="icon icon-lg">
								<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
							</svg></a></li>
				</ul>
				<ul class="header-nav ms-3">
					<li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
							<div class="avatar avatar-md"><img class="avatar-img" src="assets/img/avatars/8.jpg" alt="user@email.com"></div>
						</a>
						<div class="dropdown-menu dropdown-menu-end pt-0">
							<div class="dropdown-header bg-light py-2">
								<div class="fw-semibold">Account</div>
							</div><a class="dropdown-item" href="#">
								<svg class="icon me-2">
									<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
								</svg> Updates<span class="badge badge-sm bg-info ms-2">42</span></a><a class="dropdown-item" href="#">
								<svg class="icon me-2">
									<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
								</svg> Messages<span class="badge badge-sm bg-success ms-2">42</span></a><a class="dropdown-item" href="#">
								<svg class="icon me-2">
									<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-task"></use>
								</svg> Tasks<span class="badge badge-sm bg-danger ms-2">42</span></a><a class="dropdown-item" href="#">
								<svg class="icon me-2">
									<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-comment-square"></use>
								</svg> Comments<span class="badge badge-sm bg-warning ms-2">42</span></a>
							<div class="dropdown-header bg-light py-2">
								<div class="fw-semibold">Settings</div>
							</div><a class="dropdown-item" href="#">
								<svg class="icon me-2">
									<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
								</svg> Profile</a><a class="dropdown-item" href="#">
								<svg class="icon me-2">
									<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
								</svg> Settings</a><a class="dropdown-item" href="#">
								<svg class="icon me-2">
									<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-credit-card"></use>
								</svg> Payments<span class="badge badge-sm bg-secondary ms-2">42</span></a><a class="dropdown-item" href="#">
								<svg class="icon me-2">
									<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-file"></use>
								</svg> Projects<span class="badge badge-sm bg-primary ms-2">42</span></a>
							<div class="dropdown-divider"></div><a class="dropdown-item" href="#">
								<svg class="icon me-2">
									<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
								</svg> Lock Account</a><a class="dropdown-item" href="#">
								<svg class="icon me-2">
									<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
								</svg> Logout</a>
						</div>
					</li>
				</ul>
			</div>
			<div class="header-divider"></div>
			<div class="container-fluid">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb my-0 ms-2">
						<li class="breadcrumb-item">
							<!-- if breadcrumb is single--><a href="#">Home</a>
						</li>
						<li class="breadcrumb-item">
							<!-- if breadcrumb is single--><a href="#">Components</a>
						</li>
						<li class="breadcrumb-item">
							<!-- if breadcrumb is single--><a href="#">Base</a>
						</li>
						<li class="breadcrumb-item active"><span>Tables</span></li>
					</ol>
				</nav>
			</div>
		</header>
		<div class="body flex-grow-1 px-3">
			<div class="container-lg">
				<div class="car"></div>
				<div class="card mb-4">
					<div class="card-header"><strong>Eventos</strong></div>
					<div class="card-body">
							<!-- <ul class="nav nav-tabs" role="tablist">
								<li class="nav-item"><a class="nav-link active" data-coreui-toggle="tab" href="#preview-81" role="tab">
										<svg class="icon me-2">
											<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-media-play"></use>
										</svg>Preview</a></li>
								<li class="nav-item"><a class="nav-link" href="https://coreui.io/docs/content/tables/#striped-rows" target="_blank">
										<svg class="icon me-2">
											<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-code"></use>
										</svg>Code</a></li>
							</ul> -->
							<div class="tab-content rounded-bottom">
								<div class="tab-pane p-3 active preview" role="tabpanel" id="preview-81">
									<table class="table table-striped">
										<thead>
											<tr>
												<th scope="col">#</th>
												<th scope="col">First</th>
												<th scope="col">Last</th>
												<th scope="col">Handle</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<th scope="row">1</th>
												<td>Mark</td>
												<td>Otto</td>
												<td>@mdo</td>
											</tr>
											<tr>
												<th scope="row">2</th>
												<td>Jacob</td>
												<td>Thornton</td>
												<td>@fat</td>
											</tr>
											<tr>
												<th scope="row">3</th>
												<td colspan="2">Larry the Bird</td>
												<td>@twitter</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		<footer class="footer">
			<div><a href="https://coreui.io">CoreUI </a><a href="https://coreui.io">Bootstrap Admin Template</a> © 2022 creativeLabs.</div>
			<div class="ms-auto">Powered by&nbsp;<a href="https://coreui.io/docs/">CoreUI UI Components</a></div>
		</footer>
	</div>
	<!-- CoreUI and necessary plugins-->
	<script src="vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
	<script src="vendors/simplebar/js/simplebar.min.js"></script>
	<script>
	</script>

</body>

</html>