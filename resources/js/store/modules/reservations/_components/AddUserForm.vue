<template>
  <div>
    <!-- Popup  -->
    <div class="modal fade" id="popup-form">
      <div class="modal-dialog"  tabindex="-1" role="dialog"  aria-labelledby="popup-form" aria-hidden="true">
        <div class="modal-content modal-content-box">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="title">بيانات المستخدم</h4>
          </div>
          <div class="modal-body">
            <form @submit.prevent = "edit ? toUpdateUser(user) : createUser()" role="form">
              <div class="row">
                <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                  <div class="form-group">
                    <label class="control-label"> الاسم </label>
                    <input class="form-control" placeholder="" type="text" name="name" v-model="user.name">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col col-xl-6 col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="control-label">رقم الهاتف</label>
                    <input class="form-control" placeholder="" type="text" name="phone_number" v-model="user.phone_number">
                  </div>
                </div>
                <div class="col col-xl-6 col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="control-label">البريد الالكتروني</label>
                    <input class="form-control" placeholder="" type="email" name="email" v-model="user.email">
                  </div>
                </div>
              </div>

              <hr>
              <div class="row">
                <div class="col col-xl-6 col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="control-label">اسم المستخدم </label>
                    <input class="form-control" placeholder="" type="text" name="username" v-model="user.username">
                  </div>
                </div>
                <div class="col col-xl-6 col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="control-label">كلمة السر</label>
                    <input class="form-control" placeholder="" type="password" name="password" v-model="user.password">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                  <div class="form-group">
                    <label class="control-label">ملاحظة</label>
                    <textarea class="form-control" placeholder="" name="note" v-model="user.note"></textarea>
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
    </div>
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
          ...mapGetters(['allUsers'])
        },

        data(){ 
          return {       
            edit: false,

            user: {
              id           : '',
              name         : '',  
              username     : '',  
              email        : '',  
              phone_number : '',  
              password     : '', 
              note         : ''
            },
            
          }
        },

        methods: {
          createUser: function() {
            let self = this;
            let params = Object.assign({}, this.user);
            this.addUser(params).then(function(){
              self.user.name          = '',  
              self.user.username      = '',  
              self.user.email         = '',  
              self.user.phone_number  = '',  
              self.user.password      = '',  
              self.user.note          = ''
            });
          },
          ...mapActions(['addUser', 'fetchUsers']),

        },
        props: [],
        created() {
          let self = this;
          self.fetchUsers();
        },
        watched() {
          
        }
    }
</script>