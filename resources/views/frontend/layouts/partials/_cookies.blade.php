<div id="barracookies">
    Usamos cookies propias y de terceros que entre otras cosas recogen datos sobre sus hábitos de navegación para
    mostrarle publicidad personalizada y realizar análisis de uso de nuestro sitio.
    <br/>
    Si continúa navegando consideramos que acepta su uso. <a href="javascript:void(0);"
                                                             onclick="var expiration = new Date(); expiration.setTime(expiration.getTime() + (60000*60*24*365)); setCookie('avisocookies','1',expiration,'/');document.getElementById('barracookies').style.display='none';"><b>OK</b></a>
    <a href="http://www.google.com/intl/es-419/policies/technologies/types/" target="_blank">Más información</a> | <a
            href="http://www.agpd.es/portalwebAGPD/canaldocumentacion/publicaciones/common/Guias/Guia_Cookies.pdf"
            target="_blank">Y más</a>
</div>
<!-- Estilo barra CSS -->
<style>#barracookies {
        display: none;
        z-index: 99999;
        position: fixed;
        left: 0px;
        right: 0px;
        bottom: 0px;
        width: 100%;
        min-height: 40px;
        padding: 5px;
        background: #333333;
        color: white;
        line-height: 20px;
        font-family: verdana;
        font-size: 12px;
        text-align: center;
        box-sizing: border-box;
    }

    #barracookies a:nth-child(2) {
        padding: 4px;
        background: #4682B4;
        border-radius: 5px;
        text-decoration: none;
    }

    #barracookies a {
        color: #fff;
        text-decoration: none;
    }</style>
<!-- Gestión de cookies-->
<script type='text/javascript'>function setCookie(name, value, expires, path, domain, secure) {
        document.cookie = name + "=" + escape(value) + ((expires == null) ? "" : "; expires=" + expires.toGMTString()) + ((path == null) ? "" : "; path=" + path) + ((domain == null) ? "" : "; domain=" + domain) + ((secure == null) ? "" : "; secure")
    }
    function getCookie(name) {
        var cname = name + "=";
        var dc = document.cookie;
        if (dc.length > 0) {
            begin = dc.indexOf(cname);
            if (begin != -1) {
                begin += cname.length;
                end = dc.indexOf(";", begin);
                if (end == -1)end = dc.length;
                return unescape(dc.substring(begin, end))
            }
        }
        return null
    }
    function delCookie(name, path, domain) {
        if (getCookie(name)) {
            document.cookie = name + "=" + ((path == null) ? "" : "; path=" + path) + ((domain == null) ? "" : "; domain=" + domain) + "; expires=Thu, 01-Jan-70 00:00:01 GMT"
        }
    }</script>
<!-- Gestión barra aviso cookies -->
<script type='text/javascript'>
    var comprobar = getCookie("avisocookies");
    if (comprobar != null) {
    }
    else {
        var expiration = new Date();
        expiration.setTime(expiration.getTime() + (60000 * 60 * 24 * 365));
        setCookie("avisocookies", "1", expiration);
        document.getElementById("barracookies").style.display = "block";
    }
</script>