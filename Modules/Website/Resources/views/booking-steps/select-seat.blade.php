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