import { defineConfig } from "vite";
import { svelte } from "@sveltejs/vite-plugin-svelte";

// Use relative paths for assets
export default defineConfig({
  plugins: [svelte()],
  base: './',  // Use relative paths
  build: {
    assetsDir: 'assets',
    emptyOutDir: true,
  }
});
