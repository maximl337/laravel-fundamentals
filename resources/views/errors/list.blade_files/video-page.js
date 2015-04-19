/* videojs-hotkeys v0.2.3 - https://github.com/ctd1500/videojs-hotkeys */
!function(a,b){"use strict";a.videojs_hotkeys={version:"0.2.3"};var c=function(a){var b=this,c={volumeStep:.1,seekStep:5,enableMute:!0,enableFullscreen:!0};a=a||{},b.el().hasAttribute("tabIndex")||b.el().setAttribute("tabIndex","-1"),b.on("play",function(){var a=b.el().querySelector(".iframeblocker");a&&""==a.style.display&&(a.style.display="block",a.style.bottom="39px")});var d=function(d){var e=a.volumeStep||c.volumeStep,f=a.seekStep||c.seekStep,g=a.enableMute||c.enableMute,h=a.enableFullscreen||c.enableFullscreen;if(b.controls()){var i=document.activeElement;if(i==b.el()||i==b.el().querySelector(".vjs-tech")||i==b.el().querySelector(".vjs-control-bar")||i==b.el().querySelector(".iframeblocker"))if(32===d.which)d.preventDefault(),b.paused()?b.play():b.pause();else if(37===d.which){d.preventDefault();var j=b.currentTime()-f;b.currentTime()<=f&&(j=0),b.currentTime(j)}else 39===d.which?(d.preventDefault(),b.currentTime(b.currentTime()+f)):40===d.which?(d.preventDefault(),b.volume(b.volume()-e)):38===d.which?(d.preventDefault(),b.volume(b.volume()+e)):77===d.which?g&&b.muted(b.muted()?!1:!0):70===d.which&&h&&(b.isFullscreen()?b.exitFullscreen():b.requestFullscreen())}},e=function(d){var e=a.enableFullscreen||c.enableFullscreen;if(b.controls()){var f=d.relatedTarget||d.toElement||document.activeElement;(f==b.el()||f==b.el().querySelector(".vjs-tech")||f==b.el().querySelector(".iframeblocker"))&&e&&(b.isFullscreen()?b.exitFullscreen():b.requestFullscreen())}};return b.on("keydown",d),b.on("dblclick",e),this};b.plugin("hotkeys",c)}(window,window.videojs);
//# sourceMappingURL=videojs.hotkeys.min.js.map

(function() {

    // Add video player plugins.
    var video = vjs('laracasts-video', {
        plugins: {
          resolutions: true
        }
    });

    // Register video player hotkeys.
    video.ready(function() {
        this.hotkeys({
            volumeStep: 0.1,
            seekStep: 10,
            enableMute: true,
            enableFullscreen: true
        });
    });

    // When the video finishes playing, we will
    // automatically make the lesson be marked as completed.
    // We'll also uncheck the "watch later" button.
    $(window).on('load', function() {
        var myPlayer = videojs('laracasts-video');

        myPlayer.on('play', function() {
            $('#laracasts-video').focus();
        });

        myPlayer.on('ended', function() {
            var sidebar = $('.video-sidebar__buttons');
            var watchLaterButton = sidebar.find('button.lesson-watch-later-button');
            var completeLessonButton = sidebar.find('button.lesson-completed-checkbox');

            // If the Watch Later icon was enabled, we should remove it.
            if (watchLaterButton.hasClass('on')) {
                watchLaterButton.trigger('click');
            }

            // If the completed button is not already enabled,
            // we'll do it for the user.
            if ( ! completeLessonButton.hasClass('on')) {
                completeLessonButton.trigger('click');
            }
        });
    });

    // When the "Movie-Mode" button is pressed, toggle the full-screen class.
    $('#js-toggle-video-width button').on('click', function(e) {
        $(this).toggleClass('on');
        $('body').toggleClass('movie-mode');

        e.preventDefault();
    });

})();