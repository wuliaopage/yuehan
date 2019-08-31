// declaraction of document.ready() function.
(function () {
    var ie = !!(window.attachEvent && !window.opera);
    var wk = /webkit\/(\d+)/i.test(navigator.userAgent) && (RegExp.$1 < 525);
    var fn = [];
    var run = function () {
        for (var i = 0; i < fn.length; i++) fn[i]();
    };
    var d = document;
    d.ready = function (f) {
        if (!ie && !wk && d.addEventListener)
            return d.addEventListener('DOMContentLoaded', f, false);
        if (fn.push(f) > 1) return;
        if (ie)
            (function () {
                try {
                    d.documentElement.doScroll('left');
                    run();
                } catch (err) {
                    setTimeout(arguments.callee, 0);
                }
            })();
        else if (wk)
            var t = setInterval(function () {
                if (/^(loaded|complete)$/.test(d.readyState))
                    clearInterval(t), run();
            }, 0);
    };
})();


document.ready(
    // toggleTheme function.
    // this script shouldn't be changed.
    function () {
        var _Blog = window._Blog || {};
        const currentTheme = window.localStorage && window.localStorage.getItem('theme');
        const isDark = currentTheme === 'dark';
        if (isDark) {
            document.getElementById("switch_default").checked = true;
            // mobile
            document.getElementById("mobile-toggle-theme").innerText = "· Dark"
        } else {
            document.getElementById("switch_default").checked = false;
            // mobile
            document.getElementById("mobile-toggle-theme").innerText = "· Dark"
        }
        
        const currentComment = window.localStorage && window.localStorage.getItem('comment');
        const isHide = currentComment === 'hide';
        var toggleMenu = document.getElementsByClassName("comments-area")[0];
        if(toggleMenu)
        {
            console.log('fuck')
            if (isHide) {
                document.getElementById("comment_default").checked = true;
                toggleMenu.classList.remove("comment-hide");  
                console.log('YH')
            
            } else {
                document.getElementById("comment_default").checked = false;
                toggleMenu.classList.add("comment-hide");
                console.log('L')
            }
        }

        _Blog.toggleTheme = function () {
            if (isDark) {
                document.getElementsByTagName('body')[0].classList.add('dark-theme');
                // mobile
                document.getElementById("mobile-toggle-theme").innerText = "· Dark"
            } else {
                document.getElementsByTagName('body')[0].classList.remove('dark-theme');
                // mobile
                document.getElementById("mobile-toggle-theme").innerText = "· Light"
            }

            document.getElementsByClassName('toggleBtn')[0].addEventListener('click', () => {
                if (document.getElementsByTagName('body')[0].classList.contains('dark-theme')) {
                    document.getElementsByTagName('body')[0].classList.remove('dark-theme');
                } else {
                    document.getElementsByTagName('body')[0].classList.add('dark-theme');
                }
                window.localStorage &&
                window.localStorage.setItem('theme', document.body.classList.contains('dark-theme') ? 'dark' : 'light',)
            })
            var cmdBtn=document.getElementsByClassName('commentToggleBtn')[0]
            if(cmdBtn)
            {
                cmdBtn.addEventListener('click', () => {
                var toggleMenu = document.getElementsByClassName("comments-area")[0];
                if(toggleMenu.classList.contains("comment-hide")){
                    toggleMenu.classList.remove("comment-hide")                  
                }else{
                    toggleMenu.classList.add("comment-hide")  
                }
                    window.localStorage &&
                    window.localStorage.setItem('comment', toggleMenu.classList.contains('comment-hide') ? 'hide' : 'show',)
                })

                
                            }
            // moblie
            document.getElementById('mobile-toggle-theme').addEventListener('click', () => {
                if (document.getElementsByTagName('body')[0].classList.contains('dark-theme')) {
                    document.getElementsByTagName('body')[0].classList.remove('dark-theme');
                    // mobile
                    document.getElementById("mobile-toggle-theme").innerText = "· Light"

                } else {
                    document.getElementsByTagName('body')[0].classList.add('dark-theme');
                    // mobile
                    document.getElementById("mobile-toggle-theme").innerText = "· Dark"
                }
                window.localStorage &&
                window.localStorage.setItem('theme', document.body.classList.contains('dark-theme') ? 'dark' : 'light',)
            })
        };
        _Blog.toggleTheme();
        
        // ready function.

    }
);