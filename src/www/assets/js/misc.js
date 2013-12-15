(function(window, undefined) {

    window.html5SendFile = function(fileInput, submitUrl, cb, async) {
        var files = fileInput.files;
        if (!files || files.length == 0)
            return;
        var file = files[0];
        var fileReader = new FileReader();
        fileReader.onload = function(e) {
            var data = new Uint8Array(e.target.result);
            var ajaxRequest = new XMLHttpRequest();
            ajaxRequest.open('POST', submitUrl, async);  // DOMString method, DOMString url, optional boolean async
            ajaxRequest.setRequestHeader('Content-Type', 'application/octet-stream');
            ajaxRequest.send(data);
            cb(ajaxRequest.responseText);
        };
        fileReader.readAsArrayBuffer(file);
    };

    window.parseJSend = function(responseText, handlers) {
        var response = JSON.parse(responseText);
        switch(response['status'])
        {
            case 'success':
                handlers['success'](response['data']);
                break;
            case 'fail':
                handlers['fail'](response['data']);
                break;
            case 'error':
                handlers['error'](
                    response['message'],
                    response.hasOwnProperty('code') ? response['code'] : null,
                    response.hasOwnProperty('data') ? response['data'] : null);
                break;
            default:
                console.log('incorrect JSend response!');
        }
    };

})(window);