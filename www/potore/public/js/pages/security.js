$(document).ready(function () {

    //
    // form fetch
    //

    /**
     * メールアドレスの変更
     */
    $('#change-email').click(async function emailUpdate() {
        $("#loading").fadeIn(500);
        $('#email').removeClass("is-valid is-invalid");
        const fd = new FormData();
        let url = "/home/email/update";
        fd.append('email', $("#email").val());
        await fetch(url, {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            body: fd
        }).then(async function (response) {
            if (response.ok) {
                var j = await response.json();
                if(j.status == "OK"){
                    $('#email').addClass("is-valid");
                    $('#mail_alert').text(j.summary);
                }
                if(j.status == "NG"){
                    $('#email').addClass("is-invalid");
                    $('#mail_alert').text(j.errors.email);
                }
            }
        });
        $("#loading").fadeOut(500);
    })

    /**
     * パスワードの変更
     */
    $('#change-pw').click(async function pwUpdate() {
        $("#loading").fadeIn(500);
        $('.pw').removeClass("is-valid is-invalid");
        let url = "/home/password/update";
        const fd = new FormData();
        fd.append('pw', $("#pw").val());
        fd.append('pw_confirmation', $("#pw_confirmation").val());
        //jsでのvalidation
        if($("#pw").val() != $("#pw_confirmation").val()){
            $('.pw').addClass("is-invalid");
            $('#pw_alert').text("確認用パスワードが一致しません");
            $("#loading").fadeOut(500);
            return;
        }
        await fetch(url, {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            body: fd
        }).then(async function (response) {
            if (response.ok) {
                var j = await response.json();
                if(j.status == "OK"){
                    $('.pw').addClass("is-valid");
                    $('#pw_alert').text(j.summary);
                        }
                if(j.status == "NG"){
                    $('.pw').addClass("is-invalid");
                    $('#pw_alert').text(j.errors.email);
                        }
            }
        });
        $("#loading").fadeOut(500);
    })
    /**
     * 退会する
     */
    $('#withdrawal').click(async function withdrawal() {
        $("#loading").fadeIn(500);
        let url = "/home/withdrawal";
        const fd = new FormData();
        fd.append('pw', $("#pw-check").val());
        await fetch(url, {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            body: fd
        }).then(async function (response) {
            if (response.ok) {
                location.href = "/";
            }
        }).catch(
            //error
        );
        $("#loading").fadeOut(500);
    })

})