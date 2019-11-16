<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Flightsimsuk Admin</title>
	<!-- Bootstrap -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">

	<!--<script src='https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=26tbuxn2cgjih332f9adv7d6l9bx5uhycaa7orbkxlday4wy'></script>
-->
	<script src="tinymce/js/tinymce/tinymce.min.js"></script>
	</script>


	<script type="text/javascript">
		tinymce.init( {
			selector: '#news_text',
			plugins: 'image code',
			toolbar1: 'undo redo | link image | code',
			toolbar2: 'alignleft aligncenter alignright',
			// enable title field in the Image dialog
			image_title: true,
			// enable automatic uploads of images represented by blob or data URIs
			automatic_uploads: true,
			// URL of our upload handler (for more details check: https://www.tinymce.com/docs/configure/file-image-upload/#images_upload_url)
			images_upload_url: 'php/post_acceptor.php',
			// here we add custom filepicker only to Image dialog
			file_picker_types: 'image',
			// and here's our custom image picker
			file_picker_callback: function ( cb, value, meta ) {
				var input = document.createElement( 'input' );
				input.setAttribute( 'type', 'file' );
				input.setAttribute( 'accept', 'image/*' );

				// Note: In modern browsers input[type="file"] is functional without 
				// even adding it to the DOM, but that might not be the case in some older
				// or quirky browsers like IE, so you might want to add it to the DOM
				// just in case, and visually hide it. And do not forget do remove it
				// once you do not need it anymore.

				input.onchange = function () {
					var file = this.files[ 0 ];

					var reader = new FileReader();
					reader.readAsDataURL( file );
					reader.onload = function () {
						// Note: Now we need to register the blob in TinyMCEs image blob
						// registry. In the next release this part hopefully won't be
						// necessary, as we are looking to handle it internally.
						var id = 'blobid' + ( new Date() ).getTime();
						var blobCache = tinymce.activeEditor.editorUpload.blobCache;
						var base64 = reader.result.split( ',' )[ 1 ];
						var blobInfo = blobCache.create( id, file, base64 );
						blobCache.add( blobInfo );

						// call the callback and populate the Title field with the file name
						cb( blobInfo.blobUri(), {
							title: file.name
						} );
					};
				};

				input.click();
			}
		} );
	</script>

	<!--end of Tinymce section-->
	<script src="../../js/bootstrap.js"></script>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->




</head>

<body>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="../../js/jquery-1.11.3.min.js"></script>

<nav class="navbar navbar-default">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
			<a class="navbar-brand" href="index.php">Flightsimsuk</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="defaultNavbar1">
			<ul class="nav navbar-nav">
				<li><a href="index.php">Home</a></li>
				
				<li><a href="contact.php" role="button" aria-haspopup="true" aria-expanded="false">Contact</a></li>
				
				<li><a href="news.php" ole="button" aria-haspopup="true" aria-expanded="false">News</a>
				</li>
			</ul>
			<form class="navbar-form navbar-left" role="login" method="post" action="admin.php">
				<div class="form-group">
					<?php

					if ( isset( $_SESSION[ 'username' ] ) ) {
						echo( '<strong>' . $_SESSION[ 'username' ] . '</strong> is logged in  ' );
						echo( '<button type="submit" name="logout" class="btn btn-sm ">Logout</button></form>' );
						echo( '</div>' );
					}

					?>


					
				</div>
				<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>
	</nav>