<template>
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="/" target="_blank">
        <img src="../assets/img/Screenshot_2024_02_23-1.png" class="navbar-brand-img h-100 rounded" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">OptiShift</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white" :class="$route.path.includes('/dashboard') ? 'active bg-gradient-warning' : ''" href="/dashboard">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Orders and Packages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" :class="$route.path.includes('/packages') ? 'active bg-gradient-warning' : ''" href="/packages">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">List Of Packages</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" :class="$route.path.includes('/package/create') ? 'active bg-gradient-warning' : ''" href="/package/create">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">view_in_ar</i>
            </div>
            <span class="nav-link-text ms-1">Create Package</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" :class="$route.path.includes('/orders') ? 'active bg-gradient-warning' : ''" href="/orders">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">List Of Orders</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" :class="$route.path.includes('/order/create') ? 'active bg-gradient-warning' : ''" href="/order/create">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">view_in_ar</i>
            </div>
            <span class="nav-link-text ms-1">Create Order</span>
          </a>
        </li>
        
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Client and Employ</h6>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white" :class="$route.path.includes('/clients') ? 'active bg-gradient-warning' : ''" href="/clients">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assignment</i>
            </div>
            <span class="nav-link-text ms-1">List of Clients</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white " :class="$route.path.includes('/deliverymans') ? 'active bg-gradient-warning' : ''" href="/deliverymans">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assignment</i>
            </div>
            <span class="nav-link-text ms-1">List of Deliveryman</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/sign-in.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">login</i>
            </div>
            <span class="nav-link-text ms-1">Sign In</span>
          </a>
        </li>
        
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <button class="btn bg-gradient-danger w-100" @click="logout()" type="button">
            <i class="material-icons opacity-10">login</i> Logout
        </button>
      </div>
    </div>
  </aside>
</template>

<script>
import { mapActions } from 'vuex';

export default {
  name: "SidebarAdmin",
  methods: {
    ...mapActions('auth', ['setLoggedOut']),
    logout() {
      axios.post('/api/logout')
        .then(response => {
          this.setLoggedOut();
          this.$router.push({ name: 'Login' });
        }).catch(error => {
          console.log(error);
        });
    }
  }
};
</script>