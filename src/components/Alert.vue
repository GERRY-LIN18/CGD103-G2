<template>
    <div class="bg" v-show="tr" @click="close">
        <div class="alert">
            <p>{{ msg }}</p>
            <p>
                <button class="btn_s" @click="close">確定</button>
            </p>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        msg: {
            String,
            default: "",
        },
    },
    data() {
        return { tr: false };
    },
    methods: {
        close() {
            this.tr = false ? true : false;
            this.$emit("closeAlert", this.tr);
            return this.tr;
        },
    },
};
</script>
<style lang="scss" scoped>
.bg {
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
}
.alert {
    width: 300px;
    height: 250px;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    margin: auto;
    z-index: 1000;

    border: 5px solid $main_color;
    background-color: $bg_white;

    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    p {
        margin: 20px;
    }
}
</style>