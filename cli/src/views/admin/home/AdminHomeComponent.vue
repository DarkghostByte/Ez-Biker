<template>
  <div class="">
    <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
      <div class="mr-6">
        <h1 class="text-4xl font-semibold mb-2 text-gray-100">Inicio</h1>
        <h2 class="text-gray-100 ml-0.5">Panel de control EZ-Biker</h2>
      </div>
      <div class="flex flex-wrap items-start justify-end -mb-3">
        <button class="inline-flex px-5 py-3 text-gray-300 hover:text-gray-700 focus:text-gray-700 hover:bg-gray-300 focus:bg-gray-300 border border-gray-300 rounded-md mb-3">
          <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="flex-shrink-0 h-5 w-5 -ml-1 mt-0.5 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
          </svg>
          Editar Notas
        </button>
        <button class="inline-flex px-5 py-3 text-white bg-orange-600 hover:bg-orange-700 focus:bg-orange-700 rounded-md ml-6 mb-3">
          <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="flex-shrink-0 h-6 w-6 text-white -ml-1 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
          </svg>
          Crear Nueva Nota
        </button>
      </div>
    </div>
    <section class="grid md:grid-cols-2 xl:grid-cols-4 gap-6 py-3">
      <div class="flex items-center p-8 bg-white shadow rounded-lg">
        <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-orange-600 bg-orange-200 rounded-full mr-6">
          <span class="material-symbols-outlined iconHome">motorcycle</span>
        </div>
        <div>
          <span class="block text-2xl font-bold lblNum">62</span>
          <span class="block text-gray-500 lblText">Motorcicletas</span>
        </div>
      </div>
      <div class="flex items-center p-8 bg-white shadow rounded-lg">
        <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-blue-600 bg-blue-200 rounded-full mr-6">
          <span class="material-symbols-outlined iconHome">service_toolbox</span>
        </div>
        <div>
          <span class="block text-2xl font-bold lblNum">6.8</span>
          <span class="block text-gray-500 lblText">Productos</span>
        </div>
      </div>
      <div class="flex items-center p-8 bg-white shadow rounded-lg">
        <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-red-600 bg-red-200 rounded-full mr-6">
          <span class="material-symbols-outlined iconHome">sports_motorsports</span>
        </div>
        <div>
          <span class="inline-block text-2xl font-bold lblNum">9</span>
          <span class="block text-gray-500 lblText">Accesorios</span>
        </div>
      </div>
      <div class="flex items-center p-8 bg-white shadow rounded-lg">
        <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-yellow-600 bg-yellow-200 rounded-full mr-6">
          <span class="material-symbols-outlined iconHome">description</span>
        </div>
        <div>
          <span class="block text-2xl font-bold lblNum">83</span>
          <span class="block text-gray-500 lblText">Notas creadas</span>
        </div>
      </div>
      
    </section>
    <section class="grid md:grid-cols-2 xl:grid-cols-4 xl:grid-rows-3 xl:grid-flow-col gap-6">
      <div class="flex items-center p-8 bg-white shadow rounded-lg">
        <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-teal-600 bg-teal-200 rounded-full mr-6">
          <span class="material-symbols-outlined iconHome">build</span>
        </div>
        <div>
          <span class="block text-2xl font-bold lblNum">83</span>
          <span class="block text-gray-500 lblText">Servicios pendientes</span>
        </div>
      </div>
      <div class="flex items-center p-8 bg-white shadow rounded-lg">
        <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-green-600 bg-green-200 rounded-full mr-6">
          <span class="material-symbols-outlined iconHome">home_repair_service</span>
        </div>
        <div>
          <span class="block text-2xl font-bold lblNum">83</span>
          <span class="block text-gray-500 lblText">Servicios hechos</span>
        </div>
      </div>
      <div class="flex flex-col md:col-span-3 md:row-span-2 bg-white shadow rounded-lg">
        <div class="px-6 py-5 font-semibold border-b border-gray-100">Notas importantes:</div>
        <div class="p-4 flex-grow overflow-y-auto" style="max-height: 14rem;">
          <ul class="p-6 space-y-6">
            <li class="flex items-center">
              <span class="text-gray-600 long-text">Aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</span>
              <span class="px-3 ml-auto font-semibold">00/00/0000</span>
            </li>
            <li class="flex items-center">
              <span class="text-gray-600">Calvin Steward</span>
              <span class="ml-auto font-semibold">8.9</span>
            </li>
            <li class="flex items-center">
              <span class="text-gray-600">Ralph Richards</span>
              <span class="ml-auto font-semibold">8.7</span>
            </li>
            <li class="flex items-center">
              <span class="text-gray-600">Bernard Murphy</span>
              <span class="ml-auto font-semibold">8.2</span>
            </li>
            <li class="flex items-center">
              <span class="text-gray-600">Arlene Robertson</span>
              <span class="ml-auto font-semibold">8.2</span>
            </li>
            <li class="flex items-center">
              <span class="text-gray-600">Jane Lane</span>
              <span class="ml-auto font-semibold">8.1</span>
            </li>
            <li class="flex items-center">
              <span class="text-gray-600">Pat Mckinney</span>
              <span class="ml-auto font-semibold">7.9</span>
            </li>
            <li class="flex items-center">
              <span class="text-gray-600">Norman Walters</span>
              <span class="ml-auto font-semibold">7.7</span>
            </li>
          </ul>
        </div>
      </div>

      <!--     
      <div class="row-span-3 bg-white shadow rounded-lg">
        <div class="flex items-center justify-between px-6 py-5 font-semibold border-b border-gray-100">
          <span>Empleados</span>
        </div>
              
        <div class="overflow-y-auto" style="max-height: 24rem;">
          <ul class="p-6 space-y-6">
            <li class="flex items-center">
              <div class="h-10 w-10 mr-3 bg-gray-100 rounded-full overflow-hidden">
                <img v-bind:src="url+'img/logoEZ.png'">
              </div>
              <span class="text-gray-600">Annette Watson</span>
            </li>
            <li class="flex items-center">
              <div class="h-10 w-10 mr-3 bg-gray-100 rounded-full overflow-hidden">
                <img v-bind:src="url+'img/logoEZ.png'">              
              </div>
              <span class="text-gray-600">Calvin Steward</span>
            </li>
            <li class="flex items-center">
              <div class="h-10 w-10 mr-3 bg-gray-100 rounded-full overflow-hidden">
                <img v-bind:src="url+'img/logoEZ.png'">              
              </div>
              <span class="text-gray-600">Ralph Richards</span>
            </li>
            <li class="flex items-center">
              <div class="h-10 w-10 mr-3 bg-gray-100 rounded-full overflow-hidden">
                <img v-bind:src="url+'img/logoEZ.png'">              
              </div>
              <span class="text-gray-600">Bernard Murphy</span>
            </li>
            <li class="flex items-center">
              <div class="h-10 w-10 mr-3 bg-gray-100 rounded-full overflow-hidden">
                <img v-bind:src="url+'img/logoEZ.png'">              
              </div>
              <span class="text-gray-600">Arlene Robertson</span>
            </li>
            <li class="flex items-center">
              <div class="h-10 w-10 mr-3 bg-gray-100 rounded-full overflow-hidden">
                <img v-bind:src="url+'img/logoEZ.png'">              
              </div>
              <span class="text-gray-600">Jane Lane</span>
            </li>
            <li class="flex items-center">
              <div class="h-10 w-10 mr-3 bg-gray-100 rounded-full overflow-hidden">
                <img v-bind:src="url+'img/logoEZ.png'">              
              </div>
              <span class="text-gray-600">Pat Mckinney</span>
            </li>
            <li class="flex items-center">
              <div class="h-10 w-10 mr-3 bg-gray-100 rounded-full overflow-hidden">
                <img v-bind:src="url+'img/logoEZ.png'">              
              </div>
              <span class="text-gray-600">Norman Walters</span>
            </li>
          </ul>
              
        </div>
        
      </div>
       -->

    </section>
    
    <!-- END FILE -->
  </div>
 

</template>

<script>
   
    export default {
        name:'AdminHomeComponent',
        data() {
    return {
      url: process.env.VUE_APP_ROOT_ASSETS,
    };
  },
    }
</script>

<style>
.lblNum{
  color:black;
}
.lblText{
  color:rgb(0 0 0 0.50);
}
.iconHome{
  color:black;
}
.iconHomeColor{
  background-color:rgba(255, 94, 0, 0.75);
}
.long-text {
  width: 700px;
  word-wrap: break-word;
}

@media (min-width: 768px) {
  .long-text {
    width: 700px; /* Ancho fijo para pantallas más grandes */
  }
}
</style>