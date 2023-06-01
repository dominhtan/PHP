//With model gpt-3.5-turbo
// Run file: php get_api_OpenAI.php
<?php
    $ch = curl_init();

$url = 'https://api.openai.com/v1/chat/completions';

$api_key = 'sk-xxxxx';

$query = 'What is the capital city of England?';

$post_fields = array(
    "model" => "gpt-3.5-turbo",
    "messages" => array(
        array(
            "role" => "user",
            "content" => $query
        )
    ),
    "max_tokens" => 12,
    "temperature" => 0
);

$header  = [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $api_key
];

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_fields));
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
}
curl_close($ch);

$response = json_decode($result);
var_dump($response->choices[0]->message->content);
?>
