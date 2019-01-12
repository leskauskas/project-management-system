<template>
  <v-calendar :attributes='attrs' is-expanded>
  </v-calendar>
</template>

<script>
export default {
    props: ['xdate'],
    data() {
        return {
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
