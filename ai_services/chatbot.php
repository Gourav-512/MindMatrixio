<!DOCTYPE html>
<html lang="en">
<head>
    <title>Chatbot</title>
    <script>
        async function sendMessage() {
            let userMessage = document.getElementById("userInput").value;
            let response = await fetch("http://127.0.0.1:5000/chat", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ message: userMessage }),
            });
            let data = await response.json();
            document.getElementById("chatResponse").innerText = "Bot: " + data.response;
        }
    </script>
</head>
<body>
    <h2>Ask the Chatbot</h2>
    <input type="text" id="userInput" placeholder="Type a message">
    <button onclick="sendMessage()">Send</button>
    <p id="chatResponse"></p>
</body>
</html>
