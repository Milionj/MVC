<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<?php
function flash($message="", $class="alert alert-success"){


    if(!empty($message)){
        echo '<div class="' . $class . ' text-center" id="msg-flash" role="alert">
        ' . $message . '</div>';
    }
    

}