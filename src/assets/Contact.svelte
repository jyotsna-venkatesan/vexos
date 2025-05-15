<section id="contact" class="bg-[#1b1b1b] py-12 md:py-16">
  <div class="container mx-auto px-6 md:px-12">
    <div class="max-w-3xl mx-auto text-center">
      <h2 class="text-3xl md:text-4xl font-semibold text-[#F5EBE0] mb-6">Stay Updated</h2>
      <p class="text-lg text-[#F5EBE0] mb-8">
        Be the first to know when we launch. Subscribe to get updates on our progress and early access.
      </p>

      <!-- Email Subscription Form -->
      <form id="email-form" class="max-w-md mx-auto" on:submit|preventDefault={handleSubmit}>
        <div class="flex flex-col sm:flex-row gap-3">
          <div class="flex-grow">
            <input
              type="email"
              id="email"
              bind:value={email}
              placeholder="Your email address"
              required
              class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#2B2B2B] bg-white"
            />
          </div>
          <button
            type="submit"
            class="px-6 py-3 bg-[#2B2B2B] text-white rounded-md hover:bg-black transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#2B2B2B] {isSubmitting ? 'opacity-70 cursor-wait' : ''}"
            disabled={isSubmitting}>
            {isSubmitting ? 'Sending...' : 'Notify Me'}
          </button>
        </div>

        {#if errorMessage}
          <p class="mt-2 text-red-600 text-sm">{errorMessage}</p>
        {/if}

        {#if successMessage}
          <p class="mt-2 text-green-600 text-sm">{successMessage}</p>
        {/if}

        <p class="mt-6 text-[#0882bf] text-sm">
          We respect your privacy and will never share your information.
        </p>
      </form>
    </div>
  </div>
</section>

<script>
  import { onMount } from 'svelte';

  let email = '';
  let isSubmitting = false;
  let errorMessage = '';
  let successMessage = '';

  // Function to handle form submission
  async function handleSubmit() {
    // Reset messages
    errorMessage = '';
    successMessage = '';
    isSubmitting = true;

    try {
      // Email to notify (as specified)
      const notifyEmail = 'venkatesanjyotsna@gmail.com';

      // Using Email.js or a similar service would be ideal here
      // For demonstration, we're simulating the API request

      // In a real implementation, you would use a service like Email.js, FormSubmit, or your own backend
      // Example with FormSubmit (requires no account):
      // const response = await fetch(`https://formsubmit.co/${notifyEmail}`, {
      //   method: 'POST',
      //   headers: {
      //     'Content-Type': 'application/json',
      //     'Accept': 'application/json'
      //   },
      //   body: JSON.stringify({
      //     email: email,
      //     subject: 'New Vexos Launch Notification Signup',
      //     message: `Please notify ${email} when Vexos launches.`
      //   })
      // });

      // Simulating successful API call
      await new Promise(resolve => setTimeout(resolve, 1000));

      // Clear the form and show success message
      successMessage = "Thank you! We'll notify you when we launch.";
      email = '';

      // Log the email for debugging
      console.log(`Email subscription request for: ${email} to notify: ${notifyEmail}`);

    } catch (error) {
      console.error('Subscription error:', error);
      errorMessage = "Sorry, we couldn't process your request. Please try again later.";
    } finally {
      isSubmitting = false;
    }
  }

  onMount(() => {
    // Any initialization logic here
  });
</script>

<style>
  /* Optional: Add animation for form elements */
  form {
    transition: all 0.3s ease;
  }

  input, button {
    transition: all 0.2s ease;
  }

  button:hover {
    transform: translateY(-2px);
  }
</style>
