<?php
# ----- REPLACE THE VARIABLES BELOW WITH YOUR DATA -----
$apikey = "YOURAPIKEY"; // API Key in your account panel
$contractaddress = "CONTRACTADDRESS"; // Contract address of the token you want to watch
$binancecoinaddress = "BINANCECOINADDRESS"; // Binancecoin address you want to watch
$url = "https://yoururl.com/ipnreceiver.php"; // URL where you want to receive updates
# -------------------------------------------------------


# Define function endpoint
$ch = curl_init("https://eu.bsc.chaingateway.io/v1/subscribeAddress");

# Setup request to send json via POST. This is where all parameters should be entered.
$payload = json_encode( array("contractaddress" => $contractaddress, "binancecoinaddress" => $binancecoinaddress, "url": $url) );
curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array("Content-Type:application/json", "Authorization: " . $apikey));

# Return response instead of printing.
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

# Send request.
$result = curl_exec($ch);
curl_close($ch);

# Decode the received JSON string
$resultdecoded = json_decode($result, true);

# Print status of request (should be true if it worked)
echo $resultdecoded["ok"];
?>
