<?php
//this is how you redirect to a new page
function redirect_to($new_location)  {
header("Location: " . $new_location);
exit;
	}

//the next function is for outputting form errors
function form_errors($errors=array()) {
	$output ="";
	if (!empty($errors)) {
		
		$output .="div class=\"error col-lg-3\">";
		$output .="please fix the following errors:";
		$output .="<ul>";
		foreach ($errors as $key => $error) {
			$output .="<li>{$error}</li>";
		}
		$output .="</ul>";
		$output .="</div>";
	}
	return $output;
}

//the next functions are all for form validation


//this one checks for blank inputs, should never be a problem with HTML5 required attribute


function has_presence($value) {
		return isset($value) && $value != "";
		}
//this one checks the max length of an input


function has_max_length($value, $max) {
		return strlen($value) <= $max;
		}

//this one checks for inclusion in a set


function has_inclusion_in($value,$set) {
		return in_array($value,$set);
		}

// this function strips away any characters that could harm out site, and returns the form input for further processing
function check_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
	$data = strtolower($data);
    return $data;
}

//next function creates a drop down list from a column value, we will need two arguments, the database name and the column, i.e site_users , userid.
//the function assumes the database connection is already made
function drop_down($table_name,$col)
{
				
				$new_query = 'SELECT' . $col . 'FROM' . $table_name;
				$result = mysqli_query($connection,$new_query);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row["news_title"]. '">' . $row["news_title"] .  '</option>';
    }
} else {
    echo "0 results";
}
					
	
	
	
	
}
	
	
	
	
	
?>
