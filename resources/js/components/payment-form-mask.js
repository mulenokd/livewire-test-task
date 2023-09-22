import IMask from 'imask';

window.setupPaymentFormMask = (elementIds = {}) => {
    const defaultElementIds = {
        cardElementId: 'card', expElementId: 'exp', cvcElementId: 'cvc',
        phoneElementId: 'phone', yooElementId: 'yooNumber', phoneReqElementId: 'phoneReq'
    };

    const elements = {
        ...defaultElementIds,
        ...(typeof elementIds !== 'object' ? {} : elementIds)
    };

    const cardElement = document.getElementById(elements.cardElementId);
    if (cardElement) {
        IMask(cardElement, {mask: '0000 0000 0000 0000000'});
    }

    const expElement = document.getElementById(elements.expElementId);
    if (expElement) {
        IMask(expElement, {mask: '00/00'});
    }

    const cvcElement = document.getElementById(elements.cvcElementId);
    if (cvcElement) {
        IMask(document.getElementById('cvc'), {mask: '000'});
    }

    const phoneElement = document.getElementById(elements.phoneElementId);
    if (phoneElement) {
        IMask(phoneElement, {mask: '+{7}(000)000-00-00'});
    }

    const phoneReqElement = document.getElementById(elements.phoneReqElementId);
    if (phoneReqElement) {
        IMask(phoneReqElement, {mask: '+{7}(000)000-00-00'});
    }

    const yooElement = document.getElementById(elements.yooElementId);
    if (yooElement) {
        IMask(yooElement, {mask: '0000 0000 0000 0000'});
    }
}
