
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Galery Flickr</title>
	<link rel="stylesheet" href="">

	<script src="https://luis-almeida.github.io/jPages/js/jquery-1.8.2.min.js"></script>
	<script src="jPages.js" ></script>
	<style>
		.holder {
			margin:15px 0;
		}
		.holder a {
			font-size:12px;
			cursor:pointer;
			margin:0 5px;
			color:#333;
		}
		.holder a:hover {
			background-color:#222;
			color:#fff;
		}
		.holder a.jp-previous {
			margin-right:15px;
		}
		.holder a.jp-next {
			margin-left:15px;
		}
		.holder a.jp-current,a.jp-current:hover {
			color:#FF4242;
			font-weight:bold;
		}
		.holder a.jp-disabled,a.jp-disabled:hover {
			color:#bbb;
		}
		.holder a.jp-current,a.jp-current:hover,.holder a.jp-disabled,a.jp-disabled:hover {
			cursor:default;
			background:none;
		}
		.holder span {
			margin: 0 5px;
		}

		ul#itemContainer { list-style: none; padding:0; margin: 20px 0;  }
		ul#itemContainer li { display: inline-block; margin: 5px; zoom: 1; *display:inline; }
		ul#itemContainer li img { vertical-align: bottom; width: 125px; height: 125px; }
	</style>

</head>

<body>
	
	<div class="holder">
	</div>

	<?php 

	$per_page = 20;
	$page = 1;
	$api_key = "de75aa14a12ee8825a8072f19036545e";
	$user_id = "88268106%40N05";
	$method = "flickr.photos.search";

	$url = 'https://www.flickr.com/services/rest/?method='.$method.'&api_key='.$api_key.'&user_id='.$user_id.'&page='.$page.'&format=json&nojsoncallback=1';

	$data = json_decode(file_get_contents($url));
	echo '<ul id="itemContainer">';
	foreach ($data->photos->photo as $photo) {	
		$url = 'http://farm'.$photo->farm.'.staticflickr.com/'.$photo->server.'/'.$photo->id.'_'.$photo->secret.'.jpg';
		echo '<li><img src="'.$url.'" alt="image"></li>';
	}
	echo '</ul>';
	?>

	<div class="holder">
	</div>

	<script>
		
		/* when document is ready */
		$(function(){
			/* initiate the plugin */
			$("div.holder").jPages({
				containerID  : "itemContainer",
				perPage      : 10,
				startPage    : 1,
				startRange   : 1,
				midRange     : 5,
				endRange     : 1
			});
		});
	</script>
</body>
</html>

