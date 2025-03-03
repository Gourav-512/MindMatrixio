<?php  //include '../includes/header.php'; ?>

<link rel="stylesheet" href="sentiment_analysis_tool/static/senty.css">

<div class="container">
    <h1>Sentiment Analysis Tool</h1>
    <p>Enter text below to analyze its sentiment:</p>
    <form id="sentimentForm">
        <textarea name="text" id="textInput" rows="5" placeholder="Enter your text here..."></textarea>
        <button type="submit">Analyze Sentiment</button>
    </form>
    <div id="result"></div>
</div>

<script>
document.getElementById('sentimentForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    let textInput = document.getElementById('textInput').value;

    fetch('http://127.0.0.1:5000/analyze', {  // Flask API endpoint
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ text: textInput })
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('result').innerHTML = `<h3>Sentiment: ${data.sentiment}</h3>`;
    })
    .catch(error => console.error('Error:', error));
});
</script>

<?php //include '../includes/footer.php'; ?>
