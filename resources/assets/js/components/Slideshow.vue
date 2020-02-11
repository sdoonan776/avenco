<template>
	<section class="hero-slider">
        <div class="hero-items owl-carousel">
            <div class="single-slider-item set-bg" style="{{ asset('resources/assets/img/slider-1.jpg'
            ) }}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>2020</h1>
                            <h2>Lookbook.</h2>
                            <a href="{{ route('products.index') }}" class="primary-btn">See More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {

  name: 'Slideshow',

  data() {
    return {

    };
  },
};
</script>

<style lang="scss" scoped>
</style>
