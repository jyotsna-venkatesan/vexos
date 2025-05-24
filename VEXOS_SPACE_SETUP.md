# Email Subscription for vexos.space

This document explains how to deploy the email subscription feature on your vexos.space domain.

## Overview

The email subscription system consists of:

1. A form in the CTA.svelte component to collect user emails
2. A PHP script (subscribe.php) to process submissions and send notifications
3. A simple text file to store subscriber emails

## Deployment Steps

### Step 1: Deploy Your Main Website

Build your site as usual:

```bash
npm run build
```

This will create a `dist` folder with your website files.

### Step 2: Deploy the PHP Script

1. Upload the `subscribe.php` file from the `/public` directory to the root of your vexos.space domain.
2. Make sure PHP is enabled on your server (most web hosts have PHP enabled by default).
3. Ensure the server has permission to:
   - Execute the PHP script
   - Create and write to a file called `subscribers.txt`
   - Send emails using the `mail()` function

You can upload the file using:
- Your hosting control panel's file manager
- FTP client like FileZilla
- Any deployment tool your host provides

### Step 3: Test the Subscription System

1. Visit your website at vexos.space
2. Fill out the subscription form with a test email
3. Check if:
   - You receive a notification email at venkatesanjyotsna@gmail.com
   - A file called `subscribers.txt` is created with the email address

### Step 4: Monitor and Manage Subscriptions

- Periodically download the `subscribers.txt` file to backup your subscriber list
- Consider setting up server-side backups for this file
- You can view the file directly through your hosting file manager

## Troubleshooting

### If subscribers.txt is not being created:

Check file permissions - your web server user (typically www-data, apache, or nobody) needs write permission to the directory. Try:

```
chmod 755 /path/to/your/website/directory
chmod 666 /path/to/your/website/directory/subscribers.txt
```

If the file doesn't exist yet, you can create it first with:

```
touch /path/to/your/website/directory/subscribers.txt
chmod 666 /path/to/your/website/directory/subscribers.txt
```

### If emails are not being sent:

1. Check if your server has the mail() function enabled
2. Some hosts restrict mail() usage or require specific configurations
3. As an alternative, you can modify the script to use SMTP with a library like PHPMailer

## Security Notes

- The script includes basic input validation and sanitization
- Consider adding rate limiting if the form gets a lot of traffic
- The subscribers.txt file should not be publicly accessible

## Backup Plan

If your PHP server configuration has issues:
1. The form will automatically offer to open the user's email client as a fallback
2. Users can email you directly
3. You still get the information, just through a different channel