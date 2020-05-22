<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>LAM Corp Suite - professional tool for monitoring transparency and management in water dispensing firms.  </title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <link href="assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="assets/js/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/authentication/form-2.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="assets/css/forms/switches.css">
    <link href="plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="assets/css/dashboard/dash_2.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <!--Inject Swal JS-->
    <script src="assets/js/swal.js"></script>
        <?php if(isset($success)) {?>
       <!--This code for injecting success alert-->
               <script>
                           setTimeout(function () 
                           { 
                               swal("Success","<?php echo $success;?>","success");
                           },
                               100);
                          
               </script>

       <?php } ?>
       <?php if(isset($err)) {?>
       <!--This code for injecting error alert-->
               <script>
                           setTimeout(function () 
                           { 
                               swal("Failed","<?php echo $err;?>","error");
                           },
                               100);
               </script>

       <?php } ?>
       <?php if(isset($info)) {?>
       <!--This code for injecting info alert-->
               <script>
                           setTimeout(function () 
                           { 
                               swal("Success","<?php echo $info;?>","info");
                           },
                               100);
               </script>

       <?php } ?>

</head>