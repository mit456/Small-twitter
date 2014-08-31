<!DOCTYPE html>
<html>
    <head>
        <link href="bootstrap3.css" rel="stylesheet">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Testing JS</title>
    </head>
    <body>
        <input type="button" class="ajax_button btn btn-success " value="#tag1">
        <input type="button" class="ajax_button btn btn-danger " value="#happybirthday"><br>

        <div id="tweets" class="well col-sm-4" style="display: none; margin-left:32%"></div>
    </body>


    <script type="text/javascript">
        window.onload = function() {    // Added window.onload because without this buttons variable getting global access, which is bad 
            var buttons = document.getElementsByClassName('ajax_button');    // It returns array of object
            for (var j = 0; j < buttons.length; j++) {
                buttons[j].addEventListener("click", function() {
                    var tagname = this.value;
                    send_ajax_request(tagname);
                });
            }
        };

        function send_ajax_request(tagname) {
            var ajax_request;                   // closure variable
            if (typeof XMLHttpRequest !== 'undefined')
                ajax_request = new XMLHttpRequest();
            ajax_request.onreadystatechange = function() {
                handle_response();
            };

            ajax_request.open("POST", "get_response.php", true);
            ajax_request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            ajax_request.send('tagname=' + encodeURIComponent(tagname));

            function handle_response() {
                if (ajax_request.readyState < 4) {
                    return;
                }
                if (ajax_request.status !== 200) {
                    return;
                }
                var text = "<p>Tweets using " + tagname + "</p>";       // closure variable
                var data = JSON.parse(ajax_request.responseText);

                for (var i = 0; i < data.length; i++) {
                    text += data[i].user_name + " - " + data[i].tweet + "<br>";
                }
                show_output(text);
            }
        }

        function show_output(text) {
            text += "<a href='#' id ='hide_tweets' style='float:right;'>Hide</a>";
            document.getElementById('tweets').innerHTML = text;
            document.getElementById('tweets').style.display = 'block';

            document.getElementById('hide_tweets').onclick = function() {
                document.getElementById('tweets').style.display = 'none';
            };
        }
    </script>
</html>
