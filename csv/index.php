<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>textファイル書き込み型アンケート（入力画面）</title>
</head>

<body>
    <form action="create.php" method="POST">
        <fieldset>
            <legend>textファイル書き込み型todoリスト（入力画面）</legend>
            <a href="read.php">一覧画面</a>
            <div>
                名前: <input type="text" name="name">
            </div>
            <div>
                email: <input type="email" name="email">
            </div>
            <div>
                任意の質問: <textarea name="question" id="" cols="30" rows="5"></textarea>
            </div>

            <div>
                <button>submit</button>
            </div>
        </fieldset>
    </form>
