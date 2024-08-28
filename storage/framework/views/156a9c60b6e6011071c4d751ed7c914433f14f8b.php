<div id="mainMenu">
    <ul class="sidebar-menu" data-widget="tree">
        <li><a href="<?php echo url('/dashboard'); ?>"><i class="fa fa-dashboard text-purple"></i> <span><?php echo __('Dashboard'); ?></span></a></li>

            <!-- Organization -->
            <li class="treeview">
            <a href="#">
                <i class="fa fa-building text-purple"></i> <span><?php echo __('Organization'); ?></span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i><?php echo __('Company Information'); ?></a></li>
                <li><a href="<?php echo url('/setting/branches'); ?>"><i class="fa fa-circle-o"></i><?php echo __('Branches'); ?></a></li>
                <li><a href="<?php echo url('/setting/departments'); ?>"><i class="fa fa-circle-o"></i><?php echo __('Department'); ?></a></li>
            </ul>
        </li>

        <!-- Payroll Setting -->
        <li class="treeview">
            <a href="#">
                <i class="fa fa-money text-purple"></i> <span><?php echo __('Payroll Setting'); ?></span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <!-- System Control Files -->
                <li class="treeview">
                    <a href="#"><i class="fa fa-cogs"></i><?php echo __('System Control Files'); ?>

                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo url('/setting/departments'); ?>"><i class="fa fa-circle-o"></i><?php echo __('System Control File'); ?></a></li>
                        <li><a href="<?php echo url('/setting/bank_lists'); ?>"><i class="fa fa-circle-o"></i><?php echo __('Bank Listing'); ?></a></li>
                        <li><a href="<?php echo route('gl_interface_control_files.index'); ?>"><i class="fa fa-circle-o"></i><?php echo __('GL Interface Control File'); ?></a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i><?php echo __('BSP Bank Transfer Setup'); ?></a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i><?php echo __('ANZ Bank Transfer Setup'); ?></a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i><?php echo __('WPAC Bank Transfer Setup'); ?></a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i><?php echo __('KINA Bank Transfer Setup'); ?></a></li>
                    </ul>
                </li>

                <!-- Reference -->
                <li class="treeview">
                    <a href="#"><i class="fa fa-book"></i><?php echo __('Reference'); ?>

                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo url('/setting/leave_categories'); ?>"><i class="fa fa-circle-o"></i><?php echo __('Manage Leave'); ?></a></li>
                        <li><a href="<?php echo url('/setting/pay_batch_numbers'); ?>"><i class="fa fa-circle-o"></i><?php echo __('Pay Batch Number'); ?></a></li>
                        <li><a href="<?php echo url('/setting/pay_locations'); ?>"><i class="fa fa-circle-o"></i><?php echo __('Pay Location'); ?></a></li>
                        <li><a href="<?php echo url('/setting/gl_codes'); ?>"><i class="fa fa-circle-o"></i><?php echo __('GL Codes'); ?></a></li>
                        <li><a href="<?php echo url('/setting/pay_accumulators'); ?>"><i class="fa fa-circle-o"></i><?php echo __('Pay Accumulators'); ?></a></li>
                        <li><a href="<?php echo url('/setting/superannuations'); ?>"><i class="fa fa-circle-o"></i><?php echo __('Superannuation'); ?></a></li>
                        <li><a href="<?php echo route('setting.bank_details.index'); ?>"><i class="fa fa-circle-o"></i><?php echo __('Bank Details'); ?></a></li>
                        <li><a href="<?php echo route('period_defination_rates.index'); ?>"><i class="fa fa-circle-o"></i><?php echo __('Period Definition'); ?></a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i><?php echo __('Pay Items'); ?></a></li>
                        <li><a href="<?php echo route('period_defination_rates.index'); ?>"><i class="fa fa-circle-o"></i><?php echo __('Currency'); ?></a></li>
                    </ul>
                </li>
            </ul>
        </li>

        <!-- Employees -->
        <li class="treeview">
            <a href="#">
                <i class="fa fa-user text-purple"></i> <span><?php echo __('Employees'); ?></span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i><?php echo __('Employee File Maintenance'); ?></a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i><?php echo __('Approve Employee Changes'); ?></a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i><?php echo __('Employee Loans'); ?></a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i><?php echo __('Leave Request'); ?></a></li>
            </ul>
        </li>

        <!-- Process Pay -->
        <li class="treeview">
            <a href="#">
                <i class="fa fa-credit-card text-purple"></i> <span><?php echo __('Process Pay'); ?></span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i><?php echo __('Pay Reference Status Enquiry'); ?></a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i><?php echo __('Create Pay'); ?></a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i><?php echo __('Manage Pay'); ?></a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i><?php echo __('Approve Process Pay'); ?></a></li>
            </ul>
        </li>

        <!-- Reports -->
        <li class="treeview">
            <a href="#">
                <i class="fa fa-bar-chart text-purple"></i> <span><?php echo __('Reports'); ?></span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i><?php echo __('Payroll Reports'); ?></a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i><?php echo __('Payslips'); ?></a></li>
            </ul>
        </li>
        
        <?php if (\Entrust::can('people')) : ?>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-users text-purple"></i> <span><?php echo __('Employee Management'); ?></span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <?php if (\Entrust::can('manage-employee')) : ?>
                <li><a href="<?php echo url('/people/employees/create'); ?>"><i class="fa fa-circle-o"></i><?php echo __(' New Employee'); ?></a></li>
                <li><a href="<?php echo url('/people/employees'); ?>"><i class="fa fa-circle-o"></i> <?php echo __('Manage Employee'); ?></a></li>
                <?php endif; // Entrust::can ?>
                <?php if (\Entrust::can('manage-clients')) : ?>
                <li><a href="<?php echo url('people/clients/create'); ?>"><i class="fa fa-circle-o"></i><?php echo __(' New Customer'); ?></a></li>
                <li><a href="<?php echo url('/people/clients'); ?>"><i class="fa fa-circle-o"></i> <?php echo __('Manage Clients'); ?></a></li>
                <?php endif; // Entrust::can ?>
                <?php if (\Entrust::can('manage-references')) : ?>
                <li><a href="<?php echo url('people/references/create'); ?>"><i class="fa fa-circle-o"></i><?php echo __(' New Reference'); ?></a></li>
                <li><a href="<?php echo url('/people/references'); ?>"><i class="fa fa-circle-o"></i><?php echo __(' Manage References'); ?></a></li>
                <?php endif; // Entrust::can ?>
            </ul>
        </li>
        <?php endif; // Entrust::can ?>
      
        <?php if (\Entrust::can('payroll-management')) : ?>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-dollar text-purple"></i> <span><?php echo __('Payroll Management'); ?></span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <?php if (\Entrust::can('manage-salary')) : ?>
                <li><a href="<?php echo url('/hrm/payroll'); ?>"><i class="fa fa-circle-o"></i> <?php echo __('Manage Salary'); ?></a></li>
                <?php endif; // Entrust::can ?>
                <?php if (\Entrust::can('salary-list')) : ?>
                <li><a href="<?php echo url('/hrm/payroll/salary-list'); ?>"><i class="fa fa-circle-o"></i> <?php echo __('Salary List'); ?></a></li>
                <?php endif; // Entrust::can ?>

                <li><a href="<?php echo url('/hrm/payroll/increment/search'); ?>"><i class="fa fa-circle-o"></i><?php echo __(' New Increment'); ?></a></li>
                <li><a href="<?php echo url('/hrm/payroll/increment/list'); ?>"><i class="fa fa-circle-o"></i> <?php echo __('Increment List'); ?></a></li>

                <?php if (\Entrust::can('make-payment')) : ?>
                <li><a href="<?php echo url('/hrm/salary-payments'); ?>"><i class="fa fa-circle-o"></i><?php echo __(' Make Payment'); ?></a></li>
                <?php endif; // Entrust::can ?>
                <?php if (\Entrust::can('generate-payslip')) : ?>
                <li><a href="<?php echo url('/hrm/generate-payslips/'); ?>"><i class="fa fa-circle-o"></i> <?php echo __(' Generate Payslip'); ?></a></li>
                <?php endif; // Entrust::can ?>
                <?php if (\Entrust::can('manage-bonus')) : ?>
                <li><a href="<?php echo url('/hrm/bonuses'); ?>"><i class="fa fa-circle-o"></i> <?php echo __('Manage Bonus'); ?></a></li>
                <?php endif; // Entrust::can ?>
                <?php if (\Entrust::can('manage-deduction')) : ?>
                <li><a href="<?php echo url('/hrm/deductions'); ?>"><i class="fa fa-circle-o"></i> <?php echo __('Manage Deduction'); ?></a></li>
                <?php endif; // Entrust::can ?>
                <?php if (\Entrust::can('loan-management')) : ?>
                <li><a href="<?php echo url('/hrm/loans'); ?>"><i class="fa fa-circle-o"></i><?php echo __(' Loan Management'); ?></a></li>
                <?php endif; // Entrust::can ?>
                <?php if (\Entrust::can('provident-fund')) : ?>
                <li><a href="<?php echo url('/hrm/provident-funds'); ?>"><i class="fa fa-circle-o"></i><?php echo __(' Provident Fund'); ?></a></li>
                <?php endif; // Entrust::can ?>
            </ul>
        </li>
        <?php endif; // Entrust::can ?>
        <?php if (\Entrust::can('attendance-management')) : ?>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-calendar text-purple"></i> <span><?php echo __('Attendance Management'); ?></span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <?php if (\Entrust::can('manage-attendance')) : ?>
                <li><a href="<?php echo url('/hrm/attendance/manage'); ?>"><i class="fa fa-circle-o"></i><?php echo __('Manage Attendance'); ?> </a></li>


                <?php endif; // Entrust::can ?>
                <?php if (\Entrust::can('attendance-report')) : ?>
                <li><a href="<?php echo url('/hrm/attendance/details/report/go'); ?>"><i class="fa fa-circle-o"></i><?php echo __(' Attendance Statement'); ?></a></li>
                <li><a href="<?php echo url('/hrm/attendance/report'); ?>"><i class="fa fa-circle-o"></i><?php echo __(' Attendance Report'); ?></a></li>
                <!-- <li><a href="<?php echo url('/hrm/attendance/report'); ?>"><i class="fa fa-circle-o"></i><?php echo __(' Attendance History'); ?></a></li> -->
                <?php endif; // Entrust::can ?>
            </ul>
        </li>
        <?php endif; // Entrust::can ?>
       
       <?php if (\Entrust::can('manage-expense')) : ?>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-minus text-purple"></i> <span><?php echo __('Expense Management'); ?></span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <?php if (\Entrust::can('manage-expense')) : ?>
                <li><a href="<?php echo url('/hrm/expence/category/add'); ?>"><i class="fa fa-circle-o"></i> <span><?php echo __('New Expense Category'); ?></span></a></li>
                <li><a href="<?php echo url('/hrm/expence/category/list'); ?>"><i class="fa fa-circle-o"></i> <span><?php echo __('Expense Category List'); ?></span></a></li>
                <li><a href="<?php echo url('/hrm/expence/add-expence'); ?>"><i class="fa fa-circle-o"></i> <span><?php echo __('Create Expense'); ?></span></a></li>
                <li><a href="<?php echo url('/hrm/expence/manage-expence'); ?>"><i class="fa fa-circle-o"></i> <span><?php echo __('Expense List'); ?></span></a></li>
                <?php endif; // Entrust::can ?>
            </ul>
        </li>
         <?php endif; // Entrust::can ?>
        <?php if (\Entrust::can('leave-application')) : ?>
        <li class="treeview">
            <a href="#">
                <i class="glyphicon glyphicon-send text-purple"></i> <span><?php echo __('Leave Management'); ?></span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
             
                <?php if (\Entrust::can('manage-leave-application')) : ?>
                <li><a href="<?php echo url('/setting/leave_categories/create'); ?>"><i class="fa fa-circle-o"></i><?php echo __('New Leave Category'); ?></a></li>
                <li><a href="<?php echo url('/setting/leave_categories'); ?>"><i class="fa fa-circle-o"></i><?php echo __('Leave Category List'); ?></a></li>
                <li><a href="<?php echo url('/hrm/application_lists'); ?>"><i class="fa fa-circle-o"></i> <span><?php echo __('Leave Application List'); ?></span></a></li>

                <li><a href="<?php echo url('/hrm/leave'); ?>"><i class="fa fa-circle-o"></i> <span><?php echo __('New Leave Apply'); ?></span></a></li>
                <?php endif; // Entrust::can ?>
                <?php if (\Entrust::can('my-leave-application')) : ?>
                <li><a href="<?php echo url('/hrm/leave_application/create'); ?>"><i class="fa fa-circle-o"></i> <span><?php echo __('New Leave Application'); ?></span></a></li>
                <li><a href="<?php echo url('/hrm/leave_application'); ?>"><i class="fa fa-circle-o"></i> <span><?php echo __('Leave Application Manage'); ?></span></a></li>
                <?php endif; // Entrust::can ?>
                <?php if (\Entrust::can('leave-reports')) : ?>
                <li><a href="<?php echo url('/hrm/leave-reports'); ?>"><i class="fa fa-circle-o"></i> <span><?php echo __('Leave Reports'); ?></span></a></li>
                <?php endif; // Entrust::can ?>
            </ul>
        </li>
        <?php endif; // Entrust::can ?>
         <?php if (\Entrust::can('manage-award')) : ?>
         <li class="treeview">
            <a href="#">
                <i class="fa fa-trophy text-purple"></i> <span><?php echo __('Award Management'); ?></span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <?php if (\Entrust::can('manage-award')) : ?>
                <li><a href="<?php echo url('/hrm/employee-awards/create'); ?>"><i class="fa fa-circle-o"></i> <span><?php echo __('New Award'); ?></span></a></li>
                <li><a href="<?php echo url('/hrm/employee-awards'); ?>"><i class="fa fa-circle-o"></i> <span><?php echo __('Manage Award'); ?></span></a></li>
                <?php endif; // Entrust::can ?>
            </ul>
        </li>
        <?php endif; // Entrust::can ?>
        <?php if (\Entrust::can('notice')) : ?>
        <li class="treeview">
            <a href="#">
                <i class="glyphicon glyphicon-bell text-purple"></i> <span><?php echo __('Notice Board'); ?></span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
               
                <?php if (\Entrust::can('manage-notice')) : ?>
                 <li><a href="<?php echo url('hrm/notice/create'); ?>"><i class="fa fa-circle-o"></i><?php echo __('New Notice'); ?></a></li>
                <li><a href="<?php echo url('/hrm/notice'); ?>"><i class="fa fa-circle-o"></i><?php echo __('Manage Notice'); ?></a></li>
                <?php endif; // Entrust::can ?>
                <?php if (\Entrust::can('notice-board')) : ?>
                <li><a href="<?php echo url('/hrm/notice/show'); ?>"><i class="fa fa-circle-o"></i> <span><?php echo __('Notice list'); ?></span></a></li>
                <?php endif; // Entrust::can ?>
            </ul>
        </li>
        <?php endif; // Entrust::can ?>
       <?php if (\Entrust::can('file-upload')) : ?>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-cloud-upload text-purple"></i> <span><?php echo __('File Management'); ?></span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <?php if (\Entrust::can('file-upload')) : ?>
                <li><a href="<?php echo url('/folders/create'); ?>"><i class="fa fa-circle-o"></i> <span><?php echo __('New Upload'); ?></span></a></li>
                <li><a href="<?php echo url('/folders'); ?>"><i class="fa fa-circle-o"></i> <span><?php echo __('File List'); ?></span></a></li>
                <?php endif; // Entrust::can ?>
           
            </ul>
         </li>
         <?php endif; // Entrust::can ?>
       <?php if (\Entrust::can('file-upload')) : ?>
        <li><a href="<?php echo url('/hrm/salary/statement/search'); ?>"><i class="fa fa-certificate"></i> <span><?php echo __('Salary Statement'); ?></span></a></li>
        <?php endif; // Entrust::can ?>

        <?php if (\Entrust::can('hrm-setting')) : ?>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-cog text-purple"></i> <span><?php echo __('Configuration'); ?></span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo url('/setting/client-types'); ?>"><i class="fa fa-circle-o"></i><?php echo __('Manage Client Types'); ?> </a></li>
                <li><a href="<?php echo url('/setting/departments'); ?>"><i class="fa fa-circle-o"></i><?php echo __('Manage Departments'); ?> </a></li>
                <li><a href="<?php echo url('/setting/designations'); ?>"><i class="fa fa-circle-o"></i><?php echo __('Manage Designations'); ?> </a></li>
                <li><a href="<?php echo url('/setting/leave_categories'); ?>"><i class="fa fa-circle-o"></i><?php echo __('Manage Leave Categories'); ?> </a></li>
                <li><a href="<?php echo url('/setting/holidays'); ?>"><i class="fa fa-circle-o"></i><?php echo __('Holiday List'); ?> </a></li>
                <li><a href="<?php echo url('/setting/working-days'); ?>"><i class="fa fa-circle-o"></i> <?php echo __('Set Working Day'); ?></a></li>
                <li><a href="<?php echo url('/setting/shifts'); ?>"><i class="fa fa-circle-o"></i> <?php echo __('Set Working Hours'); ?></a></li>
                <li><a href="<?php echo url('/setting/personal-events'); ?>"><i class="fa fa-circle-o"></i><?php echo __('Personal Event'); ?> </a></li>
                <li><a href="<?php echo url('/setting/award_categories'); ?>"><i class="fa fa-circle-o"></i> <?php echo __('Manage Award Categories'); ?></a></li>
                <?php if (\Entrust::can('role')) : ?>
                <li><a href="<?php echo route('setting.role.index'); ?>"><i class="fa fa-circle-o"></i><?php echo __('Role'); ?></a></li>
                <?php endif; // Entrust::can ?>
                <?php if (\Entrust::can('manage-bankdetails')) : ?>
                <li><a href="<?php echo route('setting.bank_details.index'); ?>"><i class="fa fa-circle-o"></i><?php echo __('Bank Details'); ?></a></li>
                <?php endif; // Entrust::can ?>
            </ul>
        </li>
        <?php endif; // Entrust::can ?>
        
        <li><a href="<?php echo url('/profile/user-profile'); ?>"><i class="fa fa-user text-purple"></i> <span><?php echo __('Profile'); ?></span></a></li>
        <li><a href="<?php echo url('/profile/change-password'); ?>"><i class="fa fa-key text-purple"></i> <span><?php echo __('Change Password'); ?></span></a></li>
        <li><a href="<?php echo url('/public/uploaded_files/payhours-usermanual.pdf'); ?>" target="<?php echo url('/public/uploaded_files/payhours-usermanual.pdf'); ?>"><i class="fa fa-key text-purple"></i> <span><?php echo __('User Manual'); ?></span></a></li>
        <li>
            <a href="<?php echo route('logout'); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-lock text-purple"></i> <span><?php echo __('Logout'); ?></span></a>
            <form id="logout-form" action="<?php echo route('logout'); ?>" method="POST">
                <?php echo csrf_field(); ?>

            </form>
        </li>
    </ul>
</div>