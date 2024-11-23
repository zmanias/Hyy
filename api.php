<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $key = 'e616b21a998ef429e4026b3deee7b863';
    $amount = $_POST['amount'];
    $signature = hash('sha256', $key . $amount . '929'); // Ganti dengan kunci rahasia Anda

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.paydisini.co.id/v1/');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, [
        'key' => $key,
        'request' => 'new',
        'unique_code' => uniqid('trx_'),
        'service' => '17',
        'amount' => $amount,
        'note' => 'Pembelian Produk Digital',
        'valid_time' => '1800',
        'type_fee' => '1',
        'payment_guide' => true,
        'signature' => $signature,
        'return_url' => 'success.php'
    ]);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo json_encode(['error' => curl_error($ch)]);
    } else {
        echo $result;
    }
    curl_close($ch);
} else {
    http_response_code(405);
    echo 'Method not allowed';
}
?>