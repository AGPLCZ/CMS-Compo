<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Upload velkých souborů</title>
    <style>
    body {
        background: #ccc;
    }

    .upload {
        display: inline-block;
        background: #fff;
    }

    #upload {
        width: 500px;
        line-height: 200px;
        text-align: center;
        font-size: 300%;
    }

    #upload-stav {
        background: yellow;
        height: 1em;
        width: 0;
        transition: .5s width;
        position: absolute;
        bottom: 0;
    }

    .upload-info {
        position: relative;
    }

    #upload-text,
    #upload-fileinfo {
        text-align: center;
        position: relative;
        z-index: 1;
    }
    </style>
</head>

<body>
    <div class="upload">
        <div id="upload" ondrop="runUpload(event)">
            Přetáhnout soubor sem
        </div>
        <div class="upload-info">
            <div id="upload-fileinfo"></div>
            <div id="upload-text"></div>
            <div id="upload-stav"></div>
        </div>
    </div>
    <script>
    function prevent(e) {
        e = e || event;
        e.preventDefault();
    }

    window.addEventListener("dragover", prevent, false);
    window.addEventListener("drop", prevent, false);

    var chunk;

    function runUpload(e) {
        var files = e.dataTransfer.files;
        file = files[0];
        uploadFileInfo.innerHTML = file.name + "<br>";
        uploadFileInfo.innerHTML += Math.round(file.size / 1000 / 1000) + " MB";
        chunk = 0;
        loadFile(file);
    }


    var uploadStav = document.getElementById("upload-stav");
    var uploadText = document.getElementById("upload-text");
    var uploadFileInfo = document.getElementById("upload-fileinfo");


    function loadFile(file) {
        var chunkSize = 1000 * 1000 * 1; // 1 MB = Velikost jedné části 
        var chunks = Math.ceil(file.size / chunkSize);
        var reader = new FileReader();

        var start, end;
        start = chunk * chunkSize;
        if (start > file.size) {
            start = end + 1;
        }
        end = start + (chunkSize) >= file.size ? file.size : start + (chunkSize);

        reader.onload = function(e) {
            // Ve sliceData je část souboru k odeslání AJAXem na server
            var sliceData = e.target.result;

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4) {
                    chunk++;
                    uploadStav.style.width = chunk / chunks * 100 + "%";
                    uploadText.innerHTML = Math.round(chunk / chunks * 100) + " %";
                    if (chunk < chunks) {
                        loadFile(file);
                    } else {
                        uploadText.innerHTML = "Hotovo";
                        uploadText.style.background = "lightgreen";
                    }
                }
            }
            var url = "chunk=" + chunk + "&filename=" + file.name + "&data=" + (sliceData);

            xhr.open('POST', "./upload.php");
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send(url);
        };
        reader.readAsDataURL(file.slice(start, end));
    }
    </script>
</body>

</html>