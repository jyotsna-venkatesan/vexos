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

  let isLoading = true;
  let assetsLoaded = false;
  let textComplete = false;

  onMount(() => {
    setTimeout(() => {
      assetsLoaded = true;
      if (textComplete) {
        isLoading = false;
      }
    }, 1500);
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
    <Hero />
    <Content />
    <Bento />
    <Support />
    <Testimonials />
  </main>
{/if}
