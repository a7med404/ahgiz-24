<template>
  <div>
    <div class="table-responsive">
      <table id="table_id" class="table table-bordered table-hover table-condensed">
        <thead>
          <tr>
            <th>#ID</th>
            <th>Phone</th>
            <th>date</th>
            <th>trip_number</th>
            <th>departure_time</th>
            <th>company</th>
            <th>User</th>
            <th>status</th>
            <th>Options</th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="reservation in allReservations" :key="reservation.id">
            <td v-text="reservation.id"></td>
            <td ><span v-text="reservation.customer.phone_number"  data-toggle="tooltip" :data-original-title="reservation.customer.first_name +' '+ reservation.customer.last_name"></span></td>
            <td v-text="reservation.trip.date"></td>
            <td ><span v-text="reservation.trip.number"  data-toggle="tooltip" :data-original-title="reservation.fromStation +' - '+ reservation.toStation"></span></td>
            <td v-text="reservation.trip.departure_time"></td>
            <td v-text="reservation.trip.company.name"></td>
            <td v-text="reservation.user.name"></td>
            <td v-text="reservation.status"></td>
            <td>
              <div class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                  <span class="fa fa-ellipsis-h"></span>  
                </a>
                <ul class="dropdown-menu">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">استعراض</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" :href="reservation.editRoute">تعديل</a></li>
                  <!-- <li role="presentation"><a role="menuitem" tabindex="-1"  @click.prevent="editReservation(reservation)" type="button" data-toggle="modal" data-target="#popup-form">تعديل</a></li> -->
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">طباعة</a></li>
                  <li role="presentation" class="divider"></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#" @click.prevent="deleteReservation(reservation.id)">حذف</a></li>
                </ul>
              </div>
            </td>
          </tr>
          <tr>
            <td v-if="allReservations.length < 1" colspan="10">
              <div  class="text-center">
                <p>لا توجد بيانات في هذا الجدول</p>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
      <div v-if="loading" style="color: #64d6e2" class="la-line-scale">
        <div></div><div></div><div></div><div></div><div></div>
      </div>
    </div>

    <!-- Popup  -->
    <!-- <div class="modal fade" id="popup-form">
      <div class="modal-dialog"  tabindex="-1" role="dialog"  aria-labelledby="popup-form" aria-hidden="true">
        <div class="modal-content modal-content-box">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="title">بيانات المستخدم</h4>
          </div>
          <div class="modal-body">
            <form @submit.prevent = "edit ? toUpdateReservation(reservation) : createReservation()" role="form">
              <div class="row">
                <div class="col col-lg-6 col-md-6 col-sm-6 col-6">
                  <div class="form-group">
                    <label class="control-label"> trip_id </label>
                    <input class="form-control" placeholder="" type="text" name="name" v-model="reservation.trip_id">
                  </div>
                </div>
                <div class="col col-xl-6 col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="control-label">customer_id</label>
                    <input class="form-control" placeholder="" type="text" name="phone_number" v-model="reservation.customer_id">
                  </div>
                </div>
              </div>

              <hr>
              <div class="row">
                <div class="col col-xl-6 col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="control-label">seat_id</label>
                    <select class="form-control select2" data-placeholder = 'Select a State' multiple = 'multiple' v-model="reservation.seat_id">
                      <option
                        v-for="(value, index) in seats" 
                        :key="index" :value="index" 
                        v-text="value" 
                        :selected="reservation.seat_id == index"> 
                      </option>
                    </select>
                    <select class="form-control select2" v-model="reservation.seat_id">
                      <option 
                        v-for="seat in allClassrooms" 
                        :key="seat.id" :value="seat.id" 
                        v-text="seat.name" 
                        :selected="reservation.seat_id == seat.id">
                      </option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col col-lg-6 col-md-6 col-sm-6 col-12">
                  <button href="#" class="btn btn-primary">حـــفظ</button>
                </div>
                <div class="col col-lg-6 col-md-6 col-sm-6 col-12">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">اغلاق</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div> -->
    <!-- ... end Popup  -->
  </div>
  
</template>

<script>

    import axios from "axios";
    import { mapGetters, mapActions } from 'vuex';
    import { globalStore } from '../../helper/general.js';

    export default {
        mounted() { },

        computed: {
          ...mapGetters(['allReservations'])
        },

        data(){ 
          return {       
            edit: false,
            loading: true,

            reservation: {
              id            : '',
              customer_id   : '',  
              trip_id       : '',  
              status        : '',
              seat_id       :  []
            },
          }
        },

        methods: {
          ...mapActions(['addReservation', 'fetchReservations', 'deleteReservation', 'updateReservation']),          
          createReservation: function() {
            let self = this;
            let params = Object.assign({}, this.reservation);
            this.addReservation(params).then(function(){
              self.reservation.customer_id   = '',  
              self.reservation.trip_id       = '',  
              self.reservation.status        = '',  
              self.reservation.seat_id       = []
            });
          },
          
          editReservation: function(reservation) {
            let self = this;
            self.edit = true;
            self.reservation.id = reservation.id;
            self.reservation.customer_id = reservation.customer_id;
            self.reservation.trip_id = reservation.trip_id;
            self.reservation.status = reservation.status;
            self.reservation.seat_id = reservation.seat_id;
          },

          toUpdateReservation: function(reservation) {
            let self = this;
            let params = Object.assign({}, self.reservation);
            self.updateReservation(params, reservation).then(function(){
              self.reservation.customer_id   = '',  
              self.reservation.trip_id       = '',  
              self.reservation.status        = '',  
              self.reservation.seat_id       = []
            });
          },

        },
        props: [],
        
        created() {
          let self = this;
          self.fetchReservations().then(function(){self.loading = false;});
        },
        watched() {
          
        }
    }
</script>