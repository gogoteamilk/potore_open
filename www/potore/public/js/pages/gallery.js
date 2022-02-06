$(document).ready(function () {
    /**
     *  ドラッグできるリストの準備
     */
    // Sortable.create($('.sortable')[0], {
    //     animation: 110
    // });

    /**
     * 写真リストの初期設定
     */
    //最初から10個だったら登録ボタンを削除
    if ($(".list-group-item").length >= 11) {
        $("#store-item").hide();
    }


    /**
     * for showing edit item popup
     */
    $(document).on('click', "#edit-item", function () {
        $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
        //モーダル自体の設定
        var options = {
            'backdrop': 'static',
            'data-keyboard': 'true',
        };
        //edit用のモーダルを表示
        $('#edit-modal').data('mode', 'edit');
        $('#edit-modal').modal(options)
    })

    /**
     * modal show store mode
     */
    $(document).on('click', "#store-item", function () {
        //モーダル自体の設定
        var options = {
            'backdrop': 'static',
            'data-keyboard': 'true',
        };
        //edit用のモーダルを表示
        $('#edit-modal').data('mode', 'store');
        $('#edit-modal').modal(options)
    })

    // on modal show
    $('#edit-modal').on('show.bs.modal', function () {

        switch ($('#edit-modal').data('mode')) {
            case 'store':
                $(".store").show();
                $(".editer").hide();
                $(".delete").hide();
                $(".photo-update-common").show();
                $("#modal-input-photo").attr('src', '');
                break;

            case 'edit':
                //show
                var el = $(".edit-item-trigger-clicked"); // See how its usefull right here? 
                var query = el.data('item-id');
                $(".store").hide();
                $(".editer").show();
                $(".delete").hide();
                $(".photo-update-common").show();
                //photoInfoデータをfetchして挿入する
                // item-idをみて写真idを出す
                getPhotoData('/photo/info', query).then(array => {
                    $("#modal-input-photoID").val(array[0]['id']);
                    $("#modal-input-photo").attr('src', array[0]['photo']);
                    $("#modal-input-title").val(array[0]['title']);
                    $("#modal-input-comment").val(array[0]['comment']);
                });
                //クリエイターをセット
                getPhotoData('/creaters/fetch', query).then(json => {
                    searchResult.choices.setValue(json);
                    cancelFlag = 0;//処理中フラグ終了
                });
                break;
        }
    })

    // modal edit done
    $('#edit_done').click(function () {
        let action = $('#edit-modal').data('mode');
        switch (action) {
            case 'store':
                photoStore();
                break;
            case 'edit':
                photoUpdate();
                break;
        }
    })

    //削除確認
    $('#delete-photo-check').click(function () {
        $(".delete").show();
        $(".store").hide();
        $(".editer").hide();
        $(".photo-update-common").hide();
    });

    //写真の削除
    $('#delete-photo-done').click(async function () {
        //post時の初期化
        $("#loading").fadeIn(500);
        $('#modal-backdrop').hide();
        const fd = new FormData();
        let url = "/photo/delete";
        fd.append('photoID', $("#modal-input-photoID").val());
        await fetch(url, {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            body: fd
        }).then(async function (response) {
            if (response.ok) {
                //表示しているリストからも消す
                $(".edit-item-trigger-clicked").closest(".list-group-item").remove();
            }
        })
        await $('#edit-modal').modal('hide');
        $("#loading").fadeOut(500);
    })

    // on modal hide
    $('#edit-modal').on('hide.bs.modal', function () {
        //フォームの初期化
        $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked');
        $("#edit-form").trigger("reset");
        validationClear();
        //リストアイテムが10個以上になったら追加ボタンを消す
        $(".list-group-item").length < 10 ? $("#store-item").show() : $("#store-item").hide();
    })

    // バリデーションエラー表示を初期化
    function validationClear() {
        //アラートの初期化
        $('#uplode_img_file').removeClass("is-valid is-invalid");
        $('#photo_alert').text("");
        $('#modal-input-title').removeClass("is-valid is-invalid");
        $('#title_alert').text("");
        $('#creaters_search').removeClass("is-valid is-invalid");
        $('#creaters_alert').text("");
        $('#modal-input-comment').removeClass("is-valid is-invalid");
        $('#comment_alert').text("");
    }


    //
    // modal fetch
    //

    /**
     * 新規画像アップロードのプレビュー
     */
    $(function () {
        $('#uplode_img_file').change(function () {
            var file = $(this).prop('files')[0];
            //バリデーション
            var imageType = 'image.*';
            if (!file.type.match(imageType)) {
                alert('ファイルの取得に失敗しました。\r画像を選択してください。');
                $('#uplode_img_file').val(null);
                return
            }
            if (file.size >= 5060000) {
                alert('ファイルの取得に失敗しました。\rファイルサイズは5MBまでです!!');
                $('#uplode_img_file').val(null);
                return
            }
            var reader = new FileReader();
            reader.onload = function () {  // 読み込みが完了したら
                $('#modal-input-photo').attr('src', reader.result);  // preview_filedに画像を表示
            }
            reader.readAsDataURL(file); // ファイル読み込みを非同期でバックグラウンドで開始
        });
    });


    /**
     * 新規写真追加
     * //photoFile, photoID, title, creaters[], comment
     */
    async function photoStore() {
        //post時の初期化
        $("#loading").fadeIn(500);
        $('#modal-backdrop').hide();
        validationClear();
        var file = $('#uplode_img_file').prop('files')[0];
        //jsでのvalidation
        if (file === undefined) {
            $('.photo').addClass("is-invalid");
            $('#photo_alert').text("写真が選択されていません");
            $("#loading").fadeOut(500);
            $('#modal-backdrop').show();
            return;
        }
        //store
        const fd = new FormData();
        let url = "/photo/store";
        fd.append("photoFile", file, file.name);
        fd.append('title', $("#modal-input-title").val());
        fd.append('comment', $("#modal-input-comment").val());
        $.each($("#creaters_search > option"), function () { fd.append('creaters[]', Number($(this).val())) });//選択されたクリエイターを収集
        await fetch(url, {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            body: fd
        }).then(async function (response) {
            let j = await response.json();
            if (response.ok) {
                if (!$('#photoList>li:first-child')[0]) { window.location.href = '/home/gallery'; }//データ一件目ならリロード
                let photoID = j['id'];//新規登録された写真ID
                let modalImgData = $('#modal-input-photo').attr('src');//アップロードしたファイルのデータをローカル内で取得
                //リストをクローンして作る
                let listItemTemplate = $('#photoList>li:first-child').clone();
                listItemTemplate.find('img').attr('src', modalImgData);
                listItemTemplate.find('#edit-item').attr('data-item-id', photoID); //idはレスポンスから保存データに付与されたものを取る
                listItemTemplate.appendTo('#photoList');
                await $('#edit-modal').modal('hide');
                await $("#loading").fadeOut(500);
            }
            if (!response.ok) {
                //バリデーションエラー
                photoInValid(j);
            }
        }).catch(function (error) {
            $('#edit-modal').modal('hide');
            $("#loading").fadeOut(500);
        });
    }


    /**
     * 既存写真のデータ更新
     * //photoID, title, creaters[], comment
     */
    function photoUpdate() {
        //post時の初期化
        $("#loading").fadeIn(500);
        $('#modal-backdrop').hide();
        validationClear();
        //post処理
        const fd = new FormData();
        let url = $("#edit-form").attr('action');
        fd.append('photoID', $("#modal-input-photoID").val());
        fd.append('title', $("#modal-input-title").val());
        fd.append('comment', $("#modal-input-comment").val());
        $.each($("#creaters_search > option"), function () { fd.append('creaters[]', Number($(this).val())) });//選択されたクリエイターを収集
        fetch(url, {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            body: fd
        }).then(async function (response) {
            let j = await response.json();
            if (response.ok) {
                $('#edit-modal').modal('hide');
                $("#loading").fadeOut(500);
            }
            if (!response.ok) {
                //バリデーションエラー
                photoInValid(j);
            }
        }).catch(function (error) {
            $('#edit-modal').modal('hide');
            $("#loading").fadeOut(500);
        });
    }

    /**
     * バリデーションエラー時の表示
     * jsonを期待
     */
    function photoInValid(j) {
        //バリデーションエラー
        $("#loading").fadeOut(500);
        if (j.errors.photoFile) {
            $('.photo').addClass("is-invalid");
            $('#photo_alert').text(j.errors.photoFile);
        }
        if (j.errors.title) {
            $('#modal-input-title').addClass("is-invalid");
            $('#title_alert').text(j.errors.title);
        }
        if (j.errors.creaters !== undefined) {
            $('#creaters_search').addClass("is-invalid");
            $('#creaters_alert').text(j.errors.creaters);
        }
        if (j.errors.comment !== undefined) {
            $('#modal-input-comment').addClass("is-invalid");
            $('#comment_alert').text(j.errors.comment);
        }
    }

    /**
     * choices.js
     */
    /* apply choices to select boxes */
    const choicesOptions = {
        shouldSort: false,
        removeItemButton: true,
        searchResultLimit: 9,   // default: 4
        duplicateItemsAllowed: false, //重複は認めない
        maxItemCount: 5,
        noResultsText: '検索結果がありませんでした',
        noChoicesText: 'ユーザ検索結果が出ます',
        removeItems: true,
        callbackOnCreateTemplates: function (strToEl) {
            var classNames = this.config.classNames;
            var itemSelectText = this.config.itemSelectText;
            return {
                item: function (classNames, data) {
                    return strToEl(
                        '\
              <div\
                class="' +
                        String(classNames.item) +
                        ' ' +
                        String(
                            data.highlighted
                                ? classNames.highlightedState
                                : classNames.itemSelectable
                        ) +
                        '"\
                data-item\
                data-id="' +
                        String(data.id) +
                        '"\
                data-value="' +
                        String(data.value) +
                        '"\
                ' +
                        String(data.active ? 'aria-selected="true"' : '') +
                        '\
                ' +
                        String(data.disabled ? 'aria-disabled="true"' : '') +
                        '\
                    data-deletable\
                >\
                <span style="margin-right:5px;">\
                    <img class="suggestImg rounded-circle" src="'+
                        String(data.avatar) +
                        '">\
                </span> ' +
                        String(data.label) +
                        '\
                    <button type="button" class="choices__button" aria-label="Remove item: '+
                        String(data.value) +
                        '" data-button="">Remove item</button>\
              </div>\
            '
                    );
                },
                choice: function (classNames, data) {
                    return strToEl(
                        '\
              <div\
                class="\
                    selectItem \
                    ' +
                        String(classNames.item) +
                        ' ' +
                        String(classNames.itemChoice) +
                        ' ' +
                        String(
                            data.disabled
                                ? classNames.itemDisabled
                                : classNames.itemSelectable
                        ) +
                        '"\
                data-select-text="' +
                        String(itemSelectText) +
                        '"\
                data-choice \
                ' +
                        String(
                            data.disabled
                                ? 'data-choice-disabled aria-disabled="true"'
                                : 'data-choice-selectable'
                        ) +
                        '\
                data-id="' +
                        String(data.id) +
                        '"\
                data-value="' +
                        String(data.value) +
                        '"\
                ' +
                        String(
                            data.groupId > 0 ? 'role="treeitem"' : 'role="option"'
                        ) +
                        '\
                >\
                <span style="margin-right:5px;">\
                    <img class="suggestImg rounded-circle" src="'+
                        String(data.avatar) +
                        '">\
                    </span> ' +
                        String(data.label) +
                        '\
              </div>\
            '
                    );
                },
            };
        }
    };
    const searchResult = document.getElementById('creaters_search');
    searchResult.choices = new Choices(searchResult, choicesOptions,

    );

    /* add event listener to choices__input */
    const choisesInput = document.querySelector('input.choices__input');
    if (choisesInput != null) {
        choisesInput.addEventListener('keyup', setOptions); // type: 'input' is not effective.
    }

    /* set options */
    var cancelFlag = 0;//処理中フラグ
    function setOptions() {
        const choices = searchResult.choices;
        const query = choisesInput.value;
        const url = '/users/fetch';
        //ガード節
        if (cancelFlag != 0) { return }//処理中なら終了
        if (query == '') { return }//queryが空なら終了
        //get data and set
        cancelFlag = 1;//処理中フラグ立てる
        //リストデータを挿入する
        getPhotoData('/users/fetch', query).then(array => {
            choices.setChoices(array, 'id', 'name', 'avatar', true);
            cancelFlag = 0;//処理中フラグ終了
        });
    }

    /* get photoInfo or creaters json by fetch api */
    async function getPhotoData(APIurl, query) {
        const formData = new FormData();
        formData.append('searchQuery', query);
        const response = await fetch(APIurl, {
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method: "POST",
            body: formData
        });
        const json = await response.json();
        return json;
    }

});

