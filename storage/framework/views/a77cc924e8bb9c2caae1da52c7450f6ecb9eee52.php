
<section class="search wow fadeInUp delay-1s" id="search">
    <div class="content">
        <div class="tabs">
        
        <div class="tab-content sections-contents" id="pills-tabContent">
            <div class="tab-pane fade active in" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab"> 

                    

            <form class="form" action="<?php echo e(route('search-post')); ?>" method="get"> 
                    <?php echo csrf_field(); ?>
                <div class="row">
                <div class="level col-md-3 col-sm-3">
                    <svg class="olymp-small-pin-icon"><use xlink:href="<?php echo e(asset('modules/master/website/svg-icons/sprites/icons.svg#olymp-small-pin-icon')); ?>"></use></svg>
                    <select name="from" required class="selectpicker style-2 show-tick search-input" overflow-x="auto" data-max-options="1" data-live-search="true">
                        <option title="السفر مــن"  placeholder="السفر مــن" value="" data-content=
                        '<div class="inline-items">
                            <div class="h6 search-friend">السفر مــن</div>
                        </div>'>
                        السفر مــن
                        </option>
                        <?php $__currentLoopData = $stations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $station): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option title="<?php echo e($station->name); ?>" data-content=
                                '<div class="inline-items"> <div class="h6 search-friend"><?php echo e($station->name); ?></div> </div>'> <?php echo e($station->id); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="level col-md-3 col-sm-3">
                    
                    <svg class="olymp-small-pin-icon"><use xlink:href="<?php echo e(asset('modules/master/website/svg-icons/sprites/icons.svg#olymp-small-pin-icon')); ?>"></use></svg>
                    <select name="to" required class="selectpicker style-2 show-tick search-input" overflow-x="auto" data-max-options="1" data-live-search="true">
                        <option title="السفر الــي"  placeholder="السفر الــي" value="" data-content=
                        '<div class="inline-items">
                            <div class="h6 search-friend">السفر الــي</div>
                        </div>'>
                        السفر الــي
                        </option>
                        <?php $__currentLoopData = $stations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $station): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option title="<?php echo e($station->name); ?>" data-content=
                                '<div class="inline-items"> <div class="h6 search-friend"><?php echo e($station->name); ?></div> </div>'> <?php echo e($station->id); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="level col-md-3 col-sm-3"> 
                    <svg class="olymp-month-calendar-icon icon"><use xlink:href="<?php echo e(asset('modules/master/website/svg-icons/sprites/icons.svg#olymp-month-calendar-icon')); ?>"></use></svg>
                    <input name="date" class="search-input text-uppercase"  id="datepicker" type="text" placeholder="التاريــخ (اختياري)">
                </div>
                <div class="search-btn col-md-3 col-sm-3"> 
                    <input class="btn search-submit text-uppercase" id="name" type="submit" value="بحـــث">
                    <svg class="olymp-magnifying-glass-icon"><use xlink:href="<?php echo e(asset('modules/master/website/svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon')); ?>"></use></svg>
                </div>
                </div>
            </form>
            </div>
            <div class="tab-pane fade" id="pills-new" role="tabpanel" aria-labelledby="pills-new-tab">new</div>
            <div class="tab-pane fade" id="pills-used" role="tabpanel" aria-labelledby="pills-used-tab">used</div>
        </div>
        </div>
    </div>
</section>
<?php /**PATH /home/barca/fouad/works/a7jiz/a7giz-24/Modules/Website/Providers/../Resources/views/booking-steps/search-form.blade.php ENDPATH**/ ?>