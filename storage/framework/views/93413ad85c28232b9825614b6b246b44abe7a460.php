<?php $__env->startSection('title'); ?>
  Permission Informations
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
<?php $__env->stopSection(); ?>

                <?php $__env->startSection('content'); ?>
                  <!-- Start  Breadcrumb -->
                  <div class="row">
                    <div class="col-lg-12  float-right">
                      <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo e(url('\adminCpanel')); ?>">HOME</a></li>
                        <li><i class="fa fa-users"></i><a href="<?php echo e(url('\adminCpanel\permissions')); ?>">All Permissions</a></li>
                        <li><i class="fa fa-user"></i>Permission Informations</li>
                      </ol>
                    </div><!-- /.col-lg-12 -->
                  </div><!-- /.row -->
                  <!-- End  Breadcrumb -->

                <div class="x_panel">
                  <div class="x_title">
                    <h2> <?php echo e($permissionInfo->name); ?> </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view">
                        </div>
                      </div>
                      <h3><?php echo e($permissionInfo->display_name); ?></h3>
                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> <?php echo e($permissionInfo->name); ?> </li>
                        <li><i class="fa fa-briefcase user-profile-icon"></i> <?php echo e($permissionInfo->name); ?> </li>
                        <li class="m-top-xs">
                          <p class="lead"> <?php echo e($permissionInfo->description); ?> </p>
                        </li>
                      </ul>
                      <a href="<?php echo e(route('permissions.edit', ['id' => $permissionInfo->id])); ?>" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit permission</a>
                      <br />
                      
                      <!-- end of skills -->
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2>permission Activity Report</h2>
                        </div>
                        <div class="col-md-6">
                          
                        </div>
                      </div>
                      <!-- start of user-activity-graph -->
                      

                      <!-- end of user-activity-graph -->
                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"> Offers </a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Manage Permission Roles </a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                            <!-- start Last Offers -->
                            <ul class="messages">
                              <?php $__currentLoopData = $permissionInfo->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <li>
                                <div class="message_wrapper">
                                  <h4 class="heading"><?php echo e($role->display_name); ?></h4>
                                  <blockquote class="message"><?php echo e($role->description); ?></blockquote>
                                  <br />
                                    <ul class="">
                                        <li class=""><strong> Display Name: </strong><a><?php echo e($role->display_name); ?></a> </li>
                                        <li class=""><strong> Name: </strong><a><?php echo e($role->name); ?></a></li>
                                    </ul>
                                  <p class="url">
                                  </p>
                                </div>
                              </li>
                              
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <!-- end Last Offers -->
                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                            <!-- start Users projects -->
                            <?php if($permissionInfo->roles->count() > 0): ?>
                            <div class="table-responsive">
                              <table class="data table table-striped no-margin">
                                <thead>
                                  <tr>
                                    <th>#ID</th>
                                    <th>Display Name</th>
                                    <th>Description</th>
                                    <th><?php echo e(__('home/labels.options')); ?></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php $id = 0 ?>
                                    <?php $__currentLoopData = $permissionInfo->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <tr>
                                    <td><?php echo e(++$id); ?></td>
                                    <td><?php echo e($role->display_name); ?></td>
                                    <td><?php echo e($role->description); ?></td>
                                    <td>
                                      <a class="btn btn-info btn-xs"   href="<?php echo e(route('permissions.edit', ['id' => $role->id])); ?>">Edit</a>
                                      <a class="btn btn-danger btn-xs" href="<?php echo e(url('adminCpanel/offer/'.$role->id.'/delete')); ?>">Delete</a>
                                    </td>
                                  </tr>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                              </table>
                            </div>
                            <?php else: ?>
                              <p> No Roles To Show...</p>
                            <?php endif; ?>
                            <!-- end Users projects -->

                          </div>
                        </div>
                      </div>
                      Its Permissions
                    </div>
                  </div>
                  </div>
                </div>
              <?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminCpanel.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/a7med404/a7meD404/WD_WORK/WorkingFolder/work-on/a7giz-24/Modules/Customer/Providers/../Resources/views/customers/show.blade.php ENDPATH**/ ?>