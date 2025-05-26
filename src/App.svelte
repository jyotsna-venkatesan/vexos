<script>
  import "./app.css";
  import Navbar from "./assets/Navbar.svelte";
  import Hero from "./assets/Hero.svelte";
  import Loading from "./assets/Loading.svelte";
  import Content from "./assets/Content.svelte";
  import { onMount } from "svelte";
  import Bento from "./assets/Bento.svelte";
  import Support from "./assets/Support.svelte";
  import Testimonials from "./assets/Testimonials.svelte";
  import CTA from "./assets/CTA.svelte";
  import Footer from "./assets/Footer.svelte";
  import AboutUs from "./assets/AboutUs.svelte";
  import Product from "./assets/Product.svelte";


  let isLoading = true;
  let assetsLoaded = false;
  let textComplete = false;
  let currentPage = "home"; // Default to home page

  // Function to handle navigation
  function navigateTo(page) {
    currentPage = page;
  }

  // Function to handle hash changes
  function handleHashChange() {
    if (window.location.hash === "#about") {
      currentPage = "about";
    } else if (window.location.hash === "#product") {
      currentPage = "product";
    } else {
      currentPage = "home";
    }
  }

  onMount(() => {
    setTimeout(() => {
      assetsLoaded = true;
      if (textComplete) {
        isLoading = false;
      }
    }, 1500);

    // Check if URL has a hash for navigation on initial load
    handleHashChange();

    // Add event listener for hash changes
    window.addEventListener('hashchange', handleHashChange);

    // Clean up event listener on component unmount
    return () => {
      window.removeEventListener('hashchange', handleHashChange);
    };
  });
</script>

{#if isLoading}
  <div class="h-screen w-full bg-dark">
    <Loading
      message="Because in a world full of motion, the hardest question is where to stand..."
      on:textLoaded={() => {
        textComplete = true;
        if (assetsLoaded) {
          isLoading = false;
        }
      }}
    />
  </div>
{:else}
  <main class="bg-[#DCD9D5] min-h-screen">
    <Navbar />

    {#if currentPage === "home"}
      <Hero />
      <Bento />
      <Content />
      <Support />
      <Testimonials />
      <CTA />
    {:else if currentPage === "about"}
      <AboutUs />
    {:else if currentPage === "product"}
      <Product />
    {/if}

    <Footer />
  </main>
{/if}
