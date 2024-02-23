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
                            <h6 class="text-white text-capitalize ps-3">Order</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <ul class="list-group list-group-flush mx-4">
                            <li class="list-group-item"><strong>Order ID:</strong> {{ order?.id }}</li>
                            <li class="list-group-item"><strong>Client ID:</strong> {{ order.client?.id }}</li>
                            <li class="list-group-item"><strong>Name:</strong> {{ order.client?.name }}</li>
                            <li class="list-group-item"><strong>Email:</strong> {{ order.client?.email }}</li>
                            <li class="list-group-item"><strong>Birthdate:</strong> {{ order.client?.birthdate }}</li>
                            <li class="list-group-item"><strong>Deliveryman:</strong> {{ order.deliveryman }}</li>
                            <li class="list-group-item"><strong>Deliveryman ID:</strong> {{ order.deliveryman_id }}</li>
                            <li class="list-group-item"><strong>Packages:</strong>
                                        <ul>
                                            <li v-for="pkg in order.packages" :key="pkg.id">
                                                ID: {{ pkg.id }},
                                                Description: {{ pkg.description }},
                                                Height: {{ pkg.height }},
                                                Width: {{ pkg.width }},
                                                Length: {{ pkg.length }},
                                                Weight: {{ pkg.weight }}
                                            </li>
                                        </ul>
                                    </li>                            <li class="list-group-item"><strong>State:</strong> {{ order.state }}</li>
                            <li class="list-group-item"><strong>Truck ID:</strong> {{ order.truck_id }}</li>
                            <li class="list-group-item"><strong>Created At:</strong> {{ order.created_at }}</li>
                        </ul>
                    </div>
                </div>
                </div>
            </div>



            <div class="row pb-4">
                <div class="col-lg-12 col-md-6">
                    <div class="card h-100">
                        <div class="card-header pb-0">
                            <h6>Order Status</h6>
                            <p class="text-sm">
                                <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                                <span class="font-weight-bold">24%</span> to be completed
                            </p>
                        </div>
                        <div class="card-body p-3">
                            <div class="timeline timeline-one-side">
                                <div class="timeline-block mb-3">
                                <span class="timeline-step">
                                    <i class="material-icons text-success text-gradient">notifications</i>
                                </span>
                                <div class="timeline-content">
                                    <h6 class="text-dark text-sm font-weight-bold mb-0">$2400, Design changes</h6>
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 7:20 PM</p>
                                </div>
                                </div>
                                <div class="timeline-block mb-3">
                                <span class="timeline-step">
                                    <i class="material-icons text-danger text-gradient">code</i>
                                </span>
                                <div class="timeline-content">
                                    <h6 class="text-dark text-sm font-weight-bold mb-0">New order #1832412</h6>
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 11 PM</p>
                                </div>
                                </div>
                                <div class="timeline-block mb-3">
                                <span class="timeline-step">
                                    <i class="material-icons text-info text-gradient">shopping_cart</i>
                                </span>
                                <div class="timeline-content">
                                    <h6 class="text-dark text-sm font-weight-bold mb-0">Server payments for April</h6>
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 9:34 PM</p>
                                </div>
                                </div>
                                <div class="timeline-block mb-3">
                                <span class="timeline-step">
                                    <i class="material-icons text-warning text-gradient">credit_card</i>
                                </span>
                                <div class="timeline-content">
                                    <h6 class="text-dark text-sm font-weight-bold mb-0">New card added for order #4395133</h6>
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">20 DEC 2:20 AM</p>
                                </div>
                                </div>
                                <div class="timeline-block mb-3">
                                <span class="timeline-step">
                                    <i class="material-icons text-primary text-gradient">key</i>
                                </span>
                                <div class="timeline-content">
                                    <h6 class="text-dark text-sm font-weight-bold mb-0">Unlock packages for development</h6>
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">18 DEC 4:54 AM</p>
                                </div>
                                </div>
                                <div class="timeline-block">
                                <span class="timeline-step">
                                    <i class="material-icons text-dark text-gradient">payments</i>
                                </span>
                                <div class="timeline-content">
                                    <h6 class="text-dark text-sm font-weight-bold mb-0">New order #9583120</h6>
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">17 DEC</p>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <!-- Map Section -->
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-warning shadow-warning border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Map</h6>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <!-- Map Container -->
                            <div class="leaflet-map-container">
                                <div id="map" style="height: 400px;"></div>
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
import axios from 'axios';
import SidebarAdmin from "@/components/SidebarAdmin.vue";
import HeaderAdmin from "@/components/HeaderAdmin.vue";
import FooterAdmin from "@/components/FooterAdmin.vue";
import L from 'leaflet';
import 'leaflet-routing-machine';

    
export default {
    data() {
        return {
            order: {},
        };
    },
    components: {
        SidebarAdmin,
        HeaderAdmin,
        FooterAdmin
    },
    methods: {
        getOrderDetails() {
            axios.get('/api/orders/' + this.$route.params.id)
                .then(response => {
                    this.order = response.data;
                    // this.orders = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
    },
    mounted() {

        const depotLatitude = 36.7372;
        const depotLongitude = 3.0877;

        const clientCoordinates = [
            { latitude: 35.6971, longitude: -0.6306 }, // Oran
            { latitude: 36.3650, longitude: 6.6147 },  // Constantine
            { latitude: 22.7850, longitude: 5.5228 },  // Tamanrasset
            { latitude: 34.8783, longitude: -1.3155 }  // Tlemcen
        ];

        // Initialize the map
        const map = L.map('map').setView([depotLatitude, depotLongitude], 6);

        // Add a tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Add marker for depot
        const depotMarker = L.marker([depotLatitude, depotLongitude]).addTo(map);
        depotMarker.bindPopup('Depot').openPopup();

        // Draw routes
        for (const clientCoord of clientCoordinates) {
            const clientMarker = L.marker([clientCoord.latitude, clientCoord.longitude]).addTo(map);
            clientMarker.bindPopup('Client').openPopup();

            // Calculate route
            L.Routing.control({
                waypoints: [
                    L.latLng(depotLatitude, depotLongitude),
                    L.latLng(clientCoord.latitude, clientCoord.longitude)
                ],
                routeWhileDragging: true,
                show: false // Hide route instructions
            }).addTo(map);
        }

        document.querySelector('.leaflet-right').style.display = 'none';


        this.getOrderDetails();
    }
}
</script>
      
<style scoped>
@import "leaflet/dist/leaflet.css";

.table thead th {
    padding: 0.75rem 0.5rem;
}

.leaflet-map-container {
    width: 100%;
    height: 100%;
}

#map {
    width: 100%;
    height: 100%;
}
</style>