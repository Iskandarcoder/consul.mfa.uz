/**
 * LICENSE:
 *
 *    This program is free software: you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation, either version 3 of the License, or
 *    (at your option) any later version.
 *
 *    This program is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *    along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 ** jQuery FollowFocus plugin **
 *
 * @author Jesse Voogt <jesse.voogt@gmail.com>
 * @author Patrick Jones <patrickmjones@gmail.com>
 * @description Creates a focus rectangle by tweening four corners to the focused element.
 * @version 0.1
 * @since 2009-03-31
 *
 * Recommend use of jQuery Easing plugin by George McGinley Smith
 *
 * Usage:
 *  Place the following code snippet in the <head/> of your html file:
 *  <script type="text/javascript" src="/Vigilant_Website/www/js/jquery-followFocus.js"></script>
 *  Then place the following snippet into a function that fires after the document is ready
 *    window.followFocusSettings = {
 *        offset_tlx : -3,
 *        offset_tly : -3,
 *        offset_trx : 1,
 *        offset_try : -3,
 *        offset_blx : -3,
 *        offset_bly : 2,
 *        offset_brx : 1,
 *        offset_bry : 2
 *    };
 *
 *  Note:    If jQuery isn't already loaded, this plugin will try to load jQuery using document.write
 *
 * Example Usage:
 * <html>
 *  <head><script type="text/javascript" src="/Vigilant_Website/www/js/jquery-followFocus.js"></script></head>
 *  <body onLoad="jQuery.fn.followFocus({duration: 1000, easing: 'linear', cornerspace: 4, focusables:'.content a'});">
 *  </body>
 * </html>
 *
 * Settings:
 *      focusables      :       selector for elements to follow focus for  --   default: "a,input,textarea,button,select"
 *      cornerspace     :       spacing around element for corners to appear   --   default: 2
 *      widthpercent    :       value from 0 to 1 indicating the percent to auto-stretch width of corner (0 leaves width to css) -- default: .3
 *      heightpercent   :       value from 0 to 1 indicating the percent to auto-stretch height of corner (0 leaves width to css) -- default: 0
 *      duration        :       duration of tween between focusable elements (milliseconds) -- default: 300
 *      duration_def    :       duration of tween from default location (milliseconds) -- default: 500
 *      easing          :       string indicating the kind of easing to use for moving the four corners of the rectangle when changing focus (will be used in jQuery's animate function) -- default: 'easeInOutBack' if exists, otherwise 'swing'
 *      easing_def      :       string indicating the kind of easing to use for moving the four corners of the rectangle from the default location (will be used in jQuery's animate function) -- default: 'jswing' if exists, otherwise 'swing'
 *      opacity         :       value from 0 to 1 indicating the transparency of each of the four corners when they have faded all the way in   --  default: 0.8 
 *      fadeOutTimeout  :       Number of milliseconds to wait with fading out, which occurs when no focusable elements are in focus    --  default:    500
 *      fadeOutDuration :       Number of milliseconds for the fade out animation, which occurs when no focusable elements are in focus, after the fadeOutTimeout   --  default:    500
 *      offset_tlx      :       integer indicating the horizontal offset for top left corner        --  default:    0
 *      offset_tly      :       integer indicating the vertical offset for top left corner          --  default:    0
 *      offset_trx      :       integer indicating the horizontal offset for top right corner       --  default:    0
 *      offset_try      :       integer indicating the vertical offset for top right corner         --  default:    0
 *      offset_blx      :       integer indicating the horizontal offset for bottom left corner     --  default:    0
 *      offset_bly      :       integer indicating the vertical offset for bottom left corner       --  default:    0
 *      offset_brx      :       integer indicating the horizontal offset for bottom right corner    --  default:    0
 *      offset_bry      :       integer indicating the vertical offset for bottom right corner      --  default:    0
 *
 */

// Load jQuery in noConflict mode if we don't already have it
if(!window.jQuery)
    document.write('<scr'+'ipt type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" onLoad="loadFollowFocus(false)"><\/scr'+'ipt>');        
else
    loadFollowFocus(true);


