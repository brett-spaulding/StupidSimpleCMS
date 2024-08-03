import './bootstrap';
import 'htmx.org';
import jQuery from 'jquery';
window.$ = jQuery;

// Autofiller for page slugs
$('.slug-autofill').on('keypress', (e) => {
    let slugInput = $('input[name="slug"]');
    // let key = e.which;
    let key = e.which;
    let keyValue = String.fromCharCode(key).toLowerCase();
    if (keyValue === ' ') {
        keyValue = '-';
    } else if ( !/^[a-zA-Z0-9]+$/.test(keyValue)) {
        keyValue = '';
    }
    slugInput.val(slugInput.val() + keyValue);
})
// Follow backspace for values, too
$('.slug-autofill').on('keydown', (e) => {
    let slugInput = $('input[name="slug"]');
    let slugVal = slugInput.val();
    let key = e.which;
    if (key === 8 && slugVal) {
        slugInput.val(slugVal.slice(0, -1));
    }
})
