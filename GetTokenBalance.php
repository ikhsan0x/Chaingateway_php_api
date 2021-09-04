<?php
# ----- REPLACE THE VARIABLES BELOW WITH YOUR DATA -----
$apikey = "YOURAPIKEY";
$binancecoinaddress = "BINANCECOINADDRESS"; // Binancecoin address you want to get the balance of
$contractaddress = "CONTRACTADDRESS"; // Smart contract address of the Token
# -------------------------------------------------------


# Define function endpoint
$ch = curl_init("https://eu.bsc.chaingateway.io/v1/getTokenBalance");

# Setup request to send json via POST. This is where all parameters should be entered.
$payload = json_encode( array("binancecoinaddress" => $binancecoinaddress, "contractaddress" => $contractaddress) );
curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array("Content-Type:application/json", "Authorization: " . $apikey));

# Return response instead of printing.
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

# Send request.
$result = curl_exec($ch);
curl_close($ch);

# Decode the received JSON string
$resultdecoded = json_decode($result, true);

# Print the Token balance to the screen
echo $resultdecoded["balance"];
?>
