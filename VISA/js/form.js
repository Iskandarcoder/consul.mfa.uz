  $(function() {

				//call progress bar constructor


				//set click handler for next button
				$("#next").click(function(e) {

					//stop form submission
					e.preventDefault();

					//look at each panel
				  $(".form-panel").each(function() {

						//if it's not the first panel enable the back button
            ($(this).attr("id") != "panel1") ? null : $("#back").attr("", "");

						//if the panel is visible fade it out
					  ($(this).removeClass("ui-helper-hidden")) ? null : $(this).fadeOut("fast", function() {

							//add hidden class and show the next panel
							$(this).removeClass("ui-helper-hidden").next().fadeIn("fast", function() {

								//if it's the last panel disable the next button
    						($(this).attr("id") != "thanks") ? null : $("#next").attr("disabled", "disabled");
							($(this).attr("id") != "thanks") ? null : $("#submit").attr("disabled", "");

								//remove hidden class from new panel
								$(this).removeClass("ui-helper-hidden");

								//update progress bar

							});
						});
					});
				});

				//set click handler for back button
				$("#back").click(function(e) {

					//stop form submission
					e.preventDefault();

					//look at each panel
				  $(".form-panel").each(function() {

					  //if it's not the last panel enable the next button
						($(this).attr("id") != "thanks") ? null : $("#next").attr("disabled", "");
						($(this).attr("id") != "thanks") ? null : $("#submit").attr("disabled", "disabled");

						//if the panel is visible fade it out
					  ($(this).removeClass("ui-helper-hidden")) ? null : $(this).fadeOut("fast", function() {

							//add hidden class and show the next panel
							$(this).removeClass("ui-helper-hidden").prev().fadeIn("fast", function() {

							  //if it's the first panel disable the back button
    						($(this).attr("id") != "panel1") ? null : $("#back").attr("disabled", "disabled");

								//remove hidden class from new panel
								$(this).removeClass("ui-helper-hidden");


							});
						});
					});
				});



// Ү⩰᦬ 塭 ⡪  衯ﲻ졥졭ࡰoehali.php!
$("#next").click(function() {

$.ajax({
type: "POST",
url: "otvet.php",
data: "barkod="+$('#barkod').attr('value')+"&pasp_no="+$("#pasp_no").attr('value')+"&pass="+$("#pass").attr('value')+"&repass="+$("#repass").attr('value')+"&email="+$("#email").attr('value')+"&telefon="+$("#telefon").attr('value')+"&adr="+$("#adr").attr('value'),
success: function(answer){$("#thanks p").html(answer);}
	  });
	});
	$("#submit").click(function() {
		return false;
	});
$("#loading img").ajaxStart(function(){$(this).show();});
$("#loading img").ajaxStop(function(){$(this).hide();});
			});