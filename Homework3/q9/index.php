<html> 
    <head> 
        <style>
            h1{
                text-align: center;
                color: azure;
                padding: 20px;
                font-size: 60px;
            }
            div{
                width: 100%;
                height: 100%;
                margin: auto;
                background-color:darkolivegreen;
                text-align: center;
            }
            h3{
                position: fixed;
                bottom: 0;
                width:100%;
                text-align: center;
                font-size: 40px;
                color: azure;
            }
            p{
                font-size: 20px; 
            }
        </style>
    </head>
    <?php
        // get the the random page type, random img type, and the random quote type
        $pageType = rand(0,1);
        $imageType = rand(0,3);
        $quoutType = rand(0,3);
        date_default_timezone_set("America/New_York");


        if($pageType){ //checks to see if it the first page type
            // sets the appropriate background image and date 
            if($imageType == 0)
                echo '<body style="background-image: url(\'./images/158885.jpg\');"><h1>Format One</h1><h3>'.date("l M-d-Y h:ia").'<h3></body>';
            else if ($imageType == 1)
                echo '<body style="background-image: url(\'./images/38aeu51hq3d61.jpg\');"><h1>Format One</h1><h3>'.date("l M-d-Y h:ia").'<h3></body>';
            else if ($imageType == 2)
                echo '<body style="background-image: url(\'./images/945950.jpg\');"><h1>Format One</h1><h3>'.date("l M-d-Y h:ia").'<h3></body>';
            else if ($imageType == 3)
                echo '<body style="background-image: url(\'./images/nhk8jg3psng71.jpg\');"><h1>Format One</h1><h3>'.date("l M-d-Y h:ia").'<h3></body>';
        }
        else { 
            // sets appropriate quote and date
            if($quoutType == 0)
                echo '<body><div><h1 style= "color: black">Format Two</h1><p>“Whats the key to success? The key is, there is no key. Be humble, hungry, and the hardest worker in any room."</p><p>-Dwayne ‘The Rock’ Johnson</p><h3 style= "color: black">'.date("l M-d-Y h:ia").'<h3></div></body';
            else if ($quoutType == 1)
                echo '<body><div><h1 style= "color: black">Format Two</h1><p>“If something stands between you and your success, MOVE IT! Never be denied.”</p><p>-Dwayne ‘The Rock’ Johnson</p><h3 style= "color: black">'.date("l M-d-Y h:ia").'<h3></div></body';
            else if ($quoutType == 2)
                echo '<body><div><h1 style= "color: black">Format Two</h1><p>“Success isn’t overnight. It’s when every day you get a little better than the day before. It all adds up.”</p><p>-Dwayne ‘The Rock’ Johnson</p><h3 style= "color: black">'.date("l M-d-Y h:ia").'<h3></div></body';
            else if ($quoutType == 3)
                echo '<body><div><h1 style= "color: black">Format Two</h1><p>"Where I excel is ridiculous, sickening, work ethic. You know, while the other guy’s sleeping? I’m working."</p> <p>-Will Smith</p><h3 style= "color: black">'.date("l M-d-Y h:ia").'<h3></div></body';
        }

    ?>

</html>
