<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Page</title>
    <style>
        /* Center the text */
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
        }

        /* Define gradient text style */
        .gradient-text {
            background: -webkit-linear-gradient(45deg, #ff7300, #ff0049);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 24px;
            animation: neon 1.5s ease-in-out infinite alternate;
        }

        /* Define marquee animation */
        @keyframes marquee {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(-100%);
            }
        }

        /* Apply marquee effect to text */
        .marquee-container {
            width: 100%;
            overflow: hidden;
            white-space: nowrap;
            animation: marquee 5s linear infinite;
        }
    </style>
</head>
<body>
    <div class="marquee-container">
        <p class="gradient-text">test 123 padayon</p>
    </div>
</body>
</html>
