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
            color: #4a5568;
            font-size: 14px;
            margin-bottom: 20px;
        }
        .footer {
            background-color: #f8fafc;
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #718096;
            border-top: 1px solid #edf2f7;
        }
        .footer img {
            height: 30px;
            margin-bottom: 10px;
        }
        .footer p {
            margin: 5px 0;
        }
        @media only screen and (max-width: 600px) {
            .email-container {
                width: 100% !important;
                margin: 0 !important;
            }
            .content {
                padding: 20px !important;
            }
            .header {
                padding: 30px 20px !important;
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
                    <div class="signature-title">Développeur Web Full Stack</div>
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