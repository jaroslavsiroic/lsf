<div class="col-lg-8">
	
	<h3>Lithuanian Student Forum</h3>
  	<!--<script>tinymce.init({ selector:'textarea' });</script>-->

    <?php
    if ($_SESSION['user']->isLoggedIn()) {
        echo '<a style="width: 98%; magrin: auto; height: 50px; margin: 10px" href="?controller=posts&action=write" type="button" class="btn btn-success"><font size="6">Write new Post!</font></a>';
    }
    require_once('models/post.php');
    $posts = Post::all(); 
    echo "<hr><p>List of all posts:</p>";
    foreach($posts as $post) { 
    ?>
    <div class="media">
        <a class="pull-left" href="#">
            <img style="max-width: 64px; max-height: 64px" class="media-object" src="assets/img/user256.png" alt="
            ">
        </a>
        <div class="media-body">
            <a href="?controller=posts&action=show&id=<?php echo $post->id; ?>" >
                <h3 class="media-heading"> <?php echo $post->title;  ?> </h3>
            </a>
            <h4 class="media-heading"> <?php echo $post->author->name.' '.$post->author->surname; ?>
                <small>
                    <?php echo $post->date; ?>
                </small>
            </h4>
            <p class="lead"><?php echo $post->headline; ?></p>
        </div>
    </div>
    <?php } ?>
</div>

<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">
    <img src="http://www.technologijos.lt/upload/image/n/pranesimai_spaudai/S-30037/2-1-lietuvos_studentu_forumas.png">
    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <div class="input-group">
            <input type="text" class="form-control">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
<div class="col-lg-6">
<?php require_once('views/pages/category.php'); ?>
                

            </div>
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <div class="well">
    	<script>
    		function validate(){
    			feed = document.getElementById('feedForm').feed;
    			if(feed.value == ""){
    				document.getElementById('err').innerHTML = "Textbox is empty!";
    			} else sendAjax(feed.value);
    		}
    		function sendAjax(text){
			var a = Ajax(); // 1. utworzenie obiektu XMLHttpRequest(), wywołanie funkcji z ajax.js
			
			adres = "models/feedAjax.php";
			
			a.open("POST", adres); // 2. zdefiniowanie żądania, argumenty: metoda żądania i adres URL
			var ggg = 'param=' + text;
			a.send(ggg); // 3. wykonanie żądania, argumentem są parametry żądania jeśli w open() podano metodę POST. Jeśli w open() podano metodę GET to argumentem jest "null"
			
			a.onreadystatechange=function(){ // 4. czy zmienił się status żądania
				if(a.readyState==4){  // 5. jaki status żądania
					if (a.status==200){ // 6. czy ukończone powodzeniem
						document.getElementById('err').innerHTML = a.responseText; // 7. odczytanie danych zwróconych z serwera i umieszczenie za pomocą obiektu DOM w bloku div o id wynik
						a=false;
					}
				}
			}
		}
    	</script>
        <h4>Write us your feedback!</h4>
        <form id="feedForm">
        	<textarea style="width: 100%; max-width: 100%" name="feed"></textarea>
        	<button onclick="validate();" class="btn btn-primary">Submit</button>
        </form>
        <p id="err" class="error"></p>
    </div>

</div>