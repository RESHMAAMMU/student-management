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

function readUrl(file, type, cb, imgw, imgh, id) {
let reader = new FileReader()

        reader.onload = function(e) {
        $('#cropper').attr('src', e.target.result)
                $('#image-modal').modal('show');
                setTimeout(initCropper, 500, type, cb, imgw, imgh, id)
        }

reader.readAsDataURL(file)

        }

function initCropper(type, ajaxCb, imgw, imgh, id) {
var $image = $('#cropper');
        $image.cropper('destroy');
        $image.cropper({
        background: false,
        viewMode: 1,
        center: true,
        dragMode: 'move',
    //                autoCropArea: 1,
        zoomOnTouch: true,
        cropBoxResizable: false,
        preview: '.preview',
        data:{
        width: imgw,
        height: imgh,
        },
        });
        $("#crop").unbind('click');
        $('#crop').on('click', function(e) {
        let cropper = $image.data('cropper');
        cropper.getCroppedCanvas({width: imgw, height: imgh}).toBlob(function (blob) {
        ajaxCb(blob, type, id);
        });
//        $('#image-modal').modal('hide');
});
        }

$(function() {
$('#image-modal').on('hidden.bs.modal', function () {
    $('input[type="file"]').val('');
});
})