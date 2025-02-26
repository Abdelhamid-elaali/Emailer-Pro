<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidature Stage</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #2d3748;
            margin: 0;
            padding: 0;
            background-color: #f7fafc;
        }
        .email-wrapper {
            width: 100%;
            background-color: #f7fafc;
            padding: 40px 0;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #4f46e5 0%, #3730a3 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
        }
        .header .subject {
            font-size: 26px;
            font-weight: bold;
            margin: 0;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }
        .content {
            padding: 40px 30px;
            background-color: #ffffff;
        }
        .content p {
            margin: 0 0 20px;
            font-size: 16px;
            line-height: 1.8;
            color: #4a5568;
        }
        .content h3 {
            font-size: 20px;
            color: #2d3748;
            margin-bottom: 20px;
        }
        .signature {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 2px solid #edf2f7;
        }
        .signature-name {
            font-weight: bold;
            color: #2d3748;
            font-size: 18px;
            margin-bottom: 5px;
        }
        .signature-title {
    max-width: 600px;
    padding: 20px;
    background: #f8f9fa;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    font-family: 'Arial', sans-serif;
}

.title {
    font-size: 1.2em;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 15px;
    border-bottom: 2px solid #3498db;
    padding-bottom: 5px;
}

.contact-info {
    line-height: 1.6;
}

.contact-info p {
    margin: 10px 0;
    color: #34495e;
    font-size: 1em;
}

.contact-info a {
    color: #3498db;
    text-decoration: none;
    transition: color 0.3s ease;
}

.contact-info a:hover {
    color: #2980b9;
    text-decoration: underline;
}

/* Footer Section */
.footer {
    background-color: #f8fafc;
    padding: 20px;
    text-align: center;
    font-family: 'Arial', sans-serif;
    font-size: 12px;
    color: #718096;
    border-top: 1px solid #edf2f7;
    margin-top: 20px; /* Added spacing from content above */
}

.footer img {
    height: 30px;
    margin-bottom: 10px;
    transition: transform 0.3s ease; /* Smooth hover effect */
}

.footer img:hover {
    transform: scale(1.1); /* Subtle zoom on hover */
}

.footer p {
    margin: 5px 0;
    line-height: 1.5; /* Matches contact-info readability */
}

/* Responsive Design */
@media (max-width: 600px) {
    .signature-title {
        max-width: 100%;
        margin: 10px;
    }
    
    .title {
        font-size: 1.1em;
    }
    
    .contact-info p {
        font-size: 0.95em;
    }

    .footer {
        padding: 15px;
        font-size: 11px;
    }

    .footer img {
        height: 25px;
    }
}

/* Additional Media Query for Consistency with Your Original 600px Breakpoint */
@media only screen and (max-width: 600px) {
    .signature-title {
        max-width: 100%;
        margin: 0 10px;
        padding: 15px;
    }

    .contact-info p {
        font-size: 0.9em;
    }

    .footer {
        padding: 15px 10px;
    }
}
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="email-container">
            <div class="header">
                <h1 class="subject">{{ $subject }}</h1>
            </div>
            <div class="content">
                <h3>Bonjour,</h3>

                {!! $message !!}

                <div class="signature">
                    <div class="signature-name">{{ $senderName }}</div>
                    <div class="signature-title">
                        <p class="title">Pour me Contactez :</p>
                        <div class="contact-info">
                            <p>Email: <a href="mailto:abdelhamidelaali.bs007@gmail.com">abdelhamidelaali.bs007@gmail.com</a></p>
                            <p>Tel: +212 648 55 40 12</p>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <p>Envoyé via {{ $senderName }}</p>
                    <p style="color: #a0aec0; font-size: 11px;">Cet email a été envoyé par Abdelhamid El Aali.</p>
            </div>
        </div>
    </div>
</body>
</html>