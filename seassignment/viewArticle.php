<?php
include "function.php";
$conn = getConnection();
$sql = "SELECT * FROM article";
$sqlResult = $conn->prepare($sql);
$sqlResult->execute();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Article</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <!-- <form action="postArticle.php" method="post"> -->
            <div class="row" name="postArticle">
                <button type="button" class="btn btn-danger btn-block post-id" data-toggle="modal" data-target="#postModal">Post</button>
            </div>
            <!-- </form> -->
            <?php
            while ($row = $sqlResult->fetchObject()) {
                $title = $row->title;
                $description = $row->description;
                $thumbnail = $row->thumbnail;
                echo "<div class='row' name='view'>
			<label>Title: </label>
			<label name='title'>$title</label>
			<img id='myImg' class='img-fluid' src='$thumbnail' alt='' max-width='50px' max-height='50px' style='padding:3px;'/> 
			<label>Description: </label>
			<label name='description'>$description</label>
		</div>";
            }
            ?>

        </div>
        <div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Post Article</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <label>Title: </label>
                            <input type="text" name="title" id="title">
                        </div>
                        <div class="row">
                            <label>Description: </label>
                            <textarea name="description" id="description" rows="4"></textarea> 
                        </div>
                        <div class="row">
                            <label>Content: </label>
                            <input type="text" name="content" id="content">
                        </div>
                        <!-- <input id='contract_id' name='cid' type='hidden' value='' /> -->
                        <!-- <p id='demo'></p> -->
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="button" id='post_btn' name="post_btn">Post</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $('body').on('click', '.post-id', function () {
        // document.getElementById("contract_id").value = $(this).attr('data-id');
        // console.log($(this).attr('data-id'));
                });
            });
            document.getElementById("post_btn").onclick = function () {
                // var value = document.getElementById('contract_id').value;
                var url = "postArticle.php?title=";
                var title = document.getElementById('title').value;
                var link = url.concat(title);
                var description = document.getElementById('description').value;
                var url2 = "&description=";
                var link = link.concat(url2);
                var link = link.concat(description);
                var content = document.getElementById('content').value;
                var url3 = "&content=";
                var link = link.concat(url3);
                var link = link.concat(content);
                var date = new Date();
                var url4 = "&date=";
                var link = link.concat(url4);
                var link = link.concat(date);
                location.href = link;
            };
        // function redirect(){
        //   var value = document.getElementById('contract_id').value;
        //   var url = "localhost/cms/superadmin/deleteContract.php?id=";
        //   var link = url.concat(value);
        //   //document.getElementById("demo").innerHTML = link;
        //   location.href(link);
        // }


        </script>
    </body>
</html>