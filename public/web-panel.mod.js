"use strict";

const WPM = (function () {


    const _ = {
        setFormConfig: function (configB64) {
            console.log(JSON.parse(atob(configB64)));
        }
    };
    return _;
})();
