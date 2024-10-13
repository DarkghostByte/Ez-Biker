<template>
  <div>
    <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
      <div>
        <h1 class="text-4xl font-semibold mb-2 text-gray-100">Productos</h1>
      </div>
      <div class="flex flex-wrap justify-end mx-auto items-center">
        <div class="flex filtros" style="width: 70%;">
          <el-input class="px-2" placeholder="Marca:" v-model="searchQueryMarca" @input="filterDataMarca" />
          <el-input class="px-2" placeholder="Nombre:" v-model="searchQueryNombre" @input="filterDataNombre" />
          <el-input class="px-2" placeholder="Precio:" v-model="searchQueryPrecio" @input="filterDataPrecio" />
          <el-input class="px-2" placeholder="Categoria:" v-model="searchQueryCategoria" @input="filterDataCategoria" />
        </div>
        <el-button @click="dialogVisibleCreate = true" class="ml-2 el-button btnProduct" type="primary">
          Agregar Producto
        </el-button>
      </div>
    </div>
    <!-- TABLE DATA -->
    <div class="flex" style="justify-content: center;">
      <el-table :data="filteredData" :default-sort="{ prop: 'id', order: 'ascending' }" style="width: 90%">
        <el-table-column label="Vista">
          <template #default="scope">
            <el-button size="small" type="success" @click="seleccionar(scope.row)">Ver</el-button>
          </template>
        </el-table-column>
        <el-table-column prop="id" label="Id" sortable width="80" />
        <el-table-column width="80" label="Imagen">
          <template #default="scope">
            <img v-bind:src="url + 'products/' + scope.row.imgProduct" class="w-5 h-10">
          </template>
        </el-table-column>
        <el-table-column prop="trademark" label="Marca" sortable />
        <el-table-column prop="nameProduct" label="Nombre" sortable />
        <el-table-column prop="priceProduct" label="Precio" sortable />
        <el-table-column prop="categoria" label="Categoria" sortable />
        <el-table-column label="Acciones">
          <template #default="scope">
            <el-button size="small" type="warning" plain @click="handleEdit(scope.row)">Edit</el-button>
            <el-button size="small" type="danger" @click="eliminar(scope.row)">Delete</el-button>
          </template>
        </el-table-column>
      </el-table>
    </div>
    <!-- END TABLE DATA -->

    <!-- MODAL 1 -->
    <el-dialog v-model="dialogVisibleCreate" title="Agregar producto" width="40%">
      <el-form :label-position="'top'" :model="form1" :rules="rules" ref="formRef">
        <div class="flex"
          style="justify-content: center; align-items: center; background-color: #fff; border-radius: 10px;">
          <div class="row" style="width: 50%;">
            <el-form-item class="px-3" prop="trademark" label="Nombre del producto" :label-class="'text-amber-500'">
              <el-input v-model="form1.trademark" />
            </el-form-item>
            <el-form-item class="px-3" prop="nameProduct" label="Nombre del producto" :label-class="'text-amber-500'">
              <el-input v-model="form1.nameProduct" />
            </el-form-item>
            <el-form-item class="px-3" prop="priceProduct" label="Precio del producto" :label-class="'text-amber-500'"
              type="number">
              <el-input v-model="form1.priceProduct" />
            </el-form-item>
            <el-form-item class="px-3" prop="descriptionProduct" label="Descripcion del producto"
              :label-class="'text-amber-500'">
              <el-input v-model="form1.descriptionProduct" />
            </el-form-item>
            <el-form-item class="px-3" prop="id_categoria" label="Categoria:">
              <el-select v-model="form1.id_categoria" placeholder="categoría" :disabled="!Categorias.length">
                <el-option v-for="categoria in Categorias" :key="categoria.id" :label="categoria.categoria"
                  :value="categoria.id" />
              </el-select>
              <div v-if="!Categorias.length">Loading categorias...</div>
            </el-form-item>
          </div>
          <div class="row" style="width: 50%;">
            <el-upload class="upload-demo px-3 py-3" drag :on-success="successUpload" :on-error="errorUpload"
              :action="urlApi + 'products/add/upload'" :auto-upload="false" ref="uploadRef">
              <el-icon class="el-icon--upload"><upload-filled /></el-icon>
              <div class="el-upload__text">
                Drop file here or <em>click to upload</em>
              </div>
              <template #tip>
                <div class="el-upload__tip">
                  jpg/png files with a size less than 500kb
                </div>
              </template>
            </el-upload>
          </div>
        </div>
      </el-form>
      <template #footer>
        <span class="dialog-footer">
          <el-button type="danger" plain @click="dialogVisibleCreate = false">Cancelar</el-button>
          <el-button type="success" @click="submitForm(formRef)">Guardar</el-button>
        </span>
      </template>
    </el-dialog>
    <!-- END MODAL 1 -->

    <!-- MODAL 2 -->
    <el-dialog v-model="dialogVisibleView" title="Datos del producto" width="25%" height="auto">
      <div class="product-details">
        <div class="product-img">
          <img v-bind:src="url + 'products/' + selectedItem.imgProduct">
        </div>
        <div class="product-info">
          <h2 class="product-title">{{ selectedItem.nameProduct }}</h2>
          <p class="product-trademark"><strong>Marca: </strong> {{ selectedItem.trademark }}</p>
          <p class="product-price"><strong>Precio: </strong> {{ selectedItem.priceProduct }}</p>
          <p class="product-description">{{ selectedItem.descriptionProduct }}</p>
        </div>
      </div>
      <template #footer>
        <div class="dialog-footer">
          <el-button type="success" @click="dialogVisibleView = false">Listo</el-button>
        </div>
      </template>
    </el-dialog>
    <!-- END MODAL 2 -->

    <!-- MODAL 3 -->
    <el-dialog v-model="dialogVisibleEdit" title="Editar Producto" width="30%">
      <el-form :label-position="'top'" :model="formEdit" :rules="rulesEdit" ref="formEditRef">
        <div class="flex"
          style="justify-content: center; align-items: center; background-color: #fff; border-radius: 10px;">
          <div class="row" style="width: 100%;">
              <el-form-item class="px-3" prop="trademark" label="Nombre del producto" :label-class="'text-amber-500'">
                <el-input v-model="formEdit.trademark" />
              </el-form-item>
              <el-form-item class="px-3" prop="nameProduct" label="Nombre del producto" :label-class="'text-amber-500'">
                <el-input v-model="formEdit.nameProduct" />
              </el-form-item>
            <el-form-item class="px-3" prop="priceProduct" label="Precio del producto" :label-class="'text-amber-500'"
              type="number">
              <el-input v-model="formEdit.priceProduct" />
            </el-form-item>
            <el-form-item class="px-3" prop="descriptionProduct" label="Descripcion del producto"
              :label-class="'text-amber-500'">
              <el-input v-model="formEdit.descriptionProduct" />
            </el-form-item>
            <el-form-item class="px-3" prop="id_categoria" label="Categoria:">
              <el-select v-model="formEdit.id_categoria" placeholder="categoría" :disabled="!Categorias.length">
                <el-option v-for="categoria in Categorias" :key="categoria.id" :label="categoria.categoria"
                  :value="categoria.id" />
              </el-select>
              <div v-if="!Categorias.length">Loading categorias...</div>
            </el-form-item>
          </div>
        </div>
      </el-form>
      <template #footer>
        <span class="dialog-footer">
          <el-button type="danger" plain @click="dialogVisibleEdit = false">Cancelar</el-button>
          <el-button type="warning" @click="editProduct">Actualizar</el-button>
        </span>
      </template>
    </el-dialog>
    <!-- END MODAL 3 -->

    <!-- MODAL 4 -->
    <el-dialog v-model="dialogVisible" title="¿Deseas eliminar este producto?" width="20%" height="auto">
      <div class="product-details">
        <div class="product-info">
          <h2 class="product-title">{{ selectedItem.nameProduct }}</h2>
          <p class="product-trademark">Marca: {{ selectedItem.trademark }}</p>
          <p class="product-price">Precio: {{ selectedItem.priceProduct }}</p>
          <p class="product-description">{{ selectedItem.descriptionProduct }}</p>
        </div>
      </div>
      <template #footer>
        <div class="dialog-footer">
          <el-button type="warning" plain @click="dialogVisible = false">Cancelar</el-button>
          <el-button type="danger" @click="handleDelete()">
            Confirmar
          </el-button>
        </div>
      </template>
    </el-dialog>
    <!-- END MODAL 4 -->
  </div>

