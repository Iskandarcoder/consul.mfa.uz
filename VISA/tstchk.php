<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru">

<head>
	<title>An XHTML 1.0 Strict standard template</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />

	<style type="text/css">
		* {
			margin: 0;
			padding: 0;
		}

		html {
			font-size: 100.1%;
		}

		body {
			margin: 10px;
			font: 62.5% Arial, Tahoma, Verdana, sans-serif;
		}

		.button {
			overflow: hidden;
			display: -moz-inline-stack;
			display: inline-block;
			padding: 0 1px;
			font-size: 1.4em;
			text-decoration: none;
			color: #767676;
			cursor: pointer;
		}

		.button .button-cont {
			display: block;
			border-top: #9d9d9d 1px solid;
			border-bottom: #9d9d9d 1px solid;
		}

		.button .button-side {
			position: relative;
			display: block;
			margin: 0 -1px;
			padding: 2px 5px;
			border-left: #9d9d9d 1px solid;
			border-right: #9d9d9d 1px solid;
			background: #c9c9c9 url('images/Block3.png') 0 0 repeat-x;
		}

		.button .center {
			text-align: center;
		}

		.button:hover {
			text-decoration: underline;
		}

		.button:hover .button-cont,
		.button:hover .button-side {
			border-color: #619dc8;
		}

		.button:hover .button-side {
			background-color: #9ec9e2;
		}

		.green-but {
			color: #FFFFFF;
		}

		.green-but .button-cont,
		.green-but .button-side {
			border-color: #78ba78;
		}

		.green-but .button-side {
			background-color: #b0dbb0;
		}
	</style>

	<!--[if lt IE 8]>
		<style type="text/css">
			.button {
				display: inline;
				zoom: 1;
			}

			.button .button-side {
				display: inline;
				position: relative;
				left: -1px;
				zoom: 1;
			}
		</style>
	<![endif]-->

	<!--[if IE 6]>
		<style type="text/css">
			.button .button-side {
				filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled='true'
, sizingMethod='scale', src='http://www.imageup.ru/img45/button_light404787.png');
				background-image: none;
			}
		</style>
	<![endif]-->
</head>

<body>
	<a href="java script: void(0);" class="button">
		<span class="button-cont">
			<span class="button-side">
				Кнопка
			</span>
		</span>
	</a><br /><br />

	<a href="java script: void(0);" class="button green-but">
		<span class="button-cont">
			<span class="button-side">
				Зеленая кнопка
			</span>
		</span>
	</a><br /><br />

	<a href="java script: void(0);" class="button">
		<span class="button-cont">
			<span class="button-side">
				Очень длинная кнопка
			</span>
		</span>
	</a><br /><br />

	<a href="java script: void(0);" class="button">
		<span class="button-cont">
			<span class="button-side center">
				Кнопка с переносом на<br />
				другую строку
			</span>
		</span>
	</a><br /><br />

	<a href="java script: void(0);" class="button green-but">
		<span class="button-cont">
			<span class="button-side">
				Еще одна длинная зеленая кнопка
			</span>
		</span>
	</a>

</body>
</html>