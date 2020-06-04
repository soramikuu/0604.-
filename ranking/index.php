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
            <legend>ゲームスコア入力画面</legend>
            <a href="read2.php">一覧画面</a>
            <!-- <div>
                id: <input type="text" name="id">
            </div> -->
            <div>
                name: <input type="text" name="name">
            </div>
            <div>
                スコア: <input type="text" name="score">
            </div>

            <div>
                <button>submit</button>
            </div>
        </fieldset>
    </form>
