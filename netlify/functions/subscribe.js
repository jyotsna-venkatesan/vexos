// Netlify Function to handle email subscriptions
const nodemailer = require('nodemailer');

// Create a transporter for sending emails
const createTransporter = () => {
  // For production, you would use real SMTP credentials:
  return nodemailer.createTransport({
    host: process.env.SMTP_HOST || 'smtp.gmail.com',
    port: parseInt(process.env.SMTP_PORT || '587'),
    secure: process.env.SMTP_SECURE === 'true',
    auth: {
      user: process.env.SMTP_USER,
      pass: process.env.SMTP_PASS
    }
  });
};

exports.handler = async function(event, context) {
  // Only allow POST requests
  if (event.httpMethod !== 'POST') {
    return {
      statusCode: 405,
      body: JSON.stringify({ message: 'Method not allowed' })
    };
  }

  try {
    // Parse the request body
    const data = JSON.parse(event.body);
    const { email, target } = data;

    // Basic validation
    if (!email || !email.includes('@') || !email.includes('.')) {
      return {
        statusCode: 400,
        body: JSON.stringify({ message: 'Invalid email address' })
      };
    }

    // Save to a database (optional)
    // For a simple implementation, we'll just log and email it
    console.log(`New subscription: ${email}`);

    // Send notification email to target address
    try {
      // Create email content
      const mailOptions = {
        from: process.env.SMTP_USER,
        to: target || 'venkatesanjyotsna@gmail.com',
        subject: 'New Vexos Email Subscriber',
        text: `Someone has subscribed to Vexos updates with the email: ${email}`,
        html: `
          <h1>New Vexos Subscriber</h1>
          <p>Someone has subscribed to Vexos updates with the email:</p>
          <p><strong>${email}</strong></p>
          <p>Timestamp: ${new Date().toISOString()}</p>
        `
      };

      // Send the email if SMTP credentials are configured
      if (process.env.SMTP_USER && process.env.SMTP_PASS) {
        const transporter = createTransporter();
        await transporter.sendMail(mailOptions);
        console.log(`Email notification sent to ${target || 'venkatesanjyotsna@gmail.com'}`);
      } else {
        console.log('SMTP credentials not configured. Email notification not sent.');
        console.log('Would have sent email to:', target || 'venkatesanjyotsna@gmail.com');
        console.log('With content:', mailOptions);
      }
    } catch (emailError) {
      console.error('Error sending email notification:', emailError);
      // We don't want to fail the request if just the email fails
    }

    // Return success response
    return {
      statusCode: 200,
      body: JSON.stringify({ 
        message: 'Subscription successful', 
        email: email 
      })
    };
  } catch (error) {
    console.error('Error processing subscription:', error);
    
    return {
      statusCode: 500,
      body: JSON.stringify({ 
        message: 'Error processing your subscription', 
        error: error.message 
      })
    };
  }
};