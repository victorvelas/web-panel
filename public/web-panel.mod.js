"use strict";

const WPM = (function () {

    const $_updateOptions = function($combo, options) 
    {
        while ($combo.options.length > 0) {
            $combo.remove(0);
        }
        console.log(options);
        options.unshift({id: 0, text: 'Seleccione'});
        options.forEach(function (opt) {
            const newOption = document.createElement('option');
            newOption.value = (opt.id) === 0 ? '' : opt.id.toString();
            newOption.text = opt.text;
            $combo.appendChild(newOption);
        });
        $combo.value = '';
        $combo.dispatchEvent(new Event('change'));
        console.log($combo);
    }


    const _ = {
        setFormConfig: function (configB64) {
            const conf = JSON.parse(atob(configB64));
            if (parseInt(conf?.id || 0) > 0)
            {
                if (conf.targets.type !== null) {
                    $_updateOptions(document.getElementById(`wpi-id${conf.targets.type}`), conf.targets.list);
                    $_updateOptions(document.getElementById(`wpi-id${conf.targets.type === 'empresa' ? 'local' : 'empresa'}`), []);
                } else {
                    $_updateOptions(document.getElementById('wpi-idempresa'), []);
                    $_updateOptions(document.getElementById('wpi-idlocal'), []);
                }
                return;
            }

        }
    };
    return _;
})();
