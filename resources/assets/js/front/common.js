
var CommonUtils = {
    ajax: function(url, data, callback, extra) {
        if (!extra) {
            extra = {
                method: 'POST',
                dataType: 'JSON',
                error: false
            }
        }

        $.ajax({
            url: url,
            type: extra.method,
            dataType: extra.dataType,
            data: data,
            success: function(res) {
                callback(res)
            },
            error: function() {
                if (!extra.error) {
                    extra.error()
                } else {
                    CommonUtils.msg('网络错误，请稍后重试')
                }
            }
        })
    },
    msg: function(message) {
        if (layer == 'undefined') {
            console.log(message)
        } else {
            layer.msg(message)
        }
    },
    log: function() {
        console.log(arguments)
    },
}