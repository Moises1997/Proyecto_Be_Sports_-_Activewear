if(!Array.prototype.indexOf){Array.prototype.indexOf=function(b,c){var a=this.length>>>0;c=c||0;if(c<0){c+=a}for(;c<a;++c){if(c in this&&this[c]===b){return c}}return -1}}function now(){return(new Date).getTime()}function apply(a,c){for(var b in c){a[b]=c[b]}return a}function each(d,e){var b=0,a=d.length;for(var c=d[0];b<a&&e.call(c,b,c)!==false;c=d[++b]){}}function sprintf(b,a){return b.replace(/\{(\w+?)\}/g,function(c,d){return a[d]})}function noop(){}function get(a){return document.getElementById(a)}function remove(a){a.parentNode.removeChild(a)}var supportsOpacity=true,supportsFixed=true;function checkSupport(){var a=document.body,b=document.createElement("div");supportsOpacity=typeof b.style.opacity==="string";b.style.position="fixed";b.style.margin=0;b.style.top="20px";a.appendChild(b,a.firstChild);supportsFixed=b.offsetTop==20;a.removeChild(b)}S.getStyle=(function(){var a=/opacity=([^)]*)/,b=document.defaultView&&document.defaultView.getComputedStyle;return function(f,e){var d;if(!supportsOpacity&&e=="opacity"&&f.currentStyle){d=a.test(f.currentStyle.filter||"")?(parseFloat(RegExp.$1)/100)+"":"";return d===""?"1":d}if(b){var c=b(f,null);if(c){d=c[e]}if(e=="opacity"&&d==""){d="1"}}else{d=f.currentStyle[e]}return d}})();S.appendHTML=function(c,b){if(c.insertAdjacentHTML){c.insertAdjacentHTML("BeforeEnd",b)}else{if(c.lastChild){var a=c.ownerDocument.createRange();a.setStartAfter(c.lastChild);var d=a.createContextualFragment(b);c.appendChild(d)}else{c.innerHTML=b}}};S.getWindowSize=function(a){if(document.compatMode==="CSS1Compat"){return document.documentElement["client"+a]}return document.body["client"+a]};S.setOpacity=function(c,a){var b=c.style;if(supportsOpacity){b.opacity=(a==1?"":a)}else{b.zoom=1;if(a==1){if(typeof b.filter=="string"&&(/alpha/i).test(b.filter)){b.filter=b.filter.replace(/\s*[\w\.]*alpha\([^\)]*\);?/gi,"")}}else{b.filter=(b.filter||"").replace(/\s*[\w\.]*alpha\([^\)]*\)/gi,"")+" alpha(opacity="+(a*100)+")"}}};S.clearOpacity=function(a){S.setOpacity(a,1)};
