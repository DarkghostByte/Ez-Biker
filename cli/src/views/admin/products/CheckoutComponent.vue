<template>
    <div>
        <div class="flex">
            <!-- Columna de productos -->
            <div class="lg:w-1/2 mx-auto">
                <h2 class="text-lg">Checkout</h2>
            </div>
            <!-- Datos del usuario -->
            <div class="lg:w-1/2 mx-auto py-8">
                
                <el-form ref="formData" :model="form" :label-position="'top'" :rules="rules" >
                    <el-form-item label="Nombre:" prop="name">
                        <el-input v-model="form.name"></el-input>
                    </el-form-item>
                    <el-form-item label="Apellido:" prop="lastname">
                        <el-input v-model="form.lastname"></el-input>
                    </el-form-item>
                    <el-form-item label="Correo Electronico:" prop="email">
                        <el-input v-model="form.email"></el-input>
                    </el-form-item>
                    <el-form-item label="Dirección:" prop="address">
                        <el-input v-model="form.address"></el-input>
                    </el-form-item>
                    <el-form-item label="zip:" prop="zip">
                        <el-input v-model="form.zip"></el-input>
                    </el-form-item>
                    <el-form-item label="Pais:" prop="country">
                        <el-input v-model="form.country"></el-input>
                    </el-form-item>
                    <el-form-item label="Estado:" prop="state">
                        <el-input v-model="form.state"></el-input>
                    </el-form-item>
                    <el-form-item label="Referencia:" prop="reference">
                        <el-input v-model="form.reference"></el-input>
                    </el-form-item>
                    <el-form-item label="Telefono:" prop="phone">
                        <el-input v-model="form.phone"></el-input>
                    </el-form-item>
                    <button v-on:click="saveData(formData)" class="h-12 btnPaypal w-full mx-2" type="button">
                        <span class="material-symbols-outlined">Credit_card</span>
                        Proceder al perro pago
                    </button>
                </el-form>
                <!--END DATOS USUARIO-->
            </div>
        </div>
    </div>
 
</template>
 
<script>
    import { ElNotification } from 'element-plus';
    import axios from 'axios';
    export default {
        name:'CheckoutComponent',
        data(){
            return {
                formData:undefined,
                url:process.env.VUE_APP_ROOT_ASSETS,
                urlApi:process.env.VUE_APP_ROOT_API,            
                form:{
                    name:"Alan",
                    lastname:"Madrid",
                    email:"doctorpuñalon@gmail.com",
                    address:"Picula 3215",
                    zip:"35755",
                    country:"Mejico",
                    state:"Sinaloa",
                    reference:"Balazos en la pared",
                    phone:"6361306641"
                },
                rules:{
                    name:[
                    { required:true, message:'El nombre es requerido', trigger:'blur'},
                    { min:3, max: 100, message:'Longitud debería ser 3 a 100',trigger:'blur'  }
                ],
                lastname:[
                    { required:true, message:'El apellido es requerido', trigger:'blur'},
                    { min:3, max: 100, message:'Longitud debería ser 3 a 100',trigger:'blur'  }
                ],
                email:[
                    { required:true, message:'El email es requerido', trigger:'blur'},
                    { type:'email', message:'El email no es vlido',trigger:'blur'  }
                ],
                zip:[
                    { required:true, message:'El zip es requerido', trigger:'blur'},
                    { min:3, max: 7, message:'La longitud deberia ser de 3 a 7',trigger:'blur'  }
                ],
                counrty:[
                    { required:true, message:'El país es requerido', trigger:'blur'},
                    { min:3, max: 7, message:'La longitud deberia ser de 3 a 7',trigger:'blur'  }
                ],
                state:[
                    { required:true, message:'El estado es requerido', trigger:'blur'},
                    { min:3, max: 7, message:'La longitud deberia ser de 3 a 100',trigger:'blur'  }
                ],
                reference:[
                    { required:true, message:'La referencia es requerida', trigger:'blur'},
                    { min:3, max: 7, message:'La longitud deberia ser de 3 a 100',trigger:'blur'  }
                ],
                phone:[
                    { required:true, message:'El telefono es requerido', trigger:'blur'},
                    { min:3, max: 7, message:'La longitud debe ser igual a 10',trigger:'blur'  }
                ],
                },
                methods: {
                    saveData(){
                        this.$refs.formData.validate( (valid,fields)=>{
                    if(valid){
                        console.log(fields);
                        let prods=[]
                        this.carrito.forEach(item=>{
                            prods.push({
                                id_producto:item.id_producto,
                                cantidad:item.cantidad,
                            })
                        })                                                 
                        
                        let request={
                            name:this.form.name,
                            lastname:this.form.lastname,
                            address:this.form.address,
                            code:this.form.zip,
                            counrty:this.form.counrty,
                            state:this.form.state,
                            phone:this.form.phone,
                            total:this.form.total,
                            email:this.form.email,
                            references:this.form.references,
                            productos:prods,
                        }
                        console.log(JSON.stringify(request))
                        axios.post('pedidos',request).then(response=>{
                            console.log(response.data.pedido)
                            let id = response.data.pedido.id
                            this.$router.push('/pedido/'+id)
                                ElNotification({
                                title:'Pedido enviado',
                                message:'Pedido Guardado',
                                type:'succes'
                                })
                            }).catch(error=>{
                                console.log(error)
                                ElNotification({
                                title:'Error',
                                message:'No se guardo el pedido...',
                                type:'error'
                                })
                            })
                        }else{
                            ElNotification({
                                title:'Error',
                                message:'Favor de llenar los campos',
                                type:'error'
                            })
                        }
                } )
                    }
                },
            }
        }
    };
</script>

<style>
    .btnPaypal{
        color:white;
        background-color: #0070ba;
    }
</style>