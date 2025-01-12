<!DOCTYPE html>
<html>
<head>
    <title>AI Chatbot</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div>
    <h1>CHATBOT</h1>
    <input type="text" id="userInput" placeholder="Type your message here..." />
    <button id="sendMessage">Send</button>
    <p>Response: <span id="response"></span></p>
</div>


    <!-- <script>
        function sendMessage() {
            const message = $('#userMessage').val();
            $.ajax({
                url: 'http://127.0.0.1:5000/chat',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({ message: message }),
                success: function(data) {
                    $('#response').text(data.response);
                },
                error: function(err) {
                    $('#response').text('Error: ' + err.responseJSON.error);
                }
            });
        }
    </script> -->



    <?php
// Endpoint of the Flask API
$api_url = 'http://127.0.0.1:5000/chat';

// Get the user's message (for example, from a form or an AJAX request)
$user_message = $_POST['message'];  // or use $_GET depending on your form method

// Prepare data for the POST request
$data = array('message' => $user_message);

// Use cURL to send the POST request to the Flask API
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

// Get the response from the chatbot API
$response = curl_exec($ch);
curl_close($ch);

// Decode the JSON response
$response_data = json_decode($response, true);

// Output the chatbot's response
echo "Bot: " . $response_data['response'];
?>



<!-- 
<script>
$.ajax({
    url: 'http://127.0.0.1:5000/chat',
    type: 'POST',
    contentType: 'application/json',
    data: JSON.stringify({ message: message }),
    success: function(data) {
        $('#response').text(data.response);
    },
    error: function(err) {
        $('#response').text('Error: ' + err.responseJSON.error);
    }
});
</script> -->


<script>
    $('#sendMessage').click(function() {
    const userMessage = $('#userInput').val();

    $.ajax({
        url: 'chatbot.php',
        type: 'POST',
        data: { message: userMessage },
        success: function(data) {
            const response = JSON.parse(data);
            $('#response').text(response.response || "No response received.");
        },
        error: function(err) {
            $('#response').text("Error: " + err.responseText);
        }
    });
});

</script>
</body>
</html>
