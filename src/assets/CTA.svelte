<script>
    let email = '';
    let isSubmitting = false;
    let submissionMessage = '';
    let messageType = ''; // 'success' or 'error'

    async function handleSubmit() {
        // Basic email validation
        if (!email || !email.includes('@') || !email.includes('.')) {
            submissionMessage = 'Please enter a valid email address';
            messageType = 'error';
            return;
        }

        isSubmitting = true;
        submissionMessage = '';

        try {
            // Determine if we're in development or production
            const isDevelopment = window.location.hostname === 'localhost' ||
                                  window.location.hostname === '127.0.0.1';

            if (isDevelopment) {
                // In development, simulate success but log to console
                console.log('DEV MODE: Would send email to venkatesanjyotsna@gmail.com with:', email);

                // Wait a moment to simulate network request
                await new Promise(resolve => setTimeout(resolve, 1000));

                // Show success message
                submissionMessage = 'Test mode: Email would be sent to venkatesanjyotsna@gmail.com';
                messageType = 'success';
                email = '';
                return;
            }

            try {
                // Send to our Netlify function endpoint
                const response = await fetch('/.netlify/functions/subscribe', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        email: email,
                        target: 'venkatesanjyotsna@gmail.com'
                    })
                });

                // Check if the response has content
                const text = await response.text();
                let result = {};

                try {
                    // Try to parse the response as JSON
                    result = JSON.parse(text);
                } catch (parseError) {
                    console.warn('Response is not valid JSON:', text);
                }

                if (response.ok) {
                    // Show success message and reset form
                    submissionMessage = 'Thank you! We\'ll keep you updated.';
                    messageType = 'success';
                    email = '';
                } else {
                    throw new Error(result.message || 'Form submission failed. Please try again later.');
                }
            } catch (fetchError) {
                console.error('Submission error:', fetchError);

                // Handle different errors
                if (fetchError instanceof TypeError && fetchError.message.includes('Failed to fetch')) {
                    // Network error - PHP endpoint might not be available yet
                    submissionMessage = 'Our subscription service is temporarily unavailable. Please try again later.';
                } else {
                    submissionMessage = fetchError.message || 'Something went wrong. Please try again later.';
                }

                messageType = 'error';

                // As a fallback, try to open the user's email client
                const mailtoLink = document.createElement('a');
                mailtoLink.href = `mailto:venkatesanjyotsna@gmail.com?subject=Vexos%20Email%20Subscription&body=Please%20subscribe%20me%20to%20Vexos%20updates:%20${encodeURIComponent(email)}`;

                // Open the mailto link
                setTimeout(() => {
                    if (confirm('Would you like to open your email client to manually send your subscription request?')) {
                        mailtoLink.click();
                    }
                }, 500);
            }
        } catch (error) {
            console.error('Unexpected error:', error);
            submissionMessage = error.message || 'Something went wrong. Please try again later.';
            messageType = 'error';
        } finally {
            isSubmitting = false;
        }
    }
</script>

<div class="relative overflow-hidden bg-dark">
    <div class="max-w-7xl mx-auto pt-48 md:pt-64 lg:pt-48 px-4 sm:px-6 lg:px-8">
        <!-- heading - right aligned -->
        <h1 class="text-light sm:text-3xl md:text-5xl lg:text-5xl text-3xl pb-6 text-right">Stay connected with us</h1>
        <p class="text-light text-md pb-8">Be the first to know when we launch</p>

        <!-- Custom Email subscription form - right aligned -->
        <div class="max-w-2xl ml-auto">
            <form on:submit|preventDefault={handleSubmit} class="relative">
                <div class="w-full">
                    <input
                        type="email"
                        bind:value={email}
                        placeholder="Enter your email address"
                        class="w-full px-4 py-3 pr-12 rounded-lg bg-white text-dark border border-gray-300 focus:border-pink-500 focus:outline-none placeholder-gray-500 transition-colors"
                        disabled={isSubmitting}
                    />
                    <!-- Gradient arrow button positioned at right end of input box -->
                    <button
                        type="submit"
                        class="absolute right-0 top-0 h-full px-4 rounded-r-lg bg-gradient-to-r from-pink-500 to-orange-500 hover:from-pink-600 hover:to-orange-600 transition-all disabled:opacity-70 disabled:cursor-not-allowed flex items-center justify-center"
                        disabled={isSubmitting}
                        aria-label="Submit"
                    >
                        {#if isSubmitting}
                            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        {:else}
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        {/if}
                    </button>
                </div>
            </form>

            <!-- Submission message -->
            {#if submissionMessage}
                <div class="mt-4 px-4 py-3 rounded-lg text-right {messageType === 'success' ? 'bg-green-900 bg-opacity-50 text-green-200' : 'bg-red-900 bg-opacity-50 text-red-200'}">
                    {submissionMessage}
                </div>
            {/if}

            <p class="text-gray-400 text-xs mt-4 text-right">
                We respect your privacy. Your email will be sent to our team and never shared with third parties.
            </p>
        </div>
    </div>
</div>
