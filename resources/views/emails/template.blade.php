<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $subject }}</title>
    <!--[if mso]>
    <noscript>
        <xml>
            <o:OfficeDocumentSettings>
                <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
    </noscript>
    <![endif]-->
    <style>
        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.7;
            color: #374151;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #0f0f23 0%, #1a1a3e 50%, #2d1b4e 100%);
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Email Wrapper */
        .email-wrapper {
            width: 100%;
            padding: 40px 20px;
        }

        /* Main Container */
        .email-container {
            max-width: 640px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25), 0 0 60px rgba(99, 102, 241, 0.1);
            overflow: hidden;
        }

        /* Header with Gradient */
        .header {
            background: linear-gradient(135deg, #0f0f23 0%, #1a1a3e 50%, #2d1b4e 100%);
            padding: 48px 40px;
            text-align: center;
            position: relative;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 30% 50%, rgba(99, 102, 241, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 70% 50%, rgba(236, 72, 153, 0.1) 0%, transparent 50%);
            pointer-events: none;
        }

        .header-content {
            position: relative;
            z-index: 1;
        }

        .logo-container {
            margin-bottom: 24px;
        }

        .logo {
            width: 60px;
            height: 60px;
            border-radius: 16px;
            display: inline-block;
        }

        .brand-name {
            font-size: 24px;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .brand-name span {
            background: linear-gradient(135deg, #818cf8, #ec4899);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .tagline {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.6);
            margin-bottom: 28px;
        }

        .subject {
            font-size: 28px;
            font-weight: 700;
            color: #ffffff;
            margin: 0;
            line-height: 1.3;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Content Area */
        .content {
            padding: 48px 40px;
            background-color: #ffffff;
        }

        .greeting {
            font-size: 18px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 24px;
        }

        .message-body {
            font-size: 16px;
            line-height: 1.8;
            color: #4b5563;
        }

        .message-body p {
            margin: 0 0 20px;
        }

        /* Signature Section */
        .signature {
            margin-top: 40px;
            padding-top: 32px;
            border-top: 2px solid #f3f4f6;
        }

        .signature-name {
            font-weight: 700;
            color: #1f2937;
            font-size: 18px;
            margin-bottom: 20px;
        }

        /* Contact Card - Glassmorphism Inspired */
        .contact-card {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 24px;
            margin-top: 24px;
        }

        .contact-title {
            font-size: 14px;
            font-weight: 600;
            color: #6366f1;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .contact-title::before {
            content: '';
            width: 4px;
            height: 20px;
            background: linear-gradient(135deg, #6366f1, #ec4899);
            border-radius: 2px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 0;
            border-bottom: 1px solid #e2e8f0;
        }

        .contact-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .contact-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .contact-icon img {
            width: 20px;
            height: 20px;
        }

        .contact-details {
            flex: 1;
        }

        .contact-label {
            font-size: 12px;
            color: #9ca3af;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 2px;
        }

        .contact-value {
            font-size: 15px;
            color: #1f2937;
            font-weight: 500;
        }

        .contact-value a {
            color: #6366f1;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .contact-value a:hover {
            color: #4f46e5;
            text-decoration: underline;
        }

        /* Footer */
        .footer {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            padding: 32px 40px;
            text-align: center;
            border-top: 1px solid #e2e8f0;
        }

        .footer-brand {
            font-size: 16px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
        }

        .footer-brand span {
            color: #6366f1;
        }

        .footer-tagline {
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 16px;
        }

        .footer-divider {
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, #6366f1, #ec4899);
            border-radius: 2px;
            margin: 16px auto;
        }

        .footer-note {
            font-size: 12px;
            color: #9ca3af;
            line-height: 1.6;
        }

        /* Responsive Design */
        @media only screen and (max-width: 600px) {
            .email-wrapper {
                padding: 20px 12px;
            }

            .email-container {
                border-radius: 16px;
            }

            .header {
                padding: 36px 24px;
            }

            .subject {
                font-size: 22px;
            }

            .content {
                padding: 32px 24px;
            }

            .contact-card {
                padding: 20px;
            }

            .footer {
                padding: 24px;
            }

            .brand-name {
                font-size: 20px;
            }
        }

        /* Dark Mode Support for Email Clients that Support It */
        @media (prefers-color-scheme: dark) {
            .email-container {
                background-color: #1f2937 !important;
            }

            .content {
                background-color: #1f2937 !important;
            }

            .greeting,
            .signature-name {
                color: #f9fafb !important;
            }

            .message-body,
            .message-body p {
                color: #d1d5db !important;
            }
        }
    </style>
</head>

<body>
    <div class="email-wrapper">
        <div class="email-container">
            <!-- Header -->
            <div class="header">
                <div class="header-content">
                    <div class="logo-container">
                        <div class="brand-name">Abdelhamid <span>Elaali</span></div>
                        <div class="tagline">Candidature pour un Stage</div>
                    </div>
                    <h1 class="subject">{{ $subject }}</h1>
                </div>
            </div>

            <!-- Content -->
            <div class="content">
                <p class="greeting">Bonjour,</p>

                <div class="message-body">
                    {!! $message !!}
                </div>

                <!-- Signature -->
                <div class="signature">
                    <div class="signature-name">{{ $senderName }}</div>

                    <div class="contact-card">
                        <div class="contact-title">Pour me contacter</div>

                        <div class="contact-item">
                            <div class="contact-details">
                                <div class="contact-label">Email</div>
                                <div class="contact-value">
                                    <a
                                        href="mailto:abdelhamidelaali.bs007@gmail.com">abdelhamidelaali.bs007@gmail.com</a>
                                </div>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-details">
                                <div class="contact-label">Téléphone</div>
                                <div class="contact-value">+212 648 55 40 12</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="footer">
                <div class="footer-brand">Envoyé par <span>Abdelhamid Elaali</span></div>
                <div class="footer-divider"></div>
                <p class="footer-note">
                    Cet email vous a été adressé dans le cadre d'une demande de stage.<br>
                    © {{ date('Y') }} {{ $senderName }}. Tous droits réservés.
                </p>
            </div>
        </div>
    </div>
</body>

</html>