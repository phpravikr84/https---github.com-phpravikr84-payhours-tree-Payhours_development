<!DOCTYPE html>
<html>
    <!-- head -->
    <?php echo $__env->make('administrator.layouts.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- /head -->
    <body class="hold-transition skin-purple-light sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">

            <!-- header -->
            <?php echo $__env->make('administrator.layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- /header -->

            <!-- Left side column. contains the side bar -->
            <?php echo $__env->make('administrator.layouts.left_side_bar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- /Left Side Bar -->

            <!-- Content Wrapper. Contains page content -->
            <?php echo $__env->yieldContent('main_content'); ?>
            <!-- /content-wrapper -->

            <!-- Footer. contains the footer -->
            <?php echo $__env->make('administrator.layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- /Footer -->

            <!-- Add the side bar's background. This div must be placed immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->

        <!-- Scripts. contains the script -->
        <?php echo $__env->make('administrator.layouts.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- /Scripts -->

        
    </body>


</html>
