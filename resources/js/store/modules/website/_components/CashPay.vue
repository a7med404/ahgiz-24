<template>
  <div>
    <div class="details text-capitalize">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">عملية الدفع النقدي</h4>
                <!-- {{-- <h3 class="text-capitalize l-r-border">اختار طريقة الدفع المناسبة لك</h3> --}} -->
            </div>
            <div class="panel-body">
                <p class="city m-b-30">قم باختيار المدينة و المحلية الخاصة بك للتواصل مع اقرب مندوب لك من مندوبينا المنتشرين في جميع المدن.</p>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <form class="form" @submit.prevent = "edit ? updateStudentAddress(student) : createStudentAddress()" method="post"> 
                            <!-- <div class="row">
                              <div class="level col-md-12 col-sm-12">
                                  <div class="form-group">
                                      <label class="control-label" for="phone_number">المدينة</label>
                                      <svg class="olymp-dropdown-arrow-icon"><use xlink:href="{{ asset('modules/master/website/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon') }}"></use></svg>
                                      <select class="selectpicker style-2 show-tick search-input" overflow-x="auto" data-max-options="1" data-live-search="true" v-model="address.city" @change="getLocals($event)">
                                        <option :title="value" 
                                          data-content= 
                                          '<div class="inline-items">
                                              <div class="h6 search-friend"> value </div>
                                          </div>'
                                          v-for="(value, index) in cities" 
                                          :key="index" :value="index" 
                                          v-text="value" 
                                          :selected="address.local == index">
                                        </option>
                                        {{index}}
                                      </select>
                                  </div>
                              </div>
                              <div class="level col-md-12 col-sm-12">
                                  <div class="form-group">
                                      <label class="control-label" for="phone_number">المحلية</label>
                                      <svg class="olymp-dropdown-arrow-icon"><use xlink:href="{{ asset('modules/master/website/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon') }}"></use></svg>
                                      <select class="selectpicker style-2 show-tick search-input" overflow-x="auto" data-max-options="1" data-live-search="true" v-model="address.local" :disabled="disableLocal">
                                        <option :title="value" 
                                          data-content=
                                          '<div class="inline-items">
                                              <div class="h6 search-friend">الخرطوم</div>
                                          </div>'
                                          v-for="(value, index) in locals" 
                                          :key="index" :value="index" 
                                          v-text="value" 
                                          :selected="address.local == index">
                                        {{index}}
                                        </option>
                                      </select>
                                  </div>
                              </div>
                            </div> -->

                            <div class="row">
                              <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                  <label class="control-label">المدينة</label>
                                  <select class=" form-control " v-model="address.city" @change="getLocals($event)">
                                    <option 
                                      v-for="(value, index) in cities" 
                                      :key="index" :value="index" 
                                      v-text="value" 
                                      :selected="address.local == index">
                                    </option>
                                  </select>
                                </div>
                              </div>
                              <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                  <label class="control-label">المحلية</label>
                                  <select class=" form-control" v-model="address.local" @change="getDelegate($event)" :disabled="disableLocal">
                                    <option 
                                      v-for="(value, index) in locals" 
                                      :key="index" :value="index" 
                                      v-text="value" 
                                      :selected="address.local == index">
                                    </option>
                                  </select>
                                </div>
                              </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <p class="name m-t-25">رقم المندوب</p>
                        <div  v-if="numbers.length > 1">
                          <p class="value"
                              v-for="number in numbers" 
                              :key="number.phone_number"
                              v-text="number.phone_number">
                          </p>
                        </div>
                        <p class="value" v-else>اتصل علي الخط الساخن {{ hot_line }} </p>
                        <p class="city"> في حالة الدفع النقدي يمكنك الاتصال برقم المندوب من اجل تاكيد عملية الحجز.</p>
                        <div class="social-register">
                            <button class="btn btn-custom text-uppercase"> تاكيد عملية الحجز </button>
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
    import { mapGetters, mapActions } from 'vuex';
    import { globalStore } from '../../helper/general.js';
    export default {
        mounted() { },
        computed: {
          ...mapGetters([''])
        },
        data(){ 
          return {
            locals : [],     
            numbers: [],

            hot_line: '',

            cities      : globalStore.cities,
            locals      : globalStore.locals,
            disableLocal: true,
            city_id:  '',
            local_id: '',

            address: {
              city    : '',
              local   : ''
            },
            
          }
        },
        methods: {
          ...mapActions(['addStudentAddress']),
          

          createStudentAddress: function() {
            let self = this;
            let params = Object.assign({}, this.address);
            this.addStudentAddress(params).then(function(){  
              self.address.city         = '',  
              self.address.local        = ''
            });
          },
           

          getLocals: function(e){
            var self = this;
            self.city_id = e.target.options[e.target.options.selectedIndex].value;
            self.local_id = e.target.options[e.target.options.selectedIndex].value;
            
            axios.get(`/api/address/loacls/${self.city_id}`)
            .then(function(response){
                self.disableLocal = false,
                self.locals = response.data;
            })
            .catch(function(error){
              self.disableLocal = true,
              console.log(error);
            });   
          },

          getDelegate: function(e){
            var self = this;
            self.local_id = e.target.options[e.target.options.selectedIndex].value;
            axios.get(`api/cpanel/users/city/${self.city_id}/local/${self.local_id}`)
            .then(function(response){
                self.numbers = response.data.data;
                self.hot_line = response.data.hot_line;
            })
            .catch(function(error){
              console.log(error);
            });   
          }
        },
        props: [],

        created() { },
        watched() {
          console.log(this.studentid);
        }

    }
</script>