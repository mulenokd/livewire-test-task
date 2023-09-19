import IMask from 'imask';

window.setupPaymentFormMask = (elementIds = {}) => {
    const defaultElementIds = {cardElementId: 'card', expElementId: 'exp', cvcElementId: 'cvc'};

    const elements = {
        ...defaultElementIds,
        ...(typeof elementIds !== 'object' ? {} : elementIds)
    };

    const cardElement = document.getElementById(elements.cardElementId);
    if (cardElement) {
        IMask(cardElement, { mask: '0000 0000 0000 0000000' });
    }

    const expElement = document.getElementById(elements.expElementId);
    if (expElement) {
        IMask(expElement, { mask: '00/00' });
    }

    const cvcElement = document.getElementById(elements.cvcElementId);
    if (cvcElement) {
        IMask(document.getElementById('cvc'), { mask: '000' });
    }
}
