@extends('layout.app')

@section('content')
<div class="loading_area">
    <div class="form_loading"></div>
    <div class="bar">
      <div class="progress_bar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" >

      </div>
    </div>
    <div class="percent"><span class="percent_num">0</span>% Complete</div>
    <div id="status">Please wait..</div>
    <div id='loaded_n_total'></div>
</div>
<div class="title m-b-md hideField">
    <h3>Two Three Bird Question One</h3>
    <p>Drag and Drop image previewer</p>
</div>
<div class="fluid-box hideField">
    <div class="left-box">
        <form method="POST" id="fileUpload" action="{{ route('question.one.upload') }}" >
            @csrf
            <div id="drop_file_zone" ondrop="upload_file(event)" ondragover="return false" data-upload="{{ route('question.one.upload') }}">
                <div id="drag_upload_file">
                    <p>Drop file here</p>
                    <input type="file" id="selectfile" name="file">
                    <p class="error"></p>
                </div>

            </div>

            </form>
    </div>
    <div class="right-box">
        <div class="preview_div">
            <table style="width:100%">
                <tr>
                  <td><img src="#" id="image_preview" class="hidden" width="50px"/>
                  </td>
                  <td> <a href="#" id="image_url" class="hidden"></a></td>
                </tr>
              </table>
        </div>
    </div>
</div>


@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
var fileobj;
function upload_file(e) {
    e.preventDefault();
    fileobj = e.dataTransfer.files[0];
    enableLoader();
    ajax_file_upload(fileobj);
    $('.error').hide();
    $('.preview_div').hide();
}
function ajax_file_upload(file_obj) {
    if(file_obj != undefined) {
        var form_data = new FormData($('#fileUpload')[0]);
        form_data.append('file', file_obj);
        $.ajax({
            type: 'POST',
            url: $('#drop_file_zone').attr('data-upload'),
            xhr: function () {
                var myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) {
                    myXhr.upload.addEventListener(
                        "progress",
                        progressHandler,
                        false
                    );
                }
                return myXhr;
            },
            contentType: false,
            processData: false,
            data: form_data,
            success:function(response) {
                if(response.status){
                    $('#image_preview').attr('src', response.image).show();
                    $('#image_url').attr('href', response.image).html(response.image).show();
                    $('.preview_div').show();
                }else{
                    if (response.errors.hasOwnProperty('file')) {
                        $(".error")
                            .html(response.errors.file[0])
                            .show();
                    }

                }
                disaleloader();

            },
            error: function (data) {
                errorHandler(data);
            },
        });
    }
}
function disaleloader() {
        setTimeout(() => {
            $(".hideField").show();
            $(".loading_area").hide();
            $(".progress_bar").width("0%");
            $(".percent_num").html("0");
            _("loaded_n_total").innerHTML = "";
        }, 300);
    }
function _(el) {
        return document.getElementById(el);
    }
    function enableLoader() {
        _("status").innerHTML = "Please wait..";
        $(".hideField").hide();
        $(".loading_area").show();

        $(".cerror").hide();
    }
function progressHandler(event) {
        var current_upload = event.loaded / 1024 / 1024;
        var total_upload = event.total / 1024 / 1024;
        _("loaded_n_total").innerHTML =
            "Uploaded " +
            current_upload.toFixed(2) +
            " MB of " +
            total_upload.toFixed(2) +
            "MB";
        var percent = (event.loaded / event.total) * 100;
        $(".progress_bar").width(percent.toFixed(2) + "%");
        $(".percent_num").html(percent.toFixed(2));
    }
    function errorHandler(event) {
        console.log("data", event);
        toastr.error("Your Request was unsuccessful");
        disaleloader();
        _("status").innerHTML = "Upload Failed";
    }
</script>
