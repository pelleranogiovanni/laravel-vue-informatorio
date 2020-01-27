<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="articulo in articulos" :key="articulo.id">
                                        <td>{{ articulo.id }}</td>
                                        <td>{{ articulo.articulo }}</td>
                                        <td>{{ articulo.precio }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="">Articulo</label>
                                    <input type="text" class="form-control" v-model="data.articulo">
                                </div>

                                <div class="form-group">
                                    <label for="">Precio</label>
                                    <input type="text" class="form-control" v-model="data.precio">
                                </div>

                                 <div class="form-group">
                                    <label for="">Categoria</label>
                                    <select name="" id="" class="form-control" v-model="data.categoria_id">
                                        <option
                                        :value="categoria.id"
                                        v-for="categoria in categorias" :key="categoria.id">
                                        {{ categoria.categoria }}
                                        </option>
                                    </select>
                                </div>

                                <button class="btn btn-success" @click.prevent="setArticulo">Guardar</button>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {

    data(){
        return{
            articulos:[],
            categorias:[],
            data:{
                articulo:'',
                precio:0,
                categoria_id:''
            }

        }
    },

    mounted(){
        this.getArticulos()
        this.getCategorias()
    },

    methods:{
        getArticulos:async function(){
            let res = await axios.get('articulos')
            this.articulos = await res.data
            console.log(this.articulos)
        },

        setArticulo:async function(){
           let res = await axios.post('articulos', this.data)
           console.log(res)
           this.getArticulos()
           this.data = ''

        },

        getCategorias:async function(){
            let res = await axios.get('categorias')
            this.categorias = await res.data
        }
    }
}
</script>
