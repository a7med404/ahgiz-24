<td>
  <div class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
      <span class="fa fa-ellipsis-h"></span>
    </a>
    <ul class="dropdown-menu">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo e(route($routeName.'.show',  ['id' => $id])); ?>">استعراض</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo e(route($routeName.'.edit',  ['id' => $id])); ?>">تعديل</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><?php echo e(__('home/sidebar.contacts')); ?></a></li>
      <li role="presentation" class="divider"></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" class="delete-confirm" href="<?php echo e(route($routeName.'.delete',['id' => $id])); ?>">حذف</a></li>
    </ul>
  </div>
</td><?php /**PATH /home/barca/fouad/works/a7jiz/a7giz-24/Modules/Ticket/Providers/../Resources/views/ticket/colums/options.blade.php ENDPATH**/ ?>