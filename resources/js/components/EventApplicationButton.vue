<template>
    <i v-if="loading" class="text-center fas fa-spinner fa-pulse fa-2x"></i>
    <button v-else-if="application" @click="withdraw" class="btn btn-outline-danger btn-block" :disabled="isBusy">
        <i v-if="isBusy" class="fas fa-spinner fa-pulse"></i>
        <span v-else>Withdraw</span>
    </button>
    <button v-else @click="apply" class="btn btn-success btn-block" :disabled="isBusy">
        <i v-if="isBusy" class="fas fa-spinner fa-pulse"></i>
        <span v-else>Apply</span>
    </button>
</template>

<script>
    export default {
        name: 'event-application-button',
        props: {
            userId: {
                type: Number,
                required: true,
            },
            eventId: {
                type: Number,
                required: true,
            },
        },

        data() {
            return {
                loading: true,
                isBusy: false,
                application: null,
            }
        },

        created() {
            this.fetchApplication();
        },

        mounted() {
        },

        methods: {

            async fetchApplication() {
                try {
                    const {data: {data: application}} = await axios.get(`/events/${this.eventId}/applications`);
                    this.application = application;
                } catch (e) {
                    this.application = null;
                } finally {
                    this.loading = false;
                }
            },

            async apply() {
                try {
                    this.isBusy = true;
                    const {data: {data: application}} = await axios.post(`/events/${this.eventId}/applications`);
                    this.application = application;
                    console.log(application);
                } catch (e) {
                    console.log(e); // TODO alert the user with error message
                } finally {
                    this.isBusy = false;
                }
            },

            async withdraw() {
                try {
                    this.isBusy = true;
                    await axios.delete(`/events/${this.eventId}/applications/${this.application.id}`);
                    this.application = null;
                } catch (e) {
                    console.log(e); // TODO alert the user with error message
                } finally {
                    this.isBusy = false;
                }
            },

        }
    }
</script>