</template>

<script>
import axios from 'axios';
import { ElNotification } from 'element-plus';

export default {
  name: 'AdminProductsComponent',

  data: () => ({
    tableData: [],
    filteredData: [],
    formRef: undefined,
    uploadRef: undefined,
    url: process.env.VUE_APP_ROOT_ASSETS,
    urlApi: process.env.VUE_APP_ROOT_API,
    dialogVisibleCreate: false,
    dialogVisible: false,
    Categorias: [],
    searchQueryCategoria: '',
    searchQueryMarca: '',
    searchQueryNombre: '',
    searchQueryPrecio: '',
    dialogVisibleView: false,
    dialogVisibleEdit: false,
    selectedItem: {},
    form1: {
      trademark: '',
      nameProduct: '',
      priceProduct: '',
      id_categoria: '',
      descriptionProduct: '',
      imgProduct: '',
    },
    formEdit: {
      trademark: '',
      nameProduct: '',
      priceProduct: '',
      id_categoria: '',
      descriptionProduct: '',
    },
    rules: {
      trademark: [
        { required: true, message: 'El nombre es requerido', trigger: 'blur' },
        { min: 3, max: 100, message: 'Longitud debería ser 3 a 100', trigger: 'blur' }
      ],
      nameProduct: [
        { required: true, message: 'El nombre es requerido', trigger: 'blur' },
        { min: 3, max: 100, message: 'Longitud debería ser 3 a 100', trigger: 'blur' }
      ],
      priceProduct: [
        { required: true, message: 'El nombre es requerido', trigger: 'blur' },
        { min: 3, max: 100, message: 'Longitud debería ser 3 a 100', trigger: 'blur' }
      ],
      id_categoria: [
        { required: true, message: 'El nombre es requerido', trigger: 'blur' },
      ],
      descriptionProduct: [
        { required: true, message: 'El nombre es requerido', trigger: 'blur' },
        { min: 3, max: 100, message: 'Longitud debería ser 3 a 100', trigger: 'blur' }
      ],
      imgProduct: [
        { required: true, message: 'El nombre es requerido', trigger: 'blur' },
      ],
    },
    rulesEdit: {
      trademark: [
        { required: true, message: 'El nombre es requerido', trigger: 'blur' },
        { min: 3, max: 100, message: 'Longitud debería ser 3 a 100', trigger: 'blur' }
      ],
      nameProduct: [
        { required: true, message: 'El nombre es requerido', trigger: 'blur' },
        { min: 3, max: 100, message: 'Longitud debería ser 3 a 100', trigger: 'blur' }
      ],
      priceProduct: [
        { required: true, message: 'El nombre es requerido', trigger: 'blur' },
        { min: 3, max: 100, message: 'Longitud debería ser 3 a 100', trigger: 'blur' }
      ],
      id_categoria: [
        { required: true, message: 'El nombre es requerido', trigger: 'blur' },
      ],
      descriptionProduct: [
        { required: true, message: 'El nombre es requerido', trigger: 'blur' },
        { min: 3, max: 100, message: 'Longitud debería ser 3 a 100', trigger: 'blur' }
      ],
    }
  }),
  mounted() {
    this.fetchCategorias();
    this.refresh();
  },
  methods: {
    refresh() {
      axios.get('products').then(res => {
        this.tableData = res.data.data;
        this.filteredData = this.tableData;
      });
    },
    errorUpload(error) {
      console.log(error)
    },

    successUpload(response) {
      console.log(response)
      this.form1.imgProduct = response.filename
      axios.post('products', this.form1).then(response => {
        console.log(response)
        ElNotification({
          title: 'Alerta',
          message: 'Registro insertado correctamente',
          type: 'success'
        })
        this.dialogVisibleCreate = false;
        this.refresh();
      }).catch(error => {
        console.log(error)
        ElNotification({
          title: 'Error',
          message: 'Favor de llenar los campos',
          type: 'error'
        })
      })
    },
    
    submitForm() {
      this.$refs.uploadRef.submit();
      console.log("SUBMIT")
      this.$refs.formRef.validate((valid, fields) => {
        if (valid) {
          console.log(fields);
          console.log(this.$refs.uploadRef)
        } else {
          ElNotification({
            title: 'Error',
            message: 'Favor de llenar los campos',
            type: 'error'
          })
        }
      })
    },

    fetchCategorias() {
      axios.get('verCategorias')
        .then(response => {
          console.log('Las Categorias:', response.data);
          this.Categorias = response.data;
        })
        .catch(error => {
          console.error('Error fetching Categorias:', error);
          ElNotification({
            title: 'Error',
            message: 'Error al recuperar Categorias',
            type: 'error',
          });
        });
    },

    filterDataCategoria() {
      this.filteredData = this.tableData.filter((products) => {
        return products.categoria.toLowerCase().includes(this.searchQueryCategoria.toLowerCase());
      });
    },

    filterDataMarca() {
      this.filteredData = this.tableData.filter((products) => {
        return products.trademark.toLowerCase().includes(this.searchQueryMarca.toLowerCase());
      });
    },

    filterDataNombre() {
      this.filteredData = this.tableData.filter((products) => {
        return products.nameProduct.toLowerCase().includes(this.searchQueryNombre.toLowerCase());
      });
    },

    filterDataPrecio() {
      this.filteredData = this.tableData.filter((products) => {
        return products.priceProduct.toLowerCase().includes(this.searchQueryPrecio.toLowerCase());
      });
    },

    handleEdit(row) {
      console.log(row);
      this.formEdit = row;
      this.dialogVisibleEdit = true;
    },

    editProduct() {
      this.$refs.formEditRef.validate((valid) => {
        if (valid) {
          console.log('Form is valid, sending PUT request');
          axios.put('products/' + this.formEdit.id, this.formEdit)
            .then(res => {
              console.log(res);
              this.refresh();
              this.dialogVisibleEdit = false;
              this.$message.success('Producto actualizado exitosamente');
              ElNotification({
                title: 'Alerta',
                message: 'Registro actualizado correctamente',
                type: 'success'
              })
            })
            .catch(error => {
              console.log(error);
              this.$message.error('Error al actualizar el producto');
              ElNotification({
                title: 'Error',
                message: 'Favor de verificar los datos',
                type: 'error'
              })
            });
        } else {
          console.log('Validation failed, check form errors');
          console.log('Validation failed');
          ElNotification({
            title: 'Error',
            message: 'Favor de llenar los campos',
            type: 'error'
          })
        }
      });
    },

    eliminar(row) {
      console.log(row);
      this.selectedItem = row;
      this.dialogVisible = true;
    },

    handleDelete() {
      axios.delete('products/' + this.selectedItem.id).then(res => {
        console.log(res);
        this.refresh();
        this.dialogVisible = false;
      ElNotification({
        title: 'Eliminacion',
        message: 'Registro se elimino correctamente',
        type: 'success'
      })
      });
    },

    seleccionar(row) {
      console.log(row);
      this.selectedItem = row;
      this.dialogVisibleView = true;
    },
  }
}
</script>

<style>
.btnProduct {
  background-color: rgb(31 31 31);
  color: white;
  border: 1px white solid;
  padding: 10px 20px;
  transition: 1s ease-in-out;
}

.btnProduct:hover {
  background-color: rgba(255, 94, 0, 0.75);
  color: white;
  transition: 0.50s ease-in-out;
}

p {
  color: #000000;
}

.iconInfoProducts {
  color: rgba(255, 94, 0, 0.75);
  margin-right: 10px;
}

.iconDeleteProducts {
  color: #f32222;
  margin-right: 10px;
}

.product-info {
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.product-title {
  font-size: 1.2rem;
  font-weight: bold;
  margin-bottom: 10px;
  margin-right:20px;

}

.product-trademark, .product-price, .product-description {
  margin-bottom: 5px;
  width: 100%;
  word-wrap: break-word;
}

.product-img{
  width: 40%;
  height: 40%;
}

.product-details{
  display: flex;
  justify-content: center;  
  align-items: center;
}
</style>