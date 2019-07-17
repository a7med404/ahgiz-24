<template>
  <div>
    <div class="table-responsive">
      <table id="table_id" class="table table-bordered table-hover table-condensed">
        <thead>
          <tr>
            <th>#ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>E-Mail</th>
            <th>Status</th>
            <th>Roles</th>
            <th>{{ __('home/labels.options') }}</th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="user in allUsers" :key="user.id">
            <td v-text="user.id"></td>
            <td v-text="user.name"></td>
            <td v-text="user.phone_number"></td>
            <td v-text="user.email"></td>
            <td v-text="user.status"></td>
            <td>Roles</td>
            <td>
              <div class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                  <span class="fa fa-ellipsis-h"></span>  
                </a>
                <ul class="dropdown-menu">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">استعراض</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1"  @click.prevent="editUser(user)" type="button" data-toggle="modal" data-target="#popup-form">تعديل</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">طباعة</a></li>
                  <li role="presentation" class="divider"></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#" @click.prevent="deleteUser(user.id)">حذف</a></li>
                </ul>
              </div>
            </td>

            <!-- <td>
              <div class="btn-group">
                <a class="btn btn-default" href="#"><i class="fa fa-arrows-alt"></i></a>
                <a class="btn btn-info" @click.prevent="editUser(user)" type="button" data-toggle="modal" data-target="#popup-form"><i class="fa fa-pencil"></i></a>
                <a class="btn btn-danger confirm" href="#" @click.prevent="deleteUser(user.id)"> <i class="fa fa-times"></i></a>
              </div>
            </td> -->
          </tr>
          <tr>
            <td v-if="allUsers.length < 1" colspan="7">
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
                <div class="col-md-6 control-label-checkbox-radio" v-for="role in allRoles" :key="role.id">
                  <label>
                    <input type="checkbox" v-model="user.roles" :value="role.id" class="flat-red">
                    {{ role.display_name }} 
                  </label>
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
          ...mapGetters(['allUsers', 'allRoles'])
        },

        data(){ 
          return {       
            edit: false,
            loading: true,

            user: {
              id           : '',
              name         : '',  
              username     : '',  
              email        : '',  
              phone_number : '',  
              password     : '', 
              note         : '',
              roles        : []
            },
          }
        },

        methods: {
          ...mapActions(['addUser', 'fetchUsers', 'deleteUser', 'updateUser', 'fetchRoles']),          
          createUser: function() {
            let self = this;
            let params = Object.assign({}, this.user);
            this.addUser(params).then(function(){
              self.user.name         = '',  
              self.user.username     = '',  
              self.user.email        = '',  
              self.user.phone_number = '',  
              self.user.password     = '',  
              self.user.note         = '',
              self.user.roles        = []
            });
          },
          
          editUser: function(user) {
            let self = this;
            self.edit = true;
            self.user.id = user.id;
            self.user.name = user.name;
            self.user.username = user.username;
            self.user.email = user.email;
            self.user.phone_number = user.phone_number;
            self.user.note = user.note;
            self.user.roles = user.roles;
          },

          toUpdateUser: function(user) {
            let self = this;
            let params = Object.assign({}, self.user);
            self.updateUser(params, user).then(function(){
              self.user.name          = '',  
              self.user.username      = '',  
              self.user.email         = '',  
              self.user.phone_number  = '',  
              self.user.password      = '',  
              self.user.note          = '',
              self.user.roles         = []
            });
          },

        },
        props: [],
        created() {
          let self = this;
          self.fetchRoles();
          self.fetchUsers().then(function(){self.loading = false;});
        },
        watched() {
          
        }
    }
</script>