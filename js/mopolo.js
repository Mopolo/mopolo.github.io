$(document).ready(function() {
    $('.image-link').magnificPopup({
        type:'image',

        zoom: {
            enabled: true,
            duration: 300,
            easing: 'ease-in-out'
        }
    });

    $('.ajax-popup-link').magnificPopup({
        type: 'ajax'
    });

    var today = new Date();
    var birth = new Date(1990, 7, 6, 0, 0, 0, 1);

    var age = today.getFullYear() - birth.getFullYear();

    if ((today.getMonth() < birth.getMonth()) || (today.getDate() < birth.getDate())) {
        age--;
    }

    $('#age').html(age);

    function duckface(face) {
        $('#duckface').html(face);
    }

    $('#duck').click(function() {
        setTimeout(function() { duckface('>'); }, 200);
        setTimeout(function() { duckface('-'); }, 500);
        setTimeout(function() { duckface('>'); }, 800);
        setTimeout(function() { duckface('-'); }, 1100);
    });
});

$('#zooby').hover(
    function() {
        var a = 'il.';
        var b = 'nath';
        var c = 'boir';
        var d = '@gma';
        var e = 'an.';
        var f = 'c';
        var g = 'om';
        var h = 'on';
        $(this).html('<a href="mailto:'+b+e+c+h+d+a+f+g+'">'+b+e+c+h+d+a+f+g+'</a>');
    },
    function() {
        $(this).html('email');
    }
);

function playunitygame(gameFile, width, height) {
    var gameDiv = $('#game-container');

    gameDiv.hide();
    var html = '<div id="unityPlayer">';
    html += '<div class="missing">';
    html += '<a href="http://unity3d.com/webplayer/" title="Unity Web Player. Install now!">';
    html += '<img alt="Unity Web Player. Install now!" src="http://webplayer.unity3d.com/installation/getunity.png" width="193" height="63" />';
    html += '</a>';
    html += '</div>';
    html += '<div class="broken">';
    html += '<a href="http://unity3d.com/webplayer/" title="Unity Web Player. Install now! Restart your browser after install.">';
    html += '<img alt="Unity Web Player. Install now! Restart your browser after install." src="http://webplayer.unity3d.com/installation/getunityrestart.png" width="193" height="63" />';
    html += '</a>';
    html += '</div>';
    html += '</div>';
    gameDiv.html(html);
    gameDiv.show();

    var config = {
        width: width,
        height: height,
        params: { enableDebugging:"0" }

    };
    config.params["disableContextMenu"] = true;
    var u = new UnityObject2(config);

    jQuery(function() {

        var $missingScreen = jQuery("#unityPlayer").find(".missing");
        var $brokenScreen = jQuery("#unityPlayer").find(".broken");
        $missingScreen.hide();
        $brokenScreen.hide();

        u.observeProgress(function (progress) {
            switch(progress.pluginStatus) {
                case "broken":
                    $brokenScreen.find("a").click(function (e) {
                        e.stopPropagation();
                        e.preventDefault();
                        u.installPlugin();
                        return false;
                    });
                    $brokenScreen.show();
                    break;
                case "missing":
                    $missingScreen.find("a").click(function (e) {
                        e.stopPropagation();
                        e.preventDefault();
                        u.installPlugin();
                        return false;
                    });
                    $missingScreen.show();
                    break;
                case "installed":
                    $missingScreen.remove();
                    break;
                case "first":
                    break;
            }
        });
        u.initPlugin(jQuery("#unityPlayer")[0], gameFile);
    });
}

(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-2986016-7', 'mopolo.fr');
ga('send', 'pageview');
