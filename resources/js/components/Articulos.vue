
<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Articulo</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="articulo in articulos" :key="articulo.id">
                                <td>{{ articulo.id }}</td>
                                <td>{{ articulo.articulo }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-4">
                    <form action="">
                        <div class="form-group">
                            <label for="">Articulo</label>
                            <input type="text" class="form-control" v-model="data.articulo">
                        </div>

                        <div class="form-group">
                            <label for="">Precio</label>
                            <input type="text" class="form-control" v-model="data.precio">
                        </div>

                        <button class="btn btn-success" @click.prevent="setArticulo()">Guardar</button>
                    </form>
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
            articulos:[], //defino una variable como arreglo
            data:{ //data es un objeto para mandar todo lo otro como arreglo
                articulo:'',
                precio:0,
                categoria_id:1
            }

        }
    },

    mounted(){ //un hub para que cuando se monte ejecute el metodo
        this.getArticulos() //llamo a la funcion con this porque es un metodo de esta clase
    },

    methods:{
        getArticulos:async function (){
            let res = await axios.get('articulos') //el la variable res almaceno todos los datos (objetos) que recibo por la ruta articulos desde el controlador
            this.articulos = await res.data //lo que tiene data del res lo asigno en articulos
        },

        setArticulo:async function(){
            let mensaje = await axios.post('articulos', this.data)
            await this.getArticulos()
            this.data = ''

        }
    }

}
</script>
