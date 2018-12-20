<template>
    <span class="globalBadge" v-bind:class="classObject">{{computedPriority}}</span>
</template>

<script>
export default {
    props: ['priority'],
    data(){
        return{
        }
    },
    computed: {
        computedPriority: function(){ 
            return this.priority;
        },
        classObject: function () {
            return {
                'highProjPriority': this.priority == 'High priority',
                'mediumProjPriority': this.priority == 'Medium priority',
                'lowProjPriority': this.priority == 'Low priority',
            }
        }
    }
}
</script>

<style>
.highProjPriority{
    background: #e3342f;
}
.mediumProjPriority{
    background: #1ab997;
}
.lowProjPriority{
    background: #1ab997;
}
</style>
