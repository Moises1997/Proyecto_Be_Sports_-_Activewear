var overlayOn=false,visibilityCache=[],pngIds=["sb-nav-close","sb-nav-next","sb-nav-play","sb-nav-pause","sb-nav-previous"],container,overlay,wrapper,doWindowResize=true;function animate(c,m,j,h,n){var a=(m=="opacity"),i=a?S.setOpacity:function(o,p){o.style[m]=""+p+"px"};if(h==0||(!a&&!S.options.animate)||(a&&!S.options.animateFade)){i(c,j);if(n){n()}return}var k=parseFloat(S.getStyle(c,m))||0;var l=j-k;if(l==0){if(n){n()}return}h*=1000;var d=now(),g=S.ease,f=d+h,e;var b=setInterval(function(){e=now();if(e>=f){clearInterval(b);b=null;i(c,j);if(n){n()}}else{i(c,k+g((e-d)/h)*l)}},10)}function setSize(){container.style.height=S.getWindowSize("Height")+"px";container.style.width=S.getWindowSize("Width")+"px"}function setPosition(){container.style.top=document.documentElement.scrollTop+"px";container.style.left=document.documentElement.scrollLeft+"px"}function toggleTroubleElements(a){if(a){each(visibilityCache,function(b,c){c[0].style.visibility=c[1]||""})}else{visibilityCache=[];each(S.options.troubleElements,function(c,b){each(document.getElementsByTagName(b),function(d,e){visibilityCache.push([e,e.style.visibility]);e.style.visibility="hidden"})})}}function toggleNav(c,a){var b=get("sb-nav-"+c);if(b){b.style.display=a?"":"none"}}function toggleLoading(a,f){var e=get("sb-loading"),c=S.getCurrent().player,d=(c=="img"||c=="html");if(a){S.setOpacity(e,0);e.style.display="block";var b=function(){S.clearOpacity(e);if(f){f()}};if(d){animate(e,"opacity",1,S.options.fadeDuration,b)}else{b()}}else{var b=function(){e.style.display="none";S.clearOpacity(e);if(f){f()}};if(d){animate(e,"opacity",0,S.options.fadeDuration,b)}else{b()}}}function buildBars(m){var f=S.getCurrent();get("sb-title-inner").innerHTML=f.title||"";var n,j,b,o,k;if(S.options.displayNav){n=true;var l=S.gallery.length;if(l>1){if(S.options.continuous){j=k=true}else{j=(l-1)>S.current;k=S.current>0}}if(S.options.slideshowDelay>0&&S.hasNext()){o=!S.isPaused();b=!o}}else{n=j=b=o=k=false}toggleNav("close",n);toggleNav("next",j);toggleNav("play",b);toggleNav("pause",o);toggleNav("previous",k);var a="";if(S.options.displayCounter&&S.gallery.length>1){var l=S.gallery.length;if(S.options.counterType=="skip"){var e=0,d=l,c=parseInt(S.options.counterLimit)||0;if(c<l&&c>2){var g=Math.floor(c/2);e=S.current-g;if(e<0){e+=l}d=S.current+(c-g);if(d>l){d-=l}}while(e!=d){if(e==l){e=0}a+='<a onclick="Shadowbox.change('+e+');"';if(e==S.current){a+=' class="sb-counter-current"'}a+=">"+(++e)+"</a>"}}else{a=[S.current+1,S.lang.of,l].join(" ")}}get("sb-counter").innerHTML=a;m()}function showBars(d){var a=get("sb-title-inner"),c=get("sb-info-inner"),b=0.35;a.style.visibility=c.style.visibility="";if(a.innerHTML!=""){animate(a,"marginTop",0,b)}animate(c,"marginTop",0,b,d)}function hideBars(c,i){var g=get("sb-title"),a=get("sb-info"),d=g.offsetHeight,e=a.offsetHeight,f=get("sb-title-inner"),h=get("sb-info-inner"),b=(c?0.35:0);animate(f,"marginTop",d,b);animate(h,"marginTop",e*-1,b,function(){f.style.visibility=h.style.visibility="hidden";i()})}function adjustHeight(a,d,b,f){var e=get("sb-wrapper-inner"),c=(b?S.options.resizeDuration:0);animate(wrapper,"top",d,c);animate(e,"height",a,c,f)}function adjustWidth(a,d,b,e){var c=(b?S.options.resizeDuration:0);animate(wrapper,"left",d,c);animate(wrapper,"width",a,c,e)}function setDimensions(i,c){var e=get("sb-body-inner"),i=parseInt(i),c=parseInt(c),b=wrapper.offsetHeight-e.offsetHeight,a=wrapper.offsetWidth-e.offsetWidth,g=overlay.offsetHeight,h=overlay.offsetWidth,f=parseInt(S.options.viewportPadding)||20,d=(S.player&&S.options.handleOversize!="drag");return S.setDimensions(i,c,g,h,b,a,f,d)}var K={};K.markup='<div id="sb-container"><div id="sb-overlay"></div><div id="sb-wrapper"><div id="sb-title"><div id="sb-title-inner"></div></div><div id="sb-wrapper-inner"><div id="sb-body"><div id="sb-body-inner"></div><div id="sb-loading"><div id="sb-loading-inner"><span>{loading}</span></div></div></div></div><div id="sb-info"><div id="sb-info-inner"><div id="sb-counter"></div><div id="sb-nav"><a id="sb-nav-close" title="{close}" onclick="Shadowbox.close()"></a><a id="sb-nav-next" title="{next}" onclick="Shadowbox.next()"></a><a id="sb-nav-play" title="{play}" onclick="Shadowbox.play()"></a><a id="sb-nav-pause" title="{pause}" onclick="Shadowbox.pause()"></a><a id="sb-nav-previous" title="{previous}" onclick="Shadowbox.previous()"></a></div></div></div></div></div>';K.options={animSequence:"sync",counterLimit:10,counterType:"default",displayCounter:true,displayNav:true,fadeDuration:0.35,initialHeight:160,initialWidth:320,modal:false,overlayColor:"#000",overlayOpacity:0.5,resizeDuration:0.35,showOverlay:true,troubleElements:["select","object","embed","canvas"]};K.init=function(){S.appendHTML(document.body,sprintf(K.markup,S.lang));K.body=get("sb-body-inner");container=get("sb-container");overlay=get("sb-overlay");wrapper=get("sb-wrapper");if(!supportsFixed){container.style.position="absolute"}if(!supportsOpacity){var c,a,b=/url\("(.*\.png)"\)/;each(pngIds,function(e,f){c=get(f);if(c){a=S.getStyle(c,"backgroundImage").match(b);if(a){c.style.backgroundImage="none";c.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled=true,src="+a[1]+",sizingMethod=scale);"}}})}var d;addEvent(window,"resize",function(){if(d){clearTimeout(d);d=null}if(open){d=setTimeout(K.onWindowResize,10)}})};K.onOpen=function(a,c){doWindowResize=false;container.style.display="block";setSize();var b=setDimensions(S.options.initialHeight,S.options.initialWidth);adjustHeight(b.innerHeight,b.top);adjustWidth(b.width,b.left);if(S.options.showOverlay){overlay.style.backgroundColor=S.options.overlayColor;S.setOpacity(overlay,0);if(!S.options.modal){addEvent(overlay,"click",S.close)}overlayOn=true}if(!supportsFixed){setPosition();addEvent(window,"scroll",setPosition)}toggleTroubleElements();container.style.visibility="visible";if(overlayOn){animate(overlay,"opacity",S.options.overlayOpacity,S.options.fadeDuration,c)}else{c()}};K.onLoad=function(b,a){toggleLoading(true);while(K.body.firstChild){remove(K.body.firstChild)}hideBars(b,function(){if(!open){return}if(!b){wrapper.style.visibility="visible"}buildBars(a)})};K.onReady=function(d){if(!open){return}var b=S.player,c=setDimensions(b.height,b.width);var a=function(){showBars(d)};switch(S.options.animSequence){case"hw":adjustHeight(c.innerHeight,c.top,true,function(){adjustWidth(c.width,c.left,true,a)});break;case"wh":adjustWidth(c.width,c.left,true,function(){adjustHeight(c.innerHeight,c.top,true,a)});break;default:adjustWidth(c.width,c.left,true);adjustHeight(c.innerHeight,c.top,true,a)}};K.onShow=function(a){toggleLoading(false,a);doWindowResize=true};K.onClose=function(){if(!supportsFixed){removeEvent(window,"scroll",setPosition)}removeEvent(overlay,"click",S.close);wrapper.style.visibility="hidden";var a=function(){container.style.visibility="hidden";container.style.display="none";toggleTroubleElements(true)};if(overlayOn){animate(overlay,"opacity",0,S.options.fadeDuration,a)}else{a()}};K.onPlay=function(){toggleNav("play",false);toggleNav("pause",true)};K.onPause=function(){toggleNav("pause",false);toggleNav("play",true)};K.onWindowResize=function(){if(!doWindowResize){return}setSize();var a=S.player,b=setDimensions(a.height,a.width);adjustWidth(b.width,b.left);adjustHeight(b.innerHeight,b.top);if(a.onWindowResize){a.onWindowResize()}};S.skin=K;
