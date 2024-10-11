<template>
    <div>
        <div class="contrainer">
            <h1 class="flex">
                <div class="lg:w-1/2 mx-auto">
                    
                </div>
                <span>Ver Pedido #{{id}}</span>
                <button class="h-12 w-20 text-white rounded-lg bg-blue-600">
                
                    <span class="material-symbols-outlined">print</span>
                </button>
            
            </h1>
            <div class="flex">

                <div class="lg:w-1/2 mx-auto" v-if="pedido!=null">
                    <div class="flex m-10 bg-gray-200 p-4 rounded-e-3xl"></div>

                </div>

                <div class="lg:w-1/2 mx-auto"></div>
            </div>
        </div>
    </div>
</template>
<script>
import {useRoute} from 'vue-router';
import axios from 'axios';

    export default{
        name:'VerPedidoComponent',
        data(){
            return{
                id:0,
                pedido:null,
                productos:[]
            }
        },
        mounted(){
            const route = useRoute()
            this.id = route .params.id
            axios.get('pedidos/'+this.id).then((res)=>{
                if(res.data.success){
                    console.log
                    this.pedido = res.data.data.pedido
                    this.producto = res.data.data.producto
                }else{
                    console.log("Error al obtener los datos del pedido")
                }
            })
        }
    }
</script>