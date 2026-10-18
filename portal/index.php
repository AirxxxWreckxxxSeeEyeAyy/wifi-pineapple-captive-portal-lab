<?php
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
$destination = 'http://172.16.42.1/'; // Fixed lab destination; edit explicitly for another authorized lab.
?>
<!doctype html>
<html lang="en">
<head>
<!-- SECURITY-SIMULATION | artifact: CAPTIVE-LAB-0.1.0-alpha.1
Purpose: authorized commercial security assessment and educational use only.
Requires written scope and authorization. No real credentials collected.
This marker does not establish consent or legal compliance. -->
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Retro Lab Search</title>
<style>
body{margin:0;background:#fff;color:#111;font:14px Arial,Helvetica,sans-serif;text-align:center}
.banner{padding:8px;background:#fff1c7;border-bottom:1px solid #c9af5b;font-size:12px;font-weight:bold}
main{width:min(680px,calc(100% - 24px));margin:75px auto 0}
h1{margin:0 0 8px;font-size:clamp(46px,9vw,72px);letter-spacing:-4px;line-height:1}
.b{color:#3366cc}.r{color:#cc3333}.y{color:#e5ad27}.g{color:#339966}
.era{margin:0 0 25px;color:#555;font-size:12px}
.box{padding:17px 14px;background:#e8eefa;border:1px solid #c6d4ef}
label{display:block;margin-bottom:8px;font-size:16px}
input[type=search]{display:block;width:min(470px,100%);height:29px;margin:0 auto 11px;padding:3px 6px;border:1px solid #777;background:#fff;color:#111;font:16px Arial,Helvetica,sans-serif}
button{margin:2px 3px;padding:6px 12px;border:1px solid #777;border-radius:2px;background:#eee;color:#111;font:13px Arial,Helvetica,sans-serif;cursor:pointer}
button:focus-visible,input:focus-visible{outline:2px solid #3366cc;outline-offset:2px}
.links{display:grid;grid-template-columns:repeat(3,1fr);gap:3px;margin-top:3px}
.links div{padding:13px 8px;background:#f3f6fc;border:1px solid #dbe3f4;line-height:1.5}
.links strong{display:block;color:#163b7b}.links span{color:#444;font-size:12px}
#result{min-height:25px;margin:17px 0 0;color:#245b36;font-weight:bold}
.note{max-width:540px;margin:22px auto;color:#555;font-size:12px;line-height:1.5}
footer{margin:65px 0 20px;color:#555;font-size:11px}
@media(max-width:520px){main{margin-top:45px}.links{grid-template-columns:1fr}footer{margin-top:35px}}
</style>
</head>
<body>
<div class="banner">OFFLINE WI-FI TRAINING PAGE — FICTIONAL SEARCH DEMO — NO SIGN-IN</div>
<main>
<h1 aria-label="Retro Lab Search"><span class="b">R</span><span class="r">e</span><span class="y">t</span><span class="b">r</span><span class="g">o</span> <span class="r">L</span><span class="y">a</span><span class="b">b</span></h1>
<p class="era">A late-1990s-style search landing page for a closed-loop lesson</p>
<div class="box"><form id="practice" autocomplete="off"><label for="q">Search the pretend web</label><input id="q" type="search" maxlength="80" placeholder="Try: Wi-Fi lab"><button type="submit">Retro Lab Search</button><button type="button" id="sample">Try an example</button></form></div>
<div class="links"><div><strong>Practice Search</strong><span>Local confirmation only.<br>No search request leaves this page.</span></div><div><strong>Old Web Style</strong><span>Classic colors and a simple layout.</span></div><div><strong>Lab Only</strong><span>For one owned test phone<br>on an isolated network.</span></div></div>
<p id="result" role="status" aria-live="polite"></p>
<p class="note">This is an original training page, not Google or a real search service. Do not enter passwords or personal information. Search text is neither transmitted nor saved.</p>
<form method="post" action="/captiveportal/index.php"><input type="hidden" name="target" value="<?=htmlspecialchars($destination, ENT_QUOTES, 'UTF-8')?>"><button type="submit">Continue to lab Wi-Fi</button></form>
</main>
<footer>© Retro Lab · Fictional Wi-Fi practice page</footer>
<script>
var q=document.getElementById('q'),result=document.getElementById('result');
document.getElementById('practice').addEventListener('submit',function(e){e.preventDefault();result.textContent=q.value.trim()?'Practice complete. Nothing was sent or saved.':'Enter a practice word to continue.';});
document.getElementById('sample').addEventListener('click',function(){q.value='Wi-Fi lab';result.textContent='Example ready. Select Retro Lab Search.';q.focus();});
</script>
</body>
</html>
