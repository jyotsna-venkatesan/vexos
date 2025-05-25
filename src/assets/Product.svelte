<script>
  import ProductHero from "./Product-Hero.svelte";
  import AboutContact from "./About-Contact.svelte";
</script>

<main class="product-page">
  <ProductHero />
  <AboutContact />
</main>

<style>
  .product-page {
    width: 100%;
    min-height: 100vh;
  }

  .product-content {
    padding: 2rem;
    max-width: 1200px;
    margin: 0 auto;
  }
</style>
