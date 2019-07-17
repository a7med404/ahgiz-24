<template>
    <div>
        <section class="card">
            <div class="text-center">
                <h3 class="text-capitalize l-r-border">filter  <span>resulte</span></h3>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="card more-shadow box-shadow">
                    <div class="bus-details">
                        <div class="row">
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-tittripdetailsle">تفاصيل الباص</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <p class="city" v-text="tripAndSeats.trip.fromStation"></p>
                                                <p class="time" v-text="tripAndSeats.trip.departure_time"></p>
                                                <p class="date" v-text="tripAndSeats.trip.date"></p>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <!-- {{-- <img class="img-responsive" src="{{ asset('modules/master/website/images/helper_img1.png') }}"> --}} -->
                                                <p class="city"><span>11:50</span> | <span>400 كم</span></p>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <p class="city" v-text="tripAndSeats.trip.toStation"></p>
                                                <p class="time" v-text="tripAndSeats.trip.arrive_time"></p>
                                                <p class="date" v-text="tripAndSeats.trip.date"></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <p class="name">شركة النقل</p>
                                                <p class="value" v-text="tripAndSeats.trip.company.name"></p>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <p class="name">نقطة الانطلاق</p>
                                                <p class="value" v-text="tripAndSeats.trip.fromStation"></p>
                                                <p class="city" v-text="tripAndSeats.trip.departure_time"></p>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <p class="name">المقاعد المختارة:</p>
                                                <p class="value" v-text="tripAndSeats.seats"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">تفاصيل الباص</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <form class="form" action="" method="post">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="for-middel form-group">
                                                                <label class="control-label" for="first_name">الاسم </label>
                                                                <input id="first_name" name="first_name" type="text"><span
                                                                    class="border-middel"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="for-middel form-group">
                                                                <label class="control-label" for="last_name">اسم الوالد</label>
                                                                <input id="last_name" name="last_name" type="text"><span
                                                                    class="border-middel"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="for-middel form-group">
                                                        <label class="control-label" for="phone_number">رقم الموبايل</label>
                                                        <input id="phone_number" placeholder="xxx xxx xxxx" name="phone_number" type="text" autofocus><span class="border-middel"></span>
                                                    </div>
                                                    <div class="feed-back">سوف يتم ارسال بيانات الحجز الي هذا الرقم.</div>
                                                    <div class="form-group text-uppercase remember">
                                                        <input id="gender" value="1" name="gender" type="radio">
                                                        <label for="gender">ذكـر.</label>
                                                        <input id="gender" value="0" name="gender" type="radio">
                                                        <label for="gender">انثي.</label>
                                                    </div>
                                                    <div class="for-middel form-group">
                                                        <label class="control-label" for="phone_number">تاريخ الميلاد</label>
                                                        <input id="phone_number" placeholder="" name="phone_number" type="text" autofocus><span class="border-middel"></span>
                                                    </div>
                                                    <div class="form-group text-uppercase remember">
                                                        <input id="remember" name="remember" type="checkbox">
                                                        <label for="remember">لديك حساب بالفعل.</label>
                                                    </div>
                                                    <div class="for-middel form-group">
                                                        <label class="control-label" for="password">كلمة السر</label>
                                                        <input id="password" name="password" type="password"><span class="border-middel"></span>
                                                    </div>
                                                    <input class="btn btn-custom text-uppercase" id="name" type="submit" value="انشاء حساب">
                                                </form>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="social-register">
                                                    <button class="btn btn-custom text-uppercase"> <i class="fa fa-facebook"></i> التسجيل عن طريق فيسبوك</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">تفاصيل الباص</h4>
                                    </div>
                                    <div class="panel-body">
                                        <p>اجمالي تكلفة التذاكر</p>
                                        <p class="price" v-text="tripAndSeats.trip.price * tripAndSeats.seats.length +' ج.س '"> </p>
                                        <p class="date" v-text="tripAndSeats.trip.date"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>


<script>

    import axios from "axios";
    import { mapGetters, mapActions } from 'vuex';
 
    export default {
        name: 'busdetails',
        mounted() { },

        computed: {
        },

        data(){ 
          return {       
            loading: true,
            tripAndSeats: ''
          }
        },

        methods: {
            async getTrip(){
                let self = this;
                try {
                    const response = await axios.get(`/api/bus-details/${self.tripdetails.id}`);
                    self.tripAndSeats = response.data;
                } catch (error) {
                    console.error(error); 
                }
            },


            // async getTrip: function(){
            //     let self = this;
            //     await axios.get(`/api/bus-details/${self.tripdetails.id}`)
            //     .then(function(response){
            //     self.tripAndSeats = response.data;
            //     })
            //     .catch(function(error){
            //     console.log(error);
            //     });
            // }
        },
        props: [
          'tripdetails'
        ],
        
        created() {
          let self = this;
          self.getTrip().then(function(){self.loading = false;});
        },
        watched() {
          
        }
    }
</script>

