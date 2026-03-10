<?php
// ポストデータの受け取り
$name     = $_POST['name'] ?? '';
$age      = $_POST['age'] ?? '';
$phone    = $_POST['phone'] ?? '';
$email    = $_POST['email'] ?? '';
$address  = $_POST['address'] ?? '';
$question = $_POST['question'] ?? '';
$gender   = $_POST['gender'] ?? '';

$errors = [];

// バリデーションチェック
if (!preg_match("/^[ぁ-んァ-ヶー一-龠a-zA-Z]+$/u", $name)) {
    $errors[] = "name：名前はひらがな、カタカナ、漢字、英字のみ使用できます。";
}

if (!is_numeric($age) || $age < 0 || $age > 150) {
    $errors[] = "age：年齢は0から150の間で入力してください。";
}

if (!preg_match("/^[0-9-]+$/", $phone)) {
    $errors[] = "phone：電話番号は半角数字とハイフンのみ使用できます。";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "email：メールアドレスの形式が正しくありません。";
}

if (!preg_match("/^[ぁ-んァ-ヶー一-龠a-zA-Z0-9\s]+$/u", $address)) {
    $errors[] = "address：住所はひらがな、カタカナ、漢字、英字、数字のみ使用できます。";
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>確認画面</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>確認画面</h1>
    <div class="container">
        <?php if (count($errors) > 0): ?>
            <ul style="color: red; text-align: left;">
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
            </ul>
            <p><a href="form.php">戻る</a></p>
        <?php else: ?>
            <p>以下の内容で送信しました。</p>
            <div style="text-align: left; line-height: 1.8;">
                <strong>名前:</strong> <?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?><br>
                <strong>年齢:</strong> <?php echo htmlspecialchars($age, ENT_QUOTES, 'UTF-8'); ?><br>
                <strong>電話番号:</strong> <?php echo htmlspecialchars($phone, ENT_QUOTES, 'UTF-8'); ?><br>
                <strong>メールアドレス:</strong> <?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?><br>
                <strong>住所:</strong> <?php echo htmlspecialchars($address, ENT_QUOTES, 'UTF-8'); ?><br>
                <strong>質問:</strong> <?php echo htmlspecialchars($question, ENT_QUOTES, 'UTF-8'); ?><br>
                <strong>性別:</strong> <?php echo htmlspecialchars($gender, ENT_QUOTES, 'UTF-8'); ?>
            </div>
            <p style="margin-top: 20px;"><a href="form.php">入力画面へ戻る</a></p>
        <?php endif; ?>
    </div>
</body>
</html>