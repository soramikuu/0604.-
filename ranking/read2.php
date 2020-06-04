<?php
// 出力用の文字列（ここに読み込んだデータをタグに入れた形式で追加していく）
// $str = '';
// ファイルを開く処理('r'=読み取り専用)
$file = fopen('data/data.csv', 'r');

// ファイルロックの処理
flock($file, LOCK_EX);

// ファイル書き込み処理
// 1行づつ取り出す
if ($file) {
    while ($line = fgets($file)) {
        $csv .= $line; //書き方おかしい？？
    }
}

// ファイルアンロックの処理
flock($file, LOCK_UN);
// ファイル閉じる
fclose($file);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ランキング一覧</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>

<body>
    <legend>ランキング一覧</legend>
    <a href="index.php">入力画面</a>
    <div id="output">
        <div id="name_area">
            <ol id="name_list">

            </ol>
        </div>
        <div id="score_area">
            <ul id="score_list">

            </ul>
        </div>
    </div>

    <!-- <table>
            <thead>
                <tr>
                    <th>名前</th>
                    <th>スコア</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td id="name"></td>
                    <td id="score"></td>
                </tr>
            </tbody>
        </table> -->


    <script type="text/javascript">
        // PHPの変数をJSの変数に変換
        const csvData = <?php echo json_encode($csv); ?>;
        // console.log(csvData);

        // csvを配列に変換
        const array = csvData.split('\n');
        console.log(array);

        // 配列を二次元配列に変換
        const twoDimArray = [];
        for (let i = 0; i < array.length; i++) {
            //空白行が出てきた時点で終了
            if (array[i] == '') break;

            //","ごとに配列化
            twoDimArray[i] = array[i].split(',');

            for (let j = 0; j < twoDimArray[i].length; j++) {
                //数字の場合は「"」を削除
                if (twoDimArray[i][j].match(/\-?\d+(.\d+)?(e[\+\-]d+)?/)) {
                    twoDimArray[i][j] = parseFloat(twoDimArray[i][j].replace('"', ''));
                }
            }
        }
        console.log(twoDimArray);

        //二次元配列をオジェクトに変換
        const head = twoDimArray.shift();
        const objArray = [];
        for (var b = 0; b < twoDimArray.length; b++) {
            var tmp = {};
            for (var i = 0; i < head.length; i++) {
                tmp[head[i]] = twoDimArray[b][i];
            }
            objArray.push(tmp);
        }
        console.log(objArray);

        //objArrayをscoreの降順にソート
        objArray.sort(function(a, b) {
            if (a.score < b.score) return 1;
            if (a.score > b.score) return -1;
            return 0;
        });
        // console.log(objArray);
        // console.log(objArray[0]);
        // console.log(Object.values(objArray))

        //名前取り出し
        const listName = objArray.map(obj => obj.name)
        // console.log(listName)

        //スコア取り出し
        const listScore = objArray.map(obj => obj.score)
        // console.log(listScore)

        //名前表示
        for (let i = 0; i < listName.length; i++) {
            // console.log(listName[i]);
            // str += listName[i] + "\n";
            // document.write('<li>');
            // document.write(listName[i]);
            // document.write('</li>');
            $('#name_list').append('<li>' + listName[i] + '</li>')
        }

        //スコア表示
        for (let i = 0; i < listScore.length; i++) {
            // console.log(listName[i]);
            // str += listName[i] + "\n";
            $('#score_list').append('<li>' + listScore[i] + '</li>')
        }

        // $("#output").text(Object.values(objArray));

        // function rank() {
        //     for (i = 0; i < objArray.length; i++) {
        //         $("#output").text(objArray[i]);
        //     }
        // }





        // //key-valueペア配列からオブジェクトを生成(マッピング)
        // const objs = twoDimArray.map(([k, v]) => ({
        //     [k]: v
        // }));
        // console.log(objs);

        // // Scoreを基準にソート
        // objs.sort(function(a, b)) {
        //     if (a.)
        // }

        // const sortByScore = (array) => (orderby = 'DESC') => {
        //     return
        // }

        // const obj = array.reduce((obj, [key, value]) => Object.assign(obj, {
        //     [key]: value
        // }), {});
        // console.log(obj);
        /**
         * 引数のCSVデータを連想配列に変換する
         * @param csv
         * @returns {{}}
         */
        // function convertCSVToArray(csv) {
        //     //header:CSV1行目の項目 :csvRows:項目に対する値
        //     const [] = csv.split('\n')
        //         .filter(function(row) {
        //             if (row !== '') {
        //                 return row;
        //             }
        //         }).map(function(row) {
        //             return row.split(',');
        //         });


        //     let arrayInKeyAndValue;
        //     let resultArray;
        //     let tmpResultArray;
    </script>
</body>

</html>
