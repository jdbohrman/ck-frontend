<template>
    <div class="flex-container">
        <div class="flex-col flex-col--4" v-for="persona in personas" :key="persona.id">
            <div class="pod">
                <a v-bind:href="['/results?is_free=false&wait_time=null&persona=' + persona.id]">
                    <div class="pod__image">
                        <img :src="`https://api.connectedkingston.uk/core/v1/collections/personas/${persona.id}/image.png?v=${persona.updated_at}`" :alt="persona.name">
                    </div>

                    <div class="pod__content">
                        <p class="pod__title"><strong>{{ persona.name }}</strong></p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</template>
 
<script>
    import axios from 'axios'
    
    export default {
        name: "persona",
        data () {
            return {
                personas: null
            }
        },
        mounted () {
            axios
            .get('https://api.connectedkingston.uk/core/v1/collections/personas')
            .then(response => (this.personas = response.data.data))
            .catch(error => console.log(error))
        }
    }
</script>
 
<style scoped>
 
</style>