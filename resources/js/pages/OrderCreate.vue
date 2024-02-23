<template>
    
    <div class="g-sidenav-show  bg-gray-200">
      <SidebarAdmin />
      <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <HeaderAdmin />
        <!-- End Navbar -->
        <div class="container-fluid py-4">
          

            <div class="row">
                <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-warning shadow-warning border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Packages table</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Height</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Width</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Length</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Weight</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(pkg, index) in packages" :key="index">
                                        <td class="align-middle">
                                            <p class="text-xs text-secondary mb-0">{{ pkg.id }}</p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="text-xs text-secondary mb-0">{{ pkg.description }}</p>
                                        </td>
                                        <td class="align-middle">
                                            <span class="text-secondary text-xs font-weight-bold">{{ pkg.height }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <span class="text-secondary text-xs font-weight-bold">{{ pkg.width }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <span class="text-secondary text-xs font-weight-bold">{{ pkg.length }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <span class="text-secondary text-xs font-weight-bold">{{ pkg.weight }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <a href="#" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                </div>
            </div>


            <section>
                <div class="py-4">
                    <div v-if="alert" class="alert alert-success alert-dismissible fade show" role="alert">
                        <span class="alert-icon text-white"><i class="fas fa-exclamation-circle"></i></span>
                        <span class="alert-text text-white">Package created successfully</span>
                        <button type="button" @click="alert = !alert" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true" class="text-white">&times;</span>
                        </button>
                    </div>
                    <div class="row">
                        <div class="col-lg-11 mx-auto d-flex justify-content-center flex-column">
                            <h3 class="text-center">Create Order</h3>
                            <form role="form" id="contact-form" method="post" autocomplete="off" @submit.prevent="submitForm">
                                <div class="card-body">
                                    <div class="col-md-12 ps-2">
                                        <div class="input-group input-group-dynamic mb-4">
                                            <label class="form-label">{{ email == '' ? 'Email of client' : '' }}</label>
                                            <input v-model="email" type="text" class="form-control" placeholder="" aria-label="" autofocus>
                                        </div>
                                    </div>
                                    <div class="col-md-12 ps-2">
                                        <div class="input-group input-group-dynamic mb-4">
                                            <label class="form-label">{{ ids == '' ? 'ID of packages - write between each id ","' : '' }}</label>
                                            <input v-model="ids" type="text" class="form-control" placeholder="" aria-label="">
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
            email: '',
            ids: '',
            alert: false,
            packageIds: [],
            packages: []
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
                email: this.email,
                packageIds: this.packageIds,
            };

            axios.post('/api/orders', formData)
                .then(response => {
                    this.email = '';
                    this.packageIds = [];
                    this.ids = '';
                    this.alert = true;
                })
                .catch(error => {
                    console.log(error);
                });            
        },
        splitIds() {
            // Split the input string by commas and trim any whitespace
            this.packageIds = this.ids.split(',').map(id => id.trim());
        },
        getPackages() {
            axios.get('/api/packages')
                .then(response => {
                    console.log(response.data);
                    this.packages = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
    },
    watch: {
        ids() {
            this.splitIds();
        }
    },
    mounted() {
        this.getPackages();
    }
}
</script>
      
<style scoped>
</style>