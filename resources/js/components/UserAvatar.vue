<template>
    <div class="userAvatar mr-1">
        <div class="holder">{{computedInitials}}</div>
    </div>
</template>

<script>
export default {
props: ['fname', 'lname'],
    data(){
        return{
        }
    },
    computed: {
        computedInitials: function(){ 
            if(this.lname == ''){
                var name = this.fname.split(' '),
                    initials = name[0].substring(0, 1).toUpperCase();
                if (name.length > 1) {
                    initials += name[name.length - 1].substring(0, 1).toUpperCase();
                }
                return(initials);
            }else{
                var firstNameInitial = this.fname.charAt(0),
                    lastNameInitial = this.lname.charAt(0);
                return (firstNameInitial + lastNameInitial);
            }
        },
    }
}
</script>

<style lang="scss">
    .userAvatar{
        display: flex;
        display: -webkit-flex;
        display: -webkit-box;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: #1ab99785;
        color: #fff;
        font-size: 15px;
    }
    .profileAvatar{
        .userAvatar{
            margin-top: -50px;
            margin-bottom: 0.5rem;
            width: 80px;
            height: 80px;
            background: #1ab997;
            color: #fff;
            font-size: 45px;
        }
    }
</style>
