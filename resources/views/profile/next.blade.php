<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">

    
    <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="assets/js/plugins/select2/select2.min.css">
        <link rel="stylesheet" href="assets/js/plugins/select2/select2-bootstrap.min.css">
        <link rel="stylesheet" href="assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.min.css">
        <link rel="stylesheet" href="assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.skinHTML5.min.css">
	        <!-- Bootstrap and OneUI CSS framework -->
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    <link rel="stylesheet" id="css-main" href="assets/css/oneui.css">



</head>
<body>
	
	<div class="container" style="margin-top: 50px;" id="app">
		<div class="row">
			<div class="col-xs-12 col-md-8 col-md-offset-2">
				<div class="text-center">
		            <img src="img/logo1.png" alt="">
		            <h4 class="text-muted lead push-15-t">Hi! Just one more thing..</h4>
		        </div>
				<div class="">
                    <!-- Simple Progress Wizard (.js-wizard-simple class is initialized in js/pages/base_forms_wizard.js) -->
                    <!-- For more examples you can check out http://vadimg.com/twitter-bootstrap-wizard-example/ -->
                    <div class="js-wizard-simple block">
                        <!-- Steps Progress -->
                        <div class="block-content block-content-mini block-content-full border-b">
                            <div class="wizard-progress progress active remove-margin-b">
                                <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 0"></div>
                            </div>
                        </div>
                        <!-- END Steps Progress -->

                        <!-- Step Tabs -->
                        <ul class="nav nav-tabs nav-tabs-alt nav-justified">
                            <li class="active">
                                <a href="#simple-progress-step1" data-toggle="tab">1. Personal</a>
                            </li>
                            <li>
                                <a href="#simple-progress-step2" data-toggle="tab">2. Cryptos</a>
                            </li>
                            <li>
                                <a href="#simple-progress-step3" data-toggle="tab">3. Complete</a>
                            </li>
                        </ul>
                        <!-- END Step Tabs -->

                        <!-- Form -->
                        <next></next>
                        <!-- END Form -->
                    </div>
                    <!-- END Simple Progress Wizard -->
                </div>
			</div>
		</div>
	</div>
	
<script src="assets/js/core/jquery.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="assets/js/core/jquery.slimscroll.min.js"></script>
<script src="assets/js/core/jquery.scrollLock.min.js"></script>
<script src="assets/js/core/jquery.appear.min.js"></script>
<script src="assets/js/core/jquery.countTo.min.js"></script>
<script src="assets/js/core/jquery.placeholder.min.js"></script>
<script src="assets/js/app.js"></script>

<!-- Page JS Plugins -->
<script src="assets/js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="assets/js/plugins/select2/select2.full.min.js"></script>
<script src="assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

<!-- Page JS Code -->
<script src="assets/js/pages/base_forms_wizard.js"></script>
<script src="js/app.js"></script>

<script>
    jQuery(function () {
        // Init page helpers (BS Datepicker + BS Datetimepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Input + Range Sliders + Tags Inputs plugins)
        App.initHelpers(['maxlength', 'select2', 'masked-inputs', 'rangeslider']);
    });
</script>


</body>
</html>