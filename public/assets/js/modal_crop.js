/** toBlob PolyFill for Edge */
if (!HTMLCanvasElement.prototype.toBlob) {
    Object.defineProperty(HTMLCanvasElement.prototype, "toBlob", {
        value: function (callback, type, quality) {
            var canvas = this;
            setTimeout(function () {
                var binStr = atob(
                        canvas.toDataURL(type, quality).split(",")[1]
                    ),
                    len = binStr.length,
                    arr = new Uint8Array(len);

                for (var i = 0; i < len; i++) {
                    arr[i] = binStr.charCodeAt(i);
                }

                callback(new Blob([arr], { type: type || "image/png" }));
            });
        },
    });
}

function readUrl(file, type, cb, ratio, id) {
    let reader = new FileReader()

    reader.onload = function(e) {
        $('#cropper').attr('src', e.target.result)
        $('#image-modal').modal('show');
        setTimeout(initCropper, 500, type, cb, ratio, id)
    }

    reader.readAsDataURL(file)
    
}

function initCropper(type, ajaxCb, ratio, id) {
    var $image = $('#cropper');

    $image.cropper('destroy');

    $image.cropper({
        aspectRatio: ratio,
        background: false,
        viewMode: 3,
	  preview: '.preview',
        crop: function(event) {
            // console.log(event.detail.x);
            // console.log(event.detail.y);
            // console.log(event.detail.width);
            // console.log(event.detail.height);
            // console.log(event.detail.rotate);
            // console.log(event.detail.scaleX);
            // console.log(event.detail.scaleY);
        }
    });

    $("#crop").unbind('click');

    $('#crop').on('click', function(e) {
        let cropper = $image.data('cropper');

        cropper.getCroppedCanvas().toBlob(function (blob) {            
            ajaxCb(blob, type, id);
        });

//        $('#image-modal').modal('hide');
    });

    
}

$(function() {
    
})