document.addEventListener('DOMContentLoaded', () => {

    let quantity = document.querySelector('input[name="quantity"]');
    let checkLicense = document.querySelectorAll('.combobox__item-label');
    let selectBox = document.querySelector('.form__footer-select>span');
    let totalBox = document.querySelector('.form__footer-total');
    let totalResult = totalBox.querySelector('span');
    let submitBtn = document.querySelector('.form__footer-btn');

    submitBtn.setAttribute('disabled', '');

    checkLicense.forEach(item => {
        item.addEventListener('change', (e) => {
            let idLicense = +item.getAttribute('data-id');
            let costLicense = +item.getAttribute('data-cost');
            let quantityVal = quantity.getAttribute('value');

            totalBox.setAttribute('data-cost', costLicense);
            selectBox.innerText = '#' + idLicense;
            calcCost(totalResult, costLicense, quantityVal);
            submitBtn.removeAttribute('disabled');
            submitBtn.classList.add('active');
        });
    });

    quantity.addEventListener('input',  (e) => {
        let costLicense = totalBox.getAttribute('data-cost');
        let quantityVal = event.target.value;

        quantity.setAttribute('value', quantityVal);

        if (costLicense) {
            calcCost(totalResult, costLicense, quantityVal);
        }
    });

    function calcCost(box, cost, count) {
        box.innerText = +cost * +count;
    }
});