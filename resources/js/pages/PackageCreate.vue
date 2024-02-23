<template>
    
    <div class="g-sidenav-show bg-gray-200">
      <SidebarAdmin />
      <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <HeaderAdmin />
        <!-- End Navbar -->
        <div class="container-fluid py-4 bg-gray-200">
          
            <section>
                <div class="py-4">
                    <!-- create an alert of success -->
                    <div v-if="alert" class="alert alert-success alert-dismissible fade show" role="alert">
                        <span class="alert-icon text-white"><i class="fas fa-exclamation-circle"></i></span>
                        <span class="alert-text text-white">Package created successfully</span>
                        <button type="button" @click="alert = !alert" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true" class="text-white">&times;</span>
                        </button>
                    </div>
                    <div class="row">
                        <div class="col-lg-11 mx-auto d-flex justify-content-center flex-column">
                            <h3 class="text-center">Create Package</h3>
                            <form role="form" id="contact-form" method="post" autocomplete="off" @submit.prevent="submitForm">
                                <div class="card-body">
                                    <div class="input-group mb-4 input-group-static">
                                        <label>Description of package</label>
                                        <textarea v-model="description" class="form-control" id="message" rows="2" autofocus></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group input-group-dynamic mb-4">
                                                <label class="form-label">{{ height == '' ? 'Height of package' : '' }}</label>
                                                <input v-model="height" class="form-control" aria-label="Height..." type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6 ps-2">
                                            <div class="input-group input-group-dynamic">
                                                <label class="form-label">{{ width == '' ? 'Width of package' : '' }}</label>
                                                <input v-model="width" type="text" class="form-control" placeholder="" aria-label="Width...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group input-group-dynamic mb-4">
                                                <label class="form-label">{{ length == '' ? 'Length of package' : '' }}</label>
                                                <input v-model="length" class="form-control" aria-label="Length..." type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group input-group-dynamic">
                                                <label class="form-label">{{ weight == '' ? 'Weight of package' : '' }}</label>
                                                <input v-model="weight" type="text" class="form-control" placeholder="" aria-label="Weight...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn bg-gradient-dark w-100">Create</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

          
            <FooterAdmin />
        </div>
      </main>
     
    </div>
    
    </template>
      
    <script>
    import SidebarAdmin from "@/components/SidebarAdmin.vue";
    import HeaderAdmin from "@/components/HeaderAdmin.vue";
    import FooterAdmin from "@/components/FooterAdmin.vue";
    
    export default {
        data() {
            return {
                description: '',
                height: '',
                width: '',
                length: '',
                weight: '',
                alert: false
            };
        },
        components: {
            SidebarAdmin,
            HeaderAdmin,
            FooterAdmin
        },
        methods: {
            submitForm() {
                const formData = {
                    description: this.description,
                    height: this.height,
                    width: this.width,
                    length: this.length,
                    weight: this.weight
                };

                axios.post('/api/packages', formData)
                    .then(response => {
                        this.description = '';
                        this.height = '';
                        this.width = '';
                        this.length = '';
                        this.weight = '';
                        this.alert = true;
                    })
                    .catch(error => {
                        console.log(error);
                    });
                


                console.log('Form submitted');
            }
        }

      }
    </script>
      
    <style scoped>
    </style>