# Email Subscription Backend Setup

This document explains how to set up and deploy the email subscription backend for the Vexos website.

## Overview

The solution uses:

1. A Svelte form component for collecting emails
2. A Netlify serverless function for processing submissions
3. Nodemailer for sending email notifications

## Deployment Instructions

### Step 1: Push to GitHub

Ensure your code is in a GitHub repository.

### Step 2: Sign Up for Netlify

1. Go to [Netlify](https://www.netlify.com/) and sign up for a free account
2. Connect your GitHub account to Netlify

### Step 3: Create a New Site

1. Click "New site from Git"
2. Select your repository
3. Set the build command to `npm run build`
4. Set the publish directory to `dist`
5. Click "Deploy site"

### Step 4: Configure Environment Variables

In the Netlify dashboard for your site:

1. Go to Site settings > Environment variables
2. Add the following variables:

   ```
   SMTP_HOST=smtp.gmail.com
   SMTP_PORT=587
   SMTP_SECURE=false
   SMTP_USER=your-email@gmail.com
   SMTP_PASS=your-app-password
   ```

Notes:
- For Gmail, you need to create an "App Password" in your Google Account settings
- For other providers, use their SMTP settings

### Step 5: Set Up Continuous Deployment

Netlify will automatically deploy when you push to your main branch.

## Testing

1. Submit the form on your site
2. Check the Netlify Functions logs in your Netlify dashboard
3. Verify that you receive the email notification at venkatesanjyotsna@gmail.com

## Local Development

To test the serverless function locally:

1. Install the Netlify CLI: `npm install -g netlify-cli`
2. Run `netlify dev` in your project directory
3. This will start a local server with your site and functions

## Alternative Email Service Providers

If you prefer not to use your own SMTP server, you can modify the `subscribe.js` function to use:

1. SendGrid
2. Mailgun
3. AWS SES

Each requires its own API key and setup.

## Troubleshooting

- Check the Function logs in your Netlify dashboard
- Make sure your SMTP credentials are correct
- For Gmail, enable "Less secure apps" or use an App Password

## Security Considerations

- Never commit your SMTP credentials to Git
- Use environment variables for all secrets
- Consider rate-limiting the API to prevent abuse