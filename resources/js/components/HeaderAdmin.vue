<template>
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">{{ $route.name }}</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">
            {{ $route.name }}
          </h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          
          <ul class="navbar-nav justify-content-end ms-md-auto pe-md-3 d-flex align-items-center">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item d-flex px-3 align-items-center">
              <a href="/profile" class="nav-link text-body p-0">
                <i class="fa fa-user"></i>
              </a>
            </li>
            <li class="nav-item d-flex align-items-center">
              <a href="#" @click="logout" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-sign-out" aria-hidden="true"></i>
                <span class="d-sm-inline d-none"> Logout</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
</template>

<script>
import axios from 'axios';
import { mapActions } from 'vuex';

export default {
  name: "HeaderAdmin",
  methods: {
    ...mapActions('auth', ['setLoggedOut']),

    async logout() {
      await axios.post('api/logout').then(response => {
        this.setLoggedOut();
        this.$router.push('/login');
      }).catch(error => {
        console.error('Logout error:', error);
      });
    },
  },
};
</script>