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
                
                {!! Form::open(['route' => ['reservations.store'], 'method' => "POST", 'class' => 'form', 'files' => true]) !!}
                @include('reservation::reservations.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<!-- ... end Popup  -->

@section('footer')
<script>

    $('#date').datepicker({
        autoclose: true,
        language: 'ar',
		rtl: true,
		startDate: 'toDay',
		format: 'yyyy-mm-dd'
    });

    //Timepicker
    $("#departure_time").timepicker({
        showInputs: false,
        language: 'ar',
    });
    $("#arrive_time").timepicker({
        showInputs: false,
        language: 'ar',
    });
    // var defaults = $.fn.datepicker.defaults = {
	// 	autoclose: false,
	// 	beforeShowDay: $.noop,
	// 	calendarWeeks: false,
	// 	clearBtn: false,
	// 	daysOfWeekDisabled: [],
	// 	endDate: Infinity,
	// 	forceParse: true,
	// 	format: 'mm/dd/yyyy',
	// 	keyboardNavigation: true,
	// 	language: 'en',
	// 	minViewMode: 0,
	// 	multidate: false,
	// 	multidateSeparator: ',',
	// 	orientation: "auto",
	// 	rtl: false,
	// 	startDate: -Infinity,
	// 	startView: 0,
	// 	todayBtn: false,
	// 	todayHighlight: false,
	// 	weekStart: 0
	// };
</script>
@endsection

