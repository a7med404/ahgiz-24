<!-- Popup  -->
<div class="modal fade" id="popup-form">
    <div class="modal-dialog" tabindex="-1" role="dialog" aria-labelledby="popup-form" aria-hidden="true">
        <div class="modal-content modal-content-box">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="title">بيانات المستخدم</h4>
            </div>
            <div class="modal-body">
                
                <?php echo Form::open(['route' => ['reservations.store'], 'method' => "POST", 'class' => 'form', 'files' => true]); ?>

                <?php echo $__env->make('reservation::reservations.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>
<!-- ... end Popup  -->


