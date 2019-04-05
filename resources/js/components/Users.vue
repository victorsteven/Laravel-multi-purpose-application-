<style>
    /* v-cloak{
        display: none;
    } */
     [v-cloak] {
            display: none;
        }
</style>

<template>
    <div class="container" v-cloak>
        <div class="row mt-2" v-if="$gate.isAdminOrAuthor()">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users</h3>

                <div class="card-tools">
                  <!-- <button class="btn btn-success"  data-toggle="modal" data-target="#addNew"> -->
                  <button class="btn btn-success" @click="newModal" data-target="#addNew">
                      Add New <i class="fa fa-user-plus fa-fw"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tbody>
                    <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Joined</th>
                  </tr>
                  
                  <!-- <span v-if="!loading"> -->
                  <tr  v-if="!loading" v-for="user in users.data" :key="user.id">
                    <!-- <i class="fas fa-spinner fa-spin"></i> -->
                    <!-- <td><i :class ="loading ? 'fas fa-spinner fa-spin' : ''"></i></td> -->
                    <td>{{ user.id }}</td>
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ user.type | upText}}</td>
                    <td>{{ user.created_at | myDate }}</td>
                    <td>
                        <a href="#" @click="editModal(user)">
                            <i class="fa fa-edit"></i>
                        </a>
                         <a href="#" @click="deleteUser(user.id)">
                            <i class="fa fa-trash red"></i>
                        </a>
                    </td>
                  </tr>
                  <!-- </span> -->
                  <!-- <span v-if="loading" > -->
                    <tr v-if="loading" class="fa-3x">
                        <i style="padding: 20px 0px 20px 20px;" class ="fas fa-spinner fa-spin"></i>
                        <!-- <td style="" class ="fas fa-spinner fa-spin"></td> -->
                    </tr>

                    <tr v-if="!loading" class="">{{ nodata }}</tr>

                    <!-- <tr v-if="!loading" class=""> -->
                        <!-- <div style="padding: 20px 0px 20px 20px;">No data, check spelling</div> -->
                        <!-- <i class ="fas fa-spinner fa-spin"></i> -->
                        <!-- <td style="" class ="fas fa-spinner fa-spin"></td> -->
                    <!-- </tr> -->
                  <!-- </span> -->
                </tbody></table>
              </div>
              <!-- /.card-body -->
              <div v-if="!loading" class="card-footer">
                  <pagination :data="users" @pagination-change-page="getResults"></pagination>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <div v-if="!$gate.isAdminOrAuthor()">
            <not-found></not-found>
        </div>

        
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewLabel" v-show="!editMode">New User</h5>
                <h5 class="modal-title" id="addNewLabel" v-show="editMode">Update User</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Since we are now using conditionals to check the event, we use bracket after the method name  -->
            <form @submit.prevent="editMode ? updateUser() : createUser()">
            <div class="modal-body">
                <div class="form-group">
                    <input v-model="form.name" type="text" name="name" placeholder="Name"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                    <has-error :form="form" field="name"></has-error>
                </div>
                <div class="form-group">
                    <input v-model="form.email" type="email" name="email" placeholder="email"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                    <has-error :form="form" field="email"></has-error>
                </div>
                <div class="form-group">
                    <textarea v-model="form.bio" type="text" name="bio" placeholder="bio"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('bio') }"></textarea>
                    <has-error :form="form" field="bio"></has-error>
                </div>
                <div class="form-group">
                    <select v-model="form.type" type="text" name="type"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
                        <option value="">Select...</option>
                        <option value="user">user</option>
                        <option value="admin">admin</option>
                        <option value="author">author</option>
                    </select>
                    <has-error :form="form" field="type"></has-error>
                </div>
                <div class="form-group">
                    <input v-model="form.password" type="password" name="password" placeholder="password"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                    <has-error :form="form" field="password"></has-error>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button v-show="!editMode"  type="submit" class="btn btn-primary">Create</button>
                <button v-show="editMode" type="submit" class="btn btn-primary">Update</button>

            </div>
            </form>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){

            return {
                nodata: '',
                loading: true,
                editMode: false,
                users: {},
                form: new Form({
                    id: '',
                    name: '',
                    email: '',
                    password: '',
                    type: '',
                    bio: '',
                    photo: '',
                })
            }
        },
        created() {
            Fire.$on('searching', () => {
                //we want to get that search variable declared in the app.js
                let query = this.$parent.search;
                axios.get('api/findUser?q=' + query)
                .then((data) => {
                    // console.log(data)
                    if(data.data !== ''){
                        console.log(data.data)
                        this.users = data.data
                    }else{
                        this.nodata = "<div>No word</div>";
                    }
                })
                .catch(() => {

                })
            })
            console.log('Component mounted.')
            this.loadUsers();
            Fire.$on('reloadUsers', () => {
                this.loadUsers();
            })
            //  Fire.$on('AfterDelete', () => {
            //     this.loadUsers();
            // })
            // setInterval(this.loadUsers(), 3000)

            // setInterval(function(){this.loadUsers()}, 3000)
            //using ES6
            //without using this ES6, we would need to bind the 'this' keyword to an anonimous function
            // setInterval(() => this.loadUsers(), 3000)
            
        },

        methods: {
                // Our method to GET results from a Laravel endpoint
		    getResults(page = 1) {
			axios.get('api/user?page=' + page)
				.then(response => {
					this.users = response.data;
				});
            },

            updateUser(){
                // console.log('editing');
                this.$Progress.start();
                this.form.put(`api/user/${this.form.id}`).then(() => {
                    Fire.$emit('reloadUsers');
                    $('#addNew').modal('hide')
                    toast({
                        type: 'success',
                        title: 'User updated successfully'
                    })
                    this.$Progress.finish()
                }).catch(() => {
                    this.$Progress.fail();
                });
            },
            editModal(user){
                this.editMode = true;
                this.form.reset(); //this is from the vform 
                $('#addNew').modal('show');
                this.form.fill(user);
            },
            newModal(){
                this.editMode = false;
                this.form.reset(); //this is from the vform 
                $('#addNew').modal('show');
            },

            createUser(){
                this.$Progress.start()
                this.form.post('/api/user')
                    .then(() => { //using "then" here is because axios is promise based
                        Fire.$emit('reloadUsers');
                        $('#addNew').modal('hide')
                        toast({
                            type: 'success',
                            title: 'User created successfully'
                        })
                        this.$Progress.finish()
                        // this.form.name = '';
                        // this.form.email = '';
                        // this.form.password = '';
                        // this.form.type = '';
                        // this.form.bio = '';
                        // this.form.photo = '';

                        
                        })
                    .catch()
                
            },
            deleteUser(id){
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        //send request to the server
                         if (result.value) {
                            this.form.delete(`api/user/${id}`).then(() => {
                            //  if (result.value) {
                                swal(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                                )
                                Fire.$emit('reloadUsers');
                            }).catch(() => {
                                swal('Failed', 'There was something wrong', 'warning');
                            })
                        }
                    })
                },

            loadUsers(){
                this.loading = true;
                //below is a boolean so we need to use an if statement to check it
                if(this.$gate.isAdminOrAuthor()){
                
                // axios.get('api/user').then(response => {
                //     console.log(response.data)
                //     // this.users = data
                // });
                 // axios.get('api/user').then(({data}) => (this.users = data.data));

                axios.get('api/user').then(resp => {
                    // console.log(resp.data)
                    //we get the response obj and took the data array from it
                    // this.users = resp.data
                    //so lets just get the object
                    //resp.data have the paginated value, but doing: resp.data.data, we only have access to the data and the paginate

                    this.users = resp.data
                    this.loading = false; 
                });
                    


                //using ES6,  shortcut
                //  axios.get("api/user").then(({ data }) => {
                //      console.log(data);
                //      (this.users = data)
                //  });

            }
        },
    },
    
    }
</script>

<style>
.loader {
    border: 4px solid #f3f3f3;
    border-radius: 50%;
    border-top: 4px solid #3498db;
    width: 30px;
    height: 30px;
    -webkit-animation: spin 2s linear infinite; /* Safari */
    animation: spin 2s linear infinite;

    position: absolute;
    left: 566px;
    bottom: 80px;
  }

  /* Safari */
  @-webkit-keyframes spin {
    0% { -webkit-transform: rotate(0deg); }
    100% { -webkit-transform: rotate(360deg); }
  }

  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }
</style>
