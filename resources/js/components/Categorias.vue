<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h2>Lista de Categorias</h2>
                            </div>

                            <div class="card-text">
                                <ul class="list-group">
                                    <li class="list-group item" v-for="categoria in categorias" :key="categoria.id">
                                        <a href="" @click.prevent="editCategoria(categoria)">{{ categoria.categoria }}</a>
                                    <button class="btn btn-danger" @click="delCategoria(categoria.id)">x</button>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-text">
                                <form action="">
                                    <div class="form-group">
                                        <label for="">Categoria</label>
                                        <input type="text" class="form-control" v-model="data.categoria">
                                    </div>

                                    <button class="btn btn-success" @click.prevent="updateCategoria()" v-if="editar">Actualizar</button>
                                    <button class="btn btn-success" @click.prevent="setCategoria()" v-else>Guardar</button>
                                </form>
                            </div>
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
            editar:false,
            categorias:[],
            data:{
                categoria:''
            }
        }
    },

    mounted(){
        this.getCategorias()
    },

    methods:{
        getCategorias: async function(){
            let res = await axios.get('categorias')
            this.categorias = await res.data
        },

        setCategoria: async function(){
            await axios.post('categorias', this.data)
            this.getCategorias()
            this.data = ''

        },

        delCategoria: async function(id){
            await axios.delete('categorias/'+id)
            this.getCategorias()
        },

        editCategoria: async function(cat){
            this.data = await cat
            this.editar = true
        },

        updateCategoria:async function(){
            let res = await axios.put('categorias/'+ this.data.id,this.data)
            this.getCategorias()
            this.editar = false
            this.data = ''
        }
    }

}
</script>
