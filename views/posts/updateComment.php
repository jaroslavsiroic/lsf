<?php 
if (!$_SESSION['user']->isLoggedIn()) header('Location: ./');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    Comment::update($_POST['id'],$_POST['content']);
    header('Location: ?controller=posts&action=show&id='.$_POST['postid']);
}
?>
<script>
    tinymce.init({
        selector: 'textarea',
        height: 100,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code'
        ],
        toolbar: 'styleselect | bold italic | bullist numlist outdent indent | link image media',
        content_css : 'assets/css/editorStyle.css'
    });
</script>
<!-- Comments Form -->
<h4>Update Comment:</h4>
<form role="form" action="" method="post" onsubmit="return valCom(this)">
    <div class="form-group">
        <textarea name="content" id="content" style="max-width: 100%" class="form-control" rows="3"><?php echo $com->content; ?></textarea>
    </div>
    <input type="hidden" name="id" value="<?php echo $com->id; ?>">
    <input type="hidden" name="postid" value="<?php echo $_GET['postid']; ?>">
    <input type="Submit" class="btn btn-primary" value="Submit">
</form>
<p class="error" id="fail"></p>