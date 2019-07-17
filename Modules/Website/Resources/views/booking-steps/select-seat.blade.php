@extends('website::layouts.master')
@section('title')
Home
@stop
@section('header')

<link rel="stylesheet" href="{{ asset('modules/master/website/css/jquery.seat-charts.css') }}">
<link rel="stylesheet" href="{{ asset('modules/master/website/js/jquery.seat-charts.js') }}">
@endsection
@section('content')
<div class="content">
    <h1>Bus Ticket Reservation Widget</h1>
    <div class="main">
        <h2>Book Your Seat Now?</h2>
        <div class="wrapper">
            <div id="seat-map">
                <div class="front-indicator"><h3>Front</h3></div>
            </div>
            <div class="booking-details">
                        <div id="legend"></div>
                        <h3> Selected Seats (<span id="counter">0</span>):</h3>
                        <ul id="selected-seats" class="scrollbar scrollbar1"></ul>
                        
                        Total: <b>$<span id="total">0</span></b>
                        
                        <button class="checkout-button">Pay Now</button>
            </div>
            <div class="clear"></div>
        </div>
        <script>
                var firstSeatLabel = 1;
            
                $(document).ready(function() {
                    var $cart = $('#selected-seats'),
                        $counter = $('#counter'),
                        $total = $('#total'),
                        sc = $('#seat-map').seatCharts({
                        map: [
                            'ff_ff',
                            'ff_ff',
                            'ee_ee',
                            'ee_ee',
                            'ee___',
                            'ee_ee',
                            'ee_ee',
                            'ee_ee',
                            'eeeee',
                        ],
                        seats: {
                            f: {
                                price   : 100,
                                classes : 'first-class', //your custom CSS class
                                category: 'First Class'
                            },
                            e: {
                                price   : 40,
                                classes : 'economy-class', //your custom CSS class
                                category: 'Economy Class'
                            }					
                        
                        },
                        naming : {
                            top : false,
                            getLabel : function (character, row, column) {
                                return firstSeatLabel++;
                            },
                        },
                        legend : {
                            node : $('#legend'),
                            items : [
                                [ 'f', 'available',   'First Class' ],
                                [ 'e', 'available',   'Economy Class'],
                                [ 'f', 'unavailable', 'Already Booked']
                            ]					
                        },
                        click: function () {
                            if (this.status() == 'available') {
                                //let's create a new <li> which we'll add to the cart items
                                $('<li>'+this.data().category+' : Seat no '+this.settings.label+': <b>$'+this.data().price+'</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
                                    .attr('id', 'cart-item-'+this.settings.id)
                                    .data('seatId', this.settings.id)
                                    .appendTo($cart);
                                
                                /*
                                    * Lets update the counter and total
                                    *
                                    * .find function will not find the current seat, because it will change its stauts only after return
                                    * 'selected'. This is why we have to add 1 to the length and the current seat price to the total.
                                    */
                                $counter.text(sc.find('selected').length+1);
                                $total.text(recalculateTotal(sc)+this.data().price);
                                
                                return 'selected';
                            } else if (this.status() == 'selected') {
                                //update the counter
                                $counter.text(sc.find('selected').length-1);
                                //and total
                                $total.text(recalculateTotal(sc)-this.data().price);
                            
                                //remove the item from our cart
                                $('#cart-item-'+this.settings.id).remove();
                            
                                //seat has been vacated
                                return 'available';
                            } else if (this.status() == 'unavailable') {
                                //seat has been already booked
                                return 'unavailable';
                            } else {
                                return this.style();
                            }
                        }
                    });

                    //this will handle "[cancel]" link clicks
                    $('#selected-seats').on('click', '.cancel-cart-item', function () {
                        //let's just trigger Click event on the appropriate seat, so we don't have to repeat the logic here
                        sc.get($(this).parents('li:first').data('seatId')).click();
                    });

                    //let's pretend some seats have already been booked
                    sc.get(['1_2', '4_1', '7_1', '7_2']).status('unavailable');
            
            });

            function recalculateTotal(sc) {
                var total = 0;
            
                //basically find every selected seat and sum its price
                sc.find('selected').each(function () {
                    total += this.data().price;
                });
                
                return total;
            }
        </script>
    </div>
    <p class="copy_rights">&copy; 2016 Bus Ticket Reservation Widget. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank"> W3layouts</a></p>
</div>
@stop

@section('footer')
	
{{-- <script src="{{ asset('modules/master/website/js/bootstrap-datepicker.js') }}"></script> --}}
@endsection

    
<div class="modal fade " id="myModal-{{$trip->id}}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title l-r-border text-uppercase"> اختيار المقاعد</h3>
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="contect">
                        <div class="select-seats">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="ads">
                                        <div class="car-details">
                                            <div class="overview">
                                                <div class="details text-capitalize tabs">
                                                    <div class="details-item"> 
                                                        <span class="details-item-name">{{ $trip->company->name }}</span>
                                                        <div class="details-item-value">{{ getSelect('station')[$request->from] }} </div>
                                                        <div class="details-item-value m-t-10">{{ $trip->date }} </div>
                                                        <div class="details-item-name">
                                                            <span> {{ $trip->departure_time }} </span>
                                                            <i class="fa fa-chevron-left"></i>
                                                            <span> {{ $trip->arrive_time }} </span>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="details-item"> 
                                                        <div class="details-item-value"><span>المقاعد المختارة</span></div>
                                                        <div class="details-item-name">[ 22, 12, 9 ]</div>
                                                    </div> --}}
                                                    <div class="details-item"> 
                                                        <div class="details-item-value"><span>سعر التذكرة</span></div>
                                                        <div class="details-item-name">{{ $trip->price }} ج.س  </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <a type="submit" class="btn btn-custom text-uppercase" type="button" href="{{ route('bus-details',  ['id' => $trip->id]) }}">اكمال عملية الحجز <i class="fa fa-chevron-left"></i></a> --}}
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="start-form text-capitalize">
                                        <section class="car-details" id="car-details">
                                            <div class="">
                                                <div class="card">
                                                <div class="overview">
                                                    <div class="tabs">
                                                    {{-- <ul class="nav nav-pills mb-3 text-center text-uppercase" id="pills-tab" role="tablist">
                                                        <li class="nav-item active"><a class="nav-link" id="pills-details-tab" data-toggle="pill" href="#pills-details" role="tab" aria-controls="pills-details" aria-selected="true">اختيار المقاعد</a></li>
                                                        <li class="nav-item"><a class="nav-link" id="pills-features-tab" data-toggle="pill" href="#pills-features" role="tab" aria-controls="pills-features" aria-selected="true">نقطة الصعود</a></li>
                                                        <li class="nav-item"><a class="nav-link" id="pills-specifications-tab" data-toggle="pill" href="#pills-specifications" role="tab" aria-controls="pills-specifications" aria-selected="true"> نتقة النزول</a></li>
                                                    </ul> --}}
                                                    <div class="tab-content sections-contents" id="pills-tabContent">
                                                        <div class="tab-pane fade active in" id="pills-details" role="tabpanel" aria-labelledby="pills-details-tab"> 
                                                            <div class="details text-capitalize">
                                                                <div class="booking-details">
    
                                                                    <p class="text-center"> قم باختيار مقعدك المفضل </p>
                                                                    <div id="legend" class="seatCharts-legend">
                                                                        <ul class="seatCharts-legendList">
                                                                            <li class="seatCharts-legendItem">
                                                                                <div class="seatCharts-seat seatCharts-cell available"></div>
                                                                                <span class="seatCharts-legendDescription">متوفرة</span>
                                                                            </li>
                                                                            <li class="seatCharts-legendItem">
                                                                                <div class="seatCharts-seat seatCharts-cell ladies"></div>
                                                                                <span class="seatCharts-legendDescription">متوفرة للسيدات</span>
                                                                            </li>
                                                                            <li class="seatCharts-legendItem">
                                                                                <div class="seatCharts-seat seatCharts-cell selected"></div>
                                                                                <span class="seatCharts-legendDescription">قمت باختياره</span>
                                                                            </li>
    
                                                                            <li class="seatCharts-legendItem">
                                                                                <div class="seatCharts-seat seatCharts-cell unavailable"></div>
                                                                                <span class="seatCharts-legendDescription">محجوز</span>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
    
                                                                </div>
    
                                                                {!! Form::open(['route' => ['save-seats'], 'method' => "POST", 'class' => 'form']) !!}
                                                                    <div class="col col-xl-8 col-lg-8 col-md-8">
                                                                        <div class="form-group">
                                                                            {!! Form::label('seats', 'seats', ['class' => 'control-label']) !!}
                                                                            {!! Form::select('seats[]', getSelect('seat'), null, ['id' => 'seats', 'multiple' => 'multiple', 'data-placeholder' => 'Select a State', 'class' => "select2 form-control  {{ $errors->has('seats') ? ' is-invalid' : '' }}", 'value' => "{{ old('seats') }}", 'required']) !!}
                                                                        </div>
                                                                    </div>
                                                                    {!! Form::hidden('trip_id', $trip->id, ['value' => "{{ $trip->id }}"]) !!}
                                                                    <div class="col col-xl-12 col-lg-12 col-md-12">
                                                                        <div class="form-group">
                                                                            <button type="submit" class="btn btn-custom btn-block text-uppercase">اكمال عملية الحجز <i class="fa fa-chevron-left"></i></button>
                                                                        </div>
                                                                    </div>
                                                                {!! Form::close() !!}
    
                                                            
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
    
                                                </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="close" type="button" data-dismiss="modal">تراجع</button>
                </div>
            </div>
        </div>
    </div>