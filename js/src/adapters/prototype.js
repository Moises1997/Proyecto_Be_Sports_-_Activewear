var E=Event;function getTarget(a){return E.element(a)}function getPageXY(a){return[E.pointerX(a),E.pointerY(a)]}function preventDefault(a){E.stop(a)}function keyCode(a){return a.keyCode}function addEvent(c,b,a){E.observe(c,b,a)}function removeEvent(c,b,a){E.stopObserving(c,b,a)};
