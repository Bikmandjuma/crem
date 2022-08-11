<!DOCTYPE html>
<html lang="en">
<head>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Cremohair</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

      <!--w3 style-->
      <link rel="stylesheet" href="../style/dist/w3/w3.css">

      <!-- Font Awesome -->
      <link rel="stylesheet" href="../style/plugins/fontawesome-free/css/all.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <!-- Tempusdominus Bootstrap 4 -->
      <link rel="stylesheet" href="../style/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
      <!-- iCheck -->
      <link rel="stylesheet" href="../style/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
      <!-- JQVMap -->
      <link rel="stylesheet" href="../style/plugins/jqvmap/jqvmap.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="../style/dist/css/adminlte.min.css">
      <!-- overlayScrollbars -->
      <link rel="stylesheet" href="../style/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="../style/plugins/daterangepicker/daterangepicker.css">
      <!-- summernote -->
      <link rel="stylesheet" href="../style/plugins/summernote/summernote-bs4.min.css">
    <style type="text/css">
    
        body{
            background-color:#eee;

        }

      /*css style code for six digit code*/
      .otc {
        position: relative;
        width: 320px;
        margin: 0 auto;
      }

      .otc fieldset {
        border: 0;
        padding: 0;
        margin: 0;
      }

      .otc fieldset div {
        display: flex;
        align-items: center;
      }

      .otc legend {
        margin: 0 auto 1em;
        color: #5555FF;
      }

      input[type="number"] {
        width: .82em;
        line-height: 1;
        margin: .1em;
        padding: 8px 0 4px;
        font-size: 2.65em;
        text-align: center;
        appearance: textfield;
        -webkit-appearance: textfield;
        border: 2px solid #BBBBFF;
        color: purple;
        border-radius: 4px;
      }

      input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }

      /* 2 group of 3 items */
      input[type="number"]:nth-child(n+4) {
        order: 2;
      }
      .otc div::before {
        content: '';
        height: 2px;
        width: 24px;
        margin: 0 .25em;
        order: 1;
        background: #BBBBFF;
      }

      /* From: https://gist.github.com/ffoodd/000b59f431e3e64e4ce1a24d5bb36034 */
      .otc label {
        border: 0 !important;
        clip: rect(1px, 1px, 1px, 1px) !important;
        -webkit-clip-path: inset(50%) !important;
        clip-path: inset(50%) !important;
        height: 1px !important;
        margin: -1px !important;
        overflow: hidden !important;
        padding: 0 !important;
        position: absolute !important;
        width: 1px !important;
        white-space: nowrap !important;
      }
      /*end of the code for the six digit numbers*/
    
    </style>

</head>
<body>

     <main class="py-4">
          @yield('content')
     </main>


    <!-- jQuery -->
    <script src="../style/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../style/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="../style/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../style/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="../style/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="../style/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="../style/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../style/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../style/plugins/moment/moment.min.js"></script>
    <script src="../style/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../style/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="../style/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../style/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE../ App -->
    <script src="../style/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes >
    <script src="../dist/js/demo.js"></script-->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../style/dist/js/pages/dashboard.js"></script>
</body>
</html>
