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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
 
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
