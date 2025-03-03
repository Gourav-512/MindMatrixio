<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sentiment Analysis Tool</title>
    <link rel="stylesheet" href="http://localhost/MindMatrix.io/ai_services/sentiment_analysis_tool/static/style.css">
</head>
<body>

    <h1>Sentiment Analysis Tool</h1>
    <textarea id="textInput" placeholder="Enter text..."></textarea><br>
    <button onclick="analyzeSentiment()">Analyze</button>
    <p id="result"></p>

    <script>
        function analyzeSentiment() {
            let text = document.getElementById("textInput").value;

            fetch("http://127.0.0.1:5000/analyze", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ text: text })
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById("result").innerText = "Sentiment: " + data.sentiment + " (Polarity: " + data.polarity + ")";
            })
            .catch(error => console.error("Error:", error));
        }
    </script>

</body>
</html>
