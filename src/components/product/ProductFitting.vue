<script>
// core version + navigation, pagination, autoplay modules:
import Swiper, { Navigation, Pagination, Autoplay } from "swiper";
// import styles bundle
import "swiper/swiper-bundle.min.css";

export default {
    name: "ProductFitting",
    data() {
        return {
            activeIndex: 0,
        };
    },
    mounted() {
        const SECOND = 1000; // milliseconds

        // init Swiper:
        new Swiper(this.$refs.swiper, {
            // configure Swiper to use modules
            modules: [Navigation, Pagination, Autoplay],

            loop: true,
            autoplay: {
                delay: 3 * SECOND,
                disableOnInteraction: false,
            },
            speed: 2 * SECOND,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },

            // Events
            on: {
                slideChange: (swiper) => {
                    this.activeIndex = swiper.realIndex;
                },
            },
        });
    },
};
</script>

<template>
    <!-- Slider main container -->
    <div ref="swiper" class="swiper">
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide">
                <img src="@/assets/product/man_01.png" alt="" />
            </div>
            <div class="swiper-slide">
                <img src="@/assets/product/man_02.png" alt="" />
            </div>
            <div class="swiper-slide">
                <img src="@/assets/product/man_03.png" alt="" />
            </div>
            <div class="swiper-slide">
                <img src="@/assets/product/man_04.png" alt="" />
            </div>
        </div>

        <!-- Navigation arrows -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

        <!-- <div class="swiper-pagination"></div> -->
    </div>
</template>

<style lang='scss' scoped>
.swiper {
    max-width: 300px;
    margin: auto;
}
img {
    width: 100%;
    height: 80%;
    max-height: 600px;
    object-fit: contain;
}
.swiper-slide {
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
