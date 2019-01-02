<template>
    <span class="badge task-due" v-bind:class="classObject"><i class="far fa-clock"></i> {{computedDate}}</span>
</template>

<script>
export default {
    props: ['duedate', 'isdue'],
    computed: {
        computedDate: function(){
            return this.duedate;
        },
        classObject: function () {
            return {
               'badge-danger': this.isdue,
               'badge-global': !this.isdue
            }
        }
    },
}
</script>

<style>
    
</style>
