<template>


  <aside id="Nav-Box" class="hidden sm:flex sm:flex-col">
    <router-link to="/auth/index"
      class="inline-flex items-center justify-center h-20 w-30 hover:bg-gray-800 focus:bg-gray-800"
      style="background-color: rgb(33, 33, 33);">
      <img v-bind:src="url + 'img/logoEZ.png'" class="flex items-center justify-center h-20 hover:opacity-75">
    </router-link>
    <div class="flex-grow flex flex-col justify-between text-gray-200 hover:opacity-75"
      style="background-color: rgb(33 33 33)">
      <nav class="flex flex-col mx-4 my-6 space-y-4 ">
        <router-link to="/admin/home"
          class="inline-flex items-center justify-center py-3 hover:text-gray-100 hover:bg-orange-700 focus:text-gray-400 focus:bg-orange-500 rounded-3xl">
          <span class="sr-only">Home</span>
          <span class="material-symbols-outlined">home</span>
          <p id="HTxt" class="">Inicio</p>
        </router-link>
        <router-link to="/admin/products"
          class="inline-flex items-center justify-center py-3 hover:text-gray-100 hover:bg-orange-700 focus:text-gray-400 focus:bg-orange-500 rounded-3xl">
          <span class="sr-only">Motocicletas</span>
          <span class="material-symbols-outlined">motorcycle</span>
          <p id="HTxt" class="">Motocicletas</p>
        </router-link>
        <router-link to="/admin/products"
          class="inline-flex items-center justify-center py-3 hover:text-gray-100 hover:bg-orange-700 focus:text-gray-400 focus:bg-orange-500 rounded-3xl">
          <span class="sr-only">Productos</span>
          <span class="material-symbols-outlined">build</span>
          <p id="HTxt" class="">Productos</p>
        </router-link>
        <!--
            <router-link to="/admin/calendar" class="inline-flex items-center justify-center py-3 hover:text-gray-100 hover:bg-orange-700 focus:text-gray-400 focus:bg-orange-500 rounded-3xl">
              <span class="sr-only">Agenda</span>
              <span class="material-symbols-outlined">calendar_clock</span>
              <p id="HTxt" class="">Agenda</p>
            </router-link>
            <router-link to="/admin/admin" class="inline-flex items-center justify-center py-3 hover:text-gray-100 hover:bg-orange-700 focus:text-gray-400 focus:bg-orange-500 rounded-3xl">
              <span class="sr-only">Facturacion</span>
              <span class="material-symbols-outlined">paid</span>
              <p id="HTxt" class="">Facturacion</p>
            </router-link>
            <router-link to="/admin/certificate" class="inline-flex items-center justify-center py-3 hover:text-gray-100 hover:bg-orange-700 focus:text-gray-400 focus:bg-orange-500 rounded-3xl">
              <span class="sr-only">Certificados</span>
              <span class="material-symbols-outlined">verified</span>
              <p id="HTxt" class="">Certificados</p>
            </router-link>
            <router-link to="/admin/payments" class="inline-flex items-center justify-center py-3 hover:text-gray-100 hover:bg-orange-700 focus:text-gray-400 focus:bg-orange-500 rounded-3xl">
              <span class="sr-only">Gastos</span>
              <span class="material-symbols-outlined">payments</span>
              <p id="HTxt" class="">Gastos</p>
            </router-link>
            <router-link to="/admin/admin" class="inline-flex items-center justify-center py-3 hover:text-gray-100 hover:bg-orange-700 focus:text-gray-400 focus:bg-orange-500 rounded-3xl">
              <span class="sr-only">Administracion</span>
              <span class="material-symbols-outlined">shield_person</span>
              <p id="HTxt" class="">Admin</p>
            </router-link>
            -->
      </nav>

    </div>
  </aside>
</template>


<style>
nav {
  display: flex;
  flex-direction: column;
  justify-content: center;
  width: 50px;
  font-size: 0;
  transition: width 0.75s ease-in-out, font-size 0.75s;

}

nav.span {
  margin-left: 15px;
}

nav:hover {
  min-width: 50px;
  font-size: 15px;
  width: 150px;
  color: rgb(255, 255, 255);
  transition: width 0.75s, font-size 0.75s;
}

#HTxt {
  margin-left: 5px;
}
</style>


<script>
import { debounce } from 'lodash';

export default {
  name: 'AdminAsideComponent',
  data() {
    return {
      url: process.env.VUE_APP_ROOT_ASSETS,
      isExpanded: false,
      isHovered: false, // New data property
    };
  },
  methods: {
    toggleExpanded() {
      this.isExpanded = !this.isExpanded;
    },
  },
  mounted() {
    const resizeObserver = new ResizeObserver(debounce(entries => {
      entries.forEach(entry => {
        if (entry.target === this.$el && window.innerWidth <= 768) { // Adjust breakpoint as needed
          this.isExpanded = false;
        }
      });
    }, 200));

    resizeObserver.observe(this.$el);
  }
};
</script>