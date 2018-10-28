<?php 

// filename: upload.form.php 

// first let's set some variables 

// make a note of the current working directory relative to root. 
$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']); 

// make a note of the location of the upload handler script 
$uploadHandler = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'upload.processor.php'; 

// set a max file size for the html upload form 
$max_file_size = 30000; // size in bytes 

// now echo the html page 
 

<html lang="en"> 
    <head> 
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1"> 
     
        <link rel="stylesheet" type="text/css" href="stylesheet.css"> 
         
        <title>Upload form</title> 
     
    </head> 
     
    <body> 
     
    <form id="Upload" action="<?php echo $uploadHandler ?>" enctype="multipart/form-data" method="post"> 
     
        <h1> 
            Upload form 
        </h1> 
         
        <p> 
            <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size ?>"> 
        </p> 
         
        <p> 
            <label for="file">File to upload:</label> 
            <input id="file" type="file" name="file"> 
        </p> 
                 
        <p> 
            <label for="submit">Press to...</label> 
            <input id="submit" type="submit" name="submit" value="Upload me!"> 
        </p> 
     
    </form> 
     
     
    </body> 

</html> 
The form is just basic HTML but has one very important part which is often accidentally omitted making file uploads impossible. This item is contained in the <form> tag, be sure to include it:
<form id="Upload" action="<?php echo $uploadHandler ?>" enctype="multipart/form-data" method="post">
The other important thing of course is the file <input> tag.
<input id="file" type="file" name="file">
Lastly, while still on the subject of the upload form, it is possible to add an optional hidden <input> tag which contains the maximum upload filesize and this should come before the file upload field. The value of this field is the filesize in bytes.
Now on to the upload processing script. This script runs in a linear way and if any step of the script is not satisfied the script will abort and output an error message. The comments in the script explain what each step does, and don't really require further explanation.
<?php 

// filename: upload.processor.php 

// first let's set some variables 

// make a note of the current working directory, relative to root. 
$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']); 

// make a note of the directory that will recieve the uploaded file 
$uploadsDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . 'uploaded_files/'; 

// make a note of the location of the upload form in case we need it 
$uploadForm = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'upload.form.php'; 

// make a note of the location of the success page 
$uploadSuccess = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'upload.success.php'; 

// fieldname used within the file <input> of the HTML form 
$fieldname = 'file'; 

// Now let's deal with the upload 

// possible PHP upload errors 
$errors = array(1 => 'php.ini max file size exceeded', 
                2 => 'html form max file size exceeded', 
                3 => 'file upload was only partial', 
                4 => 'no file was attached'); 

// check the upload form was actually submitted else print the form 
isset($_POST['submit']) 
    or error('the upload form is neaded', $uploadForm); 

// check for PHP's built-in uploading errors 
($_FILES[$fieldname]['error'] == 0) 
    or error($errors[$_FILES[$fieldname]['error']], $uploadForm); 
     
// check that the file we are working on really was the subject of an HTTP upload 
@is_uploaded_file($_FILES[$fieldname]['tmp_name']) 
    or error('not an HTTP upload', $uploadForm); 
     
// validation... since this is an image upload script we should run a check   
// to make sure the uploaded file is in fact an image. Here is a simple check: 
// getimagesize() returns false if the file tested is not an image. 
@getimagesize($_FILES[$fieldname]['tmp_name']) 
    or error('only image uploads are allowed', $uploadForm); 
     
// make a unique filename for the uploaded file and check it is not already 
// taken... if it is already taken keep trying until we find a vacant one 
// sample filename: 1140732936-filename.jpg 
$now = time(); 
while(file_exists($uploadFilename = $uploadsDirectory.$now.'-'.$_FILES[$fieldname]['name'])) 
{ 
    $now++; 
} 

// now let's move the file to its final location and allocate the new filename to it 
@move_uploaded_file($_FILES[$fieldname]['tmp_name'], $uploadFilename) 
    or error('receiving directory insuffiecient permission', $uploadForm); 
     
// If you got this far, everything has worked and the file has been successfully saved. 
// We are now going to redirect the client to a success page. 
header('Location: ' . $uploadSuccess); 

// The following function is an error handler which is used 
// to output an HTML error page if the file upload fails 
function error($error, $location, $seconds = 5) 
{ 
    header("Refresh: $seconds; URL="$location""); 
    echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"'."n". 
    '"http://www.w3.org/TR/html4/strict.dtd">'."nn". 
    '<html lang="en">'."n". 
    '    <head>'."n". 
    '        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">'."nn". 
    '        <link rel="stylesheet" type="text/css" href="stylesheet.css">'."nn". 
    '    <title>Upload error</title>'."nn". 
    '    </head>'."nn". 
    '    <body>'."nn". 
    '    <div id="Upload">'."nn". 
    '        <h1>Upload failure</h1>'."nn". 
    '        <p>An error has occurred: '."nn". 
    '        <span class="red">' . $error . '...</span>'."nn". 
    '         The upload form is reloading</p>'."nn". 
    '     </div>'."nn". 
    '</html>'; 
    exit; 
} // end error handler 

?> 
If the script above came to its conclusion without any error the client will be redirected to a success (A.K.A. landing) page. The following is an example of such a page:
<?php 

// filename: upload.success.php 

?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" 
"http://www.w3.org/TR/html4/strict.dtd"> 

<html lang="en"> 
    <head> 
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1"> 
         
        <link rel="stylesheet" type="text/css" href="stylesheet.css"> 
         
        <title>Successful upload</title> 
     
    </head> 
     
    <body> 
     
        <div id="Upload"> 
            <h1>File upload</h1> 
            <p>Congratulations! Your file upload was successful</p> 
        </div> 
     
    </body> 

</html> 
Finally to tie everything together we need a simple stylesheet:
#Upload {
	width: 25em;
	margin: 1em auto;
	padding:0 2em 2em 2em ;
	border:1px solid #bbb;
	color: #333;
	background:#ffd;
	font: 0.9em verdana, sans-serif;
}
			
#Upload h1{
	font: 1.4em bold verdana, sans-serif;
	margin: 0;
	padding:1em 0;
	text-align:center;
}
#Upload label{
	float: left;
	width: 7em;
}
		
#Upload p {
	 clear: both;
}		

.red{
	color:red;
}