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
                        <li><a href="<?php echo route('bsp_bank_transfer_setups.index'); ?>"><i class="fa fa-circle-o"></i><?php echo __('BSP Bank Transfer Setup'); ?></a></li>
                        <li><a href="<?php echo route('anz_bank_transfer_setups.index'); ?>"><i class="fa fa-circle-o"></i><?php echo __('ANZ Bank Transfer Setup'); ?></a></li>
                        <li><a href="<?php echo route('wpac_bank_transfer_setups.index'); ?>"><i class="fa fa-circle-o"></i><?php echo __('WPAC Bank Transfer Setup'); ?></a></li>
                        <li><a href="<?php echo route('kina_bank_transfer_setups.index'); ?>"><i class="fa fa-circle-o"></i><?php echo __('KINA Bank Transfer Setup'); ?></a></li>
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
                        <li><a href="<?php echo route('pay_items.index'); ?>"><i class="fa fa-circle-o"></i><?php echo __('Pay Items'); ?></a></li>
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