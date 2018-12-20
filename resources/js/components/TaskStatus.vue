<template>
    <span class="badge task-status" v-bind:class="classObject">{{computedStatus}}</span>
</template>

<script>
export default {
    props: ['status'],
    data(){
        return{
        }
    },
    computed: {
        computedStatus: function(){ 
            return this.status;
        },
        classObject: function () {
            return {
                'badge-success': this.status == 'done',
                'badge-warning': this.status == 'in progress',
                'badge-danger': this.status == 'not started',
            }
        }
    }
}
</script>

<style>
.doneStatus{
    background: red;
}
</style>
