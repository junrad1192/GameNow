<template>
    <div class="like">
        <button v-if='!liked' type="button"  class="btn btn-primary" @click="like(composeId)">いいね{{ likeCount }}</button>
        <button v-else type="button"  class="btn btn-primary" @click="unlike(composeId)">いいね{{ likeCount }}</button>
    </div>
</template>

<script>
    export default {
        props: ['composeId','userId', 'defaultLiked', 'defaultCount'],
        data() {
            return {
                liked: false,
                likeCount: 0
            };
        },
       created() {
            this.liked = this.defaultLiked
            this.likeCount = this.defaultCount
        },

        methods: {
            like(composeId) {
                let url = `/api/${composeId}/like`

                axios.post(url, {
                    user_id: this.userId
                })
                .then(response => {
                    this.liked = true
                    this.likeCount = response.data.likeCount
                })

                .catch(error =>{
                    alert(error)
                });
            },
            unlike(composeId) {
                let url = `/api/${composeId}/unlike`

                axios.post(url, {
                    user_id: this.userId
                })
                .then(response => {
                    this.liked = false
                    this.likeCount = response.data.likeCount
                })

                .catch(error =>{
                    alert(error)
                });
            }
        }
    }
</script>
