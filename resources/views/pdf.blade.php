<!DOCTYPE html>
<!--[if IE 9]>         <html class="ie9 no-focus" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-focus" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8" content="text/html">

        <title> CrypToNaira </title>

        <!-- Stylesheets -->
        <!-- Web fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
        <!-- Bootstrap and OneUI CSS framework -->
        <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
        <link rel="stylesheet" id="css-main" href="/ssets/css/oneui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
        <!-- END Stylesheets -->
    </head>
    <body>

        <div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">

<main id="main-container">
<div class="content bg-gray-lighter hidden-print">
<div class="row items-push">
<div class="col-sm-7">
<h1 class="page-heading">
July Flash Sales Invoice</small>
</h1>
</div>
</div>
<div class="content content-boxed">
<div class="block">
<div class="block-content block-content-narrow">
<div class="h1 text-center push-30-t push-30 hidden-print">Registration INVOICE</div>
<hr class="hidden-print">
<div class="row items-push-2x">
<div class="col-xs-6 col-sm-4 col-lg-3">
<p class="h2 font-w400 push-5">Crypto2Naira</p>
<address>
Lagos,<br>
Nigeria, 101001.<br>
<i class="si si-call-end"></i> (+234) 818-343-4521
</address>
</div>
<div class="col-xs-6 col-sm-4 col-sm-offset-4 col-lg-3 col-lg-offset-6 text-right">
<p class="h2 font-w400 push-5">{{ auth()->user()->fullname() }}</p>
<address>
{{auth()->user()->email}}<br>
Nigeria.
</address>
</div>
</div>
<br><br>
<div class="table-responsive push-50">
<table class="table table-bordered table-hover">
<thead>
<tr>
<th>Payment For</th>
<th class="text-center" style="width: 100px;">Payment Description</th>
<th class="text-right" style="width: 120px;">Amount</th>
</tr>
</thead>
<tbody>
<tr>
<td>
<div class="text-muted">Design/Development of iOS and Android application</div>
</td>
<td>
	Registration Fee under the <b>{{auth()->user()->plans->name}}</b> plan of the July Flash Sales holding on the Saturday 29th July 2017 by 10:00am. <br>
	Venue: Plot 30, Kudirat Abiola Way, Oregun.
</td>
<td class="text-right">&#8358; {{ number_format(auth()->user()->plans->price, 2) }}</td>
</tr>
<tr>
<td colspan="4" class="font-w600 text-right">Subtotal</td>
<td class="text-right">&#8358; {{ number_format(auth()->user()->plans->price, 2) }}</td>
</tr>
<tr class="active">
<td colspan="4" class="font-w700 text-uppercase text-right">Total Due</td>
<td class="font-w700 text-right">&#8358; {{ number_format(auth()->user()->plans->price, 2) }}</td>
</tr>
</tbody>
</table>
</div>
<hr class="hidden-print">
<p class="text-muted text-center"><small>Thanks for working with us. We look forward to seeing you for the flash sales.</small></p>
</div>
</div>
</div>
</main>
</div>
</body>
</html>