<template>
    <div class="section">
        <div class="container is-fluid">
            <div class="columns is-multiline">
                <div v-for="product in products" :key="product.slug" class="column is-3">
                    <Product :product="product"/>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
  import Product from '@/components/products/Product.vue';

  export default {
    components: {
      Product,
    },

    async asyncData({ params, app }) {
      let response = await app.$axios.$get(`products?category=${params.slug}`);

      return {
        products: response.data,
      }
    },
  };
</script>