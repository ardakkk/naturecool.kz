export function shuffle(a) {
    for (let i = a.length; i > 0; i--) {
        let j = Math.floor(Math.random() * i);
        [a[i - 1], a[j]] = [a[j], a[i - 1]];
    }
}

export const phoneValidation = (value, component) => {
    return (value.indexOf("_") !==-1) ? false : true;
}

export const nameValidation = (value, component) => {
    return /^[А-ЯЁ][А-яё]+(-[А-ЯЁ][А-яё]+)?$/gi.test(value);
}
