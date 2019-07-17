<template>
    <div>
        <!-- Start Content section-->
        <section class="filter" id="filter">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <!--Start show-cars section-->
                        <section class="show-cars card" id="show-cars">
                            <div class="text-center">
                                <!-- <h3 class="text-capitalize l-r-border">مـن <span> {{ getSelect('station')[$request->from] }} </span>الـي <span> {{ getSelect('station')[$request->to] }} </span></h3> -->
                                <p><span class="h-light">{{ trips.length }}</span> من نتائج البحث </p>
                                <div class="cars-list scale">
                                    <div class="row">
                                        
                                        <div v-for="trip in trips" :key="trip.id" class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="car-card text-center hover-box">
                                                <div class="detail">
                                                    <h3 class="text-uppercase">{{ trip.company.name }}</h3><span class="price"><a>{{ trip.price }} ج.س  </a></span><span class="kilo"><a> {{ trip.avalibale_seats}} مقعد متوفر<i class="fa fa-char"></i></a></span>
                                                    <p class="time"><svg class="olymp-month-calendar-icon icon"><use xlink:href="modules/master/website/svg-icons/sprites/icons.svg#olymp-month-calendar-icon'"></use></svg> تاريخ المغادرة <span class="h-light">({{ trip.date }})</span> </p>
                                                    <ul class="list-unstyled">
                                                        <li>زمن انطلاق الباص:  <span> {{ trip.departure_time }}</span></li>
                                                        <li>مدة السير: <span> 12:50</span></li>
                                                        <li>زمن وصول الباص:  <span> {{ trip.arrive_time }}</span></li>
                                                        <li>المسافة: <span> 560</span> /كم</li> 
                                                    </ul>
                                                    <button class="btn btn-custom text-uppercase" type="button" data-toggle="modal" :data-target="'#modal'+trip.id"> اختيار المقاعد <i class="fa fa-chevron-left"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div v-if="trips.length < 0" class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="no-found"><img class="img-responsive" src="modules/master/website/images/no_bus.png'">
                                                <h3 class="text-uppercase">عفواَ, لا توجد تذاكر متوفرة </h3>
                                                <p><span class="h-light">جرب</span> مرة اخري </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </section>
                        <div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div v-for="trip in trips" :key="trip.id" class="modal fade " :id="'modal'+trip.id">
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
                                                            <span class="details-item-name">{{ trip.company.name }}</span>
                                                            <div class="details-item-value">{{ trip.formStation }} </div>
                                                            <div class="details-item-value m-t-10">{{ trip.date }} </div>
                                                            <div class="details-item-name">
                                                                <span> {{ trip.departure_time }} </span>
                                                                <i class="fa fa-chevron-left"></i>
                                                                <span> {{ trip.arrive_time }} </span>
                                                            </div>
                                                        </div>
                                                        <div class="details-item"> 
                                                            <div class="details-item-value"><span>المقاعد المختارة</span></div>
                                                            <div class="details-item-name">[ {{ trip.seat_id }} ]</div>
                                                        </div>
                                                        <div class="details-item"> 
                                                            <div class="details-item-value"><span>اجمالي تكلفة التذاكر</span></div>
                                                            <div class="details-item-name">2500 ج.س</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a class="btn btn-custom text-uppercase" type="button" :href="'bus-details/'+trip.id">اكمال عملية الحجز <i class="fa fa-chevron-left"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="start-form text-capitalize">
                                            <section class="car-details" id="car-details">
                                                <div class="">
                                                    <div class="card">
                                                    <div class="overview">
                                                        <div class="tabs">
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
                                                                    box of seats
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
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import axios from "axios";
    // import { mapGetters, mapActions } from 'vuex';
 
    export default {
        mounted() { },

        computed: {
        //   ...mapGetters(['trips'])
        },

        data(){ 
          return {       
            edit: false,
            loading: true,
            
            trip: {
              id                : '',
              departure_time    : '',  
              arrive_time       : '',  
              number            : '',
              price             : '',
              date              : '',
              company_id        : '',
              from_station_id   : '',
              to_station_id     : '',
              description       : '',
              seats_number      : '',
              status            : '',
            },
          }
        },

        methods: {
            // async fetchTrips(){
            //     try {
            //     const response = await axios.get('/api/search-post');
            //         console.log(response.data);
            //     } catch (error) {
            //         console.error(error); 
            //     }
            // },
        },
        props: [
            'trips'
        ],
        
        created() {
          let self = this;
          console.log(self.trips);
        //   self.fetchTrips().then(function(){self.loading = false;});
          
        },
        watched() {
          
        }
    }
</script>

