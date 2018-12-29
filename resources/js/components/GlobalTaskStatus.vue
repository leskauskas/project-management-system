<template>
    <p class="m-0" v-bind:class="classObject">{{computedTitle}}</p>
</template>

<script>
export default {
    props: ['taskname', 'status'],
    data(){
        return{
        }
    },
    computed: {
        computedTitle: function(){ 
            return this.taskname;
        },
        classObject: function () {
            return {
                'globTaskDone': this.status == 1,                
            }
        }
    }
}
</script>

<style>     
    .globTaskDone{
        text-decoration: line-through;
    }
</style>
