<?php include "header.php"; ?>
<!-- //header-ends -->
<div id="page-wrapper">
    <div class="graphs">
        <h3 class="blank1">Post News</h3>
        <div class="xs">
            <div class="col-md-8 inbox_right">
                <div class="Compose-Message">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Compose News 
                        </div>
                        <?php if(get("success")): ?>
                            <div>
                                <?=App::message("success", "News saved Successfully!")?>
                            </div>
                        <?php endif; ?>
                        <div class="panel-body panel-body-com-m">
                            <form class="com-mail" action="save-news.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                                <label>News Title : </label>
                                <input type="text" name="news_title" class="form-control1 control3" placeholder="News Title" required>
                                
                                <label>News Detail : </label>
                                <textarea name="news_detail" id="body" rows="6" class="form-control1 control2" required></textarea>
                                
                                <script>
                                    // Initialize CKEditor
                                    CKEDITOR.replace('body');

                                    function validateForm() {
                                        // Get the content from CKEditor
                                        const editorContent = CKEDITOR.instances.body.getData();
                                        const fileInput = document.querySelector('input[type="file"]');

                                        // Check if CKEditor content is empty
                                        if (!editorContent.trim()) {
                                            alert("News detail is required.");
                                            return false;
                                        }

                                        // Check if file is selected
                                        if (!fileInput.value) {
                                            alert("Please add a photo.");
                                            return false;
                                        }

                                        return true;
                                    }
                                </script>

                                <label>Add Photo</label>
                                <input type="file" name="file" class="form-control1 control3" required>

                                <hr>
                                <input type="submit" value="Submit News">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
