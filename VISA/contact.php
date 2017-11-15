<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>PHP/MySQL Contact Form with jQuery</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="PHP/MySQL Contact Form with jQuery" />
        <meta name="keywords" content="contact form, php, mysql, jquery" />
        <link rel="stylesheet" href="css/contact.css" type="text/css" media="screen"/>
        <script type="text/javascript" src="js/jquery.js"></script>
		<script src="js/jquery.contact.js" type="text/javascript"></script>
        <style>
            a.back{
                width:184px;
                height:32px;
                position:absolute;
                bottom:10px;
                left:10px;
                background:transparent url(back.png) no-repeat top left;
            }
            a.switchstyle{
                width:184px;
                height:32px;
                position:absolute;
                top:10px;
                left:10px;
                background:transparent url(switchstyle.png) no-repeat top left;
            }
        </style>
    </head>
    <body>
        <div id="contact">
            <h1>Обратная связь</h1>
            <form id="ContactForm" action="">
                <p>
                    <label>Ваша имя</label>
                    <input id="name" name="name" class="inplaceError" maxlength="120" type="text" autocomplete="off"/>
					<span class="error" style="display:none;"></span>
                </p>
                <p>
                    <label>Электронный адрес</label>
                    <input id="email" name="email" class="inplaceError" maxlength="120" type="text" autocomplete="off"/>
					<span class="error" style="display:none;"></span>
                </p>
                <p>
                    <label>Веб сайт<span>(если есть)</span></label>
                    <input id="website" name="website" class="inplaceError" maxlength="120" type="text" autocomplete="off"/>
                </p>
                <p>
                    <label>Ваше сообщение<br /> <span>(Допистумо только 254 символов)</span></label>
                    <textarea id="message" name="message" class="inplaceError" cols="6" rows="5" autocomplete="off"></textarea>
					<span class="error" style="display:none;"></span>
                </p>
                <p class="submit">
                    <input id="send" type="button" value="Отправить"/>
                    <span id="loader" class="loader" style="display:none;"></span>
					<span id="success_message" class="success"></span>
                </p>
				<input id="newcontact" name="newcontact" type="hidden" value="1"></input>
            </form>
        </div>
        <div class="envelope">
            <img id="envelope" src="images/envelope.png" alt="envelope" width="246" height="175" style="display:none;"/>
        </div>

        <!-- The JavaScript -->

    </body>
</html>