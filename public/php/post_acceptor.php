<?php
include( 'connection.php' );
/*******************************************************
 * Only these origins will be allowed to upload images *
 ******************************************************/
$accepted_origins = array( "http://localhost", "http://www.antstestsite.co.uk", "http://www.denmeadarcheryclub.co.uk", "http://www.flightsimsuk.co.uk" );

/*********************************************
 * Change this line to set the upload folder *
 *********************************************/
$imageFolder = "../images/user_images/";
$image_path = "images/user_images/";
//we use two different paths as the manage images page is in a different location, so the path this script uses will not work and the image won't be deleted if it comes from the news section. $image_path is used for entry into the database.
reset( $_FILES );
$temp = current( $_FILES );
//the code below simply checks that there is a file uploaded and it is from an accepted domain
if ( is_uploaded_file( $temp[ 'tmp_name' ] ) ) {
	if ( isset( $_SERVER[ 'HTTP_ORIGIN' ] ) ) {
		// same-origin requests won't set an origin. If the origin is set, it must be valid.
		if ( in_array( $_SERVER[ 'HTTP_ORIGIN' ], $accepted_origins ) ) {
			header( 'Access-Control-Allow-Origin: ' . $_SERVER[ 'HTTP_ORIGIN' ] );
		} else {
			header( "HTTP/1.0 403 Origin Denied" );
			return;
		}
	}

	/*
	  If your script needs to receive cookies, set images_upload_credentials : true in
	  the configuration and enable the following two headers.
	*/
	// header('Access-Control-Allow-Credentials: true');
	// header('P3P: CP="There is no P3P policy."');

	// Sanitize input
	if ( preg_match( "/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp[ 'name' ] ) ) {
		header( "HTTP/1.0 500 Invalid file name." );
		return;
	}

	// Verify extension
	if ( !in_array( strtolower( pathinfo( $temp[ 'name' ], PATHINFO_EXTENSION ) ), array( "gif", "jpg", "png" ) ) ) {
		header( "HTTP/1.0 500 Invalid extension." );
		return;
	}

	// Accept upload if there was no origin, or if it is an accepted origin
	$pathtowrite = $image_path . $temp[ 'name' ];
	//we need the above variable to write the correct path for the database. If we use the $filetowrite variable the wrong path is written and the image is not removed with the delete image function in the image management section
	$filetowrite = $imageFolder . $temp[ 'name' ];
	move_uploaded_file( $temp[ 'tmp_name' ], $filetowrite );
	//now we can upload the file to the database
	$new_query = "INSERT INTO images (image_filename) VALUES ('$pathtowrite')";
	$results = mysqli_query( $connection, $new_query )or die( mysql_error() );

	// Respond to the successful upload with JSON.
	// Use a location key to specify the path to the saved image resource.
	// { location : '/your/uploaded/image/file'}
	echo json_encode( array( 'location' => $filetowrite ) );
} else {
	// Notify editor that the upload failed
	header( "HTTP/1.0 500 Server Error" );
}
?>