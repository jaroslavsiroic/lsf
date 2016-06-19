<?php 
if (!$_SESSION['user']->isLoggedIn()) {
	require_once('views/pages/error.php');
	exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	Post::savePost($_POST['title'], $_POST['headline'], $_POST['content'], $_POST['category']);
	header('Location: ./');
}
?>
<script>
tinymce.init({
	selector: '#here',
	height: 200,
	plugins: [
		'advlist autolink lists link image charmap print preview anchor',
		'searchreplace visualblocks code fullscreen',
		'insertdatetime media table', 
		'contextmenu paste code'
	],
	toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media',
	content_css : 'assets/css/editorStyle.css'
});
</script>
<div class="col-lg-12">
	<h3>Write new post!</h3>
	<div class="well">
		<form action="" method="post" onsubmit="return validatePost(this)">
			<div class="form-group">
				<label for="title">Title<span class="star">*</span></label>
				<input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
			</div>
			<div class="form-group">
				<label for="headline">Headline<span class="star">*</span></label>
				<input type="text" class="form-control" id="headline" name="headline" placeholder="Enter headline">
				<p class="help-block">Short description about this post (10-20 words)</p>
			</div>
			<div class="form-group">
				<label for="content">Content<span class="star">*</span></label>
				<textarea id="here" name="content" placeholder="Enter content"></textarea>
			</div>
			<div class="form-group">
				<label for="category">Category<span class="star">*</span></label>
				<select class="form-control" id="category" name="category">
					<?php foreach($cats as $cat) { ?>
					 	<option value="<?php echo $cat->id ?>"><?php echo $cat->title ?></option>
					<?php } ?>
				</select>
			</div>
			<p><span class="star">*</span> Has to be submitted</p>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
	<p class="error" id="fail"></p>
</div>