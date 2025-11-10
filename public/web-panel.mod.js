"use strict";

const WPM = (function () {

    const $_updateOptions = function($combo, options) 
    {
        while ($combo.options.length > 0) { $combo.remove(0); }
        options.unshift({id: 0, text: 'Seleccione'});
        options.forEach(function (opt) {
            const newOption = document.createElement('option');
            newOption.value = (opt.id) === 0 ? '' : opt.id.toString();
            newOption.text = opt.text;
            $combo.appendChild(newOption);
        });
        $combo.value = '';
        $combo.dispatchEvent(new Event('change'));
    }

    const $_scrollToForm = function () 
    {
        if (!window.matchMedia('(max-width: 599px)').matches) { return; }
        document.getElementById('wpi-form-column').scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        })
    }

    const $_toggleVisibility = function (targetClass, show) {
        const directiva = `.${targetClass}${!show ? ':not(.wpi-hidden)' : '.wpi-hidden'}`;
        document.querySelectorAll(directiva).forEach(function (_e) {
            _e.classList.toggle('wpi-hidden');
        });
    }

    const $_showAndHide = function (type,conf) {
        $_toggleVisibility('rw-wpi-empresa', type === 'empresa');
        $_toggleVisibility('rw-wpi-local', type === 'local');    
        $_toggleVisibility('rw-wpi-otros', type === 'otros');
        $_toggleVisibility('base-wpi-message', type === null);
        if (type === 'otros') {
            document.querySelector('.alias-otro-servicio-wpi').innerText = conf.name;
            document.querySelector('.alias-otro-servicio-wpi').style.color = conf.color;
        } else {
            document.querySelector('.alias-otro-servicio-wpi').innerText = '';
        }


        
        // ${type === null ? ':not([disabled])' : '[disabled]'}
        document.querySelectorAll(`.btn-submit-form`).forEach(function (_btn) {
            if (type === null) {
                _btn.setAttribute('disabled', true);
            } else {
                _btn.removeAttribute('disabled');
            }
        });
    }

    const $_updateSeletcts = function (type, list) {
        $_updateOptions(document.getElementById('wpi-idempresa'), []);
        $_updateOptions(document.getElementById('wpi-idlocal'), []);
        if (['empresa', 'local'].includes(type)) {
            $_updateOptions(document.getElementById(`wpi-id${type}`), list);
        }
    }


    let timeoutId = null;

    const showAllServices = function () {
        document.querySelectorAll('.service-card-wpi.wpi-hidden').forEach(function (c) {
            c.classList.remove('wpi-hidden');
        });
    };


    const _ = {
        setFormConfig: function (configB64) {
            const conf = configB64 === null ? null : JSON.parse(atob(configB64));
            if (parseInt(conf?.id || 0) > 0)
            {
                document.getElementById('wpi-idservicio').value = conf.id;
                $_scrollToForm();
                document.querySelector('#wpi-form-title > .wpi-outlet').innerHTML = `Ingreso a: <span style="color: ${conf.color};">${conf.name}</span>`;
                $_showAndHide(conf?.targets?.type || null, conf);
                $_updateSeletcts(conf.targets.type, conf.targets.list);
                return;
            }
            document.getElementById('wpi-idservicio').value = '';
            $_showAndHide(null);
            document.querySelector('#wpi-form-title > .wpi-outlet').innerText = 'Seleccione un servicio';
            $_updateSeletcts(null, []);
            window.scrollTo({ top: 0, behavior: 'smooth' });
        },
        buscarServicio: function (criterio) {
            if (timeoutId) {
                clearTimeout(timeoutId);
            }
            const criterioMin = criterio.trim().toLowerCase();
            timeoutId = setTimeout(function () {
                showAllServices(); 
                if (criterio.trim() === '') { return; }
                document.querySelectorAll('.service-card-wpi').forEach(function (c) {
                    if (!c.getAttribute('u-name').includes(criterioMin)) 
                    {
                        c.classList.add('wpi-hidden')
                    }
                });
            }, 180);
        }
    };
    return _;
})();
