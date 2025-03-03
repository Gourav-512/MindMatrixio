<?php // include 'includes/header.php'; ?>  <!-- Link to your website header -->

<link rel="stylesheet" href="/ai_services/code_generator/static/code_gen.css">  <!-- Link to the CSS file -->

<div class="container">
    <h1>🔹 AI Code Generator</h1>
    <p>Enter a prompt below to generate code:</p>

    <form id="codeGenForm">
        <input type="text" name="prompt" id="promptInput" placeholder="Enter your prompt..." required>
        <button type="submit">🚀 Generate Code</button>
    </form>

    <div id="output"></div>  <!-- Output container -->
</div>

<script>
document.getElementById("codeGenForm").addEventListener("submit", function(event) {
    event.preventDefault();

    let prompt = document.getElementById("promptInput").value.trim();
    let outputDiv = document.getElementById("output");
    outputDiv.innerHTML = "<p style='color: gray;'>Generating...</p>";

    fetch("http://127.0.0.1:5001/generate", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ prompt: prompt })
    })
    .then(response => response.json())
    .then(data => {
        if (data.generated_text) {
            outputDiv.innerHTML = `<pre>${data.generated_text}</pre>`;
        } else {
            outputDiv.innerHTML = `<p style="color: red;">Error: ${data.error}</p>`;
        }
    })
    .catch(error => {
        outputDiv.innerHTML = `<p style="color: red;">Error: ${error.message}</p>`;
    });
});
</script>

<?php //include 'includes/footer.php'; ?>  <!-- Link to your website footer -->
