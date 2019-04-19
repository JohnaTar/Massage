<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">
   <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/sb-admin-2.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="js/demo/datatables-demo.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style type="text/css">


/* Page Loader ================================= */
.page-loader-wrapper {
  z-index: 99999999;
  position: fixed;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  width: 100%;
  height: 100%;
  background: #eee;
  overflow: hidden;
  text-align: center; }
  .page-loader-wrapper p {
    font-size: 13px;
    margin-top: 10px;
    font-weight: bold;
    color: #444; }
  .page-loader-wrapper .loader {
    position: relative;
    top: calc(50% - 30px); }

/* Preloaders ================================== */
.md-preloader .pl-red {
  stroke: #F44336; }

.md-preloader .pl-pink {
  stroke: #E91E63; }

.md-preloader .pl-purple {
  stroke: #9C27B0; }

.md-preloader .pl-deep-purple {
  stroke: #673AB7; }

.md-preloader .pl-indigo {
  stroke: #3F51B5; }

.md-preloader .pl-blue {
  stroke: #2196F3; }

.md-preloader .pl-light-blue {
  stroke: #03A9F4; }

.md-preloader .pl-cyan {
  stroke: #00BCD4; }

.md-preloader .pl-teal {
  stroke: #009688; }

.md-preloader .pl-green {
  stroke: #4CAF50; }

.md-preloader .pl-light-green {
  stroke: #8BC34A; }

.md-preloader .pl-lime {
  stroke: #CDDC39; }

.md-preloader .pl-yellow {
  stroke: #ffe821; }

.md-preloader .pl-amber {
  stroke: #FFC107; }

.md-preloader .pl-orange {
  stroke: #FF9800; }

.md-preloader .pl-deep-orange {
  stroke: #FF5722; }

.md-preloader .pl-brown {
  stroke: #795548; }

.md-preloader .pl-grey {
  stroke: #9E9E9E; }

.md-preloader .pl-blue-grey {
  stroke: #607D8B; }

.md-preloader .pl-black {
  stroke: #000000; }

.md-preloader .pl-white {
  stroke: #ffffff; }

.preloader {
  display: inline-block;
  position: relative;
  width: 50px;
  height: 50px;
  -webkit-animation: container-rotate 1568ms linear infinite;
  -moz-animation: container-rotate 1568ms linear infinite;
  -o-animation: container-rotate 1568ms linear infinite;
  animation: container-rotate 1568ms linear infinite; }
  .preloader.pl-size-xl {
    width: 75px;
    height: 75px; }
  .preloader.pl-size-l {
    width: 60px;
    height: 60px; }
  .preloader.pl-size-md {
    width: 50px;
    height: 50px; }
  .preloader.pl-size-sm {
    width: 40px;
    height: 40px; }
  .preloader.pl-size-xs {
    width: 25px;
    height: 25px; }

.spinner-layer {
  position: absolute;
  width: 100%;
  height: 100%;
  border-color: #F44336;
  -ms-opacity: 1;
  opacity: 1;
  -webkit-animation: fill-unfill-rotate 5332ms cubic-bezier(0.4, 0, 0.2, 1) infinite both;
  -moz-animation: fill-unfill-rotate 5332ms cubic-bezier(0.4, 0, 0.2, 1) infinite both;
  -o-animation: fill-unfill-rotate 5332ms cubic-bezier(0.4, 0, 0.2, 1) infinite both;
  animation: fill-unfill-rotate 5332ms cubic-bezier(0.4, 0, 0.2, 1) infinite both; }
  .spinner-layer.pl-red {
    border-color: #F44336; }
  .spinner-layer.pl-pink {
    border-color: #E91E63; }
  .spinner-layer.pl-purple {
    border-color: #9C27B0; }
  .spinner-layer.pl-deep-purple {
    border-color: #673AB7; }
  .spinner-layer.pl-indigo {
    border-color: #3F51B5; }
  .spinner-layer.pl-blue {
    border-color: #2196F3; }
  .spinner-layer.pl-light-blue {
    border-color: #03A9F4; }
  .spinner-layer.pl-cyan {
    border-color: #00BCD4; }
  .spinner-layer.pl-teal {
    border-color: #009688; }
  .spinner-layer.pl-green {
    border-color: #4CAF50; }
  .spinner-layer.pl-light-green {
    border-color: #8BC34A; }
  .spinner-layer.pl-lime {
    border-color: #CDDC39; }
  .spinner-layer.pl-yellow {
    border-color: #ffe821; }
  .spinner-layer.pl-amber {
    border-color: #FFC107; }
  .spinner-layer.pl-orange {
    border-color: #FF9800; }
  .spinner-layer.pl-deep-orange {
    border-color: #FF5722; }
  .spinner-layer.pl-brown {
    border-color: #795548; }
  .spinner-layer.pl-grey {
    border-color: #9E9E9E; }
  .spinner-layer.pl-blue-grey {
    border-color: #607D8B; }
  .spinner-layer.pl-black {
    border-color: #000000; }
  .spinner-layer.pl-white {
    border-color: #ffffff; }

.right {
  float: right !important; }

.gap-patch {
  position: absolute;
  top: 0;
  left: 45%;
  width: 10%;
  height: 100%;
  overflow: hidden;
  border-color: inherit; }
  .gap-patch.circle {
    width: 1000%;
    left: -450%; }

.circle-clipper {
  display: inline-block;
  position: relative;
  width: 50%;
  height: 100%;
  overflow: hidden;
  border-color: inherit; }
  .circle-clipper .circle {
    width: 200%;
    height: 100%;
    border-width: 3px;
    border-style: solid;
    border-color: inherit;
    border-bottom-color: transparent !important;
    -ms-border-radius: 50%;
    border-radius: 50%;
    -webkit-animation: none;
    animation: none;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0; }
  .circle-clipper.left .circle {
    left: 0;
    border-right-color: transparent !important;
    -webkit-transform: rotate(129deg);
    -moz-transform: rotate(129deg);
    -ms-transform: rotate(129deg);
    -o-transform: rotate(129deg);
    transform: rotate(129deg);
    -webkit-animation: left-spin 1333ms cubic-bezier(0.4, 0, 0.2, 1) infinite both;
    -moz-animation: left-spin 1333ms cubic-bezier(0.4, 0, 0.2, 1) infinite both;
    -o-animation: left-spin 1333ms cubic-bezier(0.4, 0, 0.2, 1) infinite both;
    animation: left-spin 1333ms cubic-bezier(0.4, 0, 0.2, 1) infinite both; }
  .circle-clipper.right .circle {
    left: -100%;
    border-left-color: transparent !important;
    -webkit-transform: rotate(-129deg);
    -moz-transform: rotate(-129deg);
    -ms-transform: rotate(-129deg);
    -o-transform: rotate(-129deg);
    transform: rotate(-129deg);
    -webkit-animation: right-spin 1333ms cubic-bezier(0.4, 0, 0.2, 1) infinite both;
    -moz-animation: right-spin 1333ms cubic-bezier(0.4, 0, 0.2, 1) infinite both;
    -o-animation: right-spin 1333ms cubic-bezier(0.4, 0, 0.2, 1) infinite both;
    animation: right-spin 1333ms cubic-bezier(0.4, 0, 0.2, 1) infinite both; }

@-webkit-keyframes container-rotate {
  to {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg); } }

@keyframes container-rotate {
  to {
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg); } }

@-webkit-keyframes fill-unfill-rotate {
  12.5% {
    -webkit-transform: rotate(135deg);
    transform: rotate(135deg); }
  25% {
    -webkit-transform: rotate(270deg);
    transform: rotate(270deg); }
  37.5% {
    -webkit-transform: rotate(405deg);
    transform: rotate(405deg); }
  50% {
    -webkit-transform: rotate(540deg);
    transform: rotate(540deg); }
  62.5% {
    -webkit-transform: rotate(675deg);
    transform: rotate(675deg); }
  75% {
    -webkit-transform: rotate(810deg);
    transform: rotate(810deg); }
  87.5% {
    -webkit-transform: rotate(945deg);
    transform: rotate(945deg); }
  to {
    -webkit-transform: rotate(1080deg);
    transform: rotate(1080deg); } }

@keyframes fill-unfill-rotate {
  12.5% {
    transform: rotate(135deg); }
  25% {
    transform: rotate(270deg); }
  37.5% {
    transform: rotate(405deg); }
  50% {
    transform: rotate(540deg); }
  62.5% {
    transform: rotate(675deg); }
  75% {
    transform: rotate(810deg); }
  87.5% {
    transform: rotate(945deg); }
  to {
    transform: rotate(1080deg); } }

@-webkit-keyframes left-spin {
  from {
    -webkit-transform: rotate(130deg);
    -moz-transform: rotate(130deg);
    -ms-transform: rotate(130deg);
    -o-transform: rotate(130deg);
    transform: rotate(130deg); }
  50% {
    -webkit-transform: rotate(-5deg);
    -moz-transform: rotate(-5deg);
    -ms-transform: rotate(-5deg);
    -o-transform: rotate(-5deg);
    transform: rotate(-5deg); }
  to {
    -webkit-transform: rotate(130deg);
    -moz-transform: rotate(130deg);
    -ms-transform: rotate(130deg);
    -o-transform: rotate(130deg);
    transform: rotate(130deg); } }

@keyframes left-spin {
  from {
    -moz-transform: rotate(130deg);
    -ms-transform: rotate(130deg);
    -o-transform: rotate(130deg);
    -webkit-transform: rotate(130deg);
    transform: rotate(130deg); }
  50% {
    -moz-transform: rotate(-5deg);
    -ms-transform: rotate(-5deg);
    -o-transform: rotate(-5deg);
    -webkit-transform: rotate(-5deg);
    transform: rotate(-5deg); }
  to {
    -moz-transform: rotate(130deg);
    -ms-transform: rotate(130deg);
    -o-transform: rotate(130deg);
    -webkit-transform: rotate(130deg);
    transform: rotate(130deg); } }

@-webkit-keyframes right-spin {
  from {
    -webkit-transform: rotate(-130deg);
    -moz-transform: rotate(-130deg);
    -ms-transform: rotate(-130deg);
    -o-transform: rotate(-130deg);
    transform: rotate(-130deg); }
  50% {
    -webkit-transform: rotate(5deg);
    -moz-transform: rotate(5deg);
    -ms-transform: rotate(5deg);
    -o-transform: rotate(5deg);
    transform: rotate(5deg); }
  to {
    -webkit-transform: rotate(-130deg);
    -moz-transform: rotate(-130deg);
    -ms-transform: rotate(-130deg);
    -o-transform: rotate(-130deg);
    transform: rotate(-130deg); } }

@-moz-keyframes right-spin {
  from {
    -moz-transform: rotate(-130deg);
    -ms-transform: rotate(-130deg);
    -o-transform: rotate(-130deg);
    -webkit-transform: rotate(-130deg);
    transform: rotate(-130deg); }
  50% {
    -moz-transform: rotate(5deg);
    -ms-transform: rotate(5deg);
    -o-transform: rotate(5deg);
    -webkit-transform: rotate(5deg);
    transform: rotate(5deg); }
  to {
    -moz-transform: rotate(-130deg);
    -ms-transform: rotate(-130deg);
    -o-transform: rotate(-130deg);
    -webkit-transform: rotate(-130deg);
    transform: rotate(-130deg); } }

@keyframes right-spin {
  from {
    -moz-transform: rotate(-130deg);
    -ms-transform: rotate(-130deg);
    -o-transform: rotate(-130deg);
    -webkit-transform: rotate(-130deg);
    transform: rotate(-130deg); }
  50% {
    -moz-transform: rotate(5deg);
    -ms-transform: rotate(5deg);
    -o-transform: rotate(5deg);
    -webkit-transform: rotate(5deg);
    transform: rotate(5deg); }
  to {
    -moz-transform: rotate(-130deg);
    -ms-transform: rotate(-130deg);
    -o-transform: rotate(-130deg);
    -webkit-transform: rotate(-130deg);
    transform: rotate(-130deg); } }



  
</style>
<script type="text/javascript">
  $(function () {
    

    setTimeout(function () { $('.page-loader-wrapper').fadeOut(); }, 100);
});
</script>
  <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
</head>