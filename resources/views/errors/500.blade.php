<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{URL::asset('assets/images/logo.jpg')}}" />

    <!-- TITLE -->
    <title>{{config('app.name')}}</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{URL::asset('dash/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{URL::asset('dash/assets/css/style.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('dash/assets/css/skin-modes.css')}}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{URL::asset('dash/assets/css/icons.css')}}" rel="stylesheet" />
</head>

<body class="ltr app sidebar-mini light-mode">

    <!-- PAGE -->
    <div class="page">
       <!-- PAGE-CONTENT OPEN -->
			<div class="page-content error-page error2">
				<div class="container text-center">
					<div class="error-template">
						<h2 class="text-dark mb-2">500<span class="fs-20">error</span></h2>
						<h5 class="error-details text-dark">
							Oops! Some error has occured, Requested page not found!
						</h5>
						<div class="text-center">
							<a class="btn btn-primary mt-5 mb-5" href="/"> <i class="fa fa-long-arrow-left"></i> Back to Home </a>
						</div>
                    </div>
				</div>
			</div>
		<!-- PAGE-CONTENT OPEN CLOSED -->
    </div>
    
    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>

    <!-- JQUERY JS -->
    <script src="{{URL::asset('dash/assets/js/jquery.min.js')}}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{URL::asset('dash/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{URL::asset('dash/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- SIDE-MENU JS -->
    <script src="{{URL::asset('dash/assets/plugins/sidemenu/sidemenu.js')}}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{URL::asset('dash/assets/plugins/p-scroll/perfect-scrollbar.js')}}"></script>
    <script src="{{URL::asset('dash/assets/plugins/p-scroll/pscroll.js')}}"></script>

    <!-- STICKY JS -->
    <script src="{{URL::asset('dash/assets/js/sticky.js')}}"></script>

    <!-- APEXCHART JS -->
    <script src="{{URL::asset('dash/assets/js/apexcharts.js')}}"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="{{URL::asset('dash/assets/plugins/select2/select2.full.min.js')}}"></script>

    <!-- CHART-CIRCLE JS-->
    <script src="{{URL::asset('dash/assets/js/circle-progress.min.js')}}"></script>

    <!-- INTERNAL DATA-TABLES JS-->
    <script src="{{URL::asset('dash/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('dash/assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
    <script src="{{URL::asset('dash/assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('dash/assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
	<script src="{{URL::asset('dash/assets/plugins/datatable/responsive.bootstrap5.min.js')}}"></script>
	<script src="{{URL::asset('dash/assets/js/table-data.js')}}"></script>

    <!-- INDEX JS -->
    <script src="{{URL::asset('dash/assets/js/index1.js')}}"></script>

    <!-- CUSTOM JS -->
    <script src="{{URL::asset('dash/assets/js/custom.js')}}"></script>
</body>

</html>