function loadFollowFocus(conflict)
{

    if (!conflict)
        jQuery.noConflict();
    jQuery.fn.followFocus = function(settings) {
        var default_config = { // defaults
            focusables: "a,input,textarea,button,select",
            cornerspace : 2,    
            widthpercent : 0.3, 
            heightpercent : 0,  
            duration: 300,
            duration_def: 500,
            easing: jQuery.easing.easeInOutBack ? 'easeInOutBack' : 'swing',
            easing_def: jQuery.easing.jswing ? 'jswing' : 'swing',
            opacity: 0.8,

            fadeOutTimeout: 500,
            fadeOutDuration: 500,
            offset_tlx : 0,
            offset_tly : 0,
            offset_trx : 0,
            offset_try : 0,
            offset_blx : 0,
            offset_bly : 0,
            offset_brx : 0,
            offset_bry : 0
        };
        var config = {}; // runtime config
        var fadeTimer = null;

        function writeBasicCSS(){
                var styles = " \
                    .focus-rect {position:absolute;display:block;width:5px;height:5px;border:2px solid #ff1a1a;display:none;z-index:999;opacity:.8;} \
                    #focus-rect-tl {border-bottom:0;border-right:0;} \
                    #focus-rect-tr {border-bottom:0;border-left:0;} \
                    #focus-rect-bl {border-top:0;border-right:0;} \
                    #focus-rect-br {border-top:0;border-left:0;} \
                ";
            var cstag = document.createElement("style");
            cstag.type="text/css";
            document.getElementsByTagName("head")[0].appendChild(cstag);
            cstag.innerHTML = styles;
        }
        function getNodes(){
            var nodes = {
                tl:jQuery('#focus-rect-tl')[0],
                tr:jQuery('#focus-rect-tr')[0],
                bl:jQuery('#focus-rect-bl')[0],
                br:jQuery('#focus-rect-br')[0]
            }
            for(var i in nodes) {
                if(!nodes[i]) {
                    var n = document.createElement('div');
                    n.id = 'focus-rect-'+i;
                    n.className = 'focus-rect';
                    document.body.appendChild(n);
                    nodes[i] = n;
                }
                if(jQuery(nodes[i]).css('position') != 'absolute') //TODO: Find a better test
                {   // Set up some default styles because it appears the corners are unstyled
                    with(nodes[i].style)
                    {
                        position='absolute';
                        display='block';
                        width='5px';
                        height='5px';
                        border='1px solid #ff1a1a';
                        display='none';
                        zIndex='999';
                        opacity='.8'
                    }
                    if(i=='tl'){nodes[i].style.borderBottom=0;nodes[i].style.borderRight=0;}
                    if(i=='tr'){nodes[i].style.borderBottom=0;nodes[i].style.borderLeft=0;}
                    if(i=='bl'){nodes[i].style.borderTop=0;nodes[i].style.borderRight=0;}
                    if(i=='br'){nodes[i].style.borderTop=0;nodes[i].style.borderLeft=0;}
                }
            }
            return nodes;
        }
        function getDefaultNodes(){
            return {        
                tl:jQuery('#focus-rect-tl-def')[0],
                tr:jQuery('#focus-rect-tr-def')[0],
                bl:jQuery('#focus-rect-bl-def')[0],
                br:jQuery('#focus-rect-br-def')[0]
            };
        }
        function setFocusRectLocation(options){
            var conf = config;
            var options = jQuery.extend({
                tl:{x:0,y:0},
                tr:{x:0,y:0},
                bl:{x:0,y:0},
                br:{x:0,y:0},
                
                cornerwidth:0,
                cornerheight:0,
                duration: conf.duration,
                easing: conf.easing,
                opacity: conf.opacity
            }, options);
            var corners = ['tl','tr','bl','br'];
            var fr = getNodes();

            // Stop any animations on the corners
            for(var i=0; i<corners.length; i++) {
                jQuery(fr[corners[i]]).stop();
            }

            // Determine if corners were invisible and set start to default corners
            var cornersVisible = jQuery(fr.tl).is(":visible");
            if(!cornersVisible){
                options.duration = conf.duration_def;
                options.easing = conf.easing_def;

                var defNodes = getDefaultNodes();
                for(var i=0; i<corners.length; i++) {
                    var rc = fr[corners[i]];
                    var dc = defNodes[corners[i]];
                    if(!dc) continue;

                    var bb = jQuery(dc).offset();
                    rc.style.top = bb.top+'px';
                    rc.style.left = bb.left+'px';
                    rc.style.opacity = 0;
                }
            }

            for(var i=0; i<corners.length; i++) {
                fr[corners[i]].style.display='block';
                var animation_options = {
                    top: options[corners[i]].y,
                    left: options[corners[i]].x,
                    opacity: options.opacity,
                    width: options.cornerwidth + 'px',
                    height: options.cornerheight + 'px'
                };
                jQuery(fr[corners[i]]).animate(animation_options, options.duration ,options.easing);
            }
        }
        function input_focus(){
            clearTimeout(fadeTimer);                     
            var fr = getNodes();
            var jinp = jQuery(this);
            var bb = jinp.offset();
            var conf = config;
            var cornerspace = conf.cornerspace;
            var widthpercent = conf.widthpercent;
            var heightpercent = conf.heightpercent;
            var cornerwidth = Math.floor(jinp.outerWidth()*widthpercent);
            var cornerheight = Math.floor(jinp.outerHeight()*heightpercent);
            // Set default something
            if(!cornerheight) cornerheight = parseInt( jQuery(fr.tl).css('height'), 10);
            if(!cornerwidth) cornerwidth = parseInt( jQuery(fr.tl).css('width'), 10);
            var options={
                tl:{ x:bb.left + conf.offset_tlx,
                     y:bb.top + conf.offset_tlx },
                tr:{ x:bb.left + jinp.outerWidth() + conf.offset_trx -cornerwidth,
                     y:bb.top + conf.offset_try },
                bl:{ x:bb.left + conf.offset_blx,
                     y:bb.top + jinp.outerHeight() + conf.offset_bly -cornerheight },
                br:{ x:bb.left + jinp.outerWidth() + conf.offset_brx -cornerwidth,
                     y:bb.top + jinp.outerHeight() + conf.offset_bry -cornerheight },
                cornerwidth : cornerwidth,
                cornerheight : cornerheight
            };
            setFocusRectLocation(options);
        }

        function input_blur() {
            var timeout = config.fadeOutTimeout;
            fadeTimer = setTimeout(function(){
                var fr = getNodes();
                var fadeOutDuration = config.fadeOutDuration;
                jQuery(fr.tl).fadeOut(fadeOutDuration);
                jQuery(fr.tr).fadeOut(fadeOutDuration);
                jQuery(fr.bl).fadeOut(fadeOutDuration);
                jQuery(fr.br).fadeOut(fadeOutDuration);
            },timeout);
        }
        function init(myConfig){
            var myConfig = jQuery.extend(default_config, myConfig);
            config = myConfig;

            var inputs = jQuery(config.focusables);
            for(var i=0; i<inputs.length; i++) {
                var input=inputs[i];
                jQuery(input).bind("focus", input_focus);
                jQuery(input).bind("blur", input_blur);
            }
        }
        init(settings);
    }
    jQuery(function(){jQuery.fn.followFocus( window.followFocusSettings )});
}

