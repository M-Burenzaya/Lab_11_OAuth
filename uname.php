<?php
$curl = curl_init();

$accessToken = $_COOKIE['access_token'];

curl_setopt($curl, CURLOPT_URL, 'https://api.github.com/user/emails');
// curl_setopt($curl, CURLOPT_POST, true);

$headers = [
    'Accept: application/json',
    'Authorization: Bearer ' . $accessToken,
    'X-GitHub-Api-Version: 2022-11-28',
    'User-Agent: mybrowser'
];

curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
// curl_setopt($curl, CURLOPT_, http_build_query([
//     'client_id' => $CLIENT_ID,
//     'client_secret' => $CLIENT_SECRET,
//     'code' => $sessionCode,
// ]));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($curl);
curl_close($curl);

$emails_jarr = json_decode($result, true);

$emails = [];

foreach ($emails_jarr as $item) {
    if (isset($item['email'])) {
        $emails[] = $item['email'];
    }
}
?>

<div id="container">
    <?php
            $validEmail = '20b1num0362@stud.num.edu.mn';

            if (in_array($validEmail, $emails)) {
                include('sisi_email.html');
            } else {
                include('other_email.html');
            }
    ?>
</div>

<!-- <?php print_r(implode(',', $emails)) ?>
<pre><?php print_r($result) ?></pre> -->