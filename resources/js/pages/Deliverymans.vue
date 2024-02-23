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
                            <h6 class="text-white text-capitalize ps-3">Deliveryman table</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cordinates</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(client, index) in clients" :key="index">
                                        <td class="align-middle">
                                            <p class="text-xs text-secondary mb-0">{{ client.id }}</p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="text-xs text-secondary mb-0">{{ client.user.name ?? '-' }}</p>
                                        </td>
                                        <td class="align-middle">
                                            <span class="text-secondary text-xs font-weight-bold">{{ client.user.email ?? '-' }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <span class="text-secondary text-xs font-weight-bold">{{ client.user.phone ?? '-' }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <div class="text-secondary text-xs font-weight-bold">-latitude : {{ client.latitude }}</div>
                                            <div class="text-secondary text-xs font-weight-bold">-longitude : {{ client.longitude }}</div>
                                        </td>
                                        <td class="align-middle">
                                            <a href="#" @click="details(client.id)" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Show">
                                                View
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
                clients: [],
            };
        },
        components: {
            SidebarAdmin,
            HeaderAdmin,
            FooterAdmin
        },
        methods: {
            getOrders() {
                axios.get('/api/clients')
                    .then(response => {
                        this.clients = response.data;
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
            details(client_id) {
                this.$router.push({ name: 'Client', params: { id: client_id } });
            }
        },
        mounted() {
            this.getOrders();
        }
    }
</script>
      
<style scoped>
.table thead th {
    padding: 0.75rem 0.5rem;
}
</style>