<template>
    <div class="flex min-h-screen bgHome">
       <AdminAsideComponent />
       <div class="flex-grow text-gray-800">
        <AdminHeaderComponent /> 
         <main class="p-6 sm:p-10 space-y-6">
            <router-view></router-view>
         </main>
         <AdminFooterComponent />
       </div>
    </div>
 
 </template>
 
 <script>
     import AdminAsideComponent from '@/views/layouts/AdminAsideComponent.vue'
     import AdminHeaderComponent from '@/views/layouts/AdminHeaderComponent.vue'
     import AdminFooterComponent from '@/views/layouts/AdminFooterComponent.vue'
     export default {
         name:'AdminLayoutComponent',
         components:{
           AdminAsideComponent,
           AdminHeaderComponent,
           AdminFooterComponent
         }
     }
 </script>

<style>
.bgHome{
  background-color: rgb(25, 25, 25);
}
</style>
