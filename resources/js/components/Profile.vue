<style lang="">
    .widget-user-header{
        background-position: center center;
        background-size: cover;
        height: 250px!important;
        /* display: none; */
    }
    .widget-user .widget-user-image > img {
      width: 90px;
      height: 90px;
      border: 3px solid #ffffff;
  }
</style>

<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
               <div class="card card-widget widget-user mt-3">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header text-white" style="background: url('./img/team.jpeg') center center;">
                <h3 class="widget-user-username">Elizabeth Pierce</h3>
                <h5 class="widget-user-desc">Web Designer</h5>
              </div>
              <div class="widget-user-image">
                <!-- <img class="img-circle" :src="getProfilePhoto()" @loaded="changeImage" alt="User Avatar"> -->
                <img class="img-circle" :src="getProfilePhoto()" alt="User Avatar">

              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">3,200</h5>
                      <span class="description-text">SALES</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">13,000</h5>
                      <span class="description-text">FOLLOWERS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">35</h5>
                      <span class="description-text">PRODUCTS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Activity</a></li>
                  <!-- <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li> -->
                  <li class="nav-item"><a class="nav-link active show" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="float-right btn-tool"><i class="fa fa-times"></i></a>
                        </span>
                        <span class="description">Shared publicly - 7:30 PM today</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>

                      <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fa fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="fa fa-comments-o mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>

                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post clearfix">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="" alt="User Image">
                        <span class="username">
                          <a href="#">Sarah Ross</a>
                          <a href="#" class="float-right btn-tool"><i class="fa fa-times"></i></a>
                        </span>
                        <span class="description">Sent you a message - 3 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>

                      <form class="form-horizontal">
                        <div class="input-group input-group-sm mb-0">
                          <input class="form-control form-control-sm" placeholder="Response">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-danger">Send</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="" alt="User Image">
                        <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="float-right btn-tool"><i class="fa fa-times"></i></a>
                        </span>
                        <span class="description">Posted 5 photos - 5 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <div class="row mb-3">
                        <div class="col-sm-6">
                          <img class="img-fluid" src="" alt="Photo">
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                          <div class="row">
                            <div class="col-sm-6">
                              <img class="img-fluid mb-3" src="" alt="Photo">
                              <img class="img-fluid" src="" alt="Photo">
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                              <img class="img-fluid mb-3" src="" alt="Photo">
                              <img class="img-fluid" src="" alt="Photo">
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fa fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="fa fa-comments-o mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>

                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  

                  <div class="tab-pane active show" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>

                        <div class="col-sm-12">
                          <input v-model="form.name" type="email" class="form-control" id="name" placeholder="Name" :class="{ 'is-invalid': form.errors.has('name') }">
                          <has-error :form="form" field="email"></has-error>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-12">
                          <input v-model="form.email" type="email" class="form-control" id="email" placeholder="Email" :class="{ 'is-invalid': form.errors.has('email') }">
                          <has-error :form="form" field="email"></has-error>
                        </div>
                      </div>
                      <!-- <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>

                        <div class="col-sm-12">
                          <input v-model="form.name" type="text" class="form-control" id="name" placeholder="Name">
                        </div>
                      </div> -->
                      <div class="form-group">
                        <label for="bio" class="col-sm-2 control-label">Bio</label>

                        <div class="col-sm-12">
                          <textarea class="form-control" id="bio" placeholder="Experience" :class="{ 'is-invalid': form.errors.has('bio') }"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="photo" class="control-label">Upload Photo</label>

                        <div class="col-sm-12">
                          <input type="file" @change="uploadFile" class="form-control" id="photo" name="photo">
                        </div>
                      </div>

                       <div class="form-group">
                        <label for="password" class=" control-label">Enter New Password(leave empty if not changing)</label>

                        <div class="col-sm-12">
                          <input type="password" v-model="form.password" class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                          <has-error :form="form" field="password"></has-error>
                        </div>
                      </div>

                      <!-- <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-12">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div> -->
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-12">
                          <button type="submit" @click.prevent="updateInfo" class="btn btn-danger">Update</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
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

        mounted() {
            console.log('Component mounted.')
        },

        created(){
            axios.get('api/profile')
                .then(({data}) => (this.form.fill(data)));
                // .then(resp => this.form.fill(resp.data))
                Fire.$on('reloadProfileImage', () => {
                  this.reloadImage();
                });
        },
        methods: {
            reloadImage(){
                axios.get('api/profile').then(resp => {
                    // console.log(resp)
                    this.form.photo = resp.data.photo
                });
              },
          //  changeImage(avatar){
          //       //lets update the avatar path
          //       this.form.photo = avatar.src;
                
          //       //now we want to persist to the server
          //       this.persist(avatar.file); //when we call the method, we didnt send through the data URL but the file object itself
          //   },

          //   persist(avatar){
          //       let data = new FormData(); //this guy is needed because we are using "multipart" in our form
          //       //append it and put the form-field
          //       //we made the avatar name equal to the file object
          //       data.append('avatar', avatar);

          //       //now we post that form data to the server
          //       axios.post(`/api/profile`, data)
          //         .then(() => console.log('uploaded'));
          //   },

          getProfilePhoto(){
            // return "img/profile/" + this.form.photo;
            //normallly immediately we upload an image, the image src changes to base64, thats why the image break each time we upload it, except we reload the page
            //now we are going to check if what was uploaded is in base64 format, because the character length is more than 100, when this is the case, give us the photo from the database instead, instead of the base64 string. 
            
            //Else, if the page is refreshed, get the image from the database

            let photo = (this.form.photo.length > 200) ? this.form.photo : "img/profile/"+this.form.photo;

            return photo;
          },
            //pass in the event as a parameter
            uploadFile(e){
                // console.log(e);
                if(! e.target.files.length) return;

                let file = e.target.files[0];

                console.log(file);
                var reader = new FileReader();
                //check if the file size is 2MB, then convert is to base64
                if(file['size'] < 2111775){
                // if(file['size'] < 11117){
                reader.onloadend =  (file) => {
                    // console.log('RESULT', reader.result)
                    //we cant use the 'this' keyword inside the function 
                    //put the file uploaded base64 inside the photo variable
                    this.form.photo = reader.result;
                    // this.$emit('loaded');
                }
                reader.readAsDataURL(file);

                }else{
                    // this.$Progress.fail();
                  //otherwise, show sweet alert message
                  swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'You are uploading a large file',
                  })
                }
            },

            updateInfo(){
                  this.$Progress.start();

                //observe that we are not putting the user id here. this is because, someone can manipulate the id in the dev tools

                this.form.put('api/profile')
                    .then(() => {
                      Fire.$emit('reloadProfileImage')
                      this.$Progress.finish();
                    })
                    .catch(() => {
                      this.$Progress.fail();

                });
            }
        }
    }
</script>
