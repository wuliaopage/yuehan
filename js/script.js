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
        function getCookie(c_info){
            if (document.cookie.length>0){ 
            c_start=document.cookie.indexOf(c_info + "=")
            if (c_start!=-1){ 
            c_start=c_start + c_info.length+1 
            c_end=document.cookie.indexOf(";",c_start)
            if (c_end==-1) {
            c_end=document.cookie.length;
            }
            return unescape(document.cookie.substring(c_start,c_end));
            } 
            }
            return null;
           }
           function removeCookie(name) { 
               var cval=getCookie(name); 
               if(cval!=null){
                  setCookie(name,cval,-1);
            }
           } 
           function setCookie(c_info,value,expiredays){
               var exdate=new Date()
               exdate.setDate(exdate.getDate()+expiredays)
               //请将domain改成你的域名
               document.cookie=c_info+ "=" +escape(value)+";path=/;domain=.yuehanliu.com"+
               ((typeof expiredays=="undefined") ? "" : "; expires="+exdate.toGMTString());
           }
           function checkCookie(){
            $("#comment-author-info input[type='text']").each(function(){
            var val = getCookie(this.name);
            this.value = val;
            });
            
           }
           function goSubmit(){
            $("#comment-author-info input[type='text']").each(function(){
            removeCookie(this.name);
            setCookie(this.name,this.value,365);
            });
           }
           function removeck(){
            $("#comment-author-info input[type='text']").each(function(){
            removeCookie(this.name);
            }); 
           }
           $(document).ready(function(){
               checkCookie();
           $("#respond #submit").click(function(){
               goSubmit();
               });
           $("#respond #reset").click(function(){
               removeck();
               });
           });
        // ready function.

    }
);