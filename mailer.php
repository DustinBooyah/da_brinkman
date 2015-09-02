<?PHP 

####################################################### 
# This script is Copyright 2003, Infinity Web Design  # 
# Distributed by http://www.webdevfaqs.com            #
# Written by Ryan Brill - ryan@infinitypages.com      # 
# All Rights Reserved - Do not remove this notice     # 
####################################################### 

## The lines below need to be edited... 

###################### Set up the following variables ###################### 
# 
$to = "admin@brinkmansurveying.com"; #set address to send form to 
$subject = "Survey Estimate Request"; #set the subject line 
$forward = 1; # redirect? 1 : yes || 0 : no 
$location = "thanks.html"; #set page to redirect to, if 1 is above 
# 
##################### No need to edit below this line ###################### 

## set up the time ## 

$date = date ("l, F jS, Y"); 
$time = date ("h:i A"); 

## mail the message ## 

$msg = "Below is the result of your feedback form. It was submitted on $date at $time.\n\n"; 

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	foreach ($_POST as $key => $value) { 
		$msg .= ucfirst ($key) ." : ". $value . "\n"; 
	}
}
else {
	foreach ($_GET as $key => $value) { 
		$msg .= ucfirst ($key) ." : ". $value . "\n"; 
	}
}

mail($to, $subject, $msg, $headers); 
if ($forward == 1) { 
    header ("Location:$location"); 
} 
else { 
    echo "Thank you!. We'll get back to you as soon as possible."; 
} 

?>