/* A polyfill for browsers that don't support ligatures. */
/* The script tag referring to this file must be placed before the ending body tag. */

/* To provide support for elements dynamically added, this script adds
   method 'icomoonLiga' to the window object. You can pass element references to this method.
*/
(function () {
    'use strict';
    function supportsProperty(p) {
        var prefixes = ['Webkit', 'Moz', 'O', 'ms'],
            i,
            div = document.createElement('div'),
            ret = p in div.style;
        if (!ret) {
            p = p.charAt(0).toUpperCase() + p.substr(1);
            for (i = 0; i < prefixes.length; i += 1) {
                ret = prefixes[i] + p in div.style;
                if (ret) {
                    break;
                }
            }
        }
        return ret;
    }
    var icons;
    if (!supportsProperty('fontFeatureSettings')) {
        icons = {
            'emergency': '&#xe907;',
            'diving': '&#xe900;',
            'buceo': '&#xe900;',
            'buceo_cientifico': '&#xe901;',
            'capacitacion': '&#xe902;',
            'training': '&#xe902;',
            'empresa': '&#xe903;',
            'business': '&#xe903;',
            'tools': '&#xe904;',
            'equipos': '&#xe904;',
            'mission': '&#xe905;',
            'mision': '&#xe905;',
            'vision': '&#xe906;',
            'google-plus': '&#xea8b;',
            'brand5': '&#xea8b;',
            'hangouts': '&#xea8e;',
            'brand8': '&#xea8e;',
            'google-drive': '&#xea8f;',
            'brand9': '&#xea8f;',
            'facebook': '&#xea90;',
            'brand10': '&#xea90;',
            'instagram': '&#xea92;',
            'brand12': '&#xea92;',
            'whatsapp': '&#xea93;',
            'brand13': '&#xea93;',
            'telegram': '&#xea95;',
            'brand15': '&#xea95;',
            'twitter': '&#xea96;',
            'brand16': '&#xea96;',
            'youtube': '&#xea9d;',
            'brand21': '&#xea9d;',
            'youtube2': '&#xea9e;',
            'brand22': '&#xea9e;',
          '0': 0
        };
        delete icons['0'];
        window.icomoonLiga = function (els) {
            var classes,
                el,
                i,
                innerHTML,
                key;
            els = els || document.getElementsByTagName('*');
            if (!els.length) {
                els = [els];
            }
            for (i = 0; ; i += 1) {
                el = els[i];
                if (!el) {
                    break;
                }
                classes = el.className;
                if (/icon-/.test(classes)) {
                    innerHTML = el.innerHTML;
                    if (innerHTML && innerHTML.length > 1) {
                        for (key in icons) {
                            if (icons.hasOwnProperty(key)) {
                                innerHTML = innerHTML.replace(new RegExp(key, 'g'), icons[key]);
                            }
                        }
                        el.innerHTML = innerHTML;
                    }
                }
            }
        };
        window.icomoonLiga();
    }
}());
