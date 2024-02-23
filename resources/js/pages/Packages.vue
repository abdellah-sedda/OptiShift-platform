<template>
    
    <div class="g-sidenav-show bg-gray-200">
      <SidebarAdmin />
      <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <HeaderAdmin />
        <!-- End Navbar -->
        <div class="container-fluid py-4 bg-gray-200">
          
            
            

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
                packages: [],
            };
        },
        components: {
            SidebarAdmin,
            HeaderAdmin,
            FooterAdmin
        },
        methods: {
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
        mounted() {
            this.getPackages();
        }
    }
</script>
      
<style scoped>
.table thead th {
    padding: 0.75rem 0.5rem;
}
</style>