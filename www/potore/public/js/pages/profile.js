//Initialize the plugin:
$(document).ready(function () {
    $('#areas-large-dataprovider').multiselect({ maxHeight: 200 });
});

//bootstrap - datepickerのjavascriptコード
$(document).ready(function () {
    $('#birthday').datepicker({
        format: "yyyy/mm/dd"
    });
});

//確認画像アップロード
$(function () {
    $('#avatar_img_file').change(function () {
        var file = $(this).prop('files')[0];
        //バリデーション
        var imageType = 'image.*';
        if (!file.type.match(imageType)) {
            alert('ファイルの取得に失敗しました。\r画像を選択してください。');
            $('#avatar_img_file').val(null);
            return
        }
        if (file.size >= 5060000) {
            alert('ファイルの取得に失敗しました。\rファイルサイズは5MBまでです!!');
            $('#avatar_img_file').val(null);
            return
        }
        var reader = new FileReader();
        reader.onload = function () {  // 読み込みが完了したら
            $('#next_avatar_img').attr('src', reader.result);  // preview_filedに画像を表示
            $('#avatar_img').hide();
            $('#next_avatar_img').show();
        }
        reader.readAsDataURL(file); // ファイル読み込みを非同期でバックグラウンドで開始
    });
});

/**
 * アップロード用写真のリセット
 */
$(function () {
    $('#reset_img').on('click', function () {
        $('#avatar_img').show();
        $('#next_avatar_img').hide();
        $('#avatar_img_file').val(null);
    });
});