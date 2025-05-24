<script>
  import "./app.css";
  import Navbar from "./assets/Navbar.svelte";
  import Hero from "./assets/Hero.svelte";
  import Why from "./assets/Why.svelte";
  import Team from "./assets/Team.svelte";
  import Quote from "./assets/Quote.svelte";
  import Contact from "./assets/Contact.svelte";
  import Footer from "./assets/Footer.svelte";
  import Loading from "./assets/Loading.svelte";
  import { onMount } from "svelte";

  let isLoading = true;
  let assetsLoaded = false;
  let textComplete = false;

  onMount(() => {
    // Simulate loading content or assets
    setTimeout(() => {
      assetsLoaded = true;
      // Only proceed if the text has finished typing
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
        // Only proceed if assets have loaded
        if (assetsLoaded) {
          isLoading = false;
        }
      }}
    />
  </div>
{:else}
  <main class="font-khula bg-[#DCD9D5] min-h-screen">
    <Navbar />
    <Hero />
  </main>
{/if}
