<template>
    <div>
        <div class="flex justify-center items-center h-screen" style="background-color: rgb(49, 49, 49); ">
            <div class="flex" style="width:60%; height: 80%;">
                <div class="contenedor1 flex justify-center items-center rounded-l-3xl">
                    <img v-bind:src="url + 'img/logo.jpeg'" class="" style="width: 85%; height: 30%; ">
                </div>
                <div class="contenedor2 flex justify-center">
                    <div class="flex justify-center items-center rounded-r-3xl"
                        style="width: 30%; ">
                        <el-form :label-position="'top'" style="max-width: 100%;">
                            <div class="flex justify-center text-gray-200 font-mono">
                                <h1 style="font-size: 60px; ">Bienvenido</h1>
                            </div>
                            <div class="text-gray-200 font-mono">
                                <h2 style="font-size: 16px; ">Para continua dar click en iniciar</h2>
                            </div>
                            <br>
                            <div class="flex justify-center items-center">
                                <el-form-item>
                                    <router-link to="/admin/home">
                                        <el-button class="btnIniciar font-mono" type="info" ><p>Iniciar</p></el-button>
                                    </router-link>
                                </el-form-item>
                            </div>
                        </el-form>
                    </div>
                </div>

            </div>

        </div>
        <!--MODAL-->
        <el-dialog v-model="dialogVisible" title="TERMINOS Y CONDICIONES DE CARFACT" width="500">
            <template #footer>
                <div class="dialog-footer">
                    <el-button @click="dialogVisible = false">Cancel</el-button>
                    <el-button type="primary" @click="dialogVisible = false">
                        Confirm
                    </el-button>
                </div>
            </template>
        </el-dialog>
    </div>
    <!--
    <div class="fondo">

        <div class="flex justify-center items-center ">
            <div class="contenedor1 flex justify-center items-center rounded-l-3xl">
                    <img v-bind:src="url + 'img/logo.jpeg'" class="" style="width: 70%; height: 25%; ">
            </div>
            <div class="flex justify-center items-center rounded-r-3xl"
                style="background-color: rgb(25 25 25); width: 30%; ">

                <el-form :label-position="'top'" style="max-width: 100%; " :model="form1" :rules="rules" ref="formRef">

                    <div class="flex justify-center text-gray-200 font-mono">
                        <h1 style="font-size: 60px; ">Bienvenido</h1>
                    </div>
                    <div class="flex justify-center items-center text-gray-200 font-mono">
                        <h2 style="font-size: 20px; ">Login in to your account to continue</h2>
                    </div>

                    <br>

                    <div class="flex justify-center items-center">

                        <el-form-item>
                            <router-link to="/admin/home">
                                <el-button style="background-color: #c94b0e;" type="info" @click="submitForm(formRef)"
                                    round>Iniciar</el-button>
                            </router-link>

                        </el-form-item>

                    </div>

                    <div class="flex justify-center items-center font-mono" style="text-align: center;">

                        <el-form-item>
                            <p style="font-size:20px; color: rgb(229 231 235);">¿Aun no tienes una cuenta...?
                                <router-link to="register">
                                    <p style="color: #c94b0e; font-size:15px;">Haz clic aqui para crearla</p>
                                </router-link>
                            </p>


                        </el-form-item>


                    </div>



                </el-form>
            </div>
        </div>

    </div>
    -->
</template>

<script>

export default {
    methods: {

    },
    name: 'LoginComponent',
    data: () => ({
        name: 'LoginComponent',
        dialogVisible: false,
        formRef: undefined,
        url: process.env.VUE_APP_ROOT_ASSETS,
    })
}
</script>

<style>
.contenedor1 {
    background-color: rgb(33 33 33);
    width: 45%;
    height: 100%;
    border-radius: 10px 0% 0% 10px;
}

.contenedor2 {
    background-color: rgb(25 25 25);
    width: 55%;
    height: 100%;
    border-radius: 0% 10px 10px 0%;
}
.btnIniciar{
    width:100px;
    height:40px;
    font-size: 16px;
    background-color: #c94b0e;
    color: rgb(25 25 25);
    font-weight: 800;
    border: 1px #ffffff solid;

}
.btnIniciar:hover{
    background-color: #ffffff;
    font-size: 20px;
    color: #c94b0e;
    font-weight: 800;
    border: 1px #c94b0e solid;
}
</style>