<template>
  <v-calendar :attributes='attrs' is-expanded :theme-styles='themeStyles'>
  </v-calendar>
</template>

<script>
export default {
    props: ['xdate'],
    data() {
        return {
            themeStyles: {
                wrapper: {
                    background: '#fff',
                    boxShadow: '0px 2px 4px 0 rgba(48, 65, 150, 0.08)',
                }
            },
            attrs: [
                {
                    key: 'today',
                    highlight: {
                        backgroundColor: '#1ab997',
                        borderRadius: '5px',
                    },
                    contentStyle: {
                        color: '#fafafa',
                    },
                    popover: {
                        label: "Your project's timeline is displayed here",
                    },
                    dates: [
                        { start: new Date(), end: this.xdate },
                    ],
                }
            ],
        };
    },
    }
</script>

<style>

</style>